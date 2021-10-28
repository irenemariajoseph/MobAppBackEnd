<?php
    require "../util/responsebuilder.php";
    require "../entity/inputalamat.php";
    require "../util/validate.php";
    require "../util/globalvariable.php";

    $op = "router/hitungalamat";


    //WAJIB ADA DISETIAP SERVICE YG ADA 
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        $msg = "[$op] wrong request method"; // [$op] -> biar indikasi errornya gampang 
        BuildErrorResponse($StatusBadRequest, $msg);
        return;
    }

    $lat1 = $_POST['lat1'];
    $lat2 = $_POST['lat2'];
    $long1 = $_POST['long1'];
    $long2 = $_POST['long2'];

    

    function hitungjarak($lat1, $lat2, $long1, $long2) {
        $PI = 3.141592653589793;
    
        $radlat1 = $PI * $lat1 / 180;
        $radlat2 = $PI * $lat2 / 180;
    
        $theta = $long1 - $long2;
        $radtheta = $PI * $theta / 180;
    
        $dist = sin($radlat1)*sin($radlat2) + cos($radlat1)*cos($radlat2)*cos($radtheta);
    
        if ($dist > 1) {
            $dist = 1;
        }
    
        $dist = acos($dist);
        $dist = $dist * 180 / $PI;
        $dist = $dist * 60 * 1.1515;
    
        return $dist * 1.609344;
    }
    
    echo(hitungjarak($lat1, $lat2, $long1, $long2));

    $msg = "[$op]Hitung Jarak Sukses";
    BuildSuccessResponse($msg);
   
?>