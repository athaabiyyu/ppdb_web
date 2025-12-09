@extends('layouts.app_user')

@section('title', 'Cetak Bukti Pendaftaran')

@section('content')
    <div class="max-w-lg mx-auto bg-[#31694E]/10 border border-[#31694E]/30 rounded-2xl shadow-xl p-6 mt-12">
        <!-- Judul -->
        <h1 class="text-3xl font-extrabold text-center mb-2 text-[#31694E]">Bukti Pendaftaran</h1>
        <p class="text-center mb-6 font-semibold text-[#31694E]">PPDB Online</p>

        <!-- Foto Siswa -->
        <div class="text-center mb-6">
            <div class="inline-block p-1 rounded-lg shadow-inner">
                <img src="{{ asset('storage/' . $student->foto) }}" alt="Foto Siswa"
                    class="w-32 h-40 object-cover border-2 rounded-lg mx-auto">
            </div>
        </div>

        <!-- Informasi Siswa -->
        <div class="mb-6 space-y-2">
            <div class="flex justify-between bg-white p-3 rounded shadow-sm">
                <span class="font-semibold ">No Registrasi</span>
                <span class="font-semibold ">{{ $student->registration_number }}</span>
            </div>
            <div class="flex justify-between bg-white p-3 rounded shadow-sm">
                <span class="font-semibold ">Nama</span>
                <span class="font-semibold ">{{ $student->nama }}</span>
            </div>
            <div class="flex justify-between bg-white p-3 rounded shadow-sm">
                <span class="font-semibold ">Jenjang</span>
                <span class="font-semibold ">{{ $student->jenjang }}</span>
            </div>
            <div class="flex justify-between bg-white p-3 rounded shadow-sm">
                <span class="font-semibold ">Pilihan Lembaga</span>
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
        <p class="text-center text-[#31694E] text-sm mt-12">
            © 2024 Sistem PPDB Online - Simpan bukti ini untuk keperluan administrasi
        </p>
    </div>
@endsection
