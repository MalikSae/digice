<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>500 — Server Error | Digice</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css'])
</head>
<body class="bg-digice-navy font-sans min-h-screen flex items-center justify-center px-6">
  <div class="text-center max-w-md">

    <p class="text-[120px] font-bold text-red-500/20 leading-none select-none">500</p>

    <div class="w-16 h-16 bg-red-500/10 border border-red-500/20 rounded-2xl
                flex items-center justify-center mx-auto -mt-4">
      <!-- Heroicon: exclamation-triangle -->
      <svg class="w-8 h-8 text-red-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
      </svg>
    </div>

    <h1 class="text-white text-2xl font-bold mt-6">Terjadi kesalahan server</h1>
    <p class="text-digice-slate mt-3 text-sm leading-relaxed">
      Kami sedang menangani masalah ini. Silakan coba beberapa saat lagi
      atau hubungi kami jika masalah berlanjut.
    </p>

    <div class="mt-8 flex gap-3 justify-center">
      <a href="/"
         class="bg-digice-cyan text-digice-navy font-semibold px-6 py-3 rounded-full
                hover:bg-digice-cyan-soft transition-colors text-sm">
        ← Kembali ke Beranda
      </a>
      <a href="https://wa.me/6281222771761" target="_blank"
         class="border border-digice-border-dark text-digice-slate px-6 py-3 rounded-full
                hover:border-digice-cyan hover:text-digice-cyan transition-colors text-sm">
        Hubungi Kami
      </a>
    </div>

    <p class="mt-12 text-digice-border-dark text-xs">
      <span class="text-white font-semibold">Digi</span><span class="text-digice-cyan font-semibold">ce</span>
      · digice.net
    </p>

  </div>
</body>
</html>
