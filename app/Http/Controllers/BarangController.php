<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
use App\Models\JenisBarang;

class BarangController extends Controller
{
    public function index()
   {
    $data = array(
        'title' => 'Data Barang',
        'data_jenis' => JenisBarang::all(),
        'data_barang' => BarangModel::join('tbl_jenis_barang','tbl_jenis_barang.id', '=', 'tbl_barang.id_jenis')
                                ->select('tbl_barang.*','tbl_jenis_barang.nama_jenis')
                                ->get(),
    );
        return view('admin.master.barang.list',$data);
   }

   public function store(Request $request){
    BarangModel::create([
            'id_jenis'      => $request->id_jenis,
            'namabarang'    => $request->namabarang,
            'harga'         => $request->harga,
            'stok'          => $request->stok,
            
        ]);
        return redirect('/barang')->with('success','Data Berhasil Disimpan');
   }

   public function update(Request $request, $id){
    BarangModel::where('id',$id)
        ->where('id',$id)
            ->update
            ([
                'id_jenis'      => $request->id_jenis,
                'namabarang'   => $request->namabarang,
                'harga'         => $request->harga,
                'stok'          => $request->stok,
            ]);
        return redirect('/barang')->with('success','Data Berhasil Diubah');
    }

    public function destroy($id){
        $barang = BarangModel::where('id',$id)->delete();
        return redirect('/barang')->with('success','Data Berhasil Dihapus');
    }
}
