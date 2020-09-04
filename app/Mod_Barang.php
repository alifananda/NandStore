<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mod_Barang extends Model
{
    public $timestamps = false;
    protected $table = "tbl_barang";

    protected $fillable = ['nama_produk','harga','gambar'];
}
