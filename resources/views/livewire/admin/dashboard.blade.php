<div>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Card 1: Total Portfolio -->
    <div class="bg-white rounded-xl border border-digice-border shadow-card p-6 flex items-center gap-4">
      <div class="w-10 h-10 rounded-lg bg-digice-cyan/10 text-digice-cyan flex items-center justify-center">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
        </svg>
      </div>
      <div>
        <p class="text-digice-slate text-sm">Total Portfolio</p>
        <p class="text-digice-dark-slate text-3xl font-semibold">{{ $totalPortfolio }}</p>
      </div>
    </div>

    <!-- Card 2: Featured -->
    <div class="bg-white rounded-xl border border-digice-border shadow-card p-6 flex items-center gap-4">
      <div class="w-10 h-10 rounded-lg bg-digice-cyan/10 text-digice-cyan flex items-center justify-center">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
        </svg>
      </div>
      <div>
        <p class="text-digice-slate text-sm">Featured</p>
        <p class="text-digice-dark-slate text-3xl font-semibold">{{ $totalFeatured }}</p>
      </div>
    </div>

    <!-- Card 3: Tech Stack -->
    <div class="bg-white rounded-xl border border-digice-border shadow-card p-6 flex items-center gap-4">
      <div class="w-10 h-10 rounded-lg bg-digice-cyan/10 text-digice-cyan flex items-center justify-center">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z" />
        </svg>
      </div>
      <div>
        <p class="text-digice-slate text-sm">Tech Stack</p>
        <p class="text-digice-dark-slate text-3xl font-semibold">{{ $totalTechStack }}</p>
      </div>
    </div>
  </div>

  <div class="mt-8 flex gap-4">
    <a href="{{ route('admin.portfolio.index') }}" class="text-digice-royal hover:underline font-medium">Kelola Portfolio &rarr;</a>
    <a href="{{ route('admin.tech-stacks.index') }}" class="text-digice-royal hover:underline font-medium">Kelola Tech Stack &rarr;</a>
  </div>
</div>
