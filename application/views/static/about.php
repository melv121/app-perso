<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>À propos - La Galerie Artisanale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%); min-height: 100vh; }
        .navbar { background: rgba(255,255,255,0.98) !important; backdrop-filter: blur(15px); box-shadow: 0 8px 32px rgba(0,0,0,0.1); border-bottom: 1px solid rgba(212,175,55,0.2); }
        .navbar-brand { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.8rem; color: #1a1a2e !important; }
        
        .hero-about { background: linear-gradient(135deg, #2c5aa0 0%, #1a1a2e 100%); padding: 140px 0 100px; color: white; position: relative; overflow: hidden; }
        .hero-about::before { content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>'); }
        .hero-content { position: relative; z-index: 2; }
        .hero-title { font-family: 'Playfair Display', serif; font-size: 4rem; font-weight: 800; margin-bottom: 2rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }
        .hero-subtitle { font-size: 1.4rem; opacity: 0.95; max-width: 600px; margin: 0 auto; }
        
        .values-section { padding: 120px 0; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); }
        .mission-section { padding: 120px 0; background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); }
        .team-section { padding: 120px 0; background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); color: white; }
        .stats-section { padding: 100px 0; background: linear-gradient(135deg, #2c5aa0 0%, #1a1a2e 100%); color: white; }
        
        .section-title { font-family: 'Playfair Display', serif; font-size: 3rem; color: #1a1a2e; margin-bottom: 4rem; text-align: center; position: relative; font-weight: 700; }
        .section-title::after { content: ''; position: absolute; bottom: -20px; left: 50%; transform: translateX(-50%); width: 100px; height: 5px; background: linear-gradient(90deg, #2c5aa0, #d4af37); border-radius: 3px; }
        .section-subtitle { font-size: 1.3rem; color: #6c757d; text-align: center; margin-bottom: 5rem; max-width: 700px; margin-left: auto; margin-right: auto; }
        
        .value-card { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 1px solid rgba(44,90,160,0.1); border-radius: 28px; padding: 3.5rem; text-align: center; box-shadow: 0 20px 45px rgba(0,0,0,0.1); transition: all 0.4s ease; height: 100%; position: relative; overflow: hidden; }
        .value-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 5px; background: linear-gradient(90deg, #2c5aa0, #d4af37); border-radius: 28px 28px 0 0; }
        .value-card:hover { transform: translateY(-15px); box-shadow: 0 35px 70px rgba(0,0,0,0.2); }
        .value-icon { width: 100px; height: 100px; background: linear-gradient(135deg, #2c5aa0 0%, #1a1a2e 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; color: white; font-size: 2.5rem; box-shadow: 0 10px 30px rgba(44,90,160,0.3); }
        .value-title { font-family: 'Playfair Display', serif; font-size: 1.6rem; color: #1a1a2e; margin-bottom: 1.5rem; font-weight: 600; }
        
        .mission-content { background: linear-gradient(135deg, #2c5aa0 0%, #1a1a2e 100%); border-radius: 28px; padding: 4.5rem; color: white; position: relative; overflow: hidden; }
        .mission-content::before { content: ''; position: absolute; top: -60%; right: -60%; width: 300px; height: 300px; background: radial-gradient(circle, rgba(212,175,55,0.2) 0%, transparent 70%); border-radius: 50%; }
        .mission-text { font-size: 1.4rem; line-height: 1.8; margin-bottom: 2.5rem; position: relative; z-index: 2; }
        .mission-highlight { background: rgba(212,175,55,0.15); border: 1px solid rgba(212,175,55,0.3); padding: 2.5rem; border-radius: 20px; position: relative; z-index: 2; }
        
        .team-member { text-align: center; }
        .team-avatar { width: 140px; height: 140px; border-radius: 50%; background: linear-gradient(45deg, #d4af37, #ffd700); display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; color: #1a1a2e; font-size: 3.5rem; box-shadow: 0 15px 40px rgba(212,175,55,0.3); }
        .team-name { font-family: 'Playfair Display', serif; font-size: 1.4rem; color: white; margin-bottom: 0.8rem; font-weight: 600; }
        .team-role { color: #d4af37; font-weight: 700; margin-bottom: 1.5rem; }
        .team-bio { color: rgba(255,255,255,0.8); font-size: 0.95rem; }
        
        .stat-item { text-align: center; margin-bottom: 2rem; }
        .stat-number { font-size: 4rem; font-weight: 800; margin-bottom: 0.8rem; }
        .stat-label { font-size: 1.2rem; opacity: 0.9; }
        
        .cta-section { padding: 120px 0; background: linear-gradient(135deg, #1a1a2e 0%, #000000 100%); color: white; text-align: center; }
        .cta-title { font-family: 'Playfair Display', serif; font-size: 3rem; margin-bottom: 2rem; font-weight: 700; }
        .btn-cta { background: linear-gradient(45deg, #d4af37, #ffd700); color: #1a1a2e; border: none; padding: 18px 45px; font-weight: 700; border-radius: 50px; margin: 0 15px; transition: all 0.4s ease; text-transform: uppercase; letter-spacing: 1px; }
        .btn-cta:hover { transform: translateY(-3px); box-shadow: 0 15px 35px rgba(212,175,55,0.4); color: #1a1a2e; }
        
        .navbar-nav .nav-link { color: #1a1a2e !important; font-weight: 600; margin: 0 15px; transition: all 0.3s ease; }
        .navbar-nav .nav-link:hover { color: #2c5aa0 !important; }
        .navbar-nav .nav-link.active { color: #d4af37 !important; font-weight: 700; }
        .badge-user { background: linear-gradient(45deg, #2c5aa0, #1a1a2e); border: none; padding: 10px 20px; border-radius: 25px; font-weight: 600; }
        
        .timeline { position: relative; padding: 2rem 0; }
        .timeline::before { content: ''; position: absolute; left: 50%; top: 0; bottom: 0; width: 4px; background: linear-gradient(to bottom, #667eea, #764ba2); transform: translateX(-50%); }
        .timeline-item { position: relative; margin-bottom: 3rem; }
        .timeline-content { background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); width: 45%; }
        .timeline-item:nth-child(odd) .timeline-content { margin-left: 55%; }
        .timeline-item:nth-child(even) .timeline-content { margin-right: 55%; }
        .timeline-dot { position: absolute; left: 50%; top: 2rem; width: 20px; height: 20px; background: #667eea; border-radius: 50%; transform: translateX(-50%); border: 4px solid white; box-shadow: 0 0 0 4px #667eea; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url('/') ?>">
        <i class="bi bi-palette"></i> La Galerie Artisanale
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="<?= site_url('/') ?>"><i class="bi bi-house"></i> Accueil</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('collections') ?>"><i class="bi bi-grid"></i> Collections</a></li>
        <li class="nav-item"><a class="nav-link active" href="<?= site_url('about') ?>"><i class="bi bi-info-circle"></i> À propos</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('contact') ?>"><i class="bi bi-envelope"></i> Contact</a></li>
        
        <?php if ($this->session->userdata('logged_in')): ?>
          <li class="nav-item">
            <span class="navbar-text me-3">
              <i class="bi bi-person-circle"></i> <?= $this->session->userdata('username') ?>
              <span class="badge badge-user ms-2">
                <?= ucfirst($this->session->userdata('type')) ?>
              </span>
            </span>
          </li>
          <?php if ($this->session->userdata('type') == 'artisan'): ?>
            <li class="nav-item"><a class="nav-link" href="<?= site_url('artisan/dashboard') ?>"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
          <?php endif; ?>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('logout') ?>"><i class="bi bi-box-arrow-right"></i> Déconnexion</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('login') ?>"><i class="bi bi-box-arrow-in-right"></i> Connexion</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('register') ?>"><i class="bi bi-person-plus"></i> Inscription</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero-about">
    <div class="container text-center">
        <div class="hero-content">
            <h1 class="hero-title" data-aos="fade-up">Notre Histoire</h1>
            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                Une passion pour l'artisanat authentique et la promotion du savoir-faire français
            </p>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="mission-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="section-title text-start">Notre Mission</h2>
                <p class="section-subtitle text-start">Connecter les artisans passionnés avec les amateurs d'art authentique</p>
                <p style="font-size: 1.1rem; color: #6c757d; line-height: 1.8;">
                    Nous croyons que chaque création artisanale raconte une histoire unique. Notre plateforme met en lumière 
                    le talent et la passion des artisans français, en leur offrant un espace pour partager leurs œuvres 
                    avec des collectionneurs et amateurs d'art du monde entier.
                </p>
                <div class="d-flex gap-3 mt-4">
                    <div class="text-center">
                        <div style="width: 60px; height: 60px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; margin: 0 auto 10px;">
                            <i class="bi bi-heart"></i>
                        </div>
                        <small class="text-muted">Passion</small>
                    </div>
                    <div class="text-center">
                        <div style="width: 60px; height: 60px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; margin: 0 auto 10px;">
                            <i class="bi bi-gem"></i>
                        </div>
                        <small class="text-muted">Qualité</small>
                    </div>
                    <div class="text-center">
                        <div style="width: 60px; height: 60px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; margin: 0 auto 10px;">
                            <i class="bi bi-people"></i>
                        </div>
                        <small class="text-muted">Communauté</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="mission-content">
                    <div class="mission-text">
                        "L'artisanat, c'est l'âme qui se révèle à travers les mains. Chaque pièce créée porte en elle l'empreinte unique de son créateur."
                    </div>
                    <div class="mission-highlight">
                        <strong>Notre engagement :</strong> Valoriser le travail artisanal français et créer des liens durables entre créateurs et collectionneurs.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values-section">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Nos Valeurs</h2>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
            Les principes qui guident chacune de nos actions
        </p>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4 class="value-title">Authenticité</h4>
                    <p>Nous garantissons l'authenticité de chaque création et la vérification de chaque artisan partenaire.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="bi bi-award"></i>
                    </div>
                    <h4 class="value-title">Excellence</h4>
                    <p>Nous sélectionnons uniquement des créations d'exception qui reflètent un savoir-faire remarquable.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="bi bi-globe-europe-africa"></i>
                    </div>
                    <h4 class="value-title">Proximité</h4>
                    <p>Nous favorisons les circuits courts et soutenons l'économie locale française.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="bi bi-lightbulb"></i>
                    </div>
                    <h4 class="value-title">Innovation</h4>
                    <p>Nous encourageons la créativité et l'innovation dans le respect des traditions artisanales.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-number" data-count="150">0</div>
                    <div class="stat-label">Artisans Partenaires</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-number" data-count="2500">0</div>
                    <div class="stat-label">Créations Vendues</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-number" data-count="5000">0</div>
                    <div class="stat-label">Clients Satisfaits</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-number" data-count="15">0</div>
                    <div class="stat-label">Régions Représentées</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Notre Équipe</h2>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
            Des passionnés au service de l'artisanat français
        </p>
        <div class="row g-5">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="team-member">
                    <div class="team-avatar">
                        <i class="bi bi-person"></i>
                    </div>
                    <h4 class="team-name">Marie Dubois</h4>
                    <div class="team-role">Fondatrice & CEO</div>
                    <p class="team-bio">Passionnée d'art et d'artisanat depuis l'enfance, Marie a créé cette plateforme pour connecter les artisans avec leurs futurs collectionneurs.</p>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="team-member">
                    <div class="team-avatar">
                        <i class="bi bi-brush"></i>
                    </div>
                    <h4 class="team-name">Pierre Martin</h4>
                    <div class="team-role">Directeur Artistique</div>
                    <p class="team-bio">Ancien directeur de galerie, Pierre sélectionne avec soin chaque artisan et veille à la qualité exceptionnelle de nos créations.</p>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                <div class="team-member">
                    <div class="team-avatar">
                        <i class="bi bi-code"></i>
                    </div>
                    <h4 class="team-name">Julie Rousseau</h4>
                    <div class="team-role">Responsable Technique</div>
                    <p class="team-bio">Développeuse expérimentée, Julie s'assure que notre plateforme offre la meilleure expérience possible à nos utilisateurs.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2 class="cta-title" data-aos="fade-up">Rejoignez l'Aventure</h2>
        <p data-aos="fade-up" data-aos-delay="100" style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9;">
            Que vous soyez artisan ou amateur d'art, notre communauté vous attend
        </p>
        <div data-aos="fade-up" data-aos-delay="200">
            <a href="<?= site_url('register') ?>" class="btn btn-cta btn-lg">
                <i class="bi bi-person-plus"></i> Devenir Artisan
            </a>
            <a href="<?= site_url('collections') ?>" class="btn btn-cta btn-lg">
                <i class="bi bi-eye"></i> Découvrir les Créations
            </a>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script>
    AOS.init({ duration: 800, easing: 'ease-in-out', once: true });
    
    // Animation des compteurs
    function animateCounters() {
        const counters = document.querySelectorAll('[data-count]');
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-count'));
            const increment = target / 100;
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.floor(current).toLocaleString();
                }
            }, 20);
        });
    }
    
    // Observer pour déclencher l'animation des compteurs
    const statsSection = document.querySelector('.stats-section');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                observer.unobserve(entry.target);
            }
        });
    });
    
    if (statsSection) {
        observer.observe(statsSection);
    }
</script>
</body>
</html>
