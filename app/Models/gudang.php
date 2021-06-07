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
        'kategori',
        'stok_brg',
        'satuan_brg',
        'harga_brg',
        'detail'];
}
