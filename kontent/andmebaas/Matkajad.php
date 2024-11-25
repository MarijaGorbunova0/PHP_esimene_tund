<?php
require ('conf.php');
global $yhendus;
if (isset($_REQUEST["kustuta"])){
    $kask = $yhendus->prepare("DELETE FROM matka WHERE id=?");
    $kask -> bind_param("i", $_REQUEST["kustuta"]);
    $kask->execute();
}
if (isset($_REQUEST['uusinimene']) && !empty($_REQUEST['nimi'])) {
    $paring = $yhendus->prepare("INSERT INTO matka(nimi, telefon, synniaeg, pilt) VAlUES(?,?,?,?)");
    // s - string i -integer
    $paring->bind_param("ssss", $_REQUEST['nimi'],$_REQUEST['telefon'], $_REQUEST['synniaeg'],$_REQUEST['pilt']);
    $paring->execute();

}
?>
<!doctype html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matkajad</title>
    <link rel="stylesheet" href="AndmebaasiStyle.css">
</head>
<body>
<h1>Inimesed matkas</h1>
<div id="all">
    <div id="meny">
        <table>
            <tr>
                <th></th>
                <?php
                $paring = $yhendus->prepare("SELECT id,nimi, telefon,synniaeg, pilt FROM matka");
                $paring->bind_result($id,$nimi, $telefon,$synniaeg, $pilt);
                $paring->execute();

                while ($paring->fetch()) {
                    echo "<td><a href='?inimese_id=$id'><img src='$pilt' alt='pilt'></a></td>";
                }
                ?>
            </tr>
        </table>
        <?php
        echo "<a href='?lisamine=jah'>Lisa inimese</a>"
        ?>
    </div>
<div id="sisu">
    <?php
    //kui klik looma nimele siis näitame looma info
    if(isset($_REQUEST["inimese_id"])){
        $paring = $yhendus->prepare("SELECT id,nimi, telefon,synniaeg, pilt FROM matka WHERE id=?");
        $paring->bind_param("i", $_REQUEST["inimese_id"]);
        $paring->bind_result($id, $nimi, $telefon, $synniaeg, $pilt);
        $paring->execute();
        //näitame ühe kaupa
        if($paring->fetch()){
            echo "<div>nimi: ".$nimi;
            echo "<br>Telefon ".$telefon;
            echo "<br>Omanik: ".$synniaeg;
            echo "<br><img src='$pilt' width='100px' alt='Pilt'>";
            echo "<br><a href='?kustuta=$id' style='color: crimson'>kustuta</a>";
            echo "</div>";
        }
    }
    ?>
</div>
</div>
<?php
if(isset($_REQUEST["lisamine"])){
    ?>
    <form action="?" method="post" id="form2">
        <input type="hidden" value="jah" name="uusinimene">
        <label for="nimi">nimi</label>
        <input type="text" id="nimi" name="nimi">
        <br>
        <label for="telefon">telefon</label>
        <input type="text" id="telefon" name="telefon">
        <br>
        <label for="synniaeg">synniaeg</label>
        <input type="date" id="synniaeg" name="synniaeg">
        <br>
        <label for="pilt">Pilt</label>
        <textarea name="pilt" id="pilt" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="OK">
    </form>

    <?php
}
?>

</body>
</html>
