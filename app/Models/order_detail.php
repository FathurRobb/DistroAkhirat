<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    //demi keamanan kalian harusnya ubah ini ke fillable ya
    protected $guarded = [];
    protected $table = 'order_detail';
}
