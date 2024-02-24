<?php

namespace Rasouldanesh90\Excelize;

use Rasouldanesh90\Excelize\SimpleXLSX;

class Excelize
{

    public static function ar_prepareDataFromExcel($filePath,$extr = null,$pointerPath = "pointer.txt") {

        ini_set('memory_limit', '512000000000000000MB');
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
        set_time_limit(0);

        $xls = SimpleXLSX::parse($filePath);
        $data = [];

        foreach ($xls->rows() as $key => $value) {
            $product=[];
            if($key==0) {
                $headers=$value;
                continue;
            }
            foreach ($value as $key => $value) {
                $product[$headers[$key]]=$value;
            }
            array_push($data, $product);
        }

        $result = $data;

        if($extr != null && $pointerPath != null) {
            $pointer = file_get_contents(asset($pointerPath));
            $result = array_slice($data,$pointer,$extr+1);
            file_put_contents(__DIR__."/".$pointerPath,$pointer+$extr);
        }

        return $result;
    }

}
