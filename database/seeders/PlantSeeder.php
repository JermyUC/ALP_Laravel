<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantSeeder extends Seeder
{
    public function run(): void
    {
       
        

        DB::table('plants')->insert([
            [
                'name' => 'Venus Flytrap',
                'family' => 'Droseraceae',
                'image_url' => 'images/venus.jpg',
                'price' => 120000,
                'stock' => 25,
            ],
            [
                'name' => 'Pitcher Plant',
                'family' => 'Nepenthaceae',
                'image_url' => 'images/pitcher.jpg',
                'price' => 180000,
                'stock' => 18,

            ],
            [
                'name' => 'Sundew',
                'family' => 'Droseraceae',
                'image_url' => 'images/sundew.jpg',
                'price' => 95000,
                'stock' => 32,

            ],
            [
                'name' => 'Cobra Lily',
                'family' => 'Sarraceniaceae',
                'image_url' => 'images/cobra.jpg',
                'price' => 210000,
                'stock' => 12,
             ],
            [
                'name' => 'Butterwort',
                'family' => 'Lentibulariaceae',
                'image_url' => 'images/butterwort.jpg',
                'price' => 85000,
                'stock' => 40,

            ],
        ]);
    }
}
