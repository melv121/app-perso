<?php $view = 'static/conditions'; include(APPPATH.'views/layout.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Conditions - Marketplace Artisanale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url('/') ?>">Artisanat</a>
    <div class="navbar-nav ms-auto">
      <a class="nav-link" href="<?= site_url('/') ?>">Accueil</a>
      <a class="nav-link" href="<?= site_url('about') ?>">À propos</a>
      <a class="nav-link" href="<?= site_url('contact') ?>">Contact</a>
      <a class="nav-link" href="<?= site_url('login') ?>">Connexion</a>
      <a class="nav-link" href="<?= site_url('register') ?>">Inscription</a>
    </div>
  </div>
</nav>
<div class="container mt-4">
    <h2>Conditions générales d'utilisation</h2>
    <div class="row">
        <div class="col-md-12">
            <h4>1. Objet</h4>
            <p>Les présentes conditions générales ont pour objet de définir les modalités d'utilisation de la marketplace artisanale.</p>
            
            <h4>2. Inscription</h4>
            <p>L'inscription est gratuite et ouverte aux particuliers et artisans. Vous devez fournir des informations exactes lors de votre inscription.</p>
            
            <h4>3. Utilisation de la plateforme</h4>
            <p>En tant qu'utilisateur, vous vous engagez à :</p>
            <ul>
                <li>Respecter les autres utilisateurs</li>
                <li>Ne pas publier de contenu illégal ou offensant</li>
                <li>Utiliser la plateforme dans le respect des lois en vigueur</li>
            </ul>
            
            <h4>4. Pour les artisans</h4>
            <p>Les artisans s'engagent à :</p>
            <ul>
                <li>Proposer des produits artisanaux authentiques</li>
                <li>Fournir des descriptions précises de leurs créations</li>
                <li>Respecter les délais annoncés</li>
            </ul>
            
            <h4>5. Responsabilité</h4>
            <p>La plateforme agit en tant qu'intermédiaire et ne peut être tenue responsable des transactions entre utilisateurs.</p>
            
            <h4>6. Données personnelles</h4>
            <p>Vos données personnelles sont traitées conformément à notre politique de confidentialité.</p>
            
            <h4>7. Modification des conditions</h4>
            <p>Nous nous réservons le droit de modifier ces conditions à tout moment. Les utilisateurs seront informés des changements.</p>
            
            <h4>8. Contact</h4>
            <p>Pour toute question concernant ces conditions, contactez-nous à : <a href="mailto:contact@artisanat.local">contact@artisanat.local</a></p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
