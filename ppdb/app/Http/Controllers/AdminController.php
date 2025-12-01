<?php

namespace App\Http\Controllers;


use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
       public function dashboard()
       {
              $counts = [
                     'SD' => Student::where('jenjang', 'SD')->count(),
                     'SMP' => Student::where('jenjang', 'SMP')->count(),
                     'SMA' => Student::where('jenjang', 'SMA')->count(),
              ];


              return view('admin.dashboard', compact('counts'));
       }


       public function dataPerLembaga($lembaga)
       {
              $lembaga = strtoupper($lembaga);
              $students = Student::whereJsonContains('selected_schools', $lembaga)
                     ->orWhere('jenjang', $lembaga)
                     ->with(['parentInfo', 'documents', 'choice'])
                     ->paginate(20);


              return view('admin.data', compact('students', 'lembaga'));
       }


       public function exportCsv($lembaga)
       {
              $lembaga = strtoupper($lembaga);
              $rows = Student::whereJsonContains('selected_schools', $lembaga)
                     ->orWhere('jenjang', $lembaga)
                     ->with(['parentInfo', 'documents', 'choice'])
                     ->get();


              $filename = "export_{$lembaga}_" . date('Ymd_His') . ".csv";
              $headers = [
                     'Content-Type' => 'text/csv',
                     'Content-Disposition' => "attachment; filename={$filename}",
              ];


              $columns = ['registration_number', 'nama', 'jenjang', 'pilihan_1', 'pilihan_2', 'hp_ayah', 'hp_ibu', 'alamat_kk'];


              $callback = function () use ($rows, $columns) {
                     $file = fopen('php://output', 'w');
                     fputcsv($file, $columns);
                     foreach ($rows as $s) {
                            $parent = $s->parentInfo;
                            $choice = $s->choice;
                            $line = [
                                   $s->registration_number,
                                   $s->nama,
                                   $s->jenjang,
                                   $choice->pilihan_1 ?? '',
                                   $choice->pilihan_2 ?? '',
                                   $parent->hp_ayah ?? '',
                                   $parent->hp_ibu ?? '',
                                   $parent->alamat_kk ?? ''
                            ];
                            fputcsv($file, $line);
                     }
                     fclose($file);
              };


              return response()->stream($callback, 200, $headers);
       }
}
