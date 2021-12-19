<?php
function createGenreDropDown() { // Funktio joka luo genre-pudotusvalikon.


require_once ('db.php'); // Muodostetaan tietokantayhteys ja db.php tiedosto käyttöön tässä tiedostossa.
$conn = createDbConnection();  //Kutsutaan createDbConnection funktiota.
$sql = "SELECT DISTINCT genre FROM title_genres;"; // Sql lause muuttujaan.
$prepare = $conn->prepare($sql); // Kysely kantaan.
$prepare->execute();
$rows = $prepare->fetchAll(); // Tallenna vastaus muuttujaan.
$html = '<select name="genre">';
foreach($rows as $row) { // Loopataan tietokannasta saadut rivit läpi.
    $html .= '<option>' . $row['genre'] . '</option>'; //Tulostetaan li rivit
}
$html .= '</select>';
return $html;
}

function createRegionDropDown() { // Funktio joka luo Region-pudotusvalikon.


    require_once ('db.php'); // Muodostetaan tietokantayhteys ja db.php tiedosto käyttöön tässä tiedostossa.
    $conn = createDbConnection(); //Kutsutaan createDbConnection funktiota.
    $sql = "SELECT DISTINCT region FROM aliases;"; // Sql lause muuttujaan.
    $prepare = $conn->prepare($sql); // Kysely kantaan.
    $prepare->execute(); 
    $rows = $prepare->fetchAll(); // Tallenna vastaus muuttujaan.
    $html = '<select name="region">';
    foreach($rows as $row) { // Loopataan tietokannasta saadut rivit läpi.
        $html .= '<option>' . $row['region'] . '</option>'; //Tulostetaan li rivit
    }
    $html .= '</select>';
    return $html;
    }
    ?>

