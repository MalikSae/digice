<div>
    <!-- HEADER BAR -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <h2 class="text-xl font-bold text-digice-dark-slate">Portfolio</h2>
            <span class="px-2 py-1 text-xs font-medium bg-digice-navy/10 text-digice-navy rounded-full">
                {{ $this->portfolios->count() }} Total
            </span>
        </div>
        <a href="{{ route('admin.portfolio.create') }}" class="px-4 py-2 bg-digice-navy text-white text-sm font-medium rounded-lg hover:bg-digice-navy/90 transition-colors shadow-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Portfolio
        </a>
    </div>

    <!-- FILTER BAR -->
    <div class="flex flex-col sm:flex-row gap-4 mb-8">
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>
            <input wire:model.live="search" type="text" placeholder="Cari nama project..." class="pl-10 w-full rounded-xl border border-digice-border focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan py-2 text-sm text-digice-dark-slate placeholder-gray-400 transition-colors bg-white">
        </div>
        <div class="w-full sm:w-48">
            <select wire:model.live="filterCategory" class="w-full rounded-xl border border-digice-border focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan py-2 text-sm text-digice-dark-slate transition-colors bg-white">
                <option value="">Semua Kategori</option>
                <option value="Website">Website</option>
                <option value="Web App">Web App</option>
                <option value="E-Commerce">E-Commerce</option>
                <option value="Marketing">Marketing</option>
            </select>
        </div>
    </div>

    @if(session('message'))
        <div class="mb-6 p-4 rounded-xl bg-green-50 text-green-700 border border-green-200">
            {{ session('message') }}
        </div>
    @endif

    <!-- GRID CARDS -->
    @if($this->portfolios->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($this->portfolios as $portfolio)
                <div class="bg-white rounded-xl border border-digice-border shadow-card overflow-hidden flex flex-col">
                    <!-- THUMBNAIL -->
                    <div class="relative aspect-video bg-digice-surface flex-shrink-0">
                        @if($portfolio->hasMedia('screenshots'))
                            <img src="{{ $portfolio->getFirstMediaUrl('screenshots') }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                                <svg class="w-10 h-10 mb-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                                <span class="text-sm">Belum ada screenshot</span>
                            </div>
                        @endif

                        <!-- Badge Category -->
                        <div class="absolute top-3 left-3 bg-white/90 backdrop-blur text-digice-dark-slate px-2 py-1 rounded-full text-xs font-medium shadow-sm">
                            {{ $portfolio->category }}
                        </div>

                        <!-- Badge Featured -->
                        @if($portfolio->is_featured)
                            <div class="absolute top-3 right-3 bg-digice-cyan text-white px-2 py-1 rounded-full text-xs font-medium shadow-sm">
                                Featured
                            </div>
                        @endif
                    </div>

                    <!-- CONTENT -->
                    <div class="p-4 flex-1 flex flex-col">
                        <h3 class="font-semibold text-digice-dark-slate">{{ $portfolio->name }}</h3>
                        <p class="text-sm text-digice-slate line-clamp-2 mt-1">{{ $portfolio->description ?? 'Tidak ada deskripsi.' }}</p>

                        <!-- Tech Stack Badges -->
                        <div class="mt-3 flex flex-wrap gap-1">
                            @foreach($portfolio->techStacks->take(4) as $tech)
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-digice-surface border border-digice-border text-xs text-digice-slate">
                                    @if($tech->icon)
                                        <img src="https://cdn.simpleicons.org/{{ $tech->icon }}/64748B" class="w-3 h-3" onerror="this.style.display='none'">
                                    @endif
                                    {{ $tech->name }}
                                </span>
                            @endforeach
                            @if($portfolio->techStacks->count() > 4)
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-digice-surface border border-digice-border text-xs text-digice-slate">
                                    +{{ $portfolio->techStacks->count() - 4 }} lagi
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- FOOTER CARD -->
                    <div class="px-4 pb-4 mt-auto flex justify-between items-center border-t border-digice-border/50 pt-4">
                        <button wire:click="toggleFeatured({{ $portfolio->id }})" wire:confirm="Ubah status featured portfolio ini?" class="text-sm font-medium transition-colors {{ $portfolio->is_featured ? 'text-digice-cyan hover:text-digice-cyan/80' : 'text-gray-400 hover:text-digice-cyan' }}">
                            {{ $portfolio->is_featured ? '★ Featured' : '☆ Jadikan Featured' }}
                        </button>

                        <div class="flex items-center gap-1">
                            <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                            <button wire:click="delete({{ $portfolio->id }})" wire:confirm="Hapus portfolio '{{ $portfolio->name }}'? Semua screenshot akan ikut terhapus." class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- EMPTY STATE -->
        <div class="text-center py-16 bg-white border border-digice-border border-dashed rounded-2xl">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>
            </div>
            <h3 class="text-base font-semibold text-digice-dark-slate">Belum ada portfolio</h3>
            <p class="text-sm text-digice-slate mt-1 mb-6">Pencarian atau filter Anda tidak membuahkan hasil, atau Anda belum menambahkan data.</p>
            @if(!$search && !$filterCategory)
                <a href="{{ route('admin.portfolio.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-digice-cyan text-white text-sm font-medium rounded-lg hover:bg-digice-cyan/90 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Portfolio Pertama
                </a>
            @else
                <button wire:click="$set('search', ''); $set('filterCategory', '')" class="text-digice-royal text-sm font-medium hover:underline">Clear Filter</button>
            @endif
        </div>
    @endif

    <!-- TOAST NOTIFICATION -->
    <div x-data="{ show: false, message: '' }"
         x-on:notify.window="message = $event.detail.message; show = true; setTimeout(() => show = false, 3000)"
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform translate-y-4"
         class="fixed bottom-6 right-6 bg-digice-navy text-white px-5 py-3 rounded-xl shadow-card-lg text-sm z-50 flex items-center gap-3"
         style="display: none;">
        <svg class="w-5 h-5 text-digice-cyan" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span x-text="message"></span>
    </div>
</div>
