<?php
  $kimenet = "<table style=\"border: solid 2px black\">\n";
    for ($sor = 1; $sor<=10;$sor++){
      $kimenet.="<tr>\n";
      for($oszlop=1;$oszlop<=10;$oszlop++){
        $kimenet.= "<td>\t".($sor*$oszlop)."\t</td>\n";
      }
      $kimenet.="</tr>\n";
    }
    $kimenet .= "</table>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
		<?php print $kimenet?>
</body>

</html>
