<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            
            // Data Wali
            $table->string('nama_wali');
            $table->string('nik_wali');
            $table->string('tempat_lahir_wali');
            $table->date('tanggal_lahir_wali');
            $table->enum('pendidikan_wali', [
                'SD',
                'SMP',
                'SMA/SMK',
                'Diploma (D1-D4)',
                'Sarjana (S1)',
                'Magister (S2)',
                'Doktoral (S3)'
            ]);
            $table->string('pekerjaan_wali');
            $table->string('penghasilan_wali');
            $table->string('hp_wali');
            
            // Alamat Wali
            $table->text('alamat');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('kode_pos');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guardians');
    }
};