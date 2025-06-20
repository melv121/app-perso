<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>La Galerie Artisanale - Créations Uniques</title>
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
            .navbar-nav { gap: 0; }
            .navbar-nav .nav-link { padding: 0.5rem 1rem; margin: 0; border-radius: 10px; font-size: 0.9rem; }
            .navbar-text { padding: 0.5rem 1rem !important; font-size: 0.85rem; }
            .hero-section { padding: 100px 0 80px; margin-top: 60px; }
            .hero-title { font-size: 2.5rem; }
        }
        
        /* Smartphone très compact */
        @media (max-width: 576px) {
            .navbar { padding: 0.3rem 0; }
            .navbar-brand { font-size: 1.1rem; }
            .hero-section { padding: 80px 0 60px; margin-top: 50px; }
            .hero-title { font-size: 2rem; }
            .hero-subtitle { font-size: 1.1rem; }
            .btn-hero { padding: 12px 30px; font-size: 0.9rem; }
            .products-section { padding: 60px 0; }
            .section-title { font-size: 2rem; }
            .product-card { margin-bottom: 1.5rem; }
            .product-body { padding: 1.5rem; }
        }
        
        .hero-section { background: linear-gradient(135deg, rgba(44,90,160,0.9), rgba(26,26,46,0.9)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>'); padding: 140px 0; color: white; position: relative; overflow: hidden; }
        .hero-content { position: relative; z-index: 2; }
        .hero-title { font-family: 'Playfair Display', serif; font-size: 4rem; font-weight: 800; margin-bottom: 2rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }
        .hero-subtitle { font-size: 1.4rem; margin-bottom: 2.5rem; opacity: 0.95; }
        .btn-hero { background: linear-gradient(45deg, #d4af37, #ffd700); color: #1a1a2e; border: none; padding: 18px 45px; font-weight: 700; border-radius: 50px; transition: all 0.4s ease; box-shadow: 0 8px 25px rgba(212,175,55,0.4); text-transform: uppercase; letter-spacing: 1px; }
        .btn-hero:hover { transform: translateY(-3px); box-shadow: 0 15px 35px rgba(212,175,55,0.6); color: #1a1a2e; }
        .products-section { padding: 100px 0; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); }
        .section-title { font-family: 'Playfair Display', serif; font-size: 3rem; color: #1a1a2e; margin-bottom: 4rem; text-align: center; font-weight: 700; }
        .product-card { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 1px solid rgba(44,90,160,0.1); border-radius: 24px; overflow: hidden; box-shadow: 0 15px 35px rgba(0,0,0,0.08); transition: all 0.4s ease; height: 100%; }
        .product-card:hover { transform: translateY(-12px) scale(1.02); box-shadow: 0 25px 50px rgba(0,0,0,0.15); border-color: rgba(212,175,55,0.3); }
        .product-image { height: 280px; background: linear-gradient(45deg, #2c5aa0, #1a1a2e); display: flex; align-items: center; justify-content: center; color: white; font-size: 3.5rem; position: relative; overflow: hidden; }
        .product-image::after { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(212,175,55,0.3), transparent); transition: left 0.6s; }
        .product-card:hover .product-image::after { left: 100%; }
        .product-body { padding: 2rem; }
        .product-title { font-weight: 700; color: #1a1a2e; margin-bottom: 1rem; font-size: 1.2rem; }
        .product-description { color: #6c757d; margin-bottom: 1.5rem; font-size: 0.95rem; line-height: 1.6; }
        .product-price { color: #2c5aa0; font-weight: 800; font-size: 1.4rem; }
        .badge-user { background: linear-gradient(45deg, #2c5aa0, #1a1a2e); border: none; padding: 10px 20px; border-radius: 25px; font-weight: 600; }
        .badge-artisan { background: linear-gradient(45deg, #d4af37, #ffd700); color: #1a1a2e; }
        .badge-client { background: linear-gradient(45deg, #2c5aa0, #1a1a2e); }
        .alert-connected { background: linear-gradient(45deg, rgba(212,175,55,0.1), rgba(44,90,160,0.1)); border: 1px solid rgba(212,175,55,0.3); border-radius: 20px; }
        .floating-elements { position: absolute; width: 100%; height: 100%; top: 0; left: 0; overflow: hidden; }
        .floating-elements::before { content: ''; position: absolute; width: 250px; height: 250px; background: rgba(212,175,55,0.1); border-radius: 50%; top: -125px; right: -125px; animation: float 8s ease-in-out infinite; }
        .floating-elements::after { content: ''; position: absolute; width: 180px; height: 180px; background: rgba(255,255,255,0.05); border-radius: 50%; bottom: -90px; left: -90px; animation: float 10s ease-in-out infinite reverse; }
        @keyframes float { 0%, 100% { transform: translateY(0px) rotate(0deg); } 50% { transform: translateY(-30px) rotate(180deg); } }
        .navbar-nav .nav-link { color: #1a1a2e !important; font-weight: 600; margin: 0 15px; transition: all 0.3s ease; }
        .navbar-nav .nav-link:hover { color: #2c5aa0 !important; }
        .navbar-text { color: #1a1a2e !important; font-weight: 600; }
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
        <li class="nav-item"><a class="nav-link active" href="<?php echo site_url('/'); ?>"><i class="bi bi-house"></i> Accueil</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('collections'); ?>"><i class="bi bi-grid"></i> Collections</a></li>
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
<section class="hero-section">
    <div class="floating-elements"></div>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8 hero-content">
                <h1 class="hero-title">Créations Artisanales Exceptionnelles</h1>
                <p class="hero-subtitle">Découvrez des œuvres uniques créées par des artisans passionnés</p>
                <a href="<?php echo site_url('collections'); ?>" class="btn btn-hero btn-lg">
                    <i class="bi bi-arrow-right"></i> Découvrir nos créations
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Alert de connexion -->
<?php if ($this->session->userdata('logged_in')): ?>
<div class="container mt-4">
    <div class="alert alert-connected alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i> 
        Bienvenue <strong><?php echo $this->session->userdata('username'); ?></strong> ! 
        Vous êtes connecté en tant que <strong><?php echo $this->session->userdata('type'); ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
<?php endif; ?>

<!-- Section Produits -->
<section class="products-section">
    <div class="container">
        <h2 class="section-title">Nos Dernières Créations</h2>
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
                                    <button class="btn btn-sm btn-success" onclick="openPaymentModal(<?php echo $p->id ?? 0; ?>, '<?php echo htmlspecialchars($p->name ?? 'Produit'); ?>', <?php echo $p->price ?? 0; ?>)">
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
                        <?php if ($this->session->userdata('type') == 'artisan'): ?>
                            <a href="<?php echo site_url('products/add'); ?>" class="btn btn-hero mt-3">
                                <i class="bi bi-plus"></i> Ajouter ma première création
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Modal de paiement -->
<div class="modal fade" id="paymentModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 20px; border: none;">
            <div class="modal-header" style="border: none; background: linear-gradient(45deg, #667eea, #764ba2); color: white; border-radius: 20px 20px 0 0;">
                <h5 class="modal-title"><i class="bi bi-credit-card"></i> Finaliser votre achat</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <!-- Résumé commande -->
                <div class="order-summary mb-4">
                    <div class="d-flex align-items-center p-3" style="background: #f8f9fa; border-radius: 15px;">
                        <div class="product-thumb me-3" style="width: 80px; height: 80px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                            <i class="bi bi-palette"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 id="modal-product-name" class="mb-1">Nom du produit</h6>
                            <p class="text-muted mb-0">Création artisanale unique</p>
                        </div>
                        <div class="text-end">
                            <h5 id="modal-product-price" class="mb-0 text-success">0,00 €</h5>
                        </div>
                    </div>
                </div>

                <!-- Informations client -->
                <div class="customer-info mb-4">
                    <h6 class="mb-3"><i class="bi bi-person"></i> Informations de livraison</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="firstName" placeholder="Prénom" required>
                                <label for="firstName">Prénom</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="lastName" placeholder="Nom" required>
                                <label for="lastName">Nom</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Email" required>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="address" placeholder="Adresse" required>
                                <label for="address">Adresse complète</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="city" placeholder="Ville" required>
                                <label for="city">Ville</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="postal" placeholder="Code postal" required>
                                <label for="postal">Code postal</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Méthodes de paiement -->
                <div class="payment-methods">
                    <h6 class="mb-3"><i class="bi bi-credit-card"></i> Choisissez votre méthode de paiement</h6>
                    
                    <!-- Paiements rapides -->
                    <div class="quick-payments mb-4">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <button class="btn btn-dark w-100 py-3" onclick="processPayment('apple-pay')">
                                    <i class="bi bi-apple"></i> Apple Pay
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button class="btn w-100 py-3" style="background: #0070ba; color: white;" onclick="processPayment('paypal')">
                                    <i class="bi bi-paypal"></i> PayPal
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button class="btn w-100 py-3" style="background: #4285f4; color: white;" onclick="processPayment('google-pay')">
                                    <i class="bi bi-google"></i> Google Pay
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="divider text-center mb-4">
                        <span class="px-3 text-muted" style="background: white;">ou</span>
                        <hr style="margin-top: -12px;">
                    </div>

                    <!-- Paiement par carte -->
                    <div class="card-payment">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cardNumber" placeholder="Numéro de carte" maxlength="19">
                                    <label for="cardNumber"><i class="bi bi-credit-card"></i> Numéro de carte</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cardExpiry" placeholder="MM/AA" maxlength="5">
                                    <label for="cardExpiry">MM/AA</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cardCvc" placeholder="CVC" maxlength="3">
                                    <label for="cardCvc">CVC</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cardName" placeholder="Nom sur la carte">
                                    <label for="cardName">Nom sur la carte</label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button class="btn btn-lg w-100" style="background: linear-gradient(45deg, #667eea, #764ba2); color: white; border-radius: 15px; padding: 15px;" onclick="processPayment('card')">
                                <i class="bi bi-lock"></i> Payer maintenant
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sécurité -->
                <div class="security-info mt-4 p-3" style="background: #f8f9fa; border-radius: 10px;">
                    <div class="text-center text-muted small">
                        <i class="bi bi-shield-check text-success"></i>
                        Paiement sécurisé SSL 256-bit • Vos données sont protégées
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="footer-section">
                    <div class="footer-logo">
                        <i class="bi bi-palette"></i> La Galerie Artisanale
                    </div>
                    <p class="mb-3">Découvrez et soutenez les artisans locaux à travers leurs créations uniques et authentiques.</p>
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
                    <h5>Navigation</h5>
                    <ul class="footer-links">
                        <li><a href="<?php echo site_url('/'); ?>">Accueil</a></li>
                        <li><a href="<?php echo site_url('collections'); ?>">Collections</a></li>
                        <li><a href="<?php echo site_url('about'); ?>">À propos</a></li>
                        <li><a href="<?php echo site_url('contact'); ?>">Contact</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h5>Artisans</h5>
                    <ul class="footer-links">
                        <li><a href="<?php echo site_url('register'); ?>">Devenir artisan</a></li>
                        <li><a href="<?php echo site_url('login'); ?>">Espace artisan</a></li>
                        <li><a href="<?php echo site_url('products/add'); ?>">Ajouter une création</a></li>
                        <li><a href="#">Guide de vente</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h5>Informations</h5>
                    <ul class="footer-links">
                        <li><a href="<?php echo site_url('conditions'); ?>">Conditions d'utilisation</a></li>
                        <li><a href="#">Politique de confidentialité</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Livraisons & Retours</a></li>
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
                    <p>Fait avec <i class="bi bi-heart-fill text-danger"></i> pour l'artisanat français</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    
    let currentProductId = null;
    let currentProductPrice = 0;

    function openPaymentModal(productId, productName, productPrice) {
        currentProductId = productId;
        currentProductPrice = productPrice;
        
        document.getElementById('modal-product-name').textContent = productName;
        document.getElementById('modal-product-price').textContent = new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'EUR'
        }).format(productPrice);
        
        new bootstrap.Modal(document.getElementById('paymentModal')).show();
    }

    function processPayment(method) {
        // Vérifier les informations client
        const firstName = document.getElementById('firstName').value;
        const lastName = document.getElementById('lastName').value;
        const email = document.getElementById('email').value;
        
        if (!firstName || !lastName || !email) {
            Swal.fire({
                icon: 'warning',
                title: 'Informations manquantes',
                text: 'Veuillez remplir vos informations de livraison',
                confirmButtonColor: '#667eea'
            });
            return;
        }

        // Simulation du traitement de paiement
        const modal = bootstrap.Modal.getInstance(document.getElementById('paymentModal'));
        modal.hide();
        
        // Animation de succès
        Swal.fire({
            icon: 'success',
            title: 'Commande confirmée !',
            text: `Votre paiement via ${getPaymentMethodName(method)} a été traité avec succès.`,
            confirmButtonText: 'Continuer mes achats',
            confirmButtonColor: '#667eea'
        });
    }

    function getPaymentMethodName(method) {
        const methods = {
            'apple-pay': 'Apple Pay',
            'paypal': 'PayPal', 
            'google-pay': 'Google Pay',
            'card': 'Carte bancaire'
        };
        return methods[method] || 'Paiement sécurisé';
    }

    // Formatage automatique des champs carte
    document.addEventListener('DOMContentLoaded', function() {
        const cardNumber = document.getElementById('cardNumber');
        const cardExpiry = document.getElementById('cardExpiry');
        
        if (cardNumber) {
            cardNumber.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
                let formattedValue = value.match(/.{1,4}/g)?.join(' ') || '';
                if (formattedValue !== value) e.target.value = formattedValue;
            });
        }

        if (cardExpiry) {
            cardExpiry.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length >= 2) {
                    value = value.substring(0,2) + '/' + value.substring(2,4);
                }
                e.target.value = value;
            });
        }
    });
</script>
</body>
</html>
