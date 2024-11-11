<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php tunnitööd</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include('header.php')
?>
<section>
    <?php
    // navigeerimisemenüü
    include('nav.php');
    ?>
</section>
<seciton>
    <?php
    if(isset($_GET['leht'])){
        include('kontent/'.$_GET['leht']);
    }
    else{
        echo "Tere tulemas";
    }
    ?>
</seciton>
<?php
    echo "Masha";
    echo "<br>";
    echo date('Y');
?>
</body>
</html>
