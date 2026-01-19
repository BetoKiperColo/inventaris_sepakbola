
    @extends('layouts.admin')

    @section('title', 'Tambah Kategori')

    @section('content')
    <h2>Tambah Kategori</h2>

    <div class="form-card">
        <form method="POST" action="/admin/kategori">
            @csrf

            <label>Nama Kategori</label><br>
            <input type="text" name="nama_kategori" required><br><br>

            <button type="submit" class="btn btn-add">Simpan</button>
            <a href="/admin/kategori" class="btn btn-back">Kembali</a>
        </form>
    </div>
    @endsection