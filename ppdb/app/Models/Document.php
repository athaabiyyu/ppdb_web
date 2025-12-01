<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Document extends Model
{
use HasFactory;


protected $fillable = [
'student_id','kk','akte','ktp_ayah','ktp_ibu','surat_aktif','transkrip_smp_1_12','transkrip_ma_1_5','prestasi','kip_pkh','foto_anak'
];


public function student()
{
return $this->belongsTo(Student::class);
}
}