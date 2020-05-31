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
            'role' => 'tecnico',
            'password' => Hash::make('123456789'),
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@soportapp.tk',
            'role' => 'admin',
            'password' => Hash::make('Soportapp&EC@1%Fc34'),
        ]);
        
    }
}
