<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gudanginout extends Model
{

    protected $table = 'gudanginout';
    protected $fillable = ['no_faktur','no_order','nik_karyawan','id_supplier'];
}
