<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'name' => 'usertest',
            'email' => 'usertest@soportapp.tk',
            'password' => Hash::make('123456789'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'jhordy',
            'email' => 'jhordy@soportapp.tk',
            'password' => Hash::make('12345'),
        ]);
    }
}
