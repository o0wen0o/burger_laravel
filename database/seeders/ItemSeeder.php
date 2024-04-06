<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
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
            ['id' => 1, 'name' => 'Mineral Water', 'unit_price' => 3],
            ['id' => 2, 'name' => '100 Plus', 'unit_price' => 5],
            ['id' => 3, 'name' => 'Iced Milo', 'unit_price' => 7],
            ['id' => 4, 'name' => 'Hot Milo', 'unit_price' => 6],
            ['id' => 5, 'name' => 'Nasi Lemak', 'unit_price' => 8],
            ['id' => 6, 'name' => 'Porridge', 'unit_price' => 7],
            ['id' => 7, 'name' => 'Scrambled Egg Sandwich', 'unit_price' => 7],
            ['id' => 8, 'name' => 'Crispy Chicken Muffin', 'unit_price' => 8],
            ['id' => 9, 'name' => 'Tuna Egg', 'unit_price' => 7],
            ['id' => 10, 'name' => 'Strip Egg', 'unit_price' => 7],
            ['id' => 11, 'name' => 'BBQ Chicken Wrap', 'unit_price' => 8],
            ['id' => 12, 'name' => 'Chicken Teriyaki Wrap', 'unit_price' => 9],
            ['id' => 13, 'name' => 'Italian BMT Wrap', 'unit_price' => 10],
            ['id' => 14, 'name' => 'Hot Tea', 'unit_price' => 4],
            ['id' => 15, 'name' => 'Teh Tarik', 'unit_price' => 4],
            ['id' => 16, 'name' => 'Riser Box', 'unit_price' => 12],
            ['id' => 17, 'name' => 'Happy Meal Porridge', 'unit_price' => 11],
            ['id' => 18, 'name' => 'Sprite', 'unit_price' => 5],
            ['id' => 19, 'name' => 'Ice Lemon Tea', 'unit_price' => 7],
            ['id' => 20, 'name' => '100 Plus', 'unit_price' => 5]
        ];

        foreach ($items as $item) {
            // Check if the item already exists in the database
            $existingItem = DB::table('items')->find($item['id']);

            // If the item exists, update it; otherwise, insert it
            if ($existingItem) {
                DB::table('items')
                    ->where('id', $item['id'])
                    ->update([
                        'name' => $item['name'],
                        'unit_price' => $item['unit_price'],
                        'updated_at' => $currentTimestamp
                    ]);
            } else {
                $item['created_at'] = $currentTimestamp;
                $item['updated_at'] = $currentTimestamp;
                DB::table('items')->insert($item);
            }
        }
    }
}
