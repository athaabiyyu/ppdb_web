@extends('layouts.app_admin')

@section('title', 'Pengaturan Halaman Home')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-12 px-4">
        <div class="max-w-7xl mx-auto">

            {{-- Header Section --}}
            <div class="mb-10">
                <div class="flex items-center gap-3 mb-2">
                    <div class="h-10 w-1 bg-gradient-to-b from-[#31694E] to-[#4a9b6f] rounded-full"></div>
                    <h1 class="text-3xl font-bold text-[#31694E]">Pengaturan Halaman Home</h1>
                </div>
                <p class="text-gray-600 ml-4 text-sm">Kelola konten dan pengaturan halaman utama pendaftar</p>

                {{-- Quick Stats --}}
                <div class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-4 ml-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-[#31694E]/10">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-[#31694E]/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#31694E]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Slider</p>
                                <p class="text-lg font-bold text-[#31694E]">{{ $sliders->count() }} Gambar</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-lg shadow-sm border border-[#31694E]/10">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-[#31694E]/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#31694E]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Syarat</p>
                                <p class="text-lg font-bold text-[#31694E]">{{ $requirements->count() }} Item</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-lg shadow-sm border border-[#31694E]/10">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-[#31694E]/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#31694E]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Alur</p>
                                <p class="text-lg font-bold text-[#31694E]">{{ $flows->count() }} Langkah</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-lg shadow-sm border border-[#31694E]/10">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-[#31694E]/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#31694E]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Unit</p>
                                <p class="text-lg font-bold text-[#31694E]">{{ $units->count() }} Unit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Flash Message --}}
            @if (session('success'))
                <div
                    class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-[#31694E] text-green-700 rounded-lg shadow-sm flex items-center gap-3 animate-fade-in">
                    <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Main Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- ===================== SLIDER GAMBAR ===================== --}}
                <div
                    class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-[#31694E]/10">
                    <div class="bg-gradient-to-r from-[#31694E] to-[#4a9b6f] p-5">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-lg bg-white/20 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-white">Slider Gambar</h2>
                                    <p class="text-white/80 text-sm">Halaman utama</p>
                                </div>
                            </div>
                            <span
                                class="bg-white/20 text-white text-xs font-medium px-3 py-1 rounded-full">{{ $sliders->count() }}</span>
                        </div>
                    </div>

                    <div class="p-5">
                        {{-- Upload Form --}}
                        <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-dashed border-gray-300">
                            <label class="block mb-2 font-medium text-gray-700 text-sm">Upload Gambar Baru</label>
                            <form action="{{ route('admin.home_settings.slider.store') }}" method="POST"
                                enctype="multipart/form-data" class="space-y-3">
                                @csrf
                                <div class="flex items-center gap-3">
                                    <input type="file" name="image" accept="image/*" required
                                        class="flex-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#31694E]/10 file:text-[#31694E] hover:file:bg-[#31694E]/20">
                                    <button type="submit"
                                        class="bg-gradient-to-r from-[#31694E] to-[#4a9b6f] text-white text-sm font-medium px-4 py-2.5 rounded-lg hover:from-[#25523a] hover:to-[#3d8560] transition-all duration-200 shadow-sm hover:shadow flex items-center gap-2 whitespace-nowrap">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        Upload
                                    </button>
                                </div>
                                <p class="text-xs text-gray-400">Format: JPG, PNG, GIF • Max: 5MB</p>
                            </form>
                        </div>

                        {{-- List Slider --}}
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="font-semibold text-[#31694E]">Daftar Gambar</h3>
                                <span class="text-xs text-gray-500">{{ $sliders->count() }} gambar</span>
                            </div>

                            <div class="space-y-2 max-h-80 overflow-y-auto pr-2">
                                @forelse ($sliders as $s)
                                    <div
                                        class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-200 hover:border-[#31694E]/30 transition-colors duration-200 group">
                                        <div class="flex items-center gap-3">
                                            <img src="{{ asset('storage/' . $s->image_path) }}"
                                                class="w-16 h-12 object-cover rounded-lg border border-gray-300">
                                            <div class="min-w-0">
                                                <p class="font-medium text-gray-700 text-sm truncate">
                                                    {{ basename($s->image_path) }}</p>
                                                <p class="text-xs text-gray-400">
                                                    {{ \Carbon\Carbon::parse($s->created_at)->format('d M Y') }}</p>
                                            </div>
                                        </div>
                                        <form action="{{ route('admin.home_settings.slider.destroy', $s->id) }}"
                                            method="POST" onsubmit="return confirm('Hapus gambar ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-lg transition-colors duration-200">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                @empty
                                    <div
                                        class="text-center py-8 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300">
                                        <svg class="w-10 h-10 text-gray-400 mx-auto mb-2" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="text-gray-500 font-medium text-sm">Belum ada gambar slider</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ===================== UNIT PENDIDIKAN ===================== --}}
                <div
                    class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-[#31694E]/10">
                    <div class="bg-gradient-to-r from-[#31694E] to-[#4a9b6f] p-5">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-lg bg-white/20 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-white">Unit Pendidikan</h2>
                                    <p class="text-white/80 text-sm">Lembaga pendidikan</p>
                                </div>
                            </div>
                            <span
                                class="bg-white/20 text-white text-xs font-medium px-3 py-1 rounded-full">{{ $units->count() }}</span>
                        </div>
                    </div>

                    <div class="p-5">
                        {{-- Add Form --}}
                        <form action="{{ route('admin.home_settings.units.store') }}" method="POST" class="mb-6">
                            @csrf
                            <div class="flex gap-2">
                                <input type="text" name="name" placeholder="Nama unit pendidikan..." required
                                    class="flex-1 border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:border-[#31694E] focus:ring-1 focus:ring-[#31694E] focus:outline-none transition-colors">
                                <button type="submit"
                                    class="bg-gradient-to-r from-[#31694E] to-[#4a9b6f] text-white text-sm font-medium px-4 py-2.5 rounded-lg hover:from-[#25523a] hover:to-[#3d8560] transition-all duration-200 shadow-sm hover:shadow flex items-center gap-2 whitespace-nowrap">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    Tambah
                                </button>
                            </div>
                        </form>

                        {{-- List --}}
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="font-semibold text-[#31694E]">Daftar Unit</h3>
                            </div>

                            <div class="space-y-3 max-h-80 overflow-y-auto pr-2">
                                @forelse ($units as $unit)
                                    <div
                                        class="bg-gray-50 rounded-lg border border-gray-200 hover:border-[#31694E]/30 transition-colors duration-200 overflow-hidden">
                                        <div class="p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <h4 class="font-semibold text-[#31694E] text-sm">{{ $unit->name }}</h4>
                                                <form action="{{ route('admin.home_settings.units.destroy', $unit->id) }}"
                                                    method="POST" onsubmit="return confirm('Hapus unit ini?')"
                                                    class="flex-shrink-0">
                                                    @csrf @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-lg transition-colors duration-200">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>

                                            <form action="{{ route('admin.home_settings.units.updateLink', $unit->id) }}"
                                                method="POST" class="space-y-2">
                                                @csrf
                                                <div>
                                                    <label class="block text-xs font-medium text-gray-700 mb-1">Google
                                                        Drive Link</label>
                                                    <div class="flex gap-2">
                                                        <input type="url" name="google_drive_link"
                                                            value="{{ $unit->google_drive_link }}"
                                                            placeholder="https://drive.google.com/..."
                                                            class="flex-1 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:border-[#31694E] focus:ring-1 focus:ring-[#31694E] focus:outline-none transition-colors">
                                                        <button type="submit"
                                                            class="bg-gradient-to-r from-green-600 to-green-500 text-white text-sm font-medium px-4 py-2 rounded-lg hover:from-green-700 hover:to-green-600 transition-all duration-200 shadow-sm hover:shadow whitespace-nowrap">
                                                            Simpan
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="mt-3">
                                                @if ($unit->google_drive_link)
                                                    <a href="{{ $unit->google_drive_link }}" target="_blank"
                                                        class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 text-xs font-medium bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg transition-all duration-200">
                                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        Buka Link
                                                    </a>
                                                @else
                                                    <span
                                                        class="text-gray-400 italic text-xs bg-gray-100 px-3 py-1.5 rounded-lg">
                                                        Belum ada link
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div
                                        class="text-center py-8 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300">
                                        <svg class="w-10 h-10 text-gray-400 mx-auto mb-2" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                        <p class="text-gray-500 font-medium text-sm">Belum ada unit pendidikan</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ===================== SYARAT PENDAFTARAN ===================== --}}
                <div
                    class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-[#31694E]/10 mt-12">
                    <div class="bg-gradient-to-r from-[#31694E] to-[#4a9b6f] p-5">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-lg bg-white/20 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-white">Syarat Pendaftaran</h2>
                                    <p class="text-white/80 text-sm">Persyaratan umum</p>
                                </div>
                            </div>
                            <span
                                class="bg-white/20 text-white text-xs font-medium px-3 py-1 rounded-full">{{ $requirements->count() }}</span>
                        </div>
                    </div>

                    <div class="p-5">
                        {{-- Add Form --}}
                        <form action="{{ route('admin.home_settings.requirement.store') }}" method="POST"
                            class="mb-6">
                            @csrf
                            <div class="flex gap-2">
                                <input type="text" name="text" placeholder="Tambah syarat baru..." required
                                    class="flex-1 border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:border-[#31694E] focus:ring-1 focus:ring-[#31694E] focus:outline-none transition-colors">
                                <button type="submit"
                                    class="bg-gradient-to-r from-[#31694E] to-[#4a9b6f] text-white text-sm font-medium px-4 py-2.5 rounded-lg hover:from-[#25523a] hover:to-[#3d8560] transition-all duration-200 shadow-sm hover:shadow flex items-center gap-2 whitespace-nowrap">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    Tambah
                                </button>
                            </div>
                        </form>

                        {{-- List --}}
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="font-semibold text-[#31694E]">Daftar Syarat</h3>
                            </div>

                            <ul class="space-y-2 max-h-80 overflow-y-auto pr-2">
                                @forelse ($requirements as $req)
                                    <li
                                        class="flex justify-between items-center p-3 bg-gray-50 rounded-lg border border-gray-200 hover:border-[#31694E]/30 transition-colors duration-200 group">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-6 h-6 rounded-full bg-[#31694E]/10 flex items-center justify-center flex-shrink-0">
                                                <span
                                                    class="text-[#31694E] text-xs font-bold">{{ $loop->iteration }}</span>
                                            </div>
                                            <span class="text-gray-700 text-sm">{{ $req->text }}</span>
                                        </div>
                                        <form action="{{ route('admin.home_settings.requirement.destroy', $req->id) }}"
                                            method="POST" onsubmit="return confirm('Hapus syarat ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-lg transition-colors duration-200 opacity-0 group-hover:opacity-100">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </li>
                                @empty
                                    <div
                                        class="text-center py-8 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300">
                                        <svg class="w-10 h-10 text-gray-400 mx-auto mb-2" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <p class="text-gray-500 font-medium text-sm">Belum ada syarat pendaftaran</p>
                                    </div>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- ===================== ALUR PENDAFTARAN ===================== --}}
                <div
                    class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-[#31694E]/10 mt-12">
                    <div class="bg-gradient-to-r from-[#31694E] to-[#4a9b6f] p-5">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-lg bg-white/20 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-white">Alur Pendaftaran</h2>
                                    <p class="text-white/80 text-sm">Tahapan pendaftaran</p>
                                </div>
                            </div>
                            <span
                                class="bg-white/20 text-white text-xs font-medium px-3 py-1 rounded-full">{{ $flows->count() }}</span>
                        </div>
                    </div>

                    <div class="p-5">
                        {{-- Add Form --}}
                        <form action="{{ route('admin.home_settings.flow.store') }}" method="POST" class="mb-6">
                            @csrf
                            <div class="grid grid-cols-4 gap-3 mb-3">
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Step</label>
                                    <input type="number" name="step_number" placeholder="1" min="1" required
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:border-[#31694E] focus:ring-1 focus:ring-[#31694E] focus:outline-none transition-colors">
                                </div>
                                <div class="col-span-3">
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Deskripsi</label>
                                    <input type="text" name="text" placeholder="Deskripsi langkah..." required
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:border-[#31694E] focus:ring-1 focus:ring-[#31694E] focus:outline-none transition-colors">
                                </div>
                            </div>
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-[#31694E] to-[#4a9b6f] text-white text-sm font-medium px-4 py-2.5 rounded-lg hover:from-[#25523a] hover:to-[#3d8560] transition-all duration-200 shadow-sm hover:shadow flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah Langkah
                            </button>
                        </form>

                        {{-- List --}}
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="font-semibold text-[#31694E]">Daftar Alur</h3>
                                <span class="text-xs text-gray-500">Urutan langkah</span>
                            </div>

                            <ul class="space-y-2 max-h-80 overflow-y-auto pr-2">
                                @forelse ($flows->sortBy('step_number') as $flow)
                                    <li
                                        class="flex justify-between items-start p-3 bg-gray-50 rounded-lg border border-gray-200 hover:border-[#31694E]/30 transition-colors duration-200 group">
                                        <div class="flex items-start gap-3 flex-1">
                                            <div
                                                class="flex-shrink-0 flex items-center justify-center w-7 h-7 rounded-lg bg-gradient-to-br from-[#31694E] to-[#4a9b6f] text-white text-xs font-bold">
                                                {{ $flow->step_number }}
                                            </div>
                                            <span class="text-gray-700 text-sm pt-0.5">{{ $flow->text }}</span>
                                        </div>
                                        <form action="{{ route('admin.home_settings.flow.destroy', $flow->id) }}"
                                            method="POST" onsubmit="return confirm('Hapus langkah ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-lg transition-colors duration-200 opacity-0 group-hover:opacity-100">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </li>
                                @empty
                                    <div
                                        class="text-center py-8 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300">
                                        <svg class="w-10 h-10 text-gray-400 mx-auto mb-2" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                        <p class="text-gray-500 font-medium text-sm">Belum ada alur pendaftaran</p>
                                    </div>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===================== PENGATURAN TOMBOL DAFTAR ===================== --}}
                <div
                    class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-[#31694E]/10 mt-12">
                    <div class="bg-gradient-to-r from-[#31694E] to-[#4a9b6f] p-5">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-lg bg-white/20 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 15l-2 5L9 9l11 4-5 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-white">Status Pendaftaran</h2>
                                    <p class="text-white/80 text-sm">Tombol utama</p>
                                </div>
                            </div>
                            <div
                                class="w-3 h-3 rounded-full {{ $setting->show_register_button ? 'bg-green-400' : 'bg-red-400' }}">
                            </div>
                        </div>
                    </div>

                    <div class="p-5">
                        <div class="space-y-4">
                            <div class="text-center">
                                <div class="inline-flex items-center gap-2 bg-gray-50 px-4 py-2 rounded-full mb-2">
                                    <span
                                        class="w-2 h-2 rounded-full {{ $setting->show_register_button ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                    <span
                                        class="text-sm font-medium {{ $setting->show_register_button ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $setting->show_register_button ? 'Pendaftaran DIBUKA' : 'Pendaftaran DITUTUP' }}
                                    </span>
                                </div>
                                <p class="text-gray-600 text-sm mb-4">
                                    {{ $setting->show_register_button
                                        ? 'Tombol "Daftar Sekarang" sedang aktif dan dapat diakses oleh calon pendaftar'
                                        : 'Tombol "Daftar Sekarang" tidak ditampilkan di halaman utama' }}
                                </p>
                            </div>

                            <form action="{{ route('admin.home_settings.toggle_register_button') }}" method="POST"
                                class="space-y-3">
                                @csrf
                                <button type="submit"
                                    class="w-full {{ $setting->show_register_button
                                        ? 'bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700'
                                        : 'bg-gradient-to-r from-[#31694E] to-[#4a9b6f] hover:from-[#25523a] hover:to-[#3d8560]' }} 
                                       text-white font-medium px-6 py-3.5 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg text-sm flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="{{ $setting->show_register_button ? 'M6 18L18 6M6 6l12 12' : 'M13 10V3L4 14h7v7l9-11h-7z' }}" />
                                    </svg>
                                    {{ $setting->show_register_button ? 'Tutup Pendaftaran' : 'Buka Pendaftaran' }}
                                </button>
                            </form>

                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <div class="flex items-start gap-3">
                                    <div class="flex-shrink-0 mt-0.5">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-600">
                                            <span class="font-medium">Catatan:</span>
                                            {{ $setting->show_register_button
                                                ? 'Jika ditutup, calon pendaftar tidak dapat mengakses formulir pendaftaran'
                                                : 'Jika dibuka, calon pendaftar dapat langsung mengakses formulir pendaftaran' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            {{-- Footer Note --}}
            <div class="mt-8 text-center">
                <p class="text-xs text-gray-400">
                    Perubahan disimpan secara otomatis. Terakhir diperbarui:
                    <span class="font-medium">{{ \Carbon\Carbon::now()->format('d M Y, H:i') }}</span>
                </p>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.3s ease-out;
        }

        /* Custom scrollbar */
        .overflow-y-auto::-webkit-scrollbar {
            width: 4px;
        }

        .overflow-y-auto::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .overflow-y-auto::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }

        .overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: #a1a1a1;
        }
    </style>
@endsection
