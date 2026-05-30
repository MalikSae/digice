<?php

namespace App\Livewire\Admin\Team;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    public ?string $search = '';
    public bool $showModal = false;
    public ?int $editingId = null;

    // Form fields
    public ?string $name = '';
    public ?string $email = '';
    public ?string $password = '';
    public ?string $password_confirmation = '';
    public ?string $position = '';

    // Delete confirm
    public ?int $deletingId = null;
    public bool $showDeleteConfirm = false;

    #[Computed]
    public function users()
    {
        return User::query()
            ->when($this->search, fn($q) => $q
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%'))
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
        $user = User::findOrFail($id);

        $this->name     = $user->name;
        $this->email    = $user->email;
        $this->password = '';
        $this->password_confirmation = '';

        $this->editingId = $id;
        $this->showModal = true;
    }

    public function save()
    {
        $isEditing = (bool) $this->editingId;

        $rules = [
            'name'  => 'required|string|max:150',
            'email' => 'required|email|max:150|unique:users,email' . ($isEditing ? ',' . $this->editingId : ''),
        ];

        if (!$isEditing || $this->password !== '') {
            $rules['password']              = 'required|string|min:8|confirmed';
            $rules['password_confirmation'] = 'required';
        }

        $this->validate($rules);

        if ($isEditing) {
            $user = User::findOrFail($this->editingId);
            $data = ['name' => $this->name, 'email' => $this->email];
            if ($this->password !== '') {
                $data['password'] = Hash::make($this->password);
            }
            $user->update($data);
            $this->dispatch('notify', message: 'Admin berhasil diupdate');
        } else {
            User::create([
                'name'     => $this->name,
                'email'    => $this->email,
                'password' => Hash::make($this->password),
            ]);
            $this->dispatch('notify', message: 'Admin baru berhasil ditambahkan');
        }

        $this->closeModal();
        unset($this->users);
    }

    public function confirmDelete(int $id)
    {
        // Prevent self-deletion
        if ($id === auth()->id()) {
            $this->dispatch('notify', message: 'Anda tidak dapat menghapus akun sendiri');
            return;
        }
        $this->deletingId = $id;
        $this->showDeleteConfirm = true;
    }

    public function delete()
    {
        if ($this->deletingId) {
            User::findOrFail($this->deletingId)->delete();
            $this->dispatch('notify', message: 'Admin berhasil dihapus');
            $this->showDeleteConfirm = false;
            $this->deletingId = null;
            unset($this->users);
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
        $this->reset(['name', 'email', 'password', 'password_confirmation', 'editingId']);
        $this->resetValidation();
    }

    public function render(): View
    {
        return view('livewire.admin.team.index')
            ->layout('layouts.admin', [
                'pageTitle'    => 'Kelola Team',
                'pageSubtitle' => 'Tambah, edit, dan hapus admin yang dapat mengakses dashboard',
            ]);
    }
}
