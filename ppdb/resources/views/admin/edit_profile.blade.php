@extends('layouts.app_admin')

@section('title', 'Edit Profile Admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-12 px-4 sm:px-6">
    <div class="max-w-2xl mx-auto">
        
        {{-- Header Section --}}
        <div class="mb-10 text-center sm:text-left">
            <div class="flex items-center justify-center sm:justify-start gap-3 mb-3">
                <div class="h-10 w-1 bg-gradient-to-b from-[#31694E] to-[#4a9b6f] rounded-full"></div>
                <h1 class="text-3xl sm:text-4xl font-bold text-[#31694E]">Edit Profile Admin</h1>
            </div>
            <p class="text-gray-600 text-sm sm:text-base ml-0 sm:ml-4">Kelola informasi akun dan keamanan Anda</p>
        </div>

        {{-- Success Alert --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 rounded-lg shadow-md">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-green-800 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        {{-- Profile Card --}}
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
            
            {{-- Card Header with Gradient --}}
            <div class="bg-gradient-to-r from-[#31694E] to-[#4a9b6f] p-6 sm:p-8">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl sm:text-2xl font-bold text-white">{{ $admin->username }}</h3>
                        <p class="text-white/80 text-sm">Administrator</p>
                    </div>
                </div>
            </div>

            {{-- Form Body --}}
            <form action="{{ route('admin.updateProfile') }}" method="POST" class="p-6 sm:p-8">
                @csrf

                {{-- Username Field --}}
                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-800 mb-3" for="username">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#31694E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Username
                        </div>
                    </label>
                    <input type="text" name="username" id="username"
                           value="{{ old('username', $admin->username) }}"
                           class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-[#31694E] focus:outline-none focus:ring-2 focus:ring-[#31694E]/20 transition-all duration-200 bg-gray-50 @error('username') border-red-500 @enderror"
                           placeholder="Masukkan username Anda">
                    @error('username')
                        <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg flex items-center gap-2">
                            <svg class="w-5 h-5 text-red-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                        </div>
                    @enderror
                </div>

                {{-- Divider --}}
                <div class="border-t border-gray-200 my-8"></div>

                <h4 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6 text-[#31694E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Ubah Password
                </h4>

                {{-- Password Field --}}
                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-800 mb-3" for="password">
                        Password Baru (Opsional)
                    </label>
                    <input type="password" name="password" id="password"
                           class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-[#31694E] focus:outline-none focus:ring-2 focus:ring-[#31694E]/20 transition-all duration-200 bg-gray-50 @error('password') border-red-500 @enderror"
                           placeholder="Masukkan password baru">
                    <p class="text-gray-500 text-xs sm:text-sm mt-2 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Kosongkan jika tidak ingin mengubah password
                    </p>
                    @error('password')
                        <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg flex items-center gap-2">
                            <svg class="w-5 h-5 text-red-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                        </div>
                    @enderror
                </div>

                {{-- Confirm Password Field --}}
                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-800 mb-3" for="password_confirmation">
                        Konfirmasi Password
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-[#31694E] focus:outline-none focus:ring-2 focus:ring-[#31694E]/20 transition-all duration-200 bg-gray-50"
                           placeholder="Konfirmasi password baru">
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mt-10">
                    <a href="{{ route('admin.dashboard') }}"
                       class="w-full sm:w-1/2 text-center px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center gap-2 text-sm sm:text-base">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </a>
                    <button type="submit"
                            class="w-full sm:w-1/2 px-6 py-3 bg-gradient-to-r from-[#31694E] to-[#4a9b6f] hover:from-[#2a5840] hover:to-[#408860] text-white font-bold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center gap-2 text-sm sm:text-base">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        {{-- Info Card --}}
        <div class="mt-8 p-4 sm:p-6 bg-blue-50 border border-blue-200 rounded-xl">
            <div class="flex gap-3">
                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                <div>
                    <h5 class="font-bold text-blue-900 mb-1">Keamanan Password</h5>
                    <p class="text-blue-800 text-sm">Pastikan password Anda kuat dengan kombinasi huruf, angka, dan simbol untuk keamanan maksimal.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection