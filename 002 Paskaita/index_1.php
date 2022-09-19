<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
   /*
   $kintamasis0 = 10;
   $kintamasis1 = 9;
   echo $kintamasis0+$kintamasis1;
   echo "<h1>Labas</h1>";
   $tekstas0 = "labas";
   $tekstas1 = 'balas';
    echo "text".$tekstas0.$tekstas1.'tekst';
    echo "<br>";
    print "lopas";
    */

    $graza = 223;
    $banknotas100 = 0;
    $banknotas50 = 0;
    $banknotas20 = 0;
    $banknotas10 = 10;
    $banknotas5 = 5;
    $banknotas2 = 2;
    $banknotas1 = 1;
    echo "Graza : ".$graza."<br>";
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
    echo "100 :".$banknotas100."<br>";
    echo "50  :".$banknotas50."<br>";
    echo "20  :".$banknotas20."<br>";
    echo "10  :".$banknotas10."<br>";
    echo "5  :".$banknotas5."<br>";
    echo "2  :".$banknotas2."<br>";
    echo "1  :".$banknotas1."<br>";
    
    


   ?> 
</body>
</html>