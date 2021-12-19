<?php
require_once('../db.php'); //Yhteys tietokantaan.
$region = $_GET['region']; // Parametri
$conn = createDbConnection(); // Kutsutaan funktiota, joka avaa tietokantayhteyden.
$sql = "CALL GetAliasesByRegion('" . $region . "');"; // SQL-lause muuttujaan, kutsuu proceduurin.
$prepare = $conn->prepare($sql); // Tarkistukset ja kyselyt tietokantaan.
$prepare->execute();
$rows = $prepare->fetchAll(); // Vastaus muuttujaan.
$html = '<h1>Aliases by region ' . $region . '</h1>'; // Otsikko.
$html .= '<ul>';
foreach($rows as $row) { // Loopataan tietokannasta saadut rivit.
    $html .= '<li>' . $row['title'] . '</li>';
}
$html .= '</ul>';
echo $html;

?>