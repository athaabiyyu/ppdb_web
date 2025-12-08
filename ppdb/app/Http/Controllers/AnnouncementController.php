<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
       // USER - Lihat semua pengumuman
       public function index()
       {
              $announcements = Announcement::where('is_active', true)
                     ->orderBy('published_at', 'desc')
                     ->paginate(10);

              return view('pengumuman.index', compact('announcements'));
       }

       // USER - Lihat detail pengumuman
       public function show($id)
       {
              $announcement = Announcement::findOrFail($id);
              $related = Announcement::where('is_active', true)
                     ->where('id', '!=', $id)
                     ->orderBy('published_at', 'desc')
                     ->limit(3)
                     ->get();

              return view('pengumuman.show', compact('announcement', 'related'));
       }

       // ADMIN - Lihat semua pengumuman (untuk admin)
       public function adminIndex()
       {
              $announcements = Announcement::orderBy('published_at', 'desc')->paginate(15);
              return view('admin.pengumuman.index', compact('announcements'));
       }

       // ADMIN - Tampilkan form create
       public function create()
       {
              return view('admin.pengumuman.create');
       }

       // ADMIN - Simpan pengumuman baru
       public function store(Request $request)
       {
              $validated = $request->validate([
                     'title' => 'required|string|max:255',
                     'description' => 'required|string|max:500',
                     'content' => 'required|string',
                     'is_active' => 'boolean',
                     'published_at' => 'nullable|date',
              ]);

              Announcement::create($validated);

              return redirect()->route('admin.announcements.index')
                     ->with('success', 'Pengumuman berhasil ditambahkan');
       }

       // ADMIN - Tampilkan form edit
       public function edit($id)
       {
              $announcement = Announcement::findOrFail($id);
              return view('admin.pengumuman.edit', compact('announcement'));
       }

       // ADMIN - Update pengumuman
       public function update(Request $request, $id)
       {
              $announcement = Announcement::findOrFail($id);

              $validated = $request->validate([
                     'title' => 'required|string|max:255',
                     'description' => 'required|string|max:500',
                     'content' => 'required|string',
                     'is_active' => 'boolean',
                     'published_at' => 'nullable|date',
              ]);

              $announcement->update($validated);

              return redirect()->route('admin.announcements.index')
                     ->with('success', 'Pengumuman berhasil diperbarui');
       }

       // ADMIN - Hapus pengumuman
       public function destroy($id)
       {
              $announcement = Announcement::findOrFail($id);
              $announcement->delete();

              return redirect()->route('admin.announcements.index')
                     ->with('success', 'Pengumuman berhasil dihapus');
       }

       // ADMIN - Toggle status aktif/non-aktif
       public function toggleStatus($id)
       {
              $announcement = Announcement::findOrFail($id);
              $announcement->update(['is_active' => !$announcement->is_active]);

              return back()->with('success', 'Status pengumuman berhasil diubah');
       }
}
