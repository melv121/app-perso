<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion - La Galerie Artisanale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%); min-height: 100vh; }
        .navbar { background: rgba(255,255,255,0.98) !important; backdrop-filter: blur(15px); box-shadow: 0 8px 32px rgba(0,0,0,0.1); border-bottom: 1px solid rgba(212,175,55,0.2); }
        .navbar-brand { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.8rem; color: #1a1a2e !important; }
        .login-section { padding: 140px 0; }
        .login-card { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 1px solid rgba(44,90,160,0.1); border-radius: 28px; padding: 3.5rem; box-shadow: 0 25px 60px rgba(0,0,0,0.15); position: relative; overflow: hidden; }
        .login-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 5px; background: linear-gradient(90deg, #2c5aa0, #d4af37, #1a1a2e); }
        .form-floating label { color: #6c757d; font-weight: 500; }
        .form-control { border-radius: 15px; border: 2px solid #e9ecef; transition: all 0.3s ease; background: rgba(255,255,255,0.9); }
        .form-control:focus { border-color: #2c5aa0; box-shadow: 0 0 0 0.2rem rgba(44,90,160,0.25); background: white; }
        .btn-login { background: linear-gradient(135deg, #2c5aa0 0%, #1a1a2e 100%); border: none; padding: 18px 45px; font-weight: 700; border-radius: 50px; transition: all 0.4s ease; text-transform: uppercase; letter-spacing: 1px; }
        .btn-login:hover { transform: translateY(-3px); box-shadow: 0 15px 35px rgba(44,90,160,0.4); }
        .navbar-nav .nav-link { color: #1a1a2e !important; font-weight: 600; margin: 0 15px; transition: all 0.3s ease; }
        .navbar-nav .nav-link:hover { color: #2c5aa0 !important; }
        .navbar-nav .nav-link.active { color: #d4af37 !important; font-weight: 700; }
        .login-title { color: #1a1a2e; font-family: 'Playfair Display', serif; font-weight: 700; }
        .login-subtitle { color: #6c757d; }
        .alert-success { background: linear-gradient(45deg, rgba(212,175,55,0.15), rgba(44,90,160,0.1)); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; color: #1a1a2e; }
        .alert-danger { background: linear-gradient(45deg, rgba(220,53,69,0.15), rgba(44,90,160,0.1)); border: 1px solid rgba(220,53,69,0.3); border-radius: 15px; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url('/') ?>">
        <i class="bi bi-palette"></i> La Galerie Artisanale
    </a>
    <div class="navbar-nav ms-auto">
      <a class="nav-link" href="<?= site_url('/') ?>">Accueil</a>
      <a class="nav-link" href="<?= site_url('about') ?>">À propos</a>
      <a class="nav-link" href="<?= site_url('contact') ?>">Contact</a>
      <a class="nav-link active" href="<?= site_url('login') ?>">Connexion</a>
      <a class="nav-link" href="<?= site_url('register') ?>">Inscription</a>
    </div>
  </div>
</nav>

<section class="login-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-card">
                    <div class="text-center mb-4">
                        <h3 class="login-title">
                            <i class="bi bi-palette" style="color: #d4af37;"></i> Connexion
                        </h3>
                        <p class="login-subtitle">Accédez à votre espace artisan</p>
                    </div>
                    
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
                    <?php endif; ?>
                    
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Nom d'utilisateur" required>
                            <label for="username"><i class="bi bi-person"></i> Nom d'utilisateur</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
                            <label for="password"><i class="bi bi-lock"></i> Mot de passe</label>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-login btn-lg" type="submit">
                                <i class="bi bi-box-arrow-in-right"></i> Se connecter
                            </button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-3">
                        <p>Pas encore de compte ? <a href="<?= site_url('register') ?>">S'inscrire</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
