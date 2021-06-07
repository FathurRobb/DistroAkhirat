<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gudanginout_details extends Model
{

    protected $table = 'gudanginout_details';
    protected $fillable = ['id_brg','id_brg_io','amount'];
}
