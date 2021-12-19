<?php
require_once ('utilities.php'); // Vaaditaan utilities.php koska siellä on tarvittavia funktioita.
$html = "<h2>Criteria</h2>";
$html .= '<form action="GET">';
$html .= createRegionDropDown(); // Luodaan dropdown menu.

$html .= createGenreDropDown(); // Luodaan dropdown menu.
$path = 'datasets';
if ($handle = opendir($path)) {
    while (false !== ($file = readdir($handle))) { //Looppaa läpi tiedostot datasets-hakemistosta.
        if ('.' === $file) continue;
        if ('..' === $file) continue;

        $html .= '<div><input type="submit" value="' .
        basename($file, ".php") . '"formaction="' . $path
        . "/" . $file . '"></div>';
    }
    closedir($handle);
}
$html .= '</form>';
// Painike, joka lähettää lomakkeen käsiteltävänä olevalle tiedostolle.
echo $html;
?>