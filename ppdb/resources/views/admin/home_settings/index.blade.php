<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Pengaturan Halaman Home</title>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="max-w-6xl mx-auto py-10">

        <h1 class="text-3xl font-bold mb-6">Pengaturan Halaman Home</h1>

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="mb-5 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- GRID: SLIDER - SYARAT - ALUR - TOGGLE --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- ===================== SLIDER ===================== --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Slider Gambar</h2>

                {{-- Upload Form --}}
                <form action="/admin/home-settings/slider" method="POST" enctype="multipart/form-data" class="mb-4">
                    @csrf
                    <label class="block mb-1 font-medium">Upload Gambar Slider</label>
                    <input type="file" name="image" 
                           class="block w-full border rounded p-2 mb-3">

                    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Tambah Gambar
                    </button>
                </form>

                {{-- List Slider --}}
                <h3 class="font-semibold mb-2">Daftar Slider:</h3>

                <div class="space-y-3">
                    @foreach($sliders as $s)
                    <div class="flex items-center justify-between p-3 bg-gray-50 border rounded">
                        <img src="{{ asset('storage/'.$s->image_path) }}" 
                             class="w-24 h-16 object-cover rounded">

                        <form action="/admin/home-settings/slider/{{ $s->id }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </div>
                    @endforeach

                    @if($sliders->count() == 0)
                        <p class="text-gray-500">Belum ada slider.</p>
                    @endif
                </div>
            </div>


            {{-- ===================== SYARAT PENDAFTARAN ===================== --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Syarat Pendaftaran</h2>

                {{-- Tambah --}}
                <form action="/admin/home-settings/requirement" method="POST" class="mb-4">
                    @csrf
                    <label class="block mb-1 font-medium">Tambah Syarat</label>
                    <input type="text" name="text" placeholder="Contoh: Fotokopi KK"
                           class="w-full border rounded p-2 mb-3">

                    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Tambah
                    </button>
                </form>

                {{-- List --}}
                <h3 class="font-semibold mb-2">Daftar Syarat:</h3>

                <ul class="space-y-2">
                    @foreach($requirements as $req)
                    <li class="flex justify-between items-center bg-gray-100 p-3 rounded border">
                        <span>{{ $req->text }}</span>
                        <form action="/admin/home-settings/requirement/{{ $req->id }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </li>
                    @endforeach

                    @if($requirements->count() == 0)
                        <p class="text-gray-500">Belum ada syarat pendaftaran.</p>
                    @endif
                </ul>
            </div>


            {{-- ===================== ALUR PENDAFTARAN ===================== --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Alur Pendaftaran</h2>

                {{-- Tambah --}}
                <form action="/admin/home-settings/flow" method="POST" class="mb-4">
                    @csrf
                    <label class="block mb-1 font-medium">Urutan Step</label>
                    <input type="number" name="step_number" placeholder="1" 
                           class="w-full border rounded p-2 mb-3">

                    <label class="block mb-1 font-medium">Deskripsi</label>
                    <input type="text" name="text" placeholder="Contoh: Mengisi formulir pendaftaran"
                           class="w-full border rounded p-2 mb-3">

                    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Tambah Alur
                    </button>
                </form>

                {{-- List --}}
                <h3 class="font-semibold mb-2">Daftar Alur:</h3>

                <ul class="space-y-2">
                    @foreach($flows as $flow)
                    <li class="flex justify-between bg-gray-100 p-3 rounded border">
                        <span class="flex gap-2">
                            <span class="font-bold">{{ $flow->step_number }}.</span>
                            {{ $flow->text }}
                        </span>
                        <form action="/admin/home-settings/flow/{{ $flow->id }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </li>
                    @endforeach

                    @if($flows->count() == 0)
                        <p class="text-gray-500">Belum ada alur pendaftaran.</p>
                    @endif
                </ul>
            </div>


            {{-- ===================== PENGATURAN TOMBOL DAFTAR ===================== --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Pengaturan Tombol Daftar</h2>

                <p class="mb-4">Tombol "Daftar Sekarang" di halaman utama:</p>

                <form action="/admin/home-settings/toggle-register-button" method="POST">
                    @csrf
                    <button 
                        class="{{ $setting->show_register_button ? 'bg-red-600' : 'bg-green-600' }} 
                               text-white px-5 py-2 rounded hover:opacity-90">
                        {{ $setting->show_register_button ? 'Nonaktifkan Tombol' : 'Aktifkan Tombol' }}
                    </button>
                </form>

                <p class="mt-3 text-gray-600">
                    Status saat ini:
                    <span class="font-bold">
                        {{ $setting->show_register_button ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </p>
            </div>

        </div>
    </div>

</body>
</html>
