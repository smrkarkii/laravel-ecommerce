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
        'name'=>'Charger',
        'description'=>'This includes Charger.'
    ]

    );
    

    Product::factory(6)->create([
      'category_id'=>3
      ]);
}
}


