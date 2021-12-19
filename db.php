<?php

// Luodaan yhteys tietokantaan tällä funktiolla.

function createDbConnection(){

    try{
        $dbcon = new PDO('mysql:host=localhost;dbname=imdb', 'root', ''); // Valitaan mihin tietokantaan luodaan yhteys.
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo $e->getMessage(); // Otetaan mahdollinen virheilmoitus.
    }

    return $dbcon;
}
?>