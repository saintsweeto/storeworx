<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities = [
            [
                'asset_id' => 100,
                'user_id' => 1,
                'icon' => 'fe-archive',
                'description' => '<p class="small text-gray-700 mb-0"><a href="#">EJ Ramos</a> created this item</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'asset_id' => 101,
                'user_id' => 1,
                'icon' => 'fe-archive',
                'description' => '<p class="small text-gray-700 mb-0"><a href="#">EJ Ramos</a> created this item</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'asset_id' => 102,
                'user_id' => 1,
                'icon' => 'fe-archive',
                'description' => '<p class="small text-gray-700 mb-0"><a href="#">EJ Ramos</a> created this item</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('asset_activities')->insert($activities);
    }
}
