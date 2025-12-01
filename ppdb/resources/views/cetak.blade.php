<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Bukti PPDB</title>
</head>

<body class="p-8 bg-white">
    <div class="max-w-lg mx-auto border p-6">
        <h1 class="text-lg font-bold mb-4">Bukti Pendaftaran</h1>
        <p>No Registrasi: <strong>{{ $student->registration_number }}</strong></p>
        <p>Nama: {{ $student->nama }}</p>
        <p>Kelas: {{ $student->jenjang }}</p>
        <p>Pilihan: {{ implode(', ', $student->selected_schools ?? []) }}</p>

        <div class="mt-4">
            <img src="{{ asset('storage/' . $student->foto) }}" alt="foto" class="w-24 h-32 object-cover">
        </div>
    </div>
</body>

</html>
