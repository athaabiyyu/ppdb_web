@extends('layouts.app_user')

@section('title', 'PPDB')

@section('content')
    <!-- ================== HERO ================== -->
    <section class="relative w-full h-screen" id="home">
        <div class="swiper mySwiper w-full h-full">
            <div class="swiper-wrapper w-full h-full">
                @foreach ($sliders as $slide)
                    @if ($slide->image_path)
                        <div class="swiper-slide w-full h-full flex justify-center items-center bg-[#DDF4E7]">
                            <img src="{{ asset('storage/' . $slide->image_path) }}"
                                class="w-full mh-full object-cover rounded-lg shadow-lg" alt="Slider Image">
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination" style="--swiper-pagination-color: #31694E;"></div>
        </div>
    </section>
    <!-- ================== END HERO ================== -->

    <div class="max-w-7xl mx-auto px-6 py-16">
        <!-- ================== INFO & ALUR ================== -->
        <section class="mb-32">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-3 scroll-mt-32" id="info-alur">Informasi & Alur
                    Pendaftaran</h2>
                <p class="text-gray-600 text-lg">Panduan lengkap untuk mendaftar PPDB</p>
            </div>
            <div class="bg-white rounded-2xl shadow-xl p-8 border-t-4 border-[#31694E]">
                <div class="flex items-start gap-4 mb-6">
                    <div class="bg-green-100 p-3 rounded-lg">
                        <svg class="w-8 h-8 text-[#31694E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Informasi & Alur Pendaftaran</h2>
                        <p class="text-gray-600">Panduan lengkap untuk mendaftar PPDB</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-8 mt-8">
                    <div>
                        <h3 class="font-bold text-lg text-[#31694E] mb-4">Syarat Pendaftaran:</h3>
                        <ul class="space-y-3 text-gray-700">
                            @foreach ($requirements as $req)
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-[#31694E] mt-1 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>{{ $req->text }}</span>
                                </li>
                            @endforeach
                        </ul>

                    </div>

                    <div>
                        <h3 class="font-bold text-lg text-[#31694E] mb-4">Alur Pendaftaran:</h3>
                        <ol class="space-y-3 text-gray-700">
                            <li class="flex items-start gap-3">
                                <span
                                    class="bg-[#31694E] text-white w-7 h-7 rounded-full flex items-center justify-center font-bold flex-shrink-0">1</span>
                                <span>Pilih jenjang pendidikan yang diinginkan</span>
                            </li>
                            @foreach ($flows as $flow)
                                <li class="flex items-start gap-3">
                                    <span
                                        class="bg-[#31694E] text-white w-7 h-7 rounded-full flex items-center justify-center">
                                        {{ $flow->step_number }}
                                    </span>
                                    <span>{{ $flow->text }}</span>
                                </li>
                            @endforeach

                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================== END INFO ================== -->

        <!-- ================== UNIT PENDIDIKAN ================== -->
        <section class="mb-32">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-3 scroll-mt-32" id="unit-pendidikan">Informasi Unit
                    Pendidikan</h2>
                <p class="text-gray-600 text-lg">Klik tombol Detail untuk melihat informasi lengkap tiap lembaga</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-8 border-t-4 border-[#31694E]">
                <table class="w-full table-auto border border-gray-200 rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-3 px-4 text-left">Unit Pendidikan</th>
                            <th class="py-3 px-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($units as $unit)
                            <tr class="border-t">
                                <td class="py-3 px-4">{{ $unit->name }}</td>
                                <td class="py-3 px-4">
                                    @if ($unit->google_drive_link)
                                        <a href="{{ $unit->google_drive_link }}" target="_blank"
                                            class="bg-green-600 text-white px-4 py-2 rounded-lg">Detail</a>
                                    @else
                                        <span class="text-gray-400">Belum ada</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <!-- ================== END UNIT ================== -->

        <!-- ================== JENJANG PENDIDIKAN ================== -->
        <section class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-3 scroll-mt-32" id="pendaftaran">Pilih Jenjang
                    Pendidikan
                </h2>
                <p class="text-gray-600 text-lg">Silakan pilih jenjang pendidikan yang ingin Anda daftarkan</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- SD Card -->
                <a href="/daftar/sd"
                    class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-8 text-white text-center">
                        <svg class="w-16 h-16 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z">
                            </path>
                        </svg>
                        <h3 class="text-3xl font-bold">SD</h3>
                        <p class="text-sm opacity-90 mt-1">Sekolah Dasar</p>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-2 text-gray-600 text-sm mb-6">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Usia 6-7 tahun
                            </li>
                        </ul>

                        @if ($setting->show_register_button)
                            <button
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition group-hover:shadow-lg">
                                Daftar Sekarang →
                            </button>
                        @endif
                    </div>
                </a>

                <!-- SMP Card -->
                <a href="/daftar/smp"
                    class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-green-500 to-green-600 p-8 text-white text-center">
                        <svg class="w-16 h-16 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                            <path
                                d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z">
                            </path>
                        </svg>
                        <h3 class="text-3xl font-bold">SMP / MTS / MTSN</h3>
                        <p class="text-sm opacity-90 mt-1">Sekolah Menengah Pertama</p>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-2 text-gray-600 text-sm mb-6">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Lulusan SD/MI
                            </li>
                        </ul>


                        @if ($setting->show_register_button)
                            <button
                                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition group-hover:shadow-lg">
                                Daftar Sekarang →
                            </button>
                        @endif
                    </div>
                </a>

                <!-- SMA Card -->
                <a href="/daftar/sma"
                    class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-8 text-white text-center">
                        <svg class="w-16 h-16 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z">
                            </path>
                        </svg>
                        <h3 class="text-3xl font-bold">MAN / MA / SMK</h3>
                        <p class="text-sm opacity-90 mt-1">Sekolah Menengah Atas</p>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-2 text-gray-600 text-sm mb-6">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Lulusan SMP/MTS
                            </li>
                        </ul>

                        @if ($setting->show_register_button)
                            <button
                                class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 rounded-lg transition group-hover:shadow-lg">
                                Daftar Sekarang →
                            </button>
                        @endif

                    </div>
                </a>
            </div>
        </section>
        <!-- ================== END JENJANG ================== -->

        <!-- ================== MAP ================== -->
        <section class="max-w-7xl mx-auto px-6 py-12">
            <!-- Judul Section -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-gray-800 mb-3">Lokasi Yayasan Mambaul Maarif Denanyar Jombang
                </h2>
                <p class="text-gray-600 text-lg">Lihat peta lokasi Yayasan Mambaul Maarif Denanyar Jombang</p>
            </div>

            <!-- Maps Embed -->
            <div class="w-full rounded-3xl overflow-hidden shadow-2xl">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.1702272161723!2d112.2163839!3d-7.5332757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e783ff43fed5cb3%3A0x286ef025a0465ae8!2sMamba'ul%20Ma'arif!5e0!3m2!1sen!2sid!4v1702000000000!5m2!1sen!2sid"
                    class="w-full h-[400px]" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </section>
        <!-- ================== END MAP ================== -->
    </div>
@endsection
