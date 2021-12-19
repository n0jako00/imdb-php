<?php
require_once('../db.php'); //Yhteys tietokantaan.
$conn = createDbConnection(); // Kutsutaan funktiota, joka avaa tietokantayhteyden.
$sql = "SELECT * FROM topTenMovies;"; // SQL-lause muuttujaan, joka kutsuu viewin.
$prepare = $conn->prepare($sql); // Tarkistukset ja kyselyt tietokantaan.
$prepare->execute();
$rows = $prepare->fetchAll(); // Vastaus muuttujaan.
$html = '<h1>Top 10 Movies By Average Rating </h1>'; // Otsikko.
$html .= '<ul>';
foreach($rows as $row) { // Loopataan tietokannasta saadut rivit.
    $html .= '<li>' . $row['title'] . ' ' . '<b>' . $row['average_rating']. '</b>' . '</li>';
}
$html .= '</ul>';
echo $html;

?>