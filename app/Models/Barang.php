<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = ['Nama_Barang', 'Stok_Barang', 'Harga_Barang', 'Satuan_Barang'];
}