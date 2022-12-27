<?php

//Overloading 
//class squre
//{
//    public function __call($name, $arg)
//    {
//        if ($name == 'area') {
//            switch (count($arg)) {
//                case 1: return $arg[0] * $arg[0];
//                case 2: return $arg[0] * $arg[1];
//            }
//        }
//    }
//
//}
//
//$squreShape = new squre;
//echo ($squreShape->area(10,30)); 


//Overriding 
// class human{
//     public function run($speed)
//     {
//         return "Runing at Speed $speed km/h";
//     }
// }

// class diver extends human {
//     public function run($speed){
//         return "Runing deep in water at speed $speed km/h";
//     }
// }

// $x = new diver;
// echo $x->run(10); 

//spl_autoload 
spl_autoload_register(function ($class) {
    //path for search the class + class bane + extension
    include "./" . $class . ".php";

});

$player = new human ; 
echo $player->run(30); 
