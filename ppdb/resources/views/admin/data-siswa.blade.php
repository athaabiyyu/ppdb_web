<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Data Siswa - Admin Dashboard</title>
</head>

<body class="bg-gray-50">

    <!-- ================== NAVBAR ================== -->
    <nav class="bg-[#31694E] text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Left Logo & Title -->
                <div class="flex items-center space-x-4">
                    <div class="bg-white p-2 rounded-lg">
                        <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">PPDB Admin</h1>
                        <p class="text-xs text-green-100">Dashboard Panel</p>
                    </div>
                </div>

                <!-- Center Menu -->
                <ul class="hidden md:flex space-x-1">
                    <li>
                        <a href="/admin/dashboard"
                            class="px-4 py-2 rounded-lg hover:bg-white/20 font-medium flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.data_siswa') }}"
                            class="px-4 py-2 rounded-lg bg-white/20 font-medium flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                <path fill-rule="evenodd"
                                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Data Pendaftaran
                        </a>
                    </li>
                    <li>
                        <a href="/admin/pengumuman"
                            class="px-4 py-2 rounded-lg hover:bg-white/10 font-medium transition flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Pengumuman
                        </a>
                    </li>
                </ul>

                <!-- Right User Menu -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="flex items-center space-x-2 hover:bg-white/10 rounded-lg px-3 py-2 transition">
                            <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                                <span class="text-green-600 font-bold text-sm">A</span>
                            </div>
                            <span class="hidden md:block font-medium">Admin</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Logout -->
                    <form method="POST" action="/admin/logout" class="inline">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 rounded-lg font-medium transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <!-- ================== END NAVBAR ================== -->

    <div class="max-w-7xl mx-auto px-6 py-8 space-y-12">

        <h1 class="text-3xl font-bold mb-6 text-gray-800">Data Siswa per Lembaga</h1>

        @foreach ($lembagaList as $lembaga => $students)
            @php
                $jenjang = $students->first()?->jenjang ?? 'Lainnya';
            @endphp

            <!-- Judul Jenjang -->
            <div class="mb-4">
                <h2
                    class="text-2xl font-semibold text-gray-700 inline-block bg-[#31694E] px-4 py-2 rounded-lg text-white">
                    {{ $jenjang }}
                </h2>
                <hr class="border-t-4 border-[#31694E] mt-2 rounded">
            </div>

            <!-- Tabel Siswa -->
            <div class="bg-white shadow rounded-lg p-6 mb-10">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-700">{{ $lembaga }}</h3>
                    <a href="{{ route('admin.export_csv', $lembaga) }}"
                        class="bg-[#31694E] text-white px-4 py-2 rounded-md transition">
                        Export CSV
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border rounded-lg">
                        <thead class="bg-[#31694E] text-white">
                            <tr>
                                <th class="border px-3 py-2 text-left">ID</th>
                                <th class="border px-3 py-2 text-left">Registration Number</th>
                                <th class="border px-3 py-2 text-left">Nama</th>
                                <th class="border px-3 py-2 text-left">Jenis Kelamin</th>
                                <th class="border px-3 py-2 text-left">NISN</th>
                                <th class="border px-3 py-2 text-left">Asal Sekolah</th>
                                <th class="border px-3 py-2 text-left">Tanggal Lahir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $s)
                                <tr class="hover:bg-gray-50">
                                    <td class="border px-3 py-2">{{ $s->id }}</td>
                                    <td class="border px-3 py-2">{{ $s->registration_number }}</td>
                                    <td class="border px-3 py-2">{{ $s->nama }}</td>
                                    <td class="border px-3 py-2">{{ $s->jenis_kelamin }}</td>
                                    <td class="border px-3 py-2">{{ $s->nisn }}</td>
                                    <td class="border px-3 py-2">{{ $s->sekolah_asal }}</td>
                                    <td class="border px-3 py-2">
                                        {{ \Carbon\Carbon::parse($s->tanggal_lahir)->format('d-m-Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach

    </div>

</body>

</html>
