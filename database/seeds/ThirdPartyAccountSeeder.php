<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThirdPartyAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('third_party_accounts')->insert([
            [
                "id" => "1",
                "account_id" => "4",
                "user_id" => "1",
                "created_at" => "2021-07-29 11:54:10",
                "updated_at" => "2021-07-29 11:54:10",
            ],
            [
                "id" => "2",
                "account_id" => "5",
                "user_id" => "1",
                "created_at" => "2021-07-29 11:54:10",
                "updated_at" => "2021-07-29 11:54:10",
            ],
            [
                "id" => "3",
                "account_id" => "2",
                "user_id" => "2",
                "created_at" => "2021-07-29 11:54:10",
                "updated_at" => "2021-07-29 11:54:10",
            ],
            [
                "id" => "4",
                "account_id" => "1",
                "user_id" => "2",
                "created_at" => "2021-07-29 11:54:10",
                "updated_at" => "2021-07-29 11:54:10",
            ]
        ]);
    }
}
