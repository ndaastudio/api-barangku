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
        Schema::create('jasa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jasa');
            $table->foreignIdFor(Akun::class);
            $table->string('nama_jasa');
            $table->string('kategori');
            $table->string('jumlah_jasa');
            $table->string('letak_jasa');
            $table->string('keterangan');
            $table->string('jadwal_rencana');
            $table->string('jadwal_notifikasi');
            $table->integer('progress')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jasa');
    }
};
