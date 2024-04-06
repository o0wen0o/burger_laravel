<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTimestamp = now();
        $items = [
            ['id' => 1, 'name' => 'John', 'email' => 'john@qq.com', 'password' => Hash::make('123123'), 'remember_token' => Str::random(10)],
            ['id' => 2, 'name' => 'Jane', 'email' => 'jane@qq.com', 'password' => Hash::make('123123'), 'remember_token' => Str::random(10)],
        ];

        foreach ($items as $item) {
            // Check if the item already exists in the database
            $existingItem = DB::table('users')->find($item['id']);

            // If the item exists, update it; otherwise, insert it
            if ($existingItem) {
                DB::table('users')
                    ->where('id', $item['id'])
                    ->update([
                        'name' => $item['name'],
                        'email' => $item['email'],
                        'email_verified_at' => $currentTimestamp,
                        'password' => $item['password'],
                        'remember_token' => $item['remember_token'],
                        'updated_at' => $currentTimestamp
                    ]);
            } else {
                $item['created_at'] = $currentTimestamp;
                $item['updated_at'] = $currentTimestamp;
                DB::table('users')->insert($item);
            }
        }
    }
}
