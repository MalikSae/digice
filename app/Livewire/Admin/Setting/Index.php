<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Setting;
use Livewire\Component;

class Index extends Component
{
    public $address;
    public $whatsapp_number;

    public function mount()
    {
        $setting = Setting::first();
        if ($setting) {
            $this->address = $setting->address;
            $this->whatsapp_number = $setting->whatsapp_number;
        }
    }

    public function save()
    {
        $this->validate([
            'address' => 'nullable|string',
            'whatsapp_number' => 'nullable|string',
        ]);

        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        $setting->address = $this->address;
        $setting->whatsapp_number = $this->whatsapp_number;
        $setting->save();

        session()->flash('success', 'Pengaturan berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.admin.setting.index')->layout('layouts.admin', [
            'title' => 'Pengaturan',
            'pageTitle' => 'Pengaturan',
            'pageSubtitle' => 'Atur informasi alamat dan whatsapp website',
        ]);
    }
}
