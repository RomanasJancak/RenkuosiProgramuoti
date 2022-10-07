<?php
if(isset($_COOKIE["Arprisijunges"])){
    if($_COOKIE["Arprisijunges"] == 1){
        header("Location: /RenkuosiProgramuoti/005%20Paskaita%20Uzduotis/2/manopaskyra.php");   
        //exit();
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="post.php" method="post">
        <input type="text" name="login" id="">
        <input type="password" name="password" id="">
        <button type="submit" >Login</button>
    </form>
</body>
</html>