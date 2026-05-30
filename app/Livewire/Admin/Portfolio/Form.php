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

    // Form fields (loosely typed to avoid PHP TypeErrors with Livewire hydration)
    public $name = '';
    public $description = '';
    public $category = '';
    public $url = '';
    public $is_featured = false;
    public $sort_order = 0;

    // Tech stacks
    public $selectedTechStacks = [];
    public $allTechStacks = [];

    // Screenshots
    public $screenshots = [];        // file upload baru (TemporaryUploadedFile)
    public $existingScreenshots = []; // media yang sudah tersimpan

    public function mount()
    {
        $this->allTechStacks = TechStack::orderBy('category')->orderBy('name')->get()->toArray();
        
        if ($this->portfolio && $this->portfolio->exists) {
            $this->isEditing = true;
            
            $this->name = $this->portfolio->name;
            $this->description = $this->portfolio->description ?? '';
            $this->category = $this->portfolio->category;
            $this->url = $this->portfolio->url ?? '';
            $this->is_featured = $this->portfolio->is_featured;
            $this->sort_order = $this->portfolio->sort_order;

            $this->selectedTechStacks = $this->portfolio->techStacks->pluck('id')->toArray();
            $this->existingScreenshots = $this->portfolio->getMedia('screenshots')->toArray();
        } else {
            $this->isEditing = false;
            $this->sort_order = (Portfolio::max('sort_order') ?? 0) + 1;
        }
    }

    public function save()
    {
        // Debugging to ensure method is hit
        \Illuminate\Support\Facades\Log::info('Rebuilt Portfolio save() triggered', [
            'name' => $this->name
        ]);

        $this->validate([
            'name'          => 'required|string|max:200',
            'description'   => 'nullable|string|max:1000',
            'category'      => 'required|in:Website,Web App,E-Commerce,Marketing',
            'url'           => 'nullable|url|max:500',
            'sort_order'    => 'required|numeric|min:0',
            'screenshots'   => 'nullable|array',
            'screenshots.*' => 'nullable|image|max:2048',
        ], [
            'name.required' => 'Nama project wajib diisi.',
            'category.required' => 'Kategori wajib dipilih.',
            'url.url' => 'Format URL tidak valid (harus menggunakan http:// atau https://).',
            'screenshots.*.image' => 'File harus berupa gambar.',
            'screenshots.*.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        \Illuminate\Support\Facades\Log::info('Rebuilt Portfolio validation passed');

        $data = [
            'name'        => $this->name,
            'description' => $this->description ?: null,
            'category'    => $this->category,
            'url'         => $this->url ?: null,
            'is_featured' => (bool) $this->is_featured,
            'sort_order'  => (int) $this->sort_order,
        ];

        try {
            if ($this->isEditing) {
                $this->portfolio->update($data);
                $this->portfolio->techStacks()->sync($this->selectedTechStacks);
                $target = $this->portfolio;
            } else {
                $portfolio = Portfolio::create($data);
                $portfolio->techStacks()->sync($this->selectedTechStacks);
                $target = $portfolio;
            }

            // Process image uploads robustly
            if (!empty($this->screenshots) && is_array($this->screenshots)) {
                foreach ($this->screenshots as $screenshot) {
                    if (is_object($screenshot)) {
                        $filename = Str::slug($this->name) . '-' . time() . '-' . uniqid() . '.' . $screenshot->getClientOriginalExtension();
                        $target->addMedia($screenshot)
                               ->usingFileName($filename)
                               ->toMediaCollection('screenshots');
                    }
                }
            }

            \Illuminate\Support\Facades\Log::info('Rebuilt Portfolio DB transaction complete');

            session()->flash('message', $this->isEditing ? 'Portfolio berhasil diupdate' : 'Portfolio berhasil ditambahkan');
            return redirect()->route('admin.portfolio.index');

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Rebuilt Portfolio DB Error: ' . $e->getMessage());
            $this->addError('general', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
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
