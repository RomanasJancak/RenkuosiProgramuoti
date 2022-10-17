<?php session_start();

if(isset($_SESSION["FailedLoginTime"])){
    echo "LOPAS";
  if(time() -  $_SESSION["FailedLoginTime" > 60]){
    $_SESSION["FailedLoginStatus"] = "";
    $_SESSION["FailedLogin"] = 0;
  }else{
    echo '<div class="alert-danger"><p>Palaukite kol vėl galėsite prisijungti</p></div>';
  }
}
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
        <form method="post" <?php if(isset($_SESSION["FailedLoginStatus"])){
        echo $_SESSION["FailedLoginStatus"];}
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
            $_SESSION["FailedLoginStatus"] = "";
            $_SESSION["FailedLogin"] = 0;
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
            if(!isset($_SESSION["FailedLogin"])){
                $_SESSION["FailedLogin"] = 1;
                $_SESSION["zinute"] = "Neteisingi prisijungimo duomenys FAIL LOGIN 1";
            }else{
                $FailedLogin = $_SESSION["FailedLogin"];
                $FailedLogin++;
                if($FailedLogin == 3){
                    $_SESSION["FailedLoginTime"]= time();
                    $_SESSION["FailedLoginStatus"] = "hidden";
                    $_SESSION["FailedLogin"] = $FailedLogin;
                }
                
                
            }
            

            header("Location: index.php");
        }

    }
    
    ?>

</body>
</html>