<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$color ="white";
if(isset($_POST["color"])){
$color = $_POST["color"];
}
?>
<body <?php echo 'style="background-color:'.$color.'"'; ?>>
    <h1>Spalvos Pasirinkimas</h1>
    <form method="post" action="index.php">

        <button type="submit" name="color" value="red">Raudona</button>
        <button type="submit" name="color" value="black">Juoda</button>
        <button type="submit" name="color" value="blue">Mėlyna</button>
    </form>
    <?php
        
    ?>
</body>
</html>