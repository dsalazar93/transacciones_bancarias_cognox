<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'id' => '1',
                'firstname' => 'Pedro',
                'lastname' => 'Pérez',
                'email' => 'pedro@mail.com',
                'email_verified_at' => null,
                'username' => 'pperez',
                'password' => Hash::make('1234'),
                'remember_token' => null,
                'created_at' => '2021-07-29 11:54:10',
                'updated_at' => '2021-07-29 11:54:10'
            ],
            [
                'id' => '2',
                'firstname' => 'Maria',
                'lastname' => 'Salas',
                'email' => 'maria@mail.com',
                'email_verified_at' => null,
                'username' => 'msalas',
                'password' => Hash::make('5678'),
                'remember_token' => null,
                'created_at' => '2021-07-29 11:54:10',
                'updated_at' => '2021-07-29 11:54:10'
            ],
            [
                'id' => '3',
                'firstname' => 'Juan',
                'lastname' => 'Marín',
                'email' => 'juan@mail.com',
                'email_verified_at' => null,
                'username' => 'jmarin',
                'password' => Hash::make('9012'),
                'remember_token' => null,
                'created_at' => '2021-07-29 11:54:10',
                'updated_at' => '2021-07-29 11:54:10'
            ],
        ]);
    }
}
