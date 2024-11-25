<?php
$autod = simplexml_load_file("autod.xml");
// otsingu funktiopn
function otsiingAutonubriJargi($paring)
{
    global $autod;
    $paringVastus =array();
    foreach ($autod->auto as $auto) {
        if (substr(strtolower($auto->autonumber), 0, strlen($paring)) == strtolower($paring)) {
            array_push($paringVastus, $auto);
        }
    }
    return $paringVastus;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        th, td {
            text-align: center;
            padding: 16px;
        }
       #all{
           margin-left: 40%;
       }

    </style>
    <title>Autode</title>
<body>
<div id="all">


<h2>Autode andmed xml failist</h2>

<div>
    Esimene auto andmed:
    <?php
    echo $autod->auto[0]->mark;
    echo ", ".$autod->auto[0]->autonumber;
    echo ", ".$autod->auto[0]->omanik;
    echo ", ".$autod->auto[0]->v_aasta;
    ?>

</div>

<form method="post" action="?">
    <label for="otsing">Otsing: </label>
    <input type="text" id="otsing" name="otsing" placeholder="autonumber">
    <input type="submit" value="OK">
    <br>
</form>
<?php
if(!empty($_POST['otsing'])){
    $paringVastus = otsiingAutonubriJargi($_POST['otsing']);
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Mark</th>";
    echo "<th>Autonumber</th>";
    echo "<th>Omanik</th>";
    echo "<th>valjastamise aasta</th>";

    foreach($paringVastus as $auto){
        echo "<tr>";
        echo "<td>".$auto->mark."</td>";
        echo "<td>".$auto->autonumber."</td>";
        echo "<td>".$auto->omanik."</td>";
        echo "<td>".$auto->v_aasta."</td>";
        echo "</tr>";
    }
}
else{

?>
<table border="1">
    <tr>
        <th>Mark</th>
        <th>Autonumber</th>
        <th>Omanik</th>
        <th>väljastamise aasta</th>
    </tr>
        <?php
        foreach($autod as $auto){
            echo "<tr>";
            echo "<td>".$auto->mark."</td>";
            echo "<td>".$auto->autonumber."</td>";
            echo "<td>".$auto->omanik."</td>";
            echo "<td>".$auto->v_aasta."</td>";
            echo "</tr>";
        }
        ?>
    <br>
</table>
<?php
}
?>
</div>
</body>
</html>

