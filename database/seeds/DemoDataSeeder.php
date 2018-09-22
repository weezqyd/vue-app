<?php

use Illuminate\Database\Seeder;
use App\Entities\Branch;
use App\Entities\Headquater;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Headquater::class, 5)->create();
    }
}
