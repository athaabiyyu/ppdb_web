@extends('layouts.app_admin')

@section('title', 'Edit Profile Admin')

@section('content')
<div class="max-w-xl mx-auto mt-20 p-6 bg-white rounded-xl shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Edit Profile Admin</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.updateProfile') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold" for="username">Username</label>
            <input type="text" name="username" id="username"
                   value="{{ old('username', $admin->username) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
            @error('username')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold" for="password">Password Baru (Opsional)</label>
            <input type="password" name="password" id="password"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
            @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold" for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
        </div>

        <button type="submit"
                class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
