<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // ⬅️ WAJIB
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'kategori_id',
        'nama_barang',
        'stok',
        'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function peminjamanDetails()
    {
        return $this->hasMany(PeminjamanDetail::class, 'barang_id');
    }
}
