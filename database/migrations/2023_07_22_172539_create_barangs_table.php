<?php

use App\Models\Akun;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_barang');
            $table->foreignIdFor(Akun::class);
            $table->string('nama_barang');
            $table->string('kategori');
            $table->string('kategori_lainnya')->nullable();
            $table->string('status');
            $table->string('extend_status');
            $table->string('jumlah_barang');
            $table->string('letak_barang');
            $table->string('keterangan');
            $table->string('jadwal_rencana');
            $table->string('jadwal_notifikasi');
            $table->string('reminder');
            $table->integer('progress')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
