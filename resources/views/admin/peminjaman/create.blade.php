@extends('layouts.admin')

@section('title','Tambah Peminjaman')

@section('content')
<h2>Tambah Peminjaman</h2>

<div class="form-card">

    @if(session('error'))
    <div style="color:red; margin-bottom:15px;">
        {{ session('error') }}
    </div>
    @endif

    <form method="POST" action="/admin/peminjaman">
        @csrf

        <div class="form-group">
            <label>Nama Peminjam</label>
            <input type="text" name="nama_penyewa" required>
        </div>

        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="no_hp" required>
        </div>

        <div class="form-group">
            <label>Tanggal Sewa</label>
            <input type="date" name="tgl_sewa" required>
        </div>

        <div class="form-group">
            <label>Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" required>
        </div>

        <div class="form-group">
            <label>Jaminan</label>
            <select name="jaminan_sewa" required>
                <option value="">-- Pilih Jaminan --</option>
                <option value="KTP">KTP</option>
                <option value="SIM">SIM</option>
                <option value="STNK">STNK</option>
                <option value="KARTU PELAJAR">KARTU PELAJAR</option>
            </select>
        </div>

        <hr>

        <h3>Barang Dipinjam</h3>

        <div class="table-card">

            <table class="table table-sewa" id="barangTable">
                <tr>
                    <th style="width:60%">Barang</th>
                    <th style="width:20%">Qty</th>
                    <th style="width:20%">Aksi</th>
                </tr>

                <tr>
                    <td>
                        <select name="barang_id[]" required style="width:100%;">
                            <option value="">-- Pilih Barang --</option>
                            @foreach($barang as $b)
                            <option value="{{ $b->id }}">
                                {{ $b->nama_barang }}
                            </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="qty[]" value="1" min="1" required style="width:100%;">
                    </td>
                    <td>
                        <button type="button"
                            class="btn btn-delete"
                            onclick="hapusBaris(this)">
                            Hapus
                        </button>
                    </td>
                </tr>
            </table>

        </div>

        <br>

        <button type="button"
            class="btn btn-add"
            onclick="tambahBaris()">
            + Tambah Baris Barang
        </button>

        <br><br>

        <div class="form-action">
            <button type="submit" class="btn btn-add">Simpan</button>
            <a href="/admin/peminjaman" class="btn btn-back">Kembali</a>
        </div>

    </form>
</div>

<script>
    function tambahBaris() {
        let table = document.getElementById('barangTable');
        let row = table.insertRow(-1);

        row.innerHTML = `
            <td>
                <select name="barang_id[]" required style="width:100%;">
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barang as $b)
                        <option value="{{ $b->id }}">
                            {{ $b->nama_barang }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" name="qty[]" value="1" min="1" required style="width:100%;">
            </td>
            <td>
                <button type="button"
                    class="btn btn-delete"
                    onclick="hapusBaris(this)">
                    Hapus
                </button>
            </td>
        `;
    }

    function hapusBaris(btn) {
        let table = document.getElementById('barangTable');
        if (table.rows.length > 2) {
            btn.closest('tr').remove();
        } else {
            alert('Minimal 1 barang harus ada');
        }
    }
</script>

@endsection
