<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlgoApiController extends Controller
{
    function sortString($str){
        $numbers = array();
        $strings = array();
        $chars = str_split($str);
        foreach($chars as $char) {
            if(preg_match('/\d/', $char)){
                array_push($numbers, $char);
                sort($numbers);
                $sorted_num = implode($numbers);
            }
            else if(preg_match('/[a-zA-Z]/', $char)){
                array_push($strings, $char);
                sort($strings, SORT_NATURAL  | SORT_FLAG_CASE);
                $sorted_string = implode($strings);
            }
        }

        return response()->json([
            $str => $sorted_string.$sorted_num
        ]);

    }

    function placeOfDigit ($num) {
        $list = [];
        $d = 0;
        while ($num !== 0){
            $digit = ($num % 10) * pow(10,$d);
            array_push($list, $digit);
            
            $num = (int)($num/10);
            $d += 1;
        }
        
        return response()->json([
            "result" => array_reverse($list)
        ]);
    }

    function replaceNumberWithBinary($string) {
        
        if(preg_match('/[^0-9]/', $string)) {
            preg_match_all('/\d+/' , $string, $num);
            $result = $string;
            foreach($num[0] as $value){
                $result = str_replace($value, decbin($value), $result);
            }
        }
        return response()->json([
            "result" => $result
        ]);
        
    }
}
