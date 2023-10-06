<?php


namespace App\Models\Traits;


use Illuminate\Http\Request;

trait SubarrayTrait
{
    function getArray($arr,$model,$property_first,$property_second,$mysubarr = []): array
    {
        $arr = json_decode($arr,true);
        foreach ($arr as $subarr) {
            if ($subarr[$property_first] == $model[$property_second]) {
                $mysubarr = $subarr;
                break;
            }
        }
        return $mysubarr;
    }
    
    
}