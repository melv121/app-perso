<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Inscription - La Galerie Artisanale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%); min-height: 100vh; }
        .navbar { background: rgba(255,255,255,0.98) !important; backdrop-filter: blur(15px); box-shadow: 0 8px 32px rgba(0,0,0,0.1); border-bottom: 1px solid rgba(212,175,55,0.2); padding: 0.5rem 0; }
        .navbar-brand { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.8rem; color: #1a1a2e !important; }
        
        /* Mobile navbar optimisée */
        .navbar-toggler { border: none; padding: 0.2rem 0.5rem; }
        .navbar-toggler:focus { box-shadow: none; }
        .navbar-toggler-icon { background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2826, 26, 46, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e"); }
        
        /* Navigation mobile compacte */
        @media (max-width: 991.98px) {
            .navbar-brand { font-size: 1.3rem; }
            .navbar-collapse { background: rgba(255,255,255,0.95); margin-top: 0.5rem; border-radius: 15px; padding: 1rem; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
            .navbar-nav .nav-link { padding: 0.5rem 1rem; margin: 0; border-radius: 10px; font-size: 0.9rem; }
            .register-section { padding: 100px 0; margin-top: 60px; }
        }
        
        /* Smartphone très compact */
        @media (max-width: 576px) {
            .navbar { padding: 0.3rem 0; }
            .navbar-brand { font-size: 1.1rem; }
            .register-section { padding: 80px 0; margin-top: 50px; margin-bottom: 2rem; }
            .register-card { padding: 2rem; border-radius: 20px; }
        }
        
        .register-section { padding: 140px 0; }
        .register-card { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 1px solid rgba(44,90,160,0.1); border-radius: 28px; padding: 3.5rem; box-shadow: 0 25px 60px rgba(0,0,0,0.15); position: relative; overflow: hidden; }
        .register-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 5px; background: linear-gradient(90deg, #2c5aa0, #d4af37, #1a1a2e); }
        .form-floating label { color: #6c757d; font-weight: 500; }
        .form-control { border-radius: 15px; border: 2px solid #e9ecef; transition: all 0.3s ease; background: rgba(255,255,255,0.9); }
        .form-control:focus { border-color: #2c5aa0; box-shadow: 0 0 0 0.2rem rgba(44,90,160,0.25); background: white; }
        .btn-register { background: linear-gradient(135deg, #d4af37 0%, #ffd700 100%); color: #1a1a2e; border: none; padding: 18px 45px; font-weight: 700; border-radius: 50px; transition: all 0.4s ease; text-transform: uppercase; letter-spacing: 1px; }
        .btn-register:hover { transform: translateY(-3px); box-shadow: 0 15px 35px rgba(212,175,55,0.4); color: #1a1a2e; }
        .navbar-nav .nav-link { color: #1a1a2e !important; font-weight: 600; margin: 0 15px; transition: all 0.3s ease; }
        .navbar-nav .nav-link:hover { color: #2c5aa0 !important; }
        .navbar-nav .nav-link.active { color: #d4af37 !important; font-weight: 700; }
        .register-title { color: #1a1a2e; font-family: 'Playfair Display', serif; font-weight: 700; }
        .register-subtitle { color: #6c757d; }
        .alert-danger { background: linear-gradient(45deg, rgba(220,53,69,0.15), rgba(44,90,160,0.1)); border: 1px solid rgba(220,53,69,0.3); border-radius: 15px; }
        
        /* Footer responsive */
        .footer { background: linear-gradient(135deg, #1a1a2e 0%, #0f0f23 100%); color: white; padding: 40px 0 20px; margin-top: 50px; position: relative; overflow: hidden; }
        .footer::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #2c5aa0, #d4af37, #1a1a2e); }
        .footer-bottom { text-align: center; color: rgba(255,255,255,0.6); padding-top: 20px; }
        .footer-links { display: flex; justify-content: center; gap: 30px; margin-bottom: 20px; }
        .footer-links a { color: rgba(255,255,255,0.8); text-decoration: none; transition: all 0.3s ease; }
        .footer-links a:hover { color: #d4af37; }
        
        @media (max-width: 576px) {
            .footer { padding: 30px 0 15px; margin-top: 30px; }
            .footer-links { flex-direction: column; gap: 15px; }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="<?php echo site_url('/'); ?>">
        <i class="bi bi-palette"></i> La Galerie Artisanale
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="navbar-nav ms-auto">
        <a class="nav-link" href="<?php echo site_url('/'); ?>"><i class="bi bi-house"></i> Accueil</a>
        <a class="nav-link" href="<?php echo site_url('about'); ?>"><i class="bi bi-info-circle"></i> À propos</a>
        <a class="nav-link" href="<?php echo site_url('contact'); ?>"><i class="bi bi-envelope"></i> Contact</a>
        <a class="nav-link" href="<?php echo site_url('collections'); ?>"><i class="bi bi-grid"></i> Collections</a>
        <a class="nav-link" href="<?php echo site_url('login'); ?>"><i class="bi bi-box-arrow-in-right"></i> Connexion</a>
        <a class="nav-link active" href="<?php echo site_url('register'); ?>"><i class="bi bi-person-plus"></i> Inscription</a>
      </div>
    </div>
  </div>
</nav>

<section class="register-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="register-card">
                    <div class="text-center mb-4">
                        <h3 class="register-title">
                            <i class="bi bi-person-plus" style="color: #d4af37;"></i> Inscription
                        </h3>
                        <p class="register-subtitle">Rejoignez notre communauté d'artisans</p>
                    </div>
                    
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Nom d'utilisateur" required>
                            <label for="username"><i class="bi bi-person"></i> Nom d'utilisateur</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                            <label for="email"><i class="bi bi-envelope"></i> Adresse email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
                            <label for="password"><i class="bi bi-lock"></i> Mot de passe</label>
                        </div>
                        <div class="form-floating mb-4">
                            <select name="type" id="type" class="form-control" required>
                                <option value="">Choisissez votre type de compte</option>
                                <option value="client">Client</option>
                                <option value="artisan">Artisan</option>
                            </select>
                            <label for="type"><i class="bi bi-person-badge"></i> Type de compte</label>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-register btn-lg" type="submit">
                                <i class="bi bi-person-plus"></i> S'inscrire
                            </button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-3">
                        <p>Déjà un compte ? <a href="<?php echo site_url('login'); ?>">Se connecter</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-bottom">
            <div class="footer-links">
                <a href="<?php echo site_url('/'); ?>">Accueil</a>
                <a href="<?php echo site_url('about'); ?>">À propos</a>
                <a href="<?php echo site_url('contact'); ?>">Contact</a>
                <a href="<?php echo site_url('login'); ?>">Connexion</a>
            </div>
            <p>&copy; 2024 La Galerie Artisanale. Rejoignez notre communauté d'artisans.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Fermer automatiquement le menu mobile au clic sur un lien
    document.addEventListener('DOMContentLoaded', function() {
        const navbarCollapse = document.getElementById('navbarNav');
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                        toggle: false
                    });
                    bsCollapse.hide();
                }
            });
        });
        
        // Fermer le menu si on clique en dehors
        document.addEventListener('click', function(event) {
            const navbar = document.querySelector('.navbar');
            const isClickInsideNav = navbar.contains(event.target);
            
            if (!isClickInsideNav && navbarCollapse && navbarCollapse.classList.contains('show')) {
                const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                    toggle: false
                });
                bsCollapse.hide();
            }
        });
    });
</script>
</body>
</html>
