<!-- 
//Skaitiklis - kiekiena karta apsilankius puslapyje prie kintamojo i prideti 1
 -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOKIES</title>
 </head>
 <body>
    <?php 

        //GET - perduodami duomenys yra matomi URL'e
        //POST - perduodami reiksme i serveri, bet jie nera matomi URL'e

        //COOKIES - tai yra mazas tekstinis failas saugomos narsykles atmintyje, 
        //kuriame saugomi duomenis iki failo istrynimo arba jo galiojimo laiko pabaigos
        // saugome NESVARBIA informacija(slaptazodziai, vartotoju vardai, el. pastai ir t.t.)

        //tekstine(string)
        //skaicius(int arba float)

        //NEGALI masyvas/objektas !!!!
        //time() dabartinis laikas sekundemis nuo 1970
        //sausainuko nustatymas

        //sausaini nustatyti tik tada
        //1. tada kai jis neegzistuoja
        //2. kai jo reiksme pasikeicia
        //setcookie("skaitiklis", 150,time()+3*3600);

        //cookie trynimas
        //1h atgal
        // setcookie("skaitiklis", "", time() - 3600);
        
       
        //sausainuko paemimas
       // echo $_COOKIE["skaitiklis"];

        //Kazkur laikinai pasideti i reiksme
        if(!isset($_COOKIE["skaitiklis"])) {
            setcookie("skaitiklis", 0,time()+3*3600);
            $i = 0;
        } else {
            $i = $_COOKIE["skaitiklis"];
            $i++;
            setcookie("skaitiklis", $i,time()+3*3600);
        }


         echo $i;

        //suskaiciuojamas, t.y. kiekvienas elementas turi savo numeri
         $array = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
         
         //asociatyvus masyvas

         $asoc_masyvas = array(
            "a" => "apple",
            "b" => "banana",
            "c" => "carrot",
            "d" => "dog"
         );
         
         if(!isset($_COOKIE["abecele"])) {
            //implode() - sudeda masyvo elementus i viena teksta pagal norima simboli
            // $array = implode(",", $asoc_masyvas);//tekstu

            //asociatyvu masyva i teksta
            //json_encode

            //JSON - JavaScript Object Notation
            //javascript objektu masyvas

            $asoc_masyvas = json_encode($asoc_masyvas);
            setcookie("abecele", $asoc_masyvas, time()+24*3600);
         }


         $asoc_masyvas = $_COOKIE["abecele"];
        $asoc_masyvas = json_decode($asoc_masyvas, true);

        var_dump( $asoc_masyvas);
    
    ?>
 </body>
 </html>