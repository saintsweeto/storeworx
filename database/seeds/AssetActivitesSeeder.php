<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetActivitesSeeder extends Seeder
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
                'icon' => 'fe-archive',
                'description' => '<p class="small text-gray-700 mb-0"><a href="#">Sinead Bowie</a> created this item</p>'
            ],
            [
                'asset_id' => 100,
                'icon' => 'fe-truck',
                'description' => '<p class="small text-gray-700 mb-0"><a href="#">Sinead Bowie</a> added <b class="text-dark">18</b> clean quantity with <b class="text-dark">7</b> damaged quantity</p>'
            ],
            [
                'asset_id' => 100,
                'icon' => 'fe-edit',
                'description' => '<p class="small text-gray-700 mb-0"><a href="#">Sinead Bowie</a> created a new job <a href="#">100259</a></p>'
            ],
            [
                'asset_id' => 101,
                'icon' => 'fe-archive',
                'description' => '<p class="small text-gray-700 mb-0"><a href="#">Sinead Bowie</a> created this item</p>'
            ],
            [
                'asset_id' => 102,
                'icon' => 'fe-archive',
                'description' => '<p class="small text-gray-700 mb-0"><a href="#">Sinead Bowie</a> created this item</p>'
            ],
        ];

        DB::table('asset_activities')->insert($activities);
    }
}
