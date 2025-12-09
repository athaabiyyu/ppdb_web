@extends('layouts.app_admin')

@section('title', 'Edit Halaman Home User')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-8 px-4">
        <div class="max-w-7xl mx-auto">

            {{-- Header Section --}}
            <div class="mb-10">
                <div class="flex items-center gap-3 mb-2">
                    <h1 class="text-4xl font-bold text-gray-800">Pengaturan Halaman Home</h1>
                </div>
                <p class="text-gray-600 ml-0">Kelola konten dan pengaturan halaman utama pendaftar</p>
            </div>

            {{-- Flash Message --}}
            @if(session('success'))
                <div class="mb-8 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 text-green-700 rounded-lg shadow-sm flex items-center gap-3">
                    <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            {{-- GRID: SLIDER - SYARAT - ALUR - TOGGLE --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                {{-- ===================== SLIDER ===================== --}}
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-6">
                        <div class="flex items-center gap-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <h2 class="text-2xl font-bold text-white">Slider Gambar</h2>
                        </div>
                    </div>

                    <div class="p-6">
                        {{-- Upload Form --}}
                        <form action="/admin/home-settings/slider" method="POST" enctype="multipart/form-data" class="mb-6">
                            @csrf
                            <label class="block mb-2 font-semibold text-gray-700">Upload Gambar Slider</label>
                            <p class="text-sm text-gray-500 mb-3">Format: JPG, PNG | Ukuran maksimal: 5MB</p>
                            
                            <div class="relative mb-4">
                                <input type="file" name="image" 
                                       class="block w-full border-2 border-dashed border-blue-300 rounded-lg p-4 mb-3 hover:border-blue-500 transition-colors cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            </div>

                            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white font-semibold px-4 py-3 rounded-lg hover:from-blue-700 hover:to-blue-600 transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah Gambar
                            </button>
                        </form>

                        {{-- List Slider --}}
                        <div class="border-t pt-6">
                            <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                                Daftar Slider Saat Ini
                            </h3>

                            <div class="space-y-3 max-h-96 overflow-y-auto">
                                @foreach($sliders as $s)
                                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200 rounded-lg hover:border-blue-300 transition-all duration-200">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('storage/'.$s->image_path) }}" 
                                             class="w-20 h-14 object-cover rounded-lg shadow-sm border border-gray-200">
                                        <span class="text-sm text-gray-600">{{ basename($s->image_path) }}</span>
                                    </div>

                                    <form action="/admin/home-settings/slider/{{ $s->id }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700 hover:bg-red-50 px-3 py-2 rounded-lg transition-colors duration-200 font-medium text-sm flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                                @endforeach

                                @if($sliders->count() == 0)
                                    <div class="flex flex-col items-center justify-center py-12 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300">
                                        <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="text-gray-500 font-medium">Belum ada slider</p>
                                        <p class="text-gray-400 text-sm">Tambahkan gambar untuk memulai</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


                {{-- ===================== SYARAT PENDAFTARAN ===================== --}}
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-600 to-purple-500 p-6">
                        <div class="flex items-center gap-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h2 class="text-2xl font-bold text-white">Syarat Pendaftaran</h2>
                        </div>
                    </div>

                    <div class="p-6">
                        {{-- Tambah --}}
                        <form action="/admin/home-settings/requirement" method="POST" class="mb-6">
                            @csrf
                            <label class="block mb-2 font-semibold text-gray-700">Tambah Syarat Baru</label>
                            <div class="flex gap-2">
                                <input type="text" name="text" placeholder="Contoh: Fotokopi KK"
                                       class="flex-1 border-2 border-gray-300 rounded-lg p-3 focus:border-purple-500 focus:outline-none transition-colors">

                                <button type="submit" class="bg-gradient-to-r from-purple-600 to-purple-500 text-white font-semibold px-6 py-3 rounded-lg hover:from-purple-700 hover:to-purple-600 transition-all duration-200 shadow-md hover:shadow-lg flex items-center gap-2 whitespace-nowrap">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Tambah
                                </button>
                            </div>
                        </form>

                        {{-- List --}}
                        <div class="border-t pt-6">
                            <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                            
                                Daftar Syarat
                            </h3>

                            <ul class="space-y-2 max-h-96 overflow-y-auto">
                                @foreach($requirements as $req)
                                <li class="flex justify-between items-center bg-gradient-to-r from-purple-50 to-pink-50 p-4 rounded-lg border border-purple-200 hover:border-purple-300 transition-all duration-200">
                                    <span class="text-gray-700 font-medium">{{ $req->text }}</span>
                                    <form action="/admin/home-settings/requirement/{{ $req->id }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700 hover:bg-red-50 px-3 py-2 rounded-lg transition-colors duration-200 font-medium text-sm">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </li>
                                @endforeach

                                @if($requirements->count() == 0)
                                    <div class="flex flex-col items-center justify-center py-12 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300">
                                        <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <p class="text-gray-500 font-medium">Belum ada syarat</p>
                                        <p class="text-gray-400 text-sm">Tambahkan syarat pendaftaran</p>
                                    </div>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>


                {{-- ===================== ALUR PENDAFTARAN ===================== --}}
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                    <div class="bg-gradient-to-r from-amber-600 to-orange-500 p-6">
                        <div class="flex items-center gap-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <h2 class="text-2xl font-bold text-white">Alur Pendaftaran</h2>
                        </div>
                    </div>

                    <div class="p-6">
                        {{-- Tambah --}}
                        <form action="/admin/home-settings/flow" method="POST" class="mb-6">
                            @csrf
                            <div class="grid grid-cols-3 gap-3 mb-4">
                                <div>
                                    <label class="block mb-2 font-semibold text-gray-700 text-sm">Step Number</label>
                                    <input type="number" name="step_number" placeholder="1" 
                                           class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-amber-500 focus:outline-none transition-colors">
                                </div>

                                <div class="col-span-2">
                                    <label class="block mb-2 font-semibold text-gray-700 text-sm">Deskripsi</label>
                                    <input type="text" name="text" placeholder="Contoh: Mengisi formulir pendaftaran"
                                           class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-amber-500 focus:outline-none transition-colors">
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-gradient-to-r from-amber-600 to-orange-500 text-white font-semibold px-4 py-3 rounded-lg hover:from-amber-700 hover:to-orange-600 transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah Alur
                            </button>
                        </form>

                        {{-- List --}}
                        <div class="border-t pt-6">
                            <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                                
                                Daftar Alur
                            </h3>

                            <ul class="space-y-3 max-h-96 overflow-y-auto">
                                @foreach($flows as $flow)
                                <li class="flex justify-between items-start bg-gradient-to-r from-amber-50 to-orange-50 p-4 rounded-lg border border-amber-200 hover:border-amber-300 transition-all duration-200">
                                    <div class="flex gap-3 flex-1">
                                        <div class="flex-shrink-0 flex items-center justify-center h-8 w-8 rounded-lg bg-gradient-to-br from-amber-500 to-orange-500 text-white font-bold text-sm">
                                            {{ $flow->step_number }}
                                        </div>
                                        <span class="text-gray-700 font-medium pt-1">{{ $flow->text }}</span>
                                    </div>
                                    <form action="/admin/home-settings/flow/{{ $flow->id }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700 hover:bg-red-50 px-3 py-2 rounded-lg transition-colors duration-200 font-medium text-sm flex-shrink-0">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </li>
                                @endforeach

                                @if($flows->count() == 0)
                                    <div class="flex flex-col items-center justify-center py-12 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300">
                                        <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                        <p class="text-gray-500 font-medium">Belum ada alur</p>
                                        <p class="text-gray-400 text-sm">Tambahkan alur pendaftaran</p>
                                    </div>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>


                {{-- ===================== PENGATURAN TOMBOL DAFTAR ===================== --}}
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-teal-500 p-6">
                        <div class="flex items-center gap-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2z" />
                            </svg>
                            <h2 class="text-2xl font-bold text-white">Pengaturan Tombol Daftar</h2>
                        </div>
                    </div>

                    <div class="p-6">
                        <p class="mb-6 text-gray-700">Kelola status tombol <span class="font-bold text-gray-800">"Daftar Sekarang"</span> di halaman utama</p>

                        <form action="/admin/home-settings/toggle-register-button" method="POST" class="mb-6">
                            @csrf
                            <button type="submit"
                                class="w-full {{ $setting->show_register_button ? 'bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600' : 'bg-gradient-to-r from-green-600 to-teal-500 hover:from-green-700 hover:to-teal-600' }} 
                                   text-white font-bold px-6 py-4 rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl text-lg flex items-center justify-center gap-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                {{ $setting->show_register_button ? 'Nonaktifkan Tombol' : 'Aktifkan Tombol' }}
                            </button>
                        </form>

                        <div class="bg-gradient-to-r {{ $setting->show_register_button ? 'from-red-50 to-pink-50 border-red-200' : 'from-green-50 to-teal-50 border-green-200' }} border-l-4 {{ $setting->show_register_button ? 'border-red-500' : 'border-green-500' }} p-4 rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-8 w-8 rounded-full {{ $setting->show_register_button ? 'bg-red-200' : 'bg-green-200' }}">
                                        <span class="text-lg">{{ $setting->show_register_button ? '🔴' : '🟢' }}</span>
                                    </div>
                                </div>
                                <div>
                                    <p class="font-bold {{ $setting->show_register_button ? 'text-red-800' : 'text-green-800' }}">
                                        Status: <span class="text-lg">{{ $setting->show_register_button ? 'AKTIF ✓' : 'NONAKTIF ✗' }}</span>
                                    </p>
                                    <p class="text-sm {{ $setting->show_register_button ? 'text-red-700' : 'text-green-700' }}">
                                        {{ $setting->show_register_button ? 'Tombol daftar sedang ditampilkan di halaman utama' : 'Tombol daftar sedang disembunyikan dari halaman utama' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection