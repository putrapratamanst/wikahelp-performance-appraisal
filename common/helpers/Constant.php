<?php

namespace common\helpers;


class Constant
{
    const STATUS_PROCESS = "Proses";
    const STATUS_SUBMIT  = "Diterima";
    const STATUS_DONE    = "Selesai";
    const NOTIF_EMAIL    = "Segera di Selesaikan";

    public static function mergingArray($array)
    {
        // $array is the original array
        $newArray = array();

        foreach ($array as $key => $subarray) {
            //key: username, login
            foreach ($subarray as $j => $k) {
                //j: 3805120, 3805121
                //k: 5,7,9,11

                $newArray[$j] = $k;
                //1st round: $newArray[3805120][0] = 5, $newArray[3805121][0] = 7
                //2nd round: $newArray[3805120][1] = 9, $newArray[3805121][1] = 11 
            }
        }
        echo "<pre>";
        die(print_r($newArray));

        return $newArray;
    }
}
