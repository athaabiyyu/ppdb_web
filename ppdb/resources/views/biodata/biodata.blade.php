@extends('layouts.app_user', ['noNavbar' => true])

@section('title', 'Detail Biodata')

@push('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: #31694E;
        }

        .section-card {
            transition: all 0.3s ease;
        }

        .section-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 25px 30px -5px rgba(0, 0, 0, 0.15);
        }

        .modal-content {
            max-height: 90vh;
            overflow-y: auto;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slideUp {
            animation: slideUp 0.3s ease-out;
        }

        /* Custom Scrollbar */
        .overflow-y-auto::-webkit-scrollbar {
            width: 8px;
        }

        .overflow-y-auto::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .overflow-y-auto::-webkit-scrollbar-thumb {
            background: #10b981;
            border-radius: 10px;
        }

        .overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: #059669;
        }

        /* Input Focus Glow Effect */
        .group input:focus,
        .group select:focus,
        .group textarea:focus {
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .file-input-wrapper-edit {
            position: relative;
            overflow: hidden;
            display: block;
            width: 100%;
        }

        .file-input-wrapper-edit input[type=file] {
            position: absolute;
            left: -9999px;
        }

        .file-input-label-edit {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            background: white;
            border: 2px dashed #d1d5db;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-input-label-edit:hover {
            border-color: #2e7d32;
            background: #f0f9ff;
        }

        .file-input-label-edit.has-file {
            border-color: #2e7d32;
            background: #f1f8f4;
            border-style: solid;
        }

        .file-name-edit {
            font-size: 13px;
            flex: 1;
        }

        .file-name-edit.placeholder {
            color: #9ca3af;
        }
    </style>
@endpush

@section('content')
    <!-- ================== NAVBAR ================== -->
    <div class="sticky top-0 z-50 bg-gradient-to-br from-[#31694E] via-[#2a5840] to-[#1f4230] text-white py-3 md:py-3">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 md:gap-4">
                <!-- Logo dan Nama Yayasan -->
                <div class="flex items-center gap-3 flex-shrink-0">
                    <img src="{{ asset('assets/logo_yayasan.png') }}" alt="Logo" class="w-16 h-16 md:w-16 md:h-16">
                    <div>
                        <span class="text-xl md:text-xl font-bold block">PPDB Online</span>
                        <span class="text-sm md:text-sm opacity-90">Yayasan Mambaul Maarif Denanyar Jombang</span>
                    </div>
                </div>
                <!-- Progress Info -->
                <div class="hidden md:block flex-shrink-0">
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl px-6 py-3 shadow-inner">
                        <p class="text-sm text-green-100">Langkah 4 dari 4</p>
                        <p class="text-xl md:text-2xl font-bold">Pendaftaran Berhasil</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ================== MAIN CONTENT ================== -->
    <div class="max-w-5xl mx-auto px-4 py-8">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- SECTION CARD -->
        <div class="section-card bg-white rounded-2xl shadow-lg p-8 mb-6">
            <!-- Heading -->
            <div class="flex items-center justify-between mb-6 pb-4 border-b-2 border-green-100">
                <!-- ICON + TEXT -->
                <div class="flex items-center flex-wrap">
                    <div
                        class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center mr-3 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h2 class="font-bold text-gray-800 text-xl sm:text-2xl md:text-3xl">
                        Detail Biodata
                    </h2>
                </div>

                <!-- BUTTONS -->
                <div class="flex items-center gap-3 pb-4">
                    <!-- EDIT DOKUMEN -->
                    <button onclick="openEditDokumenModal()"
                        class="bg-emerald-100 hover:bg-emerald-200 text-emerald-700 font-semibold py-3 px-5 rounded-xl shadow-lg transition flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <span class="hidden md:block">Edit Dokumen</span>
                    </button>

                    <!-- EDIT BIODATA -->
                    <button onclick="openEditModal()"
                        class="bg-emerald-100 hover:bg-emerald-200 text-emerald-700 font-semibold py-3 px-5 rounded-xl shadow-lg transition flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        <span class="hidden md:block">Edit Biodata</span>
                    </button>

                    <!-- CETAK -->
                    <a href="{{ route('cetak', ['id' => $student->id]) }}"
                        class="bg-orange-100 hover:bg-orange-200 text-orange-700 px-5 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                            </path>
                        </svg>
                        <span class="hidden md:block">Cetak</span>
                    </a>
                </div>
            </div>

            <!-- FOTO + DATA UTAMA -->
            <div class="flex flex-col gap-6 mb-8">

                <h1 class="text-4xl font-bold text-gray-800 mb-2 text-center">Detail Data Diri</h1>

                <!-- Foto -->
                <div class="flex-shrink-0 flex items-center justify-center">
                    <div class="w-32 h-40 bg-gray-100 rounded-xl overflow-hidden border-4 border-gray-100 shadow-lg">
                        @if ($student->foto)
                            <img src="{{ asset('storage/' . $student->foto) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                <svg class="w-16 h-16 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Data Utama -->
                <div class="flex-1 ">
                    <h6 class="text-xl font-bold text-gray-800 mb-12 text-center capitalize">{{ $student->nama }}</h6>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center shadow-md">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>

                        <h3 class="text-xl font-bold text-gray-800">Data Utama</h3>
                    </div>

                    <div class="bg-[#31694E]/10 p-6 rounded-xl border border-[#31694E]/30 mb-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div class="bg-white rounded-xl p-4">
                                <p class="text-xs text-gray-500">NISN</p>
                                <p class="text-lg font-semibold">{{ $student->nisn ?? '-' }}</p>
                            </div>

                            <div class="bg-white rounded-xl p-4">
                                <p class="text-xs text-gray-500">Jenis Kelamin</p>
                                <p class="text-lg font-semibold capitalize">{{ $student->jenis_kelamin ?? '-' }}</p>
                            </div>

                            <div class="bg-white rounded-xl p-4">
                                <p class="text-xs text-gray-500">Agama</p>
                                <p class="text-lg font-semibold capitalize">{{ $student->agama ?? '-' }}</p>
                            </div>

                            <div class="bg-white rounded-xl p-4">
                                <p class="text-xs text-gray-500">Tanggal Lahir</p>
                                <p class="text-lg font-semibold">
                                    @if ($student->tempat_lahir && $student->tanggal_lahir)
                                        {{ ucfirst(strtolower($student->tempat_lahir)) }},
                                        {{ \Carbon\Carbon::parse($student->tanggal_lahir)->format('d F Y') }}
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>

                            <div class="bg-white rounded-xl p-4">
                                <p class="text-xs text-gray-500">Hobi</p>
                                <p class="text-lg font-semibold">{{ ucfirst(strtolower($student->hobi)) ?? '-' }}</p>
                            </div>

                            <div class="bg-white rounded-xl p-4">
                                <p class="text-xs text-gray-500">Cita-Cita</p>
                                <p class="text-lg font-semibold">{{ ucfirst(strtolower($student->cita_cita)) ?? '-' }}</p>
                            </div>

                            <div class="bg-white rounded-xl p-4 md:col-span-2">
                                <p class="text-xs text-gray-500">Pilihan Lembaga</p>
                                <p class="text-lg font-semibold">
                                    {{ is_array($student->selected_schools) ? implode(', ', $student->selected_schools) : $student->selected_schools ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATA DIRI LENGKAP -->
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>

                <h3 class="text-xl font-bold text-gray-800">Data Diri Lengkap</h3>
            </div>
            <div class="bg-[#31694E]/10 p-6 rounded-xl border border-[#31694E]/30 mb-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @php
                        $fields = [
                            'no_kk' => 'Nomor KK',
                            'nik' => 'NIK',
                            'anak_ke' => 'Anak Ke',
                            'jumlah_saudara' => 'Jumlah Saudara',
                            'tinggal_dengan' => 'Tinggal Dengan',
                            'rencana_tinggal' => 'Rencana Tempat Tinggal',
                            'jarak_tempat_tinggal' => 'Jarak Tempat Tinggal',
                            'sekolah_asal' => 'Sekolah Asal',
                            'alamat_sekolah_asal' => 'Alamat Sekolah Asal',
                            'npsn_nsm' => 'NPSN / NSM',
                        ];
                    @endphp

                    @foreach ($fields as $key => $label)
                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">{{ $label }}</p>
                            <p class="font-semibold">{{ ucfirst(strtolower($student->$key)) ?? '-' }}</p>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- DATA WALI (Jika Tinggal dengan Wali) -->
            @if ($student->tinggal_dengan === 'Wali' && $student->guardian)
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800">Data Wali</h3>
                </div>

                <div class="bg-[#31694E]/10 p-6 rounded-xl border border-[#31694E]/30 mb-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Nama Lengkap Wali</p>
                            <p class="font-semibold text-lg capitalize">{{ $student->guardian->nama_wali ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">NIK Wali</p>
                            <p class="font-semibold">{{ $student->guardian->nik_wali ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Tempat, Tanggal Lahir</p>
                            <p class="font-semibold">
                                @if ($student->guardian->tempat_lahir_wali && $student->guardian->tanggal_lahir_wali)
                                    {{ ucfirst(strtolower($student->guardian->tempat_lahir_wali)) }},
                                    {{ \Carbon\Carbon::parse($student->guardian->tanggal_lahir_wali)->format('d F Y') }}
                                @else
                                    -
                                @endif
                            </p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Pendidikan Terakhir</p>
                            <p class="font-semibold">{{ $student->guardian->pendidikan_wali ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Pekerjaan</p>
                            <p class="font-semibold">{{ ucfirst(strtolower($student->guardian->pekerjaan_wali)) ?? '-' }}
                            </p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">Penghasilan per Bulan</p>
                                    <p class="font-semibold">
                                        @if ($student->guardian->penghasilan_wali)
                                            @php
                                                $income = $student->guardian->penghasilan_wali;
                                                $numeric = preg_replace('/[^\d]/', '', $income);

                                                if (is_numeric($numeric) && $numeric > 0) {
                                                    echo 'Rp ' . number_format((float) $numeric, 0, ',', '.');
                                                } else {
                                                    echo '-';
                                                }
                                            @endphp
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">No. HP Wali</p>
                            <p class="font-semibold">{{ $student->guardian->hp_wali ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Alamat Lengkap Wali</p>
                            <p class="font-semibold">{{ ucfirst(strtolower($student->guardian->alamat)) ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Desa/Kelurahan</p>
                            <p class="font-semibold">{{ ucfirst(strtolower($student->guardian->desa)) ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Kecamatan</p>
                            <p class="font-semibold">{{ ucfirst(strtolower($student->guardian->kecamatan)) ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Kabupaten/Kota</p>
                            <p class="font-semibold">{{ ucfirst(strtolower($student->guardian->kabupaten)) ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Provinsi</p>
                            <p class="font-semibold">{{ ucfirst(strtolower($student->guardian->provinsi)) ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4 md:col-span-2">
                            <p class="text-xs text-gray-600">Kode Pos</p>
                            <p class="font-semibold">{{ $student->guardian->kode_pos ?? '-' }}</p>
                        </div>

                    </div>
                </div>
            @endif

            <!-- DATA ORANG TUA -->
            @if ($student->parentInfo)
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800">
                        @if ($student->tinggal_dengan === 'Wali')
                            Data Orang Tua Kandung
                        @else
                            Data Orang Tua
                        @endif
                    </h3>
                </div>

                <div class="bg-[#31694E]/10 p-6 rounded-xl border border-[#31694E]/30 mb-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- AYAH -->
                        <div class="col-span-1 md:col-span-2">
                            <h4 class="font-bold text-lg text-gray-800 mb-4 pb-3 border-b-2 border-[#31694E]/30">Ayah</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">Nama Lengkap</p>
                                    <p class="font-semibold capitalize">{{ $student->parentInfo->nama_ayah ?? '-' }}</p>
                                </div>

                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">NIK</p>
                                    <p class="font-semibold">{{ $student->parentInfo->nik_ayah ?? '-' }}</p>
                                </div>

                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">Tempat, Tanggal Lahir</p>
                                    <p class="font-semibold">
                                        @if ($student->parentInfo->tempat_lahir_ayah && $student->parentInfo->tanggal_lahir_ayah)
                                            {{ ucfirst(strtolower($student->parentInfo->tempat_lahir_ayah)) }},
                                            {{ \Carbon\Carbon::parse($student->parentInfo->tanggal_lahir_ayah)->format('d F Y') }}
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>

                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">Pendidikan Terakhir</p>
                                    <p class="font-semibold">{{ $student->parentInfo->pendidikan_ayah ?? '-' }}</p>
                                </div>

                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">Pekerjaan</p>
                                    <p class="font-semibold">
                                        {{ ucfirst(strtolower($student->parentInfo->pekerjaan_ayah)) ?? '-' }}
                                    </p>
                                </div>

                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">Penghasilan per Bulan</p>
                                    <p class="font-semibold">
                                        @if ($student->parentInfo && $student->parentInfo->penghasilan_ayah)
                                            @php
                                                $income = $student->parentInfo->penghasilan_ayah;
                                                // Hapus semua karakter non-digit
                                                $numeric = preg_replace('/[^\d]/', '', $income);

                                                if (is_numeric($numeric) && $numeric > 0) {
                                                    echo 'Rp ' . number_format((float) $numeric, 0, ',', '.');
                                                } else {
                                                    echo '-';
                                                }
                                            @endphp
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>

                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">Status</p>
                                    <p class="font-semibold">
                                        @if ($student->parentInfo->status_ayah == 'Hidup')
                                            Masih Hidup
                                        @elseif($student->parentInfo->status_ayah == 'Meninggal')
                                            Meninggal Dunia
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>

                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">No. HP</p>
                                    <p class="font-semibold">{{ $student->parentInfo->hp_ayah ?? '-' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- IBU -->
                        <div class="col-span-1 md:col-span-2">
                            <h4 class="font-bold text-lg text-gray-800 mb-4 pb-3 border-b-2 border-[#31694E]/30">Ibu</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">Nama Lengkap</p>
                                    <p class="font-semibold capitalize">{{ $student->parentInfo->nama_ibu ?? '-' }}</p>
                                </div>

                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">NIK</p>
                                    <p class="font-semibold">{{ $student->parentInfo->nik_ibu ?? '-' }}</p>
                                </div>

                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">Tempat, Tanggal Lahir</p>
                                    <p class="font-semibold">
                                        @if ($student->parentInfo->tempat_lahir_ibu && $student->parentInfo->tanggal_lahir_ibu)
                                            {{ ucfirst(strtolower($student->parentInfo->tempat_lahir_ibu)) ?? '-' }},
                                            {{ \Carbon\Carbon::parse($student->parentInfo->tanggal_lahir_ibu)->format('d F Y') }}
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>

                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">Pendidikan Terakhir</p>
                                    <p class="font-semibold">{{ $student->parentInfo->pendidikan_ibu ?? '-' }}</p>
                                </div>

                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">Pekerjaan</p>
                                    <p class="font-semibold">
                                        {{ ucfirst(strtolower($student->parentInfo->pekerjaan_ibu)) ?? '-' }}
                                    </p>
                                </div>

                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">Penghasilan per Bulan</p>
                                    <p class="font-semibold">
                                        @if ($student->parentInfo && $student->parentInfo->penghasilan_ibu)
                                            @php
                                                $income = $student->parentInfo->penghasilan_ibu;
                                                // Hapus semua karakter non-digit
                                                $numeric = preg_replace('/[^\d]/', '', $income);

                                                if (is_numeric($numeric) && $numeric > 0) {
                                                    echo 'Rp ' . number_format((float) $numeric, 0, ',', '.');
                                                } else {
                                                    echo '-';
                                                }
                                            @endphp
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>

                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">Status</p>
                                    <p class="font-semibold">
                                        @if ($student->parentInfo->status_ibu == 'Hidup')
                                            Masih Hidup
                                        @elseif($student->parentInfo->status_ibu == 'Meninggal')
                                            Meninggal Dunia
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>

                                <div class="bg-white rounded-lg p-4">
                                    <p class="text-xs text-gray-600">No. HP</p>
                                    <p class="font-semibold">{{ $student->parentInfo->hp_ibu ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alamat Orang Tua -->
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800">Alamat Orang Tua</h3>
                </div>

                <div class="bg-[#31694E]/10 p-6 rounded-xl border border-[#31694E]/30 mb-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-white rounded-lg p-4 md:col-span-2">
                            <p class="text-xs text-gray-600">Alamat Sesuai KK</p>
                            <p class="font-semibold">{{ ucfirst(strtolower($student->parentInfo->alamat_kk)) ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4 md:col-span-2">
                            <p class="text-xs text-gray-600">Alamat Domisili Saat Ini</p>
                            <p class="font-semibold">{{ ucfirst(strtolower($student->parentInfo->alamat)) ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Desa/Kelurahan</p>
                            <p class="font-semibold">{{ ucfirst(strtolower($student->parentInfo->desa)) ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Kecamatan</p>
                            <p class="font-semibold">{{ ucfirst(strtolower($student->parentInfo->kecamatan)) ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Kabupaten/Kota</p>
                            <p class="font-semibold">{{ ucfirst(strtolower($student->parentInfo->kabupaten)) ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Provinsi</p>
                            <p class="font-semibold">{{ ucfirst(strtolower($student->parentInfo->provinsi)) ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4 md:col-span-2">
                            <p class="text-xs text-gray-600">Kode Pos</p>
                            <p class="font-semibold">{{ $student->parentInfo->kode_pos ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- DOCUMENT SECTION -->
            @if ($student->documents)
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 3h8l4 4v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z" />
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800">Dokumen</h3>
                </div>

                <div class="bg-[#31694E]/10 p-6 rounded-xl border border-[#31694E]/30 mb-10">

                    <!-- Dokumen Umum -->
                    <h4 class="font-semibold mb-3">Dokumen Umum</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        @php
                            $docsUmum = [
                                'kk' => 'Kartu Keluarga',
                                'akte' => 'Akte Kelahiran',
                                'ktp_ayah' => 'KTP Ayah',
                                'ktp_ibu' => 'KTP Ibu',
                                'surat_aktif' => 'Surat Aktif',
                                'prestasi' => 'Sertifikat Prestasi',
                                'kip_pkh' => 'KIP/PKH',
                                'foto_anak' => 'Foto Anak',
                            ];
                        @endphp

                        @foreach ($docsUmum as $key => $label)
                            <div class="bg-white rounded-xl p-4">
                                <p class="text-xs text-gray-500 mb-2">{{ $label }}</p>
                                @if ($student->documents->$key)
                                    <button
                                        onclick="openModal('{{ asset('storage/' . $student->documents->$key) }}', '{{ $label }}')"
                                        class="text-blue-600 font-semibold hover:text-blue-700 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat Dokumen
                                    </button>
                                @else
                                    <p class="text-gray-600 text-sm">Tidak ada dokumen</p>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <!-- Transkrip Nilai Per Semester (Jika Ada) -->
                    @if (
                        $student->documents->transkrip_semester &&
                            is_array($student->documents->transkrip_semester) &&
                            count($student->documents->transkrip_semester) > 0)
                        <h4 class="font-semibold mb-3 mt-6">Transkrip Nilai Per Semester</h4>
                        <div class="bg-orange-50 border-l-4 border-orange-500 p-4 rounded-lg mb-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-orange-500 mr-2 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-sm text-orange-800">
                                    Total <strong>{{ count($student->documents->transkrip_semester) }}
                                        semester</strong> transkrip nilai telah diupload
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach ($student->documents->transkrip_semester as $semesterKey => $path)
                                @php
                                    // Extract semester number from key (semester_1, semester_2, etc.)
                                    $semesterNumber = str_replace('semester_', '', $semesterKey);
                                @endphp
                                <div class="bg-white rounded-xl p-4 border border-gray-200">
                                    <p class="text-xs text-gray-500 mb-2">Semester {{ $semesterNumber }}</p>
                                    <button
                                        onclick="openModal('{{ asset('storage/' . $path) }}', 'Transkrip Nilai Semester {{ $semesterNumber }}')"
                                        class="text-blue-600 font-semibold hover:text-blue-700 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat Dokumen
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-gray-50 border-l-4 border-gray-400 p-4 rounded-lg mt-6">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-gray-500 mr-2 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-sm text-gray-700">
                                    Tidak ada transkrip nilai yang diupload. (Mungkin jenjang SD atau belum upload)
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            @endif

            <!-- MODAL -->
            <div id="docModal" class="fixed inset-0 hidden items-center justify-center z-50">
                <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm" onclick="closeModal()">
                </div>
                <div
                    class="relative bg-white rounded-2xl shadow-2xl overflow-hidden max-w-3xl w-[90%] max-h-[90%] flex flex-col">
                    <button onclick="closeModal()"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 font-bold text-2xl z-10">&times;</button>
                    <div class="p-4 border-b border-gray-200">
                        <h3 id="modalTitle" class="text-lg font-semibold text-gray-800"></h3>
                    </div>
                    <div class="flex-1 overflow-auto p-4 flex justify-center items-center">
                        <img id="modalImage" src="" class="max-h-[80vh] object-contain rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================== MODAL EDIT ================== -->
    <div id="editModal" class="fixed inset-0 hidden items-center justify-center z-50 p-4">
        <div class="absolute inset-0 bg-gradient-to-br from-black/60 to-black/40 backdrop-blur-md"
            onclick="closeEditModal()"></div>

        <div
            class="relative bg-white rounded-3xl shadow-2xl w-full max-w-6xl max-h-[90vh] overflow-hidden animate-slideUp">
            <!-- HEADER STICKY -->
            <div class="sticky top-0 bg-[#31694E] p-6 z-10 shadow-lg">
                <div class="flex items-center justify-between text-white">
                    <div>
                        <h3 class="text-2xl font-bold flex items-center gap-3">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit Data Biodata
                        </h3>
                        <p class="text-sm text-green-100 mt-2">Perbarui informasi data siswa dengan mudah</p>
                    </div>
                    <button onclick="closeEditModal()"
                        class="hover:bg-white/20 p-2 rounded-full transition-all duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- FORM CONTENT -->
            <form action="{{ route('biodata.update', ['id' => $student->id]) }}" method="POST"
                class="overflow-y-auto max-h-[calc(90vh-180px)]">
                @csrf
                @method('PUT')

                <div class="p-8 space-y-8">
                    <!-- DATA SISWA -->
                    <div
                        class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border-2 border-green-100 shadow-sm">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="p-3 bg-[#31694E] rounded-xl">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-800">Data Siswa</h4>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Lengkap -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    Nama Lengkap
                                </label>
                                <input type="text" name="nama" value="{{ $student->nama }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">
                            </div>

                            <!-- NISN -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    NISN
                                </label>
                                <input type="text" name="nisn" value="{{ $student->nisn }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    Jenis Kelamin
                                </label>
                                <select name="jenis_kelamin"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">
                                    <option value="L" {{ $student->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="P" {{ $student->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>

                            <!-- Agama -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    Agama
                                </label>
                                <input type="text" name="agama" value="{{ $student->agama }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">
                            </div>

                            <!-- NIK -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    NIK
                                </label>
                                <input type="text" name="nik" value="{{ $student->nik }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">
                            </div>

                            <!-- Nomor KK -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    Nomor KK
                                </label>
                                <input type="text" name="no_kk" value="{{ $student->no_kk }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">
                            </div>

                            <!-- Tempat Lahir -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    Tempat Lahir
                                </label>
                                <input type="text" name="tempat_lahir" value="{{ $student->tempat_lahir }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    Tanggal Lahir
                                </label>
                                <input type="date" name="tanggal_lahir" value="{{ $student->tanggal_lahir }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">
                            </div>

                            <!-- Hobi -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    Hobi
                                </label>
                                <input type="text" name="hobi" value="{{ $student->hobi }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">
                            </div>

                            <!-- Cita-Cita -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    Cita-Cita
                                </label>
                                <input type="text" name="cita_cita" value="{{ $student->cita_cita }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">
                            </div>

                            <!-- Anak Ke -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    Anak Ke
                                </label>
                                <input type="number" name="anak_ke" value="{{ $student->anak_ke }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">
                            </div>

                            <!-- Jumlah Saudara -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    Jumlah Saudara
                                </label>
                                <input type="number" name="jumlah_saudara" value="{{ $student->jumlah_saudara }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">
                            </div>

                            <!-- Rencana Tempat Tinggal -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    Rencana Tempat Tinggal
                                </label>
                                <input type="text" name="rencana_tinggal" value="{{ $student->rencana_tinggal }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">
                            </div>

                            <!-- Jarak Tempat Tinggal -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    Jarak Tempat Tinggal
                                </label>
                                <input type="text" name="jarak_tempat_tinggal"
                                    value="{{ $student->jarak_tempat_tinggal }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">
                            </div>

                            <!-- Sekolah Asal -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    Sekolah Asal
                                </label>
                                <input type="text" name="sekolah_asal" value="{{ $student->sekolah_asal }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">
                            </div>

                            <!-- NPSN/NSM -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    NPSN/NSM
                                </label>
                                <input type="text" name="npsn_nsm" value="{{ $student->npsn_nsm }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">
                            </div>

                            <!-- Alamat Sekolah Asal -->
                            <div class="md:col-span-2 group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                    Alamat Sekolah Asal
                                </label>
                                <textarea name="alamat_sekolah_asal" rows="3"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 hover:border-green-300">{{ $student->alamat_sekolah_asal }}</textarea>
                            </div>
                        </div>
                    </div>

                    @if ($student->parentInfo)
                        <!-- DATA ORANG TUA -->
                        <div
                            class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-6 border-2 border-blue-100 shadow-sm">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="p-3 bg-blue-600 rounded-xl">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </div>
                                <h4 class="text-2xl font-bold text-gray-800">Data Orang Tua</h4>
                            </div>

                            <!-- Data Ayah & Ibu dalam Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                <!-- KOLOM AYAH -->
                                <div class="space-y-4">
                                    <div class="flex items-center gap-2 mb-4 pb-2 border-b-2 border-blue-200">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        <h5 class="font-bold text-lg text-blue-800">Data Ayah</h5>
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Ayah</label>
                                        <input type="text" name="nama_ayah"
                                            value="{{ $student->parentInfo->nama_ayah }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-300">
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">NIK Ayah</label>
                                        <input type="text" name="nik_ayah"
                                            value="{{ $student->parentInfo->nik_ayah }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-300">
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tempat
                                            Lahir</label>
                                        <input type="text" name="tempat_lahir_ayah"
                                            value="{{ $student->parentInfo->tempat_lahir_ayah }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-300">
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal
                                            Lahir</label>
                                        <input type="date" name="tanggal_lahir_ayah"
                                            value="{{ $student->parentInfo->tanggal_lahir_ayah }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-300">
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan</label>
                                        <input type="text" name="pendidikan_ayah"
                                            value="{{ $student->parentInfo->pendidikan_ayah }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-300">
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pekerjaan</label>
                                        <input type="text" name="pekerjaan_ayah"
                                            value="{{ $student->parentInfo->pekerjaan_ayah }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-300">
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Penghasilan</label>
                                        <input type="text" name="penghasilan_ayah"
                                            value="{{ $student->parentInfo->penghasilan_ayah }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-300">
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                                        <input type="text" name="status_ayah"
                                            value="{{ $student->parentInfo->status_ayah }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-300">
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">No HP</label>
                                        <input type="text" name="hp_ayah" value="{{ $student->parentInfo->hp_ayah }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-300">
                                    </div>
                                </div>

                                <!-- KOLOM IBU -->
                                <div class="space-y-4">
                                    <div class="flex items-center gap-2 mb-4 pb-2 border-b-2 border-pink-200">
                                        <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        <h5 class="font-bold text-lg text-pink-800">Data Ibu</h5>
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Ibu</label>
                                        <input type="text" name="nama_ibu"
                                            value="{{ $student->parentInfo->nama_ibu }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all hover:border-pink-300">
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">NIK Ibu</label>
                                        <input type="text" name="nik_ibu" value="{{ $student->parentInfo->nik_ibu }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all hover:border-pink-300">
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tempat
                                            Lahir</label>
                                        <input type="text" name="tempat_lahir_ibu"
                                            value="{{ $student->parentInfo->tempat_lahir_ibu }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all hover:border-pink-300">
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal
                                            Lahir</label>
                                        <input type="date" name="tanggal_lahir_ibu"
                                            value="{{ $student->parentInfo->tanggal_lahir_ibu }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all hover:border-pink-300">
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan</label>
                                        <input type="text" name="pendidikan_ibu"
                                            value="{{ $student->parentInfo->pendidikan_ibu }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all hover:border-pink-300">
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pekerjaan</label>
                                        <input type="text" name="pekerjaan_ibu"
                                            value="{{ $student->parentInfo->pekerjaan_ibu }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all hover:border-pink-300">
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Penghasilan</label>
                                        <input type="text" name="penghasilan_ibu"
                                            value="{{ $student->parentInfo->penghasilan_ibu }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all hover:border-pink-300">
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                                        <input type="text" name="status_ibu"
                                            value="{{ $student->parentInfo->status_ibu }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all hover:border-pink-300">
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">No HP</label>
                                        <input type="text" name="hp_ibu" value="{{ $student->parentInfo->hp_ibu }}"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all hover:border-pink-300">
                                    </div>
                                </div>
                            </div>

                            <!-- ALAMAT ORANG TUA -->
                            <div class="mt-8 bg-white/60 backdrop-blur-sm rounded-xl p-6 border-2 border-blue-200">
                                <div class="flex items-center gap-2 mb-4">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                        </path>
                                    </svg>
                                    <h5 class="font-bold text-lg text-gray-800">Alamat Orang Tua</h5>
                                </div>

                                <div class="space-y-4">
                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Sesuai
                                            KK</label>
                                        <textarea name="alamat_kk" rows="2"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-300">{{ $student->parentInfo->alamat_kk }}</textarea>
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat
                                            Domisili</label>
                                        <textarea name="alamat_ortu" rows="2"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-300">{{ $student->parentInfo->alamat }}</textarea>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="group">
                                            <label
                                                class="block text-sm font-semibold text-gray-700 mb-2">Desa/Kelurahan</label>
                                            <input type="text" name="desa_ortu"
                                                value="{{ $student->parentInfo->desa }}"
                                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-300">
                                        </div>

                                        <div class="group">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kecamatan</label>
                                            <input type="text" name="kecamatan_ortu"
                                                value="{{ $student->parentInfo->kecamatan }}"
                                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-300">
                                        </div>

                                        <div class="group">
                                            <label
                                                class="block text-sm font-semibold text-gray-700 mb-2">Kabupaten/Kota</label>
                                            <input type="text" name="kabupaten_ortu"
                                                value="{{ $student->parentInfo->kabupaten }}"
                                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-300">
                                        </div>

                                        <div class="group">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Provinsi</label>
                                            <input type="text" name="provinsi_ortu"
                                                value="{{ $student->parentInfo->provinsi }}"
                                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-300">
                                        </div>

                                        <div class="group md:col-span-2">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kode
                                                Pos</label>
                                            <input type="text" name="kode_pos_ortu"
                                                value="{{ $student->parentInfo->kode_pos }}"
                                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all hover:border-blue-300">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- DATA WALI -->
                    @if ($student->tinggal_dengan === 'Wali' && $student->guardian)
                        <div
                            class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 border-2 border-purple-100 shadow-sm">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="p-3 bg-purple-600 rounded-xl">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                                <h4 class="text-2xl font-bold text-gray-800">Data Wali</h4>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Nama Wali
                                    </label>
                                    <input type="text" name="nama_wali" value="{{ $student->guardian->nama_wali }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        NIK Wali
                                    </label>
                                    <input type="text" name="nik_wali" value="{{ $student->guardian->nik_wali }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Tempat Lahir
                                    </label>
                                    <input type="text" name="tempat_lahir_wali"
                                        value="{{ $student->guardian->tempat_lahir_wali }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Tanggal Lahir
                                    </label>
                                    <input type="date" name="tanggal_lahir_wali"
                                        value="{{ $student->guardian->tanggal_lahir_wali }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Pendidikan
                                    </label>
                                    <input type="text" name="pendidikan_wali"
                                        value="{{ $student->guardian->pendidikan_wali }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Pekerjaan
                                    </label>
                                    <input type="text" name="pekerjaan_wali"
                                        value="{{ $student->guardian->pekerjaan_wali }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Penghasilan
                                    </label>
                                    <input type="text" name="penghasilan_wali"
                                        value="{{ $student->guardian->penghasilan_wali }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        No HP
                                    </label>
                                    <input type="text" name="hp_wali" value="{{ $student->guardian->hp_wali }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group md:col-span-2">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Alamat
                                    </label>
                                    <input type="text" name="alamat_wali" value="{{ $student->guardian->alamat }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Desa
                                    </label>
                                    <input type="text" name="desa_wali" value="{{ $student->guardian->desa }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Kecamatan
                                    </label>
                                    <input type="text" name="kecamatan_wali"
                                        value="{{ $student->guardian->kecamatan }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Kabupaten
                                    </label>
                                    <input type="text" name="kabupaten_wali"
                                        value="{{ $student->guardian->kabupaten }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Provinsi
                                    </label>
                                    <input type="text" name="provinsi_wali"
                                        value="{{ $student->guardian->provinsi }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Kode Pos
                                    </label>
                                    <input type="text" name="kode_pos_wali"
                                        value="{{ $student->guardian->kode_pos }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- FOOTER STICKY -->
                <div class="sticky bottom-0 bg-white border-t-2 border-gray-200 p-6 shadow-2xl">
                    <div class="flex justify-end gap-4">
                        <button type="button" onclick="closeEditModal()"
                            class="px-8 py-3 bg-red-600 text-white font-semibold rounded-xl hover:bg-gray-200 transition-all duration-200 flex items-center gap-2 shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </button>
                        <button type="submit"
                            class="px-8 py-3 bg-[#31694E] text-white font-semibold rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-200 flex items-center gap-2 shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT DOKUMEN -->
    <!-- MODAL EDIT DOKUMEN - FIXED INPUT FILE -->
    <div id="editDokumenModal" class="fixed inset-0 hidden items-center justify-center z-50 p-4">
        <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm" onclick="closeEditDokumenModal()"></div>
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-6xl max-h-[90vh] overflow-hidden flex flex-col">
            <!-- Header -->
            <div class="flex-shrink-0 bg-[#31694E] p-6 z-10 shadow-lg">
                <div class="flex items-center justify-between text-white">
                    <div>
                        <h3 class="text-2xl font-bold flex items-center gap-3">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit Dokumen
                        </h3>
                        <p class="text-sm text-green-100 mt-2">Upload file baru untuk mengganti dokumen yang ada (Maksimal
                            1MB per file)</p>
                    </div>
                    <button type="button" onclick="closeEditDokumenModal()"
                        class="hover:bg-white/20 p-2 rounded-full transition-all duration-200 flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Form Content -->
            <form id="editDokumenForm" action="{{ route('biodata.update.dokumen', ['id' => $student->id]) }}" method="POST"
                enctype="multipart/form-data" class="flex-1 overflow-y-auto p-6">
                @csrf
                @method('PUT')

                <!-- Info Box -->
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg mb-6">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-blue-900 text-sm mb-1">Informasi Penting:</h4>
                            <ul class="text-xs text-blue-800 space-y-1 list-disc list-inside">
                                <li>Ukuran maksimal per file adalah <strong>1MB</strong></li>
                                <li>Format file: PDF, JPG, atau PNG</li>
                                <li>Jika file terlalu besar, <a href="https://www.iloveimg.com/compress-image"
                                        target="_blank" class="font-semibold underline hover:text-blue-900">compress di
                                        sini</a></li>
                                <li>Hanya upload file yang ingin Anda ganti (file lain akan tetap sama)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- DOKUMEN UMUM -->
                <div class="mb-8">
                    <h4 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-green-200">Dokumen Umum</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Kartu Keluarga -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Kartu Keluarga (KK)
                                @if ($student->documents && $student->documents->kk)
                                    <span class="text-green-600 text-xs font-semibold">✓ Sudah ada</span>
                                @endif
                            </label>
                            <input type="file" name="kk" id="edit_kk" accept=".pdf,.jpg,.jpeg,.png"
                                onchange="validateEditFile(this)" class="hidden">
                            <label for="edit_kk" class="file-input-label-edit cursor-pointer">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <span class="file-name-edit text-gray-500">Pilih file PDF, JPG, atau PNG</span>
                            </label>
                            @if ($student->documents && $student->documents->kk)
                                <button type="button"
                                    onclick="viewDocument('{{ Storage::url($student->documents->kk) }}', 'Kartu Keluarga')"
                                    class="text-xs text-blue-600 hover:underline mt-2 inline-block font-medium">👁️ Lihat
                                    dokumen saat ini</button>
                            @endif
                        </div>

                        <!-- Akta Kelahiran -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Akta Kelahiran
                                @if ($student->documents && $student->documents->akte)
                                    <span class="text-green-600 text-xs font-semibold">✓ Sudah ada</span>
                                @endif
                            </label>
                            <input type="file" name="akte" id="edit_akte" accept=".pdf,.jpg,.jpeg,.png"
                                onchange="validateEditFile(this)" class="hidden">
                            <label for="edit_akte" class="file-input-label-edit cursor-pointer">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <span class="file-name-edit text-gray-500">Pilih file PDF, JPG, atau PNG</span>
                            </label>
                            @if ($student->documents && $student->documents->akte)
                                <button type="button"
                                    onclick="viewDocument('{{ Storage::url($student->documents->akte) }}', 'Akta Kelahiran')"
                                    class="text-xs text-blue-600 hover:underline mt-2 inline-block font-medium">👁️ Lihat
                                    dokumen saat ini</button>
                            @endif
                        </div>

                        <!-- KTP Ayah -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                KTP Ayah
                                @if ($student->documents && $student->documents->ktp_ayah)
                                    <span class="text-green-600 text-xs font-semibold">✓ Sudah ada</span>
                                @endif
                            </label>
                            <input type="file" name="ktp_ayah" id="edit_ktp_ayah" accept=".pdf,.jpg,.jpeg,.png"
                                onchange="validateEditFile(this)" class="hidden">
                            <label for="edit_ktp_ayah" class="file-input-label-edit cursor-pointer">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <span class="file-name-edit text-gray-500">Pilih file PDF, JPG, atau PNG</span>
                            </label>
                            @if ($student->documents && $student->documents->ktp_ayah)
                                <button type="button"
                                    onclick="viewDocument('{{ Storage::url($student->documents->ktp_ayah) }}', 'KTP Ayah')"
                                    class="text-xs text-blue-600 hover:underline mt-2 inline-block font-medium">👁️ Lihat
                                    dokumen saat ini</button>
                            @endif
                        </div>

                        <!-- KTP Ibu -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                KTP Ibu
                                @if ($student->documents && $student->documents->ktp_ibu)
                                    <span class="text-green-600 text-xs font-semibold">✓ Sudah ada</span>
                                @endif
                            </label>
                            <input type="file" name="ktp_ibu" id="edit_ktp_ibu" accept=".pdf,.jpg,.jpeg,.png"
                                onchange="validateEditFile(this)" class="hidden">
                            <label for="edit_ktp_ibu" class="file-input-label-edit cursor-pointer">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <span class="file-name-edit text-gray-500">Pilih file PDF, JPG, atau PNG</span>
                            </label>
                            @if ($student->documents && $student->documents->ktp_ibu)
                                <button type="button"
                                    onclick="viewDocument('{{ Storage::url($student->documents->ktp_ibu) }}', 'KTP Ibu')"
                                    class="text-xs text-blue-600 hover:underline mt-2 inline-block font-medium">👁️ Lihat
                                    dokumen saat ini</button>
                            @endif
                        </div>

                        <!-- Surat Aktif Sekolah -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Surat Keterangan Aktif Sekolah
                                @if ($student->documents && $student->documents->surat_aktif)
                                    <span class="text-green-600 text-xs font-semibold">✓ Sudah ada</span>
                                @endif
                            </label>
                            <input type="file" name="surat_aktif" id="edit_surat_aktif" accept=".pdf,.jpg,.jpeg,.png"
                                onchange="validateEditFile(this)" class="hidden">
                            <label for="edit_surat_aktif" class="file-input-label-edit cursor-pointer">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <span class="file-name-edit text-gray-500">Pilih file PDF, JPG, atau PNG</span>
                            </label>
                            @if ($student->documents && $student->documents->surat_aktif)
                                <button type="button"
                                    onclick="viewDocument('{{ Storage::url($student->documents->surat_aktif) }}', 'Surat Keterangan Aktif')"
                                    class="text-xs text-blue-600 hover:underline mt-2 inline-block font-medium">👁️ Lihat
                                    dokumen saat ini</button>
                            @endif
                        </div>

                        <!-- Foto Anak -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Foto Anak (3x4)
                                @if ($student->documents && $student->documents->foto_anak)
                                    <span class="text-green-600 text-xs font-semibold">✓ Sudah ada</span>
                                @endif
                            </label>
                            <input type="file" name="foto_anak" id="edit_foto_anak" accept=".jpg,.jpeg,.png"
                                onchange="validateEditFile(this)" class="hidden">
                            <label for="edit_foto_anak" class="file-input-label-edit cursor-pointer">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span class="file-name-edit text-gray-500">Pilih file JPG atau PNG</span>
                            </label>
                            @if ($student->documents && $student->documents->foto_anak)
                                <button type="button"
                                    onclick="viewDocument('{{ Storage::url($student->documents->foto_anak) }}', 'Foto Anak')"
                                    class="text-xs text-blue-600 hover:underline mt-2 inline-block font-medium">👁️ Lihat
                                    dokumen saat ini</button>
                            @endif
                        </div>

                        <!-- Prestasi (Opsional) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Sertifikat Prestasi (Opsional)
                                @if ($student->documents && $student->documents->prestasi)
                                    <span class="text-green-600 text-xs font-semibold">✓ Sudah ada</span>
                                @endif
                            </label>
                            <input type="file" name="prestasi" id="edit_prestasi" accept=".pdf,.jpg,.jpeg,.png"
                                onchange="validateEditFile(this)" class="hidden">
                            <label for="edit_prestasi" class="file-input-label-edit cursor-pointer">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <span class="file-name-edit text-gray-500">Pilih file PDF, JPG, atau PNG</span>
                            </label>
                            @if ($student->documents && $student->documents->prestasi)
                                <button type="button"
                                    onclick="viewDocument('{{ Storage::url($student->documents->prestasi) }}', 'Sertifikat Prestasi')"
                                    class="text-xs text-blue-600 hover:underline mt-2 inline-block font-medium">👁️ Lihat
                                    dokumen saat ini</button>
                            @endif
                        </div>

                        <!-- KIP/PKH (Opsional) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Kartu KIP/PKH (Opsional)
                                @if ($student->documents && $student->documents->kip_pkh)
                                    <span class="text-green-600 text-xs font-semibold">✓ Sudah ada</span>
                                @endif
                            </label>
                            <input type="file" name="kip_pkh" id="edit_kip_pkh" accept=".pdf,.jpg,.jpeg,.png"
                                onchange="validateEditFile(this)" class="hidden">
                            <label for="edit_kip_pkh" class="file-input-label-edit cursor-pointer">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <span class="file-name-edit text-gray-500">Pilih file PDF, JPG, atau PNG</span>
                            </label>
                            @if ($student->documents && $student->documents->kip_pkh)
                                <button type="button"
                                    onclick="viewDocument('{{ Storage::url($student->documents->kip_pkh) }}', 'Kartu KIP/PKH')"
                                    class="text-xs text-blue-600 hover:underline mt-2 inline-block font-medium">👁️ Lihat
                                    dokumen saat ini</button>
                            @endif
                        </div>

                    </div>
                </div>

                <!-- TRANSKRIP NILAI (Untuk SMP & SMA) -->
                @if ($student->jenjang === 'SMP' || $student->jenjang === 'SMA')
                    <div class="mb-8">
                        <h4 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-blue-200">
                            Transkrip Nilai Semester
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @php
                                $maxSemester = $student->jenjang === 'SMP' ? 11 : 5;
                                $transkripData = $student->documents->transkrip_semester ?? [];
                            @endphp

                            @for ($i = 1; $i <= $maxSemester; $i++)
                                <div
                                    class="bg-gradient-to-br from-blue-50 to-cyan-50 p-4 rounded-lg border border-blue-100">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Semester {{ $i }}
                                        @if (isset($transkripData["semester_{$i}"]))
                                            <span class="text-green-600 text-xs font-semibold">✓ Ada</span>
                                        @endif
                                    </label>
                                    <input type="file" name="transkrip_semester_{{ $i }}"
                                        id="edit_transkrip_{{ $i }}" accept=".pdf,.jpg,.jpeg,.png"
                                        onchange="validateEditFile(this)" class="hidden">
                                    <label for="edit_transkrip_{{ $i }}"
                                        class="file-input-label-edit !text-sm cursor-pointer">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <span class="file-name-edit text-gray-500 text-xs">Pilih file</span>
                                    </label>
                                    @if (isset($transkripData["semester_{$i}"]))
                                        <button type="button"
                                            onclick="viewDocument('{{ Storage::url($transkripData["semester_{$i}"]) }}', 'Transkrip Semester {{ $i }}')"
                                            class="text-xs text-blue-600 hover:underline mt-2 inline-block font-medium">👁️
                                            Lihat</button>
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                @endif
            </form>

            <!-- Footer Buttons -->
            <div class="flex-shrink-0 bg-white border-t border-gray-200 p-6 flex justify-end gap-4">
                <button type="button" onclick="closeEditDokumenModal()"
                    class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors">
                    Batal
                </button>
                <button type="button" onclick="document.getElementById('editDokumenForm').submit()"
                    class="px-6 py-3 bg-[#31694E] hover:bg-[#2a5a42] text-white rounded-lg font-medium transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL PREVIEW DOKUMEN -->
    <div id="documentPreviewModal" class="fixed inset-0 hidden items-center justify-center z-[60]">
        <div class="absolute inset-0 bg-black bg-opacity-70 backdrop-blur-sm" onclick="closeDocumentPreview()"></div>
        <div class="relative bg-white rounded-2xl shadow-2xl w-[95%] max-w-5xl max-h-[90vh] overflow-hidden">
            <div
                class="sticky top-0 bg-white p-4 border-b border-gray-200 rounded-t-2xl z-10 flex items-center justify-between">
                <h3 id="documentTitle" class="text-xl font-bold text-gray-800"></h3>
                <button onclick="closeDocumentPreview()" class="text-gray-500 hover:text-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="p-6 overflow-auto max-h-[calc(90vh-80px)]" id="documentContent">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="text-center py-8 text-gray-600 text-sm">
        <p>© 2024 Sistem Informasi Pendaftaran Siswa</p>
        <p class="mt-1">Terima kasih atas kepercayaan Anda</p>
    </div>
@endsection

@push('scripts')
    <script>
        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        function openEditModal() {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        // Validasi file untuk Edit Dokumen dengan limit 1MB
        function validateEditFile(input) {
            const label = input.nextElementSibling;
            const fileNameSpan = label.querySelector('.file-name-edit');
            const maxSizeMB = 1;
            const maxSizeBytes = maxSizeMB * 1024 * 1024;

            if (input.files && input.files[0]) {
                const fileName = input.files[0].name;
                const fileSize = (input.files[0].size / 1024 / 1024).toFixed(2);

                // Cek ukuran file
                if (input.files[0].size > maxSizeBytes) {
                    // Tampilkan error message dengan link compress
                    const errorDiv = document.createElement('div');
                    errorDiv.className =
                        'bg-red-50 border-l-4 border-red-500 p-4 rounded-lg mt-3 flex items-start gap-3 error-message-edit';
                    errorDiv.innerHTML = `
                <svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4v2m0 0v2m0-2h2m-2 0h-2m8-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div class="flex-1">
                    <p class="text-red-800 font-semibold text-sm">Ukuran file terlalu besar!</p>
                    <p class="text-red-700 text-xs mt-1">File "${fileName}" (${fileSize} MB) melebihi batas maksimal ${maxSizeMB}MB.</p>
                    <p class="text-red-700 text-xs mt-2">Silakan compress file Anda terlebih dahulu: <a href="https://www.iloveimg.com/compress-image" target="_blank" class="underline font-semibold hover:text-red-900">Compress Image di sini</a></p>
                </div>
            `;

                    // Hapus error sebelumnya jika ada
                    const oldError = label.parentElement.querySelector('.error-message-edit');
                    if (oldError) oldError.remove();

                    label.parentElement.appendChild(errorDiv);

                    // Reset input dan label
                    input.value = '';
                    fileNameSpan.textContent = 'Pilih file';
                    fileNameSpan.classList.add('placeholder');
                    label.classList.remove('has-file');
                } else {
                    // File valid - hapus error jika ada
                    const oldError = label.parentElement.querySelector('.error-message-edit');
                    if (oldError) oldError.remove();

                    fileNameSpan.textContent = fileName + ' (' + fileSize + ' MB)';
                    fileNameSpan.classList.remove('placeholder');
                    label.classList.add('has-file');
                }
            } else {
                // Hapus error jika user membatalkan pemilihan file
                const oldError = label.parentElement.querySelector('.error-message-edit');
                if (oldError) oldError.remove();

                fileNameSpan.textContent = 'Pilih file';
                fileNameSpan.classList.add('placeholder');
                label.classList.remove('has-file');
            }
        }

        // Fungsi modal yang sudah ada
        function closeEditDokumenModal() {
            document.getElementById('editDokumenModal').classList.add('hidden');
            document.getElementById('editDokumenModal').classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        function openEditDokumenModal() {
            document.getElementById('editDokumenModal').classList.remove('hidden');
            document.getElementById('editDokumenModal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function viewDocument(url, title) {
            const modal = document.getElementById('documentPreviewModal');
            const titleElement = document.getElementById('documentTitle');
            const contentElement = document.getElementById('documentContent');

            titleElement.textContent = title;

            // Check file extension
            const extension = url.split('.').pop().toLowerCase();

            if (['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(extension)) {
                // Display image
                contentElement.innerHTML = `
            <div class="flex justify-center items-center">
                <img src="${url}" alt="${title}" class="max-w-full h-auto rounded-lg shadow-lg">
            </div>
        `;
            } else if (extension === 'pdf') {
                // Display PDF
                contentElement.innerHTML = `
            <iframe src="${url}" class="w-full h-[70vh] rounded-lg shadow-lg" frameborder="0"></iframe>
        `;
            } else {
                // Unsupported format
                contentElement.innerHTML = `
            <div class="text-center py-8">
                <p class="text-gray-600 mb-4">Format file tidak dapat ditampilkan di preview.</p>
                <a href="${url}" target="_blank" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Download File
                </a>
            </div>
        `;
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDocumentPreview() {
            const modal = document.getElementById('documentPreviewModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function openEditModal() {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
        }

        function openModal(src, title) {
            document.getElementById('docModal').classList.remove('hidden');
            document.getElementById('docModal').classList.add('flex');
            document.getElementById('modalImage').src = src;
            document.getElementById('modalTitle').textContent = title;
        }

        function closeModal() {
            document.getElementById('docModal').classList.add('hidden');
            document.getElementById('docModal').classList.remove('flex');
        }

        function openModal(src, title = '') {
            const modal = document.getElementById('docModal');
            const img = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');

            img.src = src;
            modalTitle.textContent = title;

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            // Auto scroll ke modal
            modal.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }

        function closeModal() {
            const modal = document.getElementById('docModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>
@endpush
