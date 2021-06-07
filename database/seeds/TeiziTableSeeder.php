<?php

use Illuminate\Database\Seeder;

class TeiziTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Teizi::class, 50)->create();
    }
}
