<?php
require("../kapcsolat.php"); //ha nincs itt akkor hibat dob és megáll a fordítása

$kifejezes = (isset($_POST['kifejezes'])) ? $_POST['kifejezes'] : "";

$sql = "SELECT *
        FROM nevjegyek
        WHERE (
            nev LIKE '%{$kifejezes}%'
            OR cegnev LIKE '%{$kifejezes}%'
            OR mobil LIKE '%{$kifejezes}%'
            OR email LIKE '%{$kifejezes}%'
        )
        ORDER BY nev ASC";

$eredmeny = mysqli_query($dbconn, $sql);

$kimenet = "<table>";

$kimenet .= "
    <tr>    
            <th>Név</th>
            <th>Cégnév</th>
            <th>Mobil</th>
            <th>E-mail</th>
    </tr>
";

//táblázat tartalma
while ($sor = mysqli_fetch_assoc($eredmeny)) {

    $kimenet .= "<tr>
        <td>{$sor['nev']}</td>
        <td>{$sor['cegnev']}</td>
        <td>{$sor['mobil']}</td>
        <td>{$sor['email']}</td>
    </tr>";
}
$kimenet .= "</table>";
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

    <form method="post" action="">
        <!--beviteli mezo, a search egy kereso mezo ami egyreszt enterrel aktivalhato
        masreszt sematinkukan jelzi, hogy ez keresomezo ez a html5-ben jott be
        azok a bongeszok amik ezt nem ismerik azok text tipusuru butitja vissza es ugyanugy hasznalhato lesz
    -->
        <input type="search" id="kifejezes" name="kifejezes">
    </form>
    <p><a href="felvitel.php">Új névjegy</a></p>
    <?php print $kimenet; ?>
    <p><a href="felvitel.php">Új névjegy</a></p>
</body>

</html>