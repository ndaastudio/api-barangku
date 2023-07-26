<?php

use App\Models\Akun;
use App\Models\Barang;
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
        Schema::create('gambar_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Akun::class);
            $table->foreignIdFor(Barang::class);
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar_barang');
    }
};
