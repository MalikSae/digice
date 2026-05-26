<div>
    <!-- HEADER BAR -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <h2 class="text-xl font-bold text-digice-dark-slate">Tech Stack</h2>
            <span class="px-2 py-1 text-xs font-medium bg-digice-navy/10 text-digice-navy rounded-full">
                {{ $this->techStacks->count() }} Total
            </span>
        </div>
        <button wire:click="openCreate" class="px-4 py-2 bg-digice-navy text-white text-sm font-medium rounded-lg hover:bg-digice-navy/90 transition-colors shadow-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Tech Stack
        </button>
    </div>

    <!-- FILTER BAR -->
    <div class="flex flex-col sm:flex-row gap-4 mb-6">
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>
            <input wire:model.live="search" type="text" placeholder="Cari nama tech..." class="pl-10 w-full rounded-xl border border-digice-border focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan py-2 text-sm text-digice-dark-slate placeholder-gray-400 transition-colors bg-white">
        </div>
        <div class="w-full sm:w-48">
            <select wire:model.live="filterCategory" class="w-full rounded-xl border border-digice-border focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan py-2 text-sm text-digice-dark-slate transition-colors bg-white">
                <option value="">Semua</option>
                <option value="Frontend">Frontend</option>
                <option value="Backend">Backend</option>
                <option value="Mobile">Mobile</option>
                <option value="Database">Database</option>
            </select>
        </div>
    </div>

    <!-- STATS ROW -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
        <button wire:click="$set('filterCategory', 'Frontend')" class="flex flex-col items-center justify-center bg-blue-50 border border-blue-100 rounded-xl p-3 hover:bg-blue-100 transition-colors {{ $filterCategory === 'Frontend' ? 'ring-2 ring-blue-500' : '' }}">
            <span class="text-blue-600 text-xs font-semibold uppercase tracking-wider mb-1">Frontend</span>
            <span class="text-blue-700 text-2xl font-bold">{{ $this->techStacks->where('category','Frontend')->count() }}</span>
        </button>
        <button wire:click="$set('filterCategory', 'Backend')" class="flex flex-col items-center justify-center bg-red-50 border border-red-100 rounded-xl p-3 hover:bg-red-100 transition-colors {{ $filterCategory === 'Backend' ? 'ring-2 ring-red-500' : '' }}">
            <span class="text-red-600 text-xs font-semibold uppercase tracking-wider mb-1">Backend</span>
            <span class="text-red-700 text-2xl font-bold">{{ $this->techStacks->where('category','Backend')->count() }}</span>
        </button>
        <button wire:click="$set('filterCategory', 'Mobile')" class="flex flex-col items-center justify-center bg-purple-50 border border-purple-100 rounded-xl p-3 hover:bg-purple-100 transition-colors {{ $filterCategory === 'Mobile' ? 'ring-2 ring-purple-500' : '' }}">
            <span class="text-purple-600 text-xs font-semibold uppercase tracking-wider mb-1">Mobile</span>
            <span class="text-purple-700 text-2xl font-bold">{{ $this->techStacks->where('category','Mobile')->count() }}</span>
        </button>
        <button wire:click="$set('filterCategory', 'Database')" class="flex flex-col items-center justify-center bg-green-50 border border-green-100 rounded-xl p-3 hover:bg-green-100 transition-colors {{ $filterCategory === 'Database' ? 'ring-2 ring-green-500' : '' }}">
            <span class="text-green-600 text-xs font-semibold uppercase tracking-wider mb-1">Database</span>
            <span class="text-green-700 text-2xl font-bold">{{ $this->techStacks->where('category','Database')->count() }}</span>
        </button>
    </div>

    <!-- GRID CARDS -->
    @if($this->techStacks->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($this->techStacks as $tech)
                <div class="bg-white rounded-xl border border-digice-border shadow-card p-4 relative group">
                    <!-- Baris Atas -->
                    <div class="flex justify-between items-start">
                        <!-- Preview Icon -->
                        <div>
                            @if($tech->icon)
                                @php
                                    $iconColor = $tech->color ? ltrim($tech->color, '#') : '000000';
                                @endphp
                                <img src="https://cdn.simpleicons.org/{{ $tech->icon }}/{{ $iconColor }}" class="w-8 h-8 object-contain" alt="{{ $tech->name }}" onerror="this.style.display='none'">
                            @else
                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-xs font-bold" style="background-color: {{ $tech->color ?? '#475569' }}">
                                    {{ strtoupper(substr($tech->name, 0, 2)) }}
                                </div>
                            @endif
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button wire:click="openEdit({{ $tech->id }})" class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </button>
                            <button wire:click="confirmDelete({{ $tech->id }})" class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Info -->
                    <h3 class="font-medium text-digice-dark-slate text-sm mt-3">{{ $tech->name }}</h3>
                    
                    <div class="mt-2 flex items-center justify-between">
                        <!-- Kategori Badge -->
                        @if($tech->category === 'Frontend')
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-blue-50 text-blue-700">Frontend</span>
                        @elseif($tech->category === 'Backend')
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-red-50 text-red-700">Backend</span>
                        @elseif($tech->category === 'Mobile')
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-purple-50 text-purple-700">Mobile</span>
                        @elseif($tech->category === 'Database')
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-green-50 text-green-700">Database</span>
                        @endif

                        <!-- Dot Warna -->
                        <div class="flex items-center gap-1.5" title="{{ $tech->color ?? 'None' }}">
                            <span class="inline-block w-3 h-3 rounded-full border border-gray-200" style="background-color: {{ $tech->color ?? '#ccc' }}"></span>
                            <span class="text-xs text-digice-slate">{{ $tech->color ? strtoupper($tech->color) : '—' }}</span>
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
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z" />
                </svg>
            </div>
            <h3 class="text-base font-semibold text-digice-dark-slate">Tidak ada tech stack ditemukan</h3>
            <p class="text-sm text-digice-slate mt-1 mb-6">Pencarian atau filter Anda tidak membuahkan hasil.</p>
            @if(!$search && !$filterCategory)
                <button wire:click="openCreate" class="inline-flex items-center gap-2 px-4 py-2 bg-digice-cyan text-white text-sm font-medium rounded-lg hover:bg-digice-cyan/90 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Pertama
                </button>
            @else
                <button wire:click="$set('search', ''); $set('filterCategory', '')" class="text-digice-royal text-sm font-medium hover:underline">Clear Filter</button>
            @endif
        </div>
    @endif

    <!-- MODAL FORM (Create / Edit) -->
    @if($showModal)
        <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-card-lg w-full max-w-md p-6">
                <!-- Header Modal -->
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-digice-dark-slate">
                        {{ $editingId ? 'Edit Tech Stack' : 'Tambah Tech Stack' }}
                    </h3>
                    <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Form Fields -->
                <div class="space-y-4">
                    <!-- Nama -->
                    <div>
                        <label class="block text-sm font-medium text-digice-dark-slate mb-1">Nama <span class="text-red-500">*</span></label>
                        <input wire:model="name" type="text" placeholder="Contoh: Laravel" class="w-full rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan">
                        @error('name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="block text-sm font-medium text-digice-dark-slate mb-1">Kategori <span class="text-red-500">*</span></label>
                        <select wire:model="category" class="w-full rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan">
                            <option value="">Pilih kategori</option>
                            <option value="Frontend">Frontend</option>
                            <option value="Backend">Backend</option>
                            <option value="Mobile">Mobile</option>
                            <option value="Database">Database</option>
                        </select>
                        @error('category') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Icon Slug -->
                    <div>
                        <label class="block text-sm font-medium text-digice-dark-slate mb-1">Icon Slug</label>
                        <div class="flex gap-3 items-center">
                            <input wire:model.live="icon" type="text" placeholder="Contoh: laravel" class="flex-1 rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan">
                            @if($icon)
                                @php $previewColor = ltrim($color ?? '#000', '#'); @endphp
                                <div class="w-10 h-10 border border-digice-border rounded-lg bg-gray-50 flex items-center justify-center shrink-0">
                                    <img src="https://cdn.simpleicons.org/{{ $icon }}/{{ $previewColor ?: '000000' }}" class="w-6 h-6 object-contain" onerror="this.style.display='none'">
                                </div>
                            @endif
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Slug dari <a href="https://simpleicons.org/" target="_blank" class="text-digice-cyan hover:underline">simpleicons.org</a></p>
                        @error('icon') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Warna Brand -->
                    <div>
                        <label class="block text-sm font-medium text-digice-dark-slate mb-1">Warna Brand</label>
                        <div class="flex gap-2">
                            <input wire:model.live="color" type="color" class="w-10 h-10 rounded cursor-pointer border border-digice-border p-0">
                            <input wire:model.live="color" type="text" placeholder="#FF2D20" class="flex-1 rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan uppercase">
                        </div>
                        @error('color') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Footer Modal -->
                <div class="mt-8 flex justify-end gap-3">
                    <button wire:click="closeModal" class="px-4 py-2 text-sm font-medium text-digice-slate bg-white border border-digice-border rounded-lg hover:bg-gray-50 transition-colors">
                        Batal
                    </button>
                    <button wire:click="save" class="px-4 py-2 text-sm font-medium text-white bg-digice-cyan rounded-lg hover:bg-digice-cyan/90 transition-colors">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- MODAL KONFIRMASI HAPUS -->
    @if($showDeleteConfirm)
        <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-card-lg w-full max-w-sm p-6 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-digice-dark-slate mb-2">Hapus Tech Stack?</h3>
                <p class="text-sm text-digice-slate mb-6">Tindakan ini tidak bisa dibatalkan. Data tech stack ini akan dihapus permanen.</p>
                <div class="flex gap-3 justify-center">
                    <button wire:click="closeModal" class="px-4 py-2 text-sm font-medium text-digice-slate bg-white border border-digice-border rounded-lg hover:bg-gray-50 transition-colors flex-1">
                        Batal
                    </button>
                    <button wire:click="delete" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors flex-1">
                        Hapus
                    </button>
                </div>
            </div>
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
