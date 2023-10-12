<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //
        DB::table('shops')->insert([
            [
                'owner_id' => '1',
                'name' => '店名',
                'information' => 'お店の情報が入ります',
                'filename' => 'sample1.png',
                'is_selling' => true,
            ],
            [
                'owner_id' => '2',
                'name' => '店名',
                'information' => 'お店の情報が入ります',
                'filename' => 'sample2.png',
                'is_selling' => true,
            ],
            [
                'owner_id' => '3',
                'name' => '店名',
                'information' => 'お店の情報が入ります',
                'filename' => 'sample3.png',
                'is_selling' => true,
            ],
        ]);
    }
}
