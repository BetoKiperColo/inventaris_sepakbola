    @extends('layouts.admin')

    @section('title', 'Barang | Persewaan Peralatan Outdoor')

    @section('content')
    <div class="card">
    <div class="admin-header">
    <h2>Data Barang</h2>
    <a href="/admin/barang/create" class="btn btn-add">+ Tambah Barang</a>
</div>
    @if(session('error'))
<p style="color:red">{{ session('error') }}</p>
@endif
    @if(session('success'))
    <p style="color:green;margin-top:10px;">{{ session('success') }}</p>
    @endif

    <div style="
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:15px;
">

        {{-- FILTER KATEGORI (KANAN) --}}
        <form method="GET" action="/admin/barang">
            <label><b>Filter Kategori:</b></label>
            <select name="kategori_id" onchange="this.form.submit()">
                <option value="">Semua Kategori</option>
                @foreach($kategori as $k)
                <option value="{{ $k->id }}"
                    {{ request('kategori_id') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kategori }}
                </option>
                @endforeach
            </select>
        </form>
    </div>



    <table class="table">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        @foreach($barang as $b)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                @if($b->gambar)
                <img src="{{ asset('storage/'.$b->gambar) }}" width="60">
                @else
                -
                @endif
            </td>
            <td>{{ $b->nama_barang }}</td>
            <td>{{ $b->kategori->nama_kategori }}</td>
            <td>{{ $b->stok }}</td>
            <td>
                <div class="action">
                    <a href="/admin/barang/{{ $b->id }}/edit" class="btn btn-edit">Edit</a>

                    <form action="/admin/barang/{{ $b->id }}"
      method="POST"
      onsubmit="return confirm('Yakin hapus barang ini?')">

    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-delete">
        Hapus
    </button>
</form>

                </div>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    @endsection