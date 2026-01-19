@extends('layouts.admin')

@section('title','Detail Peminjaman')

@section('content')
<h2>Detail Peminjaman</h2>

<div class="card">
    <p><b>Nama Penyewa:</b> {{ $persewaan->nama_penyewa }}</p>
    <p><b>No HP:</b> {{ $persewaan->no_hp }}</p>
    <p><b>Tanggal Sewa:</b> {{ $persewaan->tgl_sewa }}</p>
    <p><b>Tanggal Kembali:</b> {{ $persewaan->tgl_kembali }}</p>
    <p><b>Lama Sewa:</b> {{ $persewaan->lama_sewa }} hari</p>
    <p><b>Jaminan:</b> {{ $persewaan->jaminan_sewa }}</p>
    <p><b>Status:</b> {{ $persewaan->status }}</p>
</div>

<br>

<h3>Daftar Barang Dipinjam</h3>

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

@if($persewaan->status === 'disewa')
<div style="text-align:right;">
    <form action="/admin/peminjaman/{{ $persewaan->id }}/kembali"
        method="POST" style="display:inline;">
        @csrf
        <button class="btn btn-add">
            Ubah Status Pengembalian
        </button>
    </form>
</div>
@else
<div style="text-align:right; color:green; font-weight:bold;">
    Barang sudah dikembalikan
</div>
@endif

<br>

<a href="/admin/peminjaman" class="btn btn-back">
    Kembali
</a>

@endsection
