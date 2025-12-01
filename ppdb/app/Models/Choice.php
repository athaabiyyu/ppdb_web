<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Choice extends Model
{
use HasFactory;


protected $fillable = ['student_id','pilihan_1','pilihan_2','sumber_informasi','informasi_lainnya'];


public function student()
{
return $this->belongsTo(Student::class);
}
}