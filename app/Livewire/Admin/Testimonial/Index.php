<?php

namespace App\Livewire\Admin\Testimonial;

use App\Models\Testimonial;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public ?string $search = '';
    public bool $showModal = false;
    public ?int $editingId = null;

    // Form fields
    public ?string $name = '';
    public ?string $position = '';
    public ?string $content = '';
    public int $rating = 5;
    public bool $is_active = true;
    public int $sort_order = 0;
    public $avatar;

    // Delete confirm
    public ?int $deletingId = null;
    public bool $showDeleteConfirm = false;

    #[Computed]
    public function testimonials()
    {
        return Testimonial::query()
            ->when($this->search, fn($q) => $q->where('name', 'like', '%' . $this->search . '%')
                                              ->orWhere('position', 'like', '%' . $this->search . '%'))
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function openCreate()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function openEdit(int $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        $this->name = $testimonial->name;
        $this->position = $testimonial->position;
        $this->content = $testimonial->content;
        $this->rating = $testimonial->rating;
        $this->is_active = $testimonial->is_active;
        $this->sort_order = $testimonial->sort_order;
        $this->avatar = null; // Reset file input
        
        $this->editingId = $id;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:150',
            'position' => 'required|string|max:150',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
            'avatar' => 'nullable|image|max:2048', // max 2MB
        ]);

        $data = [
            'name' => $this->name,
            'position' => $this->position,
            'content' => $this->content,
            'rating' => $this->rating,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ];

        if ($this->editingId) {
            $testimonial = Testimonial::findOrFail($this->editingId);
            $testimonial->update($data);
            $this->dispatch('notify', message: 'Testimoni berhasil diupdate');
        } else {
            $testimonial = Testimonial::create($data);
            $this->dispatch('notify', message: 'Testimoni berhasil ditambahkan');
        }

        if ($this->avatar) {
            $testimonial->addMedia($this->avatar)->toMediaCollection('avatar');
        }

        $this->closeModal();
        unset($this->testimonials);
    }

    public function confirmDelete(int $id)
    {
        $this->deletingId = $id;
        $this->showDeleteConfirm = true;
    }

    public function delete()
    {
        if ($this->deletingId) {
            Testimonial::findOrFail($this->deletingId)->delete();
            $this->dispatch('notify', message: 'Testimoni berhasil dihapus');
            $this->showDeleteConfirm = false;
            $this->deletingId = null;
            unset($this->testimonials);
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->showDeleteConfirm = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['name', 'position', 'content', 'rating', 'is_active', 'sort_order', 'avatar', 'editingId']);
        $this->resetValidation();
        // default value
        $this->rating = 5;
        $this->is_active = true;
        $this->sort_order = 0;
    }

    public function render(): View
    {
        return view('livewire.admin.testimonial.index')
            ->layout('layouts.admin', [
                'pageTitle' => 'Testimoni',
                'pageSubtitle' => 'Kelola ulasan dari klien',
            ]);
    }
}
