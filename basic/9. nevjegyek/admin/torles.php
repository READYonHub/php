<?php

/*kiirja a rakatintott elem id-jat
print_r($_GET);
Array ( [id] => 11 )*/

if (isset($_GET["id"])) {
    require("../kapcsolat.php");
    //csak szamot engedunk be tipuskenyszeritessel, hogy ne kapjunk semmilyen varatlan esemenyt
    $id = (int)$_GET["id"];
    $sql = "DELETE FROM nevjegyek
            WHERE id = {$id}             
            ";
    mysqli_query($dbconn, $sql);
}
header("Location: lista.php");
