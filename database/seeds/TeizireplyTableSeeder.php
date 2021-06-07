<?php

use Illuminate\Database\Seeder;

class TeizireplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Teizireply::class, 25)->create();
    }
}
