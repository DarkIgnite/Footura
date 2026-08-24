<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50);
            $table->string('email', 50)->unique();
            $table->string('password', 25);
            $table->string('no_telp', 15)->nullable();
            $table->string('alamat', 150)->nullable();
            $table->string('foto_profil', 100)->nullable();
            $table->enum('level', ['user', 'admin'])->default('user');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};