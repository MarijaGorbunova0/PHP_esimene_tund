<?php
$Opilased = simplexml_load_file("OpilasteAndmed.xml");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="OpilasteStyle.css">
    <title>Opilased</title>
    <link rel="stylesheet" href="">
</head>
<body>
<h2>Õpilased</h2>
<form method="post" action="?">
    <label for="otsing">Otsing: </label>
    <input type="text" id="otsing" name="otsing" placeholder="Õpilane">
    <input type="submit" value="OK">
    <br>
</form>
<div id="buttons">
    <label for="naine">naised</label>
    <input type="checkbox" id="naine"  onchange="filterByGender()">
    <label for="naine">mehed</label>
    <input type="checkbox" id="mees"  onchange="filterByGender()">
</div>

<table>
<tr>
    <?php
    $index = 0;
    foreach ($Opilased->opilane as $opilane) {
        if ($index % 5 == 0) {
            echo "<tr>";
        }
        $genderClass = ($opilane->sugu == "naine") ? 'naised' : 'mehed';

        echo "<td><div id='[$index]' class='$genderClass'>"
            . $opilane->nimi . "<br>"
            . "<a href='" . $opilane->site . "' target='_blank'>site</a>"
            . "</div></td>";
        $index++;
        if ($opilane->sugu == "naine"){
           echo "<div class='naised'>";
        }
        else {
            echo "<div class='mehed'>";
        }

        if ($index % 5 == 0) {
            echo "</tr>";
        }
    }
    if ($index % 5 != 0) {
        echo "</tr>";

    }
    ?>

</tr>
</table>
<script src="OpilaneScript.js"></script>
</body>
</html>