<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagrindinis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">
        <?php if(isset($_COOKIE["FailedLoginStatus"])){
                    $_SESSION["zinute"] = "Palaukite kol vėl galesite prisijungti";
                    $_SESSION["zinutes_stilius"] = "alert-danger";
        }
        ?>

        <?php if(isset($_SESSION["zinute"])) { ?>
            <div class="alert <?php echo $_SESSION["zinutes_stilius"]; ?>">
                <p><?php echo $_SESSION["zinute"]; ?></p>
            </div>
            <?php 
            unset($_SESSION["zinute"]); 
            unset($_SESSION["zinutes_stilius"]);
            ?>
        <?php } ?>
        <!-- if jeigu sausainis egzistuoja - forma paslepta, jei ne - forma matoma -->
        <form method="post" <?php if(isset($_COOKIE["FailedLoginStatus"])){
        echo $_COOKIE["FailedLoginStatus"];}
        ?> action="index.php">
            <input class="form-control" name="vardas" type="text" placeholder="Vardas">
            <input class="form-control" type="password" name="slaptazodis" placeholder="Slaptazodis">
            <button class="btn btn-primary" type="submit" name="prisijungti">Prisijungti</button>
        </form>    

    </div>
   

    <?php 
    //tikriname ar mygtukas paspaustas
    if(isset($_POST["prisijungti"])) {
        $vardas = $_POST["vardas"];
        $slaptazodis = $_POST["slaptazodis"];

        // geras vardas ir geras slaptazods
        $gVardas = "admin";
        $gSlaptazodis = "123";
        // 1 - admin
        // 2 - vartotojas
        // 3 - moderatorius
        // 4 - klientas

        if($vardas == $gVardas && $slaptazodis == $gSlaptazodis) {
            $_SESSION["arPrisijunges"] = 1;
            $_SESSION["vardas"] = $vardas;
            setcookie("FailedLogin","1",time()-1);
            header("Location: manopaskyra.php");
        } else {
            //zinute turi buti raudona
            //ir kitoks tekstas
            //Sesijos skaitiklis
            // Sesijos skaitiklis $_SESSION["skaitiklis"]++
            //$_SESSION["skaitiklis"] == 3
            //susikurti sausainiukas kuris galiotu 60sec

            $_SESSION["zinute"] = "Neteisingi prisijungimo duomenys";
            $_SESSION["zinutes_stilius"] = "alert-danger";
            if(!isset($_COOKIE["FailedLogin"])){
                //$_SESSION["FailedLogin"] = 1;
                setcookie("FailedLogin","1",time()+3600);
                //$_SESSION["zinute"] = "Neteisingi prisijungimo duomenys FAIL LOGIN 1";
            }else{

                //$FailedLogin = $_SESSION["FailedLogin"];
                $FailedLogin = $_COOKIE["FailedLogin"];
                $FailedLogin++;
                //$_SESSION["FailedLogin"] = $FailedLogin;
                setcookie("FailedLogin",$FailedLogin,time()+3600);
                if($FailedLogin >= 3){
                    //$_SESSION["FailedLoginTime"]= time();
                    //$_SESSION["FailedLoginStatus"] = "hidden";
                    setcookie("FailedLoginStatus","hidden",time()+60);
                }
                
                
            }
            

            header("Location: index.php");
        }

    }
    
    ?>

</body>
</html>