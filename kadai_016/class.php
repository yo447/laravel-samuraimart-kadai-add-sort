<?php

class Food {
    public $name;
    public $price;

    function show_price(): int{
       return $this->price;
    }
    
    public function __construct(string $name, int $price){
        $this->name = $name;
        $this->price = $price;
    }

    
}



class Animal {
    public $name;
    public $height;
    public $weight;

    public function show_height(): int {
        return $this->height;
    }

    public function __construct(string $name, int $height, int $weight){
        $this->name = $name;
        $this->height = $height;
        $this->weight = $weight;
    }

   
}

$Food = new Food('バナナ', 100);
    print_r($Food);
    print_r('<br>');

$Animal = new Animal('ライオン', 1, 1);
    print_r($Animal);
    print_r('<br>');

    


   
   $show_height = $Animal->show_height();
   
   echo $show_height;
   print_r('<br>');


   $show_price = $Food->show_price();

   echo $show_price; 