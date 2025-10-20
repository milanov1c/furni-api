<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Furniture;
use Carbon\Carbon;

class FurnitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Furniture::create([
            'name' => 'Eames Lounge Chair',
            'description' => 'An iconic lounge chair combining walnut wood and premium black leather for timeless comfort.',
            'price' => 4999.99,
            'brand_id' => 1,
            'category_id' => 2,
            'created_at' => Carbon::parse('2023-05-15'),
        ]);

        Furniture::create([
            'name' => 'IKEA Billy Bookcase',
            'description' => 'A classic white bookcase that fits perfectly into any living space or office.',
            'price' => 79.99,
            'brand_id' => 2,
            'category_id' => 3,
            'created_at' => Carbon::parse('2023-02-10'),
        ]);

        Furniture::create([
            'name' => 'West Elm Mid-Century Bed',
            'description' => 'A mid-century inspired bed in Acorn finish, offering a sleek and modern bedroom look.',
            'price' => 1299.99,
            'brand_id' => 1,
            'category_id' => 4,
            'created_at' => Carbon::parse('2023-08-20'),
        ]);

        Furniture::create([
            'name' => 'Ashley Furniture Dining Table',
            'description' => 'A solid wood dining table in espresso finish that adds warmth and elegance to any dining room.',
            'price' => 599.99,
            'brand_id' => 1,
            'category_id' => 5,
            'created_at' => Carbon::parse('2023-04-03'),
        ]);

        Furniture::create([
            'name' => 'La-Z-Boy Bookcase',
            'description' => 'A tall white bookcase with clean lines and plenty of shelf space for books and décor.',
            'price' => 899.99,
            'brand_id' => 5,
            'category_id' => 3,
            'created_at' => Carbon::parse('2023-09-25'),
        ]);

        Furniture::create([
            'name' => 'CB2 Lubi Sleeper Sofa',
            'description' => 'A beige sleeper sofa perfect for small spaces, offering both comfort and versatility.',
            'price' => 1099.99,
            'brand_id' => 2,
            'category_id' => 1,
            'created_at' => Carbon::parse('2023-06-12'),
        ]);

        Furniture::create([
            'name' => 'Pottery Barn Chesterfield Sofa',
            'description' => 'A luxurious grey Chesterfield sofa featuring deep button tufting and classic design.',
            'price' => 2399.99,
            'brand_id' => 4,
            'category_id' => 1,
            'created_at' => Carbon::parse('2023-07-19'),
        ]);

        Furniture::create([
            'name' => 'Wayfair Table',
            'description' => 'A sleek silver table that complements any modern interior setup.',
            'price' => 199.99,
            'brand_id' => 3,
            'category_id' => 5,
            'created_at' => Carbon::parse('2023-10-08'),
        ]);

        Furniture::create([
            'name' => 'Crate & Barrel Chair',
            'description' => 'A minimalist black chair made of high-quality materials, perfect for dining or office use.',
            'price' => 149.99,
            'brand_id' => 2,
            'category_id' => 2,
            'created_at' => Carbon::parse('2023-11-30'),
        ]);

        Furniture::create([
            'name' => 'Wayfair Bookcase',
            'description' => 'A modern grey bookcase designed to organize your books and display your favorite items.',
            'price' => 2399.99,
            'brand_id' => 3,
            'category_id' => 3,
            'created_at' => Carbon::parse('2023-07-19'),
        ]);

        Furniture::create([
            'name' => 'Pottery Barn Sofa',
            'description' => 'A premium grey sofa crafted for both comfort and sophisticated style.',
            'price' => 2399.99,
            'brand_id' => 4,
            'category_id' => 1,
            'created_at' => Carbon::parse('2023-07-19'),
        ]);

        Furniture::create([
            'name' => 'Pottery Barn Bed',
            'description' => 'A stylish grey bed with a sturdy frame and elegant details for a cozy bedroom.',
            'price' => 2399.99,
            'brand_id' => 4,
            'category_id' => 4,
            'created_at' => Carbon::parse('2023-07-19'),
        ]);

        Furniture::create([
            'name' => 'Pier 1 Imports Sleeping Bed',
            'description' => 'A comfortable and modern sleeping bed with a smooth grey finish.',
            'price' => 2399.99,
            'brand_id' => 1,
            'category_id' => 4,
            'created_at' => Carbon::parse('2023-07-19'),
        ]);

        Furniture::create([
            'name' => 'Pier 1 Imports Papasan Chair',
            'description' => 'A natural papasan chair featuring a round rattan base and cozy cushion for ultimate relaxation.',
            'price' => 199.99,
            'brand_id' => 1,
            'category_id' => 2,
            'created_at' => Carbon::parse('2023-03-14'),
        ]);

        Furniture::create([
            'name' => 'Wayfair Evening Chair',
            'description' => 'A comfortable grey accent chair that brings a modern touch to your living space.',
            'price' => 2399.99,
            'brand_id' => 3,
            'category_id' => 2,
            'created_at' => Carbon::parse('2023-07-19'),
        ]);

        Furniture::create([
            'name' => 'Wayfair Evening Sofa',
            'description' => 'A spacious grey sofa with a contemporary look and plush seating for everyday comfort.',
            'price' => 2399.99,
            'brand_id' => 3,
            'category_id' => 1,
            'created_at' => Carbon::parse('2023-07-19'),
        ]);
    }
}
