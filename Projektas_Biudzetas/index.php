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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

  <form action="/action_page.php" method="get">
  <label for="browser">Choose your browser from the list:</label>
  <input list="browsers" name="browser" id="browser">
  <datalist id="browsers">
  <?php 
            foreach($apsipirkimas  as $item){
                //echo "<option value='".strtolower($item)."'>$item</option>";
                echo '<option value="'.strtolower($item).'">'.$item.'</option>';
            }
    //echo $apsipirkimas["Tinklas"];
    
    ?>
  </datalist>
  <input type="submit">
</form>
</form>
</body>
</html>
