@extends('layouts.app_user')

@section('title', 'Pengumuman')

@section('content')
    <!-- ================== PENGUMUMAN HEADER ================== -->
    <div
        class="header-section bg-gradient-to-br from-[#31694E] via-[#2a5840] to-[#1f4230] py-12 md:py-20 relative overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-white opacity-5 rounded-full -mr-48 -mt-48"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-white opacity-5 rounded-full -ml-40 -mb-40"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-6 mb-8">
                <div class="text-6xl md:text-7xl animate-bounce" style="animation: bounce 3s infinite;">📢</div>
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-3">Pengumuman PPDB</h1>
                    <p class="text-green-100 text-lg max-w-2xl">Informasi terbaru dan penting seputar PPDB untuk Anda</p>
                </div>
            </div>
            <div class="h-1 w-32 bg-gradient-to-r from-white to-green-100 rounded-full"></div>
        </div>
    </div>

    <!-- ================== MAIN CONTENT ================== -->
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 md:py-20">
        <div class="max-w-7xl mx-auto px-6">

            @if ($announcements->count() > 0)
                <!-- Grid Pengumuman -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                    @foreach ($announcements as $announcement)
                        <div class="card-item group">
                            <button type="button"
                                class="announcement-card w-full bg-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col relative transition-all duration-300 hover:shadow-2xl hover:scale-105 border border-gray-100 text-left"
                                onclick="openModal({{ json_encode([
                                    'id' => $announcement->id,
                                    'title' => $announcement->title,
                                    'description' => $announcement->description,
                                    'content' => $announcement->content,
                                    'published_at' => $announcement->published_at->format('d F Y H:i'),
                                ]) }})">

                                <!-- Top Accent Bar -->
                                <div class="h-1 w-full bg-gradient-to-r from-[#31694E] to-[#10b981]"></div>

                                <!-- Badge -->
                                <div class="absolute top-4 right-4 z-10">
                                    <span
                                        class="announcement-badge inline-flex items-center gap-2 bg-gradient-to-r from-[#31694E] to-[#2a5840] text-white px-4 py-2 rounded-full text-sm font-semibold shadow-md">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M6 2a1 1 0 000 2h8a1 1 0 100-2H6zM4 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V5z" />
                                        </svg>
                                        {{ $announcement->published_at->format('d M Y') }}
                                    </span>
                                </div>

                                <!-- Card Content -->
                                <div class="px-8 py-8 flex-1 flex flex-col">
                                    <!-- Title -->
                                    <h3
                                        class="text-2xl md:text-3xl font-bold text-[#31694E] mb-4 line-clamp-2 group-hover:text-[#2a5840] transition-colors">
                                        {{ $announcement->title }}
                                    </h3>

                                    <!-- Description -->
                                    <p class="text-gray-600 text-base leading-relaxed mb-6 flex-grow line-clamp-3">
                                        {{ $announcement->description }}
                                    </p>

                                    <!-- Footer Section -->
                                    <div class="flex justify-between items-center pt-6 border-t border-gray-200">
                                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Baca
                                            informasi lengkap</span>
                                        <div
                                            class="read-more-btn inline-flex items-center gap-2 bg-gradient-to-r from-[#31694E] to-[#2a5840] hover:from-[#2a5840] hover:to-[#1f4230] text-white font-bold px-6 py-2 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:translate-x-1">
                                            Selengkapnya
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if ($announcements->hasPages())
                    <div class="flex justify-center mt-16">
                        <nav
                            class="pagination-custom flex flex-wrap gap-3 justify-center items-center bg-white rounded-full px-6 py-4 shadow-lg border border-gray-200">
                            {{-- Previous Page Link --}}
                            @if ($announcements->onFirstPage())
                                <span class="disabled px-4 py-2 rounded-lg text-gray-400 cursor-not-allowed font-semibold">
                                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7" />
                                    </svg>
                                    Sebelumnya
                                </span>
                            @else
                                <a href="{{ $announcements->previousPageUrl() }}"
                                    class="px-4 py-2 rounded-lg text-[#31694E] hover:bg-[#31694E] hover:text-white font-semibold transition-all duration-300 transform hover:scale-105">
                                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7" />
                                    </svg>
                                    Sebelumnya
                                </a>
                            @endif

                            <div class="flex gap-2 items-center">
                                {{-- Pagination Elements --}}
                                @foreach ($announcements->getUrlRange(1, $announcements->lastPage()) as $page => $url)
                                    @if ($page == $announcements->currentPage())
                                        <span
                                            class="active w-10 h-10 flex items-center justify-center rounded-full bg-gradient-to-br from-[#31694E] to-[#2a5840] text-white font-bold shadow-md">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <a href="{{ $url }}"
                                            class="w-10 h-10 flex items-center justify-center rounded-full text-gray-700 hover:bg-gray-200 font-semibold transition-all duration-300 transform hover:scale-110">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>

                            {{-- Next Page Link --}}
                            @if ($announcements->hasMorePages())
                                <a href="{{ $announcements->nextPageUrl() }}"
                                    class="px-4 py-2 rounded-lg text-[#31694E] hover:bg-[#31694E] hover:text-white font-semibold transition-all duration-300 transform hover:scale-105">
                                    Selanjutnya
                                    <svg class="w-5 h-5 inline ml-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            @else
                                <span class="disabled px-4 py-2 rounded-lg text-gray-400 cursor-not-allowed font-semibold">
                                    Selanjutnya
                                    <svg class="w-5 h-5 inline ml-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </span>
                            @endif
                        </nav>
                    </div>
                @endif
            @else
                <!-- Empty State -->
                <div class="flex justify-center items-center py-20">
                    <div
                        class="no-announcement bg-white rounded-3xl p-12 text-center max-w-md w-full shadow-lg border border-gray-200">
                        <div class="announcement-icon block text-7xl mb-6 animate-bounce">📭</div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-4">Belum ada pengumuman</h3>
                        <p class="text-gray-600 text-base leading-relaxed mb-8">
                            Pengumuman akan segera ditampilkan di sini. Silakan kembali lagi nanti atau hubungi kami untuk
                            informasi lebih lanjut.
                        </p>
                        <a href="/"
                            class="inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-[#31694E] to-[#2a5840] hover:from-[#2a5840] hover:to-[#1f4230] text-white font-bold rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12a9 9 0 011 4.5m0 0a9 9 0 0018 0m-18 0a9 9 0 0018 0" />
                            </svg>
                            Kembali ke Home
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </div>

    <!-- ================== MODAL DETAIL PENGUMUMAN ================== -->
    <div id="announcementModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50 p-4 modal-backdrop">
        <div
            class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto modal-content transform transition-all duration-300">
            <!-- Modal Header -->
            <div
                class="bg-gradient-to-r from-[#31694E] to-[#2a5840] sticky top-0 z-10 px-8 py-6 flex items-center justify-between">
                <h2 class="text-2xl font-bold text-white" id="modalTitle">Detail Pengumuman</h2>
                <button type="button"
                    class="text-white hover:bg-white hover:text-[#31694E] rounded-lg p-2 transition-all duration-300"
                    onclick="closeModal()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="px-8 py-6">
                <!-- Meta Information -->
                <div class="flex flex-wrap gap-4 mb-6 pb-6 border-b border-gray-200">
                    <div class="flex items-center gap-2 text-gray-600">
                        <svg class="w-5 h-5 text-[#31694E]" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M6 2a1 1 0 000 2h8a1 1 0 100-2H6zM4 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V5z" />
                        </svg>
                        <span id="modalPublished" class="font-semibold text-gray-700"></span>
                    </div>
                </div>

                <!-- Title -->
                <h3 class="text-3xl font-bold text-[#31694E] mb-4" id="modalTitleFull"></h3>

                <!-- Description -->
                <div class="bg-green-50 border-l-4 border-[#31694E] px-4 py-3 rounded mb-6">
                    <p class="text-gray-700 font-semibold" id="modalDescription"></p>
                </div>

                <!-- Content -->
                <div class="content-modal text-gray-700 leading-relaxed space-y-4" id="modalContent"></div>
            </div>

            <!-- Modal Footer -->
            <div class="bg-gray-50 px-8 py-4 border-t border-gray-200 flex justify-end sticky bottom-0">
                <button type="button"
                    class="px-6 py-2 bg-gradient-to-r from-[#31694E] to-[#2a5840] text-white font-bold rounded-lg hover:from-[#2a5840] hover:to-[#1f4230] transition-all duration-300"
                    onclick="closeModal()">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <style>
        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .announcement-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .announcement-card:hover {
            transform: translateY(-8px);
        }

        .read-more-btn {
            transition: all 0.3s ease;
        }

        .modal-backdrop.active {
            animation: fadeIn 0.3s ease;
        }

        .modal-content {
            animation: slideIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .content-modal p {
            margin-bottom: 1rem;
        }

        .content-modal strong {
            color: #31694E;
            font-weight: 600;
        }

        /* Scrollbar styling */
        .modal-backdrop #announcementModal::-webkit-scrollbar {
            width: 8px;
        }

        .modal-backdrop #announcementModal::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .modal-backdrop #announcementModal::-webkit-scrollbar-thumb {
            background: #31694E;
            border-radius: 4px;
        }

        .modal-backdrop #announcementModal::-webkit-scrollbar-thumb:hover {
            background: #2a5840;
        }
    </style>

    <script>
        function openModal(announcement) {
            const modal = document.getElementById('announcementModal');
            document.getElementById('modalTitle').textContent = announcement.title;
            document.getElementById('modalTitleFull').textContent = announcement.title;
            document.getElementById('modalDescription').textContent = announcement.description;
            document.getElementById('modalPublished').textContent = announcement.published_at;

            // Parse content dan replace newline dengan paragraph
            const contentHtml = announcement.content
                .split('\n')
                .filter(line => line.trim() !== '')
                .map(line => `<p>${line}</p>`)
                .join('');

            document.getElementById('modalContent').innerHTML = contentHtml;

            modal.classList.remove('hidden');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('announcementModal');
            modal.classList.add('hidden');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('announcementModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
@endsection
