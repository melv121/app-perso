<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Devenir Artisan - Marketplace Artisanale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url('/') ?>">Artisanat</a>
    <div class="navbar-nav ms-auto">
      <a class="nav-link" href="<?= site_url('/') ?>">Accueil</a>
      <a class="nav-link" href="<?= site_url('artisan/dashboard') ?>">Dashboard</a>
      <span class="navbar-text">
        <i class="bi bi-person-circle"></i> <?= $this->session->userdata('username') ?>
      </span>
      <a class="nav-link" href="<?= site_url('logout') ?>">Déconnexion</a>
    </div>
  </div>
</nav>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Compléter mon profil artisan</h3>
                </div>
                <div class="card-body">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    
                    <form method="post">
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio / Présentation</label>
                            <textarea name="bio" id="bio" class="form-control" rows="5" required 
                                placeholder="Présentez-vous, décrivez votre savoir-faire, vos spécialités..."></textarea>
                            <small class="form-text text-muted">Décrivez votre parcours et vos créations</small>
                        </div>
                        
                        <div class="mb-3">
                            <label for="website" class="form-label">Site web (optionnel)</label>
                            <input type="url" name="website" id="website" class="form-control" 
                                placeholder="https://monsite.fr">
                            <small class="form-text text-muted">Votre site personnel ou portfolio</small>
                        </div>
                        
                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Valider mon profil</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
