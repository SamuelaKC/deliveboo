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

$plateIngredient = [
[41,42,43,44,207,208,208,209,210,211,212,239],
[],
[],
[],
[],
[41,42,43,44,207,208,208,209,210,211,212,239],
[41,42,43,44,207,208,208,209,210,211,212,239],
[426],
[41,42,43,44,207,208,208,209,210,211,212,239],
[426],
[41,42,43,44,207,208,208,209,210,211,212,239],
[],
[41,42,43,44,207,208,208,209,210,211,212,239],
[426],
[41,42,43,44,207,208,208,209,210,211,212,239],
[],
[41,42,43,44,207,208,208,209,210,211,212,239],
[426],
[],
[],
[],
[426],
[426],
[1,2,3,5,6, 281,282,284,92,38,39,40,307,308,428,420,421,188,189,378,379,380,93,295,296,297,298,299,300,301,302,374,34,321,322,426],
[],
[426],
[],
[1,2,3,5,6, 281,282,284,92,38,39,40,307,308,428,420,421,188,189,378,379,380,93,295,296,297,298,299,300,301,302,374,34,321,322,426],
[41,42,43,44,207,208,208,209,210,211,212,239],
[41,42,43,44,207,208,208,209,210,211,212,239],
[],
[],
[426],
[41,42,43,44],
[],
[],
[41,42,43,44,207,208,208,209,210,211,212,239],
[],
[41,42,43,44],
[],
[],
[],
[],
[426],
[],
[],
[426],
[],
[],
[41,42,43,44,239]
[],
[426],
[426],
[],
[],
[],
[41,42,43,44],
[426],
[],
[],
[],
[],
[1,2,3,5,6, 281,282,284,92,38,39,40,307,308,428,420,421,188,189,378,379,380,93,295,296,297,298,299,300,301,302,374,34,321,322,426],
[355,356.357,389,390,126,127,128,131,132,133,142,143,144,145,146,123,124125,391,392,393,394,395,396,358,361,397,398,399,139,140,402,403,404,405,406,407,408,409,410,411,412,413,195,137,138,400,401,129,130,147,134,135,136,198],
[1,2,3,5,6, 281,282,284,92,38,39,40,307,308,428,420,421,188,189,378,379,380,93,295,296,297,298,299,300,301,302,374,34,321,322,426],
[1,2,3,5,6, 281,282,284,92,38,39,40,307,308,428,420,421,188,189,378,379,380,93,295,296,297,298,299,300,301,302,374,34,321,322,426],
[],
[41,42,43,44,207,208,208,209,210,211,212],
[41,42,43,44],
[],
[],
[355,356.357,389,390,126,127,128,131,132,133,142,143,144,145,146,123,124125,391,392,393,394,395,396,358,361,397,398,399,139,140,402,403,404,405,406,407,408,409,410,411,412,413,195,137,138,400,401,129,130,147,134,135,136,198],
[],
[355,356.357,389,390,126,127,128,131,132,133,142,143,144,145,146,123,124125,391,392,393,394,395,396,358,361,397,398,399,139,140,402,403,404,405,406,407,408,409,410,411,412,413,195,137,138,400,401,129,130,147,134,135,136,198],
];



        
        for($x = 0; $x < 446; $x++) {
            
            $plate = Plate::find($x);
            $plate->order()->sync();
            $plate->ingredient()->sync();
        }
    }
}