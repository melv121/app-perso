<?php
/**
 * Fonctions utilitaires pour le site BallotPro
 */

/**
 * Nettoie une chaîne de caractères
 */
function clean($string) {
    return htmlspecialchars(trim($string), ENT_QUOTES, 'UTF-8');
}

/**
 * Vérifie si l'utilisateur est connecté
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

/**
 * Vérifie si l'utilisateur est un administrateur
 */
function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin';
}

/**
 * Redirige vers une page
 */
function redirect($url) {
    header("Location: $url");
    exit;
}

/**
 * Génère une chaîne aléatoire
 */
function randomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $string;
}

/**
 * Formate le prix
 */
function formatPrice($price) {
    return number_format($price, 2, ',', ' ') . ' €';
}

/**
 * Récupère les catégories de ballots
 */
function getCategories() {
    global $db;
    $stmt = $db->query("SELECT * FROM categories ORDER BY name");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Récupère les ballots populaires
 */
function getPopularBallots($limit = 4) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM ballots WHERE stock > 0 ORDER BY sales DESC LIMIT :limit");
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Calcule le potentiel de marge sur un ballot
 */
function calculatePotentialMargin($wholesale_price, $estimated_retail) {
    $margin = $estimated_retail - $wholesale_price;
    $percentage = ($margin / $wholesale_price) * 100;
    return round($percentage);
}

/**
 * Génère une référence de commande unique
 */
function generateOrderReference() {
    return 'BP-' . date('Ymd') . '-' . randomString(5);
}
?>
