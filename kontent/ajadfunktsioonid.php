<?php
echo "<h2> ajadfunktsioon </h2>";
echo "<div id = 'kuupaev'>";
echo "Täna on ".date("d.m.Y")."<br>";
date_default_timezone_set("Europe/Tallinn"); // mm.dd.yy

echo " Tänane Tallinna kuupaev ja kellaaeg on".date("d.m.Y G:i", time())."<br>";
echo "date('d.m.Y G:i', time()) ";
echo "<br>";
echo "b - kuupaev 1-31";
echo "<br>";
echo "m- kuu number";
echo "<br>";
echo "y - aasta neljakohane";
echo "<br>";
echo "G - tunniformat 0-23";
echo "<br>";
echo "i - minutid ü-59";
echo "<br>";
?>
<div id="hooaeg">
    <h2>väljasta vastavalt hoojale pilt</h2>
    <?php
    $today = new DateTime();
    echo "täna on ".$today->format('m-d-Y')."<br>";
    $spring = new DateTime('march 20');
    $summer = new DateTime('June 21');
    $fall = new DateTime('September 22');
    $winter = new DateTime('december 22');
    switch (true){
        case $today>=$spring && $today<=$summer:
            echo "kevad";
            $pildi_address = 'kontent/image/fall.jpg';
            break;
        case $today>=$summer && $today<=$fall :
            echo "suvi";
            $pildi_address = 'kontent/image/sddefault.jpg';
            break;
        case $today>=$fall&& $today<=$winter:
            echo "sügis";
            $pildi_address = 'kontent/image/spring.jpg';
            break;
        case $today>=$winter && $today<=$fall:
            echo "talv";
            $pildi_address = 'kontent/image/winter.jpg';
            break;



    }


    ?>
    <img src="<?=$pildi_address?>" alt="hooja">
</div>
<div id="koolivahead">
    <h2>mitu päeva on koolivaheajani 23.12.2024</h2>
    <?php
    $kdate = date_create_from_format('d.m.Y', '23.12.2024');
    $date = date_create();
    $diff = date_diff($kdate, $date);
    echo "jääb ".$diff->format("%a")."päeva";
    echo "<br>";
    echo "jääb ".$diff->days." päeva";
    $myBirthday = date_create_from_format('d.m.Y', '02.10.2025');
    $diff2 = date_diff($myBirthday, $date);
    echo "<br>";
    echo "minu sünipaäev ".$diff2->days." päeva";
    ?>

</div>
<div id="vanus">
    <h2>Kasutaja vanuse leidmine</h2>
    <form method="post" action="">
        sisesta oma sünnipäeva
        <input type="date" name="synd" placeholder="dd.mm.yyyy">
        <input type="submit" value="OK">
    </form>
    <?php
    if (isset($_POST["synd"]))
    {
        if(empty($_POST["synd"]))
        {
            echo "sisesta oma sünnipäeva kuupaev";
        }
        else {
            $sdate = date_create( $_POST["synd"]);
            $date = date_create();
            $diff = date_diff($sdate, $date);
            echo "sa oled ".$diff->format("%y")." aastat vana";
        }
    }
    ?>
</div>
<div>
    <h2>Massiv</h2> <br>
    <?php
    $kuud = [1=>"jaanuar", "veebruar","marts","april", "mai", "juuni", "juuli","august","september","oktoober","november","december"];
    $paev = date('d');
    $year = date('Y');
    $kuu = date('d').' '.$kuud[date('n')].' '.date('Y');
    echo $kuu
    ?>
</div>