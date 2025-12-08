<?php
// database/migrations/2025_01_01_000002_create_home_settings_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('show_register_button')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_settings');
    }
};
