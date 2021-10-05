<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nameRestaurants = ['Il Ristoro', 'La Piadineria', 'K2', 'Girotondo di Pizza', 'Oasi del Gelato', 'Sweet and Fit', 'Il Gatto e La Volpe', 'La Perla', 'Machebuò', 'Fratelli La Bufala', 'Easy Rider Pub', 'Primo Sushi', 'Yama', 'Xiao', 'Girarrosto La Lanterna', 'Gelateria La Scimmietta', 'Il Tartufo Nero', 'Panini Durini', 'Urasawa', 'Yum'];

        $addressRestaurants = ['Piazza Duomo, Milano', 'Alzaia Naviglio Grande, 62, Milano', 'Via Duca Uberto, 5, Milano', 'Piazza A. Diaz, 2, Milano', 'Piazza Marconi, 1, Milano', 'Via C. Battisti, 2, Milano', 'Via Roma, 42, Milano', 'Via Carlo Patellani, 4, Milano', 'Viale Coni Zugna, 44, Milano', 'Via Alessandro Manzoni, 44, Milano', 'Piazza Giuseppe Missori, 3, Milano', 'Piazza Cadorna, 11, Milano', 'Viale Adamo Mickiewicz, 6, Milano', 'Via Agnello, 11, Milano', 'Viale Alessandro Petofi, 65, Milano', 'Via Alessandro Puskin, 73, Milano', 'Via Ancona, 67, Milano', 'Via Anfiteatro, 78, Milano', 'Via Andegari, 17, Milano', 'Via Alessandro Volta, 13, Milano'];
    }
}