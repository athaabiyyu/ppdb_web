@extends('layouts.app_user')

@section('title', 'Pilih Lembaga')

@section('content')
    <div class="min-h-screen w-full flex items-center justify-center p-4 py-8">
        <div
            class="bg-white rounded-2xl md:rounded-3xl shadow-xl w-full md:max-w-5xl grid grid-cols-1 md:grid-cols-2 overflow-hidden">
            <!-- Left Section - Logo & Teks -->
            <div
                class="relative p-6 md:p-10 flex flex-col justify-center text-white overflow-hidden bg-[#31694E] text-center order-1 md:order-1">
                <div class="blob"></div>

                <!-- Logo -->
                <img src="{{ asset('assets/logo_yayasan.png') }}" class="w-32 md:w-52 mx-auto mb-4 md:mb-6 relative z-10 opacity-95">

                <!-- Title -->
                <h1 class="text-3xl md:text-5xl font-bold leading-tight relative z-10 drop-shadow-lg">
                    Selamat Datang!
                </h1>

                <!-- Description -->
                @unless ($jenjang === 'SD')
                    <p class="relative z-10 mt-3 md:mt-4 text-white/80 text-base md:text-lg">
                        Silakan pilih lembaga untuk melanjutkan proses pendaftaran.
                    </p>
                @else
                    <p class="relative z-10 mt-3 md:mt-4 text-white/80 text-base md:text-lg">
                        Silakan isi informasi yang kamu dapatkan.
                    </p>
                @endunless
            </div>

            <!-- Right Section - Form -->
            <div class="p-6 md:p-10 order-1 md:order-2 flex flex-col justify-center">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Pilih Lembaga</h2>
                <p class="text-gray-500 mb-6 md:mb-8 text-sm md:text-base">Silakan pilih lembaga yang ingin Anda tuju.</p>

                <form action="{{ route('pilih.lembaga') }}" method="POST">
                    @csrf
                    <input type="hidden" name="jenjang" value="{{ $jenjang }}">

                    <!-- Pilihan Lembaga -->
                    @unless ($jenjang === 'SD')
                        <div class="mb-6">
                            <p class="font-semibold mb-3 text-gray-700 text-sm md:text-base">Pilih maksimal 2 lembaga:</p>

                            <div class="grid grid-cols-1 gap-2 md:gap-3">
                                @foreach ($lembaga as $item)
                                    <label
                                        class="flex items-center gap-3 p-3 md:p-4 rounded-lg md:rounded-xl border border-gray-300 hover:border-[#31694E] hover:bg-green-50 transition cursor-pointer bg-white shadow-sm">
                                        <input type="checkbox" name="pilihan[]" value="{{ $item }}"
                                            class="checkbox-green appearance-none w-5 h-5 rounded border border-gray-400 cursor-pointer flex-shrink-0">
                                        <span class="text-gray-700 font-medium text-sm md:text-base">{{ $item }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <input type="hidden" name="pilihan[]" value="SD">
                    @endunless

                    <!-- Sumber Informasi -->
                    <div class="mb-6 relative">
                        <p class="font-semibold mb-3 text-gray-700 text-sm md:text-base">
                            Mendapatkan informasi dari mana?
                        </p>

                        <!-- Wrapper untuk panah custom -->
                        <div class="relative">
                            <select name="sumber_informasi" id="sumberSelect"
                                class="w-full p-3 md:p-4 border border-gray-300 rounded-lg md:rounded-xl focus:ring-2 focus:ring-[#31694E] focus:border-[#31694E] text-sm md:text-base appearance-none pr-10">
                                <option value="Keluarga/Tetangga">Keluarga / Tetangga</option>
                                <option value="Alumni">Alumni</option>
                                <option value="Media Sosial">Media Sosial</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <!-- Panah custom -->
                            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>

                        <input type="text" name="informasi_lainnya" id="lainnyaInput"
                            class="mt-3 w-full p-3 md:p-4 border border-gray-300 rounded-lg md:rounded-xl focus:ring-2 focus:ring-[#31694E] focus:border-[#31694E] hidden text-sm md:text-base"
                            placeholder="Tuliskan sumber informasi Anda">
                    </div>
                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full mt-4 md:mt-6 bg-[#31694E] hover:bg-[#2a5840] text-white font-semibold py-3 md:py-4 rounded-lg md:rounded-xl shadow-lg hover:shadow-xl transition text-sm md:text-base">
                        Selanjutnya
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const select = document.getElementById('sumberSelect');
        const inputLainnya = document.getElementById('lainnyaInput');

        select.addEventListener('change', function() {
            if (this.value === "Lainnya") {
                inputLainnya.classList.remove('hidden');
            } else {
                inputLainnya.classList.add('hidden');
                inputLainnya.value = "";
            }
        });
    </script>
@endpush

@push('styles')
    <style>
        .blob {
            position: absolute;
            width: 280px;
            height: 280px;
            background: rgba(255, 255, 255, 0.18);
            filter: blur(60px);
            border-radius: 50%;
            top: -60px;
            right: -40px;
        }

        @media (min-width: 768px) {
            .blob {
                width: 380px;
                height: 380px;
            }
        }

        .checkbox-green {
            background-color: white;
        }

        .checkbox-green:checked {
            background-color: white !important;
            border-color: #31694E !important;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 16 16' fill='%2331694E' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M6.173 14l-4.88-4.88 1.414-1.415L6.172 11.17 13.293 4.05l1.414 1.415z'/%3E%3C/svg%3E");
            background-position: center;
            background-repeat: no-repeat;
            background-size: 16px 16px;
        }

        @media (max-width: 640px) {
            .blob {
                width: 200px;
                height: 200px;
                top: -30px;
                right: -20px;
            }
        }
    </style>
@endpush
