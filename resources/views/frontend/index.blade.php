<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surabaya Motor</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Fonts: Inter & Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@700;800&display=swap" rel="stylesheet">
  <!-- Font Awesome untuk Ikon Otomotif & UI -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
            display: ['Plus Jakarta Sans', 'sans-serif'],
          },
          colors: {
            brand: {
              dark: '#0B1120',
              navy: '#111827',
              slate: '#1E293B',
              orange: '#F97316',
              orangeHover: '#EA580C',
              red: '#EF4444'
            }
          }
        }
      }
    }
  </script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-orange-500 selection:text-white">

  <!-- ================= NAVBAR STICKY ================= -->
  <header class="sticky top-0 z-40 bg-brand-dark/95 backdrop-blur-md border-b border-slate-800 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        <!-- Logo -->
        <a href="#beranda" class="flex items-center gap-3 group">
          <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center shadow-lg shadow-orange-500/30 group-hover:scale-105 transition-transform">
            <i class="fa-solid fa-gear text-white text-xl animate-[spin_10s_linear_infinite]"></i>
          </div>
          <div>
            <span class="font-display font-extrabold text-xl tracking-tight text-white block leading-none">SURABAYA <span class="text-orange-500">MOTOR</span></span>
            <span class="text-[11px] text-slate-400 font-medium tracking-wider uppercase">Service & Workshop Supply</span>
          </div>
        </a>

        <!-- Desktop Menu -->
        <nav class="hidden md:flex items-center space-x-7 text-sm font-medium">
          <a href="#beranda" class="text-slate-300 hover:text-orange-400 transition-colors">Beranda</a>
          <a href="#layanan" class="text-slate-300 hover:text-orange-400 transition-colors">Layanan Servis</a>
          <a href="#katalog" class="text-slate-300 hover:text-orange-400 transition-colors">Katalog & Alat Bengkel</a>
          <a href="#booking" class="text-slate-300 hover:text-orange-400 transition-colors">Booking Servis</a>
          <a href="#kontak" class="text-slate-300 hover:text-orange-400 transition-colors">Lokasi & Kontak</a>
        </nav>

        <!-- Action Buttons (Keranjang Tanya + Tombol Login Admin + Mobile Menu Toggle) -->
        <div class="flex items-center gap-3">
          <!-- Tombol Keranjang / Daftar Belanja -->
          <button onclick="toggleCartDrawer()" class="relative p-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-white border border-slate-700 transition-all flex items-center gap-2" aria-label="Keranjang Tanya Stok">
            <i class="fa-solid fa-cart-shopping text-orange-400"></i>
            <span class="hidden sm:inline text-xs font-semibold">Daftar Belanja</span>
            <span id="cart-badge" class="absolute -top-2 -right-2 bg-orange-500 text-white text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center shadow-md">0</span>
          </button>

          <!-- Tombol Login Admin (Desktop) -->
          <a href="{{ route('login') }}" class="px-4 py-3 rounded-xl bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-bold text-xs shadow-lg shadow-orange-500/20 transition-all flex items-center gap-2" aria-label="Login Admin">
            <i class="fa-solid fa-right-to-bracket text-sm"></i>
            <span class="hidden sm:inline">Login Admin</span>
          </a>

          <!-- Mobile Menu Toggle -->
          <button id="mobile-menu-btn" onclick="toggleMobileMenu()" class="md:hidden p-3 rounded-xl bg-slate-800 text-slate-200 hover:text-white border border-slate-700">
            <i class="fa-solid fa-bars text-lg"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Navigation Dropdown -->
    <div id="mobile-menu" class="hidden md:hidden bg-slate-900 border-b border-slate-800 px-4 pt-2 pb-5 space-y-2">
      <a href="#beranda" onclick="toggleMobileMenu()" class="block px-4 py-3 rounded-xl text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-orange-400">Beranda</a>
      <a href="#layanan" onclick="toggleMobileMenu()" class="block px-4 py-3 rounded-xl text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-orange-400">Layanan Servis</a>
      <a href="#katalog" onclick="toggleMobileMenu()" class="block px-4 py-3 rounded-xl text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-orange-400">Katalog Sparepart & Alat Bengkel</a>
      <a href="#booking" onclick="toggleMobileMenu()" class="block px-4 py-3 rounded-xl text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-orange-400">Booking Servis</a>
      <a href="#kontak" onclick="toggleMobileMenu()" class="block px-4 py-3 rounded-xl text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-orange-400">Lokasi & Kontak</a>
      
      <!-- Tautan Login Admin di Mobile Menu -->
      <a href="{{ route('login') }}" class="block px-4 py-3 rounded-xl text-base font-bold text-orange-400 bg-orange-500/10 border border-orange-500/20 hover:bg-orange-500/20 transition-colors flex items-center gap-2">
        <i class="fa-solid fa-right-to-bracket"></i> Login Admin / Kasir
      </a>
    </div>
  </header>

  <!-- ================= HERO SECTION ================= -->
  <section id="beranda" class="relative bg-brand-dark text-white overflow-hidden">
    <!-- Decorative Background Grid & Glow -->
    <div class="absolute inset-0 bg-[radial-gradient(#1e293b_1px,transparent_1px)] [background-size:24px_24px] opacity-40"></div>
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-orange-500/20 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <!-- Hero Text -->
        <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
          <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800/90 border border-slate-700 text-orange-400 text-xs sm:text-sm font-semibold">
            <span class="w-2 h-2 rounded-full bg-orange-500 animate-ping"></span>
            Bengkel Umum & Supplier Perlengkapan Bengkel (Ecer & Grosir)
          </div>

          <h1 class="font-display text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">
            Solusi Lengkap <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-500">Servis Motor</span> & Kebutuhan Perlengkapan Bengkel Terpercaya
          </h1>

          <p class="text-slate-300 text-base sm:text-lg max-w-2xl mx-auto lg:mx-0 leading-relaxed">
            <strong>Surabaya Motor</strong> hadir melayani perawatan motor harian, tune-up injeksi, hingga penyediaan suku cadang original dan peralatan bengkel lengkap untuk pengendara maupun mitra bengkel lain.
          </p>

          <!-- CTA Buttons -->
          <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
            <a href="#booking" class="w-full sm:w-auto px-7 py-4 rounded-xl bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-bold text-base shadow-lg shadow-orange-500/30 transition-all flex items-center justify-center gap-2">
              <i class="fa-solid fa-calendar-check"></i>
              Booking Servis Sekarang
            </a>
            <a href="#katalog" class="w-full sm:w-auto px-7 py-4 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-semibold text-base border border-slate-700 transition-all flex items-center justify-center gap-2">
              <i class="fa-solid fa-boxes-stacked text-orange-400"></i>
              Lihat Katalog Barang
            </a>
          </div>

          <!-- Quick Stats -->
          <div class="grid grid-cols-3 gap-4 pt-6 border-t border-slate-800/80 max-w-lg mx-auto lg:mx-0">
            <div>
              <p class="font-display text-2xl sm:text-3xl font-extrabold text-white">500+</p>
              <p class="text-xs text-slate-400">Item Sparepart & Alat</p>
            </div>
            <div>
              <p class="font-display text-2xl sm:text-3xl font-extrabold text-orange-400">100%</p>
              <p class="text-xs text-slate-400">Suku Cadang Bergaransi</p>
            </div>
            <div>
              <p class="font-display text-2xl sm:text-3xl font-extrabold text-white">Grosir</p>
              <p class="text-xs text-slate-400">& Eceran Siap Kirim</p>
            </div>
          </div>
        </div>

        <!-- Hero Visual Card -->
        <div class="lg:col-span-5">
          <div class="relative rounded-3xl overflow-hidden border border-slate-700/80 bg-slate-900 shadow-2xl">
            <img 
              src="{{ asset('images/srb.jpg.png') }}" 
              onerror="this.src='https://www.google.com/local/place/fid/0x2dad58d7c9da467b:0xab2f2cf77cb46568/photosphere?iu=https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid%3DTeybZYOProX6_H7_ZTK6Eg%26cb_client%3Dsearch.gws-prod.grass%26yaw%3D110.66677%26pitch%3D3.182769%26thumbfov%3D100%26w%3D0%26h%3D0&ik=CAISFlRleWJaWU9Qcm9YNl9IN19aVEs2RWc%3D&vp=DWNV3UIVfbJLQB0AXEFCPWG5F0A&sa=X&ved=2ahUKEwjehNyJ3KmYAxWxxTgGHWVcO5oQpx96BAgWEBI'" 
              alt="Bengkel Surabaya Motor" 
              class="w-full h-72 sm:h-96 object-cover opacity-90"
            >
            <div class="p-6 bg-gradient-to-t from-slate-950 via-slate-900 to-slate-900/95">
              <div class="flex items-center justify-between gap-4">
                <div>
                  <span class="text-xs font-bold uppercase tracking-wider text-orange-400">One-Stop Automotive Hub</span>
                  <h3 class="text-lg font-bold text-white mt-0.5">Servis Kendaraan & Kulakan Alat Bengkel</h3>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-orange-500/20 border border-orange-500/40 flex items-center justify-center shrink-0">
                  <i class="fa-solid fa-wrench text-orange-400 text-xl"></i>
                </div>
              </div>
              <div class="mt-4 flex flex-wrap gap-2">
                <span class="px-3 py-1 rounded-lg bg-slate-800 text-slate-300 text-xs font-medium"><i class="fa-solid fa-check text-emerald-400 mr-1"></i> Tune Up Injeksi</span>
                <span class="px-3 py-1 rounded-lg bg-slate-800 text-slate-300 text-xs font-medium"><i class="fa-solid fa-check text-emerald-400 mr-1"></i> Kompresor & Tools</span>
                <span class="px-3 py-1 rounded-lg bg-slate-800 text-slate-300 text-xs font-medium"><i class="fa-solid fa-check text-emerald-400 mr-1"></i> Oli & Ban Lengkap</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= LAYANAN BENGKEL SECTION ================= -->
  <section id="layanan" class="py-16 lg:py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-14">
      <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3.5 py-1.5 rounded-full">Surabaya Motor Service</span>
      <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">Layanan Perawatan & Perbaikan Motor</h2>
      <p class="text-slate-600 mt-3 text-base">Ditangani oleh mekanik berpengalaman dengan peralatan modern dan transparansi biaya sebelum pengerjaan.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Service 1 -->
      <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-xl hover:border-orange-300 transition-all group">
        <div class="w-14 h-14 rounded-2xl bg-slate-900 text-orange-400 flex items-center justify-center text-2xl mb-5 group-hover:bg-orange-500 group-hover:text-white transition-colors">
          <i class="fa-solid fa-screwdriver-wrench"></i>
        </div>
        <h3 class="text-xl font-bold text-slate-900">Servis Ringan & Tune Up</h3>
        <p class="text-slate-600 text-sm mt-2 leading-relaxed">Pembersihan throttle body/karburator, cek busi, filter udara, penyetelan rantai, rem, serta pengecekan 15 titik standar keselamatan.</p>
        <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between text-sm">
          <span class="font-bold text-orange-600">Mulai Rp 45.000</span>
          <span class="text-slate-500"><i class="fa-regular fa-clock mr-1"></i> ± 45 Menit</span>
        </div>
      </div>

      <!-- Service 2 -->
      <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-xl hover:border-orange-300 transition-all group">
        <div class="w-14 h-14 rounded-2xl bg-slate-900 text-orange-400 flex items-center justify-center text-2xl mb-5 group-hover:bg-orange-500 group-hover:text-white transition-colors">
          <i class="fa-solid fa-oil-can"></i>
        </div>
        <h3 class="text-xl font-bold text-slate-900">Ganti Oli & Filter</h3>
        <p class="text-slate-600 text-sm mt-2 leading-relaxed">Tersedia oli mesin matic, bebek, sport (MPX, Yamalube, Shell, Motul, Federal) beserta oli gardan dan filter oli original. Gratis jasa pasang!</p>
        <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between text-sm">
          <span class="font-bold text-orange-600">Mulai Rp 40.000</span>
          <span class="text-slate-500"><i class="fa-regular fa-clock mr-1"></i> ± 15 Menit</span>
        </div>
      </div>

      <!-- Service 3 -->
      <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-xl hover:border-orange-300 transition-all group">
        <div class="w-14 h-14 rounded-2xl bg-slate-900 text-orange-400 flex items-center justify-center text-2xl mb-5 group-hover:bg-orange-500 group-hover:text-white transition-colors">
          <i class="fa-solid fa-gears"></i>
        </div>
        <h3 class="text-xl font-bold text-slate-900">Servis CVT & Sistem Injeksi</h3>
        <p class="text-slate-600 text-sm mt-2 leading-relaxed">Solusi motor matic gredek atau tarikan berat. Pembersihan puli, roller, v-belt, pemberian gemuk CVT, dan reset ECU scanner injeksi.</p>
        <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between text-sm">
          <span class="font-bold text-orange-600">Mulai Rp 60.000</span>
          <span class="text-slate-500"><i class="fa-regular fa-clock mr-1"></i> ± 60 Menit</span>
        </div>
      </div>

      <!-- Service 4 -->
      <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-xl hover:border-orange-300 transition-all group">
        <div class="w-14 h-14 rounded-2xl bg-slate-900 text-orange-400 flex items-center justify-center text-2xl mb-5 group-hover:bg-orange-500 group-hover:text-white transition-colors">
          <i class="fa-solid fa-engine-warning"></i>
          <i class="fa-solid fa-motorcycle"></i>
        </div>
        <h3 class="text-xl font-bold text-slate-900">Turun Mesin / Overhaul</h3>
        <p class="text-slate-600 text-sm mt-2 leading-relaxed">Perbaikan mesin berasap, suara kasar, pergantian piston/ring seher, stang seher, skir klep, hingga penggantian kampas kopling.</p>
        <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between text-sm">
          <span class="font-bold text-orange-600">Estimasi Transparan</span>
          <span class="text-slate-500"><i class="fa-regular fa-clock mr-1"></i> 1 - 2 Hari</span>
        </div>
      </div>

      <!-- Service 5 -->
      <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-xl hover:border-orange-300 transition-all group">
        <div class="w-14 h-14 rounded-2xl bg-slate-900 text-orange-400 flex items-center justify-center text-2xl mb-5 group-hover:bg-orange-500 group-hover:text-white transition-colors">
          <i class="fa-solid fa-car-battery"></i>
        </div>
        <h3 class="text-xl font-bold text-slate-900">Kelistrikan, Aki & Penerangan</h3>
        <p class="text-slate-600 text-sm mt-2 leading-relaxed">Pengecekan voltase pengisian kiprok/spul, penggantian aki kering/basah, perbaikan kabel bodi, serta pemasangan lampu LED.</p>
        <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between text-sm">
          <span class="font-bold text-orange-600">Mulai Rp 25.000</span>
          <span class="text-slate-500"><i class="fa-regular fa-clock mr-1"></i> ± 30 Menit</span>
        </div>
      </div>

      <!-- Card CTA Booking Cepat -->
      <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-2xl p-6 text-white flex flex-col justify-between shadow-lg">
        <div>
          <span class="inline-block px-3 py-1 rounded-lg bg-orange-500/20 text-orange-400 text-xs font-bold mb-3">Tanpa Antre Lama</span>
          <h3 class="text-xl font-bold">Butuh Konsultasi Kerusakan Motor?</h3>
          <p class="text-slate-300 text-sm mt-2 leading-relaxed">Jadwalkan kedatangan Anda atau tanyakan estimasi biaya perbaikan langsung kepada kepala mekanik kami.</p>
        </div>
        <a href="#booking" class="mt-6 w-full py-3.5 px-4 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-bold text-sm text-center transition-colors">
          Booking Jadwal Sekarang <i class="fa-solid fa-arrow-right ml-1"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- ================= KATALOG PRODUK & ALAT BENGKEL ================= -->
  <section id="katalog" class="py-16 lg:py-24 bg-slate-100 border-y border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Header -->
      <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
        <div>
          <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3.5 py-1.5 rounded-full">Katalog Eceran & Grosir</span>
          <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">Sparepart & Perlengkapan Bengkel</h2>
          <p class="text-slate-600 mt-2 max-w-2xl">Pilih barang kebutuhan motor Anda atau perlengkapan usaha bengkel Anda. Masukkan ke daftar belanja untuk kirim pesanan/tanya stok grosir via WhatsApp.</p>
        </div>

        <!-- Search Bar -->
        <div class="w-full md:w-80 relative">
          <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
          <input 
            type="text" 
            id="search-input" 
            oninput="filterProducts()"
            placeholder="Cari oli, kunci, kompresor, ban..." 
            class="w-full pl-11 pr-4 py-3.5 rounded-xl bg-white border border-slate-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm shadow-sm"
          >
        </div>
      </div>

      <!-- Filter Tabs -->
      <div class="flex flex-wrap gap-2.5 mb-8" id="category-filters">
        <button onclick="setCategory('Semua')" data-cat="Semua" class="cat-btn active px-5 py-2.5 rounded-xl text-sm font-bold bg-slate-900 text-white shadow-sm transition-all">
          Semua Produk
        </button>
        <button onclick="setCategory('Sparepart Motor')" data-cat="Sparepart Motor" class="cat-btn px-5 py-2.5 rounded-xl text-sm font-semibold bg-white text-slate-700 border border-slate-200 hover:border-orange-400 transition-all">
          <i class="fa-solid fa-motorcycle mr-1.5 text-orange-500"></i>Sparepart Motor
        </button>
        <button onclick="setCategory('Peralatan Bengkel')" data-cat="Peralatan Bengkel" class="cat-btn px-5 py-2.5 rounded-xl text-sm font-semibold bg-white text-slate-700 border border-slate-200 hover:border-orange-400 transition-all">
          <i class="fa-solid fa-toolbox mr-1.5 text-orange-500"></i>Peralatan & Mesin Bengkel
        </button>
        <button onclick="setCategory('Aksesoris')" data-cat="Aksesoris" class="cat-btn px-5 py-2.5 rounded-xl text-sm font-semibold bg-white text-slate-700 border border-slate-200 hover:border-orange-400 transition-all">
          <i class="fa-solid fa-bolt mr-1.5 text-orange-500"></i>Aksesoris & Bahan Habis Pakai
        </button>
      </div>

      <!-- Product Grid -->
      <div id="product-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Produk akan dirender via JavaScript -->
      </div>

      <!-- Empty State jika pencarian tidak ditemukan -->
      <div id="empty-state" class="hidden text-center py-16 bg-white rounded-2xl border border-slate-200">
        <i class="fa-solid fa-box-open text-4xl text-slate-300 mb-3"></i>
        <h3 class="text-lg font-bold text-slate-800">Barang tidak ditemukan</h3>
        <p class="text-slate-500 text-sm mt-1">Coba kata kunci lain atau tanyakan ketersediaan barang langsung ke admin kami via WhatsApp.</p>
      </div>
    </div>
  </section>

  <!-- ================= KEUNGGULAN & TESTIMONI ================= -->
  <section class="py-16 lg:py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-14">
      <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3.5 py-1.5 rounded-full">Mengapa Surabaya Motor?</span>
      <h2 class="font-display text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">Dipercaya Pengendara & Pemilik Bengkel</h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
      <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm">
        <div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center text-xl mb-4">
          <i class="fa-solid fa-user-gear"></i>
        </div>
        <h3 class="font-bold text-lg text-slate-900">Mekanik Berpengalaman</h3>
        <p class="text-sm text-slate-600 mt-2">Analisis kerusakan akurat untuk motor karburator maupun sistem injeksi terbaru.</p>
      </div>

      <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm">
        <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl mb-4">
          <i class="fa-solid fa-shield-halved"></i>
        </div>
        <h3 class="font-bold text-lg text-slate-900">Sparepart 100% Original</h3>
        <p class="text-sm text-slate-600 mt-2">Menyediakan suku cadang asli pabrikan (AHM, YGP, SGP) serta merek aftermarket berkualitas.</p>
      </div>

      <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm">
        <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl mb-4">
          <i class="fa-solid fa-warehouse"></i>
        </div>
        <h3 class="font-bold text-lg text-slate-900">Stok Alat Bengkel Lengkap</h3>
        <p class="text-sm text-slate-600 mt-2">Dari kunci T, impact wrench, kompresor angin, hingga tire changer dengan harga grosir.</p>
      </div>

      <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm">
        <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl mb-4">
          <i class="fa-solid fa-award"></i>
        </div>
        <h3 class="font-bold text-lg text-slate-900">Garansi Servis</h3>
        <p class="text-sm text-slate-600 mt-2">Jaminan pengerjaan ulang gratis apabila keluhan yang sama muncul dalam masa garansi.</p>
      </div>
    </div>

    <!-- Testimoni Pelanggan -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-slate-900 text-white p-6 rounded-2xl shadow-md">
        <div class="flex text-orange-400 text-sm mb-3">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
        </div>
        <p class="text-slate-300 text-sm italic">"Servis CVT Vario saya di sini langsung hilang gredeknya. Mekaniknya ramah dan dikasih lihat part mana yang masih bagus dan mana yang perlu diganti."</p>
        <div class="mt-4 pt-4 border-t border-slate-800 flex items-center gap-3">
          <div class="w-9 h-9 rounded-full bg-orange-500 flex items-center justify-center font-bold text-sm">AR</div>
          <div>
            <p class="text-sm font-bold">Andi Rahmat</p>
            <p class="text-xs text-slate-400">Pelanggan Servis Rutin</p>
          </div>
        </div>
      </div>

      <div class="bg-slate-900 text-white p-6 rounded-2xl shadow-md">
        <div class="flex text-orange-400 text-sm mb-3">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
        </div>
        <p class="text-slate-300 text-sm italic">"Saya baru buka bengkel kecil di desa, belanja kompresor, kunci sok set, sama stok oli di Surabaya Motor harganya sangat bersahabat dan lengkap!"</p>
        <div class="mt-4 pt-4 border-t border-slate-800 flex items-center gap-3">
          <div class="w-9 h-9 rounded-full bg-blue-500 flex items-center justify-center font-bold text-sm">BS</div>
          <div>
            <p class="text-sm font-bold">Budi Santoso</p>
            <p class="text-xs text-slate-400">Mitra Bengkel</p>
          </div>
        </div>
      </div>

      <div class="bg-slate-900 text-white p-6 rounded-2xl shadow-md">
        <div class="flex text-orange-400 text-sm mb-3">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
        </div>
        <p class="text-slate-300 text-sm italic">"Enak banget bisa booking jadwal lewat website sebelum datang, jadi pas sampai bengkel langsung dikerjakan tanpa nunggu antrean panjang."</p>
        <div class="mt-4 pt-4 border-t border-slate-800 flex items-center gap-3">
          <div class="w-9 h-9 rounded-full bg-emerald-500 flex items-center justify-center font-bold text-sm">DP</div>
          <div>
            <p class="text-sm font-bold">Dimas Pratama</p>
            <p class="text-xs text-slate-400">Pelanggan Servis</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= FORMULIR BOOKING SERVIS ================= -->
  <section id="booking" class="py-16 lg:py-24 bg-brand-dark text-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-10 shadow-2xl">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
          <!-- Info Sisi Kiri -->
          <div class="lg:col-span-5 flex flex-col justify-between">
            <div>
              <span class="text-orange-400 font-bold text-xs uppercase tracking-widest">Reservasi Online</span>
              <h2 class="font-display text-3xl font-extrabold mt-2">Booking Servis Motor</h2>
              <p class="text-slate-400 text-sm mt-3 leading-relaxed">
                Isi formulir di samping untuk mengamankan slot servis Anda. Data akan otomatis terhubung ke WhatsApp admin bengkel Surabaya Motor.
              </p>

              <div class="mt-8 space-y-4 text-sm">
                <div class="flex items-start gap-3">
                  <div class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center shrink-0 mt-0.5">
                    <i class="fa-solid fa-1"></i>
                  </div>
                  <p class="text-slate-300">Pilih jenis layanan dan jadwal kedatangan yang sesuai.</p>
                </div>
                <div class="flex items-start gap-3">
                  <div class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center shrink-0 mt-0.5">
                    <i class="fa-solid fa-2"></i>
                  </div>
                  <p class="text-slate-300">Dapatkan konfirmasi estimasi biaya dari admin via WhatsApp.</p>
                </div>
                <div class="flex items-start gap-3">
                  <div class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center shrink-0 mt-0.5">
                    <i class="fa-solid fa-3"></i>
                  </div>
                  <p class="text-slate-300">Datang ke bengkel dan motor langsung ditangani mekanik.</p>
                </div>
              </div>
            </div>

            <div class="mt-8 p-4 rounded-2xl bg-slate-800/70 border border-slate-700 text-xs text-slate-300">
              <i class="fa-solid fa-circle-info text-orange-400 mr-1"></i> Untuk pembelian peralatan bengkel dalam jumlah besar/grosir, Anda juga bisa langsung menghubungi kami.
            </div>
          </div>

          <!-- Form Sisi Kanan -->
          <div class="lg:col-span-7">
            <form id="booking-form" onsubmit="handleBookingSubmit(event)" class="space-y-4">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1.5">Nama Lengkap *</label>
                  <input type="text" id="book-name" required placeholder="Contoh: Rian Hidayat" class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white focus:outline-none focus:border-orange-500 text-sm">
                </div>
                <div>
                  <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1.5">Nomor WhatsApp *</label>
                  <input type="tel" id="book-wa" required placeholder="0812-xxxx-xxxx" class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white focus:outline-none focus:border-orange-500 text-sm">
                </div>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1.5">Jenis / Tipe Motor *</label>
                  <input type="text" id="book-bike" required placeholder="Contoh: Honda Beat 2021" class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white focus:outline-none focus:border-orange-500 text-sm">
                </div>
                <div>
                  <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1.5">Pilih Layanan Servis *</label>
                  <select id="book-service" required class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white focus:outline-none focus:border-orange-500 text-sm">
                    <option value="Servis Ringan & Tune Up">Servis Ringan & Tune Up</option>
                    <option value="Ganti Oli & Filter">Ganti Oli & Filter</option>
                    <option value="Servis CVT & Injeksi">Servis CVT & Injeksi</option>
                    <option value="Turun Mesin / Overhaul">Turun Mesin / Overhaul</option>
                    <option value="Kelistrikan & Aki">Kelistrikan & Aki</option>
                    <option value="Konsultasi / Lainnya">Konsultasi / Lainnya</option>
                  </select>
                </div>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1.5">Tanggal Kedatangan *</label>
                  <input type="date" id="book-date" required class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white focus:outline-none focus:border-orange-500 text-sm">
                </div>
                <div>
                  <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1.5">Jam Kedatangan *</label>
                  <select id="book-time" required class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white focus:outline-none focus:border-orange-500 text-sm">
                    <option value="08:30 WIB">08:30 WIB (Pagi)</option>
                    <option value="10:00 WIB">10:00 WIB (Pagi)</option>
                    <option value="13:00 WIB">13:00 WIB (Siang)</option>
                    <option value="15:00 WIB">15:00 WIB (Sore)</option>
                  </select>
                </div>
              </div>

              <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1.5">Keluhan Motor / Catatan Tambahan</label>
                <textarea id="book-notes" rows="3" placeholder="Jelaskan keluhan motor Anda (misal: tarikan awal bergetar, rem depan bunyi, dll)..." class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-white focus:outline-none focus:border-orange-500 text-sm"></textarea>
              </div>

              <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-bold text-base shadow-lg shadow-orange-500/25 transition-all flex items-center justify-center gap-2">
                <i class="fa-brands fa-whatsapp text-xl"></i>
                Kirim Booking Servis via WhatsApp
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= FOOTER & KONTAK ================= -->
  <footer id="kontak" class="bg-slate-950 text-slate-300 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
        <!-- Brand -->
        <div class="space-y-4">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-orange-500 flex items-center justify-center">
              <i class="fa-solid fa-gear text-white text-lg"></i>
            </div>
            <span class="font-display font-extrabold text-xl text-white">SURABAYA <span class="text-orange-500">MOTOR</span></span>
          </div>
          <p class="text-sm text-slate-400 leading-relaxed">
            Pusat servis sepeda motor terpercaya sekaligus penyedia sparepart dan peralatan lengkap kebutuhan bengkel (eceran & grosir).
          </p>
        </div>

        <!-- Jam Operasional -->
        <div>
          <h4 class="text-white font-bold text-base mb-4">Jam Operasional</h4>
          <ul class="space-y-2.5 text-sm text-slate-400">
            <li class="flex justify-between"><span>Senin - Jumat:</span> <span class="text-white font-medium">08.00 - 17.00</span></li>
            <li class="flex justify-between"><span>Sabtu:</span> <span class="text-white font-medium">08.00 - 17.00</span></li>
            <li class="flex justify-between"><span>Minggu:</span> <span class="text-orange-400 font-medium">Tutup / Janji Temu</span></li>
          </ul>
        </div>

        <!-- Alamat Bengkel -->
        <div>
          <h4 class="text-white font-bold text-base mb-4">Lokasi Bengkel & Toko</h4>
          <p class="text-sm text-slate-400 leading-relaxed flex items-start gap-2.5">
            <i class="fa-solid fa-location-dot text-orange-500 mt-1"></i>
            <span>Surabaya Motor berlokasi di Jl. Gatot Subroto, Kel. Mautapaga, Kec. Ende Timur, Kabupaten Ende, Nusa Tenggara Timur </span>
          </p>
          <p class="text-sm text-slate-400 mt-3 flex items-center gap-2.5">
            <i class="fa-solid fa-phone text-orange-500"></i>
            <span>+62 821-4402-1927</span>
          </p>
        </div>

        <!-- Tautan Cepat -->
        <div>
          <h4 class="text-white font-bold text-base mb-4">Menu Cepat</h4>
          <ul class="space-y-2 text-sm text-slate-400">
            <li><a href="#layanan" class="hover:text-orange-400 transition-colors">Daftar Harga Servis</a></li>
            <li><a href="#katalog" class="hover:text-orange-400 transition-colors">Katalog Sparepart Motor</a></li>
            <li><a href="#katalog" class="hover:text-orange-400 transition-colors">Katalog Peralatan Bengkel</a></li>
            <li><a href="#booking" class="hover:text-orange-400 transition-colors">Booking Antrean Online</a></li>
          </ul>
        </div>
      </div>

      <div class="mt-12 pt-8 border-t border-slate-900 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
        <p>&copy; 2026 Surabaya Motor. Hak Cipta Dilindungi Undang-Undang.</p>
        <p>Dibuat untuk Profil Digital UMKM Surabaya Motor</p>
      </div>
    </div>
  </footer>

  <!-- ================= FLOATING WHATSAPP BUTTON ================= -->
  <a 
    href="https://wa.me/6281234567890?text=Halo%20Admin%20Surabaya%20Motor,%20saya%20ingin%20bertanya%20mengenai%20servis%20/%20stok%20barang." 
    target="_blank" 
    rel="noopener noreferrer"
    class="fixed bottom-6 right-6 z-40 bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-3.5 rounded-full shadow-2xl shadow-emerald-500/40 flex items-center gap-2.5 font-bold text-sm transition-transform hover:scale-105"
    aria-label="Chat WhatsApp Surabaya Motor"
  >
    <i class="fa-brands fa-whatsapp text-2xl"></i>
    <span class="hidden sm:inline">Chat Admin WA</span>
  </a>

  <!-- ================= DRAWER KERANJANG BELANJA / TANYA STOK ================= -->
  <div id="cart-drawer" class="fixed inset-0 z-50 hidden">
    <!-- Backdrop -->
    <div onclick="toggleCartDrawer()" class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm transition-opacity"></div>
    
    <!-- Panel -->
    <div class="absolute right-0 top-0 bottom-0 w-full max-w-md bg-white shadow-2xl flex flex-col">
      <div class="p-6 bg-slate-900 text-white flex items-center justify-between">
        <div>
          <h3 class="font-display font-bold text-lg">Daftar Belanja / Tanya Stok</h3>
          <p class="text-xs text-slate-400">Kumpulkan barang eceran atau grosir bengkel</p>
        </div>
        <button onclick="toggleCartDrawer()" class="w-9 h-9 rounded-xl bg-slate-800 hover:bg-slate-700 flex items-center justify-center text-slate-300">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>

      <!-- List Item -->
      <div id="cart-items-container" class="flex-1 overflow-y-auto p-6 space-y-4">
        <!-- Item keranjang dirender di sini -->
      </div>

      <!-- Footer Keranjang -->
      <div class="p-6 border-t border-slate-200 bg-slate-50 space-y-4">
        <div class="flex items-center justify-between">
          <span class="text-sm font-medium text-slate-600">Estimasi Total:</span>
          <span id="cart-total" class="font-display font-extrabold text-xl text-slate-900">Rp 0</span>
        </div>
        <p class="text-[11px] text-slate-500">*Pembelian grosir untuk bengkel akan mendapatkan potongan harga khusus saat konfirmasi di WhatsApp.</p>
        <button onclick="checkoutViaWhatsApp()" class="w-full py-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-lg flex items-center justify-center gap-2 transition-colors">
          <i class="fa-brands fa-whatsapp text-lg"></i>
          Kirim Daftar Pesanan ke WhatsApp
        </button>
      </div>
    </div>
  </div>

  <!-- ================= TOAST NOTIFICATION ================= -->
  <div id="toast" class="fixed bottom-24 right-6 z-50 transform translate-y-10 opacity-0 pointer-events-none transition-all duration-300 bg-slate-900 text-white px-5 py-3.5 rounded-xl shadow-xl border border-slate-700 flex items-center gap-3 text-sm font-medium">
    <i class="fa-solid fa-circle-check text-emerald-400 text-lg"></i>
    <span id="toast-message">Barang ditambahkan ke daftar!</span>
  </div>

  <!-- ================= JAVASCRIPT LOGIC ================= -->
  <script>
    // Nomor WhatsApp Admin Surabaya Motor (Ganti dengan nomor asli UMKM)
    const ADMIN_WA_NUMBER = "6281234567890";

    // Data Katalog Produk (Sparepart Motor, Peralatan Bengkel, & Aksesoris)
    const products = [
      {
        id: 1,
        name: "Kompresor Angin Otomatis 1 HP (Tabung 30L)",
        category: "Peralatan Bengkel",
        price: 1850000,
        unit: "Unit",
        stock: "Tersedia",
        badge: "Alat Bengkel",
        icon: "fa-wind",
        desc: "Cocok untuk bengkel motor, tekanan angin stabil, motor listrik tembaga murni."
      },
      {
        id: 2,
        name: "Kunci Sok Set 24 Pcs Heavy Duty (Chrome Vanadium)",
        category: "Peralatan Bengkel",
        price: 385000,
        unit: "Set",
        stock: "Tersedia",
        badge: "Best Seller",
        icon: "fa-wrench",
        desc: "Ukuran lengkap 8mm - 32mm dengan gagang ratchet kuat anti selek."
      },
      {
        id: 3,
        name: "Oli Mesin MPX2 0.8L (1 Dus / Eceran)",
        category: "Sparepart Motor",
        price: 52000,
        unit: "Botol",
        stock: "Tersedia",
        badge: "Original",
        icon: "fa-oil-can",
        desc: "Oli resmi motor matic Honda. Tersedia harga grosir per dus (24 botol)."
      },
      {
        id: 4,
        name: "Impact Wrench Cordless 48V Torsi Tinggi",
        category: "Peralatan Bengkel",
        price: 750000,
        unit: "Set",
        stock: "Tersedia",
        badge: "Alat Bengkel",
        icon: "fa-screwdriver",
        desc: "Mempercepat buka baut puli CVT dan as roda motor tanpa lelah."
      },
      {
        id: 5,
        name: "Ban Tubeless Motor Matic 90/90-14",
        category: "Sparepart Motor",
        price: 215000,
        unit: "Pcs",
        stock: "Tersedia",
        badge: "Original",
        icon: "fa-circle-dot",
        desc: "Daya cengkeram kuat di jalan basah maupun kering, awet untuk harian."
      },
      {
        id: 6,
        name: "Alat Pembuka Ban Manual (Tire Changer)",
        category: "Peralatan Bengkel",
        price: 1450000,
        unit: "Unit",
        stock: "Tersedia",
        badge: "Alat Bengkel",
        icon: "fa-gears",
        desc: "Besi tebal presisi, aman untuk velg racing agar tidak lecet saat congkel ban."
      },
      {
        id: 7,
        name: "Kampas Rem Cakram Depan (Matic & Bebek)",
        category: "Sparepart Motor",
        price: 35000,
        unit: "Set",
        stock: "Tersedia",
        badge: "Grosir Ready",
        icon: "fa-compact-disc",
        desc: "Pakem, tidak merusak piringan cakram, dan tidak berdecit."
      },
      {
        id: 8,
        name: "Aki Kering Motor GTZ5S / GM5Z-3B",
        category: "Sparepart Motor",
        price: 165000,
        unit: "Pcs",
        stock: "Tersedia",
        badge: "Bergaransi",
        icon: "fa-car-battery",
        desc: "Bebas perawatan (Maintenance Free), starter langsung nyala."
      },
      {
        id: 9,
        name: "Kunci T Set (8, 10, 12, 14, 17 mm)",
        category: "Peralatan Bengkel",
        price: 115000,
        unit: "Set",
        stock: "Tersedia",
        badge: "Wajib Bengkel",
        icon: "fa-toolbox",
        desc: "Baja Cr-V kuat dan presisi untuk bongkar pasang mesin motor."
      },
      {
        id: 10,
        name: "Dongkrak Hidrolik / Standar Paddock Motor",
        category: "Peralatan Bengkel",
        price: 240000,
        unit: "Unit",
        stock: "Tersedia",
        badge: "Alat Bengkel",
        icon: "fa-arrow-up-from-bracket",
        desc: "Kokoh menahan beban motor matic maupun sport saat perbaikan."
      },
      {
        id: 11,
        name: "Cairan Tambal Ban Tubeless & Pentil (1 Lusin)",
        category: "Aksesoris",
        price: 180000,
        unit: "Paket",
        stock: "Tersedia",
        badge: "Paket Bengkel",
        icon: "fa-fill-drip",
        desc: "Paket kulakan cairan anti bocor + pentil tubeless untuk stok bengkel."
      },
      {
        id: 12,
        name: "Lampu Utama LED Motor H6 / H4 Super Terang",
        category: "Aksesoris",
        price: 45000,
        unit: "Pcs",
        stock: "Tersedia",
        badge: "Aksesoris",
        icon: "fa-lightbulb",
        desc: "Cahaya putih fokus, hemat aki (AC/DC), plug & play."
      }
    ];

    let activeCategory = "Semua";
    let cart = [];

    // Format angka ke Rupiah
    function formatRupiah(number) {
      return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0
      }).format(number);
    }

    // Render Produk ke Grid
    function renderProducts(items) {
      const grid = document.getElementById("product-grid");
      const emptyState = document.getElementById("empty-state");

      if (items.length === 0) {
        grid.innerHTML = "";
        emptyState.classList.remove("hidden");
        return;
      }

      emptyState.classList.add("hidden");
      grid.innerHTML = items.map(product => `
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl hover:border-orange-300 transition-all flex flex-col justify-between">
          <div>
            <!-- Top Visual Area -->
            <div class="p-5 bg-gradient-to-br from-slate-900 to-slate-800 text-white relative">
              <div class="flex items-center justify-between mb-4">
                <span class="px-2.5 py-1 rounded-lg bg-orange-500/20 text-orange-400 text-[11px] font-bold uppercase tracking-wider">
                  ${product.badge}
                </span>
                <span class="px-2.5 py-1 rounded-lg bg-emerald-500/20 text-emerald-400 text-[11px] font-semibold">
                  <i class="fa-solid fa-circle text-[7px] mr-1"></i>${product.stock}
                </span>
              </div>
              <div class="w-12 h-12 rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center text-orange-400 text-xl">
                <i class="fa-solid ${product.icon}"></i>
              </div>
              <p class="text-[11px] text-slate-400 mt-3 font-medium">${product.category}</p>
              <h3 class="font-bold text-base text-white mt-0.5 leading-snug">${product.name}</h3>
            </div>

            <!-- Description -->
            <div class="p-5 pb-3">
              <p class="text-xs text-slate-600 leading-relaxed">${product.desc}</p>
            </div>
          </div>

          <!-- Price & Actions -->
          <div class="p-5 pt-2">
            <div class="mb-4">
              <span class="text-[11px] text-slate-400 block">Harga Eceran / ${product.unit}</span>
              <span class="font-display font-extrabold text-xl text-slate-900">${formatRupiah(product.price)}</span>
            </div>

            <div class="grid grid-cols-2 gap-2">
              <button 
                onclick="addToCart(${product.id})" 
                class="py-2.5 px-3 rounded-xl bg-slate-900 hover:bg-orange-500 text-white text-xs font-bold transition-colors flex items-center justify-center gap-1.5"
              >
                <i class="fa-solid fa-cart-plus"></i> + Daftar
              </button>
              <a 
                href="https://wa.me/${ADMIN_WA_NUMBER}?text=${encodeURIComponent(`Halo Surabaya Motor, saya ingin tanya stok & harga untuk produk: *${product.name}* (${formatRupiah(product.price)})`)}" 
                target="_blank" 
                rel="noopener noreferrer"
                class="py-2.5 px-3 rounded-xl bg-emerald-50 hover:bg-emerald-600 text-emerald-700 hover:text-white border border-emerald-200 text-xs font-bold transition-colors flex items-center justify-center gap-1.5"
              >
                <i class="fa-brands fa-whatsapp text-sm"></i> Tanya WA
              </a>
            </div>
          </div>
        </div>
      `).join("");
    }

    // Set Kategori Filter
    function setCategory(category) {
      activeCategory = category;

      // Update UI Tombol Tab
      document.querySelectorAll(".cat-btn").forEach(btn => {
        if (btn.dataset.cat === category) {
          btn.classList.remove("bg-white", "text-slate-700", "border", "border-slate-200");
          btn.classList.add("bg-slate-900", "text-white", "shadow-sm");
        } else {
          btn.classList.add("bg-white", "text-slate-700", "border", "border-slate-200");
          btn.classList.remove("bg-slate-900", "text-white", "shadow-sm");
        }
      });

      filterProducts();
    }

    // Filter Produk berdasarkan Kategori & Pencarian
    function filterProducts() {
      const keyword = document.getElementById("search-input").value.toLowerCase().trim();
      
      const filtered = products.filter(p => {
        const matchCat = activeCategory === "Semua" || p.category === activeCategory;
        const matchSearch = p.name.toLowerCase().includes(keyword) || 
                            p.desc.toLowerCase().includes(keyword) ||
                            p.category.toLowerCase().includes(keyword);
        return matchCat && matchSearch;
      });

      renderProducts(filtered);
    }

    // Tambah Barang ke Keranjang Daftar Belanja
    function addToCart(productId) {
      const product = products.find(p => p.id === productId);
      if (!product) return;

      const existingItem = cart.find(item => item.id === productId);
      if (existingItem) {
        existingItem.qty += 1;
      } else {
        cart.push({ ...product, qty: 1 });
      }

      updateCartUI();
      showToast(`"${product.name}" ditambahkan ke daftar!`);
    }

    // Ubah Jumlah Item di Keranjang
    function updateQty(productId, delta) {
      const itemIndex = cart.findIndex(item => item.id === productId);
      if (itemIndex === -1) return;

      cart[itemIndex].qty += delta;
      if (cart[itemIndex].qty <= 0) {
        cart.splice(itemIndex, 1);
      }

      updateCartUI();
    }

    // Update Tampilan Keranjang & Badge
    function updateCartUI() {
      const badge = document.getElementById("cart-badge");
      const container = document.getElementById("cart-items-container");
      const totalEl = document.getElementById("cart-total");

      const totalQty = cart.reduce((sum, item) => sum + item.qty, 0);
      const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);

      badge.textContent = totalQty;
      totalEl.textContent = formatRupiah(totalPrice);

      if (cart.length === 0) {
        container.innerHTML = `
          <div class="text-center py-12 text-slate-400">
            <i class="fa-solid fa-basket-shopping text-4xl mb-3 text-slate-300"></i>
            <p class="font-semibold text-slate-600">Daftar belanja masih kosong</p>
            <p class="text-xs mt-1">Klik tombol "+ Daftar" pada katalog produk untuk mengumpulkan barang.</p>
          </div>
        `;
        return;
      }

      container.innerHTML = cart.map(item => `
        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between gap-3">
          <div class="flex-1">
            <span class="text-[10px] font-bold uppercase text-orange-600">${item.category}</span>
            <h4 class="font-bold text-sm text-slate-900 leading-snug">${item.name}</h4>
            <p class="text-xs font-semibold text-slate-600 mt-1">${formatRupiah(item.price)} / ${item.unit}</p>
          </div>

          <div class="flex items-center gap-2 bg-white border border-slate-200 rounded-lg p-1">
            <button onclick="updateQty(${item.id}, -1)" class="w-7 h-7 rounded-md hover:bg-slate-100 text-slate-700 font-bold text-sm">-</button>
            <span class="w-6 text-center text-xs font-bold">${item.qty}</span>
            <button onclick="updateQty(${item.id}, 1)" class="w-7 h-7 rounded-md hover:bg-slate-100 text-slate-700 font-bold text-sm">+</button>
          </div>
        </div>
      `).join("");
    }

    // Kirim Daftar Keranjang ke WhatsApp Admin
    function checkoutViaWhatsApp() {
      if (cart.length === 0) {
        showToast("Daftar belanja masih kosong!");
        return;
      }

      let message = "Halo Admin *Surabaya Motor*, saya ingin memesan / menanyakan ketersediaan stok barang berikut:\n\n";
      let total = 0;

      cart.forEach((item, index) => {
        const subtotal = item.price * item.qty;
        total += subtotal;
        message += `${index + 1}. *${item.name}*\n   Jumlah: ${item.qty} ${item.unit} (${formatRupiah(subtotal)})\n`;
      });

      message += `\n*Estimasi Total: ${formatRupiah(total)}*`;
      message += `\n\nMohon info ketersediaan stok dan harga grosirnya (jika ada). Terima kasih!`;

      const waUrl = `https://wa.me/${ADMIN_WA_NUMBER}?text=${encodeURIComponent(message)}`;
      window.open(waUrl, "_blank", "noopener,noreferrer");
    }

    // Handle Submit Form Booking Servis
    function handleBookingSubmit(event) {
      event.preventDefault();

      const name = document.getElementById("book-name").value.trim();
      const wa = document.getElementById("book-wa").value.trim();
      const bike = document.getElementById("book-bike").value.trim();
      const service = document.getElementById("book-service").value;
      const date = document.getElementById("book-date").value;
      const time = document.getElementById("book-time").value;
      const notes = document.getElementById("book-notes").value.trim() || "-";

      const message = 
        `Halo Admin *Surabaya Motor*, saya ingin *Booking Servis Motor*:\n\n` +
        `• *Nama:* ${name}\n` +
        `• *No. WA:* ${wa}\n` +
        `• *Jenis Motor:* ${bike}\n` +
        `• *Layanan:* ${service}\n` +
        `• *Jadwal:* ${date} pukul ${time}\n` +
        `• *Keluhan/Catatan:* ${notes}\n\n` +
        `Mohon konfirmasi ketersediaan slot bengkel. Terima kasih!`;

      showToast("Mengalihkan ke WhatsApp Admin...");
      const waUrl = `https://wa.me/${ADMIN_WA_NUMBER}?text=${encodeURIComponent(message)}`;
      window.open(waUrl, "_blank", "noopener,noreferrer");
    }

    // Toggle Drawer Keranjang
    function toggleCartDrawer() {
      const drawer = document.getElementById("cart-drawer");
      drawer.classList.toggle("hidden");
    }

    // Toggle Menu Mobile
    function toggleMobileMenu() {
      const menu = document.getElementById("mobile-menu");
      menu.classList.toggle("hidden");
    }

    // Notifikasi Toast
    let toastTimeout;
    function showToast(msg) {
      const toast = document.getElementById("toast");
      const toastMsg = document.getElementById("toast-message");
      toastMsg.textContent = msg;

      toast.classList.remove("translate-y-10", "opacity-0");
      clearTimeout(toastTimeout);
      toastTimeout = setTimeout(() => {
        toast.classList.add("translate-y-10", "opacity-0");
      }, 3000);
    }

    // Inisialisasi saat halaman dimuat
    document.addEventListener("DOMContentLoaded", () => {
      renderProducts(products);
      updateCartUI();

      // Set tanggal minimum booking ke hari ini
      const dateInput = document.getElementById("book-date");
      if (dateInput) {
        const today = new Date().toISOString().split("T")[0];
        dateInput.setAttribute("min", today);
        dateInput.value = today;
      }
    });
  </script>
</body>
</html>