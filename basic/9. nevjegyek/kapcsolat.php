<?php
/*
//elavult ne hasznaljuk
//@mysql_connect("localhost","root","") or die("Hiba 1");
@mysqli_connect("localhost","root","") or die(mysql_error);//hibat ir ki szoveget
//@mysql_connect("localhost","root",""); @/ operator letiltja a megjeleno uzeteket
//@mysql_select_db("kezdo") or die("Hiba 2");;
@mysqli_select_db("kezdo") or die(mysqli_errno());//hibanak a sorat irja ki
@mysql_query("SET NAMES utf8");
*/
header("Content-Type: text/html; charset=tf-8"); //php-t tajekoztatom hogy ezt a charsetet akarom hasznalni, amikor nincs kimenetem vagy nem szeretnek html kodot 
//konstanstok
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "kezdo");


$dbconn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME) or die("Hiba az adatbazis csatlakoztataskor");
mysqli_query($dbconn, "SET NAMES utf8");
