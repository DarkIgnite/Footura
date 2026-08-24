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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategoris')->cascadeOnDelete();
            $table->string('nama_produk', 100);
            $table->unsignedBigInteger('harga_produk');
            $table->text('deskripsi_produk')->nullable();
            $table->string('merk', 50)->nullable();
            $table->string('foto_produk', 100)->nullable();
            $table->decimal('avg_rating', 3, 2)->default(0.00);
            $table->string('ukuran', 5)->nullable();
            $table->integer('stok')->default(0);
            $table->string('warna')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
