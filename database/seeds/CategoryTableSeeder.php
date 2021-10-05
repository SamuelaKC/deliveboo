<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Agnello',
            'Anatra', 
            'Antipasti',
            'Bevande',
            'Birre',
            'Biscotti',
            'Burrito',
            'Carne',
            'Cheesecake',
            'Chirashi',
            'Colazione',
            'Contorni',
            'Crepes',
            'Croissant',
            'Cucina Vegetariana',
            'Dessert',
            'Extra',
            'Fajitas',
            'Gunkan',
            'Hamburger',
            'Hosomaki',
            'Insalate',
            'Involtini',
            'Kebab',
            'Maiale',
            'Manzo',
            'Menù Americano',
            'Menù Bimbi',
            'Menù Cinese',
            'Menù Giapponese',
            'Menù Greco',
            'Menù Italiano',
            'Menù Libanese',
            'Menù Messicano',
            'Menù Piadina',
            'Menù Pizza',
            'Menù Spagnolo',
            'Menù Thailandese',
            'Mignon',
            'Nigiri',
            'Noodles',
            'Onigiri',
            'Panini',
            'Pesce',
            'Piadine',
            'Pizze',
            'Pollo',
            'Primi Piatti',
            'Riso',
            'Sashimi',
            'Secondi Piatti',
            'Spaghetti',
            'Sushi',
            'Tartare',
            'Tataki',
            'Temaki',
            'Tempura',
            'Torte',
            'Uramaki',
            'Verdure',
            'Vini',
            'Zuppe'
        ];

        foreach($categories as $category) {
            $categoryObject = new Category();
            $categoryObject->name = $category; 
            $categoryObject->save(); 
        }
    }
}
