<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'test',
                'email' => 'test@email.com',
                'password' => Hash::make('11111111'),
            
            ],
            [
                'name' => 'test2',
                'email' => 'test2@email.com',
                'password' => Hash::make('11111111'),
            
            ],
            [
                'name' => 'test3',
                'email' => 'test3@email.com',
                'password' => Hash::make('11111111'),
            
            ],
            [
                'name' => 'test4',
                'email' => 'test4@email.com',
                'password' => Hash::make('11111111'),
            
            ],
            [
                'name' => 'test5',
                'email' => 'test5@email.com',
                'password' => Hash::make('11111111'),
            
            ],
        ]);
    }
}
