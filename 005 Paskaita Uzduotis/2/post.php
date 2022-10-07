<?php
if(isset($_POST['logout'])){
    echo "SUCESS LOGOUT";
    setcookie("Arprisijunges","0", time()-1, "/");
    header("Location: /RenkuosiProgramuoti/005%20Paskaita%20Uzduotis/2/index.php");
    //exit();
}else{


$login = $_POST["login"];
$password = $_POST["password"];
$cookie_name = "Arprisijunges";
$cookie_value = "0";


if((!strcasecmp($login,"Rick"))&&($password == "Astley")){
    setcookie("Arprisijunges", "1", time() + (86400 * 30), "/");
    header("Location: /RenkuosiProgramuoti/005%20Paskaita%20Uzduotis/2/manopaskyra.php");   
    //exit();
}else{
    
    header("Location: /RenkuosiProgramuoti/005%20Paskaita%20Uzduotis/2/404.php");
    //exit();
}

}
?>