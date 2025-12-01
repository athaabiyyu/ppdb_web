<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Form Data Pribadi</title>
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
            background: linear-gradient(135deg, #66bb6a, #2e7d32, #1b5e20);
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

        input:focus,
        select:focus,
        textarea:focus {
            transform: scale(1.01);
            transition: all 0.2s ease;
        }

        .step-indicator {
            position: relative;
        }

        .step-indicator::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background: #e5e7eb;
            top: 20px;
            left: 50%;
            z-index: -1;
        }
    </style>
</head>

<body class="min-h-screen" style="background-color: #e8f5e9;">

    <!-- Header dengan Gradient Hijau -->
    <div class="gradient-bg text-white py-8 shadow-lg">
        <div class="max-w-5xl mx-auto px-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold mb-2">📋 Form Data Pribadi</h1>
                    <p class="text-green-100">Jenjang: <span class="font-semibold">{{ $jenjang }}</span></p>
                </div>
                <div class="hidden md:block">
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-6 py-3">
                        <p class="text-sm text-green-100">Langkah 1 dari 3</p>
                        <p class="text-xl font-bold">Data Siswa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 py-8">

        <!-- Progress Indicator -->
        <div class="mb-8">
            <div class="flex justify-between items-center max-w-3xl mx-auto">

                <!-- Step 1 -->
                <div class="flex flex-col items-center relative z-10">
                    <div
                        class="w-12 h-12 rounded-full gradient-bg text-white flex items-center justify-center font-bold shadow-lg">
                        1</div>
                    <span class="text-xs mt-2 font-medium text-gray-700">Data Pribadi</span>
                </div>

                <div class="flex-1 h-1 bg-gray-200 mx-2"></div>

                <!-- Step 2 -->
                <div class="flex flex-col items-center">
                    <div
                        class="w-12 h-12 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold">
                        2</div>
                    <span class="text-xs mt-2 text-gray-500">Data Keluarga</span>
                </div>

                <div class="flex-1 h-1 bg-gray-200 mx-2"></div>

                <!-- Step 3 (Upload Dokumen) -->
                <div class="flex flex-col items-center">
                    <div
                        class="w-12 h-12 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold">
                        3</div>
                    <span class="text-xs mt-2 text-gray-500">Upload Dokumen</span>
                </div>

                <div class="flex-1 h-1 bg-gray-200 mx-2"></div>

                <!-- Step 4 (Selesai) -->
                <div class="flex flex-col items-center">
                    <div
                        class="w-12 h-12 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold">
                        4</div>
                    <span class="text-xs mt-2 text-gray-500">Selesai</span>
                </div>
            </div>
        </div>


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
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama" placeholder="Masukkan nama sesuai Kartu Keluarga"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kelamin</label>
                        <select name="jenis_kelamin"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all appearance-none bg-white">
                            <option value="L">🙋‍♂️ Laki-laki</option>
                            <option value="P">🙋‍♀️ Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Agama</label>
                        <input type="text" name="agama" placeholder="Contoh: Islam, Kristen, dll"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">NISN</label>
                        <input type="text" name="nisn" placeholder="Nomor Induk Siswa Nasional"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">TTL (Tempat, Tanggal
                            Lahir)</label>
                        <input type="text" name="ttl" placeholder="Contoh: Jakarta, 01 Januari 2010"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">NIK</label>
                        <input type="text" name="nik" placeholder="Nomor Induk Kependudukan (16 digit)"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">No. Kartu Keluarga</label>
                        <input type="text" name="no_kk" placeholder="Nomor KK (16 digit)"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
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

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Hobi</label>
                        <input type="text" name="hobi" placeholder="Contoh: Membaca, Olahraga, Musik"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Cita-cita</label>
                        <input type="text" name="cita_cita" placeholder="Contoh: Dokter, Guru, Pengusaha"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
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

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Anak ke-</label>
                        <input type="number" name="anak_ke" placeholder="1" min="1"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Saudara</label>
                        <input type="number" name="jumlah_saudara" placeholder="0" min="0"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tinggal Dengan</label>
                        <input type="text" name="tinggal_dengan" placeholder="Contoh: Orang Tua"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
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

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Rencana Tempat Tinggal</label>
                        <select name="rencana_tinggal"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all appearance-none bg-white">
                            <option value="Asrama">🏢 Asrama</option>
                            <option value="Rumah">🏠 Rumah</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jarak ke Sekolah</label>
                        <select name="jarak_tempat_tinggal"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all appearance-none bg-white">
                            <option value="<1 km">📍 Kurang dari 1 km</option>
                            <option value="1-5 km">📍 1-5 km</option>
                            <option value=">5 km">📍 Lebih dari 5 km</option>
                        </select>
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
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Sekolah Asal</label>
                        <input type="text" name="sekolah_asal" placeholder="Contoh: SD Negeri 1 Malang"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Sekolah Asal</label>
                        <textarea name="alamat_sekolah_asal" rows="3" placeholder="Masukkan alamat lengkap sekolah asal"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all resize-none"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">NPSN / NSM</label>
                        <input type="text" name="npsn_nsm" placeholder="Nomor Pokok Sekolah Nasional"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div
                class="flex flex-col sm:flex-row gap-4 justify-between items-center bg-white rounded-2xl shadow-lg p-6">
                <div class="text-sm text-gray-600">
                    <p class="font-medium">💡 Tips: Pastikan semua data terisi dengan benar</p>
                    <p class="text-xs mt-1">Field bertanda <span class="text-red-500">*</span> wajib diisi</p>
                </div>
                <button type="submit"
                    class="bg-green-700 hover:bg-green-800 text-white px-8 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all flex items-center gap-2 w-full sm:w-auto justify-center">
                    <span>Selanjutnya</span>
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

</html
