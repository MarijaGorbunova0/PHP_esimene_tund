<?php
echo "tere hommikust";
echo "<br>";
$muutuja = 'php on skriptikeel';
echo "<strong>";
echo $muutuja;
echo "</strong>";
echo "<h2>Tekstifunktioonid</h2>";
$text = 'eesmaspäev on 4 november';
echo $text;
//kõik tähed on suured
echo "<br>";
echo mb_strtoupper($text); // mb_ teeb täht ä suureks
// kõik tähed on väiksed
echo "<br>";
echo strtolower($text);
// iga sõna algab suure tähega
echo "<br>";
echo ucwords($text);
// teksti pikkus
echo "<br>";
echo "teksti pikkus : ".strlen($text);
echo "<br>";
// eraldame esimese
echo "esimesed 5 tähte - ".substr($text, 0, 5);
echo "<br>";
$otsing = "on";
echo "ON asukoht lauses on".strpos($text, $otsing);
echo "<br>";
//eralda esimene sõna
echo substr($text, strpos($text,$otsing));
echo "<br>";
// eralda esimene sõna kuni otsing
echo substr($text, 0, strpos($text,$otsing));
echo "<br>";
echo "<h2> kasutame veebis kasutavad näited<h2>";
echo str_word_count($text);
// teksti kärpimine
$text2 = '     põhitoetus võitakse ära 11.11';
echo "<br>";
echo "<pre>".trim($text2)."</pre>";
echo trim($text2, "h");
echo '<br>';
// text kui massiv, esimene täht
echo "esimene täht - ".$text[0];
echo '<br>';
// leida kolnas sõna
$sona = str_word_count($text,1);

print_r($sona);
echo "<br>";
echo "kolmas sõna - ".$sona[2];

?>