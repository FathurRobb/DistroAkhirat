<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    //demi keamanan kalian harusnya ubah ini ke fillable ya
    protected $guarded = [];

    protected $primaryKey = 'invoices_number';
    public $incrementing = false;
    protected $keyType = 'string';

    public function orderDetail(){
        return $this->hasMany(orderDetail::class,'invoices_number','invoices_number');
    }
}
