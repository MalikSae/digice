<?php

namespace App\Livewire\Admin\TechStack;

use App\Models\TechStack;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    public ?string $search = '';
    public ?string $filterCategory = '';
    public bool $showModal = false;
    public ?int $editingId = null;

    // Form fields
    public ?string $name = '';
    public ?string $category = '';
    public ?string $icon = '';
    public ?string $color = '#000000';

    // Konfirmasi hapus
    public ?int $deletingId = null;
    public bool $showDeleteConfirm = false;

    #[Computed]
    public function techStacks()
    {
        return TechStack::query()
            ->when($this->search, fn($q) => $q->where('name', 'like', '%' . $this->search . '%'))
            ->when($this->filterCategory, fn($q) => $q->where('category', $this->filterCategory))
            ->orderBy('category')
            ->orderBy('name')
            ->get();
    }

    public function openCreate()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function openEdit(int $id)
    {
        $tech = TechStack::findOrFail($id);
        
        $this->name = $tech->name;
        $this->category = $tech->category;
        $this->icon = $tech->icon ?? '';
        $this->color = $tech->color ?? '#000000';
        
        $this->editingId = $id;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate([
            'name'     => 'required|string|max:100|unique:tech_stacks,name,' . $this->editingId,
            'category' => 'required|in:Frontend,Backend,Mobile,Database',
            'icon'     => 'nullable|string|max:100',
            'color'    => 'nullable|string|max:7',
        ]);

        $data = [
            'name'     => $this->name,
            'category' => $this->category,
            'icon'     => $this->icon ?: null,
            'color'    => $this->color ?: null,
        ];

        if ($this->editingId) {
            TechStack::findOrFail($this->editingId)->update($data);
            $this->dispatch('notify', message: 'Tech stack berhasil diupdate');
        } else {
            TechStack::create($data);
            $this->dispatch('notify', message: 'Tech stack berhasil ditambahkan');
        }

        $this->closeModal();
        unset($this->techStacks);
    }

    public function confirmDelete(int $id)
    {
        $this->deletingId = $id;
        $this->showDeleteConfirm = true;
    }

    public function delete()
    {
        if ($this->deletingId) {
            TechStack::findOrFail($this->deletingId)->delete();
            $this->dispatch('notify', message: 'Tech stack berhasil dihapus');
            $this->showDeleteConfirm = false;
            $this->deletingId = null;
            unset($this->techStacks);
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
        $this->reset(['name', 'category', 'icon', 'color', 'editingId']);
        $this->resetValidation();
    }

    public function render(): View
    {
        return view('livewire.admin.tech-stack.index')
            ->layout('layouts.admin', [
                'pageTitle'    => 'Tech Stack',
                'pageSubtitle' => 'Kelola daftar teknologi yang digunakan',
            ]);
    }
}
