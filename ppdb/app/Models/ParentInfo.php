<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ParentInfo extends Model
{
use HasFactory;


protected $table = 'parent_infos';


protected $fillable = [
'student_id','nama_ayah','nik_ayah','ttl_ayah','pendidikan_ayah','pekerjaan_ayah','penghasilan_ayah','status_ayah','hp_ayah',
'nama_ibu','nik_ibu','ttl_ibu','pendidikan_ibu','pekerjaan_ibu','penghasilan_ibu','status_ibu','hp_ibu',
'alamat_kk','alamat','desa','kecamatan','kabupaten','provinsi','kode_pos'
];


public function student()
{
return $this->belongsTo(Student::class);
}
}