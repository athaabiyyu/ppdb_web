@extends('layouts.app_user')

@section('title', 'PPDB')
@push('styles')
    <style>
        .swiper-slide img {
            object-fit: fill;
        }
    </style>
@endpush

@section('content')
    <!-- ================== SLIDER ================== -->
    <section class="relative w-full" id="home">
        <div class="swiper mySwiper w-full h-[50vh] sm:h-[60vh] md:h-[70vh] lg:h-screen">
            <div class="swiper-wrapper w-full h-full">
                @foreach ($sliders as $slide)
                    @if ($slide->image_path)
                        <div class="swiper-slide w-full h-full">
                            <div class="relative w-full h-full">
                                <img src="{{ asset('storage/' . $slide->image_path) }}" class="w-full h-full object-cover"
                                    alt="Slider Image" loading="lazy">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="swiper-pagination" style="--swiper-pagination-color: #31694E;"></div>
        </div>
    </section>

    <!-- ================== MAIN CONTENT ================== -->
    <div class="max-w-7xl mx-auto px-6 py-16">
        <!-- ================== INFO & ALUR ================== -->
        <section class="mb-32">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-3 scroll-mt-32" id="info-alur">Syarat & Alur Pendaftaran
                </h2>
                <p class="text-gray-600 text-lg">Panduan lengkap untuk mendaftar PPDB</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-8 border-t-4 border-[#31694E]">
                <div class="grid md:grid-cols-2 gap-8 mt-2">

                    {{-- Syarat Pendaftaran --}}
                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <div
                                class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#31694E]/10 to-[#4a9b6f]/20 flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#31694E]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-2xl text-[#31694E]">Syarat Pendaftaran</h3>
                                <p class="text-gray-500 text-sm">Persyaratan yang diperlukan</p>
                            </div>
                        </div>

                        <ul class="space-y-4 pl-1">
                            @forelse ($requirements as $req)
                                <li class="group relative">
                                    <div
                                        class="flex items-start gap-4 p-4 rounded-xl border border-gray-200 
                                        hover:border-[#31694E]/20 hover:shadow-sm transition-all duration-300
                                        hover:translate-x-1 hover:bg-gradient-to-r from-white to-[#31694E]/5">
                                        <div class="flex-shrink-0 mt-1">
                                            <div
                                                class="w-8 h-8 rounded-lg bg-gradient-to-br from-[#31694E] to-[#4a9b6f] flex items-center justify-center
                                                transition-colors duration-300">
                                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <span
                                                class="text-gray-700 text-base font-medium">{{ ucfirst(strtolower($req->text)) }}</span>
                                            <div class="mt-1 flex items-center gap-2">
                                                <span class="w-1 h-1 rounded-full bg-[#31694E]/30"></span>
                                                <span class="text-xs text-gray-400">Wajib dipenuhi</span>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <span
                                                class="text-xs font-medium px-2.5 py-1 rounded-full bg-[#31694E]/10 text-[#31694E]">
                                                {{ $loop->iteration }}
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <div class="text-center py-10 bg-gray-50 rounded-xl border-2 border-dashed border-gray-200">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-gray-500 font-medium">Belum ada syarat pendaftaran</p>
                                    <p class="text-gray-400 text-sm mt-1">Admin sedang menyiapkan informasi</p>
                                </div>
                            @endforelse
                        </ul>
                    </div>

                    {{-- Alur Pendaftaran --}}
                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <div
                                class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#31694E]/10 to-[#4a9b6f]/20 flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#31694E]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-2xl text-[#31694E]">Alur Pendaftaran</h3>
                                <p class="text-gray-500 text-sm">Tahapan pendaftaran</p>
                            </div>
                        </div>

                        <ol class="space-y-4 pl-1">
                            @forelse ($flows as $flow)
                                <li class="group relative">
                                    <div
                                        class="flex items-start gap-4 p-4 rounded-xl border border-gray-200 
                                        hover:border-[#31694E]/20 hover:shadow-sm transition-all duration-300
                                        hover:translate-x-1 hover:bg-gradient-to-r from-white to-[#31694E]/5">
                                        <div class="flex-shrink-0">
                                            <div class="relative">
                                                <div
                                                    class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#31694E] to-[#4a9b6f] 
                                                    flex items-center justify-center text-white font-bold text-sm
                                                    group-hover:scale-105 transition-transform duration-300">
                                                    {{ $flow->step_number }}
                                                </div>
                                                @if (!$loop->last)
                                                    <div
                                                        class="absolute left-1/2 -bottom-4 w-0.5 h-6 -translate-x-1/2 
                                                        bg-gradient-to-b from-[#31694E]/30 to-transparent">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <span
                                                class="text-gray-700 text-base font-medium">{{ ucfirst(strtolower($flow->text)) }}</span>
                                            <div class="mt-1 flex items-center gap-2">
                                                <span class="w-1 h-1 rounded-full bg-[#31694E]/30"></span>
                                                <span class="text-xs text-gray-400">Langkah {{ $flow->step_number }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <div class="text-center py-10 bg-gray-50 rounded-xl border-2 border-dashed border-gray-200">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    <p class="text-gray-500 font-medium">Belum ada alur pendaftaran</p>
                                    <p class="text-gray-400 text-sm mt-1">Admin sedang menyiapkan informasi</p>
                                </div>
                            @endforelse
                        </ol>
                    </div>
                </div>

                {{-- Note Section --}}
                <div class="mt-6 pt-8 border-t-2 border-gray-200">
                    <div class="flex items-start gap-4 p-5 bg-gradient-to-r from-[#31694E]/5 to-[#4a9b6f]/5 rounded-2xl">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-lg bg-[#31694E]/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#31694E]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-semibold text-[#31694E] text-lg mb-1">Informasi Penting</h4>
                            <p class="text-gray-600 text-sm">
                                Pastikan semua syarat dan alur pendaftaran dipahami dengan baik.
                                Jika ada pertanyaan, silakan hubungi panitia PPDB di
                                <span class="font-medium text-[#31694E]">Yayasan Mamba'ul Ma'arif Denanyar Jombang</span>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================== INFO UNIT PENDIDIKAN ================== -->
        <section class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-3 scroll-mt-32" id="info-unit-pendidikan">Informasi Unit
                    Pendidikan</h2>
                <p class="text-gray-600 text-lg">Klik tombol Detail untuk melihat informasi lengkap tiap lembaga</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-8 border-t-4 border-[#31694E]">
                <table class="w-full table-auto border-collapse rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-[#31694E] text-white">
                            <th class="w-1/2 py-3 px-4 text-center border-b-2 border-r-2 border-white">Unit Pendidikan</th>
                            <th class="w-1/2 py-3 px-4 text-center border-b-2 border-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($units as $unit)
                            <tr class="border-t-2 border-r-2 border-l-2">
                                <td class="py-3 px-6 font-bold text-[#31694E] font-xl capitalize border-r-2 border-b-2">
                                    {{ $unit->name }}</td>
                                <td class="py-3 px-6 text-center border-b-2">
                                    @if ($unit->google_drive_link)
                                        <a href="{{ $unit->google_drive_link }}" target="_blank"
                                            class="bg-green-100 text-green-700 hover:bg-green-200 px-3 sm:px-4 py-2 sm:py-2 rounded-lg transition text-sm sm:text-base inline-block text-center w-full sm:w-auto">
                                            Detail
                                        </a>
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

        <!-- ================== PILIH JENJANG PENDIDIKAN ================== -->
        <section class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-3 scroll-mt-32" id="pendaftaran">Pilih Jenjang Pendidikan
                </h2>
                <p class="text-gray-600 text-lg">Silakan pilih jenjang pendidikan yang ingin Anda daftarkan</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- SD Card -->
                <a href="{{ route('pilih.jenjang', ['jenjang' => 'SD']) }}"
                    class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-[#2A5B47] to-[#3A7D65] p-8 text-white text-center">
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
                                <svg class="w-4 h-4 text-[#2A5B47]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Usia 6-7 tahun
                            </li>
                        </ul>

                        @if ($setting->show_register_button)
                            <button
                                class="w-full bg-[#2A5B47] hover:bg-[#31694E] text-white font-semibold py-3 rounded-lg transition group-hover:shadow-lg">
                                Daftar Sekarang →
                            </button>
                        @endif
                    </div>
                </a>

                <!-- SMP Card -->
                <a href="{{ route('pilih.jenjang', ['jenjang' => 'SMP']) }}"
                    class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-[#31694E] to-[#418A6B] p-8 text-white text-center">
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
                                <svg class="w-4 h-4 text-[#31694E]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Lulusan SD/MI
                            </li>
                        </ul>

                        @if ($setting->show_register_button)
                            <button
                                class="w-full bg-[#31694E] hover:bg-[#3A7D65] text-white font-semibold py-3 rounded-lg transition group-hover:shadow-lg">
                                Daftar Sekarang →
                            </button>
                        @endif
                    </div>
                </a>

                <!-- SMA Card -->
                <a href="{{ route('pilih.jenjang', ['jenjang' => 'SMA']) }}"
                    class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-[#418A6B] to-[#519B7D] p-8 text-white text-center">
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
                                <svg class="w-4 h-4 text-[#418A6B]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Lulusan SMP/MTS
                            </li>
                        </ul>

                        @if ($setting->show_register_button)
                            <button
                                class="w-full bg-[#418A6B] hover:bg-[#519B7D] text-white font-semibold py-3 rounded-lg transition group-hover:shadow-lg">
                                Daftar Sekarang →
                            </button>
                        @endif
                    </div>
                </a>
            </div>
        </section>

        <!-- ================== MAP ================== -->
        <section class="max-w-7xl mx-auto px-6 pt-12">
            <!-- Judul Section -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-gray-800 mb-3 scroll-mt-32" id="lokasi">Lokasi Yayasan Mamba'ul
                    Ma'arif Denanyar Jombang
                </h2>
                <p class="text-gray-600 text-lg">Lihat peta lokasi Yayasan Mamba'ul Ma'arif Denanyar Jombang</p>
            </div>

            <!-- Maps Embed -->
            <div class="w-full rounded-3xl overflow-hidden shadow-2xl">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.1702272161723!2d112.2163839!3d-7.5332757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e783ff43fed5cb3%3A0x286ef025a0465ae8!2sMamba'ul%20Ma'arif!5e0!3m2!1sen!2sid!4v1702000000000!5m2!1sen!2sid"
                    class="w-full h-[450px]" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                }
            });
        });
    </script>
@endpush
