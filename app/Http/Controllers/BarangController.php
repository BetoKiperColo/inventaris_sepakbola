<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\PeminjamanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::all();

        $query = Barang::with('kategori');

        // FILTER KATEGORI
        if ($request->kategori_id) {
            $query->where('kategori_id', $request->kategori_id);
        }

        $barang = $query->get();

        return view('admin.barang.index', compact('barang', 'kategori'));
    }


    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.barang.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required|numeric',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('barang', 'public');
        }

        Barang::create($data);
        return redirect('/admin/barang')->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.barang.edit', compact('barang', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'kategori_id' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required|numeric',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($barang->gambar) {
                Storage::disk('public')->delete($barang->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('barang', 'public');
        }

        $barang->update($data);
        return redirect('/admin/barang')->with('success', 'Barang berhasil diupdate');
    }

    public function destroy($id)
{
    $barang = Barang::findOrFail($id);

    $barang->delete(); // SOFT DELETE

    return redirect()
        ->back()
        ->with('success', 'Barang berhasil dihapus');
}
}
