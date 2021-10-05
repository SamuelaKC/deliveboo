<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker; 
use App\Order; 

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $addressOrders = [
            'Piazza Duomo, 25, Milano',
            'Alzaia Naviglio Grande, 25, Milano',
            'Via Duca Uberto, 75, Milano',
            'Piazza A. Diaz, 29, Milano',
            'Piazza Marconi, 11, Milano',
            'Via C. Battisti, 23, Milano',
            'Via Roma, 352, Milano',
            'Via Carlo Patellani, 744, Milano',
            'Viale Coni Zugna, 401, Milano',
            'Via Alessandro Manzoni, 4, Milano',
            'Piazza Giuseppe Missori, 306, Milano',
            'Piazza Cadorna, 1111, Milano',
            'Viale Adamo Mickiewicz, Milano',
            'Via Agnello, 11, Milano',
            'Viale Alessandro Petofi, 85, Milano',
            'Via Alessandro Puskin, 658, Milano',
            'Via Ancona, 666, Milano',
            'Via Anfiteatro, 74, Milano',
            'Via Andegari, 7, Milano',
            'Via Alessandro Volta, 3, Milano'
        ];

        for ($x = 0; $x < 60; $x++) {
            $newOrder = new Order();
            $newOrder->name_surname = $faker->name();
            $randomAddressKey = array_rand($addressOrders, 1);
            $randomAddress = $addressOrders[$randomAddressKey]; 
            $newOrder->address = $randomAddress;
            $newOrder->phone_number = $faker->e164PhoneNumber();
            $newOrder->total_price = $faker->randomFloat(2, 15, 50); 
            $newOrder->save();
        }
    }
}