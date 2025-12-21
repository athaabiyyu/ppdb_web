@extends('layouts.app_admin')

@section('title', 'Kelola Pengumuman')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-12 px-4">
        <div class="max-w-7xl mx-auto">

            {{-- Header Section --}}
            <div class="mb-12">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <div class="h-10 w-1 bg-gradient-to-b from-[#31694E] to-[#4a9b6f] rounded-full"></div>
                            <h1 class="text-4xl font-bold text-[#31694E]">Kelola Pengumuman</h1>
                        </div>
                        <p class="text-gray-600 ml-4">Atur dan publikasikan pengumuman untuk pengguna aplikasi</p>
                    </div>

                    {{-- Tombol Tambah Pengumuman - Muncul jika ada data --}}
                    @if ($announcements->count() > 0)
                        <a href="{{ route('admin.announcements.create') }}"
                            class="inline-flex items-center gap-2 bg-gradient-to-r from-[#31694E] to-[#4a9b6f] text-white font-semibold px-6 py-3 rounded-xl hover:from-[#25523a] hover:to-[#3d8560] transition-all duration-200 shadow-lg hover:shadow-xl whitespace-nowrap">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Pengumuman
                        </a>
                    @endif
                </div>
            </div>

            {{-- Flash Message --}}
            @if (session('success'))
                <div
                    class="mb-8 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 text-green-700 rounded-lg shadow-md flex items-center gap-3 animate-pulse">
                    <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Table Card --}}
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                {{-- Table Header --}}
                <div class="bg-[#31694E] p-6">
                    <h2 class="text-xl font-bold text-white flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Daftar Pengumuman
                    </h2>
                </div>

                {{-- Table --}}
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b-2 border-gray-200">
                                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Judul</th>
                                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Deskripsi</th>
                                <th class="px-6 py-4 text-center text-sm font-bold text-gray-700">Status</th>
                                <th class="px-6 py-4 text-center text-sm font-bold text-gray-700">Tanggal</th>
                                <th class="px-6 py-4 text-center text-sm font-bold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($announcements as $announcement)
                                <tr class="hover:bg-blue-50 transition-colors duration-150">
                                    <td class="px-6 py-4">
                                        <span
                                            class="font-bold text-gray-800 block text-sm">{{ ucfirst(strtolower($announcement->title)) }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="text-gray-600 text-sm">{{ Str::limit(ucfirst(strtolower($announcement->description)), 50) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if ($announcement->is_active)
                                            <span
                                                class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                                                <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                                Aktif
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center gap-1 bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-xs font-bold">
                                                <span class="w-2 h-2 bg-gray-600 rounded-full"></span>
                                                Nonaktif
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="text-gray-600 text-sm font-medium">
                                            {{ $announcement->published_at?->format('d M Y') ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            {{-- Edit Button --}}
                                            <a href="{{ route('admin.announcements.edit', $announcement->id) }}"
                                                class="inline-flex items-center gap-1 bg-amber-100 text-amber-700 hover:bg-amber-200 px-3 py-2 rounded-lg transition-colors duration-200 font-medium text-sm">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </a>

                                            {{-- Toggle Button --}}
                                            <form action="{{ route('admin.announcements.toggle', $announcement->id) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="inline-flex items-center gap-1 {{ $announcement->is_active ? 'bg-red-100 text-red-700 hover:bg-red-200' : 'bg-blue-100 text-blue-700 hover:bg-blue-200' }} px-3 py-2 rounded-lg transition-colors duration-200 font-medium text-sm">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-4.803m5.596-3.856a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                    {{ $announcement->is_active ? 'Nonaktif' : 'Aktif' }}
                                                </button>
                                            </form>

                                            {{-- Delete Button --}}
                                            <form action="{{ route('admin.announcements.destroy', $announcement->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center gap-1 bg-red-100 text-red-700 hover:bg-red-200 px-3 py-2 rounded-lg transition-colors duration-200 font-medium text-sm">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-400 mb-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                            <p class="text-gray-600 font-medium mb-2">Belum ada pengumuman</p>
                                            <p class="text-gray-500 text-sm mb-4">Mulai dengan membuat pengumuman baru</p>
                                            <a href="{{ route('admin.announcements.create') }}"
                                                class="inline-flex items-center gap-2 bg-gradient-to-r from-[#31694E] to-[#4a9b6f] hover:from-[#25523a] hover:to-[#3d8560] text-white px-4 py-2 rounded-lg transition-colors duration-200 font-medium">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 4v16m8-8H4" />
                                                </svg>
                                                Buat Pengumuman
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if ($announcements->hasPages())
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-center">
                        <div class="pagination-wrapper">
                            {{ $announcements->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
