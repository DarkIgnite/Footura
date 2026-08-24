<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('produk_id')->nullable()->constrained('produks')->nullOnDelete();
            $table->dateTime('tanggal_pesan');
            $table->enum('status_pesanan', ['pending', 'diproses', 'dikirim', 'selesai', 'batal'])->default('pending');
            $table->integer('total_harga');
            $table->string('alamat_pengiriman', 150);
            $table->string('no_resi', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
