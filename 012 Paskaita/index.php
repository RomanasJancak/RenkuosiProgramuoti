<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>12 Paskaita</title>
</head>
<body>
    
</body>
</html>
<?php 

class Gyvunas {
    public $spalva = "Geltona";
    public $svoris = "lt";
    public $kojuSkaicius = "4";

    public function begti(){
        echo "begu begu";
    }

}
class Kate extends Gyvunas {
    //savybių ir metodų perrašymas
    public $spalva = "juoda";
    public $svoris = "12kg";

    public function begti(){
        echo "begu greitai";
    }
    public function miegoti(){
        echo "miegu miegu";
    }
}
class Suo extends Gyvunas {
    //savybių ir metodų perrašymas
    public $spalva = "Rudas";
    public $svoris = "15kg";

    public function begti(){
        echo "begu dar greiciau";
    }
    public function miegoti(){
        echo "miegu miegu";
    }
    public function loti(){
        echo "loju";
    }
}

$gyvunas = new Gyvunas();
$gyvunas = new Gyvunas();
$katinas = new Kate();

echo $gyvunas->begti();
echo "<br>";
echo $katinas->begti();

?>