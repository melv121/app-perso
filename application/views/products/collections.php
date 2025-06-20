<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Collections - La Galerie Artisanale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%); min-height: 100vh; }
        .navbar { background: rgba(255,255,255,0.98) !important; backdrop-filter: blur(15px); box-shadow: 0 8px 32px rgba(0,0,0,0.1); border-bottom: 1px solid rgba(212,175,55,0.2); padding: 0.5rem 0; }
        .navbar-brand { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.5rem; color: #1a1a2e !important; }
        
        /* Mobile navbar optimisée */
        .navbar-toggler { border: none; padding: 0.2rem 0.5rem; }
        .navbar-toggler:focus { box-shadow: none; }
        .navbar-toggler-icon { background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2826, 26, 46, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e"); }
        
        /* Navigation mobile compacte */
        @media (max-width: 991.98px) {
            .navbar-brand { font-size: 1.3rem; }
            .navbar-collapse { background: rgba(255,255,255,0.95); margin-top: 0.5rem; border-radius: 15px; padding: 1rem; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
            .navbar-nav .nav-link { padding: 0.5rem 1rem; margin: 0; border-radius: 10px; font-size: 0.9rem; }
            .navbar-text { padding: 0.5rem 1rem !important; font-size: 0.85rem; }
            .hero-collections { padding: 100px 0 80px; margin-top: 60px; }
            .hero-title { font-size: 2.5rem; }
        }
        
        /* Smartphone très compact */
        @media (max-width: 576px) {
            .navbar { padding: 0.3rem 0; }
            .navbar-brand { font-size: 1.1rem; }
            .hero-collections { padding: 80px 0 60px; margin-top: 50px; }
            .hero-title { font-size: 2rem; }
            .product-card { margin-bottom: 1.5rem; }
        }
        
        .hero-collections { background: linear-gradient(135deg, rgba(44,90,160,0.9), rgba(26,26,46,0.9)); padding: 140px 0; color: white; position: relative; overflow: hidden; }
        .hero-title { font-family: 'Playfair Display', serif; font-size: 4rem; font-weight: 800; margin-bottom: 2rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }
        .products-section { padding: 100px 0; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); }
        .product-card { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 1px solid rgba(44,90,160,0.1); border-radius: 24px; overflow: hidden; box-shadow: 0 15px 35px rgba(0,0,0,0.08); transition: all 0.4s ease; height: 100%; }
        .product-card:hover { transform: translateY(-12px) scale(1.02); box-shadow: 0 25px 50px rgba(0,0,0,0.15); border-color: rgba(212,175,55,0.3); }
        .product-image { height: 280px; background: linear-gradient(45deg, #2c5aa0, #1a1a2e); display: flex; align-items: center; justify-content: center; color: white; font-size: 3.5rem; position: relative; overflow: hidden; }
        .product-body { padding: 2rem; }
        .product-title { font-weight: 700; color: #1a1a2e; margin-bottom: 1rem; font-size: 1.2rem; }
        .product-description { color: #6c757d; margin-bottom: 1.5rem; font-size: 0.95rem; line-height: 1.6; }
        .product-price { color: #2c5aa0; font-weight: 800; font-size: 1.4rem; }
        .navbar-nav .nav-link { color: #1a1a2e !important; font-weight: 600; margin: 0 15px; transition: all 0.3s ease; }
        .navbar-nav .nav-link:hover { color: #2c5aa0 !important; }
        .navbar-nav .nav-link.active { color: #d4af37 !important; font-weight: 700; }
        .btn-success { background: linear-gradient(45deg, #d4af37, #ffd700) !important; color: #1a1a2e !important; border: none !important; font-weight: 600; border-radius: 12px; transition: all 0.3s ease; }
        .btn-success:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(212,175,55,0.4); color: #1a1a2e !important; }
        
        /* Footer responsive */
        .footer { background: linear-gradient(135deg, #1a1a2e 0%, #0f0f23 100%); color: white; padding: 60px 0 30px; margin-top: 80px; position: relative; overflow: hidden; }
        .footer::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #2c5aa0, #d4af37, #1a1a2e); }
        .footer-section h5 { font-family: 'Playfair Display', serif; font-weight: 700; color: #d4af37; margin-bottom: 1.5rem; }
        .footer-links { list-style: none; padding: 0; }
        .footer-links li { margin-bottom: 0.8rem; }
        .footer-links a { color: rgba(255,255,255,0.8); text-decoration: none; transition: all 0.3s ease; }
        .footer-links a:hover { color: #d4af37; transform: translateX(5px); }
        .footer-social { display: flex; gap: 15px; margin-top: 1rem; }
        .footer-social a { display: inline-block; width: 45px; height: 45px; background: linear-gradient(45deg, #2c5aa0, #d4af37); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem; transition: all 0.3s ease; }
        .footer-social a:hover { transform: translateY(-3px) scale(1.1); box-shadow: 0 10px 20px rgba(212,175,55,0.3); }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.1); margin-top: 40px; padding-top: 30px; text-align: center; color: rgba(255,255,255,0.6); }
        .footer-logo { font-family: 'Playfair Display', serif; font-size: 1.8rem; font-weight: 700; color: #d4af37; margin-bottom: 1rem; }
        
        /* Footer mobile responsive */
        @media (max-width: 768px) {
            .footer { padding: 40px 0 20px; margin-top: 50px; }
            .footer-section { margin-bottom: 2rem; text-align: center; }
            .footer-social { justify-content: center; }
            .footer-logo { font-size: 1.5rem; }
        }
        
        @media (max-width: 576px) {
            .footer { padding: 30px 0 15px; }
            .footer-section h5 { font-size: 1.1rem; }
            .footer-social a { width: 40px; height: 40px; font-size: 1rem; }
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
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('/'); ?>"><i class="bi bi-house"></i> Accueil</a></li>
        <li class="nav-item"><a class="nav-link active" href="<?php echo site_url('collections'); ?>"><i class="bi bi-grid"></i> Collections</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('about'); ?>"><i class="bi bi-info-circle"></i> À propos</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('contact'); ?>"><i class="bi bi-envelope"></i> Contact</a></li>
        
        <?php if ($this->session->userdata('logged_in')): ?>
          <li class="nav-item">
            <span class="navbar-text">
              <i class="bi bi-person-circle"></i> <?php echo $this->session->userdata('username'); ?>
              <span class="badge badge-user ms-1">
                <?php echo ucfirst($this->session->userdata('type')); ?>
              </span>
            </span>
          </li>
          <?php if ($this->session->userdata('type') == 'artisan'): ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('artisan/dashboard'); ?>"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
          <?php endif; ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo site_url('logout'); ?>"><i class="bi bi-box-arrow-right"></i> Déconnexion</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo site_url('login'); ?>"><i class="bi bi-box-arrow-in-right"></i> Connexion</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo site_url('register'); ?>"><i class="bi bi-person-plus"></i> Inscription</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero-collections">
    <div class="container text-center">
        <h1 class="hero-title">Nos Collections</h1>
        <p class="hero-subtitle">Découvrez toutes les créations artisanales de notre galerie</p>
    </div>
</section>

<!-- Section Produits -->
<section class="products-section">
    <div class="container">
        <div class="row g-4">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $index => $p): ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                        <div class="card product-card">
                            <div class="product-image">
                                <?php if (!empty($p->image)): ?>
                                    <img src="<?php echo base_url('uploads/' . $p->image); ?>" class="w-100 h-100 object-fit-cover" alt="<?php echo htmlspecialchars($p->name); ?>">
                                <?php else: ?>
                                    <i class="bi bi-palette"></i>
                                <?php endif; ?>
                            </div>
                            <div class="product-body">
                                <h5 class="product-title"><?php echo htmlspecialchars($p->name ?? 'Produit'); ?></h5>
                                <p class="product-description"><?php echo htmlspecialchars(substr($p->description ?? '', 0, 100)); ?>...</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="product-price"><?php echo number_format($p->price ?? 0, 2); ?> €</span>
                                    <button class="btn btn-sm btn-success">
                                        <i class="bi bi-cart-plus"></i> Acheter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <div class="py-5">
                        <i class="bi bi-palette display-1 text-muted mb-3"></i>
                        <h4 class="text-muted">Aucune création pour le moment</h4>
                        <p class="text-muted">Les artisans préparent de magnifiques créations pour vous !</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="footer-section">
                    <div class="footer-logo">
                        <i class="bi bi-palette"></i> La Galerie Artisanale
                    </div>
                    <p class="mb-3">Explorez notre collection unique de créations artisanales authentiques.</p>
                    <div class="footer-social">
                        <a href="#" title="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" title="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" title="Twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" title="Pinterest"><i class="bi bi-pinterest"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-2 col-md-6">
                <div class="footer-section">
                    <h5>Collections</h5>
                    <ul class="footer-links">
                        <li><a href="#">Bijoux</a></li>
                        <li><a href="#">Poterie</a></li>
                        <li><a href="#">Textile</a></li>
                        <li><a href="#">Toutes les créations</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h5>Achat</h5>
                    <ul class="footer-links">
                        <li><a href="#">Guide d'achat</a></li>
                        <li><a href="#">Livraison</a></li>
                        <li><a href="#">Retours</a></li>
                        <li><a href="#">Paiement sécurisé</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h5>Service client</h5>
                    <ul class="footer-links">
                        <li><a href="<?php echo site_url('contact'); ?>">Nous contacter</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Suivi de commande</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p>&copy; 2024 La Galerie Artisanale. Tous droits réservés.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>Créations artisanales de qualité</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script>
    AOS.init({ duration: 800, easing: 'ease-in-out', once: true });
    
    // Fermer automatiquement le menu mobile au clic sur un lien
    document.addEventListener('DOMContentLoaded', function() {
        const navbarCollapse = document.getElementById('navbarNav');
        
        if (navbarCollapse) {
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (navbarCollapse.classList.contains('show')) {
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
                const isClickInsideNav = navbar && navbar.contains(event.target);
                
                if (!isClickInsideNav && navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                        toggle: false
                    });
                    bsCollapse.hide();
                }
            });
        }
    });
</script>
</body>
</html>
