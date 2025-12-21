<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Admin</title>

    <link rel="icon" type="image/png" href="/assets/logo_yayasan.png">

    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-20px)
            }
        }

        .float-animation {
            animation: float 8s ease-in-out infinite;
        }
    </style>
</head>

<body
    class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 via-[#173d3a] to-slate-900 px-4 overflow-hidden">

    <!-- Background Blur -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-24 left-10 w-80 h-80 bg-emerald-400/10 blur-3xl rounded-full float-animation"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-teal-400/10 blur-3xl rounded-full float-animation"></div>
    </div>

    <div class="relative w-full max-w-md">

        <!-- Header -->
        <div class="text-center my-8">
            <div
                class="mx-auto w-20 h-20 rounded-2xl bg-white flex items-center justify-center shadow-xl overflow-hidden">
                <img src="/assets/logo_yayasan.png" alt="Logo Yayasan" class="w-14 h-14 object-contain">
            </div>

            <h1 class="text-3xl font-bold text-white mt-4">Admin Panel</h1>
            <p class="text-gray-400 text-sm mt-1">
                PPDB Online Yayasan Mamba'ul Ma'arif Denanyar Jombang
            </p>
        </div>


        <!-- Card -->
        <div class="bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-white/30">

            <!-- Card Header -->
            <div class="bg-gradient-to-r from-[#31694E] to-[#4a9b6f] p-6 text-center">
                <h2 class="text-2xl font-bold text-white">Login Administrator</h2>
                <p class="text-emerald-100 text-sm mt-3">Masuk untuk mengelola sistem</p>
            </div>

            <!-- Card Body -->
            <div class="p-7">

                @if ($errors->any())
                    <div class="mb-5 bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg">
                        <p class="font-semibold">Login gagal</p>
                        <p class="text-sm">{{ $errors->first() }}</p>
                    </div>
                @endif

                <form method="POST" action="/admin/login" class="space-y-5">
                    @csrf

                    <!-- Username -->
                    <div>
                        <label class="text-sm font-semibold text-gray-700">Username</label>
                        <div class="relative mt-2">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input type="text" name="username" required
                                class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:border-[#31694E] focus:ring-2 focus:ring-[#31694E]/30 outline-none transition"
                                placeholder="Masukkan username">
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="text-sm font-semibold text-gray-700">Password</label>
                        <div class="relative mt-2">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input type="password" name="password" required
                                class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:border-[#31694E] focus:ring-2 focus:ring-[#31694E]/30 outline-none transition"
                                placeholder="Masukkan password">
                        </div>
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full mt-6 bg-gradient-to-r from-[#31694E] to-[#4a9b6f] text-white font-semibold py-3 rounded-xl shadow-lg hover:shadow-emerald-500/30 hover:-translate-y-0.5 transition-all">
                        Masuk ke Dashboard
                    </button>
                </form>

                <p class="text-center text-xs text-gray-500 mt-6">
                    Butuh bantuan? Hubungi <span class="text-[#31694E] font-semibold">Administrator</span>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <p class="text-center text-xs text-gray-500 mt-6">
            © 2024 PPDB Online System
        </p>

    </div>

</body>

</html>
