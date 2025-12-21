<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Unit;


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

              return view('admin.data-siswa.data-siswa', compact('lembagaList'));
       }

       private function formatNama($text)
       {
              if (!$text) return '';
              return ucwords(strtolower($text));
       }

       private function formatNonNama($text)
       {
              if (!$text) return '';
              $text = strtolower($text);
              return ucfirst($text);
       }

       private function formatRupiah($value)
       {
              if (!$value || !is_numeric($value)) return $value;
              return number_format($value, 0, ',', '.');
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
                                   $s->id,
                                   $this->formatNonNama($s->registration_number),
                                   $this->formatNonNama($s->jenjang),
                                   $this->formatNonNama($selected),
                                   $this->formatNama($s->nama),
                                   $this->formatNonNama($s->jenis_kelamin),
                                   $this->formatNonNama($s->agama),
                                   $s->nisn,
                                   $this->formatNonNama($s->hobi),
                                   $this->formatNonNama($s->cita_cita),
                                   $s->no_kk,
                                   $s->nik,
                                   $this->formatNonNama($s->tempat_lahir),
                                   $s->tanggal_lahir?->format('d-m-Y') ?? '',
                                   $s->anak_ke,
                                   $s->jumlah_saudara,
                                   $this->formatNonNama($s->tinggal_dengan),
                                   $this->formatNonNama($s->rencana_tinggal),
                                   $this->formatNonNama($s->jarak_tempat_tinggal),
                                   $this->formatNonNama($s->sekolah_asal),
                                   $this->formatNonNama($s->alamat_sekolah_asal),
                                   $s->npsn_nsm,

                                   // Ayah
                                   $this->formatNama($p?->nama_ayah ?? ''),
                                   $p?->nik_ayah ?? '',
                                   $this->formatNonNama($p?->tempat_lahir_ayah ?? ''),
                                   $p?->tanggal_lahir_ayah?->format('d-m-Y') ?? '',
                                   $this->formatNonNama($p?->pendidikan_ayah ?? ''),
                                   $this->formatNonNama($p?->pekerjaan_ayah ?? ''),
                                   $this->formatRupiah($p?->penghasilan_ayah ?? ''),
                                   $this->formatNonNama($p?->status_ayah ?? ''),
                                   $p?->hp_ayah ?? '',

                                   // Ibu
                                   $this->formatNama($p?->nama_ibu ?? ''),
                                   $p?->nik_ibu ?? '',
                                   $this->formatNonNama($p?->tempat_lahir_ibu ?? ''),
                                   $p?->tanggal_lahir_ibu?->format('d-m-Y') ?? '',
                                   $this->formatNonNama($p?->pendidikan_ibu ?? ''),
                                   $this->formatNonNama($p?->pekerjaan_ibu ?? ''),
                                   $this->formatRupiah($p?->penghasilan_ibu ?? ''),
                                   $this->formatNonNama($p?->status_ibu ?? ''),
                                   $p?->hp_ibu ?? '',

                                   // Alamat parent
                                   $this->formatNonNama($p?->alamat_kk ?? ''),
                                   $this->formatNonNama($p?->alamat ?? ''),
                                   $this->formatNonNama($p?->desa ?? ''),
                                   $this->formatNonNama($p?->kecamatan ?? ''),
                                   $this->formatNonNama($p?->kabupaten ?? ''),
                                   $this->formatNonNama($p?->provinsi ?? ''),
                                   $p?->kode_pos ?? '',

                                   // Wali
                                   $this->formatNama($w?->nama_wali ?? ''),
                                   $w?->nik_wali ?? '',
                                   $this->formatNonNama($w?->tempat_lahir_wali ?? ''),
                                   $w?->tanggal_lahir_wali?->format('d-m-Y') ?? '',
                                   $this->formatNonNama($w?->pendidikan_wali ?? ''),
                                   $this->formatNonNama($w?->pekerjaan_wali ?? ''),
                                   $this->formatRupiah($w?->penghasilan_wali ?? ''),
                                   $w?->hp_wali ?? '',
                                   // Alamat wali
                                   $this->formatNonNama($w?->alamat ?? ''),
                                   $this->formatNonNama($w?->desa ?? ''),
                                   $this->formatNonNama($w?->kecamatan ?? ''),
                                   $this->formatNonNama($w?->kabupaten ?? ''),
                                   $this->formatNonNama($w?->provinsi ?? ''),
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
