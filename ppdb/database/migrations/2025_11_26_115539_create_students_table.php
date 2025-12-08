<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();
            $table->enum('jenjang', ['SD', 'SMP', 'SMA']);
            $table->json('selected_schools')->nullable();
            $table->string('source_info')->nullable();
            $table->string('source_info_other')->nullable();

            // personal
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama')->nullable();
            $table->string('nisn')->nullable();
            $table->string('hobi')->nullable();
            $table->string('cita_cita')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('nik')->nullable();

            // Perbaikan — pisah tempat & tanggal lahir
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();

            $table->integer('anak_ke')->nullable();
            $table->integer('jumlah_saudara')->nullable();

            // Perbaikan — ubah ke enum Orang Tua / Wali
            $table->enum('tinggal_dengan', ['Orang Tua', 'Wali'])->nullable();

            $table->enum('rencana_tinggal', ['Asrama', 'Rumah'])->nullable();
            $table->enum('jarak_tempat_tinggal', ['<1 km', '1-5 km', '>5 km'])->nullable();
            $table->string('sekolah_asal')->nullable();
            $table->text('alamat_sekolah_asal')->nullable();
            $table->string('npsn_nsm')->nullable();

            $table->string('foto')->nullable(); // path foto siswa

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};
