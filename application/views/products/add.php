<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Ajouter un produit - La Galerie Artisanale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%); min-height: 100vh; }
        .navbar { background: rgba(255,255,255,0.98) !important; backdrop-filter: blur(15px); box-shadow: 0 8px 32px rgba(0,0,0,0.1); border-bottom: 1px solid rgba(212,175,55,0.2); }
        .navbar-brand { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.8rem; color: #1a1a2e !important; }
        
        .add-product-section { padding: 120px 0; }
        .product-form-card { background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 1px solid rgba(44,90,160,0.1); border-radius: 28px; padding: 3.5rem; box-shadow: 0 25px 60px rgba(0,0,0,0.15); position: relative; }
        .product-form-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 5px; background: linear-gradient(90deg, #2c5aa0, #d4af37, #1a1a2e); border-radius: 28px 28px 0 0; }
        .section-title { font-family: 'Playfair Display', serif; font-size: 3rem; color: white; margin-bottom: 4rem; text-align: center; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }
        
        .form-floating label { color: #6c757d; font-weight: 500; }
        .form-control, .form-select { border-radius: 15px; border: 2px solid #e9ecef; transition: all 0.3s ease; background: rgba(255,255,255,0.9); }
        .form-control:focus, .form-select:focus { border-color: #2c5aa0; box-shadow: 0 0 0 0.2rem rgba(44,90,160,0.25); background: white; }
        
        .category-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 18px; margin-bottom: 2rem; }
        .category-option { border: 2px solid #e9ecef; border-radius: 20px; padding: 1.5rem; text-align: center; cursor: pointer; transition: all 0.4s ease; background: white; }
        .category-option:hover { border-color: #2c5aa0; transform: translateY(-5px); box-shadow: 0 8px 25px rgba(44,90,160,0.2); }
        .category-option.selected { background: linear-gradient(135deg, #2c5aa0 0%, #1a1a2e 100%); color: white; border-color: #2c5aa0; transform: translateY(-5px); box-shadow: 0 12px 30px rgba(44,90,160,0.3); }
        .category-icon { font-size: 2.5rem; margin-bottom: 0.8rem; }
        
        .image-upload-area { border: 3px dashed #e9ecef; border-radius: 20px; padding: 4rem; text-align: center; transition: all 0.4s ease; cursor: pointer; background: rgba(255,255,255,0.5); }
        .image-upload-area:hover { border-color: #2c5aa0; background: rgba(44,90,160,0.05); }
        .image-upload-area.dragover { border-color: #d4af37; background: rgba(212,175,55,0.1); }
        
        .btn-add-product { background: linear-gradient(135deg, #d4af37 0%, #ffd700 100%); color: #1a1a2e; border: none; padding: 18px 45px; font-weight: 700; border-radius: 50px; transition: all 0.4s ease; text-transform: uppercase; letter-spacing: 1px; }
        .btn-add-product:hover { transform: translateY(-3px); box-shadow: 0 15px 35px rgba(212,175,55,0.4); color: #1a1a2e; }
        
        .navbar-nav .nav-link { color: #1a1a2e !important; font-weight: 600; margin: 0 15px; transition: all 0.3s ease; }
        .navbar-nav .nav-link:hover { color: #2c5aa0 !important; }
        .navbar-nav .nav-link.active { color: #d4af37 !important; font-weight: 700; }
        .btn-secondary { background: linear-gradient(135deg, #6c757d 0%, #495057 100%); border: none; }
        .btn-outline-secondary { border: 2px solid #6c757d; color: #6c757d; }
        .btn-outline-secondary:hover { background: #6c757d; }
        .btn-outline-primary { border: 2px solid #2c5aa0; color: #2c5aa0; }
        .btn-outline-primary:hover { background: #2c5aa0; }
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
      <a class="nav-link" href="<?= site_url('artisan/dashboard') ?>">Dashboard</a>
      <a class="nav-link active" href="<?= site_url('products/add') ?>">Ajouter produit</a>
      <span class="navbar-text">
        <i class="bi bi-person-circle"></i> <?= $this->session->userdata('username') ?>
      </span>
      <a class="nav-link" href="<?= site_url('logout') ?>">Déconnexion</a>
    </div>
  </div>
</nav>

<section class="add-product-section">
    <div class="container">
        <h1 class="section-title">Ajouter une nouvelle création</h1>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="product-form-card">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    
                    <form method="post" enctype="multipart/form-data" id="productForm">
                        <!-- Nom du produit -->
                        <div class="form-floating mb-3">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nom" required>
                            <label for="name"><i class="bi bi-tag"></i> Nom de votre création</label>
                        </div>
                        
                        <!-- Sélection de catégorie -->
                        <div class="mb-4">
                            <label class="form-label h5 mb-3" style="color: #2c3e50;">
                                <i class="bi bi-grid"></i> Choisissez une catégorie
                            </label>
                            <div class="category-grid">
                                <div class="category-option" data-category="bijoux">
                                    <div class="category-icon"><i class="bi bi-gem"></i></div>
                                    <div>Bijoux</div>
                                </div>
                                <div class="category-option" data-category="poterie">
                                    <div class="category-icon"><i class="bi bi-cup"></i></div>
                                    <div>Poterie</div>
                                </div>
                                <div class="category-option" data-category="textile">
                                    <div class="category-icon"><i class="bi bi-threads"></i></div>
                                    <div>Textile</div>
                                </div>
                                <div class="category-option" data-category="bois">
                                    <div class="category-icon"><i class="bi bi-tree"></i></div>
                                    <div>Bois</div>
                                </div>
                                <div class="category-option" data-category="decoration">
                                    <div class="category-icon"><i class="bi bi-house-heart"></i></div>
                                    <div>Décoration</div>
                                </div>
                                <div class="category-option" data-category="art">
                                    <div class="category-icon"><i class="bi bi-palette2"></i></div>
                                    <div>Art</div>
                                </div>
                            </div>
                            <input type="hidden" name="category" id="selectedCategory" required>
                        </div>
                        
                        <!-- Description -->
                        <div class="form-floating mb-3">
                            <textarea name="description" id="description" class="form-control" style="height: 120px" placeholder="Description"></textarea>
                            <label for="description"><i class="bi bi-text-paragraph"></i> Description de votre création</label>
                        </div>
                        
                        <!-- Prix -->
                        <div class="form-floating mb-4">
                            <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="Prix" required>
                            <label for="price"><i class="bi bi-currency-euro"></i> Prix (€)</label>
                        </div>
                        
                        <!-- Upload d'image -->
                        <div class="mb-4">
                            <label class="form-label h5 mb-3" style="color: #2c3e50;">
                                <i class="bi bi-image"></i> Ajoutez une photo
                            </label>
                            
                            <!-- Upload simple en fallback -->
                            <div class="mb-3">
                                <input type="file" name="image" class="form-control" accept="image/*" id="simpleImageInput" style="border-radius: 15px; padding: 15px;">
                                <div class="form-text">Formats acceptés: JPG, JPEG, PNG, GIF, WEBP (max 10MB)</div>
                            </div>
                            
                            <!-- Zone drag & drop stylée -->
                            <div class="image-upload-area" onclick="document.getElementById('imageInput').click()" style="display: none;">
                                <div id="upload-placeholder">
                                    <i class="bi bi-cloud-upload display-4 text-muted mb-3"></i>
                                    <h5 class="text-muted">Cliquez ou glissez votre image ici</h5>
                                    <p class="text-muted">Formats acceptés : JPG, PNG, GIF, WEBP (max 10MB)</p>
                                </div>
                                <input type="file" name="image" id="imageInput" class="d-none" accept="image/*">
                            </div>
                            <div id="imagePreview" class="mt-3"></div>
                            
                            <!-- Bouton pour activer le mode avancé -->
                            <button type="button" class="btn btn-sm btn-outline-secondary mt-2" onclick="toggleAdvancedUpload()">
                                <i class="bi bi-magic"></i> Mode avancé (Drag & Drop)
                            </button>
                        </div>
                        
                        <!-- Boutons -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= site_url('artisan/dashboard') ?>" class="btn btn-secondary btn-lg">
                                <i class="bi bi-arrow-left"></i> Annuler
                            </a>
                            <button class="btn btn-add-product btn-lg" type="submit">
                                <i class="bi bi-plus-circle"></i> Ajouter la création
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Gestion de la sélection de catégorie
    document.querySelectorAll('.category-option').forEach(option => {
        option.addEventListener('click', function() {
            // Retirer la sélection précédente
            document.querySelectorAll('.category-option').forEach(opt => opt.classList.remove('selected'));
            // Ajouter la sélection à l'option cliquée
            this.classList.add('selected');
            // Mettre à jour le champ caché
            document.getElementById('selectedCategory').value = this.dataset.category;
        });
    });
    
    // Gestion de l'upload d'image améliorée avec validation
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    const uploadArea = document.querySelector('.image-upload-area');
    const uploadPlaceholder = document.getElementById('upload-placeholder');
    
    // Types MIME autorisés (plus permissif)
    const allowedTypes = [
        'image/jpeg', 'image/jpg', 'image/png', 'image/gif', 
        'image/webp', 'image/bmp', 'image/tiff', 'image/svg+xml'
    ];
    
    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validation du type de fichier
            if (!allowedTypes.includes(file.type.toLowerCase())) {
                Swal.fire({
                    icon: 'error',
                    title: 'Format non supporté',
                    text: 'Formats acceptés: JPG, PNG, GIF, WEBP, BMP, TIFF, SVG',
                    confirmButtonColor: '#667eea'
                });
                this.value = '';
                return;
            }
            
            // Validation de la taille (10MB max)
            if (file.size > 10 * 1024 * 1024) {
                Swal.fire({
                    icon: 'error',
                    title: 'Fichier trop volumineux',
                    text: 'La taille maximale autorisée est de 10MB',
                    confirmButtonColor: '#667eea'
                });
                this.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                uploadPlaceholder.style.display = 'none';
                imagePreview.innerHTML = `
                    <div class="position-relative d-inline-block">
                        <img src="${e.target.result}" class="img-fluid rounded" style="max-width: 300px; max-height: 200px; object-fit: cover; box-shadow: 0 5px 15px rgba(0,0,0,0.2);" alt="Aperçu">
                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2" onclick="removeImage()" style="border-radius: 50%; width: 30px; height: 30px; padding: 0;">
                            <i class="bi bi-x"></i>
                        </button>
                        <div class="mt-2 text-center">
                            <small class="text-success">
                                <i class="bi bi-check-circle"></i> ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)
                            </small>
                        </div>
                    </div>
                `;
                uploadArea.style.background = 'linear-gradient(135deg, #e8f5e8, #f0fff0)';
                uploadArea.style.border = '2px solid #28a745';
            };
            reader.onerror = function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur de lecture',
                    text: 'Impossible de lire le fichier sélectionné',
                    confirmButtonColor: '#667eea'
                });
            };
            reader.readAsDataURL(file);
        }
    });
    
    function removeImage() {
        imageInput.value = '';
        imagePreview.innerHTML = '';
        uploadPlaceholder.style.display = 'block';
        uploadArea.style.background = '';
        uploadArea.style.border = '2px dashed #e9ecef';
    }
    
    // Drag & Drop amélioré avec validation
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('dragover');
        this.style.borderColor = '#667eea';
        this.style.background = 'rgba(102,126,234,0.1)';
    });
    
    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('dragover');
        this.style.borderColor = '#e9ecef';
        this.style.background = '';
    });
    
    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('dragover');
        this.style.borderColor = '#e9ecef';
        this.style.background = '';
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            const file = files[0];
            
            // Validation avant de définir le fichier
            if (!allowedTypes.includes(file.type.toLowerCase())) {
                Swal.fire({
                    icon: 'error',
                    title: 'Format non supporté',
                    text: 'Veuillez glisser une image valide (JPG, PNG, GIF, WEBP, etc.)',
                    confirmButtonColor: '#667eea'
                });
                return;
            }
            
            // Créer un objet FileList pour simuler la sélection
            const dt = new DataTransfer();
            dt.items.add(file);
            imageInput.files = dt.files;
            imageInput.dispatchEvent(new Event('change'));
        }
    });
    
    let advancedMode = false;
    
    function toggleAdvancedUpload() {
        const simpleInput = document.getElementById('simpleImageInput');
        const advancedArea = document.querySelector('.image-upload-area');
        const toggleBtn = event.target;
        
        advancedMode = !advancedMode;
        
        if (advancedMode) {
            simpleInput.style.display = 'none';
            advancedArea.style.display = 'block';
            toggleBtn.innerHTML = '<i class="bi bi-arrow-left"></i> Mode simple';
            toggleBtn.classList.remove('btn-outline-secondary');
            toggleBtn.classList.add('btn-outline-primary');
        } else {
            simpleInput.style.display = 'block';
            advancedArea.style.display = 'none';
            toggleBtn.innerHTML = '<i class="bi bi-magic"></i> Mode avancé (Drag & Drop)';
            toggleBtn.classList.remove('btn-outline-primary');
            toggleBtn.classList.add('btn-outline-secondary');
        }
    }
    
    // Gestion du simple input avec preview
    document.getElementById('simpleImageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validation de base
            if (!file.type.startsWith('image/')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Format non supporté',
                    text: 'Veuillez sélectionner une image valide',
                    confirmButtonColor: '#667eea'
                });
                this.value = '';
                return;
            }
            
            if (file.size > 10 * 1024 * 1024) {
                Swal.fire({
                    icon: 'error',
                    title: 'Fichier trop volumineux',
                    text: 'La taille maximale autorisée est de 10MB',
                    confirmButtonColor: '#667eea'
                });
                this.value = '';
                return;
            }
            
            // Afficher un aperçu simple
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = `
                    <div class="mt-3">
                        <img src="${e.target.result}" class="img-fluid rounded" style="max-width: 200px; max-height: 150px; object-fit: cover; box-shadow: 0 5px 15px rgba(0,0,0,0.2);" alt="Aperçu">
                        <div class="mt-2">
                            <small class="text-success">
                                <i class="bi bi-check-circle"></i> ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)
                            </small>
                        </div>
                    </div>
                `;
            };
            reader.readAsDataURL(file);
        }
    });

    // Validation du formulaire avec informations debug
    document.getElementById('productForm').addEventListener('submit', function(e) {
        const category = document.getElementById('selectedCategory').value;
        if (!category) {
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Catégorie manquante',
                text: 'Veuillez sélectionner une catégorie pour votre création',
                confirmButtonColor: '#667eea'
            });
            return false;
        }
        
        // Debug des infos du fichier
        const fileInput = advancedMode ? document.getElementById('imageInput') : document.getElementById('simpleImageInput');
        if (fileInput.files.length > 0) {
            const file = fileInput.files[0];
            console.log('Fichier sélectionné:', {
                name: file.name,
                type: file.type,
                size: file.size,
                lastModified: file.lastModified
            });
        }
    });
</script>
</body>
</html>
