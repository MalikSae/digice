<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Models\Portfolio;

Route::get('/', function () {
    $portfolios = Portfolio::with(['techStacks', 'media'])
        ->where('is_featured', true)
        ->orderBy('sort_order')
        ->get();
        
    $testimonials = \App\Models\Testimonial::with('media')
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->orderBy('created_at', 'desc')
        ->get();
    
    return view('pages.home', compact('portfolios', 'testimonials'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', App\Livewire\Admin\Dashboard::class)->name('dashboard');
    Route::get('/portfolio', App\Livewire\Admin\Portfolio\Index::class)->name('portfolio.index');
    Route::get('/portfolio/create', App\Livewire\Admin\Portfolio\Form::class)->name('portfolio.create');
    Route::get('/portfolio/{portfolio}/edit', App\Livewire\Admin\Portfolio\Form::class)->name('portfolio.edit');
    Route::get('/tech-stacks', App\Livewire\Admin\TechStack\Index::class)->name('tech-stacks.index');
    Route::get('/testimonials', App\Livewire\Admin\Testimonial\Index::class)->name('testimonials.index');
    Route::get('/setting', App\Livewire\Admin\Setting\Index::class)->name('setting.index');
});
