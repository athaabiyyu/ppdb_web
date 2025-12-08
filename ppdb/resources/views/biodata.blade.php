<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ringkasan Biodata</title>
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

                <div>
                    <h1 class="text-3xl font-bold text-center mt-6 md:mt-0 md:text-left w-full md:w-auto">
                        Pendaftaran Berhasil!
                    </h1>
                    <p class="text-green-100">Selamat! Data Anda telah tersimpan dengan baik</p>
                </div>

                <!-- Progress Info -->
                <div class="hidden md:block">
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-6 py-3">
                        <p class="text-sm text-green-100">Langkah 4 dari 4</p>
                        <p class="text-xl font-bold">Pendaftaran Berhasil</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 py-8">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Main Card -->
        <div class="section-card bg-white rounded-2xl shadow-lg p-8 mb-6">

            <!-- Heading -->
            <div class="flex items-center mb-6 pb-4 border-b-2 border-green-100">
                <div
                    class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center mr-3 shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Ringkasan Biodata</h2>
            </div>

            <!-- FOTO + IDENTITAS UTAMA -->
            <div class="flex flex-col md:flex-row gap-6 mb-8">

                <!-- Foto -->
                <div class="flex-shrink-0">
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
                <div class="flex-1">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $student->nama }}</h2>

                    <div class="bg-gray-100 p-6 rounded-xl border border-gray-200 mb-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div class="bg-white rounded-xl p-4">
                                <p class="text-xs text-gray-500">NISN</p>
                                <p class="text-lg font-semibold">{{ $student->nisn ?? '-' }}</p>
                            </div>

                            <div class="bg-white rounded-xl p-4">
                                <p class="text-xs text-gray-500">Jenis Kelamin</p>
                                <p class="text-lg font-semibold">{{ $student->jenis_kelamin ?? '-' }}</p>
                            </div>

                            <div class="bg-white rounded-xl p-4">
                                <p class="text-xs text-gray-500">Agama</p>
                                <p class="text-lg font-semibold">{{ $student->agama ?? '-' }}</p>
                            </div>

                            <div class="bg-white rounded-xl p-4">
                                <p class="text-xs text-gray-500">Tanggal Lahir</p>
                                <p class="text-lg font-semibold">
                                    @if ($student->tempat_lahir && $student->tanggal_lahir)
                                        {{ $student->tempat_lahir }},
                                        {{ \Carbon\Carbon::parse($student->tanggal_lahir)->format('d F Y') }}
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>

                            <div class="bg-white rounded-xl p-4">
                                <p class="text-xs text-gray-500">Hobi</p>
                                <p class="text-lg font-semibold">{{ $student->hobi ?? '-' }}</p>
                            </div>

                            <div class="bg-white rounded-xl p-4">
                                <p class="text-xs text-gray-500">Cita-Cita</p>
                                <p class="text-lg font-semibold">{{ $student->cita_cita ?? '-' }}</p>
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
            <h3 class="text-xl font-bold text-gray-800 mb-4">Data Diri Lengkap</h3>
            <div class="bg-gray-100 p-6 rounded-xl border border-gray-200 mb-10">

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
                            <p class="font-semibold">{{ $student->$key ?? '-' }}</p>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- DATA WALI (Jika Tinggal dengan Wali) -->
            @if ($student->tinggal_dengan === 'Wali' && $student->guardian)
                <h3 class="text-xl font-bold text-gray-800 mb-4">Data Wali</h3>

                <div class="bg-gray-100 p-6 rounded-xl border border-gray-200 mb-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Nama Lengkap Wali</p>
                            <p class="font-semibold text-lg">{{ $student->guardian->nama_wali ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">NIK Wali</p>
                            <p class="font-semibold">{{ $student->guardian->nik_wali ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Tempat, Tanggal Lahir</p>
                            <p class="font-semibold">
                                @if ($student->guardian->tempat_lahir_wali && $student->guardian->tanggal_lahir_wali)
                                    {{ $student->guardian->tempat_lahir_wali }},
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
                            <p class="font-semibold">{{ $student->guardian->pekerjaan_wali ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Penghasilan per Bulan</p>
                            <p class="font-semibold">{{ $student->guardian->penghasilan_wali ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">No. HP Wali</p>
                            <p class="font-semibold">{{ $student->guardian->hp_wali ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Alamat Lengkap Wali</p>
                            <p class="font-semibold">{{ $student->guardian->alamat ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Desa/Kelurahan</p>
                            <p class="font-semibold">{{ $student->guardian->desa ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Kecamatan</p>
                            <p class="font-semibold">{{ $student->guardian->kecamatan ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Kabupaten/Kota</p>
                            <p class="font-semibold">{{ $student->guardian->kabupaten ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Provinsi</p>
                            <p class="font-semibold">{{ $student->guardian->provinsi ?? '-' }}</p>
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
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    @if ($student->tinggal_dengan === 'Wali')
                        Data Orang Tua Kandung
                    @else
                        Data Orang Tua
                    @endif
                </h3>
                <div class="bg-gray-100 p-6 rounded-xl border border-gray-200 mb-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- AYAH -->
                        <div class="bg-white rounded-lg p-4">
                            <h4 class="font-bold text-lg mb-3">Ayah</h4>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-xs text-gray-600">Nama Lengkap</p>
                                    <p class="font-semibold mb-5">{{ $student->parentInfo->nama_ayah ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600">NIK</p>
                                    <p class="font-semibold mb-5">{{ $student->parentInfo->nik_ayah ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600">Tempat, Tanggal Lahir</p>
                                    <p class="font-semibold mb-5">
                                        @if ($student->parentInfo->tempat_lahir_ayah && $student->parentInfo->tanggal_lahir_ayah)
                                            {{ $student->parentInfo->tempat_lahir_ayah }},
                                            {{ \Carbon\Carbon::parse($student->parentInfo->tanggal_lahir_ayah)->format('d F Y') }}
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600">Pendidikan Terakhir</p>
                                    <p class="font-semibold mb-5">{{ $student->parentInfo->pendidikan_ayah ?? '-' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600">Pekerjaan</p>
                                    <p class="font-semibold mb-5">{{ $student->parentInfo->pekerjaan_ayah ?? '-' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600">Penghasilan per Bulan</p>
                                    <p class="font-semibold mb-5">{{ $student->parentInfo->penghasilan_ayah ?? '-' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600">Status</p>
                                    <p class="font-semibold mb-5">
                                        @if ($student->parentInfo->status_ayah == 'Hidup')
                                            Masih Hidup
                                        @elseif($student->parentInfo->status_ayah == 'Meninggal')
                                            Meninggal Dunia
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600">No. HP</p>
                                    <p class="font-semibold mb-5">{{ $student->parentInfo->hp_ayah ?? '-' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- IBU -->
                        <div class="bg-white rounded-lg p-4">
                            <h4 class="font-bold text-lg mb-3">Ibu</h4>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-xs text-gray-600">Nama Lengkap</p>
                                    <p class="font-semibold mb-5">{{ $student->parentInfo->nama_ibu ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600">NIK</p>
                                    <p class="font-semibold mb-5">{{ $student->parentInfo->nik_ibu ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600">Tempat, Tanggal Lahir</p>
                                    <p class="font-semibold mb-5">
                                        @if ($student->parentInfo->tempat_lahir_ibu && $student->parentInfo->tanggal_lahir_ibu)
                                            {{ $student->parentInfo->tempat_lahir_ibu }},
                                            {{ \Carbon\Carbon::parse($student->parentInfo->tanggal_lahir_ibu)->format('d F Y') }}
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600">Pendidikan Terakhir</p>
                                    <p class="font-semibold mb-5">{{ $student->parentInfo->pendidikan_ibu ?? '-' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600">Pekerjaan</p>
                                    <p class="font-semibold mb-5">{{ $student->parentInfo->pekerjaan_ibu ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600">Penghasilan per Bulan</p>
                                    <p class="font-semibold mb-5">{{ $student->parentInfo->penghasilan_ibu ?? '-' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600">Status</p>
                                    <p class="font-semibold mb-5">
                                        @if ($student->parentInfo->status_ibu == 'Hidup')
                                            Masih Hidup
                                        @elseif($student->parentInfo->status_ibu == 'Meninggal')
                                            Meninggal Dunia
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600">No. HP</p>
                                    <p class="font-semibold mb-5">{{ $student->parentInfo->hp_ibu ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alamat Orang Tua -->
                <h3 class="text-xl font-bold text-gray-800 mb-4">Alamat Orang Tua</h3>
                <div class="bg-gray-100 p-6 rounded-xl border border-gray-200 mb-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-white rounded-lg p-4 md:col-span-2">
                            <p class="text-xs text-gray-600">Alamat Sesuai KK</p>
                            <p class="font-semibold">{{ $student->parentInfo->alamat_kk ?? '-' }}</p>
                        </div>
                        <div class="bg-white rounded-lg p-4 md:col-span-2">
                            <p class="text-xs text-gray-600">Alamat Domisili Saat Ini</p>
                            <p class="font-semibold">{{ $student->parentInfo->alamat ?? '-' }}</p>
                        </div>
                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Desa/Kelurahan</p>
                            <p class="font-semibold">{{ $student->parentInfo->desa ?? '-' }}</p>
                        </div>
                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Kecamatan</p>
                            <p class="font-semibold">{{ $student->parentInfo->kecamatan ?? '-' }}</p>
                        </div>
                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Kabupaten/Kota</p>
                            <p class="font-semibold">{{ $student->parentInfo->kabupaten ?? '-' }}</p>
                        </div>
                        <div class="bg-white rounded-lg p-4">
                            <p class="text-xs text-gray-600">Provinsi</p>
                            <p class="font-semibold">{{ $student->parentInfo->provinsi ?? '-' }}</p>
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
                <h3 class="text-xl font-bold text-gray-800 mb-3">Dokumen Upload</h3>
                <div class="bg-gray-100 p-6 rounded-xl border border-gray-200 mb-10">

                    <!-- Dokumen Umum -->
                    <h4 class="font-semibold text-gray-700 mb-3">Dokumen Umum</h4>
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
                                        class="text-green-700 font-semibold hover:text-green-800 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
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
                        <h4 class="font-semibold text-gray-700 mb-3 mt-6">Transkrip Nilai Per Semester</h4>
                        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg mb-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-blue-500 mr-2 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-sm text-blue-800">
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
                                        class="text-green-700 font-semibold hover:text-green-800 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
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

        <!-- Action Buttons -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <a href="/cetak/{{ $student->id }}"
                class="bg-[#31694E] text-white px-8 py-5 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all flex items-center justify-center gap-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                    </path>
                </svg>
                <span>Cetak Bukti Pendaftaran</span>
            </a>

            <div class="flex gap-4 mb-6">
                <button onclick="openEditModal()"
                    class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl shadow-lg transition duration-300 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Edit Biodata
                </button>

                <button onclick="openEditDokumenModal()"
                    class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-xl shadow-lg transition duration-300 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Edit Dokumen
                </button>
            </div>
        </div>

        <!-- Info Next Steps -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="font-bold text-lg text-gray-800 mb-4 flex items-center gap-2">
                <svg class="w-6 h-6 text-[#31694E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Langkah Selanjutnya
            </h3>
            <ul class="space-y-3">
                <li class="flex items-start gap-3">
                    <div
                        class="w-6 h-6 bg-[#31694E] rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                        <span class="text-white text-xs font-bold">1</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Cetak Bukti Pendaftaran</p>
                        <p class="text-sm text-gray-600">Download dan simpan bukti pendaftaran untuk keperluan
                            administrasi</p>
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <div
                        class="w-6 h-6 bg-[#31694E] rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                        <span class="text-white text-xs font-bold">2</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Tunggu Pengumuman</p>
                        <p class="text-sm text-gray-600">Pantau email atau nomor HP yang didaftarkan untuk
                            informasi
                            selanjutnya</p>
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <div
                        class="w-6 h-6 bg-[#31694E] rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                        <span class="text-white text-xs font-bold">3</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Hubungi Sekolah</p>
                        <p class="text-sm text-gray-600">Jika ada pertanyaan, silakan hubungi pihak sekolah untuk
                            informasi lebih lanjut</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- MODAL EDIT (Improved Styling) -->
    <div id="editModal" class="fixed inset-0 hidden items-center justify-center z-50 p-4">
        <div class="absolute inset-0 bg-gradient-to-br from-black/60 to-black/40 backdrop-blur-md"
            onclick="closeEditModal()"></div>

        <div
            class="relative bg-white rounded-3xl shadow-2xl w-full max-w-6xl max-h-[90vh] overflow-hidden animate-slideUp">
            <!-- HEADER STICKY -->
            <div class="sticky top-0 bg-gradient-to-r from-green-600 to-emerald-600 p-6 z-10 shadow-lg">
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
            <form action="/biodata/{{ $student->id }}/update" method="POST"
                class="overflow-y-auto max-h-[calc(90vh-180px)]">
                @csrf
                @method('PUT')

                <div class="p-8 space-y-8">
                    <!-- DATA SISWA -->
                    <div
                        class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border-2 border-green-100 shadow-sm">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="p-3 bg-green-600 rounded-xl">
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
                                        <label
                                            class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan</label>
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
                                        <label
                                            class="block text-sm font-semibold text-gray-700 mb-2">Penghasilan</label>
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
                                        <input type="text" name="hp_ayah"
                                            value="{{ $student->parentInfo->hp_ayah }}"
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
                                        <input type="text" name="nik_ibu"
                                            value="{{ $student->parentInfo->nik_ibu }}"
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
                                        <label
                                            class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan</label>
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
                                        <label
                                            class="block text-sm font-semibold text-gray-700 mb-2">Penghasilan</label>
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
                                        <input type="text" name="hp_ibu"
                                            value="{{ $student->parentInfo->hp_ibu }}"
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
                                            <label
                                                class="block text-sm font-semibold text-gray-700 mb-2">Kecamatan</label>
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
                                            <label
                                                class="block text-sm font-semibold text-gray-700 mb-2">Provinsi</label>
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
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Nama Wali
                                    </label>
                                    <input type="text" name="nama_wali"
                                        value="{{ $student->guardian->nama_wali }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        NIK Wali
                                    </label>
                                    <input type="text" name="nik_wali"
                                        value="{{ $student->guardian->nik_wali }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Tempat Lahir
                                    </label>
                                    <input type="text" name="tempat_lahir_wali"
                                        value="{{ $student->guardian->tempat_lahir_wali }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Tanggal Lahir
                                    </label>
                                    <input type="date" name="tanggal_lahir_wali"
                                        value="{{ $student->guardian->tanggal_lahir_wali }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Pendidikan
                                    </label>
                                    <input type="text" name="pendidikan_wali"
                                        value="{{ $student->guardian->pendidikan_wali }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Pekerjaan
                                    </label>
                                    <input type="text" name="pekerjaan_wali"
                                        value="{{ $student->guardian->pekerjaan_wali }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Penghasilan
                                    </label>
                                    <input type="text" name="penghasilan_wali"
                                        value="{{ $student->guardian->penghasilan_wali }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        No HP
                                    </label>
                                    <input type="text" name="hp_wali" value="{{ $student->guardian->hp_wali }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group md:col-span-2">
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Alamat
                                    </label>
                                    <input type="text" name="alamat_wali"
                                        value="{{ $student->guardian->alamat }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Desa
                                    </label>
                                    <input type="text" name="desa_wali" value="{{ $student->guardian->desa }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Kecamatan
                                    </label>
                                    <input type="text" name="kecamatan_wali"
                                        value="{{ $student->guardian->kecamatan }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Kabupaten
                                    </label>
                                    <input type="text" name="kabupaten_wali"
                                        value="{{ $student->guardian->kabupaten }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                                        Provinsi
                                    </label>
                                    <input type="text" name="provinsi_wali"
                                        value="{{ $student->guardian->provinsi }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
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
                            class="px-8 py-3 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-all duration-200 flex items-center gap-2 shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </button>
                        <button type="submit"
                            class="px-8 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-200 flex items-center gap-2 shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- CUSTOM CSS for Animation -->
    <style>
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
    </style>

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
    </script>

    <!-- MODAL EDIT DOKUMEN -->
    <div id="editDokumenModal" class="fixed inset-0 hidden items-center justify-center z-50">
        <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm" onclick="closeEditDokumenModal()"></div>
        <div
            class="relative bg-white rounded-2xl shadow-2xl w-[95%] max-w-6xl max-h-[90vh] overflow-y-auto modal-content">
            <div class="sticky top-0 bg-white p-6 border-b border-gray-200 rounded-t-2xl z-10">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-bold text-gray-800">Edit Dokumen</h3>
                    <button onclick="closeEditDokumenModal()" class="text-gray-500 hover:text-gray-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <p class="text-sm text-gray-600 mt-2">Upload file baru untuk mengganti dokumen yang ada</p>
            </div>

            <form action="/biodata/{{ $student->id }}/update-dokumen" method="POST" enctype="multipart/form-data"
                class="p-6">
                @csrf
                @method('PUT')

                <!-- DOKUMEN UMUM -->
                <div class="mb-8">
                    <h4 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-green-200">Dokumen Umum</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Kartu Keluarga -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Kartu Keluarga (KK)
                                @if ($student->documents && $student->documents->kk)
                                    <span class="text-green-600 text-xs">✓ Sudah ada</span>
                                @endif
                            </label>
                            <input type="file" name="kk" accept=".pdf,.jpg,.jpeg,.png"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                            @if ($student->documents && $student->documents->kk)
                                <button type="button"
                                    onclick="viewDocument('{{ Storage::url($student->documents->kk) }}', 'Kartu Keluarga')"
                                    class="text-xs text-blue-600 hover:underline mt-1 inline-block">Lihat dokumen saat
                                    ini</button>
                            @endif
                        </div>

                        <!-- Akta Kelahiran -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Akta Kelahiran
                                @if ($student->documents && $student->documents->akte)
                                    <span class="text-green-600 text-xs">✓ Sudah ada</span>
                                @endif
                            </label>
                            <input type="file" name="akte" accept=".pdf,.jpg,.jpeg,.png"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                            @if ($student->documents && $student->documents->akte)
                                <button type="button"
                                    onclick="viewDocument('{{ Storage::url($student->documents->akte) }}', 'Akta Kelahiran')"
                                    class="text-xs text-blue-600 hover:underline mt-1 inline-block">Lihat dokumen saat
                                    ini</button>
                            @endif
                        </div>

                        <!-- KTP Ayah -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                KTP Ayah
                                @if ($student->documents && $student->documents->ktp_ayah)
                                    <span class="text-green-600 text-xs">✓ Sudah ada</span>
                                @endif
                            </label>
                            <input type="file" name="ktp_ayah" accept=".pdf,.jpg,.jpeg,.png"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                            @if ($student->documents && $student->documents->ktp_ayah)
                                <button type="button"
                                    onclick="viewDocument('{{ Storage::url($student->documents->ktp_ayah) }}', 'KTP Ayah')"
                                    class="text-xs text-blue-600 hover:underline mt-1 inline-block">Lihat dokumen saat
                                    ini</button>
                            @endif
                        </div>

                        <!-- KTP Ibu -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                KTP Ibu
                                @if ($student->documents && $student->documents->ktp_ibu)
                                    <span class="text-green-600 text-xs">✓ Sudah ada</span>
                                @endif
                            </label>
                            <input type="file" name="ktp_ibu" accept=".pdf,.jpg,.jpeg,.png"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                            @if ($student->documents && $student->documents->ktp_ibu)
                                <button type="button"
                                    onclick="viewDocument('{{ Storage::url($student->documents->ktp_ibu) }}', 'KTP Ibu')"
                                    class="text-xs text-blue-600 hover:underline mt-1 inline-block">Lihat dokumen saat
                                    ini</button>
                            @endif
                        </div>

                        <!-- Surat Aktif Sekolah -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Surat Keterangan Aktif Sekolah
                                @if ($student->documents && $student->documents->surat_aktif)
                                    <span class="text-green-600 text-xs">✓ Sudah ada</span>
                                @endif
                            </label>
                            <input type="file" name="surat_aktif" accept=".pdf,.jpg,.jpeg,.png"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                            @if ($student->documents && $student->documents->surat_aktif)
                                <button type="button"
                                    onclick="viewDocument('{{ Storage::url($student->documents->surat_aktif) }}', 'Surat Keterangan Aktif')"
                                    class="text-xs text-blue-600 hover:underline mt-1 inline-block">Lihat dokumen saat
                                    ini</button>
                            @endif
                        </div>

                        <!-- Foto Anak -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Foto Anak (3x4)
                                @if ($student->documents && $student->documents->foto_anak)
                                    <span class="text-green-600 text-xs">✓ Sudah ada</span>
                                @endif
                            </label>
                            <input type="file" name="foto_anak" accept=".jpg,.jpeg,.png"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                            @if ($student->documents && $student->documents->foto_anak)
                                <button type="button"
                                    onclick="viewDocument('{{ Storage::url($student->documents->foto_anak) }}', 'Foto Anak')"
                                    class="text-xs text-blue-600 hover:underline mt-1 inline-block">Lihat dokumen saat
                                    ini</button>
                            @endif
                        </div>

                        <!-- Prestasi (Opsional) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Sertifikat Prestasi (Opsional)
                                @if ($student->documents && $student->documents->prestasi)
                                    <span class="text-green-600 text-xs">✓ Sudah ada</span>
                                @endif
                            </label>
                            <input type="file" name="prestasi" accept=".pdf,.jpg,.jpeg,.png"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                            @if ($student->documents && $student->documents->prestasi)
                                <button type="button"
                                    onclick="viewDocument('{{ Storage::url($student->documents->prestasi) }}', 'Sertifikat Prestasi')"
                                    class="text-xs text-blue-600 hover:underline mt-1 inline-block">Lihat dokumen saat
                                    ini</button>
                            @endif
                        </div>

                        <!-- KIP/PKH (Opsional) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Kartu KIP/PKH (Opsional)
                                @if ($student->documents && $student->documents->kip_pkh)
                                    <span class="text-green-600 text-xs">✓ Sudah ada</span>
                                @endif
                            </label>
                            <input type="file" name="kip_pkh" accept=".pdf,.jpg,.jpeg,.png"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                            @if ($student->documents && $student->documents->kip_pkh)
                                <button type="button"
                                    onclick="viewDocument('{{ Storage::url($student->documents->kip_pkh) }}', 'Kartu KIP/PKH')"
                                    class="text-xs text-blue-600 hover:underline mt-1 inline-block">Lihat dokumen saat
                                    ini</button>
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
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Semester {{ $i }}
                                        @if (isset($transkripData["semester_{$i}"]))
                                            <span class="text-green-600 text-xs">✓ Sudah ada</span>
                                        @endif
                                    </label>
                                    <input type="file" name="transkrip_semester_{{ $i }}"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                    @if (isset($transkripData["semester_{$i}"]))
                                        <button type="button"
                                            onclick="viewDocument('{{ Storage::url($transkripData["semester_{$i}"]) }}', 'Transkrip Semester {{ $i }}')"
                                            class="text-xs text-blue-600 hover:underline mt-1 inline-block">Lihat
                                            dokumen</button>
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                @endif

                <div class="flex justify-end gap-4 mt-8 sticky bottom-0 bg-white pt-4 border-t">
                    <button type="button" onclick="closeEditDokumenModal()"
                        class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-400">
                        Batal
                    </button>
                    <button type="submit" class="px-6 py-3 bg-[#31694E] text-white rounded-lg hover:bg-[#2a5a42]">
                        Simpan Perubahan Dokumen
                    </button>
                </div>
            </form>
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
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-6 overflow-auto max-h-[calc(90vh-80px)]" id="documentContent">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>

    <script>
        function openEditDokumenModal() {
            document.getElementById('editDokumenModal').classList.remove('hidden');
            document.getElementById('editDokumenModal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeEditDokumenModal() {
            document.getElementById('editDokumenModal').classList.add('hidden');
            document.getElementById('editDokumenModal').classList.remove('flex');
            document.body.style.overflow = 'auto';
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
    </script>

    <!-- Footer -->
    <div class="text-center py-8 text-gray-600 text-sm">
        <p>© 2024 Sistem Informasi Pendaftaran Siswa</p>
        <p class="mt-1">Terima kasih atas kepercayaan Anda 🙏</p>
    </div>

    <script>
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
    </script>

    <script>
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
</body>

</html>
