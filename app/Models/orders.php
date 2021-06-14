<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    //demi keamanan kalian harusnya ubah ini ke fillable ya
    protected $guarded = [];

    protected $primaryKey = 'invoices';
    public $incrementing = false;
    protected $keyType = 'string';

    public function order_details(){
        return $this->hasMany(order_details::class,'invoices','invoices');
    }
}
