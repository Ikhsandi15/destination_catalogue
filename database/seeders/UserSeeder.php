<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Budi',
            'email' => 'budi@mail.com',
            'password' => 'Sccp123#'
        ]);
        User::create([
            'name' => 'Joko',
            'email' => 'joko@mail.com',
            'password' => '123#45Pp'
        ]);
        User::create([
            'name' => 'Suji',
            'email' => 'suji@mail.com',
            'password' => '123456g#E'
        ]);
    }
}
