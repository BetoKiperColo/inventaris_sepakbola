@extends('layouts.admin')

@section('title', 'Edit Barang | Persewaan Peralatan Outdoor')

@section('content')
<h2>Edit Barang</h2>

<div class="form-card">
    <form method="POST"
        action="/admin/barang/{{ $barang->id }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori_id" required>
                @foreach($kategori as $k)
                <option value="{{ $k->id }}"
                    {{ $barang->kategori_id == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kategori }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text"
                name="nama_barang"
                value="{{ $barang->nama_barang }}"
                required>
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number"
                name="stok"
                value="{{ $barang->stok }}"
                required>
        </div>

        <div class="form-group">
            <label>Gambar Barang</label>
            <input type="file" name="gambar">

            @if($barang->gambar)
            <div class="preview-img">
                <p><b>Gambar Saat Ini:</b></p>
                <img src="{{ asset('storage/'.$barang->gambar) }}" alt="Gambar Barang">
            </div>
            @endif
        </div>

        <div class="form-action">
            <button type="submit" class="btn btn-edit">
                Update
            </button>

            <a href="/admin/barang" class="btn btn-back">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
