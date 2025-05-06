<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Vérifie si l'utilisateur est connecté
 *
 * @return bool True si l'utilisateur est connecté
 */
if (!function_exists('is_logged_in')) {
    function is_logged_in() {
        $CI =& get_instance();
        return $CI->session->userdata('user_id') !== null;
    }
}

/**
 * Vérifie si l'utilisateur est un administrateur
 *
 * @return bool True si l'utilisateur est un administrateur
 */
if (!function_exists('is_admin')) {
    function is_admin() {
        $CI =& get_instance();
        return ($CI->session->userdata('user_role') === 'admin');
    }
}

/**
 * Récupère l'ID de l'utilisateur connecté
 *
 * @return int|null ID de l'utilisateur ou null
 */
if (!function_exists('get_user_id')) {
    function get_user_id() {
        $CI =& get_instance();
        return $CI->session->userdata('user_id');
    }
}

/**
 * Récupère les données de l'utilisateur connecté
 *
 * @param string $key Clé spécifique à récupérer (optional)
 * @return mixed Données complètes de l'utilisateur ou valeur spécifique
 */
if (!function_exists('get_user_data')) {
    function get_user_data($key = null) {
        $CI =& get_instance();
        $userData = $CI->session->userdata('user_data');
        
        if ($key !== null) {
            return isset($userData[$key]) ? $userData[$key] : null;
        }
        
        return $userData;
    }
}

/**
 * Vérifie si l'utilisateur a accès à une ressource
 *
 * @param string $permission Permission requise
 * @return bool True si l'utilisateur a la permission
 */
if (!function_exists('user_can')) {
    function user_can($permission) {
        $CI =& get_instance();
        // Cette fonction pourrait être étendue pour un système de permissions plus complexe
        if (is_admin()) {
            return true;
        }
        
        // Implémentez ici votre logique de permissions
        return false;
    }
}
