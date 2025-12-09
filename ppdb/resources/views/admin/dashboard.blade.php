@extends('layouts.app_admin')

@section('title', 'Dashboard Admin')

@section('content')

    <!-- ================== MAIN CONTENT ================== -->
    <div class="max-w-7xl mx-auto px-6 py-12">

        {{-- Header Section --}}
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-3">
                    <div class="h-10 w-1 bg-gradient-to-b from-[#31694E] to-[#4a9b6f] rounded-full"></div>
                    <h1 class="text-4xl font-bold text-[#31694E]">Dashboard Admin</h1>
                </div>
                <p class="text-gray-600 ml-4">Selamat datang di panel administrasi PPDB Online</p>
            </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <!-- Total Card -->
            <div class="bg-gradient-to-br from-gray-700 to-gray-800 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-gray-300 text-sm font-medium">Total Pendaftar</p>
                        <h3 class="text-3xl font-bold mt-1">
                            {{ ($counts['SD'] ?? 0) + ($counts['SMP'] ?? 0) + ($counts['SMA'] ?? 0) }}</h3>
                    </div>
                    <div class="bg-white/20 p-3 rounded-lg">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-center text-gray-300 text-sm">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Semua Lembaga
                </div>
            </div>

            <!-- SD Card -->
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-blue-100 text-sm font-medium">SD</p>
                        <h3 class="text-3xl font-bold mt-1">{{ $counts['SD'] ?? 0 }}</h3>
                    </div>
                    <div class="bg-white/20 p-3 rounded-lg">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-center text-blue-100 text-sm">
                    Tingkat Dasar
                </div>
            </div>

            <!-- SMP Card -->
            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-green-100 text-sm font-medium">SMP</p>
                        <h3 class="text-3xl font-bold mt-1">{{ $counts['SMP'] ?? 0 }}</h3>
                    </div>
                    <div class="bg-white/20 p-3 rounded-lg">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                            <path
                                d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-center text-green-100 text-sm">
                    Tingkat Menengah Pertama
                </div>
            </div>

            <!-- SMA Card -->
            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-purple-100 text-sm font-medium">SMA</p>
                        <h3 class="text-3xl font-bold mt-1">{{ $counts['SMA'] ?? 0 }}</h3>
                    </div>
                    <div class="bg-white/20 p-3 rounded-lg">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-center text-purple-100 text-sm">
                    Tingkat Menengah Atas
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Chart -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Statistik Pendaftaran</h2>
                        <p class="text-gray-600 text-sm">Data jumlah pendaftar per lembaga</p>
                    </div>
                    <select id="lembagaSelect"
                        class="px-4 py-2 border-2 border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 font-medium">
                        <option value="all">Semua Lembaga</option>
                        @foreach ($lembagaCounts as $lembaga => $count)
                            <option value="{{ $lembaga }}">{{ $lembaga }} ({{ $count }} pendaftar)
                            </option>
                        @endforeach
                    </select>
                </div>
                <canvas id="chart"></canvas>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Aksi Cepat</h2>
                <div class="space-y-3">
                    <a href="{{ route('admin.data_siswa') }}"
                        class="flex items-center gap-3 p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition group">
                        <div class="bg-blue-500 p-2 rounded-lg group-hover:scale-110 transition">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                <path fill-rule="evenodd"
                                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800">Lihat Data Pendaftaran</p>
                            <p class="text-xs text-gray-600">Lihat dan export data pendaftar</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.home_settings') }}"
                        class="flex items-center gap-3 p-3 bg-green-50 hover:bg-green-100 rounded-lg transition group">
                        <div class="bg-green-500 p-2 rounded-lg group-hover:scale-110 transition">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800">Buat Pengumuman</p>
                            <p class="text-xs text-gray-600">Publikasikan hasil</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.home_settings') }}"
                        class="flex items-center gap-3 p-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition group">
                        <div class="bg-gray-500 p-2 rounded-lg group-hover:scale-110 transition">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800">Edit Halaman Home</p>
                            <p class="text-xs text-gray-600">Edit halaman publik</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <!-- ================== END MAIN CONTENT ================== -->
@endsection

@push('scripts')
    <script>
        // Data dari backend - dinamis dari database
        const chartData = {
            all: {
                labels: [
                    @foreach ($lembagaCounts as $lembaga => $count)
                        '{{ $lembaga }}',
                    @endforeach
                ],
                data: [
                    @foreach ($lembagaCounts as $lembaga => $count)
                        {{ $count }},
                    @endforeach
                ],
                colors: [
                    @foreach ($lembagaCounts as $lembaga => $count)
                        @php
                            $color = '';
                            if (strpos($lembaga, 'SD') !== false) {
                                $color = 'rgb(125, 211, 252)';
                            } elseif (preg_match('/MTS|SMP|MTSN/i', $lembaga)) {
                                $color = 'rgb(134, 239, 172)';
                            } elseif (preg_match('/MA|SMK|MAN/i', $lembaga)) {
                                $color = 'rgb(216, 180, 254)';
                            } else {
                                $color = 'rgba(100, 100, 100, 0.8)';
                            }
                        @endphp
                            '{{ $color }}',
                    @endforeach
                ],
            },
            @foreach ($lembagaCounts as $lembaga => $count)
                '{{ $lembaga }}': {
                    labels: ['{{ $lembaga }}'],
                    data: [{{ $count }}],
                    colors: [
                        @php
                            $color = '';
                            if (strpos($lembaga, 'SD') !== false) {
                                $color = 'rgb(125, 211, 252)';
                            } elseif (preg_match('/MTS|SMP|MTSN/i', $lembaga)) {
                                $color = 'rgb(134, 239, 172)';
                            } elseif (preg_match('/MA|SMK|MAN/i', $lembaga)) {
                                $color = 'rgb(216, 180, 254)';
                            } else {
                                $color = 'rgba(100, 100, 100, 0.8)';
                            }
                        @endphp '{{ $color }}'
                    ],
                    borderColors: [
                        @php
                            $border = str_replace('0.8', '1', $color);
                        @endphp '{{ $border }}'
                    ]
                },
            @endforeach
        };

        const ctx = document.getElementById('chart');
        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartData.all.labels,
                datasets: [{
                    label: 'Jumlah Pendaftar',
                    data: chartData.all.data,
                    backgroundColor: chartData.all.colors,
                    borderColor: chartData.all.borderColors,
                    borderWidth: 2,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        titleFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        bodyFont: {
                            size: 13
                        },
                        borderColor: 'rgba(255, 255, 255, 0.1)',
                        borderWidth: 1
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            font: {
                                size: 12
                            },
                            callback: function(value) {
                                return value;
                            } // tanpa koma
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 12,
                                weight: 'bold'
                            }
                        }
                    }
                }
            }
        });

        // Event listener untuk dropdown
        document.getElementById('lembagaSelect').addEventListener('change', function(e) {
            const selected = e.target.value;
            const data = chartData[selected];

            myChart.data.labels = data.labels;
            myChart.data.datasets[0].data = data.data;
            myChart.data.datasets[0].backgroundColor = data.colors;
            myChart.data.datasets[0].borderColor = data.borderColors;
            myChart.update();
        });
    </script>
@endpush
