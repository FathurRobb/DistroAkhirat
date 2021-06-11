<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gudang extends Model
{
    
    protected $table = 'gudangs';
    protected $fillable = [
        'kode_brg',
        'nm_brg',
        'warna',
        'stok_brg',
        'harga_jual_brg',
        'harga_beli_brg',
        'detail'];
}
