<?php

use Illuminate\Database\Seeder;
use App\Pick;

class PicksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $picks = factory(Pick::class, 20)->create();
    }
}
