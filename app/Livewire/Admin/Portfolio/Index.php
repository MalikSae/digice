<?php

namespace App\Livewire\Admin\Portfolio;

use App\Models\Portfolio;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    public string $search = '';
    public string $filterCategory = '';

    #[Computed]
    public function portfolios()
    {
        return Portfolio::query()
            ->with(['techStacks', 'media'])
            ->when($this->search, fn($q) => $q->where('name', 'like', '%'.$this->search.'%'))
            ->when($this->filterCategory, fn($q) => $q->where('category', $this->filterCategory))
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get();
    }

    public function toggleFeatured(int $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->update(['is_featured' => !$portfolio->is_featured]);
        $this->dispatch('notify', message: $portfolio->is_featured 
            ? 'Ditampilkan di landing page' 
            : 'Disembunyikan dari landing page');
        unset($this->portfolios);
    }

    public function delete(int $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->clearMediaCollection('screenshots');
        $portfolio->delete();
        $this->dispatch('notify', message: 'Portfolio berhasil dihapus');
        unset($this->portfolios);
    }

    public function render(): View
    {
        return view('livewire.admin.portfolio.index')
            ->layout('layouts.admin', [
                'pageTitle'    => 'Portfolio',
                'pageSubtitle' => 'Kelola project yang ditampilkan di website',
            ]);
    }
}
