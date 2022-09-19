<?php
$rezultatas_sveikoji=0;
$rezultatas_dalinys=0;
$rezultatas_daliklis=0;



$tr1_dalinys = $_GET["tr1_dalinys"];
$tr1_daliklis = $_GET["tr1_daliklis"];
$tr2_dalinys = $_GET["tr2_dalinys"];
$tr2_daliklis = $_GET["tr2_daliklis"];

$skaiciai = array ($tr1_dalinys,$tr1_daliklis,$tr2_dalinys,$tr2_daliklis);
$allgood = true;
foreach($skaiciai as $skaicius){
    if (is_numeric($skaicius)){

    } else{
        echo $skaicius." NERA NUMERIS<br>";
        $allgood = false;
    }
}
if($allgood){
    $rezultatas_daliklis = $tr1_daliklis*$tr2_daliklis;
    $rezultatas_dalinys = $tr1_daliklis*$tr2_dalinys+$tr2_daliklis*$tr1_dalinys;
    $rezultatas_sveikoji = ($rezultatas_dalinys-($rezultatas_dalinys % $rezultatas_daliklis))/$rezultatas_daliklis;
    $rezultatas_dalinys = $rezultatas_dalinys - $rezultatas_sveikoji*$rezultatas_daliklis;
    echo "Sudeties rezultatas yra : <br>";
    echo "<div>";
    echo "Rezultato sveikoji dalis : ".$rezultatas_sveikoji."<br>";
    echo "Rezultato trumpeninė dalis : <br>";
    echo "Rezultato dalinys: ".$rezultatas_dalinys."<br>";
    echo "Rezultato daliklis: ".$rezultatas_daliklis."<br>";  
    echo "</div>";
}else{
    echo "Yra klaidų iš vartotojo pusės, ištaisykite.";
}
/*echo $tr1_dalinys;
echo $tr1_daliklis;
echo $tr2_daliklis;
echo $tr2_dalinys;
*/
?>