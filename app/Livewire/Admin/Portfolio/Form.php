<?php

namespace App\Livewire\Admin\Portfolio;

use App\Models\Portfolio;
use App\Models\TechStack;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Form extends Component
{
    use WithFileUploads;

    public ?Portfolio $portfolio = null;
    public bool $isEditing = false;

    // Form fields
    public string $name = '';
    public string $description = '';
    public string $category = '';
    public string $url = '';
    public bool $is_featured = false;
    public int $sort_order = 0;

    // Tech stacks
    public array $selectedTechStacks = [];
    public array $allTechStacks = [];

    // Screenshots
    public array $screenshots = [];        // file upload baru (TemporaryUploadedFile)
    public array $existingScreenshots = []; // media yang sudah tersimpan

    public function mount(?Portfolio $portfolio = null)
    {
        $this->allTechStacks = TechStack::orderBy('category')->orderBy('name')->get()->toArray();
        
        if ($portfolio && $portfolio->exists) {
            $this->isEditing = true;
            $this->portfolio = $portfolio;
            
            $this->name = $portfolio->name;
            $this->description = $portfolio->description ?? '';
            $this->category = $portfolio->category;
            $this->url = $portfolio->url ?? '';
            $this->is_featured = $portfolio->is_featured;
            $this->sort_order = $portfolio->sort_order;

            $this->selectedTechStacks = $portfolio->techStacks->pluck('id')->toArray();
            $this->existingScreenshots = $portfolio->getMedia('screenshots')->toArray();
        } else {
            $this->isEditing = false;
            $this->sort_order = (Portfolio::max('sort_order') ?? 0) + 1;
        }
    }

    public function save()
    {
        $this->validate([
            'name'          => 'required|string|max:200',
            'description'   => 'nullable|string|max:1000',
            'category'      => 'required|in:Website,Web App,E-Commerce,Marketing',
            'url'           => 'nullable|url|max:500',
            'sort_order'    => 'integer|min:0',
            'screenshots'   => 'nullable|array',
            'screenshots.*' => 'nullable|image|max:2048',
        ]);

        $data = [
            'name'        => $this->name,
            'description' => $this->description ?: null,
            'category'    => $this->category,
            'url'         => $this->url ?: null,
            'is_featured' => $this->is_featured,
            'sort_order'  => $this->sort_order,
        ];

        if ($this->isEditing) {
            $this->portfolio->update($data);
            $this->portfolio->techStacks()->sync($this->selectedTechStacks);
            $target = $this->portfolio;
        } else {
            $portfolio = Portfolio::create($data);
            $portfolio->techStacks()->sync($this->selectedTechStacks);
            $target = $portfolio;
        }

        if (!empty($this->screenshots)) {
            foreach ($this->screenshots as $screenshot) {
                $target->addMedia($screenshot->getRealPath())
                       ->usingFileName(Str::slug($this->name) . '-' . time() . '-' . uniqid() . '.' . $screenshot->getClientOriginalExtension())
                       ->toMediaCollection('screenshots');
            }
        }

        session()->flash('message', $this->isEditing ? 'Portfolio berhasil diupdate' : 'Portfolio berhasil ditambahkan');
        return redirect()->route('admin.portfolio.index');
    }

    public function deleteExistingScreenshot(int $mediaId)
    {
        Media::findOrFail($mediaId)->delete();
        $this->existingScreenshots = $this->portfolio->fresh()->getMedia('screenshots')->toArray();
        $this->dispatch('notify', message: 'Screenshot dihapus');
    }

    public function render(): View
    {
        return view('livewire.admin.portfolio.form')
            ->layout('layouts.admin', [
                'pageTitle'    => $this->isEditing ? 'Edit Portfolio' : 'Tambah Portfolio',
                'pageSubtitle' => $this->isEditing ? 'Update data project' : 'Tambah project baru',
            ]);
    }
}
