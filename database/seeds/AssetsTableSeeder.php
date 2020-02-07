<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assets = [
            [
                'name' => 'Precision Metal Tambours',
                'description' => 'Straight - Back to Back - User Adjust',
                'code' => 'DSK-2PD-B2B-UA',
                'sku' => '',
                'dimensions' => '900W x 450D x 1200H',
                'finishes' => 'White',
                'location' => 'Penrose',
                'quantity' => 100,
                'available' => 85,
                'reserved' => 10,
                'damaged' => 5,
            ],
            [
                'name' => 'Task Chair With Arms',
                'description' => 'No description available',
                'code' => 'GSW1-RFZQP',
                'sku' => '',
                'dimensions' => '651W x 565D x 931H',
                'finishes' => 'Black mesh back and seat',
                'location' => 'Penrose',
                'quantity' => 90,
                'available' => 75,
                'reserved' => 5,
                'damaged' => 0,
            ],
            [
                'name' => 'Vidak Trestle Leaner',
                'description' => 'No description available',
                'code' => 'GSW1-CWGGD',
                'sku' => '',
                'dimensions' => '2400W x 1200D x 720H',
                'finishes' => 'Prime White melamine top and base',
                'location' => 'Penrose',
                'quantity' => 20,
                'available' => 0,
                'reserved' => 15,
                'damaged' => 5,
            ],
        ];

        DB::table('assets')->insert($assets);
    }
}
