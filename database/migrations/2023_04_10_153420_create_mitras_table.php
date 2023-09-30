<?php

use App\Models\User;
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
        Schema::create('mitra', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('umur');
            $table->string('pendidikan_terakhir');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('nomor_telepon');
            $table->string('nomor_whatsapp');
            $table->longText('pekerjaan');
            $table->string('dokumen_cv');
            $table->integer('check1');
            $table->integer('check2');
            $table->integer('status_tahap');
            $table->integer('harga_kode')->nullable();
            $table->integer('kuota_kode')->default(1);
            $table->string('nomor_rekening')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('nama_rekening')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra');
    }
};
