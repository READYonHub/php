<?php
function koszon(){
  print "Jo napot!<br>";  
}

function cimsor($szoveg = "Nem adtal meg cimsort!"){
print "<h1>{$szoveg}</h1>";
}

function negyzetre_emel ($szam){
  return $szam * $szam;
}

koszon();
koszon();
koszon();

cimsor("Ez egy cimsor");
cimsor();

$ertek = negyzetre_emel(5);

print($ertek);
?>
