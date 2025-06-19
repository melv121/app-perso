<?php
// CodeIgniter 3 front controller adapté XAMPP

define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

// Chemins absolus pour éviter toute ambiguïté
$system_path = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'system';
$application_folder = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'application';

// Résolution du chemin system
if (($_temp = realpath($system_path)) !== FALSE) {
    $system_path = $_temp . DIRECTORY_SEPARATOR;
} else {
    $system_path = rtrim($system_path, '/\\') . DIRECTORY_SEPARATOR;
}

// Vérification du dossier system
if (!is_dir($system_path)) {
    exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
}

define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('BASEPATH', $system_path);
define('FCPATH', dirname(__FILE__).DIRECTORY_SEPARATOR);
define('SYSDIR', basename(BASEPATH));

// Résolution du chemin application
if (is_dir($application_folder)) {
    define('APPPATH', $application_folder . DIRECTORY_SEPARATOR);
} else {
    if (!is_dir(BASEPATH . $application_folder . DIRECTORY_SEPARATOR)) {
        exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: " . SELF);
    }
    define('APPPATH', BASEPATH . $application_folder . DIRECTORY_SEPARATOR);
}

// Vérification du fichier de configuration principal
if (!file_exists(APPPATH . 'config/config.php')) {
    exit("The configuration file does not exist. Please ensure that 'application/config/config.php' is present and readable.");
}

require_once BASEPATH . 'core/CodeIgniter.php';
