<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    public function data() {

        $array = array(
            ['1','Cocina','color blanca'],
            ['2','Gorra','color azul'],
            ['3','Laptop','PC i5'],
            ['4','Play4','consolas...'],
        );

        return $array;
    }
    public function run(){
        
        $data = self::data();

        foreach ($data as $value)
        {
            for($i = 0; $i < count($value)/3; $i++)
            {
                Product::create([
                    'category_id' => $value[0],
                    'name' => $value[1],
                    'description' => $value[2],
                ]);
            }
        }
    }
        
}
