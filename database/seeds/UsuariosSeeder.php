<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 100)->create();
    }
}
