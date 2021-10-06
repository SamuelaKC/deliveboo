<?php

use App\Plate;
use Illuminate\Database\Seeder;

class PivotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x = 0; $x < 446; $x++) {
            
            $plate = Plate::find($x);
            $plate->order()->sync();
            $plate->ingredient()->sync();
        }
    }
}
