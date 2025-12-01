<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ParentInfo;
use App\Models\Document;
use App\Models\Choice;


class Student extends Model
{
       use HasFactory;


       protected $fillable = [
              'registration_number',
              'jenjang',
              'selected_schools',
              'source_info',
              'source_info_other',
              'nama',
              'jenis_kelamin',
              'agama',
              'nisn',
              'hobi',
              'cita_cita',
              'no_kk',
              'nik',
              'ttl',
              'anak_ke',
              'jumlah_saudara',
              'tinggal_dengan',
              'rencana_tinggal',
              'jarak_tempat_tinggal',
              'sekolah_asal',
              'alamat_sekolah_asal',
              'npsn_nsm',
              'foto'
       ];


       protected $casts = [
              'selected_schools' => 'array',
       ];


       public function parentInfo()
       {
              return $this->hasOne(ParentInfo::class);
       }


       public function documents()
       {
              return $this->hasOne(Document::class);
       }


       public function choice()
       {
              return $this->hasOne(Choice::class);
       }


       // Auto-generate registration number
       public static function boot()
       {
              parent::boot();


              static::creating(function ($model) {
                     if (empty($model->registration_number)) {
                            $last = self::orderBy('id', 'desc')->first();
                            $nextId = $last ? $last->id + 1 : 1;
                            $model->registration_number = 'PPDB' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
                     }
              });
       }
}
