<?php

namespace App;


class Exam
{
    public static function findIndex($n) 
    { 
      
        if ($n <= 1) 
            return $n; 
    
        $a = 0; $b = 1; $c = 1; 
        $res = 1; 
    
       
        while ($c < $n) 
        { 
            $c = $a + $b; 
    
            $res++; 

            $a = $b; 
            $b = $c; 
        }
        var_dump($res);
        return $res; 
    } 


    public static function sortedArray($arrayInt = [],  int $int)
    {
        if(count($arrayInt) <= 5){
            if($int == 1){
                asort($arrayInt);
            }

            if($int == 2){
                rsort($arrayInt);
            }

            var_dump($arrayInt);
        } else {
            var_dump('It accepts only 5 integers');
        }
    }
}
