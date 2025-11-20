<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Post;

class Thekonten extends Seeder
{
    public function run()
    {
        Post::create([
            'title' => 'ubg',
            'content' => 'komputer formalitas banget.'
        ]);

        Post::create([
            'title' => 'unram',
            'content' => 'teknik geda gedi.'
        ]);

        Post::create([
            'title' => 'uin',
            'content' => 'promax.'
        ]);
    }
}