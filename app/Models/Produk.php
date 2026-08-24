<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'kategori_id',
        'nama_produk',
        'harga_produk',
        'deskripsi_produk',
        'merk',
        'foto_produk',
        'avg_rating',
        'ukuran',
        'stok',
        'warna',
    ];

    protected function casts(): array
    {
        return [
            'harga_produk' => 'integer',
            'avg_rating' => 'decimal:2',
            'stok' => 'integer',
        ];
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function keranjangs(): HasMany
    {
        return $this->hasMany(Keranjang::class, 'produk_id');
    }

    public function pesanans(): HasMany
    {
        return $this->hasMany(Pesanan::class, 'produk_id');
    }

    public function detailPesanans(): HasMany
    {
        return $this->hasMany(DetailPesanan::class, 'produk_id');
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class, 'produk_id');
    }
}
