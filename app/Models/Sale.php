<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
     //meodos para añadir informacion para un llenador masivo
     protected $fillable = ['total','items','cash','change','status','user_id'];
     public function sale_details()
    {
        return $this->hasMany(SaleDetails::class);

    }
}
