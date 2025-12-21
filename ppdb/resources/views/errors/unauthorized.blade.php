@extends('layouts.app_user', ['noNavbar' => true])

@section('title', 'Formulir Upload Dokumen Persyaratan')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full text-center">
        <div class="mb-4">
            <svg class="mx-auto h-16 w-16 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4v2m0 0v-6m0 6v2m0-12a9 9 0 110 18 9 9 0 010-18z"></path>
            </svg>
        </div>
        
        <h1 class="text-3xl font-bold text-gray-900 mb-2 mt-5">403</h1>
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Akses Ditolak</h2>
        
        <p class="text-gray-600 mb-6">
            Maaf, Anda tidak memiliki akses untuk membuka halaman ini. 
            Anda hanya dapat mengakses data pendaftaran Anda sendiri.
        </p>
        
        <div class="space-y-3">
            <a href="{{ route('home') }}" class="inline-block w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition">
                Kembali ke Halaman Utama
            </a>
            <a href="{{ route('pilih.jenjang', 'SD') }}" class="inline-block w-full bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded transition">
                Mulai Pendaftaran Baru
            </a>
        </div>
    </div>
</div>
@endsection