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
        Schema::create('komentar', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('id_siswa');
    $table->text('isi_komentar');
    $table->string('status')->default('pending');
    $table->timestamps();

    $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentar');
    }
};
