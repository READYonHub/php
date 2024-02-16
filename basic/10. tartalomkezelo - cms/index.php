<?php
require_once('adabazis.php');

/*-------------------- Menu osszeallitasa */
$sql = "SELECT id, allias, menunev
        FROM cms_tartalom
        WHERE statusz = 1
        ORDER BY sorrend ASC";

$eredmeny = mysqli_query($dbconn, $sql);

$menu = "<ul>\n";
while ($sor = mysqli_fetch_assoc($eredmeny)) {
        $menu  .= "<li><a href=\"index.php?id={$sor['id']}\">{$sor['menunev']}</a></li>\n";
}
$menu .= "</ul>\n";

/*-------------------- tartalom elkeszitese */
$id = (isset($_GET['id'])) ? $_GET['id'] : 1;
$sql = "SELECT menunev, tartalom, letrehozas, modositas, leiras, kulcsszavak
        FROM cms_tartalom 
        WHERE id = {$id}
        LIMIT 1 ";

$eredmeny = mysqli_query($dbconn, $sql);

/* Érvényes tartalom */
if (mysqli_num_rows($eredmeny) == 1) {
        $sor = mysqli_fetch_assoc($eredmeny);
        $leiras         = $sor['leiras'];
        $kulcsszavak    = $sor['kulcsszavak'];
        $menunev        = $sor['menunev'];
        $tartalom       = $sor['tartalom'];
        $letrehozas     = $sor['letrehozas'];
}
/* Az oldal nem található */ else {
        $leiras                 = "";
        $kulcsszavak            = "";
        $menunev                = "Hiba";
        $tartalom               = "<p><em>A keresett oldal nem találtahtó...</em></p>";
        $letrehozas             =  date("Y-m-d H:i:s");
}

/* Modulok kezelése */
$oldalsav = "";

$sablon = file_get_contents("sablon.html");
$sablon = str_replace("{{menu}}",           $menu,              $sablon);
$sablon = str_replace("{{menunev}}",        $menunev,           $sablon);
$sablon = str_replace("{{tartalom}}",       $tartalom,          $sablon);
$sablon = str_replace("{{letrehozas}}",     $letrehozas,          $sablon);
$sablon = str_replace("{{oldalsav}}",       $oldalsav,          $sablon);
$sablon = str_replace("{{leiras}}",         $leiras,            $sablon);
$sablon = str_replace("{{kulcsszavak}}",    $kulcsszavak,       $sablon);

print $sablon;

print_r($dbconn);
mysqli_close($dbconn);
