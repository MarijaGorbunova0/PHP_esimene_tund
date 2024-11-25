<?php
//Zone kasutaja jaoks
$servernimi = "d132029.mysql.zonevs.eu";
$kasutaja = "d132029_marijagorbunova";
$parool = "RomanSandakovLox123";
$andmebaas = "d132029_baasphp";


$yhendus = new mysqli($servernimi,$kasutaja, $parool, $andmebaas);
$yhendus->set_charset("utf8");
