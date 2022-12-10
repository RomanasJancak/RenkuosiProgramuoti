<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Connection</title>
</head>
<body>
    <?php
try {
    //PHP Namespaces
    //DB - klase, kuri yra karkase ir jungiuosi pagal duomenis kurie yra nurodtti .env faile
    \DB::connection()->getPdo();
    echo 'Connected successfully to: ' . \DB::connection()->getDatabaseName();
} catch (PDOException $e) {
    echo $e->getMessage();
}
    ?>
</body>
</html>