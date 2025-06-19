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
        .navbar { background: rgba(255,255,255,0.98) !important; backdrop-filter: blur(15px); box-shadow: 0 8px 32px rgba(0,0,0,0.1); border-bottom: 1px solid rgba(212,175,55,0.2); }
        .navbar-brand { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.8rem; color: #1a1a2e !important; }
        .register-section { padding: 140px 0; }
        .register-card { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 1px solid rgba(44,90,160,0.1); border-radius: 28px; padding: 3.5rem; box-shadow: 0 25px 60px rgba(0,0,0,0.15); position: relative; overflow: hidden; }
        .register-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 5px; background: linear-gradient(90deg, #2c5aa0, #d4af37, #1a1a2e); }
        
        .user-type-selection { margin-bottom: 2.5rem; }
        .type-option { border: 2px solid #e9ecef; border-radius: 20px; padding: 2rem; text-align: center; cursor: pointer; transition: all 0.4s ease; background: white; margin-bottom: 1rem; }
        .type-option:hover { border-color: #2c5aa0; transform: translateY(-3px); box-shadow: 0 8px 25px rgba(44,90,160,0.2); }
        .type-option.selected { background: linear-gradient(135deg, #2c5aa0 0%, #1a1a2e 100%); color: white; border-color: #2c5aa0; transform: translateY(-3px); box-shadow: 0 12px 30px rgba(44,90,160,0.3); }
        .type-icon { font-size: 3rem; margin-bottom: 1rem; }
        .type-title { font-family: 'Playfair Display', serif; font-size: 1.5rem; font-weight: 700; margin-bottom: 0.5rem; }
        .type-description { font-size: 0.9rem; opacity: 0.8; }
        
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
        .alert-success { background: linear-gradient(45deg, rgba(212,175,55,0.15), rgba(44,90,160,0.1)); border: 1px solid rgba(212,175,55,0.3); border-radius: 15px; color: #1a1a2e; }
        .alert-danger { background: linear-gradient(45deg, rgba(220,53,69,0.15), rgba(44,90,160,0.1)); border: 1px solid rgba(220,53,69,0.3); border-radius: 15px; }
        
        .password-strength { margin-top: 0.5rem; }
        .strength-bar { height: 5px; border-radius: 3px; background: #e9ecef; overflow: hidden; }
        .strength-fill { height: 100%; transition: all 0.3s ease; border-radius: 3px; }
        .strength-weak { background: #dc3545; width: 25%; }
        .strength-medium { background: #ffc107; width: 50%; }
        .strength-strong { background: #28a745; width: 75%; }
        .strength-very-strong { background: linear-gradient(45deg, #2c5aa0, #d4af37); width: 100%; }
        
        .features-list { background: rgba(44,90,160,0.05); border-radius: 15px; padding: 1.5rem; margin-top: 2rem; }
        .feature-item { display: flex; align-items: center; margin-bottom: 0.8rem; }
        .feature-item i { color: #d4af37; margin-right: 10px; font-size: 1.1rem; }
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
      <a class="nav-link" href="<?= site_url('login') ?>">Connexion</a>
      <a class="nav-link active" href="<?= site_url('register') ?>">Inscription</a>
    </div>
  </div>
</nav>

<section class="register-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="register-card">
                    <div class="text-center mb-4">
                        <h3 class="register-title">
                            <i class="bi bi-person-plus" style="color: #d4af37;"></i> Rejoignez-nous
                        </h3>
                        <p class="register-subtitle">Créez votre compte et découvrez l'artisanat français</p>
                    </div>
                    
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
                    <?php endif; ?>
                    
                    <form method="post" id="registerForm">
                        <!-- Sélection du type d'utilisateur -->
                        <div class="user-type-selection">
                            <h5 class="mb-3 text-center" style="color: #1a1a2e; font-family: 'Playfair Display', serif;">
                                <i class="bi bi-person-badge"></i> Quel est votre profil ?
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="type-option" data-type="client">
                                        <div class="type-icon">
                                            <i class="bi bi-heart"></i>
                                        </div>
                                        <h6 class="type-title">Amateur d'Art</h6>
                                        <p class="type-description">Je souhaite découvrir et acheter des créations artisanales uniques</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="type-option" data-type="artisan">
                                        <div class="type-icon">
                                            <i class="bi bi-palette"></i>
                                        </div>
                                        <h6 class="type-title">Artisan Créateur</h6>
                                        <p class="type-description">Je veux partager et vendre mes créations artisanales</p>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="type" id="selectedType" required>
                        </div>
                        
                        <!-- Informations personnelles -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Nom d'utilisateur" required>
                                    <label for="username"><i class="bi bi-person"></i> Nom d'utilisateur</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                                    <label for="email"><i class="bi bi-envelope"></i> Adresse email</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-floating mt-3">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
                            <label for="password"><i class="bi bi-lock"></i> Mot de passe</label>
                            <div class="password-strength">
                                <div class="strength-bar">
                                    <div class="strength-fill" id="strengthFill"></div>
                                </div>
                                <small id="strengthText" class="text-muted">Saisissez un mot de passe</small>
                            </div>
                        </div>
                        
                        <div class="form-floating mt-3">
                            <input type="password" name="confirm_password" id="confirmPassword" class="form-control" placeholder="Confirmer le mot de passe" required>
                            <label for="confirmPassword"><i class="bi bi-lock-fill"></i> Confirmer le mot de passe</label>
                        </div>
                        
                        <!-- Conditions -->
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" id="terms" required>
                            <label class="form-check-label" for="terms">
                                J'accepte les <a href="<?= site_url('conditions') ?>" target="_blank">conditions d'utilisation</a> et la politique de confidentialité
                            </label>
                        </div>
                        
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="newsletter">
                            <label class="form-check-label" for="newsletter">
                                Je souhaite recevoir la newsletter avec les dernières créations
                            </label>
                        </div>
                        
                        <!-- Avantages -->
                        <div class="features-list">
                            <h6 style="color: #1a1a2e; margin-bottom: 1rem;">
                                <i class="bi bi-star" style="color: #d4af37;"></i> Vos avantages
                            </h6>
                            <div class="feature-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Accès à des créations artisanales exclusives</span>
                            </div>
                            <div class="feature-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Contact direct avec les artisans</span>
                            </div>
                            <div class="feature-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Paiement sécurisé et livraison rapide</span>
                            </div>
                            <div class="feature-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Support client dédié</span>
                            </div>
                        </div>
                        
                        <div class="d-grid mt-4">
                            <button class="btn btn-register btn-lg" type="submit">
                                <i class="bi bi-person-plus"></i> Créer mon compte
                            </button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-4">
                        <p>Déjà inscrit ? <a href="<?= site_url('login') ?>" style="color: #2c5aa0; font-weight: 600;">Se connecter</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Gestion de la sélection du type d'utilisateur
    document.querySelectorAll('.type-option').forEach(option => {
        option.addEventListener('click', function() {
            // Retirer la sélection précédente
            document.querySelectorAll('.type-option').forEach(opt => opt.classList.remove('selected'));
            // Ajouter la sélection à l'option cliquée
            this.classList.add('selected');
            // Mettre à jour le champ caché
            document.getElementById('selectedType').value = this.dataset.type;
        });
    });
    
    // Vérification de la force du mot de passe
    document.getElementById('password').addEventListener('input', function() {
        const password = this.value;
        const strengthFill = document.getElementById('strengthFill');
        const strengthText = document.getElementById('strengthText');
        
        let strength = 0;
        let text = '';
        let className = '';
        
        if (password.length >= 8) strength++;
        if (/[a-z]/.test(password)) strength++;
        if (/[A-Z]/.test(password)) strength++;
        if (/[0-9]/.test(password)) strength++;
        if (/[^A-Za-z0-9]/.test(password)) strength++;
        
        switch (strength) {
            case 0:
            case 1:
                text = 'Très faible';
                className = 'strength-weak';
                break;
            case 2:
                text = 'Faible';
                className = 'strength-weak';
                break;
            case 3:
                text = 'Moyen';
                className = 'strength-medium';
                break;
            case 4:
                text = 'Fort';
                className = 'strength-strong';
                break;
            case 5:
                text = 'Très fort';
                className = 'strength-very-strong';
                break;
        }
        
        strengthFill.className = 'strength-fill ' + className;
        strengthText.textContent = text;
    });
    
    // Validation du formulaire
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        const type = document.getElementById('selectedType').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        
        if (!type) {
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Type d\'utilisateur requis',
                text: 'Veuillez sélectionner si vous êtes un amateur d\'art ou un artisan',
                confirmButtonColor: '#2c5aa0'
            });
            return false;
        }
        
        if (password !== confirmPassword) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Mots de passe différents',
                text: 'La confirmation du mot de passe ne correspond pas',
                confirmButtonColor: '#2c5aa0'
            });
            return false;
        }
        
        if (password.length < 6) {
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Mot de passe trop court',
                text: 'Le mot de passe doit contenir au moins 6 caractères',
                confirmButtonColor: '#2c5aa0'
            });
            return false;
        }
    });
    
    // Validation en temps réel des mots de passe
    document.getElementById('confirmPassword').addEventListener('input', function() {
        const password = document.getElementById('password').value;
        const confirmPassword = this.value;
        
        if (confirmPassword && password !== confirmPassword) {
            this.setCustomValidity('Les mots de passe ne correspondent pas');
            this.style.borderColor = '#dc3545';
        } else {
            this.setCustomValidity('');
            this.style.borderColor = '#28a745';
        }
    });
</script>
</body>
</html>
