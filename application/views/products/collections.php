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
        .navbar { background: rgba(255,255,255,0.98) !important; backdrop-filter: blur(15px); box-shadow: 0 8px 32px rgba(0,0,0,0.1); border-bottom: 1px solid rgba(212,175,55,0.2); }
        .navbar-brand { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.8rem; color: #1a1a2e !important; }
        
        .hero-collections { background: linear-gradient(135deg, #2c5aa0 0%, #1a1a2e 100%); padding: 120px 0 100px; color: white; position: relative; overflow: hidden; }
        .hero-collections::before { content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>'); }
        .hero-title { font-family: 'Playfair Display', serif; font-size: 3.5rem; margin-bottom: 1.5rem; font-weight: 800; position: relative; z-index: 2; }
        .hero-subtitle { font-size: 1.3rem; opacity: 0.95; position: relative; z-index: 2; }
        
        .filter-section { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 1px solid rgba(44,90,160,0.1); border-radius: 28px; padding: 3rem; margin: -60px 0 60px; box-shadow: 0 25px 60px rgba(0,0,0,0.15); position: relative; }
        .filter-section::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 5px; background: linear-gradient(90deg, #2c5aa0, #d4af37, #1a1a2e); border-radius: 28px 28px 0 0; }
        .filter-btn { border: 2px solid #e9ecef; border-radius: 50px; padding: 12px 28px; margin: 8px; background: white; color: #6c757d; transition: all 0.4s ease; font-weight: 600; }
        .filter-btn:hover { border-color: #2c5aa0; color: #2c5aa0; transform: translateY(-2px); }
        .filter-btn.active { background: linear-gradient(135deg, #2c5aa0 0%, #1a1a2e 100%); color: white; border-color: #2c5aa0; transform: translateY(-2px); box-shadow: 0 8px 25px rgba(44,90,160,0.3); }
        
        .product-card { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 1px solid rgba(44,90,160,0.1); border-radius: 24px; overflow: hidden; box-shadow: 0 15px 35px rgba(0,0,0,0.08); transition: all 0.4s ease; height: 100%; margin-bottom: 2rem; }
        .product-card:hover { transform: translateY(-12px) scale(1.02); box-shadow: 0 30px 60px rgba(0,0,0,0.2); border-color: rgba(212,175,55,0.4); }
        .product-image { height: 280px; background: linear-gradient(45deg, #2c5aa0, #1a1a2e); display: flex; align-items: center; justify-content: center; color: white; font-size: 3.5rem; position: relative; overflow: hidden; }
        .product-image::after { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(212,175,55,0.3), transparent); transition: left 0.6s; }
        .product-card:hover .product-image::after { left: 100%; }
        .product-body { padding: 2rem; }
        .product-title { font-weight: 700; color: #1a1a2e; margin-bottom: 1rem; font-size: 1.2rem; }
        .product-description { color: #6c757d; margin-bottom: 1.5rem; font-size: 0.95rem; line-height: 1.6; }
        .product-price { color: #2c5aa0; font-weight: 800; font-size: 1.4rem; }
        .product-category { position: absolute; top: 20px; left: 20px; background: linear-gradient(45deg, #d4af37, #ffd700); color: #1a1a2e; padding: 8px 18px; border-radius: 25px; font-size: 0.85rem; font-weight: 700; }
        .artisan-info { display: flex; align-items: center; margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #f1f3f4; }
        .artisan-avatar { width: 45px; height: 45px; background: linear-gradient(45deg, #2c5aa0, #1a1a2e); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; margin-right: 12px; }
        
        .stats-section { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 1px solid rgba(44,90,160,0.1); border-radius: 24px; padding: 2.5rem; box-shadow: 0 15px 35px rgba(0,0,0,0.08); margin-bottom: 3rem; }
        .stat-item { text-align: center; }
        .stat-number { font-size: 3rem; font-weight: 800; color: #2c5aa0; margin-bottom: 0.5rem; }
        .stat-label { color: #6c757d; font-size: 1rem; font-weight: 500; }
        
        .navbar-nav .nav-link { color: #1a1a2e !important; font-weight: 600; margin: 0 15px; transition: all 0.3s ease; }
        .navbar-nav .nav-link:hover { color: #2c5aa0 !important; }
        .navbar-nav .nav-link.active { color: #d4af37 !important; font-weight: 700; }
        .badge-user { background: linear-gradient(45deg, #2c5aa0, #1a1a2e); border: none; padding: 10px 20px; border-radius: 25px; font-weight: 600; }
        .btn-success { background: linear-gradient(45deg, #d4af37, #ffd700) !important; color: #1a1a2e !important; border: none !important; font-weight: 700; border-radius: 12px; transition: all 0.3s ease; }
        .btn-success:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(212,175,55,0.4); color: #1a1a2e !important; }
        .btn-outline-primary { border: 2px solid #2c5aa0; color: #2c5aa0; background: transparent; border-radius: 12px; }
        .btn-outline-primary:hover { background: #2c5aa0; border-color: #2c5aa0; }
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
      <a class="nav-link active" href="<?= site_url('collections') ?>">Collections</a>
      <a class="nav-link" href="<?= site_url('contact') ?>">Contact</a>
      <?php if ($this->session->userdata('logged_in')): ?>
        <span class="navbar-text">
          <i class="bi bi-person-circle"></i> <?= $this->session->userdata('username') ?>
        </span>
        <a class="nav-link" href="<?= site_url('logout') ?>">Déconnexion</a>
      <?php else: ?>
        <a class="nav-link" href="<?= site_url('login') ?>">Connexion</a>
        <a class="nav-link" href="<?= site_url('register') ?>">Inscription</a>
      <?php endif; ?>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero-collections">
    <div class="container text-center">
        <h1 class="hero-title">Nos Collections</h1>
        <p class="hero-subtitle">Découvrez nos créations artisanales par catégorie</p>
    </div>
</section>

<div class="container">
    <!-- Filtres par catégorie -->
    <div class="filter-section" data-aos="fade-up">
        <div class="text-center mb-3">
            <h4 style="color: #2c3e50; font-family: 'Playfair Display', serif;">
                <i class="bi bi-funnel"></i> Filtrer par catégorie
            </h4>
        </div>
        <div class="text-center">
            <button class="btn filter-btn active" data-category="all">
                <i class="bi bi-grid"></i> Toutes les créations
            </button>
            <button class="btn filter-btn" data-category="bijoux">
                <i class="bi bi-gem"></i> Bijoux
            </button>
            <button class="btn filter-btn" data-category="poterie">
                <i class="bi bi-cup"></i> Poterie
            </button>
            <button class="btn filter-btn" data-category="textile">
                <i class="bi bi-threads"></i> Textile
            </button>
            <button class="btn filter-btn" data-category="bois">
                <i class="bi bi-tree"></i> Travail du bois
            </button>
            <button class="btn filter-btn" data-category="decoration">
                <i class="bi bi-house-heart"></i> Décoration
            </button>
            <button class="btn filter-btn" data-category="art">
                <i class="bi bi-palette2"></i> Art & Peinture
            </button>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="stats-section" data-aos="fade-up">
        <div class="row">
            <div class="col-md-3 stat-item">
                <div class="stat-number" id="total-products"><?= count($products ?? []) ?></div>
                <div class="stat-label">Créations</div>
            </div>
            <div class="col-md-3 stat-item">
                <div class="stat-number">24</div>
                <div class="stat-label">Artisans</div>
            </div>
            <div class="col-md-3 stat-item">
                <div class="stat-number">6</div>
                <div class="stat-label">Catégories</div>
            </div>
            <div class="col-md-3 stat-item">
                <div class="stat-number">150+</div>
                <div class="stat-label">Clients satisfaits</div>
            </div>
        </div>
    </div>

    <!-- Grille de produits -->
    <div class="row" id="products-grid">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $index => $p): ?>
                <div class="col-lg-4 col-md-6 product-item" data-category="<?= $p->category ?? 'art' ?>" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="card product-card">
                        <div class="product-image position-relative">
                            <div class="product-category"><?= ucfirst($p->category ?? 'Art') ?></div>
                            <?php if (!empty($p->image)): ?>
                                <img src="<?= base_url('uploads/' . $p->image) ?>" class="w-100 h-100 object-fit-cover" alt="<?= htmlspecialchars($p->name) ?>">
                            <?php else: ?>
                                <i class="bi bi-palette"></i>
                            <?php endif; ?>
                        </div>
                        <div class="product-body">
                            <h5 class="product-title"><?= htmlspecialchars($p->name ?? 'Création artisanale') ?></h5>
                            <p class="product-description"><?= htmlspecialchars(substr($p->description ?? 'Belle création artisanale unique', 0, 100)) ?>...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price"><?= number_format($p->price ?? 0, 2) ?> €</span>
                                <div>
                                    <button class="btn btn-sm btn-outline-primary me-1" onclick="toggleFavorite(<?= $p->id ?>)">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <button class="btn btn-sm btn-success" onclick="openPaymentModal(<?= $p->id ?>, '<?= htmlspecialchars($p->name) ?>', <?= $p->price ?>)">
                                        <i class="bi bi-cart-plus"></i> Acheter
                                    </button>
                                </div>
                            </div>
                            <div class="artisan-info">
                                <div class="artisan-avatar">
                                    <?= substr($p->username ?? 'A', 0, 1) ?>
                                </div>
                                <div>
                                    <small class="text-muted">Créé par</small><br>
                                    <strong><?= htmlspecialchars($p->username ?? 'Artisan') ?></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <i class="bi bi-palette display-1 text-muted mb-3"></i>
                <h4 class="text-muted">Aucune création pour le moment</h4>
                <p class="text-muted">Les artisans préparent de magnifiques créations pour vous !</p>
            </div>
        <?php endif; ?>
    </div>
</div>

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

<style>
    .form-control:focus { border-color: #667eea; box-shadow: 0 0 0 0.2rem rgba(102,126,234,0.25); }
    .payment-methods .btn:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
    .order-summary { border-left: 4px solid #667eea; }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- SweetAlert2 pour les notifications -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    AOS.init({ duration: 800, easing: 'ease-in-out', once: true });
    
    let currentProductId = null;
    let currentProductPrice = 0;
    let allProducts = <?= json_encode($products) ?>;

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

    // Filtrage par catégorie amélioré
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // Retirer la classe active de tous les boutons
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            // Ajouter la classe active au bouton cliqué
            this.classList.add('active');
            
            const category = this.dataset.category;
            
            // Afficher un loader
            showLoader();
            
            // Filtrer les produits
            filterProducts(category);
        });
    });

    function filterProducts(category) {
        let filteredProducts = allProducts;
        
        if (category !== 'all') {
            filteredProducts = allProducts.filter(product => product.category === category);
        }
        
        // Mettre à jour l'affichage
        updateProductsDisplay(filteredProducts);
        
        // Mettre à jour le compteur
        document.getElementById('total-products').textContent = filteredProducts.length;
        
        // Masquer le loader
        hideLoader();
    }

    function updateProductsDisplay(products) {
        const productsGrid = document.getElementById('products-grid');
        
        if (products.length === 0) {
            productsGrid.innerHTML = `
                <div class="col-12 text-center py-5">
                    <i class="bi bi-search display-1 text-muted mb-3"></i>
                    <h4 class="text-muted">Aucune création dans cette catégorie</h4>
                    <p class="text-muted">Essayez une autre catégorie ou revenez plus tard !</p>
                </div>
            `;
            return;
        }

        let html = '';
        products.forEach((product, index) => {
            html += `
                <div class="col-lg-4 col-md-6 product-item" data-category="${product.category || 'art'}" data-aos="fade-up" data-aos-delay="${index * 100}">
                    <div class="card product-card">
                        <div class="product-image position-relative">
                            <div class="product-category">${capitalizeFirst(product.category || 'Art')}</div>
                            ${product.image ? 
                                `<img src="<?= base_url('uploads/') ?>${product.image}" class="w-100 h-100 object-fit-cover" alt="${escapeHtml(product.name)}">` :
                                '<i class="bi bi-palette"></i>'
                            }
                        </div>
                        <div class="product-body">
                            <h5 class="product-title">${escapeHtml(product.name || 'Création artisanale')}</h5>
                            <p class="product-description">${escapeHtml((product.description || 'Belle création artisanale unique').substring(0, 100))}...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price">${formatPrice(product.price || 0)}</span>
                                <div>
                                    <button class="btn btn-sm btn-outline-primary me-1" onclick="toggleFavorite(${product.id})">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <button class="btn btn-sm btn-success" onclick="openPaymentModal(${product.id}, '${escapeHtml(product.name)}', ${product.price})">
                                        <i class="bi bi-cart-plus"></i> Acheter
                                    </button>
                                </div>
                            </div>
                            <div class="artisan-info">
                                <div class="artisan-avatar">
                                    ${(product.username || 'A').charAt(0).toUpperCase()}
                                </div>
                                <div>
                                    <small class="text-muted">Créé par</small><br>
                                    <strong>${escapeHtml(product.username || 'Artisan')}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
        
        productsGrid.innerHTML = html;
        
        // Réinitialiser les animations AOS
        AOS.refresh();
    }

    function showLoader() {
        const productsGrid = document.getElementById('products-grid');
        productsGrid.innerHTML = `
            <div class="col-12 text-center py-5">
                <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                    <span class="visually-hidden">Chargement...</span>
                </div>
                <h5 class="mt-3 text-muted">Filtrage en cours...</h5>
            </div>
        `;
    }

    function hideLoader() {
        // Le loader est remplacé par le contenu dans updateProductsDisplay
    }

    // Fonctions utilitaires
    function capitalizeFirst(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function formatPrice(price) {
        return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'EUR'
        }).format(price);
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

    function toggleFavorite(productId) {
        // Animation du cœur
        event.target.classList.toggle('text-danger');
        if (event.target.classList.contains('text-danger')) {
            event.target.innerHTML = '<i class="bi bi-heart-fill"></i>';
        } else {
            event.target.innerHTML = '<i class="bi bi-heart"></i>';
        }
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
