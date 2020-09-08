<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin@gmail.com'),
            'level'=>'0',
        ]);
        User::create([
            'name'=>'guru',
            'email'=>'guru@gmail.com',
            'password'=>bcrypt('guru@gmail.com'),
            'level'=>'1',
        ]);
        User::create([
            'name'=>'murid',
            'email'=>'murid@gmail.com',
            'password'=>bcrypt('murid@gmail.com'),
            'level'=>'2',
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
