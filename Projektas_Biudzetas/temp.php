<?php

$apsipirkimas = array(
    "pirkejas" => "Romanas",
    "Apsipirkimo ID" => "1",
    "Pirkinio ID" => "1",
    "Barkodas" => "NULL",
    "Pavadinimas" => 'MSC žubų piršteliai 450g . Šaldyti žuvų piršteliai 18vnt. LIDL 0112834',
    "Kaina" => "1,55",
    "Kiekis" => "1",
    "Nuolaida" => "0",
    "Depozitas" => "0",
    "Suma" => "1,55",
    "Data" => "2018-10-15 10:28:52",
    "Tinklas" => "Lidl Lietuva, UAB",
    "Adresas" => "Kapsų g. 1 Vilnius",
    "Kategorija - Proga" => "Kasdienės išlaidos",
    "Kategorija I" => "Būtinos",
    "Kategorija II" => "Maistas",
    "Kategorija III" => "Žuvies produktai"
);
$apsipirkimas1 = array(
  "pirkejas" => "Romanas",
  "Apsipirkimo ID" => "1",
  "Pirkinio ID" => "2",
  "Barkodas" => "NULL",
  "Pavadinimas" => 'Pyragėlis/Bandelė su dešrele',
  "Kaina" => "0,39",
  "Kiekis" => "5",
  "Nuolaida" => "0",
  "Depozitas" => "0",
  "Suma" => "1,95",
  "Data" => "2018-10-15 10:28:52",
  "Tinklas" => "Lidl Lietuva, UAB",
  "Adresas" => "Kapsų g. 1 Vilnius",
  "Kategorija - Proga" => "Kasdienės išlaidos",
  "Kategorija I" => "Pramogos",
  "Kategorija II" => "Maistas",
  "Kategorija III" => "Miltiniai"
);
$apsipirkimai[] = $apsipirkimas;
$apsipirkimai[] = $apsipirkimas1;
//printArray($apsipirkimas);
//writeToFile_JSON($pirkimaiFailas,$apsipirkimai);
//printArray(readFromFile_JSON($pirkimaiFailas));
//$apsipirkimas_array = readFromFile_JSON($pirkimaiFailas);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js.js"></script>
    <title>Document</title>
</head>
<body>
<?php 

foreach($apsipirkimai as $apsipirkimas_element){
  //printArray($apsipirkimas_element);
  //echo $apsipirkimas_element['Pavadinimas'];
}

?>
  <form action="" method="">
  <label for="pirkejas">Pirkėjas :</label>
  <input list="pirkejai" name="pirkejas" id="pirkejas" value="Romanas" onchange="resetIfInvalid(this);">
  <datalist id="pirkejai">
    
  <?php 
             $i =0;
              foreach($apsipirkimai as $apsipirkimas_element){
                echo '<option value="'.$apsipirkimas_element["pirkejas"].'">'.$apsipirkimas_element["pirkejas"].'</option>';
                $i++;
            }    
    ?>
  </datalist>
  <br>
  <label for="pavadinimai">Pavadinimas :</label>
  <input list="prekiu_pavadinimai" name="pavadinimai" id="pavadinimai"  onchange="resetIfInvalid(this);">
  <datalist id="prekiu_pavadinimai">
  <?php 
             $i =0;
              foreach($apsipirkimai as $apsipirkimas_element){
                echo '<option value="'.$apsipirkimas_element["Pavadinimas"].'">'.$apsipirkimas_element["Pavadinimas"].'</option>';
              $i++;
            }    
    ?>
  </datalist>
  <input type="submit">
</form>

<?php 
//$obj0 = new Produktas();
//$obj0->set_barkodas(123456);


?>
</body>
</html>
