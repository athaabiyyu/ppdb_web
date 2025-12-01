<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('parent_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');


            $table->string('nama_ayah')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('ttl_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->enum('status_ayah', ['Hidup', 'Meninggal'])->nullable();
            $table->string('hp_ayah')->nullable();


            $table->string('nama_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('ttl_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->enum('status_ibu', ['Hidup', 'Meninggal'])->nullable();
            $table->string('hp_ibu')->nullable();


            // alamat
            $table->text('alamat_kk')->nullable();
            $table->text('alamat')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();


            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('parent_infos');
    }
};
