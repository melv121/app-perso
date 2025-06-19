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
        .navbar { background: rgba(255,255,255,0.98) !important; backdrop-filter: blur(15px); box-shadow: 0 8px 32px rgba(0,0,0,0.1); border-bottom: 1px solid rgba(212,175,55,0.2); }
        .navbar-brand { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.8rem; color: #1a1a2e !important; }
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
      <a class="nav-link active" href="<?= site_url('contact') ?>">Contact</a>
      <a class="nav-link" href="<?= site_url('collections') ?>">Collections</a>
      
      <?php if ($this->session->userdata('logged_in')): ?>
        <span class="navbar-text me-2">
          <i class="bi bi-person-circle"></i> <?= $this->session->userdata('username') ?>
          <span class="badge bg-<?= $this->session->userdata('type') == 'artisan' ? 'success' : 'primary' ?> ms-1">
            <?= ucfirst($this->session->userdata('type')) ?>
          </span>
        </span>
        <?php if ($this->session->userdata('type') == 'artisan'): ?>
          <a class="nav-link" href="<?= site_url('artisan/dashboard') ?>">Dashboard</a>
        <?php endif; ?>
        <a class="nav-link" href="<?= site_url('logout') ?>">Déconnexion</a>
      <?php else: ?>
        <a class="nav-link" href="<?= site_url('login') ?>">Connexion</a>
        <a class="nav-link" href="<?= site_url('register') ?>">Inscription</a>
      <?php endif; ?>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script>
    AOS.init({ duration: 800, easing: 'ease-in-out', once: true });
</script>
</body>
</html>
