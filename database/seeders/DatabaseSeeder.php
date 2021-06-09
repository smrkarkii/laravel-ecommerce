<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { $categ= \App\Models\Category::create([
        'name'=>'Accessories',
        'description'=>'This includes different items.'
    ]

    );
    

    Product::factory(6)->create([
      'category_id'=>4
      ]);
}
}


