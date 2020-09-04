<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mod_Barang;
use Illuminate\Support\Facades\DB;

class Utama extends Controller
{
    public function index()
    {
      // ambil data barang
      $barang = DB::table('tbl_barang')->get();
      // kirim ke view Utama
      return view('Utama',['barang' => $barang]);
    }

    public function store(Request $request)
  {
    $this->validate($request, ['file' => 'required|max:2408']);
    $file = $request->file('file');
    $nama_file = time()."_".$file->getClientOriginalName();
    $tujuan_upload = 'data_file';

    // cek apakah file sudah berhasil di upload
    if($file->move($tujuan_upload, $nama_file))
      {
        $data = Mod_barang::create([
          'nama_produk' => $request->nama_produk,
          'harga' => $request->harga,
          'gambar' => $nama_file
        ]);
        $res['message'] = "Success!";
        $res['values'] = $data;
        return response($res);
      }
  }

}
