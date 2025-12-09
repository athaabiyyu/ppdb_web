@extends('layouts.app_user', ['noNavbar' => true])

@section('title', 'Formulir Upload Dokumen Persyaratan')

@push('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: #31694E;
        }

        .card-shadow {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .section-card {
            transition: all 0.3s ease;
        }

        .section-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 25px 30px -5px rgba(0, 0, 0, 0.15);
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type=file] {
            position: absolute;
            left: -9999px;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            background: white;
            border: 2px dashed #d1d5db;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-input-label:hover {
            border-color: #2e7d32;
            background: #f0f9ff;
        }

        .file-input-label.has-file {
            border-color: #2e7d32;
            background: #f1f8f4;
            border-style: solid;
        }

        .file-name {
            font-size: 14px;
            color: #4b5563;
            flex: 1;
        }

        .file-name.placeholder {
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
                    <img src="/assets/logo_yayasan.png" alt="Logo" class="w-16 h-16 md:w-16 md:h-16">
                    <div>
                        <span class="text-xl md:text-xl font-bold block">PPDB Online</span>
                        <span class="text-sm md:text-sm opacity-90">Yayasan Mambaul Maarif Denanyar Jombang</span>
                    </div>
                </div>
                <!-- Progress Info -->
                <div class="hidden md:block flex-shrink-0">
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl px-6 py-3 shadow-inner">
                        <p class="text-sm text-green-100">Langkah 3 dari 4</p>
                        <p class="text-xl md:text-2xl font-bold">Upload Dokumen</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ================== HEADER ================== -->
    <div class="max-w-5xl mx-auto px-4 relative z-10 pt-16">
        <div class="flex flex-col gap-6 mb-8">
            <!-- Header Text -->
            <div class="w-full text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4 text-gray-800 drop-shadow-sm">
                    Langkah 2 dari 4
                </h1>
            </div>
        </div>
    </div>

    <!-- ================== MAIN CONTENT ================== -->
    <div class="max-w-5xl mx-auto px-4 py-8">

        <!-- Progress Indicator -->
        <div class="mb-8">
            <div class="flex justify-between items-center max-w-3xl mx-auto">

                <!-- Step 1: Selesai -->
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

                <!-- Step 2: Selesai -->
                <div class="flex flex-col items-center">
                    <div
                        class="w-12 h-12 rounded-full bg-green-200 text-green-700 flex items-center justify-center font-bold shadow-md">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="text-xs mt-2 font-medium text-gray-700">Data Keluarga</span>
                </div>

                <div class="flex-1 h-1 bg-green-300 mx-2"></div>

                <!-- Step 3: Aktif (Upload Dokumen) -->
                <div class="flex flex-col items-center">
                    <div
                        class="w-12 h-12 rounded-full gradient-bg text-white flex items-center justify-center font-bold shadow-lg">
                        3</div>
                    <span class="text-xs mt-2 font-medium text-gray-700">Upload Dokumen</span>
                </div>

                <div class="flex-1 h-1 bg-gray-200 mx-2"></div>

                <!-- Step 4: Belum selesai -->
                <div class="flex flex-col items-center">
                    <div
                        class="w-12 h-12 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold">
                        4</div>
                    <span class="text-xs mt-2 text-gray-500">Selesai</span>
                </div>

            </div>
        </div>


        <form action="{{ route('form.dokumen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="student_id" value="{{ $student->id }}">

            <!-- Section 1: Dokumen Wajib -->
            <div class="section-card bg-white rounded-2xl shadow-lg p-8 mb-6">
                <div class="flex items-center mb-6 pb-4 border-b-2 border-green-100">
                    <div
                        class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center mr-3 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Dokumen Wajib</h2>
                        <p class="text-sm text-gray-500 mt-1">File harus diupload untuk melanjutkan</p>
                    </div>
                </div>

                <div class="space-y-5">
                    <!-- KK -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Kartu Keluarga (KK) <span class="text-red-500">*</span>
                        </label>
                        <div class="file-input-wrapper">
                            <input type="file" name="kk" id="kk" accept=".pdf,.jpg,.jpeg,.png"
                                onchange="updateFileName(this)" required>
                            <label for="kk" class="file-input-label">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <span class="file-name placeholder">Pilih file PDF, JPG, atau PNG</span>
                            </label>
                        </div>
                        @error('kk')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Akte -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Akte Kelahiran <span class="text-red-500">*</span>
                        </label>
                        <div class="file-input-wrapper">
                            <input type="file" name="akte" id="akte" accept=".pdf,.jpg,.jpeg,.png"
                                onchange="updateFileName(this)" required>
                            <label for="akte" class="file-input-label">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <span class="file-name placeholder">Pilih file PDF, JPG, atau PNG</span>
                            </label>
                        </div>
                        @error('akte')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Foto Anak -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Foto Anak 3x4 (Background Merah) <span class="text-red-500">*</span>
                        </label>
                        <div class="file-input-wrapper">
                            <input type="file" name="foto_anak" id="foto_anak" accept=".jpg,.jpeg,.png"
                                onchange="updateFileName(this)" required>
                            <label for="foto_anak" class="file-input-label">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span class="file-name placeholder">Pilih file JPG atau PNG</span>
                            </label>
                        </div>
                        @error('foto_anak')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Section 2: Dokumen Identitas Orang Tua -->
            <div class="section-card bg-white rounded-2xl shadow-lg p-8 mb-6">
                <div class="flex items-center mb-6 pb-4 border-b-2 border-green-100">
                    <div
                        class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center mr-3 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Dokumen Identitas Orang Tua</h2>
                        <p class="text-sm text-gray-500 mt-1">KTP Ayah dan Ibu</p>
                    </div>
                </div>

                <div class="space-y-5">
                    <!-- KTP Ayah -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            KTP Ayah <span class="text-red-500">*</span>
                        </label>
                        <div class="file-input-wrapper">
                            <input type="file" name="ktp_ayah" id="ktp_ayah" accept=".pdf,.jpg,.jpeg,.png"
                                onchange="updateFileName(this)" required>
                            <label for="ktp_ayah" class="file-input-label">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <span class="file-name placeholder">Pilih file PDF, JPG, atau PNG</span>
                            </label>
                        </div>
                        @error('ktp_ayah')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- KTP Ibu -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            KTP Ibu <span class="text-red-500">*</span>
                        </label>
                        <div class="file-input-wrapper">
                            <input type="file" name="ktp_ibu" id="ktp_ibu" accept=".pdf,.jpg,.jpeg,.png"
                                onchange="updateFileName(this)" required>
                            <label for="ktp_ibu" class="file-input-label">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <span class="file-name placeholder">Pilih file PDF, JPG, atau PNG</span>
                            </label>
                        </div>
                        @error('ktp_ibu')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>


            <!-- Section 3: Dokumen Akademik -->
            <div class="section-card bg-white rounded-2xl shadow-lg p-8 mb-6">
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
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Dokumen Akademik</h2>
                        <p class="text-sm text-gray-500 mt-1">Transkrip nilai dan surat keterangan</p>
                    </div>
                </div>

                <div class="space-y-5">
                    <!-- Surat Keterangan Aktif -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Surat Keterangan Aktif <span class="text-red-500">*</span>
                        </label>
                        <div class="file-input-wrapper">
                            <input type="file" name="surat_aktif" id="surat_aktif" accept=".pdf,.jpg,.jpeg,.png"
                                onchange="updateFileName(this)" required>
                            <label for="surat_aktif" class="file-input-label">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <span class="file-name placeholder">Pilih file PDF, JPG, atau PNG</span>
                            </label>
                        </div>
                        @error('surat_aktif')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Transkrip Nilai Per Semester (Conditional) -->
                    @if ($semesterCount > 0)
                        <div class="bg-orange-50 border-l-4 border-orange-500 p-4 rounded-lg mb-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-orange-500 mr-2 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-orange-900 text-sm">Upload Transkrip Nilai Per Semester
                                    </h4>
                                    <p class="text-xs text-orange-800 mt-1">
                                        Untuk jenjang <strong>{{ $student->jenjang }}</strong>, Anda perlu mengupload
                                        transkrip nilai dari Semester 1 sampai {{ $semesterCount }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        @for ($i = 1; $i <= $semesterCount; $i++)
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Transkrip Nilai Semester {{ $i }} <span class="text-red-500">*</span>
                                </label>
                                <div class="file-input-wrapper">
                                    <input type="file" name="transkrip_semester_{{ $i }}"
                                        id="transkrip_semester_{{ $i }}" accept=".pdf,.jpg,.jpeg,.png"
                                        onchange="updateFileName(this)" required>
                                    <label for="transkrip_semester_{{ $i }}" class="file-input-label">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <span class="file-name placeholder">Pilih file PDF, JPG, atau PNG</span>
                                    </label>
                                </div>
                                @error("transkrip_semester_{$i}")
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        @endfor
                    @else
                        <!-- Info untuk SD -->
                        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-green-900 text-sm">Transkrip Nilai Tidak Diperlukan
                                    </h4>
                                    <p class="text-xs text-green-800 mt-1">
                                        Untuk pendaftaran jenjang <strong>{{ $student->jenjang }}</strong>, Anda tidak
                                        perlu mengupload transkrip nilai.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Section 4: Dokumen Tambahan (Opsional) -->
            <div class="section-card bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="flex items-center mb-6 pb-4 border-b-2 border-green-100">
                    <div
                        class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center mr-3 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Dokumen Tambahan (Opsional)</h2>
                        <p class="text-sm text-gray-500 mt-1">Upload jika tersedia untuk melengkapi berkas</p>
                    </div>
                </div>

                <div class="space-y-5">
                    <!-- Sertifikat Prestasi -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Sertifikat Prestasi <span class="text-xs text-gray-500">(Akademik/Non-akademik)</span>
                        </label>
                        <div class="file-input-wrapper">
                            <input type="file" name="prestasi" id="prestasi" accept=".pdf,.jpg,.jpeg,.png"
                                onchange="updateFileName(this)">
                            <label for="prestasi" class="file-input-label">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <span class="file-name placeholder">Pilih file PDF, JPG, atau PNG</span>
                            </label>
                        </div>
                        @error('prestasi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- KIP/PKH/KKS/SKTM -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            KIP/PKH/KKS/SKTM <span class="text-xs text-gray-500">(Jika memiliki)</span>
                        </label>
                        <div class="file-input-wrapper">
                            <input type="file" name="kip_pkh" id="kip_pkh" accept=".pdf,.jpg,.jpeg,.png"
                                onchange="updateFileName(this)">
                            <label for="kip_pkh" class="file-input-label">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <span class="file-name placeholder">Pilih file PDF, JPG, atau PNG</span>
                            </label>
                        </div>
                        @error('kip_pkh')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Info Box -->
            <div class="bg-blue-50 border-l-4 border-blue-500 p-6 rounded-xl mb-6">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h3 class="font-semibold text-blue-900 mb-2">Informasi Penting:</h3>
                        <ul class="text-sm text-blue-800 space-y-1 list-disc list-inside">
                            <li>Pastikan semua dokumen yang di-upload jelas dan dapat dibaca</li>
                            <li>Format file yang diterima: PDF, JPG, atau PNG</li>
                            <li>Ukuran maksimal per file adalah 5MB</li>
                            <li>Dokumen bertanda <span class="text-red-500 font-semibold">*</span> wajib diupload</li>
                            @if ($semesterCount > 0)
                                <li>Upload transkrip nilai untuk setiap semester secara terpisah (Semester 1 sampai
                                    {{ $semesterCount }})</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex flex-col sm:flex-row gap-4 justify-between items-center bg-white rounded-2xl shadow-lg p-6">
                <div class="text-sm text-gray-600">
                    <p class="font-medium">🎉 Langkah terakhir! Upload dokumen untuk menyelesaikan pendaftaran</p>
                    <p class="text-xs mt-1">Anda akan melihat ringkasan data setelah submit</p>
                </div>
                <button type="submit"
                    class="bg-green-700 hover:bg-green-800 text-white px-8 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all flex items-center gap-2 w-full sm:w-auto justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Kirim & Lihat Ringkasan</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="text-center py-8 text-gray-600 text-sm">
        <p>© 2024 Sistem Informasi Pendaftaran Siswa</p>
    </div>

@endsection

@push('scripts')
    <script>
        function updateFileName(input) {
            const label = input.nextElementSibling;
            const fileNameSpan = label.querySelector('.file-name');

            if (input.files && input.files[0]) {
                const fileName = input.files[0].name;
                const fileSize = (input.files[0].size / 1024 / 1024).toFixed(2);

                fileNameSpan.textContent = fileName + ' (' + fileSize + ' MB)';
                fileNameSpan.classList.remove('placeholder');
                label.classList.add('has-file');

                if (input.files[0].size > 5 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar! Maksimal 5MB per file.');
                    input.value = '';
                    fileNameSpan.textContent = 'Pilih file PDF, JPG, atau PNG';
                    fileNameSpan.classList.add('placeholder');
                    label.classList.remove('has-file');
                }
            } else {
                fileNameSpan.textContent = 'Pilih file PDF, JPG, atau PNG';
                fileNameSpan.classList.add('placeholder');
                label.classList.remove('has-file');
            }
        }
    </script>
@endpush
