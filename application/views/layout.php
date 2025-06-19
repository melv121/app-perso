<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><?= isset($title) ? $title : 'Marketplace Artisanale' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url('/') ?>">Artisanat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="<?= site_url('/') ?>">Accueil</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('collections') ?>">Collections</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('about') ?>">À propos</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('contact') ?>">Contact</a></li>
      </ul>
      <ul class="navbar-nav">
        <?php if ($this->session->userdata('logged_in')): ?>
          <li class="nav-item">
            <span class="navbar-text">
              <i class="bi bi-person-circle"></i> <?= $this->session->userdata('username') ?>
            </span>
          </li>
          <?php if ($this->session->userdata('type') == 'artisan'): ?>
            <li class="nav-item"><a class="nav-link" href="<?= site_url('artisan/dashboard') ?>">Dashboard</a></li>
          <?php endif; ?>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('logout') ?>">Déconnexion</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('login') ?>">Connexion</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('register') ?>">Inscription</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-4">
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <?php $this->load->view($view, isset($data) ? $data : []); ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
