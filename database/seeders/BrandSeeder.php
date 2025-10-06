<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Brand::create(['name'=>'Ikea']);
        Brand::create(['name'=>'Herman Miller']);
        Brand::create(['name'=>'Wayfair']);
        Brand::create(['name'=>'Pottery Barn']);
        Brand::create(['name'=>'La-Z Boy']);

    }
}
