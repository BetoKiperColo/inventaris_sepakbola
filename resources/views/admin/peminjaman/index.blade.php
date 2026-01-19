@extends('layouts.admin')

@section('title','Data Peminjaman')

@section('content')
<div class="card">
<div class="admin-header">
    <h2>Data Peminjaman</h2>
    <a href="/admin/peminjaman/create" class="btn btn-add">+ Tambah Peminjaman</a>
</div>

@if(session('success'))
<p style="color:green">{{ session('success') }}</p>
@endif

<table class="table">
    <tr>
        <th>No</th>
        <th>Nama Peminjam</th>
        <th>Barang Dipinjam</th>
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

        <td>{{ $p->status }}</td>

        <td>
            <a href="/admin/peminjaman/{{ $p->id }}" class="btn btn-edit">
                Detail
            </a>
        </td>
    </tr>
    @endforeach
</table>
</div>
@endsection
