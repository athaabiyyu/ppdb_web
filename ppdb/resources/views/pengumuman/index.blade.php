@extends('layouts.app_user')

@section('title', 'Pengumuman')

@section('content')
    <!-- ================== PENGUMUMAN HEADER ================== -->
    <div class="header-section py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center gap-4 mb-4">
                <span class="text-5xl md:text-6xl">📢</span>
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold text-[#31694E]">Pengumuman PPDB</h1>
                    <p class="text-gray-600 text-lg mt-2">Informasi terbaru dan penting seputar PPDB</p>
                </div>
            </div>
            <div class="h-1 w-24 bg-gradient-to-r from-[#31694E] to-transparent rounded-full mt-6"></div>
        </div>
    </div>

    <!-- ================== MAIN CONTENT ================== -->
    <div class="max-w-7xl mx-auto px-6 py-16">

        @if ($announcements->count() > 0)
            <!-- Grid Pengumuman -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                @foreach ($announcements as $announcement)
                    <div class="card-item">
                        <div
                            class="announcement-card bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col relative pt-6">
                            <!-- Badge -->
                            <div class="announcement-badge">
                                📅 {{ $announcement->published_at->format('d M Y') }}
                            </div>

                            <!-- Card Content -->
                            <div class="px-8 pb-8 flex-1 flex flex-col">
                                <!-- Title -->
                                <h3 class="text-2xl font-bold text-[#31694E] mb-4 line-clamp-2">
                                    {{ $announcement->title }}
                                </h3>

                                <!-- Description -->
                                <p class="text-gray-600 text-base leading-relaxed mb-6 flex-grow">
                                    {{ Str::limit($announcement->description, 150) }}
                                </p>

                                <!-- Read More Button -->
                                <div class="flex justify-start pt-4 border-t border-gray-200">
                                    <a href="{{ route('announcements.show', $announcement->id) }}" class="read-more-btn">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if ($announcements->hasPages())
                <div class="flex justify-center mt-16">
                    <div class="pagination-custom flex flex-wrap gap-2 justify-center">
                        {{-- Previous Page Link --}}
                        @if ($announcements->onFirstPage())
                            <span class="disabled opacity-50 cursor-not-allowed">← Sebelumnya</span>
                        @else
                            <a href="{{ $announcements->previousPageUrl() }}" class="hover:scale-105">← Sebelumnya</a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($announcements->getUrlRange(1, $announcements->lastPage()) as $page => $url)
                            @if ($page == $announcements->currentPage())
                                <span class="active"><strong>{{ $page }}</strong></span>
                            @else
                                <a href="{{ $url }}" class="hover:scale-105">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($announcements->hasMorePages())
                            <a href="{{ $announcements->nextPageUrl() }}" class="hover:scale-105">Selanjutnya →</a>
                        @else
                            <span class="disabled opacity-50 cursor-not-allowed">Selanjutnya →</span>
                        @endif
                    </div>
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="flex justify-center items-center py-16">
                <div class="no-announcement rounded-2xl p-12 text-center max-w-md w-full">
                    <span class="announcement-icon block">📭</span>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Belum ada pengumuman</h3>
                    <p class="text-gray-600 text-base leading-relaxed">
                        Pengumuman akan segera ditampilkan di sini. Silakan kembali lagi nanti atau hubungi kami untuk
                        informasi lebih lanjut.
                    </p>
                    <a href="/"
                        class="inline-block mt-6 px-8 py-3 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg transition transform hover:scale-105">
                        Kembali ke Home
                    </a>
                </div>
            </div>
        @endif

    </div>
@endsection
