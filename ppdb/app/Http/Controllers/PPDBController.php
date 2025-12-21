<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ParentInfo;
use App\Models\Guardian;
use App\Models\Document;
use App\Models\Choice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\RegistrationRequirement;
use App\Models\HomeSetting;
use App\Models\RegistrationFlow;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\SliderImage;
use App\Models\RegistrationStage;
use App\Models\Unit;
use Illuminate\Support\Str;

class PPDBController extends Controller
{
       public function index()
       {
              $sliders = SliderImage::all();
              $requirements = RegistrationRequirement::all();
              $flows = RegistrationFlow::orderBy('step_number')->get();
              $setting = HomeSetting::first() ?? HomeSetting::create([]);
              $units = Unit::orderBy('name')->get();

              return view('home', compact('sliders', 'requirements', 'flows', 'setting', 'units'));
       }

       public function pilihJenjang($jenjang)
       {
              $jenjang = strtoupper($jenjang);

              $lembaga = [];
              if ($jenjang === 'SMP') $lembaga = ['MTS', 'SMP', 'MTSN'];
              if ($jenjang === 'SMA') $lembaga = ['MA', 'SMK', 'MAN'];
              if ($jenjang === 'SD') $lembaga = ['SD'];

              return view('form-ppdb.pilih-lembaga', compact('jenjang', 'lembaga'));
       }

       public function pilihLembaga(Request $request)
       {
              // VALIDASI BASIC
              $data = $request->validate([
                     'jenjang' => 'required|string',
                     'pilihan' => 'array|max:2|nullable',
                     'sumber_informasi' => 'required|string',
                     'informasi_lainnya' => 'nullable|string'
              ]);

              // logic pemilihan lembaga
              if (strtoupper($data['jenjang']) === 'SD') {
                     $selected = ['SD'];
              } else {
                     $selected = $data['pilihan'] ?? [];
              }

              // SIMPAN KE SESSION
              $sessionId = Str::uuid()->toString();
              Session::put('ppdb_registration', [
                     'session_id' => $sessionId,
                     'jenjang' => strtoupper($data['jenjang']),
                     'selected_schools' => $selected,
                     'source_info' => $data['sumber_informasi'],
                     'source_info_other' => $data['informasi_lainnya'],
                     'data_pribadi' => null,
                     'data_ortu' => null,
                     'data_wali' => null,
                     'dokumen' => null,
              ]);

              // ✅ SIMPAN SESSION_ID KE SESSION (untuk middleware)
              session(['ppdb_session_id' => $sessionId]);

              return redirect()->route('form.data.pribadi', [
                     'id' => $sessionId,
                     'jenjang' => strtoupper($data['jenjang'])
              ]);
       }

       public function formDataPribadi($id, $jenjang)
       {
              $pendidikanOptions = Guardian::PENDIDIKAN_OPTIONS;
              
              // Validasi session
              if (!Session::has('ppdb_registration') || Session::get('ppdb_registration.session_id') !== $id) {
                     return redirect()->route('home')->with('error', 'Session expired');
              }

              return view('form-ppdb.form-data-pribadi', compact('jenjang', 'id', 'pendidikanOptions'));
       }

       public function storeDataPribadi(Request $request)
       {
              $sessionId = $request->id;

              // Validasi session
              if (!Session::has('ppdb_registration') || Session::get('ppdb_registration.session_id') !== $sessionId) {
                     return redirect()->route('home')->with('error', 'Session expired');
              }

              $rules = [
                     'id' => 'required|string',
                     'jenjang' => 'string',
                     'nama' => 'required|string|max:255',
                     'jenis_kelamin' => 'required|string',
                     'agama' => 'required|string',
                     'nisn' => 'required|string',
                     'hobi' => 'required|string',
                     'cita_cita' => 'required|string',
                     'no_kk' => 'required|string|size:16',
                     'nik' => 'required|string|size:16',
                     'tempat_lahir' => 'required|string',
                     'tanggal_lahir' => 'required|date',
                     'anak_ke' => 'required|integer|min:1',
                     'jumlah_saudara' => 'required|integer|min:0',
                     'tinggal_dengan' => 'required|in:Orang Tua,Wali',
                     'rencana_tinggal' => 'required|string',
                     'jarak_tempat_tinggal' => 'required|string',
                     'sekolah_asal' => 'required|string',
                     'alamat_sekolah_asal' => 'required|string',
                     'npsn_nsm' => 'required|string',
              ];

              if ($request->tinggal_dengan === 'Wali') {
                     $rules = array_merge($rules, [
                            'nama_wali' => 'required|string|max:255',
                            'nik_wali' => 'required|string|size:16',
                            'tempat_lahir_wali' => 'required|string',
                            'tanggal_lahir_wali' => 'required|date',
                            'pendidikan_wali' => 'required|in:SD,SMP,SMA/SMK,Diploma (D1-D4),Sarjana (S1),Magister (S2),Doktoral (S3)',
                            'pekerjaan_wali' => 'required|string',
                            'penghasilan_wali' => 'required|string',
                            'hp_wali' => 'required|string',
                            'alamat_wali' => 'required|string',
                            'desa_wali' => 'required|string',
                            'kecamatan_wali' => 'required|string',
                            'kabupaten_wali' => 'required|string',
                            'provinsi_wali' => 'required|string',
                            'kode_pos_wali' => 'required|string',
                     ]);
              }

              $messages = [
                     'required' => ':attribute wajib diisi.',
                     'string' => ':attribute harus berupa teks.',
                     'size' => ':attribute harus :size karakter.',
                     'integer' => ':attribute harus angka.',
                     'date' => ':attribute harus tanggal yang valid.',
                     'min' => ':attribute minimal :min.',
                     'in' => ':attribute pilihan tidak valid.',
              ];

              $req = $request->validate($rules, $messages);

              // SIMPAN KE SESSION
              $ppdb = Session::get('ppdb_registration');
              $ppdb['data_pribadi'] = [
                     'nama' => $req['nama'],
                     'jenis_kelamin' => $req['jenis_kelamin'],
                     'agama' => $req['agama'],
                     'nisn' => $req['nisn'],
                     'hobi' => $req['hobi'],
                     'cita_cita' => $req['cita_cita'],
                     'no_kk' => $req['no_kk'],
                     'nik' => $req['nik'],
                     'tempat_lahir' => $req['tempat_lahir'],
                     'tanggal_lahir' => $req['tanggal_lahir'],
                     'anak_ke' => $req['anak_ke'],
                     'jumlah_saudara' => $req['jumlah_saudara'],
                     'tinggal_dengan' => $req['tinggal_dengan'],
                     'rencana_tinggal' => $req['rencana_tinggal'],
                     'jarak_tempat_tinggal' => $req['jarak_tempat_tinggal'],
                     'sekolah_asal' => $req['sekolah_asal'],
                     'alamat_sekolah_asal' => $req['alamat_sekolah_asal'],
                     'npsn_nsm' => $req['npsn_nsm'],
              ];

              if ($req['tinggal_dengan'] === 'Wali') {
                     $ppdb['data_wali'] = [
                            'nama_wali' => $req['nama_wali'],
                            'nik_wali' => $req['nik_wali'],
                            'tempat_lahir_wali' => $req['tempat_lahir_wali'],
                            'tanggal_lahir_wali' => $req['tanggal_lahir_wali'],
                            'pendidikan_wali' => $req['pendidikan_wali'],
                            'pekerjaan_wali' => $req['pekerjaan_wali'],
                            'penghasilan_wali' => $req['penghasilan_wali'],
                            'hp_wali' => $req['hp_wali'],
                            'alamat' => $req['alamat_wali'],
                            'desa' => $req['desa_wali'],
                            'kecamatan' => $req['kecamatan_wali'],
                            'kabupaten' => $req['kabupaten_wali'],
                            'provinsi' => $req['provinsi_wali'],
                            'kode_pos' => $req['kode_pos_wali'],
                     ];
              }

              Session::put('ppdb_registration', $ppdb);

              return redirect()->route('form.ortu', ['id' => $sessionId]);
       }

       public function formOrtu($id)
       {
              if (!Session::has('ppdb_registration') || Session::get('ppdb_registration.session_id') !== $id) {
                     return redirect()->route('home')->with('error', 'Session expired');
              }

              $pendidikanOptions = ParentInfo::PENDIDIKAN_OPTIONS;
              return view('form-ppdb.form-ortu', compact('id', 'pendidikanOptions'));
       }

       public function storeOrtu(Request $request)
       {
              $sessionId = $request->session_id;

              if (!Session::has('ppdb_registration') || Session::get('ppdb_registration.session_id') !== $sessionId) {
                     return redirect()->route('home')->with('error', 'Session expired');
              }

              $rules = [
                     'session_id' => 'required|string',
                     'nama_ayah' => 'required|string|max:255',
                     'nama_ibu' => 'required|string|max:255',
                     'alamat_kk' => 'required|string',
                     'alamat' => 'required|string',
                     'desa' => 'required|string',
                     'kecamatan' => 'required|string',
                     'kabupaten' => 'required|string',
                     'provinsi' => 'required|string',
                     'kode_pos' => 'required|string',
                     'nik_ayah' => 'required|string|size:16',
                     'nik_ibu' => 'required|string|size:16',
                     'tempat_lahir_ayah' => 'required|string',
                     'tanggal_lahir_ayah' => 'required|date',
                     'tempat_lahir_ibu' => 'required|string',
                     'tanggal_lahir_ibu' => 'required|date',
                     'pendidikan_ayah' => 'required|in:SD,SMP,SMA/SMK,Diploma (D1-D4),Sarjana (S1),Magister (S2),Doktoral (S3)',
                     'pendidikan_ibu' => 'required|in:SD,SMP,SMA/SMK,Diploma (D1-D4),Sarjana (S1),Magister (S2),Doktoral (S3)',
                     'pekerjaan_ayah' => 'required|string',
                     'pekerjaan_ibu' => 'required|string',
                     'penghasilan_ayah' => 'required|string',
                     'penghasilan_ibu' => 'required|string',
                     'status_ayah' => 'required|string',
                     'status_ibu' => 'required|string',
                     'hp_ayah' => 'required|string',
                     'hp_ibu' => 'required|string',
              ];

              $messages = [
                     'required' => ':attribute wajib diisi.',
                     'string' => ':attribute harus berupa teks.',
                     'size' => ':attribute harus 16 karakter.',
                     'date' => ':attribute harus format tanggal yang valid.',
                     'in' => ':attribute pilihan tidak valid.',
              ];

              $req = $request->validate($rules, $messages);

              // SIMPAN KE SESSION
              $ppdb = Session::get('ppdb_registration');
              $ppdb['data_ortu'] = $req;
              unset($ppdb['data_ortu']['session_id']);
              Session::put('ppdb_registration', $ppdb);

              return redirect()->route('form.dokumen', ['id' => $sessionId]);
       }

       public function formDokumen($id)
       {
              if (!Session::has('ppdb_registration') || Session::get('ppdb_registration.session_id') !== $id) {
                     return redirect()->route('home')->with('error', 'Session expired');
              }

              $ppdb = Session::get('ppdb_registration');
              $jenjang = $ppdb['jenjang'];

              $semesterCount = 0;
              if ($jenjang === 'SMP') {
                     $semesterCount = 11;
              } elseif ($jenjang === 'SMA') {
                     $semesterCount = 5;
              }

              return view('form-ppdb.form-dokumen', compact('id', 'jenjang', 'semesterCount'));
       }

       public function storeDokumen(Request $request)
       {
              $sessionId = $request->session_id;

              if (!Session::has('ppdb_registration') || Session::get('ppdb_registration.session_id') !== $sessionId) {
                     return redirect()->route('home')->with('error', 'Session expired');
              }

              $ppdb = Session::get('ppdb_registration');
              $jenjang = $ppdb['jenjang'];

              $rules = [
                     'session_id' => 'required|string',
                     'kk' => 'required|file|max:1024',
                     'akte' => 'required|file|max:1024',
                     'ktp_ayah' => 'required|file|max:1024',
                     'ktp_ibu' => 'required|file|max:1024',
                     'surat_aktif' => 'required|file|max:1024',
                     'prestasi' => 'nullable|file|max:1024',
                     'kip_pkh' => 'nullable|file|max:1024',
                     'foto_anak' => 'required|file|image|max:1024',
              ];

              if ($jenjang === 'SMP') {
                     for ($i = 1; $i <= 11; $i++) {
                            $rules["transkrip_semester_{$i}"] = 'required|file|max:1024';
                     }
              } elseif ($jenjang === 'SMA') {
                     for ($i = 1; $i <= 5; $i++) {
                            $rules["transkrip_semester_{$i}"] = 'required|file|max:1024';
                     }
              }

              $messages = [
                     'required' => ':attribute wajib diisi.',
                     'file' => ':attribute harus berupa file.',
                     'image' => ':attribute harus berupa gambar.',
                     'max' => ':attribute maksimal 1MB.',
              ];

              $req = $request->validate($rules, $messages);

              // ===== SIMPAN SEMUA DATA KE DATABASE HANYA SAAT SUBMIT DOKUMEN =====

              // 1. Generate registration number
              $registrationNumber = 'PPDB-' . $jenjang . '-' . time();

              // 2. Simpan Student
              $student = Student::create([
                     'registration_number' => $registrationNumber,
                     'jenjang' => $ppdb['jenjang'],
                     'selected_schools' => $ppdb['selected_schools'],
                     'source_info' => $ppdb['source_info'],
                     'source_info_other' => $ppdb['source_info_other'],
                     'nama' => $ppdb['data_pribadi']['nama'],
                     'jenis_kelamin' => $ppdb['data_pribadi']['jenis_kelamin'],
                     'agama' => $ppdb['data_pribadi']['agama'],
                     'nisn' => $ppdb['data_pribadi']['nisn'],
                     'hobi' => $ppdb['data_pribadi']['hobi'],
                     'cita_cita' => $ppdb['data_pribadi']['cita_cita'],
                     'no_kk' => $ppdb['data_pribadi']['no_kk'],
                     'nik' => $ppdb['data_pribadi']['nik'],
                     'tempat_lahir' => $ppdb['data_pribadi']['tempat_lahir'],
                     'tanggal_lahir' => $ppdb['data_pribadi']['tanggal_lahir'],
                     'anak_ke' => $ppdb['data_pribadi']['anak_ke'],
                     'jumlah_saudara' => $ppdb['data_pribadi']['jumlah_saudara'],
                     'tinggal_dengan' => $ppdb['data_pribadi']['tinggal_dengan'],
                     'rencana_tinggal' => $ppdb['data_pribadi']['rencana_tinggal'],
                     'jarak_tempat_tinggal' => $ppdb['data_pribadi']['jarak_tempat_tinggal'],
                     'sekolah_asal' => $ppdb['data_pribadi']['sekolah_asal'],
                     'alamat_sekolah_asal' => $ppdb['data_pribadi']['alamat_sekolah_asal'],
                     'npsn_nsm' => $ppdb['data_pribadi']['npsn_nsm'],
              ]);

              // ✅ SIMPAN STUDENT_ID KE SESSION (untuk proteksi middleware)
              session(['ppdb_student_id' => $student->id]);

              // 3. Simpan ParentInfo
              ParentInfo::create([
                     'student_id' => $student->id,
                     ...$ppdb['data_ortu']
              ]);

              // 4. Simpan Guardian (jika ada)
              if ($ppdb['data_wali']) {
                     Guardian::create([
                            'student_id' => $student->id,
                            ...$ppdb['data_wali']
                     ]);
              }

              // 5. Simpan Dokumen
              $docData = ['student_id' => $student->id];

              foreach (['kk', 'akte', 'ktp_ayah', 'ktp_ibu', 'surat_aktif', 'prestasi', 'kip_pkh', 'foto_anak'] as $field) {
                     if ($request->hasFile($field)) {
                            $path = $request->file($field)->store('uploads/' . $registrationNumber, 'public');
                            $docData[$field] = $path;

                            if ($field === 'foto_anak') {
                                   $student->foto = $path;
                                   $student->save();
                            }
                     }
              }

              $transkripData = [];
              $maxSemester = ($jenjang === 'SMP') ? 11 : (($jenjang === 'SMA') ? 5 : 0);

              for ($i = 1; $i <= $maxSemester; $i++) {
                     $fieldName = "transkrip_semester_{$i}";
                     if ($request->hasFile($fieldName)) {
                            $path = $request->file($fieldName)->store('uploads/' . $registrationNumber . '/transkrip', 'public');
                            $transkripData["semester_{$i}"] = $path;
                     }
              }

              if (!empty($transkripData)) {
                     $docData['transkrip_semester'] = $transkripData;
              }

              Document::create($docData);

              // 6. Hapus session registration & redirect
              Session::forget('ppdb_registration');
              Session::forget('ppdb_session_id');

              return redirect()->route('biodata', ['id' => $student->id])
                     ->with('success', 'Pendaftaran berhasil! Data Anda telah tersimpan.');
       }

       public function biodata($id)
       {
              $student = Student::with(['parentInfo', 'guardian', 'documents', 'choice'])->findOrFail($id);
              $pendidikanOptions = Guardian::PENDIDIKAN_OPTIONS;
              return view('biodata.biodata', compact('student', 'pendidikanOptions'));
       }

       public function cetak($id)
       {
              $student = Student::with(['parentInfo', 'guardian', 'documents', 'choice'])->findOrFail($id);
              return view('biodata.cetak', compact('student'));
       }

       public function downloadPdf($id)
       {
              $student = Student::findOrFail($id);
              $pdf = Pdf::loadView('biodata.pdf', compact('student'));
              return $pdf->download('Bukti_Pendaftaran_' . $student->nama . '.pdf');
       }

       public function updateBiodata(Request $request, $id)
       {
              $student = Student::findOrFail($id);

              $rules = [
                     'nama' => 'nullable|string|max:255',
                     'jenis_kelamin' => 'nullable|string',
                     'agama' => 'nullable|string',
                     'nisn' => 'nullable',
                     'hobi' => 'nullable|string',
                     'cita_cita' => 'nullable|string',
                     'no_kk' => 'nullable',
                     'nik' => 'nullable',
                     'tempat_lahir' => 'nullable|string',
                     'tanggal_lahir' => 'nullable|date',
                     'anak_ke' => 'nullable|integer|min:1',
                     'jumlah_saudara' => 'nullable|integer|min:0',
                     'tinggal_dengan' => 'nullable|in:Orang Tua,Wali',
                     'rencana_tinggal' => 'nullable|string',
                     'jarak_tempat_tinggal' => 'nullable|string',
                     'sekolah_asal' => 'nullable|string',
                     'alamat_sekolah_asal' => 'nullable|string',
                     'npsn_nsm' => 'nullable|string',
                     'nama_ayah' => 'nullable|string|max:255',
                     'nama_ibu' => 'nullable|string|max:255',
                     'alamat_kk' => 'nullable|string',
                     'alamat_ortu' => 'nullable|string',
                     'desa_ortu' => 'nullable|string',
                     'kecamatan_ortu' => 'nullable|string',
                     'kabupaten_ortu' => 'nullable|string',
                     'provinsi_ortu' => 'nullable|string',
                     'kode_pos_ortu' => 'nullable|string',
                     'nik_ayah' => 'nullable|string',
                     'nik_ibu' => 'nullable|string',
                     'tempat_lahir_ayah' => 'nullable|string',
                     'tanggal_lahir_ayah' => 'nullable|date',
                     'tempat_lahir_ibu' => 'nullable|string',
                     'tanggal_lahir_ibu' => 'nullable|date',
                     'pendidikan_ayah' => 'nullable|in:SD,SMP,SMA/SMK,Diploma (D1-D4),Sarjana (S1),Magister (S2),Doktoral (S3)',
                     'pendidikan_ibu' => 'nullable|in:SD,SMP,SMA/SMK,Diploma (D1-D4),Sarjana (S1),Magister (S2),Doktoral (S3)',
                     'pekerjaan_ayah' => 'nullable|string',
                     'pekerjaan_ibu' => 'nullable|string',
                     'penghasilan_ayah' => 'nullable|string',
                     'penghasilan_ibu' => 'nullable|string',
                     'status_ayah' => 'nullable|string',
                     'status_ibu' => 'nullable|string',
                     'hp_ayah' => 'nullable|string',
                     'hp_ibu' => 'nullable|string',
                     'nama_wali' => 'nullable|string',
                     'nik_wali' => 'nullable|string',
                     'tempat_lahir_wali' => 'nullable|string',
                     'tanggal_lahir_wali' => 'nullable|date',
                     'pendidikan_wali' => 'nullable|in:SD,SMP,SMA/SMK,Diploma (D1-D4),Sarjana (S1),Magister (S2),Doktoral (S3)',
                     'pekerjaan_wali' => 'nullable|string',
                     'penghasilan_wali' => 'nullable|string',
                     'hp_wali' => 'nullable|string',
                     'alamat_wali' => 'nullable|string',
                     'desa_wali' => 'nullable|string',
                     'kecamatan_wali' => 'nullable|string',
                     'kabupaten_wali' => 'nullable|string',
                     'provinsi_wali' => 'nullable|string',
                     'kode_pos_wali' => 'nullable|string',
              ];

              $validated = $request->validate($rules);

              $studentData = array_filter([
                     'nama' => $validated['nama'] ?? null,
                     'jenis_kelamin' => $validated['jenis_kelamin'] ?? null,
                     'agama' => $validated['agama'] ?? null,
                     'nisn' => $validated['nisn'] ?? null,
                     'hobi' => $validated['hobi'] ?? null,
                     'cita_cita' => $validated['cita_cita'] ?? null,
                     'no_kk' => $validated['no_kk'] ?? null,
                     'nik' => $validated['nik'] ?? null,
                     'tempat_lahir' => $validated['tempat_lahir'] ?? null,
                     'tanggal_lahir' => $validated['tanggal_lahir'] ?? null,
                     'anak_ke' => $validated['anak_ke'] ?? null,
                     'jumlah_saudara' => $validated['jumlah_saudara'] ?? null,
                     'tinggal_dengan' => $validated['tinggal_dengan'] ?? null,
                     'rencana_tinggal' => $validated['rencana_tinggal'] ?? null,
                     'jarak_tempat_tinggal' => $validated['jarak_tempat_tinggal'] ?? null,
                     'sekolah_asal' => $validated['sekolah_asal'] ?? null,
                     'alamat_sekolah_asal' => $validated['alamat_sekolah_asal'] ?? null,
                     'npsn_nsm' => $validated['npsn_nsm'] ?? null,
              ], function ($value) {
                     return !is_null($value);
              });

              if (!empty($studentData)) {
                     $student->update($studentData);
              }

              if ($student->parentInfo) {
                     $parentData = array_filter([
                            'nama_ayah' => $validated['nama_ayah'] ?? null,
                            'nama_ibu' => $validated['nama_ibu'] ?? null,
                            'alamat_kk' => $validated['alamat_kk'] ?? null,
                            'alamat' => $validated['alamat_ortu'] ?? null,
                            'desa' => $validated['desa_ortu'] ?? null,
                            'kecamatan' => $validated['kecamatan_ortu'] ?? null,
                            'kabupaten' => $validated['kabupaten_ortu'] ?? null,
                            'provinsi' => $validated['provinsi_ortu'] ?? null,
                            'kode_pos' => $validated['kode_pos_ortu'] ?? null,
                            'nik_ayah' => $validated['nik_ayah'] ?? null,
                            'nik_ibu' => $validated['nik_ibu'] ?? null,
                            'tempat_lahir_ayah' => $validated['tempat_lahir_ayah'] ?? null,
                            'tanggal_lahir_ayah' => $validated['tanggal_lahir_ayah'] ?? null,
                            'tempat_lahir_ibu' => $validated['tempat_lahir_ibu'] ?? null,
                            'tanggal_lahir_ibu' => $validated['tanggal_lahir_ibu'] ?? null,
                            'pendidikan_ayah' => $validated['pendidikan_ayah'] ?? null,
                            'pendidikan_ibu' => $validated['pendidikan_ibu'] ?? null,
                            'pekerjaan_ayah' => $validated['pekerjaan_ayah'] ?? null,
                            'pekerjaan_ibu' => $validated['pekerjaan_ibu'] ?? null,
                            'penghasilan_ayah' => $validated['penghasilan_ayah'] ?? null,
                            'penghasilan_ibu' => $validated['penghasilan_ibu'] ?? null,
                            'status_ayah' => $validated['status_ayah'] ?? null,
                            'status_ibu' => $validated['status_ibu'] ?? null,
                            'hp_ayah' => $validated['hp_ayah'] ?? null,
                            'hp_ibu' => $validated['hp_ibu'] ?? null,
                     ], function ($value) {
                            return !is_null($value);
                     });

                     if (!empty($parentData)) {
                            $student->parentInfo->update($parentData);
                     }
              }

              if ($student->guardian && $student->tinggal_dengan === 'Wali') {
                     $guardianData = array_filter([
                            'nama_wali' => $validated['nama_wali'] ?? null,
                            'nik_wali' => $validated['nik_wali'] ?? null,
                            'tempat_lahir_wali' => $validated['tempat_lahir_wali'] ?? null,
                            'tanggal_lahir_wali' => $validated['tanggal_lahir_wali'] ?? null,
                            'pendidikan_wali' => $validated['pendidikan_wali'] ?? null,
                            'pekerjaan_wali' => $validated['pekerjaan_wali'] ?? null,
                            'penghasilan_wali' => $validated['penghasilan_wali'] ?? null,
                            'hp_wali' => $validated['hp_wali'] ?? null,
                            'alamat' => $validated['alamat_wali'] ?? null,
                            'desa' => $validated['desa_wali'] ?? null,
                            'kecamatan' => $validated['kecamatan_wali'] ?? null,
                            'kabupaten' => $validated['kabupaten_wali'] ?? null,
                            'provinsi' => $validated['provinsi_wali'] ?? null,
                            'kode_pos' => $validated['kode_pos_wali'] ?? null,
                     ], function ($value) {
                            return !is_null($value);
                     });

                     if (!empty($guardianData)) {
                            $student->guardian->update($guardianData);
                     }
              }

              return redirect()->route('biodata', ['id' => $student->id])
                     ->with('success', 'Data berhasil diperbarui!');
       }

       public function updateDokumen(Request $request, $id)
       {
              $student = Student::findOrFail($id);

              $rules = [
                     'kk' => 'nullable|file|max:5120',
                     'akte' => 'nullable|file|max:5120',
                     'ktp_ayah' => 'nullable|file|max:5120',
                     'ktp_ibu' => 'nullable|file|max:5120',
                     'surat_aktif' => 'nullable|file|max:5120',
                     'prestasi' => 'nullable|file|max:5120',
                     'kip_pkh' => 'nullable|file|max:5120',
                     'foto_anak' => 'nullable|file|image|max:5120',
              ];

              if ($student->jenjang === 'SMP') {
                     for ($i = 1; $i <= 11; $i++) {
                            $rules["transkrip_semester_{$i}"] = 'nullable|file|max:5120';
                     }
              } elseif ($student->jenjang === 'SMA') {
                     for ($i = 1; $i <= 5; $i++) {
                            $rules["transkrip_semester_{$i}"] = 'nullable|file|max:5120';
                     }
              }

              $messages = [
                     'file' => ':attribute harus berupa file.',
                     'image' => ':attribute harus berupa gambar.',
                     'max' => ':attribute maksimal 5MB.',
              ];

              $validated = $request->validate($rules, $messages);

              $document = Document::where('student_id', $student->id)->first();

              if (!$document) {
                     $document = new Document(['student_id' => $student->id]);
              }

              foreach (['kk', 'akte', 'ktp_ayah', 'ktp_ibu', 'surat_aktif', 'prestasi', 'kip_pkh', 'foto_anak'] as $field) {
                     if ($request->hasFile($field)) {
                            if ($document->$field && Storage::disk('public')->exists($document->$field)) {
                                   Storage::disk('public')->delete($document->$field);
                            }

                            $path = $request->file($field)->store('uploads/' . $student->registration_number, 'public');
                            $document->$field = $path;

                            if ($field === 'foto_anak') {
                                   if ($student->foto && Storage::disk('public')->exists($student->foto)) {
                                          Storage::disk('public')->delete($student->foto);
                                   }
                                   $student->foto = $path;
                                   $student->save();
                            }
                     }
              }

              $maxSemester = 0;
              if ($student->jenjang === 'SMP') {
                     $maxSemester = 11;
              } elseif ($student->jenjang === 'SMA') {
                     $maxSemester = 5;
              }

              if ($maxSemester > 0) {
                     $transkripData = $document->transkrip_semester ?? [];

                     for ($i = 1; $i <= $maxSemester; $i++) {
                            $fieldName = "transkrip_semester_{$i}";
                            if ($request->hasFile($fieldName)) {
                                   if (isset($transkripData["semester_{$i}"]) && Storage::disk('public')->exists($transkripData["semester_{$i}"])) {
                                          Storage::disk('public')->delete($transkripData["semester_{$i}"]);
                                   }

                                   $path = $request->file($fieldName)->store('uploads/' . $student->registration_number . '/transkrip', 'public');
                                   $transkripData["semester_{$i}"] = $path;
                            }
                     }

                     $document->transkrip_semester = $transkripData;
              }

              $document->save();

              return redirect()->route('biodata', ['id' => $student->id])
                     ->with('success', 'Dokumen berhasil diperbarui!');
       }
}