<div>
    <form wire:submit="save">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- KOLOM KIRI (Form Utama) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- CARD 1: Informasi Project -->
                <div class="bg-white rounded-xl border border-digice-border p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-digice-dark-slate mb-4">Informasi Project</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-digice-dark-slate mb-1">Nama Project <span class="text-red-500">*</span></label>
                            <input wire:model="name" type="text" placeholder="Contoh: Sistem Manajemen Umroh" class="w-full rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan bg-white">
                            @error('name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-digice-dark-slate mb-1">Deskripsi</label>
                            <textarea wire:model.live="description" rows="4" placeholder="Deskripsi singkat project..." class="w-full rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan bg-white"></textarea>
                            <div class="flex justify-between mt-1">
                                @error('description') <span class="text-xs text-red-500">{{ $message }}</span> @else <span></span> @enderror
                                <span class="text-xs text-gray-500" x-data="{ count: 0 }" x-init="$watch('$wire.description', value => count = value ? value.length : 0)"><span x-text="count"></span>/1000</span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-digice-dark-slate mb-1">URL Live Project</label>
                            <input wire:model="url" type="url" placeholder="https://..." class="w-full rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan bg-white">
                            @error('url') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <!-- CARD 2: Screenshots -->
                <div class="bg-white rounded-xl border border-digice-border p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-digice-dark-slate mb-1">Screenshots</h3>
                    <p class="text-xs text-gray-500 mb-4">Upload multiple screenshot. Format: JPG, PNG, WebP. Maks 2MB per file.</p>
                    
                    @if(count($existingScreenshots) > 0)
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-4">
                            @foreach($existingScreenshots as $screenshot)
                                <div class="relative aspect-video rounded-lg overflow-hidden bg-digice-surface group border border-digice-border">
                                    <img src="{{ $screenshot['original_url'] }}" class="w-full h-full object-cover">
                                    <button type="button" wire:click="deleteExistingScreenshot({{ $screenshot['id'] }})" wire:confirm="Hapus screenshot ini?" class="absolute top-2 right-2 bg-red-500/90 text-white rounded-full w-7 h-7 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-600 shadow-sm" title="Hapus screenshot">
                                        ✕
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="relative">
                        <input wire:model="screenshots" type="file" multiple accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" title="">
                        <div class="w-full border-2 border-dashed border-digice-border rounded-xl p-8 text-center bg-gray-50 hover:bg-gray-100 transition-colors">
                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-blue-50 text-blue-600 mb-3">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-digice-dark-slate">Klik atau drag & drop screenshot di sini</p>
                        </div>
                    </div>
                    
                    <div wire:loading wire:target="screenshots" class="text-xs text-blue-600 mt-2">Uploading...</div>

                    @if($screenshots)
                        <div class="mt-4 space-y-2">
                            @foreach($screenshots as $screenshot)
                                <div class="flex items-center justify-between p-2 bg-blue-50/50 rounded-lg border border-blue-100 text-xs">
                                    <span class="truncate pr-4 font-medium text-blue-800">{{ $screenshot->getClientOriginalName() }}</span>
                                    <span class="text-blue-600 whitespace-nowrap">{{ round($screenshot->getSize() / 1024, 1) }} KB</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @error('screenshots.*') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    @error('screenshots') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- CARD 3: Tech Stack -->
                <div class="bg-white rounded-xl border border-digice-border p-6 shadow-sm" x-data="{ filter: 'Semua' }">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-digice-dark-slate">Tech Stack yang Digunakan</h3>
                        <span class="text-sm font-medium bg-blue-50 text-blue-700 px-2 py-1 rounded-full">{{ count($selectedTechStacks) }} dipilih</span>
                    </div>
                    
                    <!-- Quick Filters -->
                    <div class="flex flex-wrap gap-2 mb-4 pb-4 border-b border-digice-border/50">
                        <button type="button" @click="filter = 'Semua'" :class="filter === 'Semua' ? 'bg-digice-cyan text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-3 py-1.5 rounded-lg text-xs font-medium transition-colors">Semua</button>
                        <button type="button" @click="filter = 'Frontend'" :class="filter === 'Frontend' ? 'bg-blue-500 text-white' : 'bg-blue-50 text-blue-600 hover:bg-blue-100'" class="px-3 py-1.5 rounded-lg text-xs font-medium transition-colors">Frontend</button>
                        <button type="button" @click="filter = 'Backend'" :class="filter === 'Backend' ? 'bg-red-500 text-white' : 'bg-red-50 text-red-600 hover:bg-red-100'" class="px-3 py-1.5 rounded-lg text-xs font-medium transition-colors">Backend</button>
                        <button type="button" @click="filter = 'Mobile'" :class="filter === 'Mobile' ? 'bg-purple-500 text-white' : 'bg-purple-50 text-purple-600 hover:bg-purple-100'" class="px-3 py-1.5 rounded-lg text-xs font-medium transition-colors">Mobile</button>
                        <button type="button" @click="filter = 'Database'" :class="filter === 'Database' ? 'bg-green-500 text-white' : 'bg-green-50 text-green-600 hover:bg-green-100'" class="px-3 py-1.5 rounded-lg text-xs font-medium transition-colors">Database</button>
                    </div>

                    <!-- Tech Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 max-h-80 overflow-y-auto pr-2 custom-scrollbar">
                        @foreach($allTechStacks as $tech)
                            <label x-show="filter === 'Semua' || filter === '{{ $tech['category'] }}'" class="flex items-center gap-3 p-2.5 rounded-lg border border-transparent hover:border-gray-200 hover:bg-gray-50 cursor-pointer transition-colors has-[:checked]:bg-blue-50 has-[:checked]:border-blue-200">
                                <input type="checkbox" wire:model="selectedTechStacks" value="{{ $tech['id'] }}" class="rounded border-gray-300 text-digice-cyan focus:ring-digice-cyan">
                                <div class="flex items-center gap-2">
                                    @if($tech['icon'])
                                        <img src="https://cdn.simpleicons.org/{{ $tech['icon'] }}/64748B" class="w-4 h-4 object-contain" onerror="this.style.display='none'">
                                    @else
                                        <span class="w-4 h-4 rounded-full bg-gray-200 inline-block"></span>
                                    @endif
                                    <span class="text-sm text-digice-dark-slate">{{ $tech['name'] }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- KOLOM KANAN (Sidebar Settings) -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl border border-digice-border p-6 shadow-sm sticky top-6">
                    <h3 class="text-lg font-bold text-digice-dark-slate mb-4">Pengaturan</h3>
                    
                    <div class="space-y-5">
                        <!-- Kategori -->
                        <div>
                            <label class="block text-sm font-medium text-digice-dark-slate mb-1">Kategori <span class="text-red-500">*</span></label>
                            <select wire:model="category" class="w-full rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan bg-white">
                                <option value="">Pilih kategori</option>
                                <option value="Website">Website</option>
                                <option value="Web App">Web App</option>
                                <option value="E-Commerce">E-Commerce</option>
                                <option value="Marketing">Marketing</option>
                            </select>
                            @error('category') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Sort Order -->
                        <div>
                            <label class="block text-sm font-medium text-digice-dark-slate mb-1">Sort Order</label>
                            <input wire:model="sort_order" type="number" min="0" class="w-full rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan bg-white">
                            <p class="text-xs text-gray-500 mt-1">Urutan tampil di landing page (angka kecil = tampil lebih awal)</p>
                            @error('sort_order') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Toggle Featured -->
                        <div class="pt-2 border-t border-gray-100">
                            <label class="flex items-center justify-between cursor-pointer">
                                <div>
                                    <span class="block text-sm font-medium text-digice-dark-slate">Tampilkan di Landing Page</span>
                                </div>
                                <button type="button" wire:click="$toggle('is_featured')" class="{{ $is_featured ? 'bg-digice-cyan' : 'bg-gray-200' }} relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-digice-cyan focus:ring-offset-2" role="switch" aria-checked="{{ $is_featured ? 'true' : 'false' }}">
                                    <span aria-hidden="true" class="{{ $is_featured ? 'translate-x-5' : 'translate-x-0' }} pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                                </button>
                            </label>
                            <p class="text-xs text-gray-500 mt-1">Jika aktif, project akan muncul di section portfolio landing page</p>
                        </div>

                        <hr class="border-gray-100">

                        <!-- Actions -->
                        <div class="space-y-3 pt-2">
                            <button type="submit" class="w-full px-4 py-2 bg-digice-cyan text-white text-sm font-medium rounded-lg hover:bg-digice-cyan/90 transition-colors shadow-sm flex items-center justify-center gap-2">
                                <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                {{ $isEditing ? 'Update Portfolio' : 'Simpan Portfolio' }}
                            </button>
                            <a href="{{ route('admin.portfolio.index') }}" class="w-full block text-center px-4 py-2 text-sm font-medium text-digice-slate hover:bg-gray-50 rounded-lg transition-colors border border-transparent hover:border-gray-200">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
