@extends('layouts.app_admin')

@section('title', 'Data Siswa')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100">
        <div class="max-w-7xl mx-auto px-6 py-12">
            {{-- Header Section --}}
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-3">
                    <div class="h-10 w-1 bg-gradient-to-b from-[#31694E] to-[#4a9b6f] rounded-full"></div>
                    <h1 class="text-4xl font-bold text-[#31694E]">Data Pendaftar Tiap Lembaga</h1>
                </div>
                <p class="text-gray-600 ml-4">Lihat dan Export Data Pendaftar</p>
            </div>

            @php
                $groupedByJenjang = [];
                foreach ($lembagaList as $lembaga => $students) {
                    $jenjang = $students->first()?->jenjang ?? 'Lainnya';
                    if (!isset($groupedByJenjang[$jenjang])) {
                        $groupedByJenjang[$jenjang] = [];
                    }
                    $groupedByJenjang[$jenjang][$lembaga] = $students;
                }
            @endphp

            @foreach ($groupedByJenjang as $jenjang => $lembagaByJenjang)
                <!-- Judul Jenjang -->
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="h-10 w-1 bg-gradient-to-b from-[#31694E] to-[#4a9b6f] rounded-full"></div>
                        <h2 class="text-3xl font-bold text-[#31694E]">{{ $jenjang }}</h2>
                    </div>
                </div>

                @foreach ($lembagaByJenjang as $lembaga => $students)
                    <!-- Card Container -->
                    <div class="bg-white shadow-lg rounded-xl p-8 mb-8 border-t-4 border-[#31694E] overflow-hidden">
                    <!-- Card Header -->
                    <div class="flex justify-between items-center mb-8 pb-6 border-b-2 border-slate-200">
                        <div>
                            <h3 class="text-2xl font-bold text-[#31694E]">{{ $lembaga }}</h3>
                            <p class="text-slate-500 text-sm mt-1">Total: <span class="font-semibold text-[#31694E]">{{ $students->count() }}</span> siswa</p>
                        </div>
                        <a href="{{ route('admin.export_csv', $lembaga) }}"
                            class="bg-orange-100 hover:bg-orange-200 text-orange-700 px-6 py-3 rounded-lg font-medium hover:shadow-lg transition-all duration-200 hover:scale-105">
                            Export CSV
                        </a>
                    </div>

                    <!-- Tabel Siswa -->
                    <div class="overflow-x-auto rounded-lg">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gradient-to-r from-[#31694E] to-[#4a9b6f] text-white">
                                    <th class="px-6 py-4 text-left text-sm font-semibold">ID</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">Reg. Number</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">Nama Siswa</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">Jenis Kelamin</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">NISN</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">Asal Sekolah</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">Tanggal Lahir</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                                @foreach ($students as $s)
                                    <tr class="hover:bg-gradient-to-r hover:from-[#31694E]/5 hover:to-[#4a9b6f]/5 transition-colors duration-150 border-b border-slate-200">
                                        <td class="px-6 py-4 text-sm font-medium text-slate-700">
                                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-[#31694E]/10 text-[#31694E] font-bold text-xs">
                                                {{ $s->id }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-slate-600 font-mono">{{ $s->registration_number }}</td>
                                        <td class="px-6 py-4 text-sm font-semibold text-slate-800 capitalize">{{ $s->nama }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-600">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $s->jenis_kelamin === 'Laki-laki' ? 'bg-blue-100 text-blue-700' : 'bg-pink-100 text-pink-700' }}">
                                                {{ $s->jenis_kelamin }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-slate-600 font-mono">{{ $s->nisn }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-600">{{ ucfirst(strtolower($s->sekolah_asal))}}</td>
                                        <td class="px-6 py-4 text-sm text-slate-600">
                                            {{ \Carbon\Carbon::parse($s->tanggal_lahir)->format('d M Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                @endforeach

                <div class="mb-24"></div>
            @endforeach
        </div>
    </div>
@endsection