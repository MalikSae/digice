<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $pageTitle ?? 'Admin' }} — Digice</title>
  <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <livewire:styles />
</head>
<body class="bg-digice-surface font-sans">

  <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">

    {{-- ══════════════════════════════════════════
         OVERLAY (mobile only) – tap to close sidebar
    ══════════════════════════════════════════ --}}
    <div x-show="sidebarOpen"
         x-transition:enter="transition-opacity ease-linear duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 z-20 bg-black/60 lg:hidden"
         style="display:none;"></div>

    {{-- ══════════════════════════════════════════
         SIDEBAR
         — Mobile: off-canvas slide from left (z-30)
         — Desktop: always visible (lg:static)
    ══════════════════════════════════════════ --}}
    <aside class="fixed inset-y-0 left-0 z-30 w-64 bg-digice-navy flex flex-col flex-shrink-0
                  transform transition-transform duration-200 ease-in-out
                  lg:static lg:translate-x-0"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

      <!-- Logo + close button (mobile) -->
      <div class="h-16 flex items-center justify-between px-6 border-b border-digice-border-dark flex-shrink-0">
        <a href="{{ route('admin.dashboard') }}">
          <img src="{{ asset('images/digice001-darkbg.png') }}" alt="Digice Logo" class="h-8 w-auto">
        </a>
        <!-- Close button — mobile only -->
        <button @click="sidebarOpen = false"
                class="lg:hidden text-digice-slate hover:text-white p-1 rounded-lg transition-colors"
                aria-label="Tutup menu">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>

      <!-- Nav -->
      <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto" aria-label="Navigasi Admin">

        @php
          $navItems = [
            ['route' => 'admin.dashboard',        'pattern' => 'admin.dashboard',     'label' => 'Dashboard',     'icon' => 'M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z'],
            ['route' => 'admin.portfolio.index',  'pattern' => 'admin.portfolio.*',   'label' => 'Portfolio',     'icon' => 'M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776'],
            ['route' => 'admin.tech-stacks.index','pattern' => 'admin.tech-stacks.*', 'label' => 'Tech Stack',   'icon' => 'M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z'],
            ['route' => 'admin.testimonials.index','pattern' => 'admin.testimonials.*','label' => 'Testimoni',   'icon' => 'M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z'],
            ['route' => 'admin.setting.index',    'pattern' => 'admin.setting.*',     'label' => 'Pengaturan',   'icon' => 'M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28ZM15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z'],
            ['route' => 'admin.team.index',       'pattern' => 'admin.team.*',        'label' => 'Kelola Team',  'icon' => 'M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.75 3.75 0 1 1-6.75 0 3.75 3.75 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z'],
          ];
        @endphp

        @foreach($navItems as $item)
          <a href="{{ route($item['route']) }}"
             @click="sidebarOpen = false"
             class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors min-h-[44px]
                    {{ request()->routeIs($item['pattern'])
                       ? 'bg-digice-cyan/10 text-digice-cyan font-medium'
                       : 'text-digice-slate hover:text-white hover:bg-white/5' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/>
            </svg>
            <span>{{ $item['label'] }}</span>
          </a>
        @endforeach

      </nav>

      <!-- User info + logout -->
      <div class="px-4 py-4 border-t border-digice-border-dark flex-shrink-0">
        <div class="flex items-center gap-3 px-3 py-2">
          <div class="w-8 h-8 rounded-full bg-digice-cyan/20 flex items-center justify-center flex-shrink-0">
            <span class="text-digice-cyan text-xs font-medium">
              {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </span>
          </div>
          <div class="flex-1 min-w-0">
            <p class="text-white text-sm font-medium truncate">{{ auth()->user()->name }}</p>
            <p class="text-digice-slate text-xs truncate">{{ auth()->user()->email }}</p>
          </div>
        </div>
        <form method="POST" action="{{ route('logout') }}" class="mt-2">
          @csrf
          <button type="submit"
                  class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-digice-slate hover:text-white hover:bg-white/5 transition-colors min-h-[44px]">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"/>
            </svg>
            Logout
          </button>
        </form>
      </div>

    </aside>

    <!-- MAIN AREA -->
    <div class="flex-1 flex flex-col overflow-hidden min-w-0">

      <!-- TOPBAR -->
      <header class="h-16 bg-white border-b border-digice-border flex items-center justify-between px-4 md:px-6 flex-shrink-0">
        <div class="flex items-center gap-3 min-w-0">
          <!-- Hamburger — mobile only -->
          <button @click="sidebarOpen = true"
                  class="lg:hidden p-2 rounded-lg text-digice-slate hover:text-digice-dark-slate hover:bg-gray-100 transition-colors flex-shrink-0"
                  aria-label="Buka menu">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
            </svg>
          </button>
          <div class="min-w-0">
            <h1 class="text-digice-dark-slate font-semibold text-sm md:text-base truncate">{{ $pageTitle ?? 'Dashboard' }}</h1>
            <p class="text-digice-slate text-xs truncate hidden sm:block">{{ $pageSubtitle ?? 'Selamat datang, ' . auth()->user()->name }}</p>
          </div>
        </div>

        <div class="flex items-center gap-2 flex-shrink-0">
          <a href="{{ route('home') }}" target="_blank"
             class="text-digice-slate hover:text-digice-royal text-xs flex items-center gap-1 transition-colors px-2 py-1.5 rounded-lg hover:bg-gray-50 whitespace-nowrap">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
            </svg>
            <span class="hidden sm:inline">Lihat Website</span>
          </a>
        </div>
      </header>

      <!-- CONTENT -->
      <main class="flex-1 overflow-y-auto p-4 md:p-6">
        {{ $slot }}
      </main>

    </div>

  </div>

  <livewire:scripts />
  @stack('scripts')

</body>
</html>
