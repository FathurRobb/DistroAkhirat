<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable = ['kode_kat','nm_kat','detail'];
}
