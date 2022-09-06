<?php 
    include_once("app/inc/functions.php");
    $Date = new SDate;
    $spring_year = $Date->jdate("f") ."  ". $Date->jdate("Y");

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
    <h1>سلام گیتــهاب</h1>

    <h1>
        <?php
            echo $spring_year;
        ?>
    </h1>
    <h1 id="clock_text">در حال بارگذاری</h1>


    <script>
        setInterval(function () {
            var today = new Date();
            let time = today.getHours() + " : " + today.getMinutes() + " : " + today.getSeconds();
            document.getElementById("clock_text").innerText = time;
        }, 1000); 
     </script>

</body>

</html>
