<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ParentInfo;
use App\Models\Document;
use App\Models\Choice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PPDBController extends Controller
{
       public function index()
       {
              return view('home');
       }

       public function pilihJenjang($jenjang)
       {
              $jenjang = strtoupper($jenjang);

              $lembaga = [];
              if ($jenjang === 'SMP') $lembaga = ['MTS', 'SMP', 'MTSN'];
              if ($jenjang === 'SMA') $lembaga = ['MA', 'SMK', 'MAN'];
              if ($jenjang === 'SD') $lembaga = ['SD'];

              return view('pilih-lembaga', compact('jenjang', 'lembaga'));
       }

       public function pilihLembaga(Request $request)
       {
              $data = $request->validate([
                     'jenjang' => 'required',
                     'pilihan' => 'array|max:2',
                     'sumber_informasi' => 'nullable|string',
                     'informasi_lainnya' => 'nullable|string'
              ]);

              // Create a temp student record to store progress (optional)
              $student = Student::create([
                     'jenjang' => strtoupper($data['jenjang']),
                     'selected_schools' => $data['pilihan'] ?? null,
                     'source_info' => $data['sumber_informasi'] ?? null,
                     'source_info_other' => $data['informasi_lainnya'] ?? null,
                     'nama' => 'DUMMY'
              ]);

              // redirect to form pribadi
              return redirect()->route('form.data.pribadi', [
                     'id' => $student->id,
                     'jenjang' => $student->jenjang
              ]);
       }

       public function formDataPribadi($id, $jenjang)
       {
              return view('form-data-pribadi', compact('jenjang', 'id'));
       }


       public function storeDataPribadi(Request $request)
       {
              $req = $request->validate([
                     'id' => 'nullable|exists:students,id',
                     'jenjang' => 'required',
                     'nama' => 'required|string',
                     'jenis_kelamin' => 'required',
                     'agama' => 'nullable|string',
                     'nisn' => 'nullable|string',
                     'hobi' => 'nullable|string',
                     'cita_cita' => 'nullable|string',
                     'no_kk' => 'nullable|string',
                     'nik' => 'nullable|string',
                     'ttl' => 'nullable|string',
                     'anak_ke' => 'nullable|integer',
                     'jumlah_saudara' => 'nullable|integer',
                     'tinggal_dengan' => 'nullable|string',
                     'rencana_tinggal' => 'nullable|string',
                     'jarak_tempat_tinggal' => 'nullable|string',
                     'sekolah_asal' => 'nullable|string',
                     'alamat_sekolah_asal' => 'nullable|string',
                     'npsn_nsm' => 'nullable|string',
              ]);

              $student = Student::find($req['id']);
              if (!$student) {
                     // create new
                     $student = Student::create($req);
              } else {
                     $student->update($req);
              }

              return redirect()->route('form.ortu', ['id' => $student->id]);
       }

       public function formOrtu($id)
       {
              $student = Student::findOrFail($id);
              return view('form-ortu', compact('student'));
       }

       public function storeOrtu(Request $request)
       {
              $req = $request->validate([
                     'student_id' => 'required|exists:students,id',
                     'nama_ayah' => 'nullable|string',
                     'nama_ibu' => 'nullable|string',
                     'alamat_kk' => 'nullable|string',
                     'alamat' => 'nullable|string',
                     'desa' => 'nullable|string',
                     'kecamatan' => 'nullable|string',
                     'kabupaten' => 'nullable|string',
                     'provinsi' => 'nullable|string',
                     'kode_pos' => 'nullable|string',
                     'nik_ayah' => 'nullable|string',
                     'nik_ibu' => 'nullable|string',
                     'ttl_ayah' => 'nullable|string',
                     'ttl_ibu' => 'nullable|string',
                     'pendidikan_ayah' => 'nullable|string',
                     'pendidikan_ibu' => 'nullable|string',
                     'pekerjaan_ayah' => 'nullable|string',
                     'pekerjaan_ibu' => 'nullable|string',
                     'penghasilan_ayah' => 'nullable|string',
                     'penghasilan_ibu' => 'nullable|string',
                     'status_ayah' => 'nullable|string',
                     'status_ibu' => 'nullable|string',
                     'hp_ayah' => 'nullable|string',
                     'hp_ibu' => 'nullable|string',
              ]);

              $parent = ParentInfo::updateOrCreate(
                     ['student_id' => $req['student_id']],
                     $req
              );

              return redirect()->route('form.dokumen', ['id' => $req['student_id']]);
       }

       public function formDokumen($id)
       {
              $student = Student::findOrFail($id);
              return view('form-dokumen', compact('student'));
       }

       public function storeDokumen(Request $request)
       {
              $req = $request->validate([
                     'student_id' => 'required|exists:students,id',
                     'kk' => 'nullable',
                     'akte' => 'nullable',
                     'ktp_ayah' => 'nullable',
                     'ktp_ibu' => 'nullable',
                     'surat_aktif' => 'nullable',
                     'transkrip_smp_1_12' => 'nullable',
                     'transkrip_ma_1_5' => 'nullable',
                     'prestasi' => 'nullable',
                     'kip_pkh' => 'nullable',
                     'foto_anak' => 'nullable',
              ]);

              $student = Student::findOrFail($req['student_id']);

              $data = [];
              foreach (['kk', 'akte', 'ktp_ayah', 'ktp_ibu', 'surat_aktif', 'transkrip_smp_1_12', 'transkrip_ma_1_5', 'prestasi', 'kip_pkh', 'foto_anak'] as $field) {
                     if ($request->hasFile($field)) {
                            $path = $request->file($field)->store('uploads/' . $student->registration_number, 'public');
                            $data[$field] = $path;

                            // special: store foto as student's foto column
                            if ($field === 'foto_anak') {
                                   $student->foto = $path;
                                   $student->save();
                            }
                     }
              }

              $doc = Document::updateOrCreate(['student_id' => $student->id], $data);

              return redirect()->route('biodata', ['id' => $student->id]);
       }

       public function biodata($id)
       {
              $student = Student::with(['parentInfo', 'documents', 'choice'])->findOrFail($id);
              return view('biodata', compact('student'));
       }

       public function cetak($id)
       {
              $student = Student::with(['parentInfo', 'documents', 'choice'])->findOrFail($id);
              return view('cetak', compact('student'));
       }
}
