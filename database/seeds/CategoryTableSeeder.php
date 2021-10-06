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
            'Agnello',//1
            'Anatra', //2
            'Antipasti',//3
            'Bevande',//4
            'Birre',//5
            'Biscotti',//6
            'Burrito',//7
            'Carne',//8
            'Cheesecake',//9
            'Chirashi',//10
            'Colazione',//11
            'Contorni',//12
            'Crepes',//13
            'Croissant',//14
            'Cucina Vegetariana',//15
            'Dessert',//16
            'Extra',//17
            'Fajitas',//18
            'Gunkan',//19
            'Hamburger',//20
            'Hosomaki',//21
            'Insalate',//22
            'Involtini',//23
            'Kebab',//24
            'Maiale',//25
            'Manzo',//26
            'Menù Americano',//27
            'Menù Bimbi',//28
            'Menù Cinese',//29
            'Menù Giapponese',//30
            'Menù Greco',//31
            'Menù Italiano',//32
            'Menù Libanese',//33
            'Menù Messicano',//34
            'Menù Piadina',//35
            'Menù Pizza',//36
            'Menù Spagnolo',//37
            'Menù Thailandese',//38
            'Mignon',//39
            'Nigiri',//40
            'Noodles',//41
            'Onigiri',//42
            'Panini',//43
            'Pesce',//44
            'Piadine',//45
            'Pizze',//46
            'Pollo',//47
            'Primi Piatti',//48
            'Riso',//49
            'Sashimi',//50
            'Secondi Piatti',//51
            'Spaghetti',//52
            'Sushi',//53
            'Tartare',//54
            'Tataki',//55
            'Temaki',//56
            'Tempura',//57
            'Torte',//58
            'Uramaki',//59
            'Verdure',//60
            'Vini',//61
            'Zuppe'//62
        ];

        foreach($categories as $category) {
            $categoryObject = new Category();
            $categoryObject->name = $category; 
            $categoryObject->save(); 
        }
    }
}
