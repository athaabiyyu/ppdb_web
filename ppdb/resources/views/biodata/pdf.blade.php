<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Bukti Pendaftaran PDF</title>

    <style>
        /* ====== RESET ====== */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            /* bg-gray-100 */
            padding: 30px;
        }

        /* ====== CONTAINER ====== */
        .card {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #15803d;
            /* border-green-700 */
            border-radius: 18px;
            /* rounded-2xl */
            padding: 24px;
            /* p-6 */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            /* shadow-xl */
        }

        /* ====== TITLE ====== */
        h1 {
            text-align: center;
            font-size: 26px;
            font-weight: 800;
            /* font-extrabold */
            margin-bottom: 4px;
        }

        p.subtitle {
            text-align: center;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* ====== FOTO SISWA ====== */
        .foto {
            text-align: center;
            margin-bottom: 25px;
        }

        .foto img {
            width: 130px;
            /* mirip w-32 */
            height: 165px;
            /* mirip h-40 */
            object-fit: cover;
            border: 2px solid #ccc;
            border-radius: 12px;
        }

        /* ====== INFO BOX ====== */
        .info-item {
            display: flex;
            justify-content: space-between;
            background: #e5e7eb;
            /* bg-gray-200 */
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        /* ====== FOOTER ====== */
        .footer {
            text-align: center;
            font-size: 13px;
            color: #6b7280;
            margin-top: 30px;
        }
    </style>

</head>

<body>

    <div class="card">

        <h1>Bukti Pendaftaran</h1>
        <p class="subtitle">PPDB Online</p>

        <!-- Foto -->
        <div class="foto">
            <img src="{{ public_path('storage/' . $student->foto) }}" alt="Foto Siswa">
        </div>

        <!-- Data Siswa -->
        <div class="info-item">
            <span>No Registrasi:</span>
            <span>{{ $student->registration_number }}</span>
        </div>

        <div class="info-item">
            <span>Nama:</span>
            <span>{{ $student->nama }}</span>
        </div>

        <div class="info-item">
            <span>Jenjang:</span>
            <span>{{ $student->jenjang }}</span>
        </div>

        <div class="info-item">
            <span>Pilihan Lembaga:</span>
            <span>{{ implode(', ', $student->selected_schools ?? []) }}</span>
        </div>

        <!-- Footer -->
        <div class="footer">
            © 2024 Sistem PPDB Online - Simpan bukti ini untuk keperluan administrasi
        </div>

    </div>

</body>

</html>
