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
        $plateOrder = [

            [
                11,
                15,
                1,
            ],
            [
                19,
                8,
                10,
            ],
            [
                33,
                34,
                30,
                39,
            ],
            [
                42,
            ],
            [
                50,
                44,
            ],
            [
                65,
                66,
                74,
                82,
            ],
            [
                94,
                95,
            ],
            [
                248,
                253,
                256,
                264,
            ],
            [
                102,
                103,
                110,
            ],
            [
                126,
                129,
                132,
            ],
            [
                274,
                277,
                281,
                291,
            ],
            [
                166,
                169,
            ],
            [
                300,
                307,
                310,
            ],
            [
                172,
                174,
                181,
                182,
            ],
            [
                319,
                320,
                327,
            ],
            [
                184,
                186,
                193,
            ],
            [
                194,
                198,
                201,
            ],
            [
                369,
                370,
                371,
            ],
            [
                211,
            ],
            //-- 11,8,16,2,6,12,20,1,4,19,5,7,10,13   VIN
            //-- 9,18,15,3,                           TONY
            [
                321,
                323,
                318,
                326,
            ],
            [
                329,
                335,
                336,
                354,
            ],
            [
                358,
                359,
                367,
            ],
                        [
                172,
                174,
                181,
                182,
            ],
            [
                172,
                174,
                181,
                182,
            ],
            [
                172,
                174,
                181,
                182,
            ],
            [
                172,
                174,
                181,
                182,
            ],


        ];

        for ($x = 0; $x < 26; $x++) {
            $newOrder = new Order();
            $newOrder->name_surname = $faker->name();
            $randomAddressKey = array_rand($addressOrders, 1);
            $randomAddress = $addressOrders[$randomAddressKey]; 
            $newOrder->address = $randomAddress;
            $newOrder->phone_number = $faker->e164PhoneNumber();
            $newOrder->total_price = $faker->randomFloat(2, 15, 50); 
            $newOrder->created_at = $faker->dateTimeThisYear('+2 months');
            $newOrder->save();



            $newOrder->plate()->sync($plateOrder[$x]);
        }
    }
}