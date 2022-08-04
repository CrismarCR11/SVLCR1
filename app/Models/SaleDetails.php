<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetails extends Model
{
    use HasFactory;
     //meodos para añadir informacion para un llenador masivo
     protected $fillable = ['price','quantity','product_id','sale_id'];

     public function products()
     {
         return $this->belongsTo(Product::class);
 
     }
     public function sales()
     {
         return $this->belongsTo(Sale::class);
 
     }
}

