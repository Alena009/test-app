<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reseller;

class ResellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reseller::factory()->count(5)->hasDisplays(3)->create();
    }
}
