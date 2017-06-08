<?php

use Illuminate\Database\Seeder;

class AssetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::beginTransaction();
        factory(App\Asset::class)->create([
            'name' => 'KeyBoard',
            'serial_number' => 'FE342D'
        ]);

        factory(App\Asset::class)->create([
            'name' => 'KeyBoard',
            'serial_number' => '80942D'
        ]);

        factory(App\Asset::class)->create([
            'name' => 'Laptop',
            'serial_number' => 'FF3343'
        ]);

        factory(App\Asset::class)->create([
            'name' => 'Laptop',
            'serial_number' => 'HSA882'
        ]);


        factory(App\Asset::class)->create([
            'name' => 'Mouse',
            'serial_number' => 'QE3453'
        ]);

        \DB::commit();
    }
}
