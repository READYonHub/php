<?php
require("../kapcsolat.php");
//Űrlap feldolgozása
//a kitoltott inputokat elkuldes (postolás) után,ha létezik, akkor kiirja
if (isset($_POST['rendben'])) {
    print_r($_POST);
    //javitasok, hogy pl. ne vigyenek be szóközöket,
    //crosside scripting pl. <script>alert('Hello')</script> támadási forma, amikor gyakorlatilag bejuttatok valamit a rendszerbe
    //ez egy támadható bevitelmezőt eredményez
    /*
    $nev    = $_POST['nev'];
    $cegnev = $_POST['cegnev'];
    $mobil  = $_POST['mobil'];
    $email  = $_POST['email'];
    */

    //trim() egy karakterlánc függvény, a szövegelőtt és után lévő whiteSpace karakterek (tab, szóköz, enter) levágja
    //van még r_trim() és l_trim()
    //strtolower() kis betűkre alakit strtoupper() nagybetűkre alakít
    //ucwords() a kezdo betuket nagyra alakítja
    //ucfirst() a szoveg elsobetujét alakítja nagy betűvé
    //strip_tags a tiltani lehet karaktereket (pl. <, !, +. nbs;, html entitások), és meglehet admni azokat is mit engedélyezek
    $nev    = strip_tags(ucwords(strtolower(trim($_POST['nev']))));
    $cegnev = strip_tags(trim($_POST['cegnev']));
    $mobil  = strip_tags(trim($_POST['mobil']));
    $email  = strip_tags(strtolower(trim($_POST['email'])));

    /*ez lefut az összes post elemen
    $_POST = array_map('trim', $_POST);
    */

    //változók tísztitása

    if (empty($nev))
        $hibak[] = "Nem adtál meg nevet!";
    //strlen string hossz
    elseif (strlen($nev) < 5)
        $hibak[] = "Rossz nevet adtál!";

    if (!empty($mobil) && strlen($mobil) < 9)
        $hibak[] = "Rossz mobil számot adtál meg!";

    //a filter_var megvizsgálja az email-t és a php beépített szintaktikai ellenőrzése FILTER_VALIDATE_EMAIL
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL))
        $hibak[] = "Rossz e-mail címet adtál meg!";


    //Hibaüzenetek összeállítása
    if (isset($hibak)) {
        $kimenet = "<ul>\n";
        foreach ($hibak as $hiba) {
            $kimenet .= "<li>{$hiba}</li>\n";
        }
        $kimenet .= "</ul>\n";
    } else {

        //adatbazisba betöltés és módosítás
        $id = (int)$_POST['id'];
        $sql = "UPDATE nevjegyek
                SET nev = '{$nev}',
                cegnev = '{$cegnev}',
                mobil = '{$mobil}',
                email = '{$email}'
                WHERE id = {$id}
        ";
        mysqli_query($dbconn, $sql);

        header("Location: lista.php");
    }
}
//Űrlap előzetes kitöltése
else {


    //ha sima modositas.php-ra keresek ra akkor nem fog mukodni, hibat fog vissza dobni, de ha
    // modositas.php?id=1 fajl.php?+tulajdonsag=ertek
    //lekerdezest hajtom végra akkor van vissza terési értékem
    $id = (int)$_GET['id'];

    $sql = "SELECT *
            FROM  nevjegyek
            WHERE id = {$id}
            ";
    $eredmeny = mysqli_query($dbconn, $sql);
    //nincs szükség while ciklusra mert csak egyetlen sorra van szükségem a megjelenitésre amit módosítok
    $sor = mysqli_fetch_assoc($eredmeny);

    $nev     = $sor['nev'];
    $cegnev  = $sor['cegnev'];
    $mobil   = $sor['mobil'];
    $email   = $sor['email'];
}
//Űrlap megjelenítése
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Névjegykártyák</title>
    <link rel="stylesheet" href="stilus.css">

</head>

<body>
    <h1>Névjegykártyák</h1>
    <!--ha ures az action akkor magat ujrahivja es elorol sorrol sorra ujra ertelmezi a bongeszo-->
    <form method="post" action="">
        <?php if (isset($kimenet)) print $kimenet; ?>
        <input type="hidden" id="id" name="id" value="<?php print $id; ?>">
        <p>
            <label for="nev">Név*: </label><br>
            <!-- required kötelezően kéri hogy tölsd ki amezőt-->
            <input type="text" id="nev" name="nev" value="<?php print $nev; ?>">
        </p>
        <p>
            <label for="cegnev">Cégnév: </label><br>
            <input type="text" id="cegnev" name="cegnev" value="<?php print $cegnev; ?>">
        </p>
        <p>
            <label for="mobil">Mobil: </label><br>
            <input type="tel" id="mobil" name="mobil" value="<?php print $mobil; ?>">
        </p>
        <p>
            <label for="email">Email: </label><br>
            <input type="email" id="email" name="email" value="<?php print $email; ?>">
        </p>
        <p><em>A *-gal jelölt mezők kitöltése kötelező!</em></p>
        <input type="submit" id="rendben" name="rendben" value="Rendben">
        <!--a kezdeti üres állapotra állítja vissza az ürlapot-->
        <input type="reset" value="Mégse">
        <p><a href="lista.php">Vissza a névjegyekhez</a></p>
    </form>
</body>

</html>