<?php

use App\Models\Akun;
use App\Models\Jasa;
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
        Schema::create('gambar_jasa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_gambar_jasa');
            $table->foreignIdFor(Akun::class);
            $table->foreignIdFor(Jasa::class);
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar_jasa');
    }
};
