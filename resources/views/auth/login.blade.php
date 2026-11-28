<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-950">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Sistem Operasional Surabaya Motor</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Fonts -->
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
</head>
<body class="h-full flex items-center justify-center antialiased">

  <div class="max-w-md w-full mx-4">
    <!-- Card Login -->
    <div class="bg-slate-900 border border-slate-800 rounded-3xl p-8 shadow-2xl space-y-6">
      
      <!-- Brand Logo Header -->
      <div class="text-center space-y-2">
        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center shadow-lg shadow-orange-500/30 mx-auto">
          <i class="fa-solid fa-gear text-white text-2xl animate-[spin_10s_linear_infinite]"></i>
        </div>
        <h1 class="font-display font-extrabold text-2xl text-white tracking-tight">SURABAYA <span class="text-orange-500">MOTOR</span></h1>
        <p class="text-xs text-slate-400">Silakan masuk ke Sistem Operasional & Kasir</p>
      </div>

      <!-- Menampilkan Pesan Error (Jika ada error login dari Laravel) -->
      @if ($errors->any())
        <div class="p-3 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 text-xs text-center font-medium">
          {{ $errors->first() }}
        </div>
      @endif

      <!-- Form Login (POST ke Route Laravel) -->
      <form action="{{ route('login') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Input Username -->
        <div>
          <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Username</label>
          <div class="relative">
            <i class="fa-solid fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
            <input 
              type="text" 
              name="username" 
              required 
              placeholder="Masukkan username (contoh: admin / kasir)" 
              class="w-full pl-11 pr-4 py-3.5 rounded-xl bg-slate-800 border border-slate-700 text-white focus:outline-none focus:border-orange-500 text-sm placeholder-slate-500 transition-colors"
            >
          </div>
        </div>

        <!-- Input Password -->
        <div>
          <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Password</label>
          <div class="relative">
            <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
            <input 
              type="password" 
              name="password" 
              required 
              placeholder="••••••••" 
              class="w-full pl-11 pr-4 py-3.5 rounded-xl bg-slate-800 border border-slate-700 text-white focus:outline-none focus:border-orange-500 text-sm placeholder-slate-500 transition-colors"
            >
          </div>
        </div>

        <!-- Remember Me & Lupa Password -->
        <div class="flex items-center justify-between text-xs text-slate-400 pt-1">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="remember" class="rounded bg-slate-800 border-slate-700 text-orange-500 focus:ring-0">
            <span>Ingat Saya</span>
          </label>
          <a href="#" class="hover:text-orange-400 transition-colors">Lupa sandi?</a>
        </div>

        <!-- Tombol Submit -->
        <button 
          type="submit" 
          class="w-full py-4 rounded-xl bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white font-bold text-sm shadow-lg shadow-orange-500/25 transition-all flex items-center justify-center gap-2 mt-2"
        >
          <i class="fa-solid fa-right-to-bracket"></i>
          Masuk ke Sistem
        </button>
      </form>

      <!-- Tombol Kembali ke Web Profil Publik -->
      <div class="text-center pt-2 border-t border-slate-800">
        <a href="{{ route('home') }}" class="text-xs text-slate-400 hover:text-orange-400 transition-colors inline-flex items-center gap-1.5">
          <i class="fa-solid fa-arrow-left"></i> Kembali ke Web Profil Utama
        </a>
      </div>

    </div>
  </div>

</body>
</html>