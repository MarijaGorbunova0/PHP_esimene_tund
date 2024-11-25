<?php
$kasutaja = "marija";
$parool = "123456";
$andmebaas = "marija";
$servernimi = "localhost";

$yhendus = new mysqli($servernimi,$kasutaja, $parool, $andmebaas);
$yhendus->set_charset("utf8");
