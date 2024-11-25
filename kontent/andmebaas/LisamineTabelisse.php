<?php
require ('conf.php');
global $yhendus;

if (isset($_REQUEST["kustuta"])){
     $kask = $yhendus->prepare("DELETE FROM loomad WHERE id=?");
     $kask -> bind_param("i", $_REQUEST["kustuta"]);
     $kask->execute();
}
if (isset($_REQUEST['loomanimi']) && !empty($_REQUEST['loomanimi'])) {
    $paring = $yhendus->prepare("INSERT INTO loomad(loomanimi, omanik, varv, pilt) VAlUES(?,?,?,?)");
    // s - string i -integer
    $paring->bind_param("ssss", $_REQUEST['loomanimi'],$_REQUEST['omanik'], $_REQUEST['varv'],$_REQUEST['pilt']);
    $paring->execute();

}

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
        <th></th>
        <th>id</th>
        <th>loomanimi</th>
        <th>omanik</th>
        <th>varv</th>
        <th>loomapilt</th>
    </tr>
    <?php
    while ($paring->fetch()) {
        echo "<tr>";
        echo "<td> <a href='?kustuta=$id'>kustuta</a>";
        echo "<td>".$id."</td>";
        echo"<td bgcolor='$varv'>".htmlspecialchars($loomanimi)."</td>";

        echo "<td>".htmlspecialchars($omanik)."</td>";
        echo "<td>".htmlspecialchars($varv)."</td>";
        echo "<td><img src='$pilt' alt='pilt'></td>";
        echo "</tr>";
    }
    ?>
</table>
<h2>Uee looma lisamine</h2>
<form action="?" method="post">
    <label for="loomanimi">Loomanimi</label>
    <input type="text" id="loomanimi" name="loomanimi">
    <br>
    <label for="varv">varv</label>
    <input type="color" id="varv" name="varv">
    <br>
    <label for="omanik">omanik</label>
    <input type="text" id="omanik" name="omanik">
    <br>
    <label for="pilt">Pilt</label>
    <textarea name="pilt" id="pilt" cols="30" rows="10"></textarea>
    <br>
    <input type="submit" value="OK">
</form>

</body>
</html>
<?php
$yhendus->close();
?>