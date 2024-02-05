<?php
print_r($_POST);
print_r($_FILES);
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
        <input type="file" id="fajl" name="fajl">
        <input type="submit" id="rendben" name="rendben" value="Feltöltés">
    </form>
</body>

</html>