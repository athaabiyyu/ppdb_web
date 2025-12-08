<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
       public function dashboard()
       {
              // Hitung per jenjang untuk cards
              $counts = [
                     'SD' => Student::where('jenjang', 'SD')->count(),
                     'SMP' => Student::where('jenjang', 'SMP')->count(),
                     'SMA' => Student::where('jenjang', 'SMA')->count(),
              ];

              // Ambil semua lembaga dari selected_schools (JSON array)
              $lembagaCounts = [];

              // Ambil semua students dengan selected_schools
              $students = Student::whereNotNull('selected_schools')->get();

              foreach ($students as $student) {
                     if (is_array($student->selected_schools)) {
                            foreach ($student->selected_schools as $lembaga) {
                                   if (!empty($lembaga)) {
                                          if (!isset($lembagaCounts[$lembaga])) {
                                                 $lembagaCounts[$lembaga] = 0;
                                          }
                                          $lembagaCounts[$lembaga]++;
                                   }
                            }
                     }
              }

              // Atau bisa juga ambil dari choice->pilihan_1 dan pilihan_2
              $choices = Student::with('choice')->whereHas('choice')->get();

              foreach ($choices as $student) {
                     if ($student->choice) {
                            // Hitung pilihan_1
                            if (!empty($student->choice->pilihan_1)) {
                                   $lembaga = $student->choice->pilihan_1;
                                   if (!isset($lembagaCounts[$lembaga])) {
                                          $lembagaCounts[$lembaga] = 0;
                                   }
                                   $lembagaCounts[$lembaga]++;
                            }

                            // Hitung pilihan_2
                            if (!empty($student->choice->pilihan_2)) {
                                   $lembaga = $student->choice->pilihan_2;
                                   if (!isset($lembagaCounts[$lembaga])) {
                                          $lembagaCounts[$lembaga] = 0;
                                   }
                                   $lembagaCounts[$lembaga]++;
                            }
                     }
              }

              // Urutkan berdasarkan nama lembaga
              ksort($lembagaCounts);

              return view('admin.dashboard', compact('counts', 'lembagaCounts'));
       }

       public function dataSiswa()
       {
              // Ambil semua lembaga yang ada dari selected_schools & choices
              $students = Student::all();

              $lembagaList = [];

              foreach ($students as $student) {
                     if (is_array($student->selected_schools)) {
                            foreach ($student->selected_schools as $ls) {
                                   if (!empty($ls)) {
                                          $lembagaList[$ls][] = $student; // kelompokkan siswa sesuai lembaga
                                   }
                            }
                     }
              }

              // Jika ada relasi choice
              $choices = Student::with('choice')->get();
              foreach ($choices as $student) {
                     if ($student->choice) {
                            if (!empty($student->choice->pilihan_1)) {
                                   $lembagaList[$student->choice->pilihan_1][] = $student;
                            }
                            if (!empty($student->choice->pilihan_2)) {
                                   $lembagaList[$student->choice->pilihan_2][] = $student;
                            }
                     }
              }

              // URUTKAN JENJANG: SD → SMP → SMA
              $orderedJenjang = ['SD', 'SMP', 'SMA'];

              foreach ($lembagaList as $lembaga => $students) {
                     $lembagaList[$lembaga] = collect($students)->sortBy(function ($s) use ($orderedJenjang) {
                            return array_search($s->jenjang, $orderedJenjang);
                     });
              }

              return view('admin.data-siswa', compact('lembagaList'));
       }

       public function exportCSV($lembaga)
       {
              // Ambil semua siswa untuk lembaga tertentu, sekaligus eager load parentInfo & guardian
              $studentsA = Student::with(['parentInfo', 'guardian'])
                     ->whereJsonContains('selected_schools', $lembaga)
                     ->get();

              $studentsB = Student::with(['parentInfo', 'guardian'])
                     ->whereHas('choice', function ($q) use ($lembaga) {
                            $q->where('pilihan_1', $lembaga)
                                   ->orWhere('pilihan_2', $lembaga);
                     })
                     ->get();

              $students = $studentsA->merge($studentsB)->unique('id')->values();

              $fileName = "data_siswa_{$lembaga}.csv";

              return response()->streamDownload(function () use ($students) {

                     if (ob_get_length()) ob_end_clean();

                     $handle = fopen('php://output', 'w');

                     // HEADER CSV
                     fputcsv($handle, [
                            // Data Siswa
                            'ID',
                            'No Registrasi',
                            'Jenjang',
                            'Selected Schools',
                            'Nama',
                            'Jenis Kelamin',
                            'Agama',
                            'NISN',
                            'Hobi',
                            'Cita-cita',
                            'No KK',
                            'NIK',
                            'Tempat Lahir',
                            'Tanggal Lahir',
                            'Anak Ke',
                            'Jumlah Saudara',
                            'Tinggal Dengan',
                            'Rencana Tinggal',
                            'Jarak Tempat Tinggal',
                            'Sekolah Asal',
                            'Alamat Sekolah Asal',
                            'NPSN/NSM',
                            'Foto',
                            // Data Ayah
                            'Nama Ayah',
                            'NIK Ayah',
                            'Tempat Lahir Ayah',
                            'Tanggal Lahir Ayah',
                            'Pendidikan Ayah',
                            'Pekerjaan Ayah',
                            'Penghasilan Ayah',
                            'Status Ayah',
                            'HP Ayah',
                            // Data Ibu
                            'Nama Ibu',
                            'NIK Ibu',
                            'Tempat Lahir Ibu',
                            'Tanggal Lahir Ibu',
                            'Pendidikan Ibu',
                            'Pekerjaan Ibu',
                            'Penghasilan Ibu',
                            'Status Ibu',
                            'HP Ibu',
                            // Alamat Parent
                            'Alamat KK',
                            'Alamat',
                            'Desa',
                            'Kecamatan',
                            'Kabupaten',
                            'Provinsi',
                            'Kode Pos',
                            // Data Wali
                            'Nama Wali',
                            'NIK Wali',
                            'Tempat Lahir Wali',
                            'Tanggal Lahir Wali',
                            'Pendidikan Wali',
                            'Pekerjaan Wali',
                            'Penghasilan Wali',
                            'HP Wali',
                            'Alamat Wali',
                            'Desa Wali',
                            'Kecamatan Wali',
                            'Kabupaten Wali',
                            'Provinsi Wali',
                            'Kode Pos Wali',
                     ]);

                     foreach ($students as $s) {
                            $selected = is_array($s->selected_schools) ? implode(', ', $s->selected_schools) : $s->selected_schools;
                            $p = $s->parentInfo; // Bisa null
                            $w = $s->guardian;   // Bisa null

                            fputcsv($handle, [
                                   // Siswa
                                   $s->id,
                                   $s->registration_number,
                                   $s->jenjang,
                                   $selected,
                                   $s->nama,
                                   $s->jenis_kelamin,
                                   $s->agama,
                                   $s->nisn,
                                   $s->hobi,
                                   $s->cita_cita,
                                   $s->no_kk,
                                   $s->nik,
                                   $s->tempat_lahir,
                                   $s->tanggal_lahir?->format('d-m-Y') ?? '',
                                   $s->anak_ke,
                                   $s->jumlah_saudara,
                                   $s->tinggal_dengan,
                                   $s->rencana_tinggal,
                                   $s->jarak_tempat_tinggal,
                                   $s->sekolah_asal,
                                   $s->alamat_sekolah_asal,
                                   $s->npsn_nsm,
                                   $s->foto,
                                   // Parent Ayah
                                   $p?->nama_ayah ?? '',
                                   $p?->nik_ayah ?? '',
                                   $p?->tempat_lahir_ayah ?? '',
                                   $p?->tanggal_lahir_ayah?->format('d-m-Y') ?? '',
                                   $p?->pendidikan_ayah ?? '',
                                   $p?->pekerjaan_ayah ?? '',
                                   $p?->penghasilan_ayah ?? '',
                                   $p?->status_ayah ?? '',
                                   $p?->hp_ayah ?? '',
                                   // Parent Ibu
                                   $p?->nama_ibu ?? '',
                                   $p?->nik_ibu ?? '',
                                   $p?->tempat_lahir_ibu ?? '',
                                   $p?->tanggal_lahir_ibu?->format('d-m-Y') ?? '',
                                   $p?->pendidikan_ibu ?? '',
                                   $p?->pekerjaan_ibu ?? '',
                                   $p?->penghasilan_ibu ?? '',
                                   $p?->status_ibu ?? '',
                                   $p?->hp_ibu ?? '',
                                   // Alamat parent
                                   $p?->alamat_kk ?? '',
                                   $p?->alamat ?? '',
                                   $p?->desa ?? '',
                                   $p?->kecamatan ?? '',
                                   $p?->kabupaten ?? '',
                                   $p?->provinsi ?? '',
                                   $p?->kode_pos ?? '',
                                   // Guardian / Wali
                                   $w?->nama_wali ?? '',
                                   $w?->nik_wali ?? '',
                                   $w?->tempat_lahir_wali ?? '',
                                   $w?->tanggal_lahir_wali?->format('d-m-Y') ?? '',
                                   $w?->pendidikan_wali ?? '',
                                   $w?->pekerjaan_wali ?? '',
                                   $w?->penghasilan_wali ?? '',
                                   $w?->hp_wali ?? '',
                                   // Alamat wali
                                   $w?->alamat ?? '',
                                   $w?->desa ?? '',
                                   $w?->kecamatan ?? '',
                                   $w?->kabupaten ?? '',
                                   $w?->provinsi ?? '',
                                   $w?->kode_pos ?? '',
                            ]);
                     }

                     fclose($handle);
              }, $fileName, [
                     'Content-Type' => 'text/csv',
                     'Cache-Control' => 'no-store, no-cache, must-revalidate',
                     'Pragma' => 'no-cache',
              ]);
       }

       // List unit
       public function units()
       {
              $units = Unit::orderBy('name')->get();
              return view('admin.units', compact('units'));
       }

       // Tambah unit baru
       public function storeUnit(Request $request)
       {
              $request->validate([
                     'name' => 'required|string|max:255',
              ]);

              Unit::create([
                     'name' => $request->name,
                     'google_drive_link' => null,
              ]);

              return redirect()->back()->with('success', 'Unit pendidikan berhasil ditambahkan!');
       }

       // Update link drive
       public function updateUnitLink(Request $request, $id)
       {
              $request->validate([
                     'google_drive_link' => 'nullable|url',
              ]);

              $unit = Unit::findOrFail($id);
              $unit->google_drive_link = $request->google_drive_link;
              $unit->save();

              return redirect()->back()->with('success', 'Link berhasil diperbarui!');
       }
}
