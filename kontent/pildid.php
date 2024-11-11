<h2>PHP - töö pildifailidega</h2>
<a href="https://www.metshein.com/unit/php-pildifailidega-ulesanne-14/">töö</a>
<form method="post" action="">
    <select name="pildid">
        <option value="">Vali pilt</option>
        <?php
        $kataloog = 'kontent/pildid';
        $asukoht = opendir($kataloog);
        while ($rida = readdir($asukoht)) {
            if ($rida != '.' && $rida != '..') {
                echo "<option value='$rida'>$rida</option>\n";
            }
        }
        closedir($asukoht);
        ?>
    </select>
    <input type="submit" value="Vaata">
    <input name="random" type="submit" value="random">
</form>

<div>
    <?php
    if (!empty($_POST['pildid'])) {
        drawpicture([$_POST['pildid']]);
    } else if (!empty($_POST['random'])) {
        $kataloog = 'kontent/pildid';
        $pildid = scandir($kataloog);
        $pildid = array_diff($pildid, array('.', '..'));
        $randomPilt = $pildid[array_rand($pildid)];
        drawpicture([$randomPilt]);
    }

    function drawpicture(array $pildid) { // funktsion mis näitab pildi
        foreach ($pildid as $pilt) {
            $pildi_aadress = 'kontent/pildid/' . $pilt;
            $pildi_andmed = getimagesize($pildi_aadress);

            $laius = $pildi_andmed[0];
            $korgus = $pildi_andmed[1];
            $formaat = $pildi_andmed[2];
            $max_laius = 120;
            $max_korgus = 90;

            if ($laius <= $max_laius && $korgus <= $max_korgus) {
                $ratio = 1;
            } elseif ($laius > $korgus) {
                $ratio = $max_laius / $laius;
            } else {
                $ratio = $max_korgus / $korgus;
            }

            $pisi_laius = round($laius * $ratio);
            $pisi_korgus = round($korgus * $ratio);


            echo '<h3>Originaal pildi andmed</h3>';
            echo "Laius: $laius<br>";
            echo "Kõrgus: $korgus<br>";
            echo "Formaat: $formaat<br>";

            echo '<h3>Uue pildi andmed</h3>';
            echo "Arvutamse suhe: $ratio <br>";
            echo "Laius: $pisi_laius<br>";
            echo "Kõrgus: $pisi_korgus<br>";
            echo "<img width='$pisi_laius' src='$pildi_aadress'><br>";
        }
    }
    ?>
</div>
