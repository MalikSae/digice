<div>
    <!-- HEADER BAR -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <h2 class="text-xl font-bold text-digice-dark-slate">Testimoni</h2>
            <span class="px-2 py-1 text-xs font-medium bg-digice-navy/10 text-digice-navy rounded-full">
                {{ $this->testimonials->count() }} Total
            </span>
        </div>
        <button wire:click="openCreate" class="px-4 py-2 bg-digice-navy text-white text-sm font-medium rounded-lg hover:bg-digice-navy/90 transition-colors shadow-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Testimoni
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
            <input wire:model.live="search" type="text" placeholder="Cari nama atau jabatan..." class="pl-10 w-full rounded-xl border border-digice-border focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan py-2 text-sm text-digice-dark-slate placeholder-gray-400 transition-colors bg-white">
        </div>
    </div>

    <!-- GRID CARDS -->
    @if($this->testimonials->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($this->testimonials as $testimonial)
                <div class="bg-white rounded-xl border border-digice-border shadow-card p-6 relative group flex flex-col h-full">
                    <!-- Action Buttons -->
                    <div class="absolute top-4 right-4 flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button wire:click="openEdit({{ $testimonial->id }})" class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                        </button>
                        <button wire:click="confirmDelete({{ $testimonial->id }})" class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </div>

                    <!-- Stars -->
                    <div class="text-digice-cyan mb-3 flex gap-1">
                        @for($i=1; $i<=5; $i++)
                            <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-digice-cyan' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        @endfor
                    </div>
                    
                    <p class="text-sm text-gray-600 italic mb-6 flex-1 line-clamp-4">"{{ $testimonial->content }}"</p>
                    
                    <div class="flex items-center gap-3 border-t border-gray-100 pt-4 mt-auto">
                        @if($testimonial->hasMedia('avatar'))
                            <img src="{{ $testimonial->getFirstMediaUrl('avatar') }}" class="w-10 h-10 rounded-full object-cover">
                        @else
                            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 font-bold text-sm">
                                {{ strtoupper(substr($testimonial->name, 0, 2)) }}
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-semibold text-digice-dark-slate truncate">{{ $testimonial->name }}</h4>
                            <p class="text-xs text-gray-500 truncate">{{ $testimonial->position }}</p>
                        </div>
                        <div class="ml-2">
                            @if($testimonial->is_active)
                                <span class="px-2 py-0.5 bg-green-50 text-green-600 text-[10px] font-bold rounded-full uppercase">Aktif</span>
                            @else
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-500 text-[10px] font-bold rounded-full uppercase">Draft</span>
                            @endif
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
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                </svg>
            </div>
            <h3 class="text-base font-semibold text-digice-dark-slate">Tidak ada testimoni</h3>
            <p class="text-sm text-digice-slate mt-1 mb-6">Pencarian Anda tidak membuahkan hasil atau data masih kosong.</p>
            @if(!$search)
                <button wire:click="openCreate" class="inline-flex items-center gap-2 px-4 py-2 bg-digice-cyan text-white text-sm font-medium rounded-lg hover:bg-digice-cyan/90 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Pertama
                </button>
            @endif
        </div>
    @endif

    <!-- MODAL FORM (Create / Edit) -->
    @if($showModal)
        <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-card-lg w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">
                <!-- Header Modal -->
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-digice-dark-slate">
                        {{ $editingId ? 'Edit Testimoni' : 'Tambah Testimoni' }}
                    </h3>
                    <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Form Fields -->
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Nama -->
                        <div>
                            <label class="block text-sm font-medium text-digice-dark-slate mb-1">Nama Klien <span class="text-red-500">*</span></label>
                            <input wire:model="name" type="text" class="w-full rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan">
                            @error('name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Jabatan / Perusahaan -->
                        <div>
                            <label class="block text-sm font-medium text-digice-dark-slate mb-1">Jabatan & Perusahaan <span class="text-red-500">*</span></label>
                            <input wire:model="position" type="text" placeholder="CEO, PT X" class="w-full rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan">
                            @error('position') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Isi Testimoni -->
                    <div>
                        <label class="block text-sm font-medium text-digice-dark-slate mb-1">Isi Testimoni <span class="text-red-500">*</span></label>
                        <textarea wire:model="content" rows="4" class="w-full rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan"></textarea>
                        @error('content') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Rating -->
                        <div>
                            <label class="block text-sm font-medium text-digice-dark-slate mb-1">Rating Bintang <span class="text-red-500">*</span></label>
                            <select wire:model="rating" class="w-full rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan">
                                <option value="5">5 Bintang (⭐⭐⭐⭐⭐)</option>
                                <option value="4">4 Bintang (⭐⭐⭐⭐)</option>
                                <option value="3">3 Bintang (⭐⭐⭐)</option>
                                <option value="2">2 Bintang (⭐⭐)</option>
                                <option value="1">1 Bintang (⭐)</option>
                            </select>
                            @error('rating') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Urutan -->
                        <div>
                            <label class="block text-sm font-medium text-digice-dark-slate mb-1">Urutan Tampil (Sort Order)</label>
                            <input wire:model="sort_order" type="number" class="w-full rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan">
                            @error('sort_order') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Avatar -->
                    <div>
                        <label class="block text-sm font-medium text-digice-dark-slate mb-1">Avatar / Foto Profil</label>
                        <input wire:model="avatar" type="file" accept="image/jpeg,image/png,image/webp" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-digice-cyan/10 file:text-digice-cyan hover:file:bg-digice-cyan/20 transition-colors">
                        @error('avatar') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        <div wire:loading wire:target="avatar" class="text-xs text-blue-500 mt-1">Mengupload foto...</div>
                    </div>

                    <!-- Is Active -->
                    <div class="flex items-center gap-2 mt-4">
                        <input wire:model="is_active" type="checkbox" id="is_active" class="rounded border-gray-300 text-digice-cyan focus:ring-digice-cyan">
                        <label for="is_active" class="text-sm text-digice-dark-slate">Tampilkan di Halaman Utama</label>
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
                <h3 class="text-lg font-bold text-digice-dark-slate mb-2">Hapus Testimoni?</h3>
                <p class="text-sm text-digice-slate mb-6">Tindakan ini tidak bisa dibatalkan. Testimoni ini akan dihapus permanen.</p>
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
