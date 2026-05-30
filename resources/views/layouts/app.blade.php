<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <!-- Primary Meta Tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="index, follow">
  <meta name="theme-color" content="#0A1628">
  <title>{{ $title ?? 'Digice — We Build What Your Business Needs' }}</title>
  <meta name="description" content="{{ $description ?? 'Digice membantu Anda wujudkan kebutuhan digital bisnis — dari website, aplikasi, hingga sistem custom yang benar-benar bekerja untuk Anda.' }}">
  <meta name="keywords" content="web developer indonesia, jasa website, jasa aplikasi, digital agency, sistem custom, laravel developer, web development cirebon">
  <meta name="author" content="Digice">
  <link rel="canonical" href="{{ url()->current() }}">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:title" content="{{ $title ?? 'Digice — We Build What Your Business Needs' }}">
  <meta property="og:description" content="{{ $description ?? 'Digice membantu Anda wujudkan kebutuhan digital bisnis — dari website, aplikasi, hingga sistem custom.' }}">
  <meta property="og:image" content="{{ $ogImage ?? asset('images/og-image.svg') }}">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:locale" content="id_ID">
  <meta property="og:site_name" content="Digice">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ $title ?? 'Digice — We Build What Your Business Needs' }}">
  <meta name="twitter:description" content="{{ $description ?? 'Digice membantu Anda wujudkan kebutuhan digital bisnis.' }}">
  <meta name="twitter:image" content="{{ $ogImage ?? asset('images/og-image.svg') }}">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
  {{ $slot }}
</body>
</html>
