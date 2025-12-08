<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Bukti Pendaftaran PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #4CAF50;
            border-radius: 15px;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2F855A;
            margin-bottom: 5px;
        }

        p.subtitle {
            text-align: center;
            color: #38A169;
            margin-top: 0;
            font-size: 14px;
        }

        .info p {
            margin: 5px 0;
            font-size: 16px;
        }

        .info span.label {
            font-weight: bold;
            width: 140px;
            display: inline-block;
        }

        .foto {
            text-align: center;
            margin: 20px 0;
        }

        .foto img {
            width: 120px;
            height: 160px;
            object-fit: cover;
            border: 2px solid #4CAF50;
            border-radius: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            font-size: 12px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Bukti Pendaftaran</h1>
        <p class="subtitle">PPDB Online</p>

        <div class="foto">
            <img src="{{ public_path('storage/' . $student->foto) }}" alt="Foto Siswa">
        </div>

        <div class="info">
            <p><span class="label">No Registrasi:</span> {{ $student->registration_number }}</p>
            <p><span class="label">Nama:</span> {{ $student->nama }}</p>
            <p><span class="label">Kelas:</span> {{ $student->jenjang }}</p>
            <p><span class="label">Pilihan:</span> {{ implode(', ', $student->selected_schools ?? []) }}</p>
        </div>

        <div class="footer">
            © 2024 Sistem PPDB Online - Simpan bukti ini untuk keperluan administrasi
        </div>
    </div>
</body>

</html>
