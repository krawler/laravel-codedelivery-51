<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(CupomTableSeeder::class);
<<<<<<< HEAD
        $this->call(OAuthClientSeeder::class);
=======
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
        \Illuminate\Database\Eloquent\Model::reguard();
    }
}
