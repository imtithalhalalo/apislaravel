<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlgoApiController extends Controller
{
    function sortString(Request $request){
        $str = $request->str;
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
}
