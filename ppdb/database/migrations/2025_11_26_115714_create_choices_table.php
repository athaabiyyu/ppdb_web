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
        Schema::create('choices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');


            $table->string('pilihan_1')->nullable();
            $table->string('pilihan_2')->nullable();
            $table->string('sumber_informasi')->nullable();
            $table->string('informasi_lainnya')->nullable();


            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('choices');
    }
};
