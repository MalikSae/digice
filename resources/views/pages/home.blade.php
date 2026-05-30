<x-app-layout>
    <!-- NAVBAR -->
    <nav x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 bg-digice-navy/95 backdrop-blur border-b border-digice-border-dark h-16">
        <div class="max-w-7xl mx-auto px-6 h-full flex items-center justify-between">
            <!-- Kiri: Logo -->
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/digice001-darkbg.png') }}" alt="Digice Logo" loading="eager" decoding="async" class="h-8 w-auto">
            </a>

            <!-- Tengah: Menu Links (Hidden di Mobile) -->
            <div class="hidden md:flex items-center gap-8">
                <a href="#layanan" class="text-digice-slate hover:text-white text-sm font-medium transition-colors">Layanan</a>
                <a href="#portofolio" class="text-digice-slate hover:text-white text-sm font-medium transition-colors">Portofolio</a>
                <a href="#cara-kerja" class="text-digice-slate hover:text-white text-sm font-medium transition-colors">Cara Kerja</a>
                <a href="#kontak" class="text-digice-slate hover:text-white text-sm font-medium transition-colors">Kontak</a>
            </div>

            <!-- Kanan: CTA Button (Hidden di Mobile) -->
            <div class="hidden md:block">
                <a href="#kontak" class="magnetic-btn inline-block bg-digice-cyan text-digice-navy text-sm font-semibold px-5 py-2.5 rounded-full hover:bg-digice-cyan/90 transition-colors">
                    Mulai Diskusi &rarr;
                </a>
            </div>

            <!-- Mobile Hamburger -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white p-2">
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg x-show="mobileMenuOpen" style="display:none;" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-transition style="display:none;" class="md:hidden absolute top-16 left-0 right-0 bg-digice-navy border-b border-digice-border-dark p-6 shadow-xl">
            <div class="flex flex-col gap-4">
                <a href="#layanan" @click="mobileMenuOpen = false" class="text-white text-base font-medium">Layanan</a>
                <a href="#portofolio" @click="mobileMenuOpen = false" class="text-white text-base font-medium">Portofolio</a>
                <a href="#cara-kerja" @click="mobileMenuOpen = false" class="text-white text-base font-medium">Cara Kerja</a>
                <a href="#kontak" @click="mobileMenuOpen = false" class="text-white text-base font-medium">Kontak</a>
                <a href="#kontak" @click="mobileMenuOpen = false" class="bg-digice-cyan text-digice-navy text-center text-sm font-semibold px-5 py-3 rounded-full mt-4">
                    Mulai Diskusi &rarr;
                </a>
            </div>
        </div>
    </nav>

    <!-- SECTION 1: HERO -->
    <section id="beranda" class="relative bg-digice-navy min-h-screen flex items-center py-32 overflow-hidden">
        <!-- Video Background Start -->
        <video 
            autoplay 
            loop 
            muted 
            playsinline 
            preload="auto"
            poster="{{ asset('img/hero-poster.jpg') }}" 
            class="absolute inset-0 w-full h-full object-cover z-0 opacity-30"
        >
            <source src="{{ asset('video/hero-bg.mp4') }}" type="video/mp4">
            <!-- <source src="{{ asset('video/hero-bg.webm') }}" type="video/webm"> (opsional, untuk kompresi lebih baik) -->
        </video>
        
        <!-- Gradient Overlay agar text tetap terbaca -->
        <div class="absolute inset-0 bg-gradient-to-b from-digice-navy/90 via-digice-navy/60 to-digice-navy z-0 pointer-events-none"></div>
        <!-- Video Background End -->

        <div class="relative z-10 max-w-4xl mx-auto text-center px-6">
            <!-- Badge -->
            <span class="inline-flex items-center gap-2 bg-digice-cyan/10 border border-digice-cyan/20 text-digice-cyan text-xs font-medium px-4 py-1.5 rounded-full mb-6 font-mono tracking-wide">
                <span class="text-digice-cyan font-bold text-sm">&lt;/&gt;</span>
                Code & Tech Studio
            </span>

            <!-- Headline -->
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-bold text-white leading-tight px-4 md:px-0">
                We Build<br>
                <span class="text-digice-cyan font-mono relative inline-block my-2">
                    <span id="typewriter-text"></span><span class="inline-block w-1.5 md:w-2 bg-digice-cyan h-[0.85em] align-baseline ml-1 animate-blink"></span>
                </span><br>
                For Your Business.
            </h1>

            <!-- Subheadline -->
            <p class="text-digice-slate text-lg md:text-xl max-w-2xl mx-auto leading-relaxed mt-6">
                Kami bantu wujudkan kebutuhan digitalisasi bisnis Anda — dari website, aplikasi, hingga sistem custom yang benar-benar sesuai dengan kebutuhan bisnis Anda.
            </p>

            <!-- CTA -->
            <div class="mt-10 flex flex-col md:flex-row gap-4 justify-center">
                <a href="#kontak" class="magnetic-btn w-full md:w-auto text-center bg-digice-cyan text-digice-navy font-semibold px-8 py-4 rounded-full hover:bg-digice-cyan/90 shadow-[0_0_20px_rgba(34,211,238,0.3)] transition-colors inline-block">
                    Diskusi Project Anda &rarr;
                </a>
                <a href="#portofolio" class="w-full md:w-auto text-center border border-digice-border-dark text-white px-8 py-4 rounded-full hover:border-digice-cyan hover:text-digice-cyan transition-colors inline-block">
                    Lihat Portofolio
                </a>
            </div>

            <!-- Supporting -->
            <p class="text-digice-slate text-sm mt-4">Gratis konsultasi. Tanpa komitmen.</p>
        </div>
    </section>

    <!-- SECTION 2: SOCIAL PROOF BAR -->
    <section class="bg-digice-midnight border-y border-digice-border-dark py-6">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="text-center">
                <p class="text-2xl font-bold text-white">20+</p>
                <p class="text-digice-slate text-sm mt-0.5">Project Delivered</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold text-white">10+</p>
                <p class="text-digice-slate text-sm mt-0.5">Tahun Pengalaman</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold text-white">4</p>
                <p class="text-digice-slate text-sm mt-0.5">Sektor Industri</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold text-white">100%</p>
                <p class="text-digice-slate text-sm mt-0.5">Support After Launch</p>
            </div>
        </div>
    </section>

    <!-- SECTION 3: LAYANAN -->
    <section id="layanan" class="bg-gray-50 py-24 px-6">
        <div class="max-w-2xl mx-auto text-center">
            <span class="text-digice-cyan text-sm font-semibold uppercase tracking-widest">Apa yang Kami Kerjakan</span>
            <h2 class="text-4xl font-bold text-digice-dark-slate mt-3">Apapun yang Anda butuhkan<br>secara digital — kami bisa bangun.</h2>
            <p class="text-gray-500 mt-4">Ceritakan kebutuhan Anda, kami yang fikirkan solusinya.</p>
        </div>

        <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
            <!-- Card 1 -->
            <div class="scroll-reveal opacity-0 translate-y-10 transition-all duration-700 ease-out">
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 h-full">
                    <div class="w-12 h-12 rounded-xl bg-digice-cyan/10 flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-digice-cyan" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-digice-dark-slate mb-3">Website Profesional</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Butuh website yang merepresentasikan bisnis Anda dengan kuat? Kami bangun company profile, landing page, portal, atau website apapun sesuai tujuan Anda.</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="scroll-reveal opacity-0 translate-y-10 transition-all duration-700 ease-out" style="transition-delay: 100ms;">
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 h-full">
                    <div class="w-12 h-12 rounded-xl bg-digice-cyan/10 flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-digice-cyan" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-digice-dark-slate mb-3">Aplikasi & Sistem Custom</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Punya proses bisnis yang butuh diotomatisasi? Kami bangun CRM, sistem manajemen, platform booking, atau aplikasi internal sesuai kebutuhan spesifik Anda — bukan template.</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="scroll-reveal opacity-0 translate-y-10 transition-all duration-700 ease-out" style="transition-delay: 200ms;">
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 h-full">
                    <div class="w-12 h-12 rounded-xl bg-digice-cyan/10 flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-digice-cyan" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-digice-dark-slate mb-3">Toko Online & E-Commerce</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Ingin jualan online dengan sistem yang rapi? Dari toko sederhana hingga platform kompleks dengan pembayaran, afiliasi, dan manajemen produk — kami tangani semuanya.</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="scroll-reveal opacity-0 translate-y-10 transition-all duration-700 ease-out" style="transition-delay: 300ms;">
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 h-full">
                    <div class="w-12 h-12 rounded-xl bg-digice-cyan/10 flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-digice-cyan" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-digice-dark-slate mb-3">Digital Marketing & Funnel</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Sudah punya website tapi belum menghasilkan? Kami bantu rancang strategi Meta Ads, funnel konversi, dan optimasi iklan agar setiap rupiah bekerja maksimal.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3.5: TECH STACK (INFINITY MARQUEE) -->
    <section id="tech-stack" class="bg-white py-20 overflow-hidden relative border-y border-gray-100">
        <!-- Glow background effect -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[300px] bg-digice-cyan/5 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="max-w-4xl mx-auto text-center relative z-10 mb-12 px-6">
            <span class="text-digice-cyan text-xs font-bold uppercase tracking-[0.2em] mb-3 block">Powered By World-Class Technology</span>
            <p class="text-gray-500 text-sm md:text-base">Kami membangun sistem Anda di atas infrastruktur dan framework standar industri global, memastikan keamanan, kecepatan, dan skalabilitas maksimal.</p>
        </div>

        <div class="marquee-mask relative flex flex-col gap-8 w-full max-w-[100vw]">
            
            <!-- ROW 1 (Berjalan ke Kiri) -->
            <div class="flex animate-marquee-left w-max hover:[animation-play-state:paused]">
                <!-- SET 1 -->
                <div class="flex items-center justify-around gap-16 px-8 min-w-max">
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/laravel/FF2D20" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(255,45,32,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Laravel</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/vuedotjs/4FC08D" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(79,192,141,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Vue.js</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/tailwindcss/06B6D4" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(6,182,212,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Tailwind</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/nodedotjs/5FA04E" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(95,160,78,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Node.js</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/docker/2496ED" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(36,150,237,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Docker</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/redis/DC382D" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(220,56,45,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Redis</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/figma/F24E1E" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(242,78,30,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Figma</span>
                    </div>
                </div>
                <!-- SET 2 (Duplicate for Loop) -->
                <div class="flex items-center justify-around gap-16 px-8 min-w-max">
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/laravel/FF2D20" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(255,45,32,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Laravel</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/vuedotjs/4FC08D" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(79,192,141,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Vue.js</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/tailwindcss/06B6D4" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(6,182,212,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Tailwind</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/nodedotjs/5FA04E" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(95,160,78,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Node.js</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/docker/2496ED" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(36,150,237,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Docker</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/redis/DC382D" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(220,56,45,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Redis</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/figma/F24E1E" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(242,78,30,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Figma</span>
                    </div>
                </div>
            </div>

            <!-- ROW 2 (Berjalan ke Kanan) -->
            <div class="flex animate-marquee-right w-max hover:[animation-play-state:paused] mt-6">
                <!-- SET 1 -->
                <div class="flex items-center justify-around gap-16 px-8 min-w-max">
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/react/61DAFB" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(97,218,251,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">React</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/flutter/02569B" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(2,86,155,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Flutter</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/go/00ADD8" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(0,173,216,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Golang</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/postgresql/4169E1" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(65,105,225,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">PostgreSQL</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/googlecloud/4285F4" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(66,133,244,0.4)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Google Cloud</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/typescript/3178C6" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(49,120,198,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">TypeScript</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/python/3776AB" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(55,118,171,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Python</span>
                    </div>
                </div>
                <!-- SET 2 (Duplicate for Loop) -->
                <div class="flex items-center justify-around gap-16 px-8 min-w-max">
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/react/61DAFB" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(97,218,251,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">React</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/flutter/02569B" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(2,86,155,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Flutter</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/go/00ADD8" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(0,173,216,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Golang</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/postgresql/4169E1" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(65,105,225,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">PostgreSQL</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/googlecloud/4285F4" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(66,133,244,0.4)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Google Cloud</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/typescript/3178C6" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(49,120,198,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">TypeScript</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 opacity-40 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-300 cursor-pointer group">
                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/python/3776AB" class="w-12 h-12 group-hover:scale-110 transition-transform duration-300 group-hover:drop-shadow-[0_0_15px_rgba(55,118,171,0.6)]">
                        <span class="text-[10px] font-bold text-gray-800 tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity absolute -bottom-5">Python</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4: WHY DIGICE -->
    <section id="kenapa-kami" class="bg-digice-navy py-24 px-6">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Kiri -->
            <div>
                <span class="text-digice-cyan text-sm font-semibold uppercase tracking-widest">Kenapa Digice</span>
                <h2 class="text-4xl font-bold text-white mt-3">Kami bukan sekadar vendor.<br>Kami partner digital Anda.</h2>
                <p class="text-digice-slate mt-4 text-lg">Banyak yang bisa buat website. Tapi tidak banyak yang benar-benar pahami bisnis Anda.</p>
                <a href="#kontak" class="mt-8 inline-flex items-center gap-2 text-digice-cyan font-semibold hover:text-white transition-colors">
                    Diskusi Sekarang &rarr;
                </a>
            </div>

            <!-- Kanan -->
            <div class="space-y-6">
                <!-- Poin 1 -->
                <div class="flex gap-4">
                    <div class="w-10 h-10 rounded-xl bg-white shadow-md flex items-center justify-center flex-shrink-0 text-digice-cyan text-xl overflow-hidden">
                        <lottie-player src="{{ asset('images/target.json') }}" background="transparent" speed="1" class="w-8 h-8" loop autoplay></lottie-player>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold">Solusi, Bukan Sekadar Tampilan</h3>
                        <p class="text-digice-slate text-sm mt-1 leading-relaxed">Kami pahami bisnis Anda lebih dulu, baru mulai bangun. Hasilnya? Solusi yang benar-benar menjawab masalah Anda — bukan sekadar tampilan bagus.</p>
                    </div>
                </div>
                <!-- Poin 2 -->
                <div class="flex gap-4">
                    <div class="w-10 h-10 rounded-xl bg-white shadow-md flex items-center justify-center flex-shrink-0 text-digice-cyan text-xl overflow-hidden">
                        <lottie-player src="{{ asset('images/hexagonal.json') }}" background="transparent" speed="1" class="w-8 h-8" loop autoplay></lottie-player>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold">Satu Atap, Semua Beres</h3>
                        <p class="text-digice-slate text-sm mt-1 leading-relaxed">Website, sistem, dan marketing — Anda tidak perlu koordinasi dengan banyak vendor. Semuanya bisa kami tangani dari satu tempat.</p>
                    </div>
                </div>
                <!-- Poin 3 -->
                <div class="flex gap-4">
                    <div class="w-10 h-10 rounded-xl bg-white shadow-md flex items-center justify-center flex-shrink-0 text-digice-cyan text-xl overflow-hidden">
                        <lottie-player src="{{ asset('images/secure.json') }}" background="transparent" speed="1" class="w-8 h-8" loop autoplay></lottie-player>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold">Transparan & On-Time</h3>
                        <p class="text-digice-slate text-sm mt-1 leading-relaxed">Deadline adalah komitmen, bukan estimasi. Setiap progress kami komunikasikan secara terbuka — Anda selalu tahu posisinya.</p>
                    </div>
                </div>
                <!-- Poin 4 -->
                <div class="flex gap-4">
                    <div class="w-10 h-10 rounded-xl bg-white shadow-md flex items-center justify-center flex-shrink-0 text-digice-cyan text-xl overflow-hidden">
                        <lottie-player src="{{ asset('images/success.json') }}" background="transparent" speed="1" class="w-8 h-8" loop autoplay></lottie-player>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold">Track Record Nyata</h3>
                        <p class="text-digice-slate text-sm mt-1 leading-relaxed">10+ tahun di dunia digital. 20+ project delivered. Dari UMKM hingga institusi — dengan hasil yang bisa Anda lihat langsung di portofolio kami.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 5: CARA KERJA -->
    <section id="cara-kerja" class="bg-gray-100 py-24 px-6">
        <div class="max-w-2xl mx-auto text-center">
            <span class="text-digice-cyan text-sm font-semibold uppercase tracking-widest">Cara Kerja</span>
            <h2 class="text-4xl font-bold text-digice-dark-slate mt-3">Dari obrolan pertama hingga launch — prosesnya sederhana.</h2>
            <p class="text-gray-500 mt-4">Kami pastikan Anda selalu tahu apa yang sedang terjadi di setiap tahap.</p>
        </div>

        <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
            <!-- Step 1 -->
            <div class="scroll-reveal opacity-0 translate-y-10 transition-all duration-700 ease-out">
                <span class="text-5xl font-bold text-digice-cyan/20">01</span>
                <h3 class="font-bold text-lg text-digice-dark-slate mt-2">Konsultasi</h3>
                <p class="text-sm text-gray-500 mt-2">Ceritakan kebutuhan Anda. Kami dengarkan, analisa, dan berikan rekomendasi yang jujur — bukan yang paling mahal.</p>
            </div>
            <!-- Step 2 -->
            <div class="scroll-reveal opacity-0 translate-y-10 transition-all duration-700 ease-out" style="transition-delay: 100ms;">
                <span class="text-5xl font-bold text-digice-cyan/20">02</span>
                <h3 class="font-bold text-lg text-digice-dark-slate mt-2">Proposal</h3>
                <p class="text-sm text-gray-500 mt-2">Kami kirimkan scope, timeline, dan harga yang jelas. Tidak ada biaya tersembunyi, tidak ada kejutan di tengah jalan.</p>
            </div>
            <!-- Step 3 -->
            <div class="scroll-reveal opacity-0 translate-y-10 transition-all duration-700 ease-out" style="transition-delay: 200ms;">
                <span class="text-5xl font-bold text-digice-cyan/20">03</span>
                <h3 class="font-bold text-lg text-digice-dark-slate mt-2">Eksekusi</h3>
                <p class="text-sm text-gray-500 mt-2">Project berjalan dengan update berkala. Anda selalu tahu progress-nya — dan bisa memberikan feedback di setiap tahap.</p>
            </div>
            <!-- Step 4 -->
            <div class="scroll-reveal opacity-0 translate-y-10 transition-all duration-700 ease-out" style="transition-delay: 300ms;">
                <span class="text-5xl font-bold text-digice-cyan/20">04</span>
                <h3 class="font-bold text-lg text-digice-dark-slate mt-2">Launch & Support</h3>
                <p class="text-sm text-gray-500 mt-2">Setelah live, kami tetap ada. Kalau ada yang perlu diperbaiki atau dikembangkan, Anda tinggal hubungi kami.</p>
            </div>
        </div>
    </section>

    <!-- SECTION 6: PORTOFOLIO -->
    <section id="portofolio" class="bg-gray-50 py-24 px-6" x-data="{ filter: 'semua', lightboxOpen: false, lightboxImage: '' }">
        <div class="max-w-2xl mx-auto text-center">
            <span class="text-digice-cyan text-sm font-semibold uppercase tracking-widest">Portofolio</span>
            <h2 class="text-4xl font-bold text-digice-dark-slate mt-3">Ini sebagian dari apa yang sudah kami kerjakan.</h2>
            <p class="text-gray-500 mt-4">Mungkin ada yang mirip kebutuhan Anda.</p>
        </div>

        <!-- Filters -->
        <div class="mt-8 flex gap-2 justify-start md:justify-center overflow-x-auto flex-nowrap md:flex-wrap pb-2 px-2">
            <button @click="filter = 'semua'" :class="filter === 'semua' ? 'bg-digice-cyan text-digice-navy border-digice-cyan' : 'bg-white text-gray-500 border-gray-200 hover:border-digice-cyan'" class="px-4 py-2 rounded-full text-sm font-medium border transition-colors whitespace-nowrap flex-shrink-0">Semua</button>
            <button @click="filter = 'website'" :class="filter === 'website' ? 'bg-digice-cyan text-digice-navy border-digice-cyan' : 'bg-white text-gray-500 border-gray-200 hover:border-digice-cyan'" class="px-4 py-2 rounded-full text-sm font-medium border transition-colors whitespace-nowrap flex-shrink-0">Website</button>
            <button @click="filter = 'web-app'" :class="filter === 'web-app' ? 'bg-digice-cyan text-digice-navy border-digice-cyan' : 'bg-white text-gray-500 border-gray-200 hover:border-digice-cyan'" class="px-4 py-2 rounded-full text-sm font-medium border transition-colors whitespace-nowrap flex-shrink-0">Web App</button>
            <button @click="filter = 'e-commerce'" :class="filter === 'e-commerce' ? 'bg-digice-cyan text-digice-navy border-digice-cyan' : 'bg-white text-gray-500 border-gray-200 hover:border-digice-cyan'" class="px-4 py-2 rounded-full text-sm font-medium border transition-colors whitespace-nowrap flex-shrink-0">E-Commerce</button>
            <button @click="filter = 'marketing'" :class="filter === 'marketing' ? 'bg-digice-cyan text-digice-navy border-digice-cyan' : 'bg-white text-gray-500 border-gray-200 hover:border-digice-cyan'" class="px-4 py-2 rounded-full text-sm font-medium border transition-colors whitespace-nowrap flex-shrink-0">Marketing</button>
        </div>

        <!-- Grid -->
        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
            @forelse($portfolios as $portfolio)
                @php
                    $catSlug = \Illuminate\Support\Str::lower(str_replace(' ', '-', $portfolio->category));
                @endphp
                <div x-show="filter === 'semua' || filter === '{{ $catSlug }}'" x-transition class="group bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col">
                    <!-- Thumbnail -->
                    <div @click="lightboxImage = '{{ $portfolio->getFirstMediaUrl('screenshots') }}'; lightboxOpen = true" class="relative aspect-video bg-gray-100 flex-shrink-0 overflow-hidden cursor-pointer group/img">
                        @if($portfolio->hasMedia('screenshots'))
                            <img src="{{ $portfolio->getFirstMediaUrl('screenshots') }}" alt="{{ $portfolio->name }}" loading="lazy" decoding="async" class="w-full h-full object-cover transition-transform duration-500 group-hover/img:scale-105">
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/img:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607ZM10.5 7.5v6m3-3h-6" />
                                </svg>
                            </div>
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                                <svg class="w-8 h-8 mb-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                                <span class="text-xs">{{ $portfolio->name }}</span>
                            </div>
                        @endif

                        <span class="absolute top-3 left-3 bg-white/90 backdrop-blur text-digice-dark-slate px-3 py-1 rounded-full text-xs font-medium shadow-sm">
                            {{ $portfolio->category }}
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="p-5 flex-1 flex flex-col">
                        <h3 class="font-bold text-lg text-digice-dark-slate">{{ $portfolio->name }}</h3>
                        @if($portfolio->description)
                        <p class="text-sm text-gray-500 line-clamp-2 mt-1">{{ $portfolio->description }}</p>
                        @endif

                        <!-- Tech Stack -->
                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach($portfolio->techStacks->take(4) as $tech)
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-gray-50 border border-gray-100 text-xs font-medium text-gray-600">
                                    @if($tech->icon)
                                        <img loading="lazy" decoding="async" src="https://cdn.simpleicons.org/{{ $tech->icon }}/64748B" class="w-3.5 h-3.5" onerror="this.style.display='none'">
                                    @endif
                                    {{ $tech->name }}
                                </span>
                            @endforeach
                            @if($portfolio->techStacks->count() > 4)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-gray-50 border border-gray-100 text-xs font-medium text-gray-600">
                                    +{{ $portfolio->techStacks->count() - 4 }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Footer -->
                    @if($portfolio->url)
                        <div class="p-5 pt-0 mt-auto">
                            <a href="{{ $portfolio->url }}" target="_blank" class="inline-flex items-center text-digice-cyan text-sm font-semibold hover:text-digice-cyan/80 transition-colors">
                                Lihat Project &rarr;
                            </a>
                        </div>
                    @endif
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16">
                    <p class="text-gray-500">Portfolio sedang disiapkan...</p>
                </div>
            @endforelse
        </div>

        <!-- Lightbox Modal -->
        <div x-show="lightboxOpen" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center bg-black/90 backdrop-blur-sm p-6 md:p-12">
            <button @click="lightboxOpen = false" class="absolute top-6 right-6 text-white hover:bg-white/20 bg-black/50 p-3 rounded-full backdrop-blur-md transition-all z-10">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div @click.outside="lightboxOpen = false" class="relative flex items-center justify-center max-w-5xl max-h-full">
                <img :src="lightboxImage" class="max-w-full max-h-[85vh] object-contain rounded-xl shadow-2xl ring-1 ring-white/10" alt="Screenshot Preview">
            </div>
        </div>
    </section>

    <!-- SECTION 7: TESTIMONI -->
    <section id="testimoni" class="bg-digice-navy py-24 px-6">
        <div class="max-w-2xl mx-auto text-center mb-16">
            <span class="text-digice-cyan text-sm font-semibold uppercase tracking-widest">Apa Kata Klien Kami</span>
            <h2 class="text-4xl font-bold text-white mt-3">Dipercaya oleh berbagai bisnis dan institusi.</h2>
        </div>

        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($testimonials as $testimonial)
                <div class="bg-digice-midnight border border-digice-border-dark rounded-2xl p-6 opacity-80 hover:opacity-100 transition-opacity flex flex-col h-full">
                    <!-- Stars -->
                    <div class="text-digice-cyan mb-4 flex gap-1">
                        @for($i=1; $i<=5; $i++)
                            <span class="{{ $i <= $testimonial->rating ? 'text-digice-cyan' : 'text-gray-600' }}">★</span>
                        @endfor
                    </div>
                    <p class="text-gray-300 italic mb-6 flex-1">"{{ $testimonial->content }}"</p>
                    <div class="flex items-center gap-3 mt-auto">
                        @if($testimonial->hasMedia('avatar'))
                            <img src="{{ $testimonial->getFirstMediaUrl('avatar') }}" alt="{{ $testimonial->name }}" loading="lazy" decoding="async" class="w-10 h-10 rounded-full object-cover">
                        @else
                            <div class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center text-white font-bold text-sm">
                                {{ strtoupper(substr($testimonial->name, 0, 2)) }}
                            </div>
                        @endif
                        <div>
                            <p class="text-white font-semibold text-sm">{{ $testimonial->name }}</p>
                            <p class="text-gray-500 text-xs">{{ $testimonial->position }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-3 text-center py-8">
                    <p class="text-gray-500">Testimoni belum tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- SECTION 8: CTA FINAL -->
    <section id="kontak" class="bg-gradient-to-r from-digice-navy via-[#0d1e38] to-digice-navy border-t border-digice-border-dark py-24 px-6 relative overflow-hidden">
        <!-- Glow accent -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-digice-cyan/10 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="max-w-2xl mx-auto text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-bold text-white leading-tight">
                Punya project<br>di kepala?
            </h2>
            <p class="text-white/80 text-lg mt-6">
                Ceritakan ke kami. Konsultasi pertama gratis — dan kami akan bantu Anda temukan solusi yang paling tepat.
            </p>

            <div class="mt-10">
                @php
                    $setting = \App\Models\Setting::first();
                    $whatsapp = $setting?->whatsapp_number ?? '6281222771761';
                    $address = $setting?->address;
                @endphp
                <a href="https://wa.me/{{ $whatsapp }}?text=Halo%20Digice%2C%20saya%20ingin%20diskusi%20project..." target="_blank" class="magnetic-btn flex md:inline-flex w-full md:w-auto items-center justify-center gap-2 bg-white text-digice-navy font-bold px-8 py-4 rounded-full hover:bg-gray-100 shadow-[0_10px_30px_rgba(255,255,255,0.15)] transition-colors">
                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    Mulai Diskusi via WhatsApp
                </a>
            </div>

            <p class="text-white/50 text-sm mt-8">Biasanya kami merespons dalam 1×24 jam.</p>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-digice-navy border-t border-digice-border-dark py-16 px-6">
        <div class="max-w-4xl mx-auto flex flex-col items-center text-center">
            <!-- Logo -->
            <a href="/" class="inline-block mb-6">
                <img src="{{ asset('images/digice001-darkbg.png') }}" alt="Digice Logo" loading="lazy" decoding="async" class="h-10 w-auto opacity-90 hover:opacity-100 transition-opacity">
            </a>

            <!-- Address & WA -->
            <div class="text-digice-slate text-sm mb-8 flex flex-col md:flex-row items-center justify-center gap-2 md:gap-4">
                @if($address)
                    <span>{{ $address }}</span>
                    <span class="hidden md:inline text-digice-border-dark">|</span>
                @endif
                <span class="flex items-center gap-1.5 text-white">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    +{{ $whatsapp }}
                </span>
            </div>

            <!-- Menu -->
            <div class="flex flex-wrap gap-6 md:gap-10 justify-center mb-12">
                <a href="#layanan" class="text-digice-slate text-sm font-medium hover:text-white transition-colors">Layanan</a>
                <a href="#portofolio" class="text-digice-slate text-sm font-medium hover:text-white transition-colors">Portofolio</a>
                <a href="#cara-kerja" class="text-digice-slate text-sm font-medium hover:text-white transition-colors">Cara Kerja</a>
                <a href="#kontak" class="text-digice-slate text-sm font-medium hover:text-white transition-colors">Kontak</a>
            </div>

            <!-- Quirky IT Copyright -->
            <div class="w-full border-t border-digice-border-dark pt-8">
                <p class="text-digice-slate text-sm">
                    Dibuat dengan ribuan baris kode 💻, kopi ☕, dan sepenuh hati ❤️ oleh tim Digice
                </p>
                <p class="text-digice-slate/50 text-xs mt-2">
                    &copy; 2026 Digice. Hak cipta dilindungi (jangan di-copy paste ya, mending kita ngopi bareng).
                </p>
            </div>
        </div>
    </footer>

    <!-- Animasi Script (Scroll Reveal & Magnetic Button) -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // 1. Scroll Reveal Logic
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.15
            };

            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Remove initial hidden classes
                        entry.target.classList.remove('opacity-0', 'translate-y-10');
                        // Add visible classes
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        // Unobserve after revealing
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.scroll-reveal').forEach((el) => {
                revealObserver.observe(el);
            });

            // 5. Magnetic Hover Logic
            const magneticButtons = document.querySelectorAll('.magnetic-btn');
            
            magneticButtons.forEach(btn => {
                btn.addEventListener('mouseenter', () => {
                    btn.style.transition = 'transform 0.1s ease-out, background-color 0.3s, color 0.3s, border-color 0.3s';
                });
                
                btn.addEventListener('mousemove', (e) => {
                    const rect = btn.getBoundingClientRect();
                    const x = e.clientX - rect.left - rect.width / 2;
                    const y = e.clientY - rect.top - rect.height / 2;
                    
                    // Pindah 30% dari jarak mouse ke tengah tombol
                    btn.style.transform = `translate(${x * 0.3}px, ${y * 0.3}px) scale(1.05)`;
                });
                
                btn.addEventListener('mouseleave', () => {
                    // Beri transisi bouncy saat mouse keluar
                    btn.style.transition = 'transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275), background-color 0.3s, color 0.3s, border-color 0.3s';
                    btn.style.transform = `translate(0px, 0px) scale(1)`;
                });
            });
        });

        // 6. Typewriter Effect Logic
        const words = ["<Software />", "<Web Apps />", "<Mobile Apps />", "<Sistem IT />"];
        let wordIndex = 0;
        const typeTarget = document.getElementById('typewriter-text');
        
        if (typeTarget) {
            function typingEffect() {
                let word = words[wordIndex].split('');
                let loopTyping = function() {
                    if (word.length > 0) {
                        typeTarget.textContent += word.shift();
                        setTimeout(loopTyping, 100);
                    } else {
                        setTimeout(deletingEffect, 2000);
                    }
                };
                loopTyping();
            }

            function deletingEffect() {
                let currentWord = typeTarget.textContent.split('');
                let loopDeleting = function() {
                    if (currentWord.length > 0) {
                        currentWord.pop();
                        typeTarget.textContent = currentWord.join('');
                        setTimeout(loopDeleting, 50);
                    } else {
                        wordIndex = (wordIndex + 1) % words.length;
                        setTimeout(typingEffect, 500);
                    }
                };
                loopDeleting();
            }

            typeTarget.textContent = "";
            setTimeout(typingEffect, 500); // Initial delay
        }
    </script>
    <style>
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
        .animate-blink {
            animation: blink 1s step-end infinite;
        }

        /* Marquee Custom Animations */
        @keyframes marquee-left {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        @keyframes marquee-right {
            0% { transform: translateX(-50%); }
            100% { transform: translateX(0); }
        }
        .animate-marquee-left {
            animation: marquee-left 35s linear infinite;
        }
        .animate-marquee-right {
            animation: marquee-right 35s linear infinite;
        }
        .marquee-mask {
            -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
            mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
        }
    </style>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</x-app-layout>
