<?php
require ('conf.php');
global $yhendus;

if (isset($_REQUEST['nimi']) && !empty($_REQUEST['nimi'])) {
    $paring = $yhendus->prepare("INSERT INTO matka(nimi, telefon, synniaeg, pilt) VAlUES(?,?,?,?)");
    // s - string i -integer
    $paring->bind_param("ssss", $_REQUEST['nimi'],$_REQUEST['telefon'], $_REQUEST['synniaeg'],$_REQUEST['pilt']);
    $paring->execute();

}
if (isset($_REQUEST["kustuta"])){
    $kask = $yhendus->prepare("DELETE FROM matka WHERE id=?");
    $kask -> bind_param("i", $_REQUEST["kustuta"]);
    $kask->execute();
}
$paring = $yhendus->prepare("SELECT id,nimi, telefon,synniaeg, pilt FROM matka");
$paring->bind_result($id,$nimi, $telefon,$synniaeg, $pilt);
$paring->execute();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="AndmebaasiStyle.css">
</head>
<body>
<h1>Teie tabel</h1>
<table>
    <tr>
        <th></th>
        <th>id</th>
        <th>nimi</th>
        <th>telefon</th>
        <th>synniaeg</th>
        <th>pilt</th>
        <th>vanus</th>
    </tr>
    <?php
    while ($paring->fetch()) {
        $dob = new DateTime($synniaeg);
        $now = new DateTime();
        $age = $now->diff($dob)->y;
        echo "<tr>";
        echo "<td> <a href='?kustuta=$id'>kustuta</a>";
        echo "<td>".$id."</td>";
        echo"<td>".htmlspecialchars($nimi)."</td>";

        echo "<td>".htmlspecialchars($telefon)."</td>";
        echo "<td>".htmlspecialchars($synniaeg)."</td>";
        echo "<td><img src='$pilt' alt='pilt'></td>";
        echo "<td>".htmlspecialchars($age)."</td>";
        echo "</tr>";
    }
    ?>
</table>
<h2>Uee inimese lisamine</h2>
<form action="?" method="post">
    <label for="nimi">nimi</label>
    <input type="text" id="nimi" name="nimi">
    <br>
    <label for="telefon">telefon</label>
    <input type="text" id="telefon" name="telefon">
    <br>
    <label for="synniaeg">synniaeg</label>
    <input type="date" id="synniaeg" name="synniaeg">
    <br>
    <label for="pilt">Pilt</label><br>
    <textarea name="pilt" id="pilt" cols="30" rows="10"></textarea>
    <br>
    <input type="submit" value="OK">
</form>
<a href="https://marijagorbunova23.thkit.ee/wp/?page_id=1587" id="silkawp">Konspekt Wordpressis</a>
</body>
</html>
<?php
