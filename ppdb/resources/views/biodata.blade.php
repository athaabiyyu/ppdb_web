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
            background: linear-gradient(135deg, #66bb6a, #2e7d32, #1b5e20);
        }
        
        .section-card {
            transition: all 0.3s ease;
        }

        .section-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 25px 30px -5px rgba(0, 0, 0, 0.15);
        }

        @keyframes confetti {
            0% { transform: translateY(0) rotateZ(0deg); opacity: 1; }
            100% { transform: translateY(1000px) rotateZ(720deg); opacity: 0; }
        }

        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background: #f0f;
            animation: confetti 3s ease-in-out infinite;
        }

        @keyframes checkmark {
            0% { stroke-dashoffset: 100; }
            100% { stroke-dashoffset: 0; }
        }

        .checkmark {
            stroke-dasharray: 100;
            stroke-dashoffset: 100;
            animation: checkmark 0.5s ease-in-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>
</head>

<body class="min-h-screen" style="background-color: #e8f5e9;">
    
    <!-- Header dengan Gradient Hijau -->
    <div class="gradient-bg text-white py-8 shadow-lg">
        <div class="max-w-5xl mx-auto px-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold mb-2">🎉 Pendaftaran Berhasil!</h1>
                    <p class="text-green-100">Selamat! Data Anda telah tersimpan dengan baik</p>
                </div>
                <div class="hidden md:block">
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-6 py-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="text-sm text-green-100">Status</p>
                                <p class="text-lg font-bold">Selesai</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 py-8">
        
        <!-- Progress Indicator - All Complete -->
        <div class="mb-8 fade-in-up">
            <div class="flex justify-between items-center max-w-2xl mx-auto">
                <div class="flex flex-col items-center relative z-10">
                    <div class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center font-bold shadow-lg">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="text-xs mt-2 font-medium text-gray-700">Data Pribadi</span>
                </div>
                <div class="flex-1 h-1 bg-green-500 mx-4"></div>
                <div class="flex flex-col items-center">
                    <div class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center font-bold shadow-lg">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="text-xs mt-2 font-medium text-gray-700">Data Keluarga</span>
                </div>
                <div class="flex-1 h-1 bg-green-500 mx-4"></div>
                <div class="flex flex-col items-center">
                    <div class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center font-bold shadow-lg">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="text-xs mt-2 font-medium text-gray-700">Upload Dokumen</span>
                </div>
                <div class="flex-1 h-1 bg-green-500 mx-4"></div>
                <div class="flex flex-col items-center">
                    <div class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center font-bold shadow-lg">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="text-xs mt-2 font-medium text-green-700 font-semibold">Selesai</span>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        <div class="bg-green-50 border-2 border-green-500 rounded-2xl p-6 mb-6 fade-in-up" style="animation-delay: 0.2s;">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-bold text-green-900 mb-1">Pendaftaran Berhasil Disimpan!</h3>
                    <p class="text-green-700">Terima kasih telah menyelesaikan proses pendaftaran. Silakan cetak bukti pendaftaran Anda.</p>
                </div>
            </div>
        </div>

        <!-- Main Card - Biodata -->
        <div class="section-card bg-white rounded-2xl shadow-lg p-8 mb-6 fade-in-up" style="animation-delay: 0.3s;">
            <div class="flex items-center mb-6 pb-4 border-b-2 border-green-100">
                <div class="w-10 h-10 rounded-lg gradient-bg text-white flex items-center justify-center mr-3 shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Ringkasan Biodata</h2>
            </div>

            <!-- Profile Section -->
            <div class="flex flex-col md:flex-row gap-6 mb-8">
                <div class="flex-shrink-0">
                    <div class="w-32 h-40 bg-gray-100 rounded-xl overflow-hidden border-4 border-green-100 shadow-lg">
                        @if($student->foto)
                            <img src="{{ asset('storage/'.$student->foto) }}" alt="foto" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-green-100 to-green-200">
                                <svg class="w-16 h-16 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="flex-1">
                    <div class="mb-4">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $student->nama }}</h2>
                        <div class="inline-flex items-center gap-2 bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Terdaftar
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 rounded-xl p-4">
                            <p class="text-xs text-gray-500 mb-1">No. Registrasi</p>
                            <p class="text-lg font-bold text-gray-800">{{ $student->registration_number }}</p>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4">
                            <p class="text-xs text-gray-500 mb-1">Jenjang Pendidikan</p>
                            <p class="text-lg font-bold text-gray-800">{{ $student->jenjang }}</p>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4 md:col-span-2">
                            <p class="text-xs text-gray-500 mb-1">Pilihan Lembaga</p>
                            <p class="text-lg font-bold text-gray-800">{{ implode(', ', $student->selected_schools ?? ['Belum dipilih']) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Parent Info Section -->
            @if($student->parentInfo)
            <div class="border-t-2 border-gray-100 pt-6">
                <h3 class="font-bold text-lg text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Data Orang Tua / Wali
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-blue-50 rounded-xl p-5 border border-blue-100">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-blue-600 font-semibold">AYAH</p>
                                <p class="font-bold text-gray-800">{{ $student->parentInfo->nama_ayah }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>{{ $student->parentInfo->hp_ayah }}</span>
                        </div>
                    </div>

                    <div class="bg-pink-50 rounded-xl p-5 border border-pink-100">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-pink-500 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-pink-600 font-semibold">IBU</p>
                                <p class="font-bold text-gray-800">{{ $student->parentInfo->nama_ibu }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>{{ $student->parentInfo->hp_ibu }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- Action Buttons -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6 fade-in-up" style="animation-delay: 0.4s;">
            <a href="/cetak/{{ $student->id }}" class="bg-green-600 hover:bg-green-700 text-white px-8 py-5 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all flex items-center justify-center gap-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                </svg>
                <span>Cetak Bukti Pendaftaran</span>
            </a>

            <a href="/daftar/sd" class="bg-white hover:bg-gray-50 text-gray-700 px-8 py-5 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all flex items-center justify-center gap-3 border-2 border-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                <span>Edit Data</span>
            </a>
        </div>

        <!-- Info Next Steps -->
        <div class="bg-white rounded-2xl shadow-lg p-6 fade-in-up" style="animation-delay: 0.5s;">
            <h3 class="font-bold text-lg text-gray-800 mb-4 flex items-center gap-2">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Langkah Selanjutnya
            </h3>
            <ul class="space-y-3">
                <li class="flex items-start gap-3">
                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                        <span class="text-white text-xs font-bold">1</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Cetak Bukti Pendaftaran</p>
                        <p class="text-sm text-gray-600">Download dan simpan bukti pendaftaran untuk keperluan administrasi</p>
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                        <span class="text-white text-xs font-bold">2</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Tunggu Pengumuman</p>
                        <p class="text-sm text-gray-600">Pantau email atau nomor HP yang didaftarkan untuk informasi selanjutnya</p>
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                        <span class="text-white text-xs font-bold">3</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Hubungi Sekolah</p>
                        <p class="text-sm text-gray-600">Jika ada pertanyaan, silakan hubungi pihak sekolah untuk informasi lebih lanjut</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    <div class="text-center py-8 text-gray-600 text-sm">
        <p>© 2024 Sistem Informasi Pendaftaran Siswa</p>
        <p class="mt-1">Terima kasih atas kepercayaan Anda 🙏</p>
    </div>

</body>

</html>