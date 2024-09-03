<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'user_id' => 2,
            'destination_id' => 1,
            'star' => '4',
            'review_description' => 'mantap'
        ]);
        Review::create([
            'user_id' => 3,
            'destination_id' => 1,
            'star' => '4',
            'review_description' => 'mantap'
        ]);
        Review::create([
            'user_id' => 4,
            'destination_id' => 1,
            'star' => '4',
            'review_description' => 'mantap'
        ]);
        // beda destination
        Review::create([
            'user_id' => 1,
            'destination_id' => 2,
            'star' => '4',
            'review_description' => 'mantap'
        ]);
        Review::create([
            'user_id' => 4,
            'destination_id' => 2,
            'star' => '4',
            'review_description' => 'mantap'
        ]);
    }
}
