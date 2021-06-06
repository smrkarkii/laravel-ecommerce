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
}