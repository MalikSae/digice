<div>
    <div class="bg-white rounded-xl shadow-sm border border-digice-border p-6">
        @if (session()->has('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-50 text-green-700 text-sm flex items-center gap-2">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit="save">
            <div class="space-y-6">
                <!-- Alamat -->
                <div>
                    <label for="address" class="block text-sm font-medium text-digice-dark-slate mb-1">
                        Alamat Lengkap
                    </label>
                    <textarea id="address" wire:model="address" rows="4"
                        class="w-full px-4 py-2 bg-white border border-digice-border rounded-lg text-sm focus:outline-none focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan transition-colors"
                        placeholder="Masukkan alamat lengkap kantor/perusahaan"></textarea>
                    @error('address') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- No Whatsapp -->
                <div>
                    <label for="whatsapp_number" class="block text-sm font-medium text-digice-dark-slate mb-1">
                        No Whatsapp
                    </label>
                    <input type="text" id="whatsapp_number" wire:model="whatsapp_number"
                        class="w-full px-4 py-2 bg-white border border-digice-border rounded-lg text-sm focus:outline-none focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan transition-colors"
                        placeholder="Contoh: 6281234567890">
                    <p class="text-xs text-digice-slate mt-1">Gunakan format 628... (tanpa tanda + dan spasi)</p>
                    @error('whatsapp_number') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-digice-border flex justify-end gap-3">
                <button type="submit"
                        class="px-5 py-2.5 bg-digice-navy text-white text-sm font-medium rounded-lg hover:bg-digice-navy/90 transition-colors inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                    </svg>
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
</div>
