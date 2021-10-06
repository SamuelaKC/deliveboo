<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagList = [
            'Americano',
            'Bar',
            'Bistrot',
            'Cinese',
            'Colazione',
            'Confort Food',
            'Dessert',
            'Finger Food',
            'Giapponese',
            'Greco',
            'Halal',
            'Indiano',
            'Italiano',
            'Libanese',
            'Messicano',
            'Piadineria',
            'Pizza',
            'Sushi',
            'Thailandese',
            'Vegetariano'
        ];

        $tagImgs = [
            '/image/tags/americano.png',
            '/image/tags/bar.jpg',
            '/image/tags/bistrot.jpg',
            '/image/tags/cinese.jpg',
            '/image/tags/colazione.jpg',
            '/image/tags/confortfood.jpg',
            '/image/tags/dessert.jpg',
            '/image/tags/fingerfood.jpg',
            '/image/tags/giapponese.jpg',
            '/image/tags/greco.jpg',
            '/image/tags/halal.jpg',
            '/image/tags/indiano.jpg',
            '/image/tags/italiano.jpg',
            '/image/tags/libanese.jpg',
            '/image/tags/messicano.jpeg',
            '/image/tags/piadina.jpeg',
            '/image/tags/pizza.jpg',
            '/image/tags/sushi.jpg',
            '/image/tags/thailandese.jpg',
            '/image/tags/vegetariano.jpg'
        ];

        $tagUserID = [
            [11],
            [5, 16, 20],
            [17],
            [13, 14],
            [2, 20],
            [2, 3, 5, 11],
            [5, 16, 20],
            [4],
            [12, 14],
            [],
            [3],
            [],
            [1, 4, 7, 8, 9, 10, 15, 17, 18],
            [],
            [],
            [2, 3],
            [4, 7, 8, 10, 18],
            [12, 14],
            [19],
            [1, 2, 4, 6, 17, 19]
        ];



        for ($x = 0; $x < count($tagList); $x++) {

            $newTag = new Tag();
            $newTag->name = $tagList[$x];
            $newTag->picture = $tagImgs[$x];
            $newTag->save();

            $newTag->user()->sync($tagUserID[$x]);
        }
    }
}
