<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 50; $i++) {
            DB::table('products')->insert([
                'title' => Str::random(8),
                'sku' => Str::random(14),
                'sell_price' => rand(1, 20) * 20,
                'quantity' => rand(1, 10) * 10 + rand(1, 20),
            ]);
        }
    }
}
