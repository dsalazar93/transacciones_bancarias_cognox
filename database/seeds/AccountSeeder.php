<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            [
                "id" => "1",
                "number" => "123456",
                "enabled" => "1",
                "balance" => "2000",
                "created_at" => "2021-07-29 11:54:10",
                "updated_at" => "2021-07-29 11:54:10",
                "user_id" => "1"
            ],
            [
                "id" => "2",
                "number" => "789012",
                "enabled" => "1",
                "balance" => "6000",
                "created_at" => "2021-07-29 11:54:10",
                "updated_at" => "2021-07-29 11:54:10",
                "user_id" => "1"
            ],
            [
                "id" => "3",
                "number" => "345678",
                "enabled" => "0",
                "balance" => "0",
                "created_at" => "2021-07-29 11:54:10",
                "updated_at" => "2021-07-29 11:54:10",
                "user_id" => "1"
            ],
            [
                "id" => "4",
                "number" => "901234",
                "enabled" => "1",
                "balance" => "10000",
                "created_at" => "2021-07-29 11:54:10",
                "updated_at" => "2021-07-29 11:54:10",
                "user_id" => "2"
            ],
            [
                "id" => "5",
                "number" => "567890",
                "enabled" => "1",
                "balance" => "100",
                "created_at" => "2021-07-29 11:54:10",
                "updated_at" => "2021-07-29 11:54:10",
                "user_id" => "2"
            ],

        ]);
    }
}
