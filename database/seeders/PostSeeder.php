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
        DB::table('posts')->insert([
            'title' => 'タイトル1',
            'description' => 'これはタイトル1の説明文です',
            'user_id' => 1,
        ]);
        DB::table('posts')->insert([
            'title' => 'タイトル2',
            'description' => 'これはタイトル2の説明文です',
            'user_id' => 1,
        ]);
        DB::table('posts')->insert([
            'title' => 'タイトル3',
            'description' => 'これはタイトル3の説明文です',
            'user_id' => 2,
        ]);
        DB::table('posts')->insert([
            'title' => 'タイトル4',
            'description' => 'これはタイトル4の説明文です',
            'user_id' => 2,
        ]);
    }
}
