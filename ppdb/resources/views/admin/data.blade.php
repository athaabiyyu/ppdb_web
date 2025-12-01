<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Data - {{ $lembaga }}</title>
</head>
<body class="bg-gray-100">
  <div class="max-w-6xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Data Pendaftar - {{ $lembaga }}</h1>

    <div class="mb-4">
      <a href="/admin/{{ $lembaga }}/export/csv" class="bg-blue-600 text-white px-4 py-2 rounded">Export CSV</a>
    </div>

    <div class="bg-white p-4 rounded shadow">
      <table class="w-full table-auto">
        <thead>
          <tr class="text-left">
            <th class="px-2 py-1">Reg</th>
            <th class="px-2 py-1">Nama</th>
            <th class="px-2 py-1">Jenjang</th>
            <th class="px-2 py-1">Pilihan</th>
            <th class="px-2 py-1">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($students as $s)
            <tr>
              <td class="border px-2 py-1">{{ $s->registration_number }}</td>
              <td class="border px-2 py-1">{{ $s->nama }}</td>
              <td class="border px-2 py-1">{{ $s->jenjang }}</td>
              <td class="border px-2 py-1">{{ implode(', ',$s->selected_schools ?? []) }}</td>
              <td class="border px-2 py-1"><a href="/admin/{{ $lembaga }}/{{ $s->id }}" class="text-blue-600">Detail</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div class="mt-4">{{ $students->links() }}</div>
    </div>
  </div>
</body>
</html>
