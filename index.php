<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 */
	define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
switch (ENVIRONMENT)
{
	case 'development':
		error_reporting(-1);
		ini_set('display_errors', 1);
	break;

	case 'testing':
	case 'production':
		ini_set('display_errors', 0);
		if (version_compare(PHP_VERSION, '5.3', '>='))
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
		}
		else
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
		}
	break;

	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The application environment is not set correctly.';
		exit(1); // EXIT_ERROR
}

/*
 *---------------------------------------------------------------
 * SYSTEM DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" directory.
 * Set the path if it is not in the same directory as this file.
 */
	$system_path = 'system';

/*
 *---------------------------------------------------------------
 * APPLICATION DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * directory than the default one you can set its name here. The directory
 * can also be renamed or relocated anywhere on your server. If you do,
 * use an absolute (full) server path.
 * For more info please see the user guide:
 *
 * https://codeigniter.com/userguide3/general/managing_apps.html
 *
 * NO TRAILING SLASH!
 */
	$application_folder = 'application';

/*
 *---------------------------------------------------------------
 * VIEW DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * If you want to move the view directory out of the application
 * directory, set the path to it here. The directory can be renamed
 * and relocated anywhere on your server. If blank, it will default
 * to the standard location inside your application directory.
 * If you do move this, use an absolute (full) server path.
 *
 * NO TRAILING SLASH!
 */
	$view_folder = '';

?>
<?php
session_start();
require_once 'includes/config.php';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BallotPro - Ballots de vêtements pour revendeurs</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main>
        <section class="hero">
            <div class="container">
                <h1>Achetez des ballots de vêtements en gros</h1>
                <h2>Maximisez vos profits avec notre sélection premium</h2>
                <p>Fournisseur privilégié pour revendeurs, friperies et boutiques en ligne</p>
                <a href="catalogue.php" class="btn btn-primary">Découvrir nos ballots</a>
            </div>
        </section>
        
        <section class="features">
            <div class="container">
                <div class="feature-card">
                    <i class="fas fa-tshirt"></i>
                    <h3>Qualité garantie</h3>
                    <p>Tous nos ballots sont vérifiés et triés selon des critères stricts</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-percentage"></i>
                    <h3>Marges importantes</h3>
                    <p>Jusqu'à 300% de marge potentielle sur la revente</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-truck"></i>
                    <h3>Livraison rapide</h3>
                    <p>Expédition sous 48h pour toute commande</p>
                </div>
            </div>
        </section>
        
        <section class="categories">
            <div class="container">
                <h2>Nos catégories de ballots</h2>
                <div class="category-grid">
                    <a href="catalogue.php?cat=premium" class="category-card">
                        <img src="images/premium.jpg" alt="Ballots premium">
                        <h3>Ballots Premium</h3>
                        <p>Vêtements de marques sélectionnés</p>
                    </a>
                    <a href="catalogue.php?cat=vintage" class="category-card">
                        <img src="images/vintage.jpg" alt="Ballots vintage">
                        <h3>Ballots Vintage</h3>
                        <p>Pièces rétro à forte valeur ajoutée</p>
                    </a>
                    <a href="catalogue.php?cat=casual" class="category-card">
                        <img src="images/casual.jpg" alt="Ballots casual">
                        <h3>Ballots Casual</h3>
                        <p>Vêtements quotidiens toutes saisons</p>
                    </a>
                    <a href="catalogue.php?cat=enfants" class="category-card">
                        <img src="images/enfants.jpg" alt="Ballots enfants">
                        <h3>Ballots Enfants</h3>
                        <p>Vêtements pour enfants de tous âges</p>
                    </a>
                </div>
            </div>
        </section>
        
        <section class="testimonials">
            <div class="container">
                <h2>Ils nous font confiance</h2>
                <div class="testimonial-slider">
                    <div class="testimonial">
                        <p>"J'ai pu lancer ma boutique en ligne grâce aux ballots de BallotPro. Le rapport qualité/prix est imbattable!"</p>
                        <cite>— Marie L., propriétaire de "Vintage Corner"</cite>
                    </div>
                    <div class="testimonial">
                        <p>"Des vêtements de qualité et un service client réactif. Je recommande!"</p>
                        <cite>— Thomas D., revendeur sur Vinted</cite>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="cta">
            <div class="container">
                <h2>Prêt à développer votre activité?</h2>
                <p>Inscrivez-vous et commencez à commander vos premiers ballots</p>
                <a href="inscription.php" class="btn btn-secondary">Crée un compte pro </a>
            </div>
        </section>
    </main>
    
    <?php include 'includes/footer.php'; ?>
    
    <script src="js/script.js"></script>
</body>
</html>
