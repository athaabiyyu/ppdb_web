@extends('layouts.app_user', ['noNavbar' => true])

@section('title', 'Formulir Data Pribadi')

@push('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .input-focus:focus {
            outline: none;
            border-color: #2e7d32;
            box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.1);
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

        input:focus,
        select:focus,
        textarea:focus {
            transform: scale(1.01);
            transition: all 0.2s ease;
        }

        .hidden {
            display: none;
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
                    <img src="/assets/logo_yayasan.png" alt="Logo" class="w-16 h-16 md:w-16 md:h-16">
                    <div>
                        <span class="text-xl md:text-xl font-bold block">PPDB Online</span>
                        <span class="text-sm md:text-sm opacity-90">Yayasan Mambaul Maarif Denanyar Jombang</span>
                    </div>
                </div>
                <!-- Progress Info -->
                <div class="hidden md:block flex-shrink-0">
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl px-6 py-3 shadow-inner">
                        <p class="text-sm text-green-100">Langkah 1 dari 4</p>
                        <p class="text-xl md:text-2xl font-bold">Data Siswa</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ================== HEADER ================== -->
    <div class="max-w-5xl mx-auto px-4 relative z-10 py-16">
        <div class="flex items-center gap-3 mb-3">
            <div class="h-10 w-1 bg-gradient-to-b from-[#31694E] to-[#4a9b6f] rounded-full"></div>
            <h1 class="text-4xl font-bold text-[#31694E]">Formulir Data Siswa</h1>
        </div>
        <p class="text-gray-600 ml-4">Mohon lengkapi formulir berikut dengan informasi yang akurat</p>
    </div>

    <!-- ================== MAIN CONTENT ================== -->
    <div class="max-w-5xl mx-auto px-4 py-2">
        <!-- Progress Indikator -->
        <div class="mb-8">
            <div class="flex justify-between items-center max-w-3xl mx-auto">
                <div class="flex flex-col items-center relative z-10">
                    <div
                        class="w-12 h-12 rounded-full gradient-bg text-white flex items-center justify-center font-bold shadow-lg">
                        1</div>
                    <span class="text-xs mt-2 font-medium text-gray-700">Data Pribadi</span>
                </div>
                <div class="flex-1 h-1 bg-gray-200 mx-2"></div>
                <div class="flex flex-col items-center">
                    <div
                        class="w-12 h-12 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold">
                        2</div>
                    <span class="text-xs mt-2 text-gray-500">Data Orang Tua</span>
                </div>
                <div class="flex-1 h-1 bg-gray-200 mx-2"></div>
                <div class="flex flex-col items-center">
                    <div
                        class="w-12 h-12 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold">
                        3</div>
                    <span class="text-xs mt-2 text-gray-500">Upload Dokumen</span>
                </div>
                <div class="flex-1 h-1 bg-gray-200 mx-2"></div>
                <div class="flex flex-col items-center">
                    <div
                        class="w-12 h-12 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold">
                        4</div>
                    <span class="text-xs mt-2 text-gray-500">Selesai</span>
                </div>
            </div>
        </div>

        <!-- Formulir -->
        <form action="/form-data-pribadi/store" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $id ?? '' }}">
            <input type="hidden" name="jenjang" value="{{ $jenjang }}">

            <!-- Section 1: Identitas Diri -->
            <div class="section-card bg-white rounded-2xl shadow-lg p-8 mb-6">
                <div class="flex items-center mb-6 pb-4 border-b-2 border-green-100">
                    <div
                        class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center mr-3 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Identitas Diri</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Nama Lengkap -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama" value="{{ old('nama', $nama ?? '') }}"
                            placeholder="Tuliskan nama lengkap sesuai Kartu Keluarga"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- No KK, NIK, NISN dalam 1 baris -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:col-span-2">

                        <!-- No KK -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                No. Kartu Keluarga <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="no_kk" maxlength="16" value="{{ old('no_kk', $no_kk ?? '') }}"
                                placeholder="Tuliskan nomor Kartu Keluarga"
                                class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                            @error('no_kk')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- NIK -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                NIK <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="nik" maxlength="16" value="{{ old('nik', $nik ?? '') }}"
                                placeholder="Tuliskan NIK"
                                class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                            @error('nik')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- NISN -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                NISN <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="nisn" value="{{ old('nisn', $nisn ?? '') }}"
                                placeholder="Tuliskan NISN"
                                class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                            @error('nisn')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <!-- Tempat & Tanggal Lahir -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $tempat_lahir ?? '') }}"
                            placeholder="Contoh: Bali"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('tempat_lahir')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir <span
                                class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $tanggal_lahir ?? '') }}"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('tanggal_lahir')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Jenis Kelamin <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <!-- Custom Arrow -->
                            <span class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>

                            <select name="jenis_kelamin"
                                class="w-full appearance-none px-4 py-3 border-2 border-gray-200 rounded-xl bg-white
                   text-gray-700 pr-12 cursor-pointer transition-all
                   hover:border-gray-300
                   focus:ring-2 focus:ring-green-500 focus:border-green-500">

                                <option value="" disabled selected class="text-gray-400">
                                    Pilih jenis kelamin
                                </option>

                                <option value="L"
                                    {{ old('jenis_kelamin', $jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>

                                <option value="P"
                                    {{ old('jenis_kelamin', $jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>
                                    Perempuan
                                </option>

                            </select>
                        </div>

                        @error('jenis_kelamin')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <!-- Agama -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Agama <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="agama" value="{{ old('agama', $agama ?? '') }}"
                            placeholder="Masukkan agama anda"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('agama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Section 2: Minat & Bakat -->
            <div class="section-card bg-white rounded-2xl shadow-lg p-8 mb-6">
                <div class="flex items-center mb-6 pb-4 border-b-2 border-green-100">
                    <div
                        class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center mr-3 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Minat & Bakat</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                    <!-- Hobi & Cita-cita -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Hobi <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="hobi" value="{{ old('hobi', $hobi ?? '') }}"
                            placeholder="Contoh: Basket"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('hobi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Cita-cita <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="cita_cita" value="{{ old('cita_cita', $cita_cita ?? '') }}"
                            placeholder="Contoh: Dokter"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('cita_cita')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Section 3: Keluarga -->
            <div class="section-card bg-white rounded-2xl shadow-lg p-8 mb-6">
                <div class="flex items-center mb-6 pb-4 border-b-2 border-green-100">
                    <div
                        class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center mr-3 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Informasi Keluarga</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Anak ke & Jumlah Saudara (1 baris 2 kolom) -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Anak ke- <span
                                class="text-red-500">*</span></label>
                        <input type="number" name="anak_ke" min="1"
                            value="{{ old('anak_ke', $anak_ke ?? '') }}" placeholder="0"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('anak_ke')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Saudara <span
                                class="text-red-500">*</span></label>
                        <input type="number" name="jumlah_saudara" min="0"
                            value="{{ old('jumlah_saudara', $jumlah_saudara ?? '') }}" placeholder="0"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('jumlah_saudara')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tinggal Dengan -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Tinggal Dengan <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <!-- Custom Arrow -->
                            <span class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>

                            <select name="tinggal_dengan" id="tinggal_dengan"
                                class="w-full appearance-none px-4 py-3 border-2 border-gray-200 rounded-xl bg-white
            text-gray-700 pr-12 cursor-pointer transition-all
            hover:border-gray-300
            focus:ring-2 focus:ring-green-500 focus:border-green-500">

                                <option value="" disabled class="text-gray-400"
                                    {{ old('tinggal_dengan', $tinggal_dengan ?? '') == '' ? 'selected' : '' }}>
                                    Sekarang tinggal dengan
                                </option>

                                <option value="Orang Tua"
                                    {{ old('tinggal_dengan', $tinggal_dengan ?? '') == 'Orang Tua' ? 'selected' : '' }}>
                                    Orang Tua
                                </option>

                                <option value="Wali"
                                    {{ old('tinggal_dengan', $tinggal_dengan ?? '') == 'Wali' ? 'selected' : '' }}>
                                    Wali
                                </option>

                            </select>
                        </div>

                        @error('tinggal_dengan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            <!-- Section WALI (Conditional - Hanya muncul jika pilih Wali) -->
            <div id="section_wali" class="section-card bg-white rounded-2xl shadow-lg p-8 mb-6 hidden">
                <div class="flex items-center mb-6 pb-4 border-b-2 border-blue-100">
                    <div
                        class="w-10 h-10 rounded-lg bg-[#31694E] text-white flex items-center justify-center mr-3 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Data Wali</h2>
                </div>

                <!-- Nama Lengkap, NIK, No HP, Pendidikan Terakhir (1 kolom full width) -->
                <div class="space-y-6 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap Wali <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama_wali" value="{{ old('nama_wali') }}"
                            placeholder="Tuliskan nama lengkap wali"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('nama_wali')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">NIK Wali <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nik_wali" value="{{ old('nik_wali') }}"
                            placeholder="Tuliskan NIK wali" maxlength="16"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('nik_wali')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Pendidikan Terakhir <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <!-- Custom Arrow -->
                            <span class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>

                            <select name="pendidikan_wali"
                                class="w-full appearance-none px-4 py-3 border-2 border-gray-200 rounded-xl bg-white
            text-gray-700 pr-12 cursor-pointer transition-all
            hover:border-gray-300
            focus:ring-2 focus:ring-green-500 focus:border-green-500">

                                <!-- Placeholder -->
                                <option value="" disabled class="text-gray-400"
                                    {{ old('pendidikan_wali') == '' ? 'selected' : '' }}>
                                    Pilih pendidikan terakhir
                                </option>

                                @foreach ($pendidikanOptions as $value => $label)
                                    <option value="{{ $value }}"
                                        {{ old('pendidikan_wali') == $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @error('pendidikan_wali')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Tempat & Tanggal Lahir Wali (1 baris, 2 kolom) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir Wali <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="tempat_lahir_wali" value="{{ old('tempat_lahir_wali') }}"
                            placeholder="Contoh: Surabaya"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('tempat_lahir_wali')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir Wali <span
                                class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_lahir_wali" value="{{ old('tanggal_lahir_wali') }}"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('tanggal_lahir_wali')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Pekerjaan & Penghasilan Wali (1 baris, 2 kolom) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pekerjaan <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="pekerjaan_wali" value="{{ old('pekerjaan_wali') }}"
                            placeholder="Contoh: Wiraswasta"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('pekerjaan_wali')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Penghasilan per Bulan <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="penghasilan_wali" value="{{ old('penghasilan_wali') }}"
                            placeholder="Contoh: Rp 5.000.000"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('penghasilan_wali')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">No. HP Wali <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="hp_wali" value="{{ old('hp_wali') }}" placeholder="Contoh: 08123456789"
                        class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    @error('hp_wali')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat Wali-->
                <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-12">Alamat Wali</h2>
                <div class="space-y-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Desa/Kelurahan -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Desa/Kelurahan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="desa_wali" value="{{ old('desa_wali') }}"
                                placeholder="Tuliskan desa/kelurahan"
                                class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                            @error('desa_wali')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kecamatan -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Kecamatan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="kecamatan_wali" value="{{ old('kecamatan_wali') }}"
                                placeholder="Tuliskan kecamatan"
                                class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                            @error('kecamatan_wali')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kabupaten/Kota -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Kabupaten/Kota <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="kabupaten_wali" value="{{ old('kabupaten_wali') }}"
                                placeholder="Tuliskan kabupaten/kota"
                                class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                            @error('kabupaten_wali')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Provinsi -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Provinsi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="provinsi_wali" value="{{ old('provinsi_wali') }}"
                                placeholder="Tuliskan provinsi"
                                class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                            @error('provinsi_wali')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kode Pos <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="kode_pos_wali" value="{{ old('kode_pos_wali') }}"
                            placeholder="5 digit kode pos" maxlength="5"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('kode_pos_wali')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Lengkap <span
                                class="text-red-500">*</span></label>
                        <textarea name="alamat_wali" rows="2" placeholder="Masukkan alamat lengkap wali"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all resize-none">{{ old('alamat_wali') }}</textarea>
                        @error('alamat_wali')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Section 4: Tempat Tinggal -->
            <div class="section-card bg-white rounded-2xl shadow-lg p-8 mb-6">
                <div class="flex items-center mb-6 pb-4 border-b-2 border-green-100">
                    <div
                        class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center mr-3 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Tempat Tinggal</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                    <!-- Rencana Tempat Tinggal -->
                    <div class="relative">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Rencana Tempat Tinggal <span class="text-red-500">*</span>
                        </label>

                        <select name="rencana_tinggal"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-white text-gray-700
               focus:border-green-600 focus:ring-green-600 transition-all appearance-none">
                            <option value="" class="text-gray-400">Pilih rencana tempat tinggal</option>
                            <option value="Asrama"
                                {{ old('rencana_tinggal', $rencana_tinggal ?? '') == 'Asrama' ? 'selected' : '' }}>
                                Asrama
                            </option>
                            <option value="Rumah"
                                {{ old('rencana_tinggal', $rencana_tinggal ?? '') == 'Rumah' ? 'selected' : '' }}>
                                Rumah
                            </option>
                        </select>

                        <!-- Panah Dropdown -->
                        <svg class="w-5 h-5 text-gray-400 absolute right-4 top-11 pointer-events-none" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>

                        @error('rencana_tinggal')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <!-- Jarak ke Sekolah -->
                    <div class="relative">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Jarak ke Sekolah <span class="text-red-500">*</span>
                        </label>

                        <select name="jarak_tempat_tinggal"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-white text-gray-700
               focus:border-green-600 focus:ring-green-600 transition-all appearance-none">
                            <option value="" class="text-gray-400">Pilih jarak ke sekolah</option>
                            <option value="<1 km"
                                {{ old('jarak_tempat_tinggal', $jarak_tempat_tinggal ?? '') == '<1 km' ? 'selected' : '' }}>
                                Kurang dari 1 km
                            </option>
                            <option value="1-5 km"
                                {{ old('jarak_tempat_tinggal', $jarak_tempat_tinggal ?? '') == '1-5 km' ? 'selected' : '' }}>
                                1-5 km
                            </option>
                            <option value=">5 km"
                                {{ old('jarak_tempat_tinggal', $jarak_tempat_tinggal ?? '') == '>5 km' ? 'selected' : '' }}>
                                Lebih dari 5 km
                            </option>
                        </select>

                        <!-- Panah Dropdown -->
                        <svg class="w-5 h-5 text-gray-400 absolute right-4 top-11 pointer-events-none" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>

                        @error('jarak_tempat_tinggal')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            <!-- Section 5: Sekolah Asal -->
            <div class="section-card bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="flex items-center mb-6 pb-4 border-b-2 border-green-100">
                    <div
                        class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center mr-3 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Sekolah Asal</h2>
                </div>

                <div class="space-y-6">
                    <!-- Sekolah Asal -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Sekolah Asal <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="sekolah_asal" value="{{ old('sekolah_asal', $sekolah_asal ?? '') }}"
                            placeholder="Contoh: SD Negeri 1 Malang"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('sekolah_asal')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">NPSN / NSM <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="npsn_nsm" value="{{ old('npsn_nsm', $npsn_nsm ?? '') }}"
                            placeholder="Tuliskan nomor Pokok Sekolah Nasional"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        @error('npsn_nsm')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Sekolah Asal <span
                                class="text-red-500">*</span></label>
                        <textarea name="alamat_sekolah_asal" rows="3"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all resize-none"
                            placeholder="Tuliskan alamat lengkap sekolah asal">{{ old('alamat_sekolah_asal', $alamat_sekolah_asal ?? '') }}</textarea>
                        @error('alamat_sekolah_asal')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex flex-col sm:flex-row gap-4 justify-between items-center bg-white rounded-2xl shadow-lg p-6">
                <div class="text-sm text-gray-600">
                    <p class="font-medium">💡 Tips: Pastikan semua data terisi dengan benar</p>
                    <p class="text-xs mt-1">Field bertanda <span class="text-red-500">*</span> wajib diisi</p>
                </div>
                <button type="submit"
                    class="bg-[#31694E] hover:bg-green-800 text-white px-8 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all flex items-center gap-2 w-full sm:w-auto justify-center">
                    <span>Selanjutnya</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <!-- ================== FOOTER ================== -->
    <div class="text-center py-8 text-gray-600 text-sm">
        <p>© 2024 Sistem Informasi Pendaftaran Siswa</p>
    </div>

@endsection

@push('scripts')
    <script>
        // Toggle form wali berdasarkan pilihan "Tinggal Dengan"
        const tinggalDengan = document.getElementById('tinggal_dengan');
        const sectionWali = document.getElementById('section_wali');

        function toggleWaliSection() {
            if (tinggalDengan.value === 'Wali') {
                sectionWali.classList.remove('hidden');
            } else {
                sectionWali.classList.add('hidden');
            }
        }

        // Event listener
        tinggalDengan.addEventListener('change', toggleWaliSection);

        // Check on page load (untuk old value)
        window.addEventListener('DOMContentLoaded', toggleWaliSection);
    </script>
@endpush
