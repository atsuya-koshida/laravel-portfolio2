<?php

use Illuminate\Database\Seeder;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            ['name' => '北海道'],
            ['name' => '東北'],
            ['name' => '関東'],
            ['name' => '中部'],
            ['name' => '近畿'],
            ['name' => '中国'],
            ['name' => '四国'],
            ['name' => '九州'],
        ]);
    }
}
