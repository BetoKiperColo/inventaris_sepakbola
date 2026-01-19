@extends('layouts.admin')

@section('title','Riwayat Transaksi')

@section('content')
<div class="card">
<div class="admin-header">
    <h2>Data Barang</h2>
</div>

<table class="table">
    <tr>
        <th>No</th>
        <th>Nama Penyewa</th>
        <th>Barang</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($persewaan as $p)
    <tr>
        <td>{{ $loop->iteration }}</td>

        <td>{{ $p->nama_penyewa }}</td>

        <td>
            @foreach($p->details as $d)
            {{ $d->barang->nama_barang ?? '-' }}
            ({{ $d->qty }})<br>
            @endforeach
        </td>

        <td style="color:green;font-weight:bold;">
            {{ $p->status }}
        </td>

        <td>
            <a href="/admin/peminjaman/riwayat/{{ $p->id }}" class="btn btn-edit">
                Detail
            </a>
        </td>
    </tr>
    @endforeach
</table>
</div>
@endsection
