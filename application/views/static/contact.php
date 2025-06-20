<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Contact - La Galerie Artisanale</title>
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
            .navbar-text { padding: 0.5rem 1rem !important; font-size: 0.85rem; }
            .contact-section { padding: 100px 0; margin-top: 60px; }
        }
        
        /* Smartphone très compact */
        @media (max-width: 576px) {
            .navbar { padding: 0.3rem 0; }
            .navbar-brand { font-size: 1.1rem; }
            .contact-section { padding: 80px 0; margin-top: 50px; }
            .contact-card { padding: 2rem; border-radius: 20px; }
            .section-title { font-size: 2rem; }
        }
        
        .contact-section { padding: 120px 0; }
        .contact-card { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 1px solid rgba(44,90,160,0.1); border-radius: 28px; padding: 3.5rem; box-shadow: 0 25px 60px rgba(0,0,0,0.15); position: relative; }
        .contact-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 5px; background: linear-gradient(90deg, #2c5aa0, #d4af37, #1a1a2e); border-radius: 28px 28px 0 0; }
        .section-title { font-family: 'Playfair Display', serif; font-size: 3rem; color: white; margin-bottom: 4rem; text-align: center; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }
        .contact-info { background: linear-gradient(135deg, #2c5aa0 0%, #1a1a2e 100%); border-radius: 24px; padding: 3rem; color: white; height: 100%; position: relative; overflow: hidden; }
        .contact-info::after { content: ''; position: absolute; top: -50%; right: -50%; width: 200px; height: 200px; background: radial-gradient(circle, rgba(212,175,55,0.2) 0%, transparent 70%); border-radius: 50%; }
        .contact-info h4 { font-family: 'Playfair Display', serif; margin-bottom: 2rem; font-weight: 700; position: relative; z-index: 2; }
        .contact-item { display: flex; align-items: center; margin-bottom: 2rem; position: relative; z-index: 2; }
        .contact-item i { font-size: 1.8rem; margin-right: 1.5rem; background: linear-gradient(45deg, #d4af37, #ffd700); color: #1a1a2e; padding: 12px; border-radius: 12px; box-shadow: 0 5px 15px rgba(212,175,55,0.3); }
        .form-floating label { color: #6c757d; font-weight: 500; }
        .form-control, .form-select { border-radius: 15px; border: 2px solid #e9ecef; transition: all 0.3s ease; background: rgba(255,255,255,0.9); }
        .form-control:focus, .form-select:focus { border-color: #2c5aa0; box-shadow: 0 0 0 0.2rem rgba(44,90,160,0.25); background: white; }
        .btn-contact { background: linear-gradient(135deg, #d4af37 0%, #ffd700 100%); color: #1a1a2e; border: none; padding: 18px 45px; font-weight: 700; border-radius: 50px; transition: all 0.4s ease; text-transform: uppercase; letter-spacing: 1px; }
        .btn-contact:hover { transform: translateY(-3px); box-shadow: 0 15px 35px rgba(212,175,55,0.4); color: #1a1a2e; }
        .navbar-nav .nav-link { color: #1a1a2e !important; font-weight: 600; margin: 0 15px; transition: all 0.3s ease; }
        .navbar-nav .nav-link:hover { color: #2c5aa0 !important; }
        .navbar-nav .nav-link.active { color: #d4af37 !important; font-weight: 700; }
        .badge-user { background: linear-gradient(45deg, #2c5aa0, #1a1a2e); border: none; padding: 10px 20px; border-radius: 25px; font-weight: 600; }
        
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
      <div class="navbar-nav ms-auto">
        <a class="nav-link" href="<?php echo site_url('/'); ?>">Accueil</a>
        <a class="nav-link" href="<?php echo site_url('about'); ?>">À propos</a>
        <a class="nav-link active" href="<?php echo site_url('contact'); ?>">Contact</a>
        <a class="nav-link" href="<?php echo site_url('collections'); ?>">Collections</a>
        
        <?php if ($this->session->userdata('logged_in')): ?>
          <span class="navbar-text me-2">
            <i class="bi bi-person-circle"></i> <?php echo $this->session->userdata('username'); ?>
            <span class="badge bg-<?php echo $this->session->userdata('type') == 'artisan' ? 'success' : 'primary'; ?> ms-1">
              <?php echo ucfirst($this->session->userdata('type')); ?>
            </span>
          </span>
          <?php if ($this->session->userdata('type') == 'artisan'): ?>
            <a class="nav-link" href="<?php echo site_url('artisan/dashboard'); ?>">Dashboard</a>
          <?php endif; ?>
          <a class="nav-link" href="<?php echo site_url('logout'); ?>">Déconnexion</a>
        <?php else: ?>
          <a class="nav-link" href="<?php echo site_url('login'); ?>">Connexion</a>
          <a class="nav-link" href="<?php echo site_url('register'); ?>">Inscription</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>

<section class="contact-section">
    <div class="container">
        <h1 class="section-title">Contactez-nous</h1>
        <div class="row g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="contact-info">
                    <h4><i class="bi bi-chat-heart"></i> Parlons ensemble</h4>
                    <p class="mb-4">Nous sommes là pour répondre à toutes vos questions concernant La Galerie Artisanale.</p>
                    
                    <div class="contact-item">
                        <i class="bi bi-envelope"></i>
                        <div>
                            <strong>Email</strong><br>
                            contact@lagalerie-artisanale.fr
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="bi bi-telephone"></i>
                        <div>
                            <strong>Téléphone</strong><br>
                            01 23 45 67 89
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="bi bi-geo-alt"></i>
                        <div>
                            <strong>Adresse</strong><br>
                            123 Rue de l'Artisanat<br>
                            75000 Paris, France
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="bi bi-clock"></i>
                        <div>
                            <strong>Horaires</strong><br>
                            Lun - Ven : 9h00 - 18h00<br>
                            Sam : 10h00 - 16h00
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <div class="contact-card">
                    <h4 class="mb-4" style="color: #2c3e50; font-family: 'Playfair Display', serif;">
                        <i class="bi bi-send"></i> Envoyez-nous un message
                    </h4>
                    
                    <form>
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
                        </div>
                        
                        <div class="form-floating mt-3">
                            <input type="email" class="form-control" id="email" placeholder="Email" required>
                            <label for="email">Adresse email</label>
                        </div>
                        
                        <div class="form-floating mt-3">
                            <select class="form-control" id="subject">
                                <option value="">Choisissez un sujet</option>
                                <option value="general">Question générale</option>
                                <option value="artisan">Devenir artisan</option>
                                <option value="technique">Support technique</option>
                                <option value="partenariat">Partenariat</option>
                            </select>
                            <label for="subject">Sujet</label>
                        </div>
                        
                        <div class="form-floating mt-3">
                            <textarea class="form-control" id="message" style="height: 120px" placeholder="Message" required></textarea>
                            <label for="message">Votre message</label>
                        </div>
                        
                        <button type="submit" class="btn btn-contact btn-lg w-100 mt-4">
                            <i class="bi bi-send"></i> Envoyer le message
                        </button>
                    </form>
                </div>
            </div>
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
                    <p class="mb-3">Contactez-nous pour toutes vos questions sur notre plateforme artisanale.</p>
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
                    <h5>Contact</h5>
                    <ul class="footer-links">
                        <li><a href="<?php echo site_url('contact'); ?>">Nous contacter</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Live Chat</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h5>Nos horaires</h5>
                    <ul class="footer-links">
                        <li>Lun - Ven : 9h00 - 18h00</li>
                        <li>Samedi : 10h00 - 16h00</li>
                        <li>Dimanche : Fermé</li>
                        <li>Support 24h/7j en ligne</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h5>Coordonnées</h5>
                    <ul class="footer-links">
                        <li><i class="bi bi-geo-alt"></i> 123 Rue de l'Artisanat, Paris</li>
                        <li><i class="bi bi-telephone"></i> 01 23 45 67 89</li>
                        <li><i class="bi bi-envelope"></i> contact@lagalerie-artisanale.fr</li>
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
                    <p>Votre satisfaction, notre priorité</p>
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
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                // Fermer le menu mobile si ouvert
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
            const isClickInsideNav = navbar.contains(event.target);
            
            if (!isClickInsideNav && navbarCollapse.classList.contains('show')) {
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
