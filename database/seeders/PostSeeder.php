<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('posts')->insert([
        //     'title' => '東京タワー',
        //     'description' => 'これはタイトル1の説明文です',
        //     'lat' => '35.65881584518403',
        //     'lng' => '139.7454436267236',
        //     'user_id' => 1,
        // ]);
        // DB::table('posts')->insert([
        //     'title' => 'スカイツリー',
        //     'description' => 'これはタイトル2の説明文です',
        //     'lat' => '35.710083953151084',
        //     'lng' => '139.81070391582526',
        //     'user_id' => 1,
        // ]);
        // DB::table('posts')->insert([
        //     'title' => '上野公園',
        //     'description' => 'これはタイトル3の説明文です',
        //     'lat' => '35.71569347326716',
        //     'lng' => '139.77083424012167',
        //     'user_id' => 2,
        // ]);
        // DB::table('posts')->insert([
        //     'title' => '平和記念公園',
        //     'description' => 'これはタイトル4の説明文です',
        //     'lat' => '26.095112065206223',
        //     'lng' => '127.72347587232395',
        //     'user_id' => 2,
        // ]);
    }
}
