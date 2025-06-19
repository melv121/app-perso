<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Dashboard Artisan - Marketplace Artisanale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%); min-height: 100vh; }
        .navbar { background: rgba(255,255,255,0.98) !important; backdrop-filter: blur(15px); box-shadow: 0 8px 32px rgba(0,0,0,0.1); border-bottom: 1px solid rgba(212,175,55,0.2); }
        .navbar-brand { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.8rem; color: #1a1a2e !important; }
        
        .dashboard-header { background: linear-gradient(135deg, #2c5aa0 0%, #1a1a2e 50%, #0f0f23 100%); padding: 60px 0; color: white; margin-bottom: 3rem; position: relative; overflow: hidden; }
        .dashboard-header::before { content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.05"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>'); }
        .welcome-card { background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.18); border-radius: 24px; padding: 2.5rem; backdrop-filter: blur(20px); position: relative; z-index: 2; }
        .profile-avatar { width: 90px; height: 90px; background: linear-gradient(45deg, #d4af37, #ffd700); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2.2rem; color: #1a1a2e; box-shadow: 0 8px 25px rgba(212,175,55,0.3); }
        
        .stats-row { margin-bottom: 3rem; }
        .stat-card { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border-radius: 24px; padding: 2.5rem; box-shadow: 0 15px 35px rgba(0,0,0,0.08), 0 5px 15px rgba(0,0,0,0.05); border: 1px solid rgba(44,90,160,0.1); text-align: center; position: relative; overflow: hidden; transition: all 0.3s ease; }
        .stat-card:hover { transform: translateY(-8px); box-shadow: 0 25px 50px rgba(0,0,0,0.15); }
        .stat-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 5px; background: linear-gradient(90deg, #2c5aa0, #1a1a2e, #d4af37); }
        .stat-icon { width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 1.8rem; color: white; }
        .stat-number { font-size: 3rem; font-weight: 800; color: #1a1a2e; margin-bottom: 0.8rem; }
        .stat-label { color: #6c757d; font-size: 1rem; font-weight: 500; }
        
        .action-card { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 1px solid rgba(44,90,160,0.1); border-radius: 24px; padding: 2.5rem; box-shadow: 0 12px 28px rgba(0,0,0,0.08); text-align: center; transition: all 0.4s ease; height: 100%; position: relative; overflow: hidden; }
        .action-card::after { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(212,175,55,0.1), transparent); transition: left 0.5s; }
        .action-card:hover { transform: translateY(-10px) scale(1.02); box-shadow: 0 25px 50px rgba(0,0,0,0.15); border-color: rgba(212,175,55,0.3); }
        .action-card:hover::after { left: 100%; }
        .action-icon { width: 90px; height: 90px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.8rem; font-size: 2.2rem; color: white; position: relative; z-index: 2; }
        .action-title { font-family: 'Playfair Display', serif; font-size: 1.4rem; color: #1a1a2e; margin-bottom: 1.2rem; font-weight: 600; }
        .btn-action { border: none; padding: 14px 32px; font-weight: 600; border-radius: 50px; transition: all 0.3s ease; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.9rem; }
        
        .products-section { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 1px solid rgba(44,90,160,0.1); border-radius: 28px; padding: 3rem; box-shadow: 0 20px 40px rgba(0,0,0,0.08); }
        .section-header { display: flex; justify-content: between; align-items: center; margin-bottom: 2.5rem; }
        .section-title { font-family: 'Playfair Display', serif; font-size: 2rem; color: #1a1a2e; margin: 0; font-weight: 700; }
        
        .product-item { background: linear-gradient(145deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid rgba(44,90,160,0.08); border-radius: 20px; padding: 2rem; margin-bottom: 1.5rem; transition: all 0.3s ease; position: relative; }
        .product-item::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background: linear-gradient(to bottom, #2c5aa0, #d4af37); border-radius: 20px 0 0 20px; opacity: 0; transition: opacity 0.3s ease; }
        .product-item:hover { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); transform: translateX(8px); border-color: rgba(212,175,55,0.3); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
        .product-item:hover::before { opacity: 1; }
        .product-name { font-weight: 700; color: #1a1a2e; margin-bottom: 0.8rem; font-size: 1.1rem; }
        .product-description { color: #6c757d; font-size: 0.95rem; margin-bottom: 0.8rem; line-height: 1.5; }
        .product-price { color: #2c5aa0; font-weight: 800; font-size: 1.3rem; }
        .product-actions { display: flex; gap: 12px; }
        
        .empty-state { text-align: center; padding: 4rem; color: #6c757d; }
        .empty-icon { font-size: 5rem; margin-bottom: 1.5rem; opacity: 0.3; color: #2c5aa0; }
        
        .navbar-nav .nav-link { color: #1a1a2e !important; font-weight: 600; margin: 0 15px; transition: all 0.3s ease; position: relative; }
        .navbar-nav .nav-link:hover { color: #2c5aa0 !important; }
        .navbar-nav .nav-link.active::after { content: ''; position: absolute; bottom: -5px; left: 50%; transform: translateX(-50%); width: 30px; height: 3px; background: linear-gradient(90deg, #2c5aa0, #d4af37); border-radius: 2px; }
        .navbar-text { color: #1a1a2e !important; font-weight: 600; }
        
        .chart-container { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 1px solid rgba(44,90,160,0.1); border-radius: 24px; padding: 2.5rem; box-shadow: 0 15px 35px rgba(0,0,0,0.08); margin-bottom: 3rem; }
        .progress-custom { height: 10px; border-radius: 10px; background: linear-gradient(90deg, #e9ecef, #f8f9fa); }
        .progress-bar-custom { background: linear-gradient(90deg, #2c5aa0, #1a1a2e, #d4af37); border-radius: 10px; position: relative; overflow: hidden; }
        .progress-bar-custom::after { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent); animation: shimmer 2s infinite; }
        
        @keyframes shimmer { 0% { left: -100%; } 100% { left: 100%; } }
        
        /* Nouvelles couleurs pour les icônes */
        .icon-blue { background: linear-gradient(135deg, #2c5aa0 0%, #1a1a2e 100%); }
        .icon-gold { background: linear-gradient(135deg, #d4af37 0%, #ffd700 100%); }
        .icon-dark { background: linear-gradient(135deg, #1a1a2e 0%, #000000 100%); }
        .icon-gray { background: linear-gradient(135deg, #6c757d 0%, #495057 100%); }
        
        .btn-primary-custom { background: linear-gradient(135deg, #2c5aa0 0%, #1a1a2e 100%); color: white; }
        .btn-gold-custom { background: linear-gradient(135deg, #d4af37 0%, #ffd700 100%); color: #1a1a2e; }
        .btn-dark-custom { background: linear-gradient(135deg, #1a1a2e 0%, #000000 100%); color: white; }
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
      <a class="nav-link active" href="<?= site_url('artisan/dashboard') ?>">Dashboard</a>
      <a class="nav-link" href="<?= site_url('products/add') ?>">Ajouter produit</a>
      <span class="navbar-text">
        <i class="bi bi-person-circle"></i> <?= $this->session->userdata('username') ?>
      </span>
      <a class="nav-link" href="<?= site_url('logout') ?>">Déconnexion</a>
    </div>
  </div>
</nav>

<!-- Header Dashboard -->
<section class="dashboard-header">
    <div class="container">
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle"></i> <?= $this->session->flashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-exclamation-triangle"></i> <?= $this->session->flashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="welcome-card" data-aos="fade-right">
                    <div class="d-flex align-items-center">
                        <div class="profile-avatar me-3">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h2 style="margin-bottom: 0.5rem;">Bienvenue <?= $this->session->userdata('username') ?> !</h2>
                            <p style="margin: 0; opacity: 0.9;">Gérez vos créations et suivez vos performances</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end" data-aos="fade-left">
                <a href="<?= site_url('products/add') ?>" class="btn btn-light btn-lg">
                    <i class="bi bi-plus-circle"></i> Nouvelle Création
                </a>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <!-- Statistiques -->
    <div class="stats-row">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card">
                    <div class="stat-icon icon-blue">
                        <i class="bi bi-palette"></i>
                    </div>
                    <div class="stat-number"><?= count($products) ?></div>
                    <div class="stat-label">Créations</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card">
                    <div class="stat-icon icon-gold">
                        <i class="bi bi-eye"></i>
                    </div>
                    <div class="stat-number">248</div>
                    <div class="stat-label">Vues ce mois</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card">
                    <div class="stat-icon icon-dark">
                        <i class="bi bi-cart-check"></i>
                    </div>
                    <div class="stat-number">12</div>
                    <div class="stat-label">Ventes</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-card">
                    <div class="stat-icon icon-gray">
                        <i class="bi bi-currency-euro"></i>
                    </div>
                    <div class="stat-number">1,250€</div>
                    <div class="stat-label">Chiffre d'affaires</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions rapides -->
    <div class="row g-4 mb-5">
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="action-card">
                <div class="action-icon icon-blue">
                    <i class="bi bi-plus-circle"></i>
                </div>
                <h4 class="action-title">Ajouter une Création</h4>
                <p class="text-muted mb-3">Partagez votre dernière œuvre avec la communauté</p>
                <a href="<?= site_url('products/add') ?>" class="btn btn-action btn-primary-custom">
                    Créer maintenant
                </a>
            </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="action-card">
                <div class="action-icon icon-gold">
                    <i class="bi bi-person-badge"></i>
                </div>
                <h4 class="action-title">Modifier mon Profil</h4>
                <p class="text-muted mb-3">Mettez à jour vos informations artisan</p>
                <a href="<?= site_url('artisan/devenir') ?>" class="btn btn-action btn-gold-custom">
                    Modifier
                </a>
            </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="action-card">
                <div class="action-icon icon-dark">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <h4 class="action-title">Voir les Statistiques</h4>
                <p class="text-muted mb-3">Analysez les performances de vos créations</p>
                <button class="btn btn-action btn-dark-custom" onclick="showStats()">
                    Analyser
                </button>
            </div>
        </div>
    </div>

    <!-- Graphique des ventes (simulation) -->
    <div class="chart-container" data-aos="fade-up">
        <h5 class="mb-4"><i class="bi bi-graph-up"></i> Performance de vos créations</h5>
        <div class="row">
            <div class="col-lg-8">
                <canvas id="salesChart" style="max-height: 300px;"></canvas>
            </div>
            <div class="col-lg-4">
                <h6 class="mb-3">Catégories populaires</h6>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Bijoux</span>
                        <span>65%</span>
                    </div>
                    <div class="progress-custom">
                        <div class="progress-bar-custom" style="width: 65%"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Poterie</span>
                        <span>45%</span>
                    </div>
                    <div class="progress-custom">
                        <div class="progress-bar-custom" style="width: 45%"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Textile</span>
                        <span>30%</span>
                    </div>
                    <div class="progress-custom">
                        <div class="progress-bar-custom" style="width: 30%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Produits -->
    <div class="products-section" data-aos="fade-up">
        <div class="section-header">
            <h3 class="section-title">Mes Créations</h3>
            <a href="<?= site_url('products/add') ?>" class="btn btn-primary-custom">
                <i class="bi bi-plus"></i> Ajouter
            </a>
        </div>
        
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $p): ?>
                <div class="product-item" data-aos="fade-up">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h5 class="product-name"><?= htmlspecialchars($p->name ?? '') ?></h5>
                            <p class="product-description"><?= htmlspecialchars(substr($p->description ?? '', 0, 100)) ?>...</p>
                            <span class="badge" style="background: linear-gradient(45deg, #667eea, #764ba2); color: white;">
                                <?= ucfirst($p->category ?? 'Art') ?>
                            </span>
                        </div>
                        <div class="col-lg-2 text-center">
                            <div class="product-price"><?= number_format($p->price ?? 0, 2) ?> €</div>
                        </div>
                        <div class="col-lg-2">
                            <div class="product-actions">
                                <a href="<?= site_url('products/edit/'.$p->id) ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="<?= site_url('products/delete/'.$p->id) ?>" class="btn btn-sm btn-outline-danger" 
                                   onclick="return confirm('Supprimer cette création ?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="bi bi-palette"></i>
                </div>
                <h4>Aucune création pour le moment</h4>
                <p>Commencez par ajouter votre première œuvre d'art !</p>
                <a href="<?= site_url('products/add') ?>" class="btn btn-lg btn-primary-custom">
                    <i class="bi bi-plus-circle"></i> Créer ma première œuvre
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    AOS.init({ duration: 800, easing: 'ease-in-out', once: true });
    
    // Graphique des ventes
    const ctx = document.getElementById('salesChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Ventes',
                    data: [12, 19, 8, 15, 25, 22],
                    borderColor: 'rgb(102, 126, 234)',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }
    
    function showStats() {
        Swal.fire({
            icon: 'info',
            title: 'Statistiques détaillées',
            html: `
                <div class="text-start">
                    <p><strong>📈 Croissance :</strong> +15% ce mois</p>
                    <p><strong>👀 Vues moyennes :</strong> 45 par création</p>
                    <p><strong>💰 Prix moyen :</strong> 85€</p>
                    <p><strong>⭐ Note moyenne :</strong> 4.8/5</p>
                </div>
            `,
            confirmButtonColor: '#667eea'
        });
    }
</script>
</body>
</html>
