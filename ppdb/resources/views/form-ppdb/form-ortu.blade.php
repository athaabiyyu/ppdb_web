<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Form Biodata Orang Tua</title>
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
    </style>
</head>

<body class="min-h-screen bg-gray-100">
    <!-- Header -->
    <div class="gradient-bg text-white py-8 shadow-lg">
        <div class="w-full px-4">
            <div class="flex flex-col md:flex-row items-center md:justify-between relative">

                <!-- Logo dan Nama Yayasan -->
                <div class="flex items-center gap-2">
                    <img src="/assets/logo_yayasan.png" alt="Logo" class="w-16 h-16">
                    <div>
                        <span class="text-2xl font-bold block">PPDB Online</span>
                        <span class="text-sm opacity-90">Yayasan Mambaul Maarif Denanyar Jombang</span>
                    </div>
                </div>

                <!-- Judul Form -->
                <h1 class="text-3xl font-bold text-center mt-6 md:mt-0 md:text-left w-full md:w-auto">
                    Form Data Orangtua
                </h1>

                <!-- Progress Info -->
                <div class="hidden md:block">
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-6 py-3">
                        <p class="text-sm text-green-100">Langkah 2 dari 4</p>
                        <p class="text-xl font-bold">Data Orang Tua</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 py-8">

        <!-- Progress Indicator -->
        <div class="mb-8">
            <div class="flex justify-between items-center max-w-3xl mx-auto">
                <div class="flex flex-col items-center relative z-10">
                    <div
                        class="w-12 h-12 rounded-full bg-green-200 text-green-700 flex items-center justify-center font-bold shadow-md">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="text-xs mt-2 font-medium text-gray-700">Data Pribadi</span>
                </div>
                <div class="flex-1 h-1 bg-green-300 mx-2"></div>
                <div class="flex flex-col items-center">
                    <div
                        class="w-12 h-12 rounded-full gradient-bg text-white flex items-center justify-center font-bold shadow-lg">
                        2</div>
                    <span class="text-xs mt-2 font-medium text-gray-700">Data Orang Tua</span>
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

        <form action="/form-ortu/store" method="POST">
            @csrf
            <input type="hidden" name="student_id" value="{{ $student->id }}">

            <!-- Info Jika Tinggal dengan Wali -->
            @if ($student->tinggal_dengan === 'Wali')
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded-lg">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-blue-500 mr-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-blue-800">
                                Anda sebelumnya memilih <strong>"Tinggal dengan Wali"</strong>
                            </p>
                            <p class="text-xs text-blue-700 mt-1">
                                Data wali sudah tersimpan. Silakan lengkapi data orang tua kandung di bawah ini.
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Section 1: Data Ayah -->
            <div class="section-card bg-white rounded-2xl shadow-lg p-8 mb-6">
                <div class="flex items-center mb-6 pb-4 border-b-2 border-green-100">
                    <div
                        class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center mr-3 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Data Ayah</h2>
                </div>

                <div class="grid grid-cols-1 gap-6">

                    <!-- Nama Lengkap Ayah -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama_ayah"
                            value="{{ old('nama_ayah', $student->parentInfo->nama_ayah ?? '') }}"
                            placeholder="Tuliskan nama lengkap"
                            class="input-focus w-full px-4 py-3 border-2 {{ $errors->has('nama_ayah') ? 'border-red-500' : 'border-gray-200' }} rounded-xl transition-all">
                        @error('nama_ayah')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- NIK Ayah -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">NIK<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nik_ayah"
                            value="{{ old('nik_ayah', $student->parentInfo->nik_ayah ?? '') }}"
                            placeholder="Tuliskan nomor NIK" maxlength="16"
                            class="input-focus w-full px-4 py-3 border-2 {{ $errors->has('nik_ayah') ? 'border-red-500' : 'border-gray-200' }} rounded-xl transition-all">
                        @error('nik_ayah')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                    <!-- Tempat Lahir Ayah -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="tempat_lahir_ayah"
                            value="{{ old('tempat_lahir_ayah', $student->parentInfo->tempat_lahir_ayah ?? '') }}"
                            placeholder="Contoh: Jakarta"
                            class="input-focus w-full px-4 py-3 border-2 rounded-xl transition-all">
                        @error('tempat_lahir_ayah')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Lahir Ayah -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir<span
                                class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_lahir_ayah"
                            value="{{ old('tanggal_lahir_ayah', $student->parentInfo->tanggal_lahir_ayah ?? '') }}"
                            class="input-focus w-full px-4 py-3 border-2 rounded-xl transition-all">
                        @error('tanggal_lahir_ayah')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="grid grid-cols-1 gap-6 mt-6">

                    <!-- Pendidikan Terakhir -->
                    <div class="relative">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan Terakhir<span
                                class="text-red-500">*</span></label>
                        <select name="pendidikan_ayah"
                            class="input-focus w-full px-4 py-3 border-2 rounded-xl appearance-none bg-white">
                            <option value="">Pilih pendidikan terakhir</option>
                            @foreach ($pendidikanOptions as $value => $label)
                                <option value="{{ $value }}"
                                    {{ old('pendidikan_ayah', $student->parentInfo->pendidikan_ayah ?? '') == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        <svg class="w-5 h-5 text-gray-400 absolute right-4 top-11 pointer-events-none" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                        @error('pendidikan_ayah')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Ayah -->
                    <div class="relative">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status<span
                                class="text-red-500">*</span></label>
                        <select name="status_ayah"
                            class="input-focus w-full px-4 py-3 border-2 rounded-xl appearance-none bg-white">
                            <option value="">Pilih status</option>
                            <option value="Hidup"
                                {{ old('status_ayah', $student->parentInfo->status_ayah ?? '') == 'Hidup' ? 'selected' : '' }}>
                                Masih Hidup</option>
                            <option value="Meninggal"
                                {{ old('status_ayah', $student->parentInfo->status_ayah ?? '') == 'Meninggal' ? 'selected' : '' }}>
                                Meninggal Dunia</option>
                        </select>
                        <svg class="w-5 h-5 text-gray-400 absolute right-4 top-11 pointer-events-none" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                        @error('status_ayah')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                    <!-- Pekerjaan -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pekerjaan<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="pekerjaan_ayah"
                            value="{{ old('pekerjaan_ayah', $student->parentInfo->pekerjaan_ayah ?? '') }}"
                            placeholder="Contoh: Wiraswasta"
                            class="input-focus w-full px-4 py-3 border-2 rounded-xl transition-all">
                        @error('pekerjaan_ayah')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Penghasilan -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Penghasilan per Bulan<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="penghasilan_ayah"
                            value="{{ old('penghasilan_ayah', $student->parentInfo->penghasilan_ayah ?? '') }}"
                            placeholder="Contoh: 5.000.000"
                            class="input-focus w-full px-4 py-3 border-2 rounded-xl transition-all">
                        @error('penghasilan_ayah')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="grid grid-cols-1 gap-6 mt-6">
                    <!-- No HP Ayah -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">No. HP Ayah<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="hp_ayah"
                            value="{{ old('hp_ayah', $student->parentInfo->hp_ayah ?? '') }}"
                            placeholder="Contoh: 08123456789"
                            class="input-focus w-full px-4 py-3 border-2 rounded-xl transition-all">
                        @error('hp_ayah')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

            </div>

            <!-- Section 2: Data Ibu -->
            <div class="section-card bg-white rounded-2xl shadow-lg p-8 mb-6">
                <div class="flex items-center mb-6 pb-4 border-b-2 border-green-100">
                    <div
                        class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center mr-3 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Data Ibu</h2>
                </div>

                <div class="grid grid-cols-1 gap-6">

                    <!-- Nama Lengkap Ibu -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama_ibu"
                            value="{{ old('nama_ibu', $student->parentInfo->nama_ibu ?? '') }}"
                            placeholder="Tuliskan nama lengkap"
                            class="input-focus w-full px-4 py-3 border-2 {{ $errors->has('nama_ibu') ? 'border-red-500' : 'border-gray-200' }} rounded-xl transition-all">
                        @error('nama_ibu')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- NIK Ibu -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">NIK<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nik_ibu"
                            value="{{ old('nik_ibu', $student->parentInfo->nik_ibu ?? '') }}"
                            placeholder="Tuliskan nomor NIK" maxlength="16"
                            class="input-focus w-full px-4 py-3 border-2 {{ $errors->has('nik_ibu') ? 'border-red-500' : 'border-gray-200' }} rounded-xl transition-all">
                        @error('nik_ibu')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                    <!-- Tempat Lahir Ibu -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="tempat_lahir_ibu"
                            value="{{ old('tempat_lahir_ibu', $student->parentInfo->tempat_lahir_ibu ?? '') }}"
                            placeholder="Contoh: Surabaya"
                            class="input-focus w-full px-4 py-3 border-2 rounded-xl transition-all">
                        @error('tempat_lahir_ibu')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Lahir Ibu -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir<span
                                class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_lahir_ibu"
                            value="{{ old('tanggal_lahir_ibu', $student->parentInfo->tanggal_lahir_ibu ?? '') }}"
                            class="input-focus w-full px-4 py-3 border-2 rounded-xl transition-all">
                        @error('tanggal_lahir_ibu')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 mt-6">

                    <!-- Pendidikan Terakhir -->
                    <div class="relative">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan Terakhir<span
                                class="text-red-500">*</span></label>
                        <select name="pendidikan_ibu"
                            class="input-focus w-full px-4 py-3 border-2 rounded-xl appearance-none bg-white">
                            <option value="">Pilih pendidikan terakhir</option>
                            @foreach ($pendidikanOptions as $value => $label)
                                <option value="{{ $value }}"
                                    {{ old('pendidikan_ibu', $student->parentInfo->pendidikan_ibu ?? '') == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        <svg class="w-5 h-5 text-gray-400 absolute right-4 top-11 pointer-events-none" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                        @error('pendidikan_ibu')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Ibu -->
                    <div class="relative">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status<span
                                class="text-red-500">*</span></label>
                        <select name="status_ibu"
                            class="input-focus w-full px-4 py-3 border-2 rounded-xl appearance-none bg-white">
                            <option value="">Pilih status</option>
                            <option value="Hidup"
                                {{ old('status_ibu', $student->parentInfo->status_ibu ?? '') == 'Hidup' ? 'selected' : '' }}>
                                Masih Hidup</option>
                            <option value="Meninggal"
                                {{ old('status_ibu', $student->parentInfo->status_ibu ?? '') == 'Meninggal' ? 'selected' : '' }}>
                                Meninggal Dunia</option>
                        </select>
                        <svg class="w-5 h-5 text-gray-400 absolute right-4 top-11 pointer-events-none" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                        @error('status_ibu')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                    <!-- Pekerjaan Ibu -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pekerjaan<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="pekerjaan_ibu"
                            value="{{ old('pekerjaan_ibu', $student->parentInfo->pekerjaan_ibu ?? '') }}"
                            placeholder="Contoh: Guru"
                            class="input-focus w-full px-4 py-3 border-2 rounded-xl transition-all">
                        @error('pekerjaan_ibu')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Penghasilan Ibu -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Penghasilan per Bulan<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="penghasilan_ibu"
                            value="{{ old('penghasilan_ibu', $student->parentInfo->penghasilan_ibu ?? '') }}"
                            placeholder="Contoh: 3.000.000"
                            class="input-focus w-full px-4 py-3 border-2 rounded-xl transition-all">
                        @error('penghasilan_ibu')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 mt-6">

                    <!-- No HP Ibu -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">No. HP Ibu<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="hp_ibu"
                            value="{{ old('hp_ibu', $student->parentInfo->hp_ibu ?? '') }}"
                            placeholder="Contoh: 08123456789"
                            class="input-focus w-full px-4 py-3 border-2 rounded-xl transition-all">
                        @error('hp_ibu')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Section 3: Alamat -->
            <div class="section-card bg-white rounded-2xl shadow-lg p-8 mb-8">
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
                    <h2 class="text-2xl font-bold text-gray-800">Alamat Lengkap</h2>
                </div>

                <div class="space-y-6">
                    <!-- Alamat KK -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Sesuai Kartu Keluarga
                            (KK)<span
                                class="text-red-500">*</span></label>
                        <textarea name="alamat_kk" rows="2" placeholder="Tuliskan alamat lengkap sesuai Kartu Keluarga"
                            class="input-focus w-full px-4 py-3 border-2 {{ $errors->has('alamat_kk') ? 'border-red-500' : 'border-gray-200' }} rounded-xl transition-all resize-none">{{ old('alamat_kk', $student->alamat_kk ?? '') }}</textarea>
                        @if ($errors->has('alamat_kk'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('alamat_kk') }}</p>
                        @endif
                    </div>

                    <!-- Alamat Domisili -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Domisili Saat Ini<span
                                class="text-red-500">*</span></label>
                        <textarea name="alamat" rows="2" placeholder="Tuliskan alamat domisili"
                            class="input-focus w-full px-4 py-3 border-2 {{ $errors->has('alamat') ? 'border-red-500' : 'border-gray-200' }} rounded-xl transition-all resize-none">{{ old('alamat', $student->alamat ?? '') }}</textarea>
                        @if ($errors->has('alamat'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('alamat') }}</p>
                        @endif
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Desa / Kelurahan -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Desa / Kelurahan<span
                                class="text-red-500">*</span></label>
                            <input type="text" name="desa" value="{{ old('desa', $student->desa ?? '') }}"
                                placeholder="Tuliskan desa/kelurahan"
                                class="input-focus w-full px-4 py-3 border-2 {{ $errors->has('desa') ? 'border-red-500' : 'border-gray-200' }} rounded-xl transition-all">
                            @if ($errors->has('desa'))
                                <p class="text-red-500 text-sm mt-1">{{ $errors->first('desa') }}</p>
                            @endif
                        </div>

                        <!-- Kecamatan -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kecamatan<span
                                class="text-red-500">*</span></label>
                            <input type="text" name="kecamatan"
                                value="{{ old('kecamatan', $student->kecamatan ?? '') }}"
                                placeholder="Tuliskan kecamatan"
                                class="input-focus w-full px-4 py-3 border-2 {{ $errors->has('kecamatan') ? 'border-red-500' : 'border-gray-200' }} rounded-xl transition-all">
                            @if ($errors->has('kecamatan'))
                                <p class="text-red-500 text-sm mt-1">{{ $errors->first('kecamatan') }}</p>
                            @endif
                        </div>

                        <!-- Kabupaten / Kota -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kabupaten / Kota<span
                                class="text-red-500">*</span></label>
                            <input type="text" name="kabupaten"
                                value="{{ old('kabupaten', $student->kabupaten ?? '') }}"
                                placeholder="Tuliskan kabupaten/kota"
                                class="input-focus w-full px-4 py-3 border-2 {{ $errors->has('kabupaten') ? 'border-red-500' : 'border-gray-200' }} rounded-xl transition-all">
                            @if ($errors->has('kabupaten'))
                                <p class="text-red-500 text-sm mt-1">{{ $errors->first('kabupaten') }}</p>
                            @endif
                        </div>

                        <!-- Provinsi -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Provinsi<span
                                class="text-red-500">*</span></label>
                            <input type="text" name="provinsi"
                                value="{{ old('provinsi', $student->provinsi ?? '') }}" placeholder="Tuliskan provinsi"
                                class="input-focus w-full px-4 py-3 border-2 {{ $errors->has('provinsi') ? 'border-red-500' : 'border-gray-200' }} rounded-xl transition-all">
                            @if ($errors->has('provinsi'))
                                <p class="text-red-500 text-sm mt-1">{{ $errors->first('provinsi') }}</p>
                            @endif
                        </div>

                        <!-- Kode Pos -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kode Pos<span
                                class="text-red-500">*</span></label>
                            <input type="text" name="kode_pos"
                                value="{{ old('kode_pos', $student->kode_pos ?? '') }}"
                                placeholder="Tuliskan kode pos" maxlength="5"
                                class="input-focus w-full px-4 py-3 border-2 {{ $errors->has('kode_pos') ? 'border-red-500' : 'border-gray-200' }} rounded-xl transition-all">
                            @if ($errors->has('kode_pos'))
                                <p class="text-red-500 text-sm mt-1">{{ $errors->first('kode_pos') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <!-- Submit Button -->
            <div
                class="flex flex-col sm:flex-row gap-4 justify-between items-center bg-white rounded-2xl shadow-lg p-6">
                <div class="text-sm text-gray-600">
                    <p class="font-medium">💡 Tips: Pastikan data orang tua terisi dengan lengkap dan benar</p>
                    <p class="text-xs mt-1">Data ini akan digunakan untuk keperluan administrasi sekolah</p>
                </div>
                <button type="submit"
                    class="bg-[#31694E] text-white px-8 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all flex items-center gap-2 w-full sm:w-auto justify-center">
                    <span>Selanjutnya (Upload Dokumen)</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="text-center py-8 text-gray-600 text-sm">
        <p>© 2024 Sistem Informasi Pendaftaran Siswa</p>
    </div>

</body>

</html>
