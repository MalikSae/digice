<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Digice — We Build What Your Business Needs' }}</title>
  <meta name="description" content="{{ $description ?? 'Digice membantu Anda wujudkan kebutuhan digital bisnis — dari website, aplikasi, hingga sistem custom.' }}">

  <!-- OG Tags -->
  <meta property="og:title" content="{{ $title ?? 'Digice' }}">
  <meta property="og:description" content="{{ $description ?? 'We Build What Your Business Needs' }}">
  <meta property="og:type" content="website">

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
