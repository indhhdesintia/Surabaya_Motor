<!DOCTYPE html>
<html lang="id">
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
  <!-- Font Awesome -->
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
            }
          }
        }
      }
    }
  </script>

  <style>
    /* Custom Scrollbar */
    ::-webkit-scrollbar {
      width: 6px;
      height: 6px;
    }
    ::-webkit-scrollbar-track {
      background: #f1f5f9;
    }
    ::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 9999px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #94a3b8;
    }

    /* Styling khusus saat mode Cetak / Print Nota */
    @media print {
      body * {
        visibility: hidden;
      }
      #print-area, #print-area * {
        visibility: visible;
      }
      #print-area {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        background: white !important;
        color: black !important;
        padding: 20px;
        box-shadow: none !important;
      }
      .no-print {
        display: none !important;
      }
    }
  </style>
</head>
<body class="bg-slate-100 text-slate-800 antialiased selection:bg-orange-500 selection:text-white">

  <div class="min-h-screen flex flex-col lg:flex-row">
    
    <!-- ================= MOBILE HEADER ================= -->
    <header class="lg:hidden bg-brand-dark text-white px-4 py-3.5 flex items-center justify-between sticky top-0 z-30 border-b border-slate-800">
      <div class="flex items-center gap-2.5">
        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center shadow-md">
          <i class="fa-solid fa-gear text-white text-base"></i>
        </div>
        <div>
          <span class="font-display font-extrabold text-base tracking-tight block leading-none">SURABAYA <span class="text-orange-500">MOTOR</span></span>
          <span class="text-[10px] text-slate-400 uppercase tracking-wider">Admin & Operasional</span>
        </div>
      </div>
      <button onclick="toggleSidebar()" class="p-2.5 rounded-xl bg-slate-800 text-slate-200 hover:text-white">
        <i class="fa-solid fa-bars text-lg"></i>
      </button>
    </header>

    <!-- ================= SIDEBAR BACKDROP (MOBILE) ================= -->
    <div id="sidebar-backdrop" onclick="toggleSidebar()" class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm z-30 hidden lg:hidden"></div>

    <!-- ================= SIDEBAR NAVIGATION ================= -->
    <aside id="sidebar" class="fixed lg:sticky top-0 left-0 z-40 h-screen w-72 bg-brand-dark text-slate-300 flex flex-col justify-between border-r border-slate-800 transition-transform duration-300 -translate-x-full lg:translate-x-0 shrink-0">
      <div>
        <!-- Brand Logo -->
        <div class="p-6 border-b border-slate-800/80 flex items-center justify-between">
          <div class="flex items-center gap-3">
            <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center shadow-lg shadow-orange-500/25">
              <i class="fa-solid fa-gear text-white text-xl"></i>
            </div>
            <div>
              <span class="font-display font-extrabold text-lg text-white tracking-tight block leading-none">SURABAYA <span class="text-orange-500">MOTOR</span></span>
              <span class="text-[11px] text-slate-400 font-medium tracking-wider uppercase mt-1 block">Sistem Operasional</span>
            </div>
          </div>
          <button onclick="toggleSidebar()" class="lg:hidden text-slate-400 hover:text-white">
            <i class="fa-solid fa-xmark text-lg"></i>
          </button>
        </div>

        <!-- Menu Navigasi -->
        <nav class="p-4 space-y-1.5">
          <p class="px-3 text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-2">Menu Utama</p>
          
          <button onclick="switchTab('dashboard')" id="nav-dashboard" class="nav-item w-full flex items-center gap-3 px-4 py-3.5 rounded-xl text-sm font-semibold bg-orange-500 text-white shadow-lg shadow-orange-500/20 transition-all">
            <i class="fa-solid fa-chart-pie w-5 text-center"></i>
            <span>Dashboard </span>
          </button>

          <button onclick="switchTab('inventory')" id="nav-inventory" class="nav-item w-full flex items-center justify-between px-4 py-3.5 rounded-xl text-sm font-medium text-slate-300 hover:bg-slate-800/80 hover:text-white transition-all">
            <div class="flex items-center gap-3">
              <i class="fa-solid fa-boxes-stacked w-5 text-center text-orange-400"></i>
              <span>Manajemen Inventory</span>
            </div>
            <span id="sidebar-low-stock-badge" class="hidden px-2 py-0.5 text-[11px] font-bold rounded-full bg-red-500 text-white">0</span>
          </button>

          <button onclick="switchTab('pos')" id="nav-pos" class="nav-item w-full flex items-center gap-3 px-4 py-3.5 rounded-xl text-sm font-medium text-slate-300 hover:bg-slate-800/80 hover:text-white transition-all">
            <i class="fa-solid fa-cash-register w-5 text-center text-emerald-400"></i>
            <span>Kasir Toko </span>
          </button>

          <button onclick="switchTab('service')" id="nav-service" class="nav-item w-full flex items-center justify-between px-4 py-3.5 rounded-xl text-sm font-medium text-slate-300 hover:bg-slate-800/80 hover:text-white transition-all">
            <div class="flex items-center gap-3">
              <i class="fa-solid fa-screwdriver-wrench w-5 text-center text-blue-400"></i>
              <span>Servis & Work Order</span>
            </div>
            <span id="sidebar-active-service-badge" class="px-2 py-0.5 text-[11px] font-bold rounded-full bg-blue-500/20 text-blue-400">0</span>
          </button>
        </nav>
      </div>

      <!-- Info Demo & Reset Data -->
      <div class="p-4 border-t border-slate-800/80 space-y-3">
        <div class="p-3.5 rounded-xl bg-slate-900 border border-slate-800 text-xs">
          <div class="flex items-center gap-2 text-orange-400 font-bold mb-1">
            <i class="fa-solid fa-laptop-code"></i>
            
    </aside>

    <!-- ================= MAIN CONTENT AREA ================= -->
    <main class="flex-1 min-w-0 p-4 sm:p-6 lg:p-8">
      
      <!-- Top Bar Info -->
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
          <h1 id="page-title" class="font-display text-2xl sm:text-3xl font-extrabold text-slate-900">Dashboard Ringkasan</h1>
          <p id="page-subtitle" class="text-sm text-slate-500 mt-0.5">Pantau performa harian bengkel, penjualan sparepart, dan peringatan stok gudang.</p>
        </div>
        <div class="flex items-center gap-3 self-start sm:self-auto">
          <div class="px-4 py-2 rounded-xl bg-white border border-slate-200 shadow-sm text-xs font-semibold text-slate-600 flex items-center gap-2">
            <i class="fa-regular fa-calendar text-orange-500"></i>
            <span id="current-date-display">Memuat tanggal...</span>
          </div>
        </div>
      </div>

      <!-- =================================================================== -->
      <!-- TAB 1: DASHBOARD RINGKASAN                                          -->
      <!-- =================================================================== -->
      <section id="tab-dashboard" class="tab-content space-y-6">
        
        <!-- 4 KPI Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
          <!-- KPI 1: Pendapatan Hari Ini -->
          <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between">
              <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Omzet Hari Ini</span>
              <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">
                <i class="fa-solid fa-wallet text-lg"></i>
              </div>
            </div>
            <p id="kpi-revenue" class="font-display text-2xl font-extrabold text-slate-900 mt-3">Rp 0</p>
            <p class="text-xs text-emerald-600 font-medium mt-1.5"><i class="fa-solid fa-arrow-trend-up mr-1"></i>Gabungan Toko & Servis</p>
          </div>

          <!-- KPI 2: Servis Aktif -->
          <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between">
              <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Servis Dalam Antrean</span>
              <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                <i class="fa-solid fa-motorcycle text-lg"></i>
              </div>
            </div>
            <p id="kpi-active-services" class="font-display text-2xl font-extrabold text-slate-900 mt-3">0 Motor</p>
            <p class="text-xs text-slate-500 font-medium mt-1.5">Status Menunggu & Dikerjakan</p>
          </div>

          <!-- KPI 3: Total SKU & Stok -->
          <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between">
              <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Item Gudang</span>
              <div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center">
                <i class="fa-solid fa-boxes-stacked text-lg"></i>
              </div>
            </div>
            <p id="kpi-total-items" class="font-display text-2xl font-extrabold text-slate-900 mt-3">0 SKU</p>
            <p id="kpi-total-units" class="text-xs text-slate-500 font-medium mt-1.5">0 Total Unit Tersedia</p>
          </div>

          <!-- KPI 4: Peringatan Stok Menipis -->
          <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between">
              <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Stok Menipis / Habis</span>
              <div class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center">
                <i class="fa-solid fa-triangle-exclamation text-lg"></i>
              </div>
            </div>
            <p id="kpi-low-stock" class="font-display text-2xl font-extrabold text-red-600 mt-3">0 Barang</p>
            <p class="text-xs text-slate-500 font-medium mt-1.5">Perlu segera restock supplier</p>
          </div>
        </div>

        <!-- Middle Row: Grafik Omzet 7 Hari & Peringatan Stok Menipis -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
          
          <!-- Grafik Batang Sederhana (Performa Mingguan) -->
          <div class="lg:col-span-7 bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between mb-6">
              <div>
                <h2 class="font-display font-bold text-lg text-slate-900">Ringkasan Pendapatan 7 Hari Terakhir</h2>
                <p class="text-xs text-slate-500">Perbandingan transaksi penjualan toko & jasa bengkel</p>
              </div>
              <span class="px-3 py-1 rounded-lg bg-orange-50 text-orange-600 text-xs font-bold">Minggu Ini</span>
            </div>

            <!-- Bar Chart Container -->
            <div id="weekly-chart" class="grid grid-cols-7 gap-2 sm:gap-4 items-end h-52 pt-6 px-2 border-b border-slate-100">
              <!-- Dirender via JS -->
            </div>
            <div class="flex items-center justify-between text-xs text-slate-400 mt-3">
              <span>*Hari ini diperbarui real-time dari Kasir & Nota Servis</span>
              <span class="font-semibold text-slate-700">Satuan: Ribu Rupiah</span>
            </div>
          </div>

          <!-- Peringatan Stok Menipis -->
          <div class="lg:col-span-5 bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex flex-col">
            <div class="flex items-center justify-between mb-4">
              <div>
                <h2 class="font-display font-bold text-lg text-slate-900">Peringatan Stok Menipis</h2>
                <p class="text-xs text-slate-500">Barang di bawah batas stok minimum</p>
              </div>
              <button onclick="switchTab('inventory')" class="text-xs font-bold text-orange-600 hover:underline">Kelola Stok &rarr;</button>
            </div>

            <div id="dashboard-low-stock-list" class="flex-1 space-y-3 overflow-y-auto max-h-64 pr-1">
              <!-- Dirender via JS -->
            </div>
          </div>
        </div>

        <!-- Bottom Row: Transaksi Terakhir -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-5">
            <div>
              <h2 class="font-display font-bold text-lg text-slate-900">Riwayat Transaksi Terbaru</h2>
              <p class="text-xs text-slate-500">Log penjualan kasir (ecer/grosir) dan penyelesaian servis bengkel</p>
            </div>
            <div class="flex gap-2">
              <button onclick="switchTab('pos')" class="px-3.5 py-2 rounded-xl bg-slate-900 hover:bg-orange-500 text-white text-xs font-bold transition-colors">
                + Transaksi Kasir
              </button>
              <button onclick="switchTab('service')" class="px-3.5 py-2 rounded-xl bg-orange-500 hover:bg-orange-600 text-white text-xs font-bold transition-colors">
                + Servis Baru
              </button>
            </div>
          </div>

          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
              <thead>
                <tr class="border-b border-slate-200 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                  <th class="py-3 px-4">No. Nota</th>
                  <th class="py-3 px-4">Waktu</th>
                  <th class="py-3 px-4">Jenis Transaksi</th>
                  <th class="py-3 px-4">Pelanggan / Mitra</th>
                  <th class="py-3 px-4">Total</th>
                  <th class="py-3 px-4 text-right">Aksi</th>
                </tr>
              </thead>
              <tbody id="dashboard-transactions-table" class="divide-y divide-slate-100 text-sm">
                <!-- Dirender via JS -->
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- =================================================================== -->
      <!-- TAB 2: MANAJEMEN INVENTORY (STOK SPAREPART & ALAT BENGKEL)          -->
      <!-- =================================================================== -->
      <section id="tab-inventory" class="tab-content hidden space-y-6">
        
        <!-- Action & Filter Bar -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex flex-col lg:flex-row lg:items-center justify-between gap-4">
          <div class="flex flex-col sm:flex-row gap-3 flex-1">
            <!-- Pencarian -->
            <div class="relative flex-1 max-w-md">
              <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
              <input type="text" id="inv-search" oninput="renderInventory()" placeholder="Cari SKU atau nama barang..." class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
            </div>

            <!-- Filter Kategori -->
            <select id="inv-cat-filter" onchange="renderInventory()" class="px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm font-medium text-slate-700 focus:outline-none focus:border-orange-500">
              <option value="Semua">Semua Kategori</option>
              <option value="Sparepart Motor">Sparepart Motor</option>
              <option value="Peralatan Bengkel">Peralatan Bengkel</option>
              <option value="Aksesoris">Aksesoris & Bahan Habis Pakai</option>
            </select>

            <!-- Filter Status Stok -->
            <select id="inv-status-filter" onchange="renderInventory()" class="px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm font-medium text-slate-700 focus:outline-none focus:border-orange-500">
              <option value="Semua">Semua Status Stok</option>
              <option value="Aman">Stok Aman</option>
              <option value="Menipis">Stok Menipis</option>
              <option value="Habis">Stok Habis</option>
            </select>
          </div>

          <!-- Tombol Aksi -->
          <div class="flex flex-wrap items-center gap-2.5">
            <button onclick="exportInventoryCSV()" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs border border-slate-300 transition-colors flex items-center gap-2">
              <i class="fa-solid fa-file-csv text-emerald-600 text-base"></i> Export CSV
            </button>
            <button onclick="openItemModal()" class="px-4 py-2.5 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-bold text-xs shadow-md shadow-orange-500/20 transition-colors flex items-center gap-2">
              <i class="fa-solid fa-plus"></i> Tambah Barang Baru
            </button>
          </div>
        </div>

        <!-- Tabel Inventory -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
              <thead>
                <tr class="bg-slate-900 text-slate-300 text-[11px] font-bold uppercase tracking-wider">
                  <th class="py-3.5 px-4">SKU</th>
                  <th class="py-3.5 px-4">Nama Barang & Kategori</th>
                  <th class="py-3.5 px-4">Harga Modal</th>
                  <th class="py-3.5 px-4">Harga Eceran</th>
                  <th class="py-3.5 px-4">Harga Grosir</th>
                  <th class="py-3.5 px-4 text-center">Stok Gudang</th>
                  <th class="py-3.5 px-4">Status</th>
                  <th class="py-3.5 px-4 text-right">Kelola Cepat</th>
                </tr>
              </thead>
              <tbody id="inventory-table-body" class="divide-y divide-slate-100 text-sm">
                <!-- Dirender via JS -->
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- =================================================================== -->
      <!-- TAB 3: KASIR TOKO (POS ECERAN & GROSIR BENGKEL)                     -->
      <!-- =================================================================== -->
      <section id="tab-pos" class="tab-content hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
          
          <!-- Kiri: Katalog Pilihan Barang Kasir -->
          <div class="lg:col-span-7 space-y-4">
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm space-y-4">
              <div class="flex flex-col sm:flex-row gap-3">
                <div class="relative flex-1">
                  <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                  <input type="text" id="pos-search" oninput="renderPOSProducts()" placeholder="Ketik nama barang / SKU untuk kasir..." class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
                </div>
                <select id="pos-cat-filter" onchange="renderPOSProducts()" class="px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm font-medium text-slate-700">
                  <option value="Semua">Semua Kategori</option>
                  <option value="Sparepart Motor">Sparepart Motor</option>
                  <option value="Peralatan Bengkel">Peralatan Bengkel</option>
                  <option value="Aksesoris">Aksesoris</option>
                </select>
              </div>

              <!-- Grid Barang Kasir -->
              <div id="pos-product-grid" class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-h-[560px] overflow-y-auto pr-1">
                <!-- Dirender via JS -->
              </div>
            </div>
          </div>

          <!-- Kanan: Keranjang Transaksi & Pembayaran -->
          <div class="lg:col-span-5">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden sticky top-6">
              <div class="p-5 bg-slate-900 text-white flex items-center justify-between">
                <div>
                  <h2 class="font-display font-bold text-base">Keranjang Kasir POS</h2>
                  <p class="text-[11px] text-slate-400">Otomatis memotong stok gudang saat bayar</p>
                </div>
                <button onclick="clearPOSCart()" class="text-xs text-slate-400 hover:text-red-400 font-semibold">Kosongkan</button>
              </div>

              <div class="p-5 space-y-4">
                <!-- Mode Harga: Eceran vs Grosir Bengkel -->
                <div>
                  <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1.5">Tipe Pelanggan & Skema Harga</label>
                  <div class="grid grid-cols-2 gap-2 p-1 bg-slate-100 rounded-xl">
                    <button type="button" onclick="setPOSPriceMode('retail')" id="btn-mode-retail" class="py-2 px-3 rounded-lg text-xs font-bold bg-white text-slate-900 shadow-sm transition-all">
                      <i class="fa-solid fa-user mr-1 text-orange-500"></i> Pelanggan Eceran
                    </button>
                    <button type="button" onclick="setPOSPriceMode('wholesale')" id="btn-mode-wholesale" class="py-2 px-3 rounded-lg text-xs font-semibold text-slate-600 hover:text-slate-900 transition-all">
                      <i class="fa-solid fa-store mr-1 text-blue-600"></i> Grosir / Mitra Bengkel
                    </button>
                  </div>
                </div>

                <!-- Nama Pembeli -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                  <div>
                    <label class="block text-[11px] font-bold uppercase text-slate-500 mb-1">Nama Pembeli / Bengkel</label>
                    <input type="text" id="pos-customer-name" placeholder="Umum / Nama Bengkel" class="w-full px-3.5 py-2 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
                  </div>
                  <div>
                    <label class="block text-[11px] font-bold uppercase text-slate-500 mb-1">No. WhatsApp (Opsional)</label>
                    <input type="tel" id="pos-customer-wa" placeholder="0812xxxx" class="w-full px-3.5 py-2 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
                  </div>
                </div>

                <!-- Daftar Item Keranjang -->
                <div id="pos-cart-list" class="border-y border-slate-200 py-3 max-h-60 overflow-y-auto space-y-2.5">
                  <!-- Dirender via JS -->
                </div>

                <!-- Perhitungan Total & Bayar -->
                <div class="space-y-2.5 text-sm">
                  <div class="flex justify-between text-slate-600">
                    <span>Total Item:</span>
                    <span id="pos-total-items" class="font-bold">0 pcs</span>
                  </div>
                  <div class="flex justify-between items-center text-base">
                    <span class="font-bold text-slate-800">Total Tagihan:</span>
                    <span id="pos-grand-total" class="font-display font-extrabold text-2xl text-orange-600">Rp 0</span>
                  </div>

                  <div class="pt-2">
                    <label class="block text-[11px] font-bold uppercase text-slate-500 mb-1">Uang Diterima (Tunai / Transfer)</label>
                    <input type="number" id="pos-cash-input" oninput="calculatePOSChange()" placeholder="Masukkan nominal pembayaran..." class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-300 font-bold text-slate-900 focus:outline-none focus:border-orange-500">
                  </div>

                  <div class="flex justify-between items-center p-3 rounded-xl bg-slate-100">
                    <span class="text-xs font-bold text-slate-600">Kembalian:</span>
                    <span id="pos-change" class="font-display font-extrabold text-base text-emerald-600">Rp 0</span>
                  </div>
                </div>

                <!-- Tombol Proses -->
                <button onclick="processPOSTransaction()" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-bold text-sm shadow-lg shadow-orange-500/25 transition-all flex items-center justify-center gap-2">
                  <i class="fa-solid fa-receipt"></i> Proses Pembayaran & Cetak Struk
                </button>
              </div>
            </div>
          </div>

        </div>
      </section>

      <!-- =================================================================== -->
      <!-- TAB 4: ANTREAN & NOTA SERVIS BENGKEL (WORK ORDER)                   -->
      <!-- =================================================================== -->
      <section id="tab-service" class="tab-content hidden space-y-6">
        
        <!-- Header Aksi Servis -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4">
          <div class="flex flex-wrap gap-2">
            <button onclick="setServiceFilter('Semua')" data-srv="Semua" class="srv-filter-btn px-4 py-2 rounded-xl text-xs font-bold bg-slate-900 text-white">Semua Work Order</button>
            <button onclick="setServiceFilter('Menunggu')" data-srv="Menunggu" class="srv-filter-btn px-4 py-2 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200">Menunggu</button>
            <button onclick="setServiceFilter('Dikerjakan')" data-srv="Dikerjakan" class="srv-filter-btn px-4 py-2 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200">Sedang Dikerjakan</button>
            <button onclick="setServiceFilter('Selesai')" data-srv="Selesai" class="srv-filter-btn px-4 py-2 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200">Selesai Servis</button>
            <button onclick="setServiceFilter('Diambil')" data-srv="Diambil" class="srv-filter-btn px-4 py-2 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200">Sudah Diambil</button>
          </div>
          <button onclick="openServiceModal()" class="px-5 py-2.5 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-bold text-xs shadow-md shadow-orange-500/20 flex items-center justify-center gap-2 shrink-0">
            <i class="fa-solid fa-plus"></i> Buat Work Order Servis Baru
          </button>
        </div>

        <!-- Grid Kartu Antrean Servis -->
        <div id="service-cards-grid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
          <!-- Dirender via JS -->
        </div>
      </section>

    </main>
  </div>

  <!-- ===================================================================== -->
  <!-- MODAL 1: TAMBAH / EDIT BARANG INVENTORY                               -->
  <!-- ===================================================================== -->
  <div id="item-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
    <div onclick="closeItemModal()" class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm"></div>
    <div class="relative bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-slate-200 max-h-[90vh] overflow-y-auto">
      <div class="flex items-center justify-between mb-5">
        <h3 id="item-modal-title" class="font-display font-extrabold text-xl text-slate-900">Tambah Barang Baru</h3>
        <button onclick="closeItemModal()" class="w-9 h-9 rounded-xl bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-600">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>

      <form id="item-form" onsubmit="saveInventoryItem(event)" class="space-y-4">
        <input type="hidden" id="item-id">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Kode SKU *</label>
            <input type="text" id="item-sku" required placeholder="Contoh: SM-PRT-013" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
          </div>
          <div>
            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Kategori *</label>
            <select id="item-category" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
              <option value="Sparepart Motor">Sparepart Motor</option>
              <option value="Peralatan Bengkel">Peralatan Bengkel</option>
              <option value="Aksesoris">Aksesoris</option>
            </select>
          </div>
        </div>

        <div>
          <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Nama Barang *</label>
          <input type="text" id="item-name" required placeholder="Contoh: Oli Mesin Yamalube Matic 0.8L" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
          <div>
            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Harga Modal (Rp) *</label>
            <input type="number" id="item-cost" required min="0" placeholder="40000" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
          </div>
          <div>
            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Harga Eceran (Rp) *</label>
            <input type="number" id="item-retail" required min="0" placeholder="52000" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
          </div>
          <div>
            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Harga Grosir (Rp) *</label>
            <input type="number" id="item-wholesale" required min="0" placeholder="46000" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
          <div>
            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Jumlah Stok *</label>
            <input type="number" id="item-stock" required min="0" placeholder="20" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
          </div>
          <div>
            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Batas Min. Stok *</label>
            <input type="number" id="item-min-stock" required min="1" value="5" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
          </div>
          <div>
            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Satuan *</label>
            <input type="text" id="item-unit" required placeholder="Botol / Set / Pcs" value="Pcs" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
          </div>
        </div>

        <div class="pt-3 flex justify-end gap-2.5">
          <button type="button" onclick="closeItemModal()" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-sm">Batal</button>
          <button type="submit" class="px-6 py-2.5 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-bold text-sm shadow-md">Simpan Barang</button>
        </div>
      </form>
    </div>
  </div>

  <!-- ===================================================================== -->
  <!-- MODAL 2: BUAT / KELOLA WORK ORDER SERVIS BENGKEL                      -->
  <!-- ===================================================================== -->
  <div id="service-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
    <div onclick="closeServiceModal()" class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm"></div>
    <div class="relative bg-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 shadow-2xl border border-slate-200 max-h-[92vh] overflow-y-auto">
      <div class="flex items-center justify-between mb-5">
        <div>
          <h3 id="service-modal-title" class="font-display font-extrabold text-xl text-slate-900">Work Order Servis Bengkel</h3>
          <p class="text-xs text-slate-500">Input data motor, biaya jasa, serta sparepart yang digunakan</p>
        </div>
        <button onclick="closeServiceModal()" class="w-9 h-9 rounded-xl bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-600">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>

      <form id="service-form" onsubmit="saveServiceOrder(event)" class="space-y-4">
        <input type="hidden" id="srv-id">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Nama Pelanggan *</label>
            <input type="text" id="srv-customer" required placeholder="Contoh: Andi Rahmat" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
          </div>
          <div>
            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">No. WhatsApp *</label>
            <input type="tel" id="srv-wa" required placeholder="08123456789" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
          <div>
            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Tipe Motor *</label>
            <input type="text" id="srv-bike" required placeholder="Honda Vario 150" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
          </div>
          <div>
            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Plat Nomor *</label>
            <input type="text" id="srv-plate" required placeholder="L 4521 AB" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm uppercase focus:outline-none focus:border-orange-500">
          </div>
          <div>
            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Mekanik *</label>
            <select id="srv-mechanic" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
              <option value="Cak Hendra (Kepala Mekanik)">Cak Hendra (Kepala Mekanik)</option>
              <option value="Mas Rudi (Injeksi & CVT)">Mas Rudi (Injeksi & CVT)</option>
              <option value="Mas Bagus (Mesin & Kelistrikan)">Mas Bagus (Mesin & Kelistrikan)</option>
            </select>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
          <div class="sm:col-span-2">
            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Keluhan / Jenis Pekerjaan *</label>
            <input type="text" id="srv-complaint" required placeholder="Contoh: Servis CVT gredek + Ganti Oli + Cek Rem" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm focus:outline-none focus:border-orange-500">
          </div>
          <div>
            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Status Pengerjaan *</label>
            <select id="srv-status" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-300 text-sm font-bold text-slate-800 focus:outline-none focus:border-orange-500">
              <option value="Menunggu">Menunggu</option>
              <option value="Dikerjakan">Dikerjakan</option>
              <option value="Selesai">Selesai</option>
              <option value="Diambil">Diambil (Lunas)</option>
            </select>
          </div>
        </div>

        <!-- Biaya Jasa Servis -->
        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
          <div class="flex items-center justify-between">
            <span class="text-xs font-bold uppercase text-slate-600">1. Biaya Jasa Mekanik</span>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <input type="text" id="srv-service-desc" placeholder="Keterangan Jasa (Misal: Tune Up & Servis CVT)" value="Jasa Servis & Tune Up" class="w-full px-3.5 py-2 rounded-xl bg-white border border-slate-300 text-sm">
            <input type="number" id="srv-service-fee" oninput="updateServiceModalTotal()" min="0" value="50000" placeholder="Biaya Jasa (Rp)" class="w-full px-3.5 py-2 rounded-xl bg-white border border-slate-300 text-sm font-bold">
          </div>
        </div>

        <!-- Tambah Sparepart dari Gudang -->
        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
          <div class="flex items-center justify-between">
            <span class="text-xs font-bold uppercase text-slate-600">2. Sparepart / Oli Terpakai (Potong Stok Otomatis)</span>
          </div>
          <div class="flex flex-col sm:flex-row gap-2">
            <select id="srv-part-select" class="flex-1 px-3.5 py-2 rounded-xl bg-white border border-slate-300 text-sm">
              <!-- Opsi dirender dari inventory -->
            </select>
            <button type="button" onclick="addPartToServiceModal()" class="px-4 py-2 rounded-xl bg-slate-900 hover:bg-orange-500 text-white text-xs font-bold transition-colors shrink-0">
              + Tambah Part
            </button>
          </div>

          <!-- List Sparepart di Work Order -->
          <div id="srv-parts-list" class="space-y-2">
            <!-- Dirender via JS -->
          </div>
        </div>

        <!-- Total Estimasi / Tagihan -->
        <div class="flex items-center justify-between p-4 rounded-2xl bg-slate-900 text-white">
          <span class="text-sm font-semibold">Total Biaya Servis & Sparepart:</span>
          <span id="srv-modal-total" class="font-display font-extrabold text-xl text-orange-400">Rp 50.000</span>
        </div>

        <div class="pt-2 flex justify-end gap-2.5">
          <button type="button" onclick="closeServiceModal()" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-sm">Batal</button>
          <button type="submit" class="px-6 py-2.5 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-bold text-sm shadow-md">Simpan Work Order</button>
        </div>
      </form>
    </div>
  </div>

  <!-- ===================================================================== -->
  <!-- MODAL 3: STRUK NOTA DIGITAL (SIAP PRINT & KIRIM WHATSAPP)             -->
  <!-- ===================================================================== -->
  <div id="receipt-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
    <div onclick="closeReceiptModal()" class="absolute inset-0 bg-slate-950/75 backdrop-blur-sm no-print"></div>
    <div class="relative bg-white rounded-3xl max-w-md w-full p-6 shadow-2xl border border-slate-200 max-h-[92vh] overflow-y-auto">
      
      <!-- Area Nota yang akan dicetak -->
      <div id="print-area" class="font-mono text-xs text-slate-800 space-y-3">
        <div class="text-center border-b-2 border-dashed border-slate-300 pb-3">
          <h2 class="font-sans font-extrabold text-lg text-slate-900 tracking-tight">SURABAY MOTOR</h2>
          <p class="text-[11px] text-slate-500">Bengkel Servis & Pusat Alat Bengkel</p>
          <p class="text-[10px] text-slate-400">Jl. Raya Otomotif No. 88 | WA: 0812-3456-7890</p>
        </div>

        <div id="receipt-meta" class="space-y-1 text-[11px] border-b border-dashed border-slate-300 pb-2.5">
          <!-- Info Nota dirender via JS -->
        </div>

        <div id="receipt-items" class="space-y-2 border-b border-dashed border-slate-300 pb-3">
          <!-- Item Nota dirender via JS -->
        </div>

        <div id="receipt-totals" class="space-y-1 text-xs">
          <!-- Total Nota dirender via JS -->
        </div>

        <div class="text-center pt-3 border-t border-dashed border-slate-300 text-[10px] text-slate-500">
          <p class="font-bold text-slate-700">Terima kasih atas kepercayaan Anda!</p>
          <p>Garansi servis 7 hari untuk keluhan yang sama.</p>
        </div>
      </div>

      <!-- Tombol Aksi Nota (Tidak ikut tercetak) -->
      <div class="mt-6 pt-4 border-t border-slate-200 grid grid-cols-2 gap-2.5 no-print">
        <button onclick="window.print()" class="py-3 px-4 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs flex items-center justify-center gap-2">
          <i class="fa-solid fa-print"></i> Cetak / Print Nota
        </button>
        <button id="receipt-wa-btn" class="py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs flex items-center justify-center gap-2">
          <i class="fa-brands fa-whatsapp text-base"></i> Kirim Nota WA
        </button>
      </div>
      <button onclick="closeReceiptModal()" class="mt-2.5 w-full py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs no-print">
        Tutup
      </button>
    </div>
  </div>

  <!-- ===================================================================== -->
  <!-- MODAL KONFIRMASI RESET DATA DEMO                                      -->
  <!-- ===================================================================== -->
  <div id="reset-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
    <div onclick="closeResetModal()" class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm"></div>
    <div class="relative bg-white rounded-3xl max-w-sm w-full p-6 shadow-2xl border border-slate-200 text-center">
      <div class="w-12 h-12 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-xl mx-auto mb-3">
        <i class="fa-solid fa-rotate-left"></i>
      </div>
      <h3 class="font-display font-bold text-lg text-slate-900">Reset Data Demo?</h3>
      <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">Semua perubahan transaksi, servis, dan stok akan dikembalikan ke data awal presentasi Surabay Motor.</p>
      <div class="mt-5 grid grid-cols-2 gap-2.5">
        <button onclick="closeResetModal()" class="py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs">Batal</button>
        <button onclick="executeResetDemo()" class="py-2.5 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold text-xs">Ya, Reset Data</button>
      </div>
    </div>
  </div>

  <!-- ===================================================================== -->
  <!-- TOAST NOTIFICATION                                                    -->
  <!-- ===================================================================== -->
  <div id="toast" class="fixed bottom-6 right-6 z-50 transform translate-y-12 opacity-0 pointer-events-none transition-all duration-300 bg-slate-900 text-white px-5 py-3.5 rounded-xl shadow-2xl border border-slate-700 flex items-center gap-3 text-xs font-semibold">
    <i id="toast-icon" class="fa-solid fa-circle-check text-emerald-400 text-base"></i>
    <span id="toast-msg">Berhasil disimpan!</span>
  </div>

  <!-- ===================================================================== -->
  <!-- JAVASCRIPT APPLICATION LOGIC                                          -->
  <!-- ===================================================================== -->
  <script>
    // Konfigurasi Kunci LocalStorage
    const STORAGE_KEYS = {
      INVENTORY: 'sm_erp_inventory_v1',
      SERVICES: 'sm_erp_services_v1',
      TRANSACTIONS: 'sm_erp_transactions_v1'
    };

    // Data Awal Inventory (Sinkron dengan Produk Web Profil Surabay Motor)
    const INITIAL_INVENTORY = [
      { id: 1, sku: 'SM-TLS-001', name: 'Kompresor Angin Otomatis 1 HP (Tabung 30L)', category: 'Peralatan Bengkel', cost: 1550000, retail: 1850000, wholesale: 1725000, stock: 4, minStock: 2, unit: 'Unit' },
      { id: 2, sku: 'SM-TLS-002', name: 'Kunci Sok Set 24 Pcs Heavy Duty (Cr-V)', category: 'Peralatan Bengkel', cost: 310000, retail: 385000, wholesale: 350000, stock: 9, minStock: 3, unit: 'Set' },
      { id: 3, sku: 'SM-PRT-003', name: 'Oli Mesin MPX2 0.8L Original', category: 'Sparepart Motor', cost: 43000, retail: 52000, wholesale: 47500, stock: 36, minStock: 12, unit: 'Botol' },
      { id: 4, sku: 'SM-TLS-004', name: 'Impact Wrench Cordless 48V Torsi Tinggi', category: 'Peralatan Bengkel', cost: 620000, retail: 750000, wholesale: 690000, stock: 2, minStock: 3, unit: 'Set' },
      { id: 5, sku: 'SM-PRT-005', name: 'Ban Tubeless Motor Matic 90/90-14', category: 'Sparepart Motor', cost: 175000, retail: 215000, wholesale: 195000, stock: 14, minStock: 5, unit: 'Pcs' },
      { id: 6, sku: 'SM-TLS-006', name: 'Alat Pembuka Ban Manual (Tire Changer)', category: 'Peralatan Bengkel', cost: 1200000, retail: 1450000, wholesale: 1350000, stock: 3, minStock: 2, unit: 'Unit' },
      { id: 7, sku: 'SM-PRT-007', name: 'Kampas Rem Cakram Depan (Matic & Bebek)', category: 'Sparepart Motor', cost: 22000, retail: 35000, wholesale: 28000, stock: 4, minStock: 10, unit: 'Set' },
      { id: 8, sku: 'SM-PRT-008', name: 'Aki Kering Motor GTZ5S / GM5Z-3B', category: 'Sparepart Motor', cost: 130000, retail: 165000, wholesale: 148000, stock: 8, minStock: 4, unit: 'Pcs' },
      { id: 9, sku: 'SM-TLS-009', name: 'Kunci T Set (8, 10, 12, 14, 17 mm)', category: 'Peralatan Bengkel', cost: 85000, retail: 115000, wholesale: 98000, stock: 11, minStock: 4, unit: 'Set' },
      { id: 10, sku: 'SM-TLS-010', name: 'Standar Paddock / Dongkrak Motor', category: 'Peralatan Bengkel', cost: 190000, retail: 240000, wholesale: 215000, stock: 5, minStock: 2, unit: 'Unit' },
      { id: 11, sku: 'SM-AKS-011', name: 'Paket Cairan Tambal Ban Tubeless (1 Lusin)', category: 'Aksesoris', cost: 140000, retail: 180000, wholesale: 160000, stock: 2, minStock: 4, unit: 'Paket' },
      { id: 12, sku: 'SM-AKS-012', name: 'Lampu Utama LED Motor H6 / H4 Super Terang', category: 'Aksesoris', cost: 28000, retail: 45000, wholesale: 36000, stock: 18, minStock: 6, unit: 'Pcs' }
    ];

    // Data Awal Antrean Servis Bengkel
    const INITIAL_SERVICES = [
      {
        id: 'WO-2026-001',
        customer: 'Andi Rahmat',
        wa: '6281298765432',
        bike: 'Honda Vario 150',
        plate: 'L 4521 AB',
        mechanic: 'Cak Hendra (Kepala Mekanik)',
        complaint: 'Servis CVT gredek + Ganti Oli Mesin',
        status: 'Dikerjakan',
        serviceDesc: 'Jasa Servis CVT & Tune Up',
        serviceFee: 60000,
        parts: [
          { itemId: 3, name: 'Oli Mesin MPX2 0.8L Original', qty: 1, price: 52000 }
        ],
        createdAt: new Date().toISOString()
      },
      {
        id: 'WO-2026-002',
        customer: 'Dimas Pratama',
        wa: '6285712345678',
        bike: 'Yamaha NMAX 155',
        plate: 'W 3319 XY',
        mechanic: 'Mas Rudi (Injeksi & CVT)',
        complaint: 'Ganti kampas rem depan & cek kelistrikan',
        status: 'Menunggu',
        serviceDesc: 'Jasa Pasang Kampas & Cek Kelistrikan',
        serviceFee: 35000,
        parts: [
          { itemId: 7, name: 'Kampas Rem Cakram Depan (Matic & Bebek)', qty: 1, price: 35000 }
        ],
        createdAt: new Date().toISOString()
      },
      {
        id: 'WO-2026-003',
        customer: 'Siti Aminah',
        wa: '6281344556677',
        bike: 'Honda Beat Street',
        plate: 'L 6780 KQ',
        mechanic: 'Mas Bagus (Mesin & Kelistrikan)',
        complaint: 'Motor susah distarter pagi hari (Ganti Aki)',
        status: 'Selesai',
        serviceDesc: 'Pengecekan Pengisian & Pasang Aki',
        serviceFee: 25000,
        parts: [
          { itemId: 8, name: 'Aki Kering Motor GTZ5S / GM5Z-3B', qty: 1, price: 165000 }
        ],
        createdAt: new Date().toISOString()
      }
    ];

    // Data Awal Transaksi Hari Ini
    const INITIAL_TRANSACTIONS = [
      {
        id: 'TRX-2026-101',
        date: new Date().toISOString(),
        type: 'Grosir Bengkel',
        customer: 'Bengkel Maju Jaya (Mitra)',
        wa: '6281233445566',
        items: [
          { name: 'Kunci Sok Set 24 Pcs Heavy Duty (Cr-V)', qty: 2, price: 350000, unit: 'Set' },
          { name: 'Kunci T Set (8, 10, 12, 14, 17 mm)', qty: 3, price: 98000, unit: 'Set' }
        ],
        total: 994000,
        cash: 1000000,
        change: 6000
      },
      {
        id: 'TRX-2026-102',
        date: new Date().toISOString(),
        type: 'Penjualan Eceran',
        customer: 'Rian Hidayat',
        wa: '',
        items: [
          { name: 'Ban Tubeless Motor Matic 90/90-14', qty: 1, price: 215000, unit: 'Pcs' }
        ],
        total: 215000,
        cash: 250000,
        change: 35000
      }
    ];

    // State Aplikasi
    let inventory = [];
    let services = [];
    let transactions = [];
    let posCart = [];
    let posPriceMode = 'retail'; // 'retail' | 'wholesale'
    let serviceFilter = 'Semua';
    let modalServiceParts = [];

    // ================= HELPER FUNCTIONS =================
    function formatRupiah(num) {
      return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
      }).format(num || 0);
    }

    function formatShortTime(isoString) {
      const d = new Date(isoString);
      return d.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' }) + ' WIB';
    }

    function isToday(isoString) {
      const d = new Date(isoString);
      const today = new Date();
      return d.getDate() === today.getDate() &&
             d.getMonth() === today.getMonth() &&
             d.getFullYear() === today.getFullYear();
    }

    function showToast(msg, isError = false) {
      const toast = document.getElementById('toast');
      const toastMsg = document.getElementById('toast-msg');
      const toastIcon = document.getElementById('toast-icon');
      
      toastMsg.textContent = msg;
      toastIcon.className = isError 
        ? 'fa-solid fa-circle-exclamation text-red-400 text-base' 
        : 'fa-solid fa-circle-check text-emerald-400 text-base';

      toast.classList.remove('translate-y-12', 'opacity-0');
      setTimeout(() => {
        toast.classList.add('translate-y-12', 'opacity-0');
      }, 3000);
    }

    // ================= STORAGE MANAGEMENT =================
    function loadAllData() {
      const savedInv = localStorage.getItem(STORAGE_KEYS.INVENTORY);
      const savedSrv = localStorage.getItem(STORAGE_KEYS.SERVICES);
      const savedTrx = localStorage.getItem(STORAGE_KEYS.TRANSACTIONS);

      inventory = savedInv ? JSON.parse(savedInv) : JSON.parse(JSON.stringify(INITIAL_INVENTORY));
      services = savedSrv ? JSON.parse(savedSrv) : JSON.parse(JSON.stringify(INITIAL_SERVICES));
      transactions = savedTrx ? JSON.parse(savedTrx) : JSON.parse(JSON.stringify(INITIAL_TRANSACTIONS));

      if (!savedInv) saveData();
    }

    function saveData() {
      localStorage.setItem(STORAGE_KEYS.INVENTORY, JSON.stringify(inventory));
      localStorage.setItem(STORAGE_KEYS.SERVICES, JSON.stringify(services));
      localStorage.setItem(STORAGE_KEYS.TRANSACTIONS, JSON.stringify(transactions));
      updateSidebarBadges();
    }

    function confirmResetDemo() {
      document.getElementById('reset-modal').classList.remove('hidden');
    }

    function closeResetModal() {
      document.getElementById('reset-modal').classList.add('hidden');
    }

    function executeResetDemo() {
      inventory = JSON.parse(JSON.stringify(INITIAL_INVENTORY));
      services = JSON.parse(JSON.stringify(INITIAL_SERVICES));
      transactions = JSON.parse(JSON.stringify(INITIAL_TRANSACTIONS));
      posCart = [];
      saveData();
      closeResetModal();
      refreshAllViews();
      showToast('Data demo berhasil dikembalikan ke awal!');
    }

    // ================= NAVIGATION & UI =================
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const backdrop = document.getElementById('sidebar-backdrop');
      sidebar.classList.toggle('-translate-x-full');
      backdrop.classList.toggle('hidden');
    }

    function switchTab(tabName) {
      // Sembunyikan semua tab
      document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
      document.getElementById(`tab-${tabName}`).classList.remove('hidden');

      // Update active state navigasi
      document.querySelectorAll('.nav-item').forEach(btn => {
        btn.classList.remove('bg-orange-500', 'text-white', 'shadow-lg', 'shadow-orange-500/20');
        btn.classList.add('text-slate-300', 'hover:bg-slate-800/80');
      });

      const activeBtn = document.getElementById(`nav-${tabName}`);
      activeBtn.classList.remove('text-slate-300', 'hover:bg-slate-800/80');
      activeBtn.classList.add('bg-orange-500', 'text-white', 'shadow-lg', 'shadow-orange-500/20');

      // Update Judul Halaman
      const titles = {
        dashboard: ['Dashboard Ringkasan', 'Pantau performa harian bengkel, penjualan sparepart, dan peringatan stok gudang.'],
        inventory: ['Manajemen Inventory & Stok', 'Kelola stok sparepart motor dan peralatan bengkel (harga modal, eceran, dan grosir).'],
        pos: ['Kasir Toko (POS Ecer & Grosir)', 'Transaksi penjualan cepat dengan pemotongan stok gudang otomatis & cetak nota.'],
        service: ['Antrean & Nota Servis Bengkel', 'Kelola Work Order servis motor pelanggan, penugasan mekanik, dan pemakaian part.']
      };
      document.getElementById('page-title').textContent = titles[tabName][0];
      document.getElementById('page-subtitle').textContent = titles[tabName][1];

      // Tutup sidebar di mobile
      if (window.innerWidth < 1024) {
        const sidebar = document.getElementById('sidebar');
        if (!sidebar.classList.contains('-translate-x-full')) {
          toggleSidebar();
        }
      }

      refreshAllViews();
    }

    function updateSidebarBadges() {
      const lowStockCount = inventory.filter(i => i.stock <= i.minStock).length;
      const activeSrvCount = services.filter(s => s.status === 'Menunggu' || s.status === 'Dikerjakan').length;

      const lowBadge = document.getElementById('sidebar-low-stock-badge');
      if (lowStockCount > 0) {
        lowBadge.textContent = lowStockCount;
        lowBadge.classList.remove('hidden');
      } else {
        lowBadge.classList.add('hidden');
      }

      document.getElementById('sidebar-active-service-badge').textContent = activeSrvCount;
    }

    // ================= 1. DASHBOARD RENDERING =================
    function renderDashboard() {
      // Hitung KPI
      const todayTrx = transactions.filter(t => isToday(t.date));
      const todayRevenue = todayTrx.reduce((sum, t) => sum + t.total, 0);
      const activeServices = services.filter(s => s.status === 'Menunggu' || s.status === 'Dikerjakan').length;
      const totalSKU = inventory.length;
      const totalUnits = inventory.reduce((sum, i) => sum + i.stock, 0);
      const lowStockItems = inventory.filter(i => i.stock <= i.minStock);

      document.getElementById('kpi-revenue').textContent = formatRupiah(todayRevenue);
      document.getElementById('kpi-active-services').textContent = `${activeServices} Motor`;
      document.getElementById('kpi-total-items').textContent = `${totalSKU} SKU`;
      document.getElementById('kpi-total-units').textContent = `${totalUnits} Total Unit Tersedia`;
      document.getElementById('kpi-low-stock').textContent = `${lowStockItems.length} Barang`;

      // Render Peringatan Stok Menipis
      const lowStockContainer = document.getElementById('dashboard-low-stock-list');
      if (lowStockItems.length === 0) {
        lowStockContainer.innerHTML = `
          <div class="text-center py-8 text-slate-400">
            <i class="fa-solid fa-circle-check text-3xl text-emerald-500 mb-2"></i>
            <p class="text-xs font-semibold text-slate-600">Semua stok gudang dalam kondisi aman!</p>
          </div>
        `;
      } else {
        lowStockContainer.innerHTML = lowStockItems.map(item => `
          <div class="p-3 rounded-xl bg-red-50/70 border border-red-200 flex items-center justify-between gap-3">
            <div>
              <span class="text-[10px] font-bold uppercase text-red-600">${item.sku} • ${item.category}</span>
              <h4 class="font-bold text-xs text-slate-900 mt-0.5">${item.name}</h4>
              <p class="text-[11px] text-slate-500 mt-0.5">Sisa: <strong class="text-red-600">${item.stock} ${item.unit}</strong> (Min: ${item.minStock})</p>
            </div>
            <button onclick="quickAdjustStock(${item.id}, 5)" class="px-3 py-1.5 rounded-lg bg-slate-900 hover:bg-orange-500 text-white text-[11px] font-bold shrink-0 transition-colors">
              +5 Restock
            </button>
          </div>
        `).join('');
      }

      // Render Grafik Mingguan (Simulasi 6 hari lalu + Hari Ini Real-time)
      const chartData = [
        { day: 'Rab', val: 1450 },
        { day: 'Kam', val: 1820 },
        { day: 'Jum', val: 1650 },
        { day: 'Sab', val: 2450 },
        { day: 'Min', val: 950 },
        { day: 'Sen', val: 1920 },
        { day: 'Hari Ini', val: Math.round(todayRevenue / 1000) || 1200, isToday: true }
      ];
      const maxVal = Math.max(...chartData.map(d => d.val), 2500);

      document.getElementById('weekly-chart').innerHTML = chartData.map(d => {
        const heightPct = Math.max(Math.round((d.val / maxVal) * 100), 12);
        return `
          <div class="flex flex-col items-center h-full justify-end group">
            <span class="text-[10px] font-bold text-slate-600 mb-1.5 opacity-80 group-hover:opacity-100">${d.val}k</span>
            <div class="w-full max-w-[40px] rounded-t-xl transition-all duration-500 ${d.isToday ? 'bg-gradient-to-t from-orange-600 to-orange-400 shadow-md shadow-orange-500/30' : 'bg-slate-800 hover:bg-slate-700'}" style="height: ${heightPct}%"></div>
            <span class="text-[11px] mt-2 font-semibold ${d.isToday ? 'text-orange-600 font-bold' : 'text-slate-500'}">${d.day}</span>
          </div>
        `;
      }).join('');

      // Render Tabel Transaksi Terakhir
      const trxTable = document.getElementById('dashboard-transactions-table');
      if (transactions.length === 0) {
        trxTable.innerHTML = `<tr><td colspan="6" class="py-8 text-center text-slate-400 text-xs">Belum ada transaksi tercatat.</td></tr>`;
      } else {
        trxTable.innerHTML = transactions.slice(0, 6).map(trx => {
          const badgeColor = trx.type.includes('Servis') 
            ? 'bg-blue-100 text-blue-700' 
            : trx.type.includes('Grosir') 
              ? 'bg-purple-100 text-purple-700' 
              : 'bg-emerald-100 text-emerald-700';

          return `
            <tr class="hover:bg-slate-50/80 transition-colors">
              <td class="py-3.5 px-4 font-mono font-bold text-xs text-slate-900">${trx.id}</td>
              <td class="py-3.5 px-4 text-xs text-slate-500">${formatShortTime(trx.date)}</td>
              <td class="py-3.5 px-4">
                <span class="px-2.5 py-1 rounded-lg text-[11px] font-bold ${badgeColor}">${trx.type}</span>
              </td>
              <td class="py-3.5 px-4 font-medium text-slate-800 text-xs">${trx.customer}</td>
              <td class="py-3.5 px-4 font-bold text-slate-900 text-xs">${formatRupiah(trx.total)}</td>
              <td class="py-3.5 px-4 text-right">
                <button onclick="openTransactionReceipt('${trx.id}')" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition-colors">
                  <i class="fa-solid fa-receipt mr-1"></i> Nota
                </button>
              </td>
            </tr>
          `;
        }).join('');
      }
    }

    // ================= 2. INVENTORY MANAGEMENT =================
    function renderInventory() {
      const search = document.getElementById('inv-search').value.toLowerCase().trim();
      const catFilter = document.getElementById('inv-cat-filter').value;
      const statusFilter = document.getElementById('inv-status-filter').value;

      const filtered = inventory.filter(item => {
        const matchSearch = item.name.toLowerCase().includes(search) || item.sku.toLowerCase().includes(search);
        const matchCat = catFilter === 'Semua' || item.category === catFilter;
        
        let status = 'Aman';
        if (item.stock === 0) status = 'Habis';
        else if (item.stock <= item.minStock) status = 'Menipis';

        const matchStatus = statusFilter === 'Semua' || status === statusFilter;
        return matchSearch && matchCat && matchStatus;
      });

      const tbody = document.getElementById('inventory-table-body');
      if (filtered.length === 0) {
        tbody.innerHTML = `<tr><td colspan="8" class="py-12 text-center text-slate-400 text-sm">Tidak ada barang yang sesuai dengan filter pencarian.</td></tr>`;
        return;
      }

      tbody.innerHTML = filtered.map(item => {
        let statusBadge = `<span class="px-2.5 py-1 rounded-lg bg-emerald-100 text-emerald-700 text-[11px] font-bold">Aman</span>`;
        if (item.stock === 0) {
          statusBadge = `<span class="px-2.5 py-1 rounded-lg bg-red-100 text-red-700 text-[11px] font-bold">Habis</span>`;
        } else if (item.stock <= item.minStock) {
          statusBadge = `<span class="px-2.5 py-1 rounded-lg bg-amber-100 text-amber-700 text-[11px] font-bold">Menipis</span>`;
        }

        return `
          <tr class="hover:bg-slate-50 transition-colors">
            <td class="py-3.5 px-4 font-mono text-xs font-bold text-slate-600">${item.sku}</td>
            <td class="py-3.5 px-4">
              <p class="font-bold text-slate-900 text-xs sm:text-sm">${item.name}</p>
              <span class="text-[11px] text-slate-400">${item.category}</span>
            </td>
            <td class="py-3.5 px-4 text-xs text-slate-500">${formatRupiah(item.cost)}</td>
            <td class="py-3.5 px-4 text-xs font-bold text-slate-900">${formatRupiah(item.retail)}</td>
            <td class="py-3.5 px-4 text-xs font-bold text-blue-600">${formatRupiah(item.wholesale)}</td>
            <td class="py-3.5 px-4 text-center">
              <div class="inline-flex items-center gap-1.5 bg-slate-100 rounded-lg p-1 border border-slate-200">
                <button onclick="quickAdjustStock(${item.id}, -1)" title="Stok Keluar (-1)" class="w-6 h-6 rounded bg-white hover:bg-red-500 hover:text-white text-slate-700 font-bold text-xs shadow-sm transition-colors">-</button>
                <span class="w-12 text-center font-bold text-xs text-slate-900">${item.stock} <span class="text-[10px] font-normal text-slate-500">${item.unit}</span></span>
                <button onclick="quickAdjustStock(${item.id}, 1)" title="Stok Masuk (+1)" class="w-6 h-6 rounded bg-white hover:bg-emerald-500 hover:text-white text-slate-700 font-bold text-xs shadow-sm transition-colors">+</button>
              </div>
            </td>
            <td class="py-3.5 px-4">${statusBadge}</td>
            <td class="py-3.5 px-4 text-right space-x-1">
              <button onclick="openItemModal(${item.id})" class="p-2 rounded-lg bg-slate-100 hover:bg-orange-500 text-slate-600 hover:text-white transition-colors" title="Edit Barang">
                <i class="fa-solid fa-pen-to-square text-xs"></i>
              </button>
              <button onclick="deleteInventoryItem(${item.id})" class="p-2 rounded-lg bg-slate-100 hover:bg-red-600 text-slate-600 hover:text-white transition-colors" title="Hapus Barang">
                <i class="fa-solid fa-trash text-xs"></i>
              </button>
            </td>
          </tr>
        `;
      }).join('');
    }

    function quickAdjustStock(id, delta) {
      const item = inventory.find(i => i.id === id);
      if (!item) return;

      if (item.stock + delta < 0) {
        showToast('Stok sudah 0, tidak bisa dikurangi lagi!', true);
        return;
      }

      item.stock += delta;
      saveData();
      refreshAllViews();
      showToast(`Stok ${item.name} diperbarui (${delta > 0 ? '+' + delta : delta}).`);
    }

    function openItemModal(id = null) {
      const modal = document.getElementById('item-modal');
      const form = document.getElementById('item-form');
      form.reset();

      if (id) {
        const item = inventory.find(i => i.id === id);
        if (!item) return;
        document.getElementById('item-modal-title').textContent = 'Edit Data Barang';
        document.getElementById('item-id').value = item.id;
        document.getElementById('item-sku').value = item.sku;
        document.getElementById('item-category').value = item.category;
        document.getElementById('item-name').value = item.name;
        document.getElementById('item-cost').value = item.cost;
        document.getElementById('item-retail').value = item.retail;
        document.getElementById('item-wholesale').value = item.wholesale;
        document.getElementById('item-stock').value = item.stock;
        document.getElementById('item-min-stock').value = item.minStock;
        document.getElementById('item-unit').value = item.unit;
      } else {
        document.getElementById('item-modal-title').textContent = 'Tambah Barang Baru';
        document.getElementById('item-id').value = '';
        const nextNum = String(inventory.length + 1).padStart(3, '0');
        document.getElementById('item-sku').value = `SM-ITM-${nextNum}`;
      }

      modal.classList.remove('hidden');
    }

    function closeItemModal() {
      document.getElementById('item-modal').classList.add('hidden');
    }

    function saveInventoryItem(e) {
      e.preventDefault();
      const idVal = document.getElementById('item-id').value;
      const itemData = {
        sku: document.getElementById('item-sku').value.trim().toUpperCase(),
        category: document.getElementById('item-category').value,
        name: document.getElementById('item-name').value.trim(),
        cost: Number(document.getElementById('item-cost').value),
        retail: Number(document.getElementById('item-retail').value),
        wholesale: Number(document.getElementById('item-wholesale').value),
        stock: Number(document.getElementById('item-stock').value),
        minStock: Number(document.getElementById('item-min-stock').value),
        unit: document.getElementById('item-unit').value.trim()
      };

      if (idVal) {
        const idx = inventory.findIndex(i => i.id === Number(idVal));
        if (idx !== -1) {
          inventory[idx] = { ...inventory[idx], ...itemData };
          showToast('Data barang berhasil diperbarui!');
        }
      } else {
        const newId = inventory.length > 0 ? Math.max(...inventory.map(i => i.id)) + 1 : 1;
        inventory.unshift({ id: newId, ...itemData });
        showToast('Barang baru berhasil ditambahkan ke gudang!');
      }

      saveData();
      closeItemModal();
      refreshAllViews();
    }

    function deleteInventoryItem(id) {
      const idx = inventory.findIndex(i => i.id === id);
      if (idx !== -1) {
        const name = inventory[idx].name;
        inventory.splice(idx, 1);
        saveData();
        refreshAllViews();
        showToast(`Barang "${name}" dihapus dari inventory.`);
      }
    }

    function exportInventoryCSV() {
      const headers = ['Kode SKU', 'Nama Barang', 'Kategori', 'Harga Modal', 'Harga Eceran', 'Harga Grosir', 'Stok', 'Satuan', 'Min Stok'];
      const rows = inventory.map(i => [
        i.sku,
        `"${i.name.replace(/"/g, '""')}"`,
        i.category,
        i.cost,
        i.retail,
        i.wholesale,
        i.stock,
        i.unit,
        i.minStock
      ]);

      const csvContent = 'data:text/csv;charset=utf-8,' + [headers.join(','), ...rows.map(r => r.join(','))].join('\n');
      const encodedUri = encodeURI(csvContent);
      const link = document.createElement('a');
      link.setAttribute('href', encodedUri);
      link.setAttribute('download', `Stok_Gudang_Surabay_Motor_${new Date().toISOString().slice(0, 10)}.csv`);
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      showToast('File CSV laporan stok berhasil diunduh!');
    }

    // ================= 3. POS / KASIR TOKO =================
    function setPOSPriceMode(mode) {
      posPriceMode = mode;
      const btnRetail = document.getElementById('btn-mode-retail');
      const btnWholesale = document.getElementById('btn-mode-wholesale');

      if (mode === 'retail') {
        btnRetail.className = 'py-2 px-3 rounded-lg text-xs font-bold bg-white text-slate-900 shadow-sm transition-all';
        btnWholesale.className = 'py-2 px-3 rounded-lg text-xs font-semibold text-slate-600 hover:text-slate-900 transition-all';
      } else {
        btnWholesale.className = 'py-2 px-3 rounded-lg text-xs font-bold bg-white text-blue-700 shadow-sm transition-all';
        btnRetail.className = 'py-2 px-3 rounded-lg text-xs font-semibold text-slate-600 hover:text-slate-900 transition-all';
      }

      renderPOSProducts();
      renderPOSCart();
    }

    function renderPOSProducts() {
      const keyword = document.getElementById('pos-search').value.toLowerCase().trim();
      const cat = document.getElementById('pos-cat-filter').value;

      const filtered = inventory.filter(i => {
        const matchSearch = i.name.toLowerCase().includes(keyword) || i.sku.toLowerCase().includes(keyword);
        const matchCat = cat === 'Semua' || i.category === cat;
        return matchSearch && matchCat;
      });

      const grid = document.getElementById('pos-product-grid');
      grid.innerHTML = filtered.map(item => {
        const activePrice = posPriceMode === 'retail' ? item.retail : item.wholesale;
        const outOfStock = item.stock <= 0;

        return `
          <div onclick="${outOfStock ? '' : `addToPOSCart(${item.id})`}" class="p-3.5 rounded-xl border transition-all flex flex-col justify-between ${outOfStock ? 'bg-slate-100 border-slate-200 opacity-60 cursor-not-allowed' : 'bg-white border-slate-200 hover:border-orange-500 hover:shadow-md cursor-pointer'}">
            <div>
              <div class="flex items-center justify-between text-[10px] font-bold mb-1">
                <span class="text-slate-400 font-mono">${item.sku}</span>
                <span class="${item.stock <= item.minStock ? 'text-red-600' : 'text-emerald-600'}">Stok: ${item.stock} ${item.unit}</span>
              </div>
              <h4 class="font-bold text-xs text-slate-900 leading-snug">${item.name}</h4>
            </div>
            <div class="mt-3 pt-2 border-t border-slate-100 flex items-center justify-between">
              <div>
                <span class="text-[10px] text-slate-400 block">${posPriceMode === 'retail' ? 'Harga Ecer' : 'Harga Grosir'}</span>
                <span class="font-display font-extrabold text-sm ${posPriceMode === 'retail' ? 'text-slate-900' : 'text-blue-600'}">${formatRupiah(activePrice)}</span>
              </div>
              <span class="w-7 h-7 rounded-lg ${outOfStock ? 'bg-slate-300 text-slate-500' : 'bg-orange-500 text-white'} flex items-center justify-center text-xs">
                <i class="fa-solid fa-plus"></i>
              </span>
            </div>
          </div>
        `;
      }).join('');
    }

    function addToPOSCart(itemId) {
      const item = inventory.find(i => i.id === itemId);
      if (!item || item.stock <= 0) return;

      const existing = posCart.find(c => c.id === itemId);
      if (existing) {
        if (existing.qty + 1 > item.stock) {
          showToast(`Stok ${item.name} hanya tersisa ${item.stock} ${item.unit}!`, true);
          return;
        }
        existing.qty += 1;
      } else {
        posCart.push({ id: item.id, qty: 1 });
      }

      renderPOSCart();
    }

    function updatePOSCartQty(itemId, delta) {
      const idx = posCart.findIndex(c => c.id === itemId);
      if (idx === -1) return;

      const invItem = inventory.find(i => i.id === itemId);
      const nextQty = posCart[idx].qty + delta;

      if (nextQty <= 0) {
        posCart.splice(idx, 1);
      } else if (invItem && nextQty > invItem.stock) {
        showToast(`Melebihi stok gudang (${invItem.stock} ${invItem.unit})!`, true);
        return;
      } else {
        posCart[idx].qty = nextQty;
      }

      renderPOSCart();
    }

    function clearPOSCart() {
      posCart = [];
      document.getElementById('pos-cash-input').value = '';
      renderPOSCart();
    }

    function renderPOSCart() {
      const listEl = document.getElementById('pos-cart-list');
      const totalItemsEl = document.getElementById('pos-total-items');
      const grandTotalEl = document.getElementById('pos-grand-total');

      if (posCart.length === 0) {
        listEl.innerHTML = `<p class="text-center py-8 text-xs text-slate-400">Klik barang di sebelah kiri untuk menambahkan ke transaksi.</p>`;
        totalItemsEl.textContent = '0 pcs';
        grandTotalEl.textContent = 'Rp 0';
        calculatePOSChange();
        return;
      }

      let totalQty = 0;
      let grandTotal = 0;

      listEl.innerHTML = posCart.map(c => {
        const item = inventory.find(i => i.id === c.id);
        if (!item) return '';
        const unitPrice = posPriceMode === 'retail' ? item.retail : item.wholesale;
        const subtotal = unitPrice * c.qty;
        totalQty += c.qty;
        grandTotal += subtotal;

        return `
          <div class="flex items-center justify-between gap-2 bg-slate-50 p-2.5 rounded-xl border border-slate-200">
            <div class="flex-1 min-w-0">
              <p class="font-bold text-xs text-slate-900 truncate">${item.name}</p>
              <p class="text-[11px] text-slate-500">${formatRupiah(unitPrice)} x ${c.qty} = <strong class="text-slate-800">${formatRupiah(subtotal)}</strong></p>
            </div>
            <div class="flex items-center gap-1.5 shrink-0">
              <button onclick="updatePOSCartQty(${item.id}, -1)" class="w-6 h-6 rounded bg-white border border-slate-300 text-xs font-bold hover:bg-slate-100">-</button>
              <span class="w-5 text-center text-xs font-bold">${c.qty}</span>
              <button onclick="updatePOSCartQty(${item.id}, 1)" class="w-6 h-6 rounded bg-white border border-slate-300 text-xs font-bold hover:bg-slate-100">+</button>
            </div>
          </div>
        `;
      }).join('');

      totalItemsEl.textContent = `${totalQty} item`;
      grandTotalEl.textContent = formatRupiah(grandTotal);
      calculatePOSChange();
    }

    function getPOSGrandTotal() {
      return posCart.reduce((sum, c) => {
        const item = inventory.find(i => i.id === c.id);
        if (!item) return sum;
        const price = posPriceMode === 'retail' ? item.retail : item.wholesale;
        return sum + (price * c.qty);
      }, 0);
    }

    function calculatePOSChange() {
      const total = getPOSGrandTotal();
      const cash = Number(document.getElementById('pos-cash-input').value) || 0;
      const change = cash - total;
      const changeEl = document.getElementById('pos-change');

      if (cash === 0) {
        changeEl.textContent = 'Rp 0';
        changeEl.className = 'font-display font-extrabold text-base text-slate-500';
      } else if (change < 0) {
        changeEl.textContent = `Kurang ${formatRupiah(Math.abs(change))}`;
        changeEl.className = 'font-display font-extrabold text-base text-red-600';
      } else {
        changeEl.textContent = formatRupiah(change);
        changeEl.className = 'font-display font-extrabold text-base text-emerald-600';
      }
    }

    function processPOSTransaction() {
      if (posCart.length === 0) {
        showToast('Keranjang kasir masih kosong!', true);
        return;
      }

      const total = getPOSGrandTotal();
      const cashInput = Number(document.getElementById('pos-cash-input').value);
      const cash = cashInput > 0 ? cashInput : total; // Jika kosong dianggap uang pas

      if (cash < total) {
        showToast('Nominal pembayaran kurang dari total tagihan!', true);
        return;
      }

      const customerName = document.getElementById('pos-customer-name').value.trim() || (posPriceMode === 'wholesale' ? 'Mitra Bengkel' : 'Pelanggan Umum');
      const customerWa = document.getElementById('pos-customer-wa').value.trim();

      // Potong stok inventory & susun item nota
      const trxItems = [];
      posCart.forEach(c => {
        const invItem = inventory.find(i => i.id === c.id);
        if (invItem) {
          invItem.stock = Math.max(0, invItem.stock - c.qty);
          const price = posPriceMode === 'retail' ? invItem.retail : invItem.wholesale;
          trxItems.push({
            name: invItem.name,
            qty: c.qty,
            price: price,
            unit: invItem.unit
          });
        }
      });

      const trxId = `TRX-${new Date().getFullYear()}-${String(transactions.length + 101)}`;
      const newTrx = {
        id: trxId,
        date: new Date().toISOString(),
        type: posPriceMode === 'wholesale' ? 'Grosir Bengkel' : 'Penjualan Eceran',
        customer: customerName,
        wa: customerWa,
        items: trxItems,
        total: total,
        cash: cash,
        change: cash - total
      };

      transactions.unshift(newTrx);
      saveData();
      clearPOSCart();
      document.getElementById('pos-customer-name').value = '';
      document.getElementById('pos-customer-wa').value = '';
      refreshAllViews();

      showToast('Transaksi berhasil! Stok otomatis terpotong.');
      openTransactionReceipt(trxId);
    }

    // ================= 4. WORK ORDER SERVIS BENGKEL =================
    function setServiceFilter(status) {
      serviceFilter = status;
      document.querySelectorAll('.srv-filter-btn').forEach(btn => {
        if (btn.dataset.srv === status) {
          btn.className = 'srv-filter-btn px-4 py-2 rounded-xl text-xs font-bold bg-slate-900 text-white';
        } else {
          btn.className = 'srv-filter-btn px-4 py-2 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200';
        }
      });
      renderServices();
    }

    function renderServices() {
      const grid = document.getElementById('service-cards-grid');
      const filtered = services.filter(s => serviceFilter === 'Semua' || s.status === serviceFilter);

      if (filtered.length === 0) {
        grid.innerHTML = `<div class="col-span-full bg-white rounded-2xl p-12 text-center border border-slate-200 text-slate-400 text-sm">Tidak ada Work Order servis dengan status "${serviceFilter}".</div>`;
        return;
      }

      const statusStyles = {
        'Menunggu': 'bg-amber-100 text-amber-800 border-amber-200',
        'Dikerjakan': 'bg-blue-100 text-blue-800 border-blue-200',
        'Selesai': 'bg-emerald-100 text-emerald-800 border-emerald-200',
        'Diambil': 'bg-slate-200 text-slate-700 border-slate-300'
      };

      grid.innerHTML = filtered.map(srv => {
        const partsTotal = srv.parts.reduce((sum, p) => sum + (p.price * p.qty), 0);
        const grandTotal = srv.serviceFee + partsTotal;

        return `
          <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col justify-between hover:shadow-md transition-all">
            <div>
              <!-- Header Kartu -->
              <div class="flex items-center justify-between gap-2 pb-3 border-b border-slate-100">
                <span class="font-mono font-bold text-xs text-slate-500">${srv.id}</span>
                <span class="px-2.5 py-1 rounded-lg border text-[11px] font-bold ${statusStyles[srv.status] || ''}">${srv.status}</span>
              </div>

              <!-- Info Motor & Pelanggan -->
              <div class="mt-3">
                <div class="flex items-center justify-between">
                  <h3 class="font-display font-bold text-base text-slate-900">${srv.bike}</h3>
                  <span class="px-2 py-0.5 rounded bg-slate-900 text-white font-mono text-xs font-bold">${srv.plate}</span>
                </div>
                <p class="text-xs text-slate-600 font-medium mt-1"><i class="fa-solid fa-user text-orange-500 mr-1.5"></i>${srv.customer} (${srv.wa})</p>
                <p class="text-xs text-slate-500 mt-0.5"><i class="fa-solid fa-wrench text-slate-400 mr-1.5"></i>${srv.mechanic}</p>
              </div>

              <!-- Keluhan -->
              <div class="mt-3 p-3 rounded-xl bg-slate-50 border border-slate-100 text-xs">
                <span class="text-[10px] font-bold uppercase text-slate-400 block">Keluhan / Pekerjaan:</span>
                <p class="text-slate-700 font-medium mt-0.5">${srv.complaint}</p>
              </div>

              <!-- Rincian Biaya Singkat -->
              <div class="mt-3 space-y-1 text-xs">
                <div class="flex justify-between text-slate-500">
                  <span>Jasa (${srv.serviceDesc}):</span>
                  <span>${formatRupiah(srv.serviceFee)}</span>
                </div>
                <div class="flex justify-between text-slate-500">
                  <span>Sparepart (${srv.parts.length} item):</span>
                  <span>${formatRupiah(partsTotal)}</span>
                </div>
                <div class="flex justify-between font-bold text-slate-900 pt-1.5 border-t border-slate-100 text-sm">
                  <span>Total Tagihan:</span>
                  <span class="text-orange-600">${formatRupiah(grandTotal)}</span>
                </div>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-4 pt-3 border-t border-slate-100 space-y-2">
              <div class="grid grid-cols-2 gap-2">
                <button onclick="openServiceModal('${srv.id}')" class="py-2 px-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs transition-colors">
                  <i class="fa-solid fa-pen mr-1"></i> Update / Part
                </button>
                <button onclick="openServiceReceipt('${srv.id}')" class="py-2 px-3 rounded-xl bg-slate-900 hover:bg-orange-500 text-white font-bold text-xs transition-colors">
                  <i class="fa-solid fa-receipt mr-1"></i> Nota / WA
                </button>
              </div>
              ${srv.status !== 'Diambil' ? `
                <button onclick="completeAndPayService('${srv.id}')" class="w-full py-2 px-3 rounded-xl bg-emerald-50 hover:bg-emerald-600 text-emerald-700 hover:text-white border border-emerald-200 font-bold text-xs transition-colors">
                  <i class="fa-solid fa-check-double mr-1"></i> Tandai Diambil & Masuk Omzet
                </button>
              ` : ''}
            </div>
          </div>
        `;
      }).join('');
    }

    function openServiceModal(srvId = null) {
      const modal = document.getElementById('service-modal');
      const form = document.getElementById('service-form');
      form.reset();

      // Isi dropdown sparepart dari inventory
      const partSelect = document.getElementById('srv-part-select');
      partSelect.innerHTML = inventory
        .filter(i => i.category !== 'Peralatan Bengkel')
        .map(i => `<option value="${i.id}">${i.name} - ${formatRupiah(i.retail)} (Stok: ${i.stock})</option>`)
        .join('');

      if (srvId) {
        const srv = services.find(s => s.id === srvId);
        if (!srv) return;
        document.getElementById('service-modal-title').textContent = `Edit Work Order (${srv.id})`;
        document.getElementById('srv-id').value = srv.id;
        document.getElementById('srv-customer').value = srv.customer;
        document.getElementById('srv-wa').value = srv.wa;
        document.getElementById('srv-bike').value = srv.bike;
        document.getElementById('srv-plate').value = srv.plate;
        document.getElementById('srv-mechanic').value = srv.mechanic;
        document.getElementById('srv-complaint').value = srv.complaint;
        document.getElementById('srv-status').value = srv.status;
        document.getElementById('srv-service-desc').value = srv.serviceDesc;
        document.getElementById('srv-service-fee').value = srv.serviceFee;
        modalServiceParts = JSON.parse(JSON.stringify(srv.parts));
      } else {
        document.getElementById('service-modal-title').textContent = 'Buat Work Order Servis Baru';
        document.getElementById('srv-id').value = '';
        document.getElementById('srv-service-desc').value = 'Jasa Servis & Tune Up';
        document.getElementById('srv-service-fee').value = 50000;
        modalServiceParts = [];
      }

      renderModalServiceParts();
      modal.classList.remove('hidden');
    }

    function closeServiceModal() {
      document.getElementById('service-modal').classList.add('hidden');
    }

    function addPartToServiceModal() {
      const partId = Number(document.getElementById('srv-part-select').value);
      const invItem = inventory.find(i => i.id === partId);
      if (!invItem) return;

      if (invItem.stock <= 0) {
        showToast(`Stok ${invItem.name} sedang habis!`, true);
        return;
      }

      const existing = modalServiceParts.find(p => p.itemId === partId);
      if (existing) {
        existing.qty += 1;
      } else {
        modalServiceParts.push({
          itemId: invItem.id,
          name: invItem.name,
          qty: 1,
          price: invItem.retail
        });
      }

      renderModalServiceParts();
    }

    function removePartFromServiceModal(index) {
      modalServiceParts.splice(index, 1);
      renderModalServiceParts();
    }

    function renderModalServiceParts() {
      const container = document.getElementById('srv-parts-list');
      if (modalServiceParts.length === 0) {
        container.innerHTML = `<p class="text-[11px] text-slate-400 italic">Belum ada sparepart tambahan yang dipilih.</p>`;
      } else {
        container.innerHTML = modalServiceParts.map((p, idx) => `
          <div class="flex items-center justify-between bg-white px-3 py-2 rounded-xl border border-slate-200 text-xs">
            <span><strong>${p.qty}x</strong> ${p.name} (${formatRupiah(p.price * p.qty)})</span>
            <button type="button" onclick="removePartFromServiceModal(${idx})" class="text-red-500 hover:text-red-700 font-bold px-2">Hapus</button>
          </div>
        `).join('');
      }
      updateServiceModalTotal();
    }

    function updateServiceModalTotal() {
      const fee = Number(document.getElementById('srv-service-fee').value) || 0;
      const partsSum = modalServiceParts.reduce((sum, p) => sum + (p.price * p.qty), 0);
      document.getElementById('srv-modal-total').textContent = formatRupiah(fee + partsSum);
    }

    function saveServiceOrder(e) {
      e.preventDefault();
      const existingId = document.getElementById('srv-id').value;
      const srvData = {
        customer: document.getElementById('srv-customer').value.trim(),
        wa: document.getElementById('srv-wa').value.trim(),
        bike: document.getElementById('srv-bike').value.trim(),
        plate: document.getElementById('srv-plate').value.trim().toUpperCase(),
        mechanic: document.getElementById('srv-mechanic').value,
        complaint: document.getElementById('srv-complaint').value.trim(),
        status: document.getElementById('srv-status').value,
        serviceDesc: document.getElementById('srv-service-desc').value.trim(),
        serviceFee: Number(document.getElementById('srv-service-fee').value) || 0,
        parts: modalServiceParts
      };

      if (existingId) {
        const idx = services.findIndex(s => s.id === existingId);
        if (idx !== -1) {
          services[idx] = { ...services[idx], ...srvData };
          showToast(`Work Order ${existingId} berhasil diperbarui!`);
        }
      } else {
        // Potong stok gudang untuk sparepart baru yang dipakai
        srvData.parts.forEach(p => {
          const inv = inventory.find(i => i.id === p.itemId);
          if (inv) inv.stock = Math.max(0, inv.stock - p.qty);
        });

        const newId = `WO-${new Date().getFullYear()}-${String(services.length + 1).padStart(3, '0')}`;
        services.unshift({
          id: newId,
          ...srvData,
          createdAt: new Date().toISOString()
        });
        showToast(`Work Order baru ${newId} berhasil dibuat!`);
      }

      saveData();
      closeServiceModal();
      refreshAllViews();
    }

    function completeAndPayService(srvId) {
      const srv = services.find(s => s.id === srvId);
      if (!srv) return;

      srv.status = 'Diambil';

      // Catat ke riwayat transaksi omzet hari ini
      const partsTotal = srv.parts.reduce((sum, p) => sum + (p.price * p.qty), 0);
      const total = srv.serviceFee + partsTotal;

      const trxItems = [
        { name: srv.serviceDesc, qty: 1, price: srv.serviceFee, unit: 'Jasa' },
        ...srv.parts.map(p => ({ name: p.name, qty: p.qty, price: p.price, unit: 'Pcs' }))
      ];

      transactions.unshift({
        id: `TRX-${srv.id}`,
        date: new Date().toISOString(),
        type: 'Servis Bengkel',
        customer: `${srv.customer} (${srv.plate})`,
        wa: srv.wa,
        items: trxItems,
        total: total,
        cash: total,
        change: 0
      });

      saveData();
      refreshAllViews();
      showToast(`Servis ${srv.plate} selesai & masuk laporan omzet!`);
      openServiceReceipt(srvId);
    }

    // ================= 5. RECEIPT / NOTA DIGITAL & WHATSAPP =================
    function openTransactionReceipt(trxId) {
      const trx = transactions.find(t => t.id === trxId);
      if (!trx) return;

      document.getElementById('receipt-meta').innerHTML = `
        <div class="flex justify-between"><span>No. Nota:</span><span class="font-bold">${trx.id}</span></div>
        <div class="flex justify-between"><span>Tanggal:</span><span>${new Date(trx.date).toLocaleDateString('id-ID')} ${formatShortTime(trx.date)}</span></div>
        <div class="flex justify-between"><span>Kategori:</span><span>${trx.type}</span></div>
        <div class="flex justify-between"><span>Pelanggan:</span><span>${trx.customer}</span></div>
      `;

      document.getElementById('receipt-items').innerHTML = trx.items.map(item => `
        <div>
          <div class="font-bold text-slate-900">${item.name}</div>
          <div class="flex justify-between text-slate-600">
            <span>${item.qty} ${item.unit} x ${formatRupiah(item.price)}</span>
            <span class="font-bold text-slate-800">${formatRupiah(item.qty * item.price)}</span>
          </div>
        </div>
      `).join('');

      document.getElementById('receipt-totals').innerHTML = `
        <div class="flex justify-between font-bold text-sm text-slate-900">
          <span>TOTAL BAYAR</span>
          <span>${formatRupiah(trx.total)}</span>
        </div>
        <div class="flex justify-between text-slate-600">
          <span>Tunai / Transfer</span>
          <span>${formatRupiah(trx.cash)}</span>
        </div>
        <div class="flex justify-between text-slate-600">
          <span>Kembalian</span>
          <span>${formatRupiah(trx.change)}</span>
        </div>
      `;

      // Tombol Kirim WA
      const waBtn = document.getElementById('receipt-wa-btn');
      waBtn.onclick = () => {
        let msg = `*NOTA DIGITAL SURABAY MOTOR*\nNo: ${trx.id}\nPelanggan: ${trx.customer}\n------------------------\n`;
        trx.items.forEach(i => {
          msg += `• ${i.name} (${i.qty}x) = ${formatRupiah(i.qty * i.price)}\n`;
        });
        msg += `------------------------\n*TOTAL: ${formatRupiah(trx.total)}*\nTerima kasih telah berbelanja di Surabay Motor!`;
        const phone = trx.wa ? trx.wa.replace(/[^0-9]/g, '') : '';
        window.open(`https://wa.me/${phone}?text=${encodeURIComponent(msg)}`, '_blank', 'noopener,noreferrer');
      };

      document.getElementById('receipt-modal').classList.remove('hidden');
    }

    function openServiceReceipt(srvId) {
      const srv = services.find(s => s.id === srvId);
      if (!srv) return;

      const partsTotal = srv.parts.reduce((sum, p) => sum + (p.price * p.qty), 0);
      const total = srv.serviceFee + partsTotal;

      document.getElementById('receipt-meta').innerHTML = `
        <div class="flex justify-between"><span>Work Order:</span><span class="font-bold">${srv.id}</span></div>
        <div class="flex justify-between"><span>Status:</span><span class="font-bold">${srv.status}</span></div>
        <div class="flex justify-between"><span>Pelanggan:</span><span>${srv.customer}</span></div>
        <div class="flex justify-between"><span>Kendaraan:</span><span>${srv.bike} (${srv.plate})</span></div>
        <div class="flex justify-between"><span>Mekanik:</span><span>${srv.mechanic}</span></div>
      `;

      let itemsHtml = `
        <div>
          <div class="font-bold text-slate-900">${srv.serviceDesc}</div>
          <div class="flex justify-between text-slate-600">
            <span>1 Jasa</span>
            <span class="font-bold text-slate-800">${formatRupiah(srv.serviceFee)}</span>
          </div>
        </div>
      `;

      itemsHtml += srv.parts.map(p => `
        <div>
          <div class="font-bold text-slate-900">${p.name}</div>
          <div class="flex justify-between text-slate-600">
            <span>${p.qty} Pcs x ${formatRupiah(p.price)}</span>
            <span class="font-bold text-slate-800">${formatRupiah(p.qty * p.price)}</span>
          </div>
        </div>
      `).join('');

      document.getElementById('receipt-items').innerHTML = itemsHtml;

      document.getElementById('receipt-totals').innerHTML = `
        <div class="flex justify-between font-bold text-sm text-slate-900">
          <span>TOTAL TAGIHAN SERVIS</span>
          <span>${formatRupiah(total)}</span>
        </div>
      `;

      // Tombol Kirim WA ke Pelanggan
      const waBtn = document.getElementById('receipt-wa-btn');
      waBtn.onclick = () => {
        let msg = `Halo Kak *${srv.customer}*, berikut rincian nota servis motor *${srv.bike} (${srv.plate})* di *Surabay Motor*:\n\n` +
                  `No. WO: ${srv.id}\nStatus: *${srv.status}*\n------------------------\n` +
                  `• ${srv.serviceDesc}: ${formatRupiah(srv.serviceFee)}\n`;
        srv.parts.forEach(p => {
          msg += `• ${p.name} (${p.qty}x): ${formatRupiah(p.qty * p.price)}\n`;
        });
        msg += `------------------------\n*TOTAL BIAYA: ${formatRupiah(total)}*\n\nTerima kasih sudah mempercayakan perawatan motor Anda kepada Surabay Motor!`;
        const phone = srv.wa ? srv.wa.replace(/[^0-9]/g, '') : '';
        window.open(`https://wa.me/${phone}?text=${encodeURIComponent(msg)}`, '_blank', 'noopener,noreferrer');
      };

      document.getElementById('receipt-modal').classList.remove('hidden');
    }

    function closeReceiptModal() {
      document.getElementById('receipt-modal').classList.add('hidden');
    }

    // ================= INITIALIZATION =================
    function refreshAllViews() {
      renderDashboard();
      renderInventory();
      renderPOSProducts();
      renderPOSCart();
      renderServices();
      updateSidebarBadges();
    }

    document.addEventListener('DOMContentLoaded', () => {
      // Tampilkan tanggal hari ini
      const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      document.getElementById('current-date-display').textContent = new Date().toLocaleDateString('id-ID', options);

      loadAllData();
      refreshAllViews();
    });
  </script>
</body>
</html>