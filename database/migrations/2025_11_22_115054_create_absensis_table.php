<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->string('attendance');
            $table->timestamps();

            $table->foreignId('pertemuan_id')->constrained('jadwals')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('class_id')->constrained('kelas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('siswa_id')->constrained('siswas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('tutor_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
