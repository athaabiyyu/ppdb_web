<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
       use HasFactory;

       protected $fillable = [
              'student_id',
              'nama_wali',
              'nik_wali',
              'tempat_lahir_wali',
              'tanggal_lahir_wali',
              'pendidikan_wali',
              'pekerjaan_wali',
              'penghasilan_wali',
              'hp_wali',
              'alamat',
              'desa',
              'kecamatan',
              'kabupaten',
              'provinsi',
              'kode_pos'
       ];

       protected $casts = [
              'tanggal_lahir_wali' => 'date',
       ];

       public const PENDIDIKAN_OPTIONS = [
              'SD' => 'SD',
              'SMP' => 'SMP',
              'SMA/SMK' => 'SMA/SMK',
              'Diploma (D1-D4)' => 'Diploma (D1-D4)',
              'Sarjana (S1)' => 'Sarjana (S1)',
              'Magister (S2)' => 'Magister (S2)',
              'Doktoral (S3)' => 'Doktoral (S3)',
       ];

       public function student()
       {
              return $this->belongsTo(Student::class);
       }
}
