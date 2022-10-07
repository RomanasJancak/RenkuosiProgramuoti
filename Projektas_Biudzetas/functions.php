<?php
$pirkimaiFailas = "Pirkimai.json";
//$apsirpirkimas_array = readFromFile_JSON($pirkimaiFailas);
//$apsirpirkimas_array = null;
//printArray($apsirpirkimas_array);
function writeToFile_JSON($file,$array){
    $json = json_encode($array);
    file_put_contents($file,$json);
}
function readFromFile_JSON($file){
    return json_decode(file_get_contents($file),true);
}
function printArray($array){
    echo'<pre>';
    var_dump($array);
    echo'</pre>';
}
function addApsipirkimas($apsipirkimas){
    $apsirpirkimas_array[] = $apsipirkimas;
}
function sukurtiApsipirkima_FromPOST(){
    if(isset($_POST["pridetiPirkima"])){
        $naujasPirkinys = array(
        "pirkejas" => $_POST["pirkejas"],
        "Apsipirkimo ID" => $_POST["Apsipirkimo ID"],
        "Pirkinio ID" => $_POST["Pirkinio ID"],
        "Barkodas" => $_POST["Barkodas"],
        "Pavadinimas" => $_POST["Pavadinimas"],
        "Kaina" => $_POST["Kaina"],
        "Kiekis" => $_POST["Kiekis"],
        "Nuolaida" => $_POST["Nuolaida"],
        "Depozitas" => $_POST["Depozitas"],
        "Suma" => $_POST["Suma"],
        "Data" => $_POST["Data"],
        "Tinklas" => $_POST["Tinklas"],
        "Adresas" => $_POST["Adresas"],
        "Kategorija - Proga" => $_POST["Kategorija - Proga"],
        "Kategorija I" => $_POST["Kategorija I"],
        "Kategorija II" => $_POST["Kategorija II"],
        "Kategorija III" => $_POST["Kategorija III"]);
    }
}
?>