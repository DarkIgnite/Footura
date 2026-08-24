<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('cek-koneksi', function() {
    try {
        DB::connection()->getPdo();
        return 'koneksi berhasil ke database' . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return 'koneksi gagal' . $e->getMessage();
    }
});
