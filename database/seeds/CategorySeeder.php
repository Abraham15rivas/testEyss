<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    public function data() {

        $array = array(
            ['Hogar','Articulos del hogar, linea blanca'],
            ['Deportes','Articulos del Deportes'],
            ['Tecnologia','Articulos del Teconologia'],
            ['Videojuegos','Articulos de Videojuegos, consolas ...'],
        );

        return $array;
    }
    public function run(){
        
        $data = self::data();

        foreach ($data as $value)
        {
            for($i = 0; $i < count($value)/2; $i++)
            {
                Category::create([
                    'name' => $value[0],
                    'description' => $value[1]
                ]);
            }
        }
    }
}
