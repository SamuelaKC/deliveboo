<?php

use App\Plate;
use Illuminate\Database\Seeder;

class PlateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $namePlates = [
            //user-id 11
            //--antipasti--
            'patatine',
            'dippers',
            'patatine e wurstel',
            'bastincini di mozzarella',
            'alette di pollo',
            'spiedini di pollo',
            //--panini--
            'v-rod',
            'night rod',
            'road king',
            'the scout',
            'california',
            'gold wing',
            'vision',
            'vegas',
            //--bevande--
            'acqua minerale',
            'coca cola',
            'coca cola zero',
            'fanta',
            //--birre--
            'la chouffe',
            'mc chouffe',
            'nastro azzurro',
            'kwak',
            'corona',
            'grimbergen blond',
            'leffe triple',
            //----------
            //user-id 8
            //--antipasti--
            'insalata di mare',
            'insalata di polpo e patate',
            'salmone marinato con agrumi e mandorle tostate',
            'baccalà mantecato su cipolla in agrodolce e pistacchio',
            //--primi piatti--
            'raviolo di burrata pugliese',
            'scialatello all\'astice',
            'pacchero polipetti e pachino',
            'spaghettone aglio olio e peperoncino e gambero crudo',
            //--secondi--
            'grigliata mista',
            'catalana mista di crostacei',
            'tonno alla griglia',
            'polpo croccante, carfciofi e rosmarino',
            //--contorni--
            'verdure grigliate',
            'patate al forno',
            'insalata mista',

            //----------
            //user-id 16

        ];

        $descriptionPlates = [
            //user-id 11
            '',
            '',
            '',
            '5pz',
            '5pz',
            '4pz',
            'crudo, pomodoro, mozzarella',
            'crudo, scamorza affumicata, melanzane, rucola',
            'salsiccia, scamorza affumicata, cipolla, maionese',
            'wurstel, patatine, ketchup, maionese',
            'petto di pollo, lattuga, pomodoro, scamorza, maionese',
            'hamburger 100gr, schiacciata piccante, sottiletta, pomodoro, lattuga',
            'doppio hamburger 100gr, uovo, pancetta, sottiletta, maionese',
            'hamburger 100gr, porchetta, scamorza affumicata, melanzane, tabasco',
            '',
            '33cl',
            '33cl',
            '33cl',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            //user-id 8
            '',
            '',
            '',
            '',
            '',
            '(per 2 persone) mezzo astice o astice intero',
            '',
            '',
            '2 gamberoni, 2 scampi, 1 pezzo di tonno, 1 pezzo di seppia',
            'astice intero, 2 gamberi, 2 scampi con pinzimonio di verdure',
            '',
            '',
            '',
            '',
            '',
            //user-id 16
        ];

        $pricePlates = [
            2.50,
            3.50,
            4.50,
            4.00,
            4.00,
            4.00,
            4.00,
            4.50,
            4.50,
            4.00,
            5.00,
            5.00,
            5.50,
            5.00,
            1.00,
            2.00,
            2.00,
            2.00,
            5.00,
            5.00,
            2.50,
            5.00,
            5.00,
            5.00,
            //user-id 8
            15.00,
            18.00,
            13.00,
            12.00,
            15.00,
            40.00,
            14.00,
            16.00,
            20.00,
            40.00,
            18.00,
            18.00,
            5.00,
            4.00,
            4.00,
            //user-id 16

        ];

        $picturePlates = [
            '/image/plates/user-id-11/patatine.jpg',
            '/image/plates/dipper.jpg',
            '/image/plates/patatine-wurstel.jpg',
            '/image/plates/bastoncini-mozzarella.jpg',
            '/image/plates/alette-pollo.jpg',
            '/image/plates/spiedini-pollo.jpg',
            '/image/plates/panino-1.jpg',
            '/image/plates/panino-2.jpg',
            '/image/plates/panino-2.jpg',
            '/image/plates/panino-1.jpg',
            '/image/plates/panino-1.jpg',
            '/image/plates/panino-1.jpg',
            '/image/plates/panino-3.jpg',
            '/image/plates/panino-2.jpg',
            '/image/plates/acqua.jpg',
            '/image/plates/cocacola.jpg',
            '/image/plates/cocacola.jpg',
            '/image/plates/fanta.jpg',
            '/image/plates/birra.jpg',
            '/image/plates/birra.jpg',
            '/image/plates/birra.jpg',
            '/image/plates/birra.jpg',
            '/image/plates/birra.jpg',
            '/image/plates/birra.jpg',
            '/image/plates/birra.jpg',
            //user-id 8
            '/image/plates/insalata-mare.jpg',
            '/image/plates/insalata-mare.jpg',
            '/image/plates/salmone.jpg',
            '/image/plates/baccala-pistacchio.jpg',
            '/image/plates/raviolo-burrata.jpg',
            '/image/plates/spaghetto-astice.jpg',
            '/image/plates/paccheri.jpg',
            '/image/plates/spaghettone.jpg',
            '/image/plates/grigliata-mista.jpg',
        ];

        $userIDPlates = [
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            11,
            8,
            8,
            8,
            8,
            8,
            8,
            8,
            8,
            8,
            8,
            8,
            8,
            8,
            8,
            8,
        ];

        $categoryIDPlates = [
            3,
            3,
            3,
            3,
            3,
            3,
            43,
            43,
            43,
            43,
            43,
            43,
            43,
            43,
            4,
            4,
            4,
            4,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            3,
            3,
            3,
            3,
            48,
            48,
            48,
            48,
            51,
            51,
            51,
            51,
            12,
            12,
            12,
        ];


    }
}
