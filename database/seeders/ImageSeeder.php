<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('images')->insert([
            [
                'owner_id' => 1,
                'filename' => 'sample1.png',
                'title' => null
            ],
            [
                'owner_id' => 1,
                'filename' => 'sample2.png',
                'title' => null
            ],
            [
                'owner_id' => 1,
                'filename' => 'sample3.png',
                'title' => null
            ],
            [
                'owner_id' => 1,
                'filename' => 'sample4.png',
                'title' => null
            ],
            [
                'owner_id' => 1,
                'filename' => 'sample5.png',
                'title' => null
            ],
            [
                'owner_id' => 1,
                'filename' => 'sample6.png',
                'title' => null
            ],


        ]);
    }
}
