<?php
$login = $_POST["login"];
$password = $_POST["password"];
if((!strcasecmp($login,"Rick"))&&($password == "Astley")){
    header("Location: /RenkuosiProgramuoti/003%20Paskaita-Užduotis/3/manopaskyra.php");
    //exit();
}else{
    header("Location: /RenkuosiProgramuoti/003%20Paskaita-Užduotis/3/404.php");
}
?>