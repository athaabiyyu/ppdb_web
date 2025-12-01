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
    </style>
</head>

<body class="min-h-screen" style="background-color: #e8f5e9;">

    <!-- Header dengan Gradient Hijau -->
    <div class="gradient-bg text-white py-8 shadow-lg">
        <div class="max-w-5xl mx-auto px-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold mb-2">👨‍👩‍👦 Form Biodata Orang Tua</h1>
                    <p class="text-green-100">Lengkapi data orang tua / wali dengan benar</p>
                </div>
                <div class="hidden md:block">
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-6 py-3">
                        <p class="text-sm text-green-100">Langkah 2 dari 3</p>
                        <p class="text-xl font-bold">Data Keluarga</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

                <!-- Step 2: Aktif -->
                <div class="flex flex-col items-center">
                    <div
                        class="w-12 h-12 rounded-full gradient-bg text-white flex items-center justify-center font-bold shadow-lg">
                        2</div>
                    <span class="text-xs mt-2 font-medium text-gray-700">Data Keluarga</span>
                </div>

                <div class="flex-1 h-1 bg-gray-200 mx-2"></div>

                <!-- Step 3: Upload Dokumen -->
                <div class="flex flex-col items-center">
                    <div
                        class="w-12 h-12 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold">
                        3</div>
                    <span class="text-xs mt-2 text-gray-500">Upload Dokumen</span>
                </div>

                <div class="flex-1 h-1 bg-gray-200 mx-2"></div>

                <!-- Step 4: Selesai -->
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

            <!-- Section 1: Data Ayah -->
            <div class="section-card bg-white rounded-2xl shadow-lg p-8 mb-6">
                <div class="flex items-center mb-6 pb-4 border-b-2 border-green-100">
                    <div
                        class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center mr-3 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Data Ayah</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap Ayah</label>
                        <input type="text" name="nama_ayah" placeholder="Masukkan nama lengkap ayah"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">NIK Ayah</label>
                        <input type="text" name="nik_ayah" placeholder="16 digit NIK"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">TTL Ayah</label>
                        <input type="text" name="ttl_ayah" placeholder="Contoh: Malang, 01 Januari 1980"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan Terakhir</label>
                        <input type="text" name="pendidikan_ayah" placeholder="Contoh: S1, SMA, dll"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pekerjaan</label>
                        <input type="text" name="pekerjaan_ayah" placeholder="Contoh: Wiraswasta, PNS, dll"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Penghasilan per Bulan</label>
                        <input type="text" name="penghasilan_ayah" placeholder="Contoh: Rp 5.000.000"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                        <select name="status_ayah"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all appearance-none bg-white">
                            <option value="Hidup">✅ Masih Hidup</option>
                            <option value="Meninggal">💔 Meninggal Dunia</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">No. HP Ayah</label>
                        <input type="text" name="hp_ayah" placeholder="Contoh: 08123456789"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
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

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap Ibu</label>
                        <input type="text" name="nama_ibu" placeholder="Masukkan nama lengkap ibu"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">NIK Ibu</label>
                        <input type="text" name="nik_ibu" placeholder="16 digit NIK"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">TTL Ibu</label>
                        <input type="text" name="ttl_ibu" placeholder="Contoh: Malang, 01 Januari 1980"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan Terakhir</label>
                        <input type="text" name="pendidikan_ibu" placeholder="Contoh: S1, SMA, dll"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pekerjaan</label>
                        <input type="text" name="pekerjaan_ibu" placeholder="Contoh: Ibu Rumah Tangga, Guru, dll"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Penghasilan per Bulan</label>
                        <input type="text" name="penghasilan_ibu" placeholder="Contoh: Rp 3.000.000"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                        <select name="status_ibu"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all appearance-none bg-white">
                            <option value="Hidup">✅ Masih Hidup</option>
                            <option value="Meninggal">💔 Meninggal Dunia</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">No. HP Ibu</label>
                        <input type="text" name="hp_ibu" placeholder="Contoh: 08123456789"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
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
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Sesuai Kartu Keluarga
                            (KK)</label>
                        <textarea name="alamat_kk" rows="2" placeholder="Masukkan alamat lengkap sesuai KK"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all resize-none"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Domisili Saat Ini</label>
                        <textarea name="alamat" rows="2" placeholder="Jika berbeda dengan alamat KK, masukkan alamat domisili"
                            class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all resize-none"></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Desa / Kelurahan</label>
                            <input type="text" name="desa" placeholder="Nama desa/kelurahan"
                                class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kecamatan</label>
                            <input type="text" name="kecamatan" placeholder="Nama kecamatan"
                                class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kabupaten / Kota</label>
                            <input type="text" name="kabupaten" placeholder="Nama kabupaten/kota"
                                class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Provinsi</label>
                            <input type="text" name="provinsi" placeholder="Nama provinsi"
                                class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kode Pos</label>
                            <input type="text" name="kode_pos" placeholder="5 digit kode pos"
                                class="input-focus w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div
                class="flex flex-col sm:flex-row gap-4 justify-between items-center bg-white rounded-2xl shadow-lg p-6">
                <div class="text-sm text-gray-600">
                    <p class="font-medium">💡 Tips: Pastikan data orang tua terisi dengan lengkap dan benar</p>
                    <p class="terrrrrrrrrxt-xs mt-1">Data ini akan digunakan untuk keperluan administrasi sekolah</p>
                </div>
                <button type="submit"
                    class="bg-green-700 hover:bg-green-800 text-white px-8 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all flex items-center gap-2 w-full sm:w-auto justify-center">
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
