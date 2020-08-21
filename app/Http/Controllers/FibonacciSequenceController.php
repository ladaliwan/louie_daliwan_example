<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FibonacciSequenceController extends Controller
{
    public function index()
    {
        return view('fibonacci.index');
    }

    public function store()
    {
        $int = request('int');
        
    }   

    function fibonacciNumber(int $n)
    {
        
        $nth = array("0");
        
        for($i = 1; $i <= $n; $i++){
            array_push($nth, $this->fx($i));
        }

        return $nth;
    }

    function fx($nth)
    {
        $n1 = "1";
        $n2 = "1";
       
        for($i=2; $i < $nth; $i++) 
        {
            $tmp = $n1;
            $n1 = $n2;
            $n2 = $this->add($tmp, $n2);
        }

        return $n2;
    }

    function add(string $x, string $y)
    {
        $result = "";
        $flag = 0;
        for($i = strlen($x)-1, $j = strlen($y)-1; $i >= 0 || $j >= 0; $i--, $j--)
        {
            $z = (($i<0)?0:(substr($x,$i,1)*1)) + (($j<0)?0:(substr($y,$j,1)*1)) + $flag;
            
            if($z>9 && ($i>0 || $j>0)){
                $flag = floor($z/10);
                $result = ($z-$flag*10).$result;
            } else {
                $result = $z.$result;
                $flag = 0;
            }
        }

        $result = preg_replace("/^0+/", "", $result);
  
        return (($result == "")? "0" : $result);
    }
}
