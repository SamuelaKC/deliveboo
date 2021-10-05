<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $nameRestaurants = [
            'Il Ristoro', //1
            'La Piadineria', //2
            'K2', //3
            'Girotondo di Pizza', //4
            'Oasi del Gelato', //5
            'Sweet and Fit', //6
            'Il Gatto e La Volpe', //7
            'La Perla', //8
            'Machebuò', //9
            'Fratelli La Bufala', //10
            'Easy Rider Pub', //11
            'Primo Sushi', //12
            'Yama', //13
            'Xiao', //14
            'Girarrosto La Lanterna', //15
            'Gelateria La Scimmietta', //16
            'Il Tartufo Nero', //17
            'Pizza Scugnizzi', //18
            'Baan Thai', //19
            'Yum' //20
        ];

        $addressRestaurants = [
            'Piazza Duomo, Milano',
            'Alzaia Naviglio Grande, 62, Milano',
            'Via Duca Uberto, 5, Milano',
            'Piazza A. Diaz, 2, Milano',
            'Piazza Marconi, 1, Milano',
            'Via C. Battisti, 2, Milano',
            'Via Roma, 42, Milano',
            'Via Carlo Patellani, 4, Milano',
            'Viale Coni Zugna, 44, Milano',
            'Via Alessandro Manzoni, 44, Milano',
            'Piazza Giuseppe Missori, 3, Milano',
            'Piazza Cadorna, 11, Milano',
            'Viale Adamo Mickiewicz, 6, Milano',
            'Via Agnello, 11, Milano',
            'Viale Alessandro Petofi, 65, Milano',
            'Via Alessandro Puskin, 73, Milano',
            'Via Ancona, 67, Milano',
            'Via Anfiteatro, 78, Milano',
            'Via Andegari, 17, Milano',
            'Via Alessandro Volta, 13, Milano'
        ];

        $descriptionRestaurants = [
            'Cucina italiana di Ottima qualità',
            'Ottime piadine con prodotti naturali',
            'Ottimi panini per tutti i gusti',
            'Pizza spettacolare cucinata in forno a legno',
            'Gelati Freschi di produzione propria',
            'Cucina macrobiotica',
            'Ristorante italiano con specialità carne',
            'Ristorante italiano con specialità pesce',
            'Grigliata di pesce e carne',
            'Ottime pizze con prodotti naturali e cucina italiana DOC',
            'Vuoi un panino lungo un metro? Vieni da noi! Ti sfidiamo a finirlo!',
            'Pesce fresco',
            'Cucina cinese',
            'Cucina cino-giapponese',
            'Vuoi un buon arrosto? Vieni qui! Te lo cuciniamo noi',
            'Abbiamo anche il gelato fritto!',
            'Piatti con ottimo tartufo nero francese',
            'Abbiamo ottima pizza napoletana',
            'Cucina thailandese',
            'Ottimi pasticcini gluten free'
        ];

        $pictureRestaurants = [
            '/image/restaurants/pasta-arrabbiata.jpeg',
            '/image/restaurants/piadineria.jpeg',
            '/image/restaurants/kebab.png',
            '/image/restaurants/pizza_restaurant.jpg',
            '/image/restaurants/gelato.jpg',
            '/image/restaurants/macrobiotic.jpg',
            '/image/restaurants/polpette.jpg',
            '/image/restaurants/pesce_griglia.jpg',
            '/image/restaurants/griglia_mista.jpg',
            '/image/restaurants/italiano.jpg',
            '/image/restaurants/panino_pub.jpg',
            '/image/restaurants/sushi2.jpg',
            '/image/restaurants/sushi.jpg',
            '/image/restaurants/sushi3.jpg',
            '/image/restaurants/griglia.jpg',
            '/image/restaurants/gelato2.jpg',
            '/image/restaurants/pesce_gourment.jpg',
            '/image/restaurants/pizza_salamino.png',
            '/image/restaurants/thailandese.jpg',
            '/image/restaurants/pasticcini.jpg',
        ];

        for ($x = 0; $x < count($nameRestaurants); $x++) {

            $newRestaurant = new User();
            $newRestaurant->name = $nameRestaurants[$x];
            $newRestaurant->email = $faker->email();
            $newRestaurant->password = $faker->password();
            $newRestaurant->address = $addressRestaurants[$x];
            $newRestaurant->phone_number = $faker->e164PhoneNumber();
            $newRestaurant->piva = $faker->bothify('IT###########');
            $newRestaurant->description = $descriptionRestaurants[$x];
            $newRestaurant->picture = $pictureRestaurants[$x];
            $newRestaurant->save();
        }
    }
}
