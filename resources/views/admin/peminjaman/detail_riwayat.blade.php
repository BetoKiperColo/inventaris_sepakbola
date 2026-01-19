@extends('layouts.admin')

@section('title','Detail Riwayat Transaksi')

@section('content')
<h2>Detail Riwayat Transaksi</h2>

<div class="card">
    <p><b>Nama Penyewa:</b> {{ $persewaan->nama_penyewa }}</p>
    <p><b>No HP:</b> {{ $persewaan->no_hp }}</p>
    <p><b>Tanggal Sewa:</b> {{ $persewaan->tgl_sewa }}</p>
    <p><b>Tanggal Kembali:</b> {{ $persewaan->tgl_kembali }}</p>
    <p><b>Lama Sewa:</b> {{ $persewaan->lama_sewa }} hari</p>
    <p><b>Jaminan:</b> {{ $persewaan->jaminan_sewa }}</p>
    <p><b>Status:</b>
        <span style="color:green;font-weight:bold;">
            {{ $persewaan->status }}
        </span>
    </p>
</div>

<br>

<h3>Barang Dipinjam</h3>

<table class="table">
    <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
    </tr>

    @foreach($persewaan->details as $d)
    <tr>
        <td>{{ $loop->iteration }}</td>

        <td>
            @if($d->barang && $d->barang->gambar)
            <img src="{{ asset('storage/'.$d->barang->gambar) }}"
                width="60"
                style="border-radius:5px;">
            @else
            -
            @endif
        </td>

        <td>{{ $d->barang->nama_barang ?? '-' }}</td>
        <td>{{ $d->qty }}</td>
    </tr>
    @endforeach
</table>

<br>

<a href="/admin/peminjaman/riwayat" class="btn btn-back">
    Kembali
</a>
@endsection
