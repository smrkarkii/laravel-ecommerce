<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table="products";
    use HasFactory;
    protected $fillable = [
       
        'product_name',
        'product_desc',
        'price',
        'image'

    ];

public function category(){     //if category it recognizes no need to write category_id down
return $this->belongsto(Category::class,'category_id');
}


public function scopeSearch($query,array  $terms){
   $search=$terms['search'];
   $query->when($search,function($query,$search){
   return $query->where('product_name','like','%'.$search.'%')
    ->orwhere('product_desc','like','%'.$search.'%');
}, function($query){
    return $query->where('id', '>',0);
}
);
       
   }


   
}

