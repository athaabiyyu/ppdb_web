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
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h3 class="mb-4">✏️ Edit Pengumuman</h3>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('admin.announcements.update', $announcement->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Judul Pengumuman *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title', $announcement->title) }}"
                                    required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi Singkat *</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="2" required>{{ old('description', $announcement->description) }}</textarea>
                                <small class="text-muted">Ini yang akan ditampilkan di daftar pengumuman</small>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Isi Lengkap Pengumuman *</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10"
                                    required>{{ old('content', $announcement->content) }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="published_at" class="form-label">Tanggal & Waktu Publikasi</label>
                                    <input type="datetime-local" class="form-control" id="published_at"
                                        name="published_at"
                                        value="{{ old('published_at', $announcement->published_at?->format('Y-m-d\TH:i')) }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="is_active" class="form-label">Status</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_active"
                                            name="is_active" value="1"
                                            {{ old('is_active', $announcement->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Tampilkan di halaman utama
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Update Pengumuman</button>
                                <a href="{{ route('admin.announcements.index') }}"
                                    class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
