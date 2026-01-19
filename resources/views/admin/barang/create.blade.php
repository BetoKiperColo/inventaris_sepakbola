@extends('layouts.admin')

@section('title', 'Tambah Barang')

@section('content')
<h2>Tambah Barang</h2>

<div class="form-card">
    <form method="POST" action="/admin/barang" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori_id" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" required>
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" required>
        </div>

        <div class="form-group">
            <label>Gambar Barang</label>
            <input type="file" name="gambar">
        </div>

        <div class="form-action">
            <button class="btn btn-add">Simpan</button>
            <a href="/admin/barang" class="btn btn-back">Kembali</a>
        </div>
    </form>
</div>
@endsection
