@extends('layouts.app_admin')

@section('title', 'Edit Pengumuman')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-8 px-4">
        <div class="max-w-4xl mx-auto">

            {{-- Header Section --}}
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <h1 class="text-4xl font-bold text-gray-800">Edit Pengumuman</h1>
                </div>
                <p class="text-gray-600 ml-0">Perbarui informasi pengumuman yang telah dibuat</p>
            </div>

            {{-- Form Card --}}
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                {{-- Form Header --}}
                <div class="bg-[#31694E] p-6">
                    <h2 class="text-xl font-bold text-white flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Form Pengumuman
                    </h2>
                </div>

                {{-- Form Body --}}
                <form action="{{ route('admin.announcements.update', $announcement->id) }}" method="POST" class="p-8">
                    @csrf
                    @method('PUT')

                    {{-- Title --}}
                    <div class="mb-6">
                        <label for="title" class="block text-sm font-bold text-gray-800 mb-2">Judul Pengumuman <span
                                class="text-red-500">*</span></label>
                        <input type="text"
                            class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-200 transition-all duration-200 @error('title') border-red-500 @enderror"
                            id="title" name="title" placeholder="Contoh: Pendaftaran Dibuka"
                            value="{{ old('title', $announcement->title) }}" required>
                        @error('title')
                            <p class="text-red-600 text-sm mt-2 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-bold text-gray-800 mb-2">Deskripsi Singkat <span
                                class="text-red-500">*</span></label>
                        <textarea
                            class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-200 transition-all duration-200 resize-none @error('description') border-red-500 @enderror"
                            id="description" name="description" rows="3"
                            placeholder="Ringkasan maksimal 500 karakter - ini akan ditampilkan di daftar pengumuman" required>{{ old('description', $announcement->description) }}</textarea>
                        <p class="text-gray-500 text-sm mt-2 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Ini yang akan ditampilkan di daftar pengumuman
                        </p>
                        @error('description')
                            <p class="text-red-600 text-sm mt-2 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Content --}}
                    <div class="mb-6">
                        <label for="content" class="block text-sm font-bold text-gray-800 mb-2">Isi Lengkap Pengumuman
                            <span class="text-red-500">*</span></label>
                        <textarea
                            class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-200 transition-all duration-200 resize-none @error('content') border-red-500 @enderror"
                            id="content" name="content" rows="12" placeholder="Tuliskan konten pengumuman secara lengkap dan detail..."
                            required>{{ old('content', $announcement->content) }}</textarea>
                        @error('content')
                            <p class="text-red-600 text-sm mt-2 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="flex justify-between mt-6">
                        <a href="{{ route('admin.announcements.index') }}"
                            class="inline-flex items-center gap-2 bg-red-500 text-white font-bold px-8 py-3 rounded-lg hover:bg-red-600 transition-all duration-200 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Batal
                        </a>
                        <button type="submit"
                            class="inline-flex items-center gap-2 bg-[#31694E] text-white font-bold px-8 py-3 rounded-lg hover:bg-[#2a5840] transition-all duration-200 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Update Pengumuman
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const toggleCheckbox = document.getElementById('is_active');
        const statusText = document.getElementById('status-text');

        toggleCheckbox.addEventListener('change', function() {
            statusText.textContent = this.checked ? 'Tampilkan' : 'Sembunyikan';
        });
    </script>
@endsection
