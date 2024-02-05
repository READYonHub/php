<?php
print_r($_POST);
print_r($_FILES);

/*Array
(
    [rendben] => Feltöltés
)
Array
(
    [fajl] => Array //fajl az azonositoja
        (
            [name] => 1703953053.jpeg
            [full_path] => 1703953053.jpeg
            [type] => image/jpeg
            [tmp_name] => C:\wamp64\tmp\phpCD01.tmp
            [error] => 0
            [size] => 125384
        )

) */

if (isset($_POST["rendben"])) {
    $kimenet = "<h3>Feltoltott fajl adatai:</h3>
    <ul>
        <li>Fajlnev: {$_FILES['fajl']['name']}</li>
        <li>Ideiglenes nev:{$_FILES['fajl']['tmp_name']}</li>
        <li>HibaKod: {$_FILES['fajl']['error']}</li>
        <li>Fajlmeret: {$_FILES['fajl']['size']} bytes</li>
        <li>Fajltipus: {$_FILES['fajl']['type']}</li>
    </ul>";
}
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fájlfeltöltés</title>
</head>

<body>
    <h1>Fájlfeltöltés</h1>
    <!--
    ez határozza meg, hogy az űrlapadatokat hogyan kell kódolni, amikor elküldik a szervernek.
    -->
    <form method="post" action="" enctype="multipart/form-data">
        <?php if(isset($kimenet)) print $kimenet; ?>
        <input type="file" id="fajl" name="fajl">
        <input type="submit" id="rendben" name="rendben" value="Feltöltés">
    </form>
</body>

</html>