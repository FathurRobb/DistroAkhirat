<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
    protected $table = 'jenis';
    protected $fillable = ['kode_jns','nm_jns','detail'];
}
