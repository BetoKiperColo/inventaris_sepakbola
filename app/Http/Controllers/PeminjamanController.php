<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    public function index()
    {
        $persewaan = Peminjaman::with('details.barang')
            ->where('status','disewa')
            ->get();

        return view('admin.peminjaman.index', compact('persewaan'));
    }

    public function create()
    {
        $barang = Barang::all();
        return view('admin.peminjaman.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penyewa' => 'required',
            'no_hp' => 'required',
            'tgl_sewa' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_sewa',
            'jaminan_sewa' => 'required',
            'barang_id' => 'required|array',
            'qty' => 'required|array'
        ]);

        // hitung lama sewa
        $lama = Carbon::parse($request->tgl_sewa)
            ->diffInDays(Carbon::parse($request->tgl_kembali));

        if ($lama < 1) $lama = 1;

        DB::beginTransaction();

        try {

            // SIMPAN HEADER
            $peminjaman = Peminjaman::create([
                'nama_penyewa' => $request->nama_penyewa,
                'no_hp' => $request->no_hp,
                'tgl_sewa' => $request->tgl_sewa,
                'tgl_kembali' => $request->tgl_kembali,
                'lama_sewa' => $lama,
                'jaminan_sewa' => $request->jaminan_sewa,
                'status' => 'disewa'
            ]);

            foreach($request->barang_id as $i => $barang_id){

                if(!$barang_id) continue;

                $barang = Barang::findOrFail($barang_id);
                $qty = (int)$request->qty[$i];

                // CEK STOK
                if($barang->stok < $qty){
                    DB::rollBack();
                    return back()->with('error',
                        'Stok '.$barang->nama_barang.' tidak mencukupi');
                }

                // KURANGI STOK
                $barang->stok -= $qty;
                $barang->save();

                // SIMPAN DETAIL
                PeminjamanDetail::create([
                    'peminjaman_id' => $peminjaman->id,
                    'barang_id' => $barang_id,
                    'qty' => $qty
                ]);
            }

            DB::commit();

            return redirect('/admin/peminjaman')
                ->with('success','Peminjaman berhasil disimpan');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error',
                'Terjadi kesalahan: '.$e->getMessage());
        }
    }

    public function show($id)
    {
        $persewaan = Peminjaman::with('details.barang')->findOrFail($id);

        return view('admin.peminjaman.detail', compact('persewaan'));
    }

    public function kembalikan($id)
    {
        $persewaan = Peminjaman::with('details.barang')->findOrFail($id);

        if($persewaan->status === 'kembali'){
            return back()->with('error','Barang sudah dikembalikan');
        }

        foreach($persewaan->details as $d){
            if($d->barang){
                $d->barang->stok += $d->qty;
                $d->barang->save();
            }
        }

        $persewaan->update([
            'status' => 'kembali'
        ]);

        return redirect('/admin/peminjaman')
            ->with('success','Barang berhasil dikembalikan');
    }

    public function riwayat()
    {
        $persewaan = Peminjaman::with('details.barang')
            ->where('status','kembali')
            ->get();

        return view('admin.peminjaman.riwayat', compact('persewaan'));
    }

    public function detailRiwayat($id)
    {
        $persewaan = Peminjaman::with('details.barang')->findOrFail($id);

        return view('admin.peminjaman.detail_riwayat', compact('persewaan'));
    }

    public function destroy($id)
    {
        Peminjaman::destroy($id);

        return back()->with('success','Data dihapus');
    }
}
