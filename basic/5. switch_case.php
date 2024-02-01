<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
    //$het_napja = 9;
	$het_napja = 1;
  
  switch($het_napja)
  {
  	case 1: $nap ="Hétfő";break;
  	case 2: $nap ="Kedd";break;
  	case 3: $nap ="Szerda";break;
  	case 4: $nap ="Csütörtök";break;
  	case 5: $nap ="Péntek";break;
  	case 6: $nap ="Szombat";break;
  	case 7: $nap ="Vasárnap";break;
    //ha egyik sem teljesül
    default: $nap = "Nincs ilyen nap";
  }
  print $nap;
?>
</body>

</html>
