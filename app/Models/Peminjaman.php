<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'nama_penyewa',
        'no_hp',
        'tgl_sewa',
        'tgl_kembali',
        'lama_sewa',
        'jaminan_sewa',
        'status'
    ];

    public function details()
    {
        return $this->hasMany(PeminjamanDetail::class, 'peminjaman_id');
    }
}
