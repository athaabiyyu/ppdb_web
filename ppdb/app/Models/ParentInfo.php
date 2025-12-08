<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentInfo extends Model
{
    use HasFactory;

    protected $table = 'parent_infos';

    protected $fillable = [
        'student_id',
        'nama_ayah',
        'nik_ayah',
        'tempat_lahir_ayah',
        'tanggal_lahir_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'status_ayah',
        'hp_ayah',
        'nama_ibu',
        'nik_ibu',
        'tempat_lahir_ibu',
        'tanggal_lahir_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'status_ibu',
        'hp_ibu',
        'alamat_kk',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos'
    ];

    protected $casts = [
        'tanggal_lahir_ayah' => 'date',
        'tanggal_lahir_ibu' => 'date',
    ];

    // Konstanta untuk pilihan pendidikan
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