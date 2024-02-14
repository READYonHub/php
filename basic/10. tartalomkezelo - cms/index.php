<?php

require_once("adatbazis.php");
$sql = "";

$leiras = "Az oldal pár mondatos leírása...";
$kulcsszavak = "kulcsszó1, kulcsszó2";
$menu = "
            <ul>
                <li><a href=\"#\" class=\"activ\">Bemutatkozás</a></li>
                <li><a href=\"#\">Kedvencek</a></li>
                <li><a href=\"#\">Képgaléria</a></li>
                <li><a href=\"#\">Kapcsolat</a></li>
            </ul>
";

$menunev = "Bemutatkozás";
$tartalom = "<h2>Hello világ</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sollicitudin arcu vitae ex tempor malesuada. Proin consectetur elementum est, non vehicula est hendrerit aliquet. Donec accumsan rutrum consectetur. Nulla tincidunt nisl venenatis augue venenatis, sit amet cursus arcu congue. Donec suscipit vehicula neque. Cras malesuada aliquam lorem, quis semper ex blandit ut. Curabitur ornare eleifend condimentum. Donec molestie ex orci, sed malesuada lectus sagittis et. Ut nec elementum eros. Aliquam vel imperdiet orci. Nunc viverra, nisi nec laoreet lacinia, est mauris ultrices ante, vel posuere nisi magna a elit. Suspendisse gravida arcu eget mauris pulvinar cursus. Ut sed dapibus ligula. Aliquam condimentum vel augue vulputate aliquam. Curabitur at sapien at odio sagittis blandit sed sit amet sapien. In blandit bibendum libero, nec ullamcorper libero imperdiet ut.</p>
                <p>Proin placerat urna id sapien volutpat, sed cursus massa euismod. Suspendisse et nisi commodo, efficitur ante sed, semper felis. Integer eu vulputate nibh, eu malesuada nunc. Integer fermentum nec quam at elementum. Quisque posuere sem non tellus mollis tristique. Etiam nec urna aliquet, porta lectus vehicula, hendrerit elit. Maecenas non felis ac eros luctus placerat. Ut scelerisque augue et finibus porttitor. Vestibulum non molestie tortor.</p>
                <p>Quisque eget vulputate urna. Vestibulum pretium venenatis urna, nec malesuada velit lacinia a. Donec rutrum enim id enim ornare vulputate. Praesent ornare, dui sit amet sodales tincidunt, erat sem pellentesque augue, ac vestibulum neque risus consequat erat. Suspendisse potenti. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam ornare massa sit amet turpis commodo venenatis sed a neque. Vestibulum vitae pretium est, sed sollicitudin ante. Nunc id felis dui. Nam dolor lorem, molestie vitae enim ac, condimentum porta sapien. Curabitur mollis venenatis semper. Vestibulum vestibulum pellentesque lorem vel semper. Mauris purus orci, maximus vitae felis eu, accumsan commodo metus. Nam odio magna, venenatis eget hendrerit tincidunt, aliquam in est. Cras dictum, leo ac lobortis lacinia, neque diam feugiat ex, eget dictum nibh erat a tortor. Maecenas quis ex mi.</p>
";

$oldalsav = "";

$sablon = file_get_contents("sablon.html");
$sablon = str_replace("{{menu}}",           $menu, $sablon);
$sablon = str_replace("{{menunev}}",        $menunev, $sablon);
$sablon = str_replace("{{tartalom}}",       $tartalom, $sablon);
$sablon = str_replace("{{oldalsav}}",       $oldalsav, $sablon);
$sablon = str_replace("{{leiras}}",         $leiras, $sablon);
$sablon = str_replace("{{kulcsszavak}}",    $kulcsszavak, $sablon);


print $sablon;
