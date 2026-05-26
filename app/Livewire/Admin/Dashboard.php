<?php

namespace App\Livewire\Admin;

use App\Models\Portfolio;
use App\Models\TechStack;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public int $totalPortfolio;
    public int $totalFeatured;
    public int $totalTechStack;

    public function mount(): void
    {
        $this->totalPortfolio  = Portfolio::count();
        $this->totalFeatured   = Portfolio::where('is_featured', true)->count();
        $this->totalTechStack  = TechStack::count();
    }

    public function render(): View
    {
        return view('livewire.admin.dashboard')
            ->layout('layouts.admin', [
                'pageTitle'    => 'Dashboard',
                'pageSubtitle' => 'Overview project dan statistik Digice',
            ]);
    }
}
