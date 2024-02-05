<?php
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

    //változók tísztitása

    if (empty($nev))                            $hiba[] = "Nem adtál meg nevet!";
    //strlen string hossz
    elseif (strlen($nev) < 5)                   $hiba[] = "Rossz nevet adtál!";

    if (!empty($mobil)  && strlen($mobil) < 9)  $hiba[] = "Rossz mobil számot adtál meg!";

    //a filter_var megvizsgálja az email-t és a php beépített szintaktikai ellenőrzése FILTER_VALIDATE_EMAIL
    if (!empty($mobil) && !filter_var($email, FILTER_VALIDATE_EMAIL))
        $hiba[] = "Rossz e-mail címet adtál meg!";





    //adatbazisba betöltés
    require("../kapcsolat.php");
    $sql = "INSERT INTO nevjegyek
        (nev, cegnev, mobil, email)
        VALUES 
        ('{$nev}', '{$cegnev}', '{$mobil}', '{$email}');";
    mysqli_query($dbconn, $sql);
    header("Location: lista.php");

    exit();
}





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
        <p>
            <label for="nev">Név*: </label><br>
            <!-- required kötelezően kéri hogy tölsd ki amezőt-->
            <input type="text" id="nev" name="nev" required>
        </p>
        <p>
            <label for="cegnev">Cégnév: </label><br>
            <input type="text" id="cegnev" name="cegnev">
        </p>
        <p>
            <label for="mobil">Mobil: </label><br>
            <input type="tel" id="mobil" name="mobil">
        </p>
        <p>
            <label for="email">Email: </label><br>
            <input type="email" id="email" name="email">
        </p>
        <p><em>A *-gal jelölt mezők kitöltése kötelező!</em></p>
        <input type="submit" id="rendben" name="rendben" value="Rendben">
        <!--a kezdeti üres állapotra állítja vissza az ürlapot-->
        <input type="reset" value="Mégse">
        <p><a href="lista.php">Vissza a névjegyekhez</a></p>
    </form>
</body>

</html>