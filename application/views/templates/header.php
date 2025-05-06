<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <?php 
    // Charger les CSS spécifiques en fonction de la page
    $uri = $this->uri->uri_string();
    if (strpos($uri, 'catalogue') !== false): ?>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/catalogue.css'); ?>">
    <?php elseif (strpos($uri, 'comment-ca-marche') !== false): ?>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/how-it-works.css'); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="BallotPro Logo">
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="<?php echo base_url(); ?>" <?php echo ($uri == '') ? 'class="active"' : ''; ?>>Accueil</a></li>
                    <li><a href="<?php echo base_url('catalogue'); ?>" <?php echo (strpos($uri, 'catalogue') !== false) ? 'class="active"' : ''; ?>>Catalogue</a></li>
                    <li><a href="<?php echo base_url('comment-ca-marche'); ?>" <?php echo ($uri == 'comment-ca-marche') ? 'class="active"' : ''; ?>>Comment ça marche</a></li>
                    <li><a href="<?php echo base_url('blog'); ?>" <?php echo (strpos($uri, 'blog') !== false) ? 'class="active"' : ''; ?>>Conseils de revente</a></li>
                    <li><a href="<?php echo base_url('contact'); ?>" <?php echo ($uri == 'contact') ? 'class="active"' : ''; ?>>Contact</a></li>
                </ul>
            </nav>
            <div class="user-actions">
                <?php if (function_exists('is_logged_in') && is_logged_in()): ?>
                    <a href="<?php echo base_url('mon-compte'); ?>" class="account-link"><i class="fas fa-user"></i> Mon compte</a>
                    <a href="<?php echo base_url('panier'); ?>" class="cart-link"><i class="fas fa-shopping-cart"></i> <span id="cart-count">0</span></a>
                <?php else: ?>
                    <a href="<?php echo base_url('connexion'); ?>" class="btn btn-outline">Connexion</a>
                    <a href="<?php echo base_url('inscription'); ?>" class="btn btn-primary">Inscription Pro</a>
                <?php endif; ?>
            </div>
            <div class="mobile-menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>
</body>
</html>
