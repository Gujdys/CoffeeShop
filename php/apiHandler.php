<?php

require("Model/Repository/CoffeeRepository.php");
$CoffeeRepository = new CoffeeRepository();

//Handle API calls

if(isset($_GET['doGetAllCoffee'])) { //Get every coffee from database
    if($res = $CoffeeRepository->getAllCoffee()) {
        echo $res;
    }else {
        echo "error";
    }
}

if(isset($_GET['doGetCoffee'])) {
    if($res = $CoffeeRepository->getCoffee($_GET['id'])) {
        echo $res;
    }else {
        echo "error";
    }
}

//header('Content-type: text/html; charset=utf-8');
    // require("database.class.php");

    // $db = new Database();

    // // Get all coffee
    // $data = $db->selectCoffe();
    // $quests = array();
   
    // while($entry = $data->fetch_assoc()) {
    //     array_push($quests, array(
    //         'id' => mb_convert_encoding($entry["id"],'UTF-8', 'UTF-8'),
    //         'nazev' => mb_convert_encoding($entry["nazev"],'UTF-8', 'UTF-8'),
    //         'cena' => mb_convert_encoding($entry["cena"],'UTF-8', 'UTF-8'),
    //         'popis' => mb_convert_encoding($entry["popis"],'UTF-8', 'UTF-8'),
    //         'vaha' => mb_convert_encoding($entry["vaha"],'UTF-8', 'UTF-8'),
    //         'prazirna' => mb_convert_encoding($entry["prazirna_nazev"],'UTF-8', 'UTF-8'),
    //         'zeme' => mb_convert_encoding($entry["zeme_nazev"],'UTF-8', 'UTF-8'),
    //         'region' => mb_convert_encoding($entry["region_nazev"],'UTF-8', 'UTF-8'),
    //         'odruda' => mb_convert_encoding($entry["odruda_nazev"],'UTF-8', 'UTF-8'),
    //         'pouziti' => mb_convert_encoding($entry["pouziti_nazev"],'UTF-8', 'UTF-8'),
    //         'zpusob_zpracovani' => mb_convert_encoding($entry["zpracovani_nazev"],'UTF-8', 'UTF-8'),
    //         'stupen_prazeni' => mb_convert_encoding($entry["id_stupen_prazeni"],'UTF-8', 'UTF-8'),

    //     ));
    // }
    // print_r($quests);
    // //print_r($quests);

    // $str_ex = json_encode($quests, JSON_UNESCAPED_UNICODE );
    // echo $str_ex;

?>