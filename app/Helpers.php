<?php

use Illuminate\Support\Facades\DB;
/**
 * @param int $str  $type = 0  $str(number) ; $type =1 $str(str)
 * @param int $type
 * @return mixed
 */
function getChar($str = 0, $type = 0)
{
    $array = [
        0 => 'A',
        1 => 'B',
        2 => 'C',
        3 => 'D',
        4 => 'E',
        5 => 'F',
    ];

    if($type) {
        $array = array_flip($array);
        return $array[$str];
    } else {
        return $array[$str];
    }
}

function getSelect($id)
{
    $list = DB::table('stopics')->where('topic_id', $id)->select('name', 'description')->orderBy('name', 'asc')->get();
    $list = $list->each(function($item, $key){
       $item->name = getChar($item->name);
    });
    return $list;
}
