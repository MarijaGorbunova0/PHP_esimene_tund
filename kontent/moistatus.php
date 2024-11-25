<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php tunnitööd</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    echo "Euroopa riig";
    $riig = "Bulgaaria";
    ?>
    <ul>
        <li> Esimene täht:
        <?php
        echo $riig[0];
        ?>
        </li>
        <li> Teksti pikkus:
            <?php
            echo strlen($riig);
            ?>
        </li>
        <li> Viimane täht:
            <?php
            echo $riig[8];
            ?>
        </li>
        <li> lippuvärvid:
            <?php
            echo "valge, roheline, punane";
            ?>
        </li>
        <li> lippuvärvid:
            <?php
            echo "6,43 miljonit";
            ?>
        </li>
        <li> riigi pinidala:
            <?php
            echo "110 994 km²";
            ?>
        </li>
    </ul>
    <div>
        <form method="post" action="">
            sisesta oma sünnipäeva
            <input type="text" name="vastus">
            <input type="submit" value="OK">
        </form>
        <?php

        if (isset($_POST["vastus"]))
        {
            if(empty($_POST["vastus"]))
            {
                echo "sisesta oma vastus";
            }
            else {
                if ($_POST["vastus"] == $riig){
                    echo "Õige!";
                }
                else{
                    echo "Vale";
                }
            }
        }
        echo "<br>";
        highlight_file("moistatus.php");
        ?>
    </div>
</body>