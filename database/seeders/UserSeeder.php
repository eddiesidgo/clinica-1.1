<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Juana',
            'email'=>'juana@gmail.com',
            'password'=>bcrypt('admin123')
        ])->assignRole('secre');

        User::create([
            'name'=>'Juan',
            'email'=>'juancito@gmail.com',
            'password'=>bcrypt('admin123')
        ])->assignRole('doctor');

        User::factory(9)->create();
    }

}
