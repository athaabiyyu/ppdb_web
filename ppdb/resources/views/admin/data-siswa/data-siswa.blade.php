@extends('layouts.app_admin')

@section('title', 'Data Siswa')

@section('content')
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
@endsection
