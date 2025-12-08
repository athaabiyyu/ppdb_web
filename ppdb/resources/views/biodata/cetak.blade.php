<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Bukti Pendaftaran</title>
</head>

<body class="bg-gray-100 p-8">

    <div class="max-w-lg mx-auto bg-white border border-green-700 rounded-2xl shadow-xl p-6">
        <!-- Judul -->
        <h1 class="text-3xl font-extrabold text-center mb-2">Bukti Pendaftaran</h1>
        <p class="text-center mb-6 font-semibold">PPDB Online</p>

        <!-- Foto Siswa -->
        <div class="text-center mb-6">
            <div class="inline-block p-1 rounded-lg shadow-inner">
                <img src="{{ asset('storage/' . $student->foto) }}" alt="Foto Siswa"
                    class="w-32 h-40 object-cover border-2 rounded-lg mx-auto">
            </div>
        </div>

        <!-- Informasi Siswa -->
        <div class="mb-6 space-y-2">
            <div class="flex justify-between bg-gray-200 p-3 rounded shadow-sm">
                <span class="font-semibold ">No Registrasi:</span>
                <span class="font-semibold ">{{ $student->registration_number }}</span>
            </div>
            <div class="flex justify-between bg-gray-200 p-3 rounded shadow-sm">
                <span class="font-semibold ">Nama:</span>
                <span class="font-semibold ">{{ $student->nama }}</span>
            </div>
            <div class="flex justify-between bg-gray-200 p-3 rounded shadow-sm">
                <span class="font-semibold ">Jenjang:</span>
                <span class="font-semibold ">{{ $student->jenjang }}</span>
            </div>
            <div class="flex justify-between bg-gray-200 p-3 rounded shadow-sm">
                <span class="font-semibold ">Pilihan Lembaga:</span>
                <span class="font-semibold ">{{ implode(', ', $student->selected_schools ?? []) }}</span>
            </div>
        </div>

        <!-- Tombol Unduh PDF dan Kembali -->
        <div class="flex justify-between mt-6">
            <!-- Tombol Kembali di kiri -->
            <a href="{{ route('biodata', $student->id) }}"
                class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg shadow hover:bg-red-400 transition duration-200">
                Kembali
            </a>

            <!-- Tombol Unduh PDF di kanan -->
            <a href="{{ route('students.download', $student->id) }}"
                class="px-6 py-3 bg-green-700  font-semibold rounded-lg shadow hover:bg-green-600 transition duration-200 text-white">
                Unduh PDF
            </a>
        </div>


        <!-- Footer -->
        <p class="text-center text-gray-500 text-sm mt-6">
            © 2024 Sistem PPDB Online - Simpan bukti ini untuk keperluan administrasi
        </p>
    </div>

</body>

</html>
