<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('primary_categories')->insert([
            [
                'name' => 'メンズファッション',
                'sort_order' => 1,

            ],
            [
                'name' => 'レディースファッション',
                'sort_order' => 2,

            ], [
                'name' => 'キッズファッション',
                'sort_order' => 3,

            ],
        ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => 'ボトムス',
                'sort_order' => 1,
                'primary_category_id' => 1

            ],
            [
                'name' => 'コート',
                'sort_order' => 2,
                'primary_category_id' => 2

            ],
            [
                'name' => 'ランドセル',
                'sort_order' => 3,
                'primary_category_id' => 3

            ],
            [
                'name' => 'スカート',
                'sort_order' => 4,
                'primary_category_id' => 2

            ],
            [
                'name' => 'オムツ',
                'sort_order' => 5,
                'primary_category_id' => 3

            ],
            [
                'name' => 'コート',
                'sort_order' => 6,
                'primary_category_id' => 1
            ],
        ]);
    }
}
