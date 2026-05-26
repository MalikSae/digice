<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 — Halaman Tidak Ditemukan | Digice</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css'])
</head>
<body class="bg-digice-navy font-sans min-h-screen flex items-center justify-center px-6">
  <div class="text-center max-w-md">

    <!-- Angka 404 besar -->
    <p class="text-[120px] font-bold text-digice-cyan/20 leading-none select-none">404</p>

    <!-- Icon -->
    <div class="w-16 h-16 bg-digice-cyan/10 border border-digice-cyan/20 rounded-2xl
                flex items-center justify-center mx-auto -mt-4">
      <!-- Heroicon: magnifying-glass -->
      <svg class="w-8 h-8 text-digice-cyan" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 15.803a7.5 7.5 0 0 0 10.607 0z"/>
      </svg>
    </div>

    <h1 class="text-white text-2xl font-bold mt-6">Halaman tidak ditemukan</h1>
    <p class="text-digice-slate mt-3 text-sm leading-relaxed">
      Halaman yang Anda cari tidak ada atau sudah dipindahkan.
      Coba kembali ke halaman utama.
    </p>

    <div class="mt-8 flex gap-3 justify-center">
      <a href="/"
         class="bg-digice-cyan text-digice-navy font-semibold px-6 py-3 rounded-full
                hover:bg-digice-cyan-soft transition-colors text-sm">
        ← Kembali ke Beranda
      </a>
      <a href="/#kontak"
         class="border border-digice-border-dark text-digice-slate px-6 py-3 rounded-full
                hover:border-digice-cyan hover:text-digice-cyan transition-colors text-sm">
        Hubungi Kami
      </a>
    </div>

    <!-- Branding kecil -->
    <p class="mt-12 text-digice-border-dark text-xs">
      <span class="text-white font-semibold">Digi</span><span class="text-digice-cyan font-semibold">ce</span>
      · digice.net
    </p>

  </div>
</body>
</html>
