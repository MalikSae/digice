<div>
    <!-- HEADER BAR -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3 min-w-0">
            <h2 class="text-lg md:text-xl font-bold text-digice-dark-slate truncate">Kelola Team</h2>
            <span class="px-2 py-1 text-xs font-medium bg-digice-navy/10 text-digice-navy rounded-full flex-shrink-0">
                {{ $this->users->count() }} Admin
            </span>
        </div>
        <button wire:click="openCreate"
                class="flex-shrink-0 px-3 md:px-4 py-2 bg-digice-navy text-white text-sm font-medium rounded-lg hover:bg-digice-navy/90 transition-colors shadow-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span class="hidden sm:inline">Tambah Admin</span>
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
            <input wire:model.live="search"
                   type="text"
                   placeholder="Cari nama atau email..."
                   class="pl-10 w-full rounded-xl border border-digice-border focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan py-2 text-sm text-digice-dark-slate placeholder-gray-400 transition-colors bg-white">
        </div>
    </div>

    <!-- TABLE -->
    @if($this->users->count() > 0)
        <div class="bg-white rounded-xl border border-digice-border shadow-card overflow-hidden">
          <div class="overflow-x-auto">
            <table class="w-full text-sm min-w-[560px]">
                <thead>
                    <tr class="border-b border-digice-border bg-gray-50">
                        <th class="text-left px-6 py-3 text-xs font-semibold text-digice-slate uppercase tracking-wider">Admin</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-digice-slate uppercase tracking-wider">Email</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-digice-slate uppercase tracking-wider">Bergabung</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-digice-slate uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-digice-border">
                    @foreach($this->users as $user)
                        <tr class="hover:bg-gray-50 transition-colors group">
                            <!-- Avatar + Name -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0
                                                {{ $user->id === auth()->id() ? 'bg-digice-cyan/20 text-digice-cyan' : 'bg-digice-navy/10 text-digice-navy' }}">
                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <p class="font-medium text-digice-dark-slate">{{ $user->name }}</p>
                                        @if($user->id === auth()->id())
                                            <span class="text-[10px] font-semibold text-digice-cyan uppercase tracking-wider">Anda</span>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <!-- Email -->
                            <td class="px-6 py-4 text-digice-slate">{{ $user->email }}</td>

                            <!-- Tanggal bergabung -->
                            <td class="px-6 py-4 text-digice-slate">
                                {{ $user->created_at->format('d M Y') }}
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 inline-block"></span>
                                    Aktif
                                </span>
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-1 justify-end opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button wire:click="openEdit({{ $user->id }})"
                                            class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                            title="Edit">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                        </svg>
                                    </button>
                                    @if($user->id !== auth()->id())
                                        <button wire:click="confirmDelete({{ $user->id }})"
                                                class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                                                title="Hapus">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>{{-- /overflow-x-auto --}}
        </div>{{-- /card --}}
    @else
        <!-- EMPTY STATE -->
        <div class="text-center py-16 bg-white border border-digice-border border-dashed rounded-2xl">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
            <h3 class="text-base font-semibold text-digice-dark-slate">Tidak ada admin ditemukan</h3>
            <p class="text-sm text-digice-slate mt-1 mb-6">Pencarian tidak menemukan hasil.</p>
        </div>
    @endif

    <!-- MODAL FORM (Create / Edit) -->
    @if($showModal)
        <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-card-lg w-full max-w-md p-6">
                <!-- Header Modal -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-digice-cyan/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-digice-cyan" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-digice-dark-slate">
                            {{ $editingId ? 'Edit Admin' : 'Tambah Admin Baru' }}
                        </h3>
                    </div>
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
                        <label class="block text-sm font-medium text-digice-dark-slate mb-1">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input wire:model="name"
                               type="text"
                               placeholder="Nama admin"
                               class="w-full rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan">
                        @error('name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-digice-dark-slate mb-1">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input wire:model="email"
                               type="email"
                               placeholder="admin@digice.net"
                               class="w-full rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan">
                        @error('email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-medium text-digice-dark-slate mb-1">
                            Password
                            @if($editingId)
                                <span class="text-xs font-normal text-digice-slate">(kosongkan jika tidak ingin mengubah)</span>
                            @else
                                <span class="text-red-500">*</span>
                            @endif
                        </label>
                        <input wire:model="password"
                               type="password"
                               placeholder="{{ $editingId ? '••••••••' : 'Min. 8 karakter' }}"
                               class="w-full rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan">
                        @error('password') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Konfirmasi Password -->
                    <div>
                        <label class="block text-sm font-medium text-digice-dark-slate mb-1">
                            Konfirmasi Password
                            @if(!$editingId)<span class="text-red-500">*</span>@endif
                        </label>
                        <input wire:model="password_confirmation"
                               type="password"
                               placeholder="Ulangi password"
                               class="w-full rounded-lg border border-digice-border px-3 py-2 text-sm focus:border-digice-cyan focus:ring-1 focus:ring-digice-cyan">
                        @error('password_confirmation') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Footer Modal -->
                <div class="mt-6 flex justify-end gap-3">
                    <button wire:click="closeModal"
                            class="px-4 py-2 text-sm font-medium text-digice-slate bg-white border border-digice-border rounded-lg hover:bg-gray-50 transition-colors">
                        Batal
                    </button>
                    <button wire:click="save"
                            wire:loading.attr="disabled"
                            class="px-5 py-2 text-sm font-medium text-digice-navy bg-digice-cyan rounded-lg hover:bg-digice-cyan/90 transition-colors disabled:opacity-60 flex items-center gap-2">
                        <span wire:loading.remove wire:target="save">Simpan</span>
                        <span wire:loading wire:target="save">Menyimpan...</span>
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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-digice-dark-slate mb-2">Hapus Admin?</h3>
                <p class="text-sm text-digice-slate mb-6">Admin ini tidak akan dapat login ke dashboard. Tindakan ini tidak bisa dibatalkan.</p>
                <div class="flex gap-3 justify-center">
                    <button wire:click="closeModal"
                            class="px-4 py-2 text-sm font-medium text-digice-slate bg-white border border-digice-border rounded-lg hover:bg-gray-50 transition-colors flex-1">
                        Batal
                    </button>
                    <button wire:click="delete"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors flex-1">
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
