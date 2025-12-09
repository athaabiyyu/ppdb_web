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

        .content-body {
            font-size: 1.05rem;
            line-height: 1.8;
            color: #374151;
        }

        .content-body p {
            margin-bottom: 1.5rem;
        }

        .content-body strong {
            color: #31694E;
            font-weight: 600;
        }

        .breadcrumb-link {
            transition: all 0.3s ease;
        }

        .breadcrumb-link:hover {
            transform: translateX(-4px);
        }

        .article-header {
            background: linear-gradient(135deg, #31694E 0%, #2a5840 100%);
            position: relative;
            overflow: hidden;
        }

        .article-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .article-header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .related-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
        }

        .related-card:hover {
            transform: translateY(-8px);
            border-color: #31694E;
            box-shadow: 0 20px 40px rgba(49, 105, 78, 0.15);
        }

        .read-more-related {
            position: relative;
            color: #31694E;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .read-more-related::after {
            content: '→';
            transition: transform 0.3s ease;
        }

        .related-card:hover .read-more-related::after {
            transform: translateX(4px);
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

    <!-- ================== ARTICLE HEADER ================== -->
    <div class="article-header py-12 md:py-16 relative z-10">
        <div class="max-w-4xl mx-auto px-6 relative z-20">
            <!-- Breadcrumb -->
            <div class="flex items-center gap-2 mb-6 text-green-100">
                <a href="/" class="breadcrumb-link hover:text-white transition">
                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12a9 9 0 1 0 18 0 9 9 0 0 0-18 0" />
                    </svg>
                    Home
                </a>
                <span class="opacity-50">/</span>
                <a href="{{ route('announcements.index') }}" class="breadcrumb-link hover:text-white transition">
                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 0 20 15.571V11a6 6 0 1 0-12 0v4.571a2.032 2.032 0 0 0 .595 1.424L9 17m6 0v1a3 3 0 0 1-6 0v-1m6 0H9" />
                    </svg>
                    Pengumuman
                </a>
                <span class="opacity-50">/</span>
                <span class="text-white font-semibold">Detail</span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
                {{ $announcement->title }}
            </h1>

            <!-- Meta Info -->
            <div class="flex items-center gap-4 text-green-100">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M6 2a1 1 0 000 2h8a1 1 0 100-2H6zM4 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V5z" />
                    </svg>
                    {{ $announcement->published_at->format('d F Y') }}
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00-.293.707l-2.828 2.829a1 1 0 101.415 1.415L8 10.414V6z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ $announcement->published_at->format('H:i') }} WIB
                </div>
            </div>
        </div>
    </div>

    <!-- ================== MAIN CONTENT ================== -->
    <div class="py-12 md:py-20">
        <div class="max-w-4xl mx-auto px-6">
            <!-- Article Card -->
            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 mb-12">
                <!-- Content -->
                <div class="content-body mb-8">
                    {!! nl2br(e($announcement->content)) !!}
                </div>

                <!-- Divider -->
                <div class="border-t-2 border-gray-200 my-8"></div>

                <!-- Meta Footer -->
                <div class="flex flex-col md:flex-row items-center justify-between text-gray-600 text-sm">
                    <div class="flex items-center gap-2 mb-4 md:mb-0">
                        <svg class="w-5 h-5 text-[#31694E]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zm-11-1a1 1 0 11-2 0 1 1 0 012 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Dipublikasikan pada
                            {{ $announcement->published_at->format('d F Y \p\u\k\u\l H:i') }}</span>
                    </div>
                    <a href="{{ route('announcements.index') }}"
                        class="inline-flex items-center gap-2 text-[#31694E] hover:text-[#2a5840] font-semibold transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Pengumuman
                    </a>
                </div>
            </div>

            <!-- Related Announcements -->
            @if ($related->count() > 0)
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8 flex items-center gap-3">
                        <span>📌</span>
                        <span>Pengumuman Lainnya</span>
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($related as $item)
                            <a href="{{ route('announcements.show', $item->id) }}" class="group">
                                <div class="related-card bg-white rounded-xl shadow-md overflow-hidden h-full">
                                    <!-- Card Header -->
                                    <div class="h-1 w-full bg-gradient-to-r from-[#31694E] to-[#10b981]"></div>

                                    <!-- Card Content -->
                                    <div class="p-6">
                                        <!-- Date Badge -->
                                        <div
                                            class="inline-flex items-center gap-2 bg-green-50 text-[#31694E] px-3 py-1 rounded-full text-xs font-semibold mb-3">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M6 2a1 1 0 000 2h8a1 1 0 100-2H6zM4 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V5z" />
                                            </svg>
                                            {{ $item->published_at->format('d M Y') }}
                                        </div>

                                        <!-- Title -->
                                        <h3
                                            class="text-lg font-bold text-gray-800 mb-3 line-clamp-2 group-hover:text-[#31694E] transition-colors">
                                            {{ $item->title }}
                                        </h3>

                                        <!-- Description -->
                                        <p class="text-gray-600 text-sm line-clamp-2 mb-4">
                                            {{ $item->description }}
                                        </p>

                                        <!-- Read More -->
                                        <div class="read-more-related">
                                            Baca Selengkapnya
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

</body>

</html>
