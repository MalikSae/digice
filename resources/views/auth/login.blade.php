<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login — {{ config('app.name', 'Digice') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html, body { background-color: #0A1628; height: 100%; overflow: hidden; }

        /* ── Ambient glow blobs ─────────────────────────── */
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.18;
            pointer-events: none;
        }
        /* Grid pattern overlay */
        .grid-pattern {
            background-image:
                linear-gradient(rgba(34,211,238,0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(34,211,238,0.04) 1px, transparent 1px);
            background-size: 40px 40px;
        }
        /* Input focus glow */
        .digice-input:focus {
            outline: none;
            border-color: #22d3ee;
            box-shadow: 0 0 0 3px rgba(34,211,238,0.15);
        }
    </style>
</head>
<body class="font-sans antialiased" style="font-family: 'Inter', sans-serif;">

    {{-- ── Full-screen dark background ─────────────────── --}}
    <div class="relative min-h-screen flex items-center justify-center px-4"
         style="background-color: #0A1628;">

        {{-- Grid overlay --}}
        <div class="absolute inset-0 grid-pattern"></div>

        {{-- Ambient blobs --}}
        <div class="blob w-96 h-96 top-0 left-0 -translate-x-1/2 -translate-y-1/2"
             style="background:#22d3ee;"></div>
        <div class="blob w-72 h-72 bottom-0 right-0 translate-x-1/3 translate-y-1/3"
             style="background:#6366f1;"></div>

        {{-- ── Login Card ──────────────────────────────── --}}
        <div class="relative w-full max-w-md z-10">

            {{-- Logo --}}
            <div class="flex justify-center mb-8">
                <a href="/" class="block">
                    <img src="{{ asset('images/digice001-darkbg.png') }}"
                         alt="Digice Logo"
                         class="h-10 w-auto"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                    {{-- Fallback text logo --}}
                    <span class="text-2xl font-bold hidden items-center gap-1">
                        <span class="text-white">Digi</span><span style="color:#22d3ee;">ce</span>
                    </span>
                </a>
            </div>

            {{-- Card body --}}
            <div class="rounded-2xl border p-8"
                 style="background:rgba(255,255,255,0.03);
                        border-color:rgba(255,255,255,0.08);
                        backdrop-filter:blur(20px);
                        -webkit-backdrop-filter:blur(20px);
                        box-shadow:0 25px 60px rgba(0,0,0,0.5);">

                {{-- Heading --}}
                <h1 class="text-white text-2xl font-bold text-center mb-1">Selamat datang kembali</h1>
                <p class="text-center text-sm mb-8" style="color:#94a3b8;">
                    Login ke Dashboard Admin Digice
                </p>

                {{-- Session status --}}
                @if (session('status'))
                    <div class="mb-4 text-sm font-medium rounded-lg px-4 py-3"
                         style="background:rgba(34,211,238,0.1);color:#22d3ee;border:1px solid rgba(34,211,238,0.2);">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-5">
                        <label for="email" class="block text-sm font-medium mb-2" style="color:#cbd5e1;">
                            Email
                        </label>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               autocomplete="username"
                               placeholder="admin@digice.net"
                               class="digice-input w-full rounded-xl px-4 py-3 text-sm transition-all duration-200"
                               style="background:rgba(255,255,255,0.05);
                                      border:1px solid rgba(255,255,255,0.1);
                                      color:#f1f5f9;">
                        @error('email')
                            <p class="mt-2 text-xs" style="color:#f87171;">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-5">
                        <label for="password" class="block text-sm font-medium mb-2" style="color:#cbd5e1;">
                            Password
                        </label>
                        <input id="password"
                               type="password"
                               name="password"
                               required
                               autocomplete="current-password"
                               placeholder="••••••••"
                               class="digice-input w-full rounded-xl px-4 py-3 text-sm transition-all duration-200"
                               style="background:rgba(255,255,255,0.05);
                                      border:1px solid rgba(255,255,255,0.1);
                                      color:#f1f5f9;">
                        @error('password')
                            <p class="mt-2 text-xs" style="color:#f87171;">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Remember me --}}
                    <div class="flex items-center mb-6">
                        <label for="remember_me" class="flex items-center gap-2 cursor-pointer select-none">
                            <input id="remember_me"
                                   type="checkbox"
                                   name="remember"
                                   class="rounded"
                                   style="accent-color:#22d3ee;">
                            <span class="text-sm" style="color:#94a3b8;">Ingat saya</span>
                        </label>
                    </div>


                    {{-- Submit button --}}
                    <button type="submit"
                            class="w-full py-3.5 rounded-xl font-semibold text-sm transition-all duration-200 relative overflow-hidden group"
                            style="background:#22d3ee;color:#0A1628;
                                   box-shadow:0 0 20px rgba(34,211,238,0.3);">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            Masuk ke Dashboard
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>
                        </span>
                        {{-- Hover overlay --}}
                        <span class="absolute inset-0 opacity-0 group-hover:opacity-20 transition-opacity duration-200"
                              style="background:white;"></span>
                    </button>

                </form>
            </div>

            {{-- Back to site --}}
            <p class="text-center mt-6 text-sm" style="color:#475569;">
                <a href="/"
                   class="transition-colors"
                   style="color:#94a3b8;"
                   onmouseover="this.style.color='#22d3ee'"
                   onmouseout="this.style.color='#94a3b8'">
                    ← Kembali ke digice.net
                </a>
            </p>

        </div>
    </div>

</body>
</html>
