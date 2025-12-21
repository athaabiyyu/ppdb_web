@extends('layouts.app_admin')

@section('title', 'Data Siswa')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-12">
            {{-- Header Section --}}
            <div class="mb-8 sm:mb-12">
                <div class="flex items-center gap-3 mb-3">
                    <div class="h-10 w-1 bg-gradient-to-b from-[#31694E] to-[#4a9b6f] rounded-full"></div>
                    <h1 class="text-2xl sm:text-4xl font-bold text-[#31694E]">Data Pendaftar Tiap Lembaga</h1>
                </div>
                <p class="text-sm sm:text-base text-gray-600 ml-4">Lihat dan Export Data Pendaftar</p>
            </div>

            @php
                $groupedByJenjang = [];
                foreach ($lembagaList as $lembaga => $students) {
                    $jenjang = $students->first()?->jenjang ?? 'Lainnya';
                    if (!isset($groupedByJenjang[$jenjang])) {
                        $groupedByJenjang[$jenjang] = [];
                    }
                    $groupedByJenjang[$jenjang][$lembaga] = $students;
                }
            @endphp

            @foreach ($groupedByJenjang as $jenjang => $lembagaByJenjang)
                <!-- Judul Jenjang -->
                <div class="mb-6 sm:mb-8">
                    <div class="flex items-center gap-3 mb-4 sm:mb-6">
                        <div class="h-10 w-1 bg-gradient-to-b from-[#31694E] to-[#4a9b6f] rounded-full"></div>
                        <h2 class="text-xl sm:text-3xl font-bold text-[#31694E]">{{ $jenjang }}</h2>
                    </div>
                </div>

                @foreach ($lembagaByJenjang as $lembaga => $students)
                    <!-- Card Container -->
                    <div class="bg-white shadow-lg rounded-xl p-4 sm:p-8 mb-6 sm:mb-8 border-t-4 border-[#31694E] overflow-hidden">
                        <!-- Card Header -->
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6 sm:mb-8 pb-4 sm:pb-6 border-b-2 border-slate-200 gap-4">
                            <div>
                                <h3 class="text-lg sm:text-2xl font-bold text-[#31694E]">{{ $lembaga }}</h3>
                                <p class="text-slate-500 text-xs sm:text-sm mt-1">Total: <span class="font-semibold text-[#31694E]">{{ $students->count() }}</span> siswa</p>
                            </div>
                            <a href="{{ route('admin.export_csv', $lembaga) }}"
                                class="w-full sm:w-auto text-center bg-orange-100 hover:bg-orange-200 text-orange-700 px-4 sm:px-6 py-2 sm:py-3 rounded-lg font-medium hover:shadow-lg transition-all duration-200 hover:scale-105 text-sm sm:text-base">
                                Export Data Siswa
                            </a>
                        </div>

                        <!-- Tabel Siswa dengan Pagination -->
                        <div class="overflow-x-auto rounded-lg mb-4 sm:mb-6">
                            <table class="w-full text-xs sm:text-sm">
                                <thead>
                                    <tr class="bg-gradient-to-r from-[#31694E] to-[#4a9b6f] text-white">
                                        <th class="px-2 sm:px-6 py-3 sm:py-4 text-left font-semibold">ID</th>
                                        <th class="px-2 sm:px-6 py-3 sm:py-4 text-left font-semibold">Reg. Number</th>
                                        <th class="px-2 sm:px-6 py-3 sm:py-4 text-left font-semibold">Nama Siswa</th>
                                        <th class="px-2 sm:px-6 py-3 sm:py-4 text-left font-semibold">Jenis Kelamin</th>
                                        <th class="hidden md:table-cell px-2 sm:px-6 py-3 sm:py-4 text-left font-semibold">NISN</th>
                                        <th class="hidden lg:table-cell px-2 sm:px-6 py-3 sm:py-4 text-left font-semibold">Asal Sekolah</th>
                                        <th class="hidden md:table-cell px-2 sm:px-6 py-3 sm:py-4 text-left font-semibold">Tanggal Lahir</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200 lembaga-table-{{ str_replace(' ', '-', $lembaga) }}">
                                    @foreach ($students as $s)
                                        <tr class="hover:bg-gradient-to-r hover:from-[#31694E]/5 hover:to-[#4a9b6f]/5 transition-colors duration-150 border-b border-slate-200">
                                            <td class="px-2 sm:px-6 py-3 sm:py-4 font-medium text-slate-700">
                                                <span class="inline-flex items-center justify-center w-6 sm:w-8 h-6 sm:h-8 rounded-full bg-[#31694E]/10 text-[#31694E] font-bold text-xs">
                                                    {{ $s->id }}
                                                </span>
                                            </td>
                                            <td class="px-2 sm:px-6 py-3 sm:py-4 text-slate-600 font-mono truncate">{{ $s->registration_number }}</td>
                                            <td class="px-2 sm:px-6 py-3 sm:py-4 font-semibold text-slate-800 capitalize">{{ $s->nama }}</td>
                                            <td class="px-2 sm:px-6 py-3 sm:py-4">
                                                <span class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs font-medium {{ $s->jenis_kelamin === 'Laki-laki' ? 'bg-blue-100 text-blue-700' : 'bg-pink-100 text-pink-700' }}">
                                                    {{ $s->jenis_kelamin === 'Laki-laki' ? 'L' : 'P' }}
                                                </span>
                                            </td>
                                            <td class="hidden md:table-cell px-2 sm:px-6 py-3 sm:py-4 text-slate-600 font-mono truncate">{{ $s->nisn }}</td>
                                            <td class="hidden lg:table-cell px-2 sm:px-6 py-3 sm:py-4 text-slate-600 truncate">{{ ucfirst(strtolower($s->sekolah_asal))}}</td>
                                            <td class="hidden md:table-cell px-2 sm:px-6 py-3 sm:py-4 text-slate-600">
                                                {{ \Carbon\Carbon::parse($s->tanggal_lahir)->format('d M Y') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination Controls -->
                        @if ($students->count() > 5)
                            @php $lembagaKey = str_replace(' ', '-', $lembaga); @endphp
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 px-3 sm:px-4 py-4 bg-slate-50 rounded-lg border border-slate-200">
                                <div class="text-xs sm:text-sm text-slate-600 text-center sm:text-left">
                                    Menampilkan <span class="font-semibold pagination-current-{{ $lembagaKey }}">1-5</span> dari <span class="font-semibold">{{ $students->count() }}</span> siswa
                                </div>

                                <div class="flex flex-wrap items-center justify-center sm:justify-end gap-1 sm:gap-2">
                                    <button type="button" 
                                        class="pagination-prev-btn px-2 sm:px-4 py-2 rounded-lg border border-slate-300 hover:bg-slate-200 transition-all disabled:opacity-50 disabled:cursor-not-allowed text-xs sm:text-sm font-medium whitespace-nowrap"
                                        data-lembaga="{{ $lembagaKey }}"
                                        data-total="{{ $students->count() }}">
                                        ← Sebelumnya
                                    </button>

                                    <div class="flex items-center gap-1 overflow-x-auto max-w-xs">
                                        @for ($i = 0; $i < ceil($students->count() / 5); $i++)
                                            <button type="button"
                                                class="pagination-page-btn w-8 sm:w-10 h-8 sm:h-10 rounded-lg border transition-all text-xs sm:text-sm font-medium flex-shrink-0 {{ $i === 0 ? 'bg-[#31694E] text-white border-[#31694E]' : 'border-slate-300 hover:bg-slate-100' }}"
                                                data-lembaga="{{ $lembagaKey }}"
                                                data-page="{{ $i + 1 }}">
                                                {{ $i + 1 }}
                                            </button>
                                        @endfor
                                    </div>

                                    <button type="button"
                                        class="pagination-next-btn px-2 sm:px-4 py-2 rounded-lg border border-slate-300 hover:bg-slate-200 transition-all disabled:opacity-50 disabled:cursor-not-allowed text-xs sm:text-sm font-medium whitespace-nowrap"
                                        data-lembaga="{{ $lembagaKey }}"
                                        data-total="{{ $students->count() }}">
                                        Selanjutnya →
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach

                <div class="mb-12 sm:mb-24"></div>
            @endforeach
        </div>
    </div>

    <script>
        // Store pagination state untuk setiap lembaga
        const paginationState = {};

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize pagination state untuk semua lembaga
            document.querySelectorAll('[data-lembaga][data-total]').forEach(element => {
                const lembaga = element.dataset.lembaga;
                const totalStudents = parseInt(element.dataset.total);
                
                if (!paginationState[lembaga]) {
                    paginationState[lembaga] = {
                        currentPage: 1,
                        itemsPerPage: 5,
                        totalStudents: totalStudents,
                        totalPages: Math.ceil(totalStudents / 5)
                    };
                }
            });

            // Setup prev buttons
            document.querySelectorAll('.pagination-prev-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const lembaga = this.dataset.lembaga;
                    prevPage(lembaga);
                });
            });

            // Setup next buttons
            document.querySelectorAll('.pagination-next-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const lembaga = this.dataset.lembaga;
                    nextPage(lembaga);
                });
            });

            // Setup page buttons
            document.querySelectorAll('.pagination-page-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const lembaga = this.dataset.lembaga;
                    const page = parseInt(this.dataset.page);
                    goToPage(lembaga, page);
                });
            });

            // Trigger showPage untuk initialize tampilan pertama
            Object.keys(paginationState).forEach(lembaga => {
                showPage(lembaga, 1);
            });
        });

        function showPage(lembaga, page) {
            const state = paginationState[lembaga];
            if (!state) return;

            const itemsPerPage = 5;
            const tbody = document.querySelector(`.lembaga-table-${lembaga}`);
            
            if (!tbody) return;

            const allRows = Array.from(tbody.querySelectorAll('tr'));
            const totalPages = Math.ceil(allRows.length / itemsPerPage);

            if (page < 1 || page > totalPages) return;

            // Hide semua rows
            allRows.forEach(row => row.style.display = 'none');

            // Show rows untuk halaman saat ini
            const startIdx = (page - 1) * itemsPerPage;
            const endIdx = startIdx + itemsPerPage;
            
            for (let i = startIdx; i < endIdx && i < allRows.length; i++) {
                allRows[i].style.display = 'table-row';
            }

            // Update pagination info
            const currentDisplay = `${startIdx + 1}-${Math.min(endIdx, allRows.length)}`;
            const currentSpan = document.querySelector(`.pagination-current-${lembaga}`);
            if (currentSpan) {
                currentSpan.textContent = currentDisplay;
            }

            // Update active page button
            document.querySelectorAll('.pagination-page-btn').forEach(btn => {
                if (btn.dataset.lembaga === lembaga) {
                    const btnPage = parseInt(btn.dataset.page);
                    if (btnPage === page) {
                        btn.classList.remove('border-slate-300', 'hover:bg-slate-100');
                        btn.classList.add('bg-[#31694E]', 'text-white', 'border-[#31694E]');
                    } else {
                        btn.classList.remove('bg-[#31694E]', 'text-white', 'border-[#31694E]');
                        btn.classList.add('border-slate-300', 'hover:bg-slate-100');
                    }
                }
            });

            // Update prev/next button state
            const prevBtn = document.querySelector(`.pagination-prev-btn[data-lembaga="${lembaga}"]`);
            const nextBtn = document.querySelector(`.pagination-next-btn[data-lembaga="${lembaga}"]`);
            
            if (prevBtn) prevBtn.disabled = page === 1;
            if (nextBtn) nextBtn.disabled = page === totalPages;

            // Store current page
            state.currentPage = page;
        }

        function nextPage(lembaga) {
            const state = paginationState[lembaga];
            if (!state) return;

            const tbody = document.querySelector(`.lembaga-table-${lembaga}`);
            if (!tbody) return;

            const allRows = Array.from(tbody.querySelectorAll('tr'));
            const totalPages = Math.ceil(allRows.length / 5);

            if (state.currentPage < totalPages) {
                showPage(lembaga, state.currentPage + 1);
            }
        }

        function prevPage(lembaga) {
            const state = paginationState[lembaga];
            if (!state) return;

            if (state.currentPage > 1) {
                showPage(lembaga, state.currentPage - 1);
            }
        }

        function goToPage(lembaga, page) {
            showPage(lembaga, page);
        }
    </script>
@endsection