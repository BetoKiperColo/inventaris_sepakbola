<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeminjamanDetail extends Model
{
    protected $table = 'peminjaman_details';

    protected $fillable = [
        'peminjaman_id',
        'barang_id',
        'qty'
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }

   public function barang()
{
    return $this->belongsTo(Barang::class, 'barang_id')->withTrashed();
}
}
