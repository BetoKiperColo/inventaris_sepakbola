<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
</head>

<body>
    @extends('layouts.admin')

    @section('title', 'Edit Kategori')

    @extends('layouts.admin')

    @section('title', 'Edit Kategori | Persewaan Peralatan Outdoor')

    @section('content')
    <h2>Edit Kategori</h2>

    <div class="form-card">
        <form method="POST" action="/admin/kategori/{{ $kategori->id }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text"
                    name="nama_kategori"
                    value="{{ $kategori->nama_kategori }}"
                    required>
            </div>

            <div class="form-action">
                <button type="submit" class="btn btn-edit">
                    Update
                </button>

                <a href="/admin/kategori" class="btn btn-back">
                    Kembali
                </a>
            </div>
        </form>
    </div>
    @endsection


</body>

</html>