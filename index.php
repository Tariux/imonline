<?php 
    include_once("app/lib/SDate/SDate.php");
    $Date = new SDate;
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="static/images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="static/css/reset.css">
    <link rel="stylesheet" href="static/css/fonts.css">
    <link rel="stylesheet" href="static/css/styles.css">

    <title>ImOnline</title>
</head>
<body>
    <h2>hello from my localhost GitHub!</h2>

    <h1>
        <?php
            echo $Date->getMonthName();
        ?>
    </h1>
</body>
</html>
