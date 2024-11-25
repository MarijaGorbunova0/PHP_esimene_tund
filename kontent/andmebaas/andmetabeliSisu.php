<?php
require ('conf.php');

//sisu
global $yhendus;
$paring = $yhendus->prepare("SELECT id,loomanimi, omanik, varv, pilt FROM loomad");
$paring->bind_result($id, $loomanimi, $omanik, $varv, $pilt);
$paring->execute();
?>

<!doctype html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabeli sisu mida võetakse andmebaasist</title>
    <link rel="stylesheet" href="AndmebaasiStyle.css">
</head>
<body>
<h1>Loomad andmebaasist</h1>
<table border="1px">
    <tr>
        <th>id</th>
        <th>loomanimi</th>
        <th>omanik</th>
        <th>varv</th>
        <th>loomapilt</th>
    </tr>
    <?php
    while ($paring->fetch()) {
        echo "<tr>";
        echo "<td>".$id."</td>";
        echo"<td bgcolor='$varv'>".htmlspecialchars($loomanimi)."</td>";

        echo "<td>".htmlspecialchars($omanik)."</td>";
        echo "<td>".htmlspecialchars($varv)."</td>";
        echo "<td><img src='$pilt' alt='pilt'></td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
<?php
$yhendus->close();
?>