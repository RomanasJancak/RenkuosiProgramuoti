<?php
$cookie_name = "PrisijungimuSkaicius_ManoPaskyra";
$cookie_value = 0;
//echo $cookie_name;
if(!isset($_COOKIE[$cookie_name])){
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    echo "Sausainis sekmingas";
}else{
    $cookie_value = $_COOKIE[$cookie_name]+1;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paskyros Puslapis</title>
</head>
<body>
<h1>Paskyros puslapis</h1>
<?php
if(isset($_COOKIE["Arprisijunges"])){
    echo '<form action="post.php" method="post">';
    echo '<button type="submit" name="logout">Logout</button>';
    echo '</form>';
}    
?>
   
   <!-- <form action="post.php" method="post">
        <button type="submit" name="logout">Logout</button>
    </form> -->
</body>
</html>
