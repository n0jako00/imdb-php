<?php
require_once('../db.php'); //Yhteys tietokantaan.
$conn = createDbConnection(); // Kutsutaan funktiota, joka avaa tietokantayhteyden.
$sql = "SELECT `primary_title` FROM `titles` INNER JOIN title_genres ON titles.title_id =
title_genres.title_id WHERE genre LIKE '%Documentary%' LIMIT 10;"; // SQL-lause muuttujaan.
$prepare = $conn->prepare($sql); // Tarkistukset ja kyselyt tietokantaan.
$prepare->execute();
$rows = $prepare->fetchAll(); // Vastaus muuttujaan.
$html = '<h1>Documentaries</h1>';// Otsikko.
$html .= '<ul>';
foreach($rows as $row) { // Loopataan tietokannasta saadut rivit.
    $html .= '<li>' . $row['primary_title'] . '</li>';
}
$html .= '</ul>';
echo $html;

?>