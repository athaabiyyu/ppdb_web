<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin Dashboard - PPDB</title>
</head>

<body class="bg-gray-50">

    <!-- ================== NAVBAR ================== -->
    <nav class="bg-[#31694E] text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Left Logo & Title -->
                <div class="flex items-center space-x-4">
                    <img src="/assets/logo_yayasan.png" alt="Logo" class="w-16 h-16">
                    <div>
                        <h1 class="text-xl font-bold">PPDB Admin</h1>
                        <p class="text-xs text-green-100">Yayasan Mambaul Maarif Denanyar Jombang</p>
                    </div>
                </div>

                <!-- Center Menu -->
                <ul class="hidden md:flex space-x-1">
                    <li>
                        <a href="/admin/dashboard"
                            class="px-4 py-2 rounded-lg bg-white/20 font-medium flex items-center gap-3">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.data_siswa') }}"
                            class="px-4 py-2 rounded-lg hover:bg-white/10 font-medium transition flex items-center gap-3">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                <path fill-rule="evenodd"
                                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Data Pendaftaran
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="px-4 py-2 rounded-lg hover:bg-white/10 font-medium transition flex items-center gap-3">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Pengumuman
                        </a>
                    </li>
                </ul>

                <!-- Right User Menu -->
                <div class="flex items-center space-x-4">
                    <!-- Tombol Admin -->
                    <div class="ml-auto">
                        <form action="{{ route('admin.editProfile') }}" method="GET">
                            @csrf
                            <button type="submit"
                                class="flex items-center space-x-2 bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition">
                                <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                                    <span class="text-green-600 font-bold text-sm">A</span>
                                </div>
                                <span class="font-medium">Admin</span>
                            </button>
                        </form>
                    </div>


                    <!-- Logout -->
                    <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 rounded-lg font-medium transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <!-- ================== END NAVBAR ================== -->

    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>📋 Kelola Pengumuman</h3>
            <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary">
                + Tambah Pengumuman
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Tanggal Publikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($announcements as $announcement)
                            <tr>
                                <td><strong>{{ $announcement->title }}</strong></td>
                                <td>{{ Str::limit($announcement->description, 50) }}</td>
                                <td>
                                    @if ($announcement->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $announcement->published_at?->format('d M Y') ?? '-' }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.announcements.edit', $announcement->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('admin.announcements.toggle', $announcement->id) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-info">
                                            {{ $announcement->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.announcements.destroy', $announcement->id) }}"
                                        method="POST" style="display:inline;"
                                        onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    Belum ada pengumuman.
                                    <a href="{{ route('admin.announcements.create') }}">Buat yang baru</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $announcements->links() }}
        </div>
    </div>
</body>

</html>
