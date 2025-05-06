<?php
// Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ballotpro');

// Connexion à la base de données
try {
    $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
} catch(PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
    exit;
}

// Configuration du site
define('SITE_NAME', 'BallotPro');
define('SITE_URL', 'http://localhost/app-perso');

// Configuration des emails
define('EMAIL_FROM', 'contact@ballotpro.com');
define('EMAIL_NAME', 'BallotPro');

// Configuration des paiements
define('TEST_MODE', true);

// Fuseau horaire
date_default_timezone_set('Europe/Paris');
?>
