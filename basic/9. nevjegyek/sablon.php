<?php
//include("kapcsolat.php"); - ez olyan mintha az egesz fajl ide atmasolnam
//include("kapcsolat.php");//ha megsincs eg a fajl akkor csak egy hiba uzenetet kapok es tovabb megjeleniti amit megtud, ezt tudom @/operatorral kezelni, igy letiltja a hiba uzeneteket
//require("kapcsolat");//-ha nincs meg a fajl akkor nem jelenit meg semmit csak hibauzenetet
//@require("kapcsolat.php");//-ha nincs meg a fajl akkor nem jelenit meg semmit
require("kapcsolat.php"); //biztosítja, hogy a fájl csak egyszer kerüljön beillesztésre, még akkor is, ha többször hivatkoznak rá.

$sql = "SELECT * FROM nevjegyek 
        ORDER BY nev"; //||DESC csokkeno sorrend || novekvo
$eredmeny = mysqli_query($dbconn, $sql);

//a fetch azt jelenti, hogy meghatarozhatom, hogy a visszatero adataim az adatbazisbol milyen fajta elrendezesben keszuljenek el
/*$sor = mysqli_fetch_assoc($eredmeny);
print_r($sor);
//Array ( [id] => 1 [nev] => nev-1 [vegnev] => cegnev-1 [mobil] => (70) 123-4567 [email] => nev.cegnev@gmail.com )
print $sor['nev'];
// nev-1

$sor = mysqli_fetch_row($eredmeny);
print_r($sor);
//Array ( [0] => 1 [1] => nev-1 [2] => cegnev-1 [3] => (70) 123-4567 [4] => nev.cegnev@gmail.com )

$sor = mysqli_fetch_array($eredmeny);
print_r($sor);
//Array ( [0] => 1 [1] => nev-1 [2] => cegnev-1 [3] => (70) 123-4567 [4] => nev.cegnev@gmail.com ) Array ( [0] => 2 [id] => 2 [1] => Gipsz Jakab [nev] => Gipsz Jakab [2] => Vodafone [vegnev] => Vodafone [3] => (70) 589-1432 [mobil] => (70) 589-1432 [4] => gipsz.jakab@gmail.com [email] => gipsz.jakab@gmail.com )
*/

$kimenet = "";

while ($sor = mysqli_fetch_assoc($eredmeny)){

$kimenet .= "
<article>
    <h2>{$sor['nev']}</h2>
    <h3>{$sor['cegnev']}</h3>
    <p>Mobil:<a href=\"tel:{$sor['mobil']}\"> {$sor['mobil']}</a></p>
    <p>Email:<a href=\"mailto:{$sor['email']}\"> {$sor['email']}</a></p>
</article>     
";
}
print_r($sor);
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nevjegykartya</title>
    <link rel="stylesheet" href="stilus.css">
</head>

<body>
    <h1>Nevjegykartya</h1>
    <?php print $kimenet; ?>
</body>

</html>