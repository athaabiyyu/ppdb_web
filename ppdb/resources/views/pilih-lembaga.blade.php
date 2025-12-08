<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Pilih Lembaga</title>

    <style>
        .gradient-left {
            background: linear-gradient(135deg, #66bb6a, #2e7d32, #1b5e20);
        }

        .blob {
            position: absolute;
            width: 380px;
            height: 380px;
            background: rgba(255, 255, 255, 0.18);
            filter: blur(60px);
            border-radius: 50%;
            top: -60px;
            right: -40px;
        }

        /* --- CHECKBOX STYLE BARU --- */
        .checkbox-green {
            background-color: white;
        }

        .checkbox-green:checked {
            background-color: white !important;
            border-color: #1b5e20 !important;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 16 16' fill='%231b5e20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M6.173 14l-4.88-4.88 1.414-1.415L6.172 11.17 13.293 4.05l1.414 1.415z'/%3E%3C/svg%3E");
            background-position: center;
            background-repeat: no-repeat;
            background-size: 16px 16px;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center" style="background-color: #e8f5e9;">

    

    <div class="bg-white rounded-3xl shadow-xl max-w-5xl w-full grid grid-cols-1 md:grid-cols-2 overflow-hidden">

        <!-- LEFT SECTION -->
        <div class="relative p-10 flex flex-col justify-center text-white overflow-hidden bg-[#31694E] text-center">

            <div class="blob"></div>

            <!-- GAMBAR -->
            <img src="/assets/logo_yayasan.png" class="w-52 mx-auto mb-6 relative z-10 opacity-95">

            <h1 class="text-5xl font-bold leading-tight relative z-10 drop-shadow-lg">
                Selamat Datang!
            </h1>


            @unless ($jenjang === 'SD')
                <p class="relative z-10 mt-2 text-white/80 text-lg">
                    Silakan pilih lembaga untuk melanjutkan proses pendaftaran.
                </p>
            @else
                <p class="relative z-10 mt-2 text-white/80 text-lg">
                    Silakan isi informasi yang kamu dapatkan.
                </p>
            @endunless

        </div>


        <!-- RIGHT SECTION -->
        <div class="p-10">

            <h1 class="text-3xl font-bold text-gray-800 mb-2">Pilih Lembaga</h1>
            <p class="text-gray-500 mb-8">Silakan pilih lembaga yang ingin Anda tuju.</p>

            <form action="/pilih-lembaga" method="POST">
                @csrf
                <input type="hidden" name="jenjang" value="{{ $jenjang }}">

                @unless ($jenjang === 'SD')
                    <div class="mb-6">
                        <p class="font-semibold mb-2 text-gray-700">Pilih maksimal 2 lembaga:</p>

                        <div class="grid grid-cols-1 gap-3">
                            @foreach ($lembaga as $item)
                                <label
                                    class="flex items-center gap-3 p-3 rounded-xl border border-gray-300 hover:border-green-600 transition cursor-pointer bg-white shadow-sm">
                                    <input type="checkbox" name="pilihan[]" value="{{ $item }}"
                                        class="checkbox-green appearance-none w-5 h-5 rounded border border-gray-400 cursor-pointer">
                                    <span class="text-gray-700 font-medium">{{ $item }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @else
                    <!-- Jika jenjang SD, langsung kirim pilihan SD otomatis -->
                    <input type="hidden" name="pilihan[]" value="SD">
                @endunless


                <div class="mb-6">
                    <p class="font-semibold mb-2 text-gray-700">Mendapatkan informasi dari mana?</p>

                    <select name="sumber_informasi" id="sumberSelect"
                        class="mt-2 w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-600 focus:border-green-600">
                        <option value="Keluarga/Tetangga">Keluarga / Tetangga</option>
                        <option value="Alumni">Alumni</option>
                        <option value="Media Sosial">Media Sosial</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>

                    <input type="text" name="informasi_lainnya" id="lainnyaInput"
                        class="mt-3 w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-600 focus:border-green-600 hidden"
                        placeholder="Tuliskan sumber informasi Anda">
                </div>

                <button
                    class="w-full mt-4 bg-[#31694E] hover:bg-green-800 text-white font-semibold py-3 rounded-xl shadow-lg transition">
                    Selanjutnya
                </button>

            </form>
        </div>
    </div>

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

</body>

</html>
