    @extends('layouts.admin')

    @section('title', 'Kategori | Persewaan Peralatan Outdoor')

    @section('content')
    <div class="card">

    <div class="admin-header">
    <h2>Data Kategori</h2>
    <a href="/admin/kategori/create" class="btn btn-add">+ Tambah Kategori</a>
</div>


    @if(session('success'))
    <p style="color:green;margin-top:10px;">
        {{ session('success') }}
    </p>
    @endif

    <table class="table">
        <tr>
            <th width="60">No</th>
            <th>Nama Kategori</th>
            <th width="160">Aksi</th>
        </tr>

        @foreach($kategori as $k)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $k->nama_kategori }}</td>
            <td>
                <div class="action">
                    <a href="/admin/kategori/{{ $k->id }}/edit" class="btn btn-edit">
                        Edit
                    </a>

                    <form action="/admin/kategori/{{ $k->id }}" method="POST" method="POST"
      onsubmit="return confirm('Yakin hapus Kategori ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="button"
    class="btn btn-delete"
    onclick="openConfirmModal(this.closest('form'))">
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
    <script>
        function openConfirmModal(form) {
    if (confirm('Yakin hapus barang ini?')) {
        form.submit();
    }
}
    </script>