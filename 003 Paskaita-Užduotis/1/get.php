<?php
$skaicius1 = $_GET["skaicius1"];
$skaicius2 = $_GET["skaicius2"];
$aritVeiksmas = $_GET["aritmetinisVeiksmas"];

switch($aritVeiksmas){
    case "+":
        echo "sudetis";
        echo "<br>Rezultatas: <div>".$skaicius1+$skaicius2."</div>";
        break;
    case "-":
        echo "atimtis";
        echo "<br>Rezultatas: <div>".$skaicius1-$skaicius2."</div>";
        break;
    case "/":
        echo "dalyba";
        echo "<br>Rezultatas: <div>".$skaicius1/$skaicius2."</div>";
        break;
    case "*":
        echo "daugyba";
        echo "<br>Rezultatas: <div>".$skaicius1*$skaicius2."</div>";
        break;
}

?>
