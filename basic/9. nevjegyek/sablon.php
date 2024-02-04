<?php
//include("kapcsolat.php"); - ez olyan mintha az egesz fajl ide atmasolnam
//include("kapcsolat.php");//ha megsincs eg a fajl akkor csak egy hiba uzenetet kapok es tovabb megjeleniti amit megtud, ezt tudom @/operatorral kezelni, igy letiltja a hiba uzeneteket
//require("kapcsolat");//-ha nincs meg a fajl akkor nem jelenit meg semmit csak hibauzenetet
//@require("kapcsolat.php");//-ha nincs meg a fajl akkor nem jelenit meg semmit
require("kapcsolat.php"); //biztosítja, hogy a fájl csak egyszer kerüljön beillesztésre, még akkor is, ha többször hivatkoznak rá.

/*
$sql = "SELECT * FROM nevjegyek 
        ORDER BY nev"; //||DESC csokkeno sorrend || novekvo
*/
$kifejezes = "";

//ha letezik (isset) az urlapban atadott ertek akkor ? utan irja ki azt, ha nem akkor ures ertek ""
$kifejezes = (isset($_POST['kifejezes'])) ? $_POST['kifejezes'] : "";
//tehat van egy default ertekem hogy ne irjon ki hibat

$sql = "SELECT *
        FROM nevjegyek
        WHERE (
            nev LIKE '%{$kifejezes}%' 
            OR cegnev LIKE '%{$kifejezes}%' 
            OR mobil LIKE '%{$kifejezes}%' 
            OR email LIKE '%{$kifejezes}%' 
        )
        ORDER BY nev ASC"; 
        //||DESC csokkeno sorrend || novekvo

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

while ($sor = mysqli_fetch_assoc($eredmeny)) {

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

//-----------Urlap

///print_r ($_POST);
//Array ( )
//ha beirok valamit a kereso mezobe
//Array ( [kifejezes] => Hey Bober )

//print $_POST;
//ha ezt igy lefuttatom akkor : Warning: Array to string conversion
//mert kezdetben nincs erteke, csak ha az urlapnak van atadott erteke
//akkor azt enter utan visszaadja






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
     <!--ket fajta method van a post es a get, a post lathatatlanul kuldi az adatokat (a http protokol torzseben helyezkedik el)
      a get meg nem (latszik az url-ben is es a fejlecben fog atadodni )
    az action at adja az adott fajnak az adatokat
    mivel ures az action ujra hivja sajat magat es ujra lefut
    -->

    <form method="post" action="" >
        <!--beviteli mezo, a search egy kereso mezo ami egyreszt enterrel aktivalhato
        masreszt sematinkukan jelzi, hogy ez keresomezo ez a html5-ben jott be
        azok a bongeszok amik ezt nem ismerik azok text tipusuru butitja vissza es ugyanugy hasznalhato lesz
    -->
        <input type="search" id="kifejezes" name="kifejezes">
    </form>
    <?php print $kimenet; ?>
</body>

</html>