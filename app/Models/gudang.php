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
        'jenis',
        'ukuran',
        'stok_brg',
        'hrg_beli',
        'hrg_jual',
        'detail'];
}
