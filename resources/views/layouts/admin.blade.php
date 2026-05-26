<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title ?? 'Admin' }} — Digice</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <livewire:styles />
</head>
<body class="bg-digice-surface font-sans">

  <div class="flex h-screen overflow-hidden">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-digice-navy flex flex-col flex-shrink-0">

      <!-- Logo -->
      <div class="h-16 flex items-center px-6 border-b border-digice-border-dark">
        <img src="{{ asset('images/digice001-darkbg.png') }}" alt="Digice Logo" class="h-8 w-auto">
        <span class="ml-2 text-digice-slate text-xs">Admin</span>
      </div>

      <!-- Nav -->
      <nav class="flex-1 px-4 py-6 space-y-1">

        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                  {{ request()->routeIs('admin.dashboard') 
                     ? 'bg-digice-cyan/10 text-digice-cyan font-medium' 
                     : 'text-digice-slate hover:text-white hover:bg-white/5' }}">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
          </svg>
          Dashboard
        </a>

        <!-- Portfolio -->
        <a href="{{ route('admin.portfolio.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                  {{ request()->routeIs('admin.portfolio.*') 
                     ? 'bg-digice-cyan/10 text-digice-cyan font-medium' 
                     : 'text-digice-slate hover:text-white hover:bg-white/5' }}">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
          </svg>
          Portfolio
        </a>

        <!-- Tech Stack -->
        <a href="{{ route('admin.tech-stacks.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                  {{ request()->routeIs('admin.tech-stacks.*') 
                     ? 'bg-digice-cyan/10 text-digice-cyan font-medium' 
                     : 'text-digice-slate hover:text-white hover:bg-white/5' }}">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z" />
          </svg>
          Tech Stack
        </a>

        <!-- Testimoni -->
        <a href="{{ route('admin.testimonials.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                  {{ request()->routeIs('admin.testimonials.*') 
                     ? 'bg-digice-cyan/10 text-digice-cyan font-medium' 
                     : 'text-digice-slate hover:text-white hover:bg-white/5' }}">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
          </svg>
          Testimoni
        </a>

        <!-- Pengaturan -->
        <a href="{{ route('admin.setting.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                  {{ request()->routeIs('admin.setting.*') 
                     ? 'bg-digice-cyan/10 text-digice-cyan font-medium' 
                     : 'text-digice-slate hover:text-white hover:bg-white/5' }}">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688 0-1.37-.043-2.039-.126a1.5 1.5 0 0 1-1.332-1.42l-.184-2.232a13.935 13.935 0 0 1 0-4.144l.184-2.232a1.5 1.5 0 0 1 1.332-1.42c.67-.083 1.351-.126 2.039-.126s1.37.043 2.039.126a1.5 1.5 0 0 1 1.332 1.42l.184 2.232c.162 1.37.162 2.774 0 4.144l-.184 2.232a1.5 1.5 0 0 1-1.332 1.42c-.67.083-1.351.126-2.039.126Zm0 0a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          Pengaturan
        </a>

        <!-- Kelola Team -->
        <a href="{{ route('admin.team.index') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                  {{ request()->routeIs('admin.team.*') 
                     ? 'bg-digice-cyan/10 text-digice-cyan font-medium' 
                     : 'text-digice-slate hover:text-white hover:bg-white/5' }}">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.75 3.75 0 1 1-6.75 0 3.75 3.75 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
          </svg>
          Kelola Team
        </a>

      </nav>

      <!-- User info + logout -->
      <div class="px-4 py-4 border-t border-digice-border-dark">
        <div class="flex items-center gap-3 px-3 py-2">
          <div class="w-8 h-8 rounded-full bg-digice-cyan/20 flex items-center justify-center">
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
                  class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-digice-slate hover:text-white hover:bg-white/5 transition-colors">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
            </svg>
            Logout
          </button>
        </form>
      </div>

    </aside>

    <!-- MAIN AREA -->
    <div class="flex-1 flex flex-col overflow-hidden">

      <!-- TOPBAR -->
      <header class="h-16 bg-white border-b border-digice-border flex items-center justify-between px-6 flex-shrink-0">
        <div>
          <h1 class="text-digice-dark-slate font-semibold text-base">{{ $pageTitle ?? 'Dashboard' }}</h1>
          <p class="text-digice-slate text-xs">{{ $pageSubtitle ?? 'Selamat datang, ' . auth()->user()->name }}</p>
        </div>
        <div class="flex items-center gap-3">
          <a href="{{ route('home') }}" target="_blank"
             class="text-digice-slate hover:text-digice-royal text-xs flex items-center gap-1 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
            </svg>
            Lihat Website
          </a>
        </div>
      </header>

      <!-- CONTENT -->
      <main class="flex-1 overflow-y-auto p-6">
        {{ $slot }}
      </main>

    </div>

  </div>

  <livewire:scripts />
  @stack('scripts')

</body>
</html>
