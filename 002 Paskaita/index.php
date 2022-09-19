<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 1 DALIS -->
    <!-- A -->
    <?php
    $skaicius1 = 1;
    $skaicius2 = 2;
    $skaicius3 = 3;
    $skaicius4 = 4;

    ?>
    
    <?php
    function sum($nr1,$nr2){
        return $nr1+$nr2;
    }
    function daug($nr1,$nr2){
        return $nr1*$nr2; 
    }
    ?>
    <!-- B -->
    <?php
    echo "<h1>Skaičiai</h1>";
    echo "<div> Skaicius1 : ".$skaicius1."</div>";    
    echo "<div> Skaicius2 : ".$skaicius2."</div>";
    echo "<div> Skaicius3 : ".$skaicius3."</div>";
    echo "<div> Skaicius4 : ".$skaicius4."</div>";

    echo "<div><h1>Skaičių suma</h1><p>".sum(sum($skaicius1,$skaicius2),sum($skaicius3,$skaicius4))."<p></div>";
    echo "<div><h1>Skaičių sandauga</h1><p>".daug(daug($skaicius1,$skaicius2),daug($skaicius3,$skaicius4))."<p></div>";
    ?>

    <!-- C -->
    <?php
        $temp = $skaicius1;
        $skaicius1 = $skaicius2;
        $skaicius2 = $temp;
    ?>
    <!-- D -->
    <?php
    list($skaicius3,$skaicius4) = array($skaicius4,$skaicius3);
    $skaicius3 = $skaicius3+$skaicius4;
    $skaicius4 = $skaicius3-$skaicius4;
    $skaicius3 = $skaicius3-$skaicius4;
    list($skaicius3,$skaicius4) = array($skaicius4,$skaicius3);
    ?>
    <!-- E -->
    <?php
    echo 'Po sukeitimo skaičiai "skaicius3" ir "skaicius4" atitinkamai yra '.$skaicius3.' ir '.$skaicius4; 
    ?>
    <!-- F -->
    <?php
       $maxSkaicius = PHP_INT_SIZE;
       if($maxSkaicius = 8){
        $maxSkaicius = 9223372036854775807;
       }else{
        $maxSkaicius = 2147483647;
       }
       echo "<h1>".$maxSkaicius."</h1>"
    ?>
    <!-- G -->
    <?php
        $skaicius5 = 5;
        $skaicius6 = 6;
        echo "<div> Skaicius5 : ".$skaicius5."</div>";
        echo "<div> Skaicius6 : ".$skaicius6."</div>";
    ?>
    <!-- H -->
    <?php
        $skaicius5 ^= $skaicius6; // 5+6
        $skaicius6 ^= $skaicius5; // 5+6 -6
        $skaicius5 ^= $skaicius6; // 5+6 -5

    ?>
    <!-- I -->
    <?php 
        echo '<div id="Rezultatas">Po sukeitimo skaičiai "skaicius5" ir "skaicius6" atitinkamai yra '.$skaicius5.' ir '.$skaicius6.'</div>'
    ?>
    <!-- 2 DALIS -->
    <?php
    $graza = 123.15;
    $monetos = $graza*100 % 100;
    $graza -= $monetos/100;
    $banknotas100 = 0;
    $banknotas50 = 0;$moneta50 = 0;
    $banknotas20 = 0;$moneta20 = 0;
    $banknotas10 = 10;$moneta10 = 0;
    $banknotas5 = 5;$moneta5 = 0;
    $banknotas2 = 2;$moneta2 = 0;
    $banknotas1 = 1;$moneta1 = 0;
    echo "Graza : ".$graza." EUR ir ".$monetos." ct <br>";
    
    $banknotas100 = ($graza -$graza % 100)/100;
    $graza = $graza % 100;
    $banknotas50 = ($graza -$graza % 50)/50;
    $graza = $graza % 50;
    $banknotas20 = ($graza -$graza % 20)/20;
    $graza = $graza % 20;
    $banknotas10 = ($graza -$graza % 10)/10;
    $graza = $graza % 10;
    $banknotas5 = ($graza -$graza % 5)/5;
    $graza = $graza % 5;
    $banknotas2 = ($graza -$graza % 2)/2;
    $graza = $graza % 2;
    $banknotas1 = ($graza -$graza % 1)/1;
    $graza = $graza % 1;
    $moneta50 = ($monetos -$monetos % 50)/50;
    $monetos = $monetos % 50;
    $moneta20 = ($monetos -$monetos % 20)/20;
    $monetos = $monetos % 20;
    $moneta10 = ($monetos -$monetos % 10)/10;
    $monetos = $monetos % 10;
    $moneta5 = ($monetos -$monetos % 5)/5;
    $monetos = $monetos % 5;
    $moneta2 = ($monetos -$monetos % 2)/2;
    $monetos = $monetos % 2;
    $moneta1 = ($monetos -$monetos % 1)/1;
    $monetos = $monetos % 1;
    echo "100 eur :".$banknotas100."<br>";
    echo "50  eur:".$banknotas50."<br>";
    echo "20  eur:".$banknotas20."<br>";
    echo "10  eur:".$banknotas10."<br>";
    echo "5   eur:".$banknotas5."<br>";
    echo "2   eur:".$banknotas2."<br>";
    echo "1   eur:".$banknotas1."<br>";
    echo "50  ct:".$moneta50."<br>";
    echo "20  ct:".$moneta20."<br>";
    echo "10  ct:".$moneta10."<br>";
    echo "5   ct:".$moneta5."<br>";
    echo "2   ct:".$moneta2."<br>";
    echo "1   ct:".$moneta1."<br>";
    
    ?>   
</body>
</html>