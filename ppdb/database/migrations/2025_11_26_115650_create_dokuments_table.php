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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');

            $table->string('kk')->nullable();
            $table->string('akte')->nullable();
            $table->string('ktp_ayah')->nullable();
            $table->string('ktp_ibu')->nullable();
            $table->string('surat_aktif')->nullable();
            
            // Kolom JSON untuk menyimpan transkrip per semester
            // Format: {"semester_1": "path/to/file", "semester_2": "path/to/file", ...}
            $table->json('transkrip_semester')->nullable();
            
            $table->string('prestasi')->nullable();
            $table->string('kip_pkh')->nullable();
            $table->string('foto_anak')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
};