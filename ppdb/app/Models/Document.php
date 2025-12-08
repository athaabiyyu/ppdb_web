<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
       use HasFactory;

       protected $fillable = [
              'student_id',
              'kk',
              'akte',
              'ktp_ayah',
              'ktp_ibu',
              'surat_aktif',
              'transkrip_semester', // JSON field
              'prestasi',
              'kip_pkh',
              'foto_anak'
       ];

       protected $casts = [
              'transkrip_semester' => 'array', // Auto convert JSON to array
       ];

       public function student()
       {
              return $this->belongsTo(Student::class);
       }
}
