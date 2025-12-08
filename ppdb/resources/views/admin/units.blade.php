<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title>PPDB - Penerimaan Peserta Didik Baru</title>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100">

    <!-- ================== NAVBAR ================== -->
    <nav class="bg-[#31694E] text-white shadow-md sticky top-0 z-50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <!-- Left Logo -->
                <div class="flex items-center space-x-3">
                    <img src="/assets/logo_yayasan.png" alt="Logo" class="w-16 h-16">
                    <div>
                        <span class="text-2xl font-bold block">PPDB Online</span>
                        <span class="text-sm opacity-90">Yayasan Mambaul Maarif Denanyar Jombang</span>
                    </div>
                </div>

                <!-- Right Menu -->
                <ul class="hidden md:flex space-x-6 font-medium">
                    <li>
                        <a href="#home"
                            class="relative group px-3 py-1 rounded-md hover:bg-white hover:text-green-700 transition">
                            Home
                            <span
                                class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#info-alur"
                            class="relative group px-3 py-1 rounded-md hover:bg-white hover:text-green-700 transition">
                            Informasi & Alur Pendaftaran
                            <span
                                class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#pendaftaran"
                            class="relative group px-3 py-1 rounded-md hover:bg-white hover:text-green-700 transition">
                            Pendaftaran
                            <span
                                class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                        </a>
                    </li>
                    <li>
                        <a href="/pengumuman"
                            class="relative group px-3 py-1 rounded-md hover:bg-white hover:text-green-700 transition">
                            Pengumuman
                            <span
                                class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#kontak"
                            class="relative group px-3 py-1 rounded-md hover:bg-white hover:text-green-700 transition">
                            Contact Us
                            <span
                                class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                        </a>
                    </li>
                </ul>


                <!-- Mobile Menu Button -->
                <div class="md:hidden relative">
                    <button id="mobile-menu-button" class="text-white focus:outline-none">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Mobile Dropdown Menu -->
                    <ul id="mobile-menu"
                        class="absolute right-0 mt-2 w-56 bg-[#31694E]/95 backdrop-blur-md rounded-xl shadow-xl hidden flex-col py-2 z-50">
                        <li>
                            <a href="#home" class="relative group block px-6 py-3 text-white font-medium transition">
                                Home
                                <span
                                    class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#info-alur"
                                class="relative group block px-6 py-3 text-white font-medium transition">
                                Informasi & Alur Pendaftaran
                                <span
                                    class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#pendaftaran"
                                class="relative group block px-6 py-3 text-white font-medium transition">
                                Pendaftaran
                                <span
                                    class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                            </a>
                        </li>
                        <li>
                            <a href="/pengumuman"
                                class="relative group block px-6 py-3 text-white font-medium transition">
                                Pengumuman
                                <span
                                    class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#kontak" class="relative group block px-6 py-3 text-white font-medium transition">
                                Contact Us
                                <span
                                    class="absolute left-0 -bottom-1 w-0 h-0.5 bg-white group-hover:w-full transition-all"></span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>

    <div class="p-8">
        <h2 class="text-2xl font-bold mb-6">Unit Pendidikan</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="mb-8 bg-white p-5 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-3">Tambah Unit Pendidikan</h3>
            <form action="{{ route('admin.units.store') }}" method="POST" class="flex gap-3">
                @csrf
                <input type="text" name="name" placeholder="Nama Lembaga" class="border rounded px-3 py-2 w-full"
                    required>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Tambah
                </button>
            </form>
        </div>


        <table class="w-full table-auto border border-gray-200 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-3 px-4 text-left">Unit Pendidikan</th>
                    <th class="py-3 px-4 text-left">Link Google Drive</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($units as $unit)
                    <tr class="border-t">
                        <td class="py-3 px-4">{{ $unit->name }}</td>
                        <td class="py-3 px-4">
                            <form action="{{ route('admin.units.updateLink', $unit->id) }}" method="POST"
                                class="flex gap-2">
                                @csrf
                                <input type="url" name="google_drive_link" value="{{ $unit->google_drive_link }}"
                                    class="border rounded px-2 py-1 w-full">
                                <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded">Simpan</button>
                            </form>
                        </td>
                        <td class="py-3 px-4">
                            @if ($unit->google_drive_link)
                                <a href="{{ $unit->google_drive_link }}" target="_blank"
                                    class="text-blue-600 underline">Detail</a>
                            @else
                                <span class="text-gray-400">Belum ada</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
