<?php
require ('conf.php');
global $yhendus;
if (isset($_REQUEST["kustuta"])){
    $kask = $yhendus->prepare("DELETE FROM loomad WHERE id=?");
    $kask -> bind_param("i", $_REQUEST["kustuta"]);
    $kask->execute();
    if (isset($_REQUEST['uusloom']) && !empty($_REQUEST['loomanimi'])) {
        $paring = $yhendus->prepare("INSERT INTO loomad(loomanimi, omanik, varv, pilt) VAlUES(?,?,?,?)");
        // s - string i -integer
        $paring->bind_param("ssss", $_REQUEST['loomanimi'],$_REQUEST['omanik'], $_REQUEST['varv'],$_REQUEST['pilt']);
        $paring->execute();

    }
}
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
<h1>Loomad 1 kaupa</h1>
<div id="all">
<div id="meny">
<ul>
    <?php

    //loomade nimed andmebaasist
    $paring = $yhendus->prepare("SELECT id,loomanimi, omanik, varv, pilt FROM loomad");
    $paring->bind_result($id, $loomanimi, $omanik, $varv, $pilt);
    $paring->execute();

    while($paring->fetch()){
        echo "<li><a  href='?looma_id=$id'>$loomanimi</a></li>";
    }
    ?>
</ul>
    LISA...
    <?php
    echo "<a href='?lisamine=jah'>Lisa loom</a>"
    ?>
</div>
<div id="sisu">
    <?php
    //kui klik looma nimele siis näitame looma info
    if(isset($_REQUEST["looma_id"])){
        $paring = $yhendus->prepare("SELECT id,loomanimi,omanik, varv, pilt FROM loomad WHERE id=?");
        $paring->bind_param("i", $_REQUEST["looma_id"]);
        $paring->bind_result($id, $loomanimi, $omanik, $varv, $pilt);
        $paring->execute();
        //näitame ühe kaupa
        if($paring->fetch()){
            echo "<div style='background:$varv'>Loomanimi: ".$loomanimi;
            echo "<br>Tõug: ".$varv;
            echo "<br><img src='$pilt' width='100px' alt='Pilt'>";
            echo "<br>Omanik: ".$omanik;
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
        <form action="?" method="post">
            <input type="hidden" value="jah" name="uusloom">
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
    <?php
    }
    ?>


</body>
</html>