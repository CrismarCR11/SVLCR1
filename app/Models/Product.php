<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //meodos para añadir informacion para un llenador masivo
    protected $fillable = ['name','barcode','cost','price','stock','alerts','image','category_id'];
    //relacion que tiene con categoria y tambien para usarlo en el component 
    public function categoria()
    {
        return $this->belongsTo(Categorys::class);

    }
    //relacion que tiene con saleDetails y tambien para usarlo en el component 
    public function saleDetails()
    {
        return $this->hasMany(SaleDetails::class);

    }
    public function getImagenAttribute()
    {
        
        if(file_exists('storage/products/'. $this->image))
            return $this->image;
        else
            return 'noimg.png';
        
    }
}
