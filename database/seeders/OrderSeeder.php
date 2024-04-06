<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
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
            ['id' => 1, 'user_id' => 1],
            ['id' => 2, 'user_id' => 2],
        ];

        foreach ($items as $item) {
            // Check if the item already exists in the database
            $existingItem = DB::table('orders')->find($item['id']);

            // If the item exists, update it; otherwise, insert it
            if ($existingItem) {
                DB::table('orders')
                    ->where('id', $item['id'])
                    ->update([
                        'user_id' => $item['user_id'],
                        'updated_at' => $currentTimestamp
                    ]);
            } else {
                $item['created_at'] = $currentTimestamp;
                $item['updated_at'] = $currentTimestamp;
                DB::table('orders')->insert($item);
            }
        }
    }
}
