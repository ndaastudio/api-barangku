<?php

use App\Models\Mitra;
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
        Schema::create('akun', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Mitra::class)->nullable();
            $table->string('nama')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('nomor_telepon')->unique();
            $table->string('password')->nullable();
            $table->string('kode_daftar', 6);
            $table->integer('jenis_akun')->default(0)->comment('0 (trial 7hr), 1 (365hr)');
            $table->integer('status_akun')->default(0)->comment('0 (belum aktivasi), 1 (sudah aktivasi), 2 (nonaktif)');
            $table->dateTime('limit_akun')->nullable();
            $table->string('kode_lupa_password', 6)->unique()->nullable();
            $table->dateTime('tanggal_sinkron')->nullable();
            $table->string('device_login')->nullable();
            $table->integer('status_bayar')->default(0)->comment('0 (belum bayar), 1 (sudah bayar)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun');
    }
};
