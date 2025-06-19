<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Modifier le produit - Marketplace Artisanale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .navbar { background: rgba(255,255,255,0.95) !important; backdrop-filter: blur(10px); box-shadow: 0 2px 20px rgba(0,0,0,0.1); }
        .navbar-brand { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.8rem; color: #2c3e50 !important; }
        
        .edit-product-section { padding: 100px 0; }
        .product-form-card { background: white; border-radius: 25px; padding: 3rem; box-shadow: 0 20px 60px rgba(0,0,0,0.1); border: none; }
        .section-title { font-family: 'Playfair Display', serif; font-size: 2.5rem; color: white; margin-bottom: 3rem; text-align: center; }
        
        .form-floating label { color: #6c757d; }
        .form-control, .form-select { border-radius: 15px; border: 2px solid #e9ecef; transition: all 0.3s ease; }
        .form-control:focus, .form-select:focus { border-color: #667eea; box-shadow: 0 0 0 0.2rem rgba(102,126,234,0.25); }
        
        .category-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px; margin-bottom: 1.5rem; }
        .category-option { border: 2px solid #e9ecef; border-radius: 15px; padding: 1rem; text-align: center; cursor: pointer; transition: all 0.3s ease; background: white; }
        .category-option:hover { border-color: #667eea; transform: translateY(-2px); }
        .category-option.selected { background: linear-gradient(45deg, #667eea, #764ba2); color: white; border-color: #667eea; }
        .category-icon { font-size: 2rem; margin-bottom: 0.5rem; }
        
        .image-upload-area { border: 2px dashed #e9ecef; border-radius: 15px; padding: 3rem; text-align: center; transition: all 0.3s ease; cursor: pointer; }
        .image-upload-area:hover { border-color: #667eea; background: rgba(102,126,234,0.05); }
        .image-upload-area.dragover { border-color: #667eea; background: rgba(102,126,234,0.1); }
        
        .btn-edit-product { background: linear-gradient(45deg, #667eea, #764ba2); border: none; padding: 15px 40px; font-weight: 600; border-radius: 15px; transition: all 0.3s ease; }
        .btn-edit-product:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(102,126,234,0.4); }
        
        .current-image { max-width: 200px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url('/') ?>">Artisanat</a>
    <div class="navbar-nav ms-auto">
      <a class="nav-link" href="<?= site_url('/') ?>">Accueil</a>
      <a class="nav-link" href="<?= site_url('artisan/dashboard') ?>">Dashboard</a>
      <span class="navbar-text">
        <i class="bi bi-person-circle"></i> <?= $this->session->userdata('username') ?>
      </span>
      <a class="nav-link" href="<?= site_url('logout') ?>">Déconnexion</a>
    </div>
  </div>
</nav>

<section class="edit-product-section">
    <div class="container">
        <h1 class="section-title">Modifier votre création</h1>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="product-form-card">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    
                    <form method="post" enctype="multipart/form-data" id="productForm">
                        <!-- Nom du produit -->
                        <div class="form-floating mb-3">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nom" value="<?= htmlspecialchars($product->name) ?>" required>
                            <label for="name"><i class="bi bi-tag"></i> Nom de votre création</label>
                        </div>
                        
                        <!-- Sélection de catégorie -->
                        <div class="mb-4">
                            <label class="form-label h5 mb-3" style="color: #2c3e50;">
                                <i class="bi bi-grid"></i> Choisissez une catégorie
                            </label>
                            <div class="category-grid">
                                <div class="category-option <?= $product->category == 'bijoux' ? 'selected' : '' ?>" data-category="bijoux">
                                    <div class="category-icon"><i class="bi bi-gem"></i></div>
                                    <div>Bijoux</div>
                                </div>
                                <div class="category-option <?= $product->category == 'poterie' ? 'selected' : '' ?>" data-category="poterie">
                                    <div class="category-icon"><i class="bi bi-cup"></i></div>
                                    <div>Poterie</div>
                                </div>
                                <div class="category-option <?= $product->category == 'textile' ? 'selected' : '' ?>" data-category="textile">
                                    <div class="category-icon"><i class="bi bi-threads"></i></div>
                                    <div>Textile</div>
                                </div>
                                <div class="category-option <?= $product->category == 'bois' ? 'selected' : '' ?>" data-category="bois">
                                    <div class="category-icon"><i class="bi bi-tree"></i></div>
                                    <div>Bois</div>
                                </div>
                                <div class="category-option <?= $product->category == 'decoration' ? 'selected' : '' ?>" data-category="decoration">
                                    <div class="category-icon"><i class="bi bi-house-heart"></i></div>
                                    <div>Décoration</div>
                                </div>
                                <div class="category-option <?= $product->category == 'art' ? 'selected' : '' ?>" data-category="art">
                                    <div class="category-icon"><i class="bi bi-palette2"></i></div>
                                    <div>Art</div>
                                </div>
                            </div>
                            <input type="hidden" name="category" id="selectedCategory" value="<?= $product->category ?>" required>
                        </div>
                        
                        <!-- Description -->
                        <div class="form-floating mb-3">
                            <textarea name="description" id="description" class="form-control" style="height: 120px" placeholder="Description"><?= htmlspecialchars($product->description) ?></textarea>
                            <label for="description"><i class="bi bi-text-paragraph"></i> Description de votre création</label>
                        </div>
                        
                        <!-- Prix -->
                        <div class="form-floating mb-4">
                            <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="Prix" value="<?= $product->price ?>" required>
                            <label for="price"><i class="bi bi-currency-euro"></i> Prix (€)</label>
                        </div>
                        
                        <!-- Image actuelle -->
                        <?php if (!empty($product->image)): ?>
                            <div class="mb-4">
                                <label class="form-label h6 mb-3" style="color: #2c3e50;">
                                    <i class="bi bi-image"></i> Image actuelle
                                </label>
                                <div class="text-center">
                                    <img src="<?= base_url('uploads/' . $product->image) ?>" class="current-image" alt="Image actuelle">
                                    <p class="mt-2 text-muted">Téléchargez une nouvelle image pour remplacer celle-ci</p>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Upload d'image -->
                        <div class="mb-4">
                            <label class="form-label h5 mb-3" style="color: #2c3e50;">
                                <i class="bi bi-image"></i> <?= !empty($product->image) ? 'Changer la photo' : 'Ajouter une photo' ?>
                            </label>
                            <div class="image-upload-area" onclick="document.getElementById('imageInput').click()">
                                <div id="upload-placeholder">
                                    <i class="bi bi-cloud-upload display-4 text-muted mb-3"></i>
                                    <h5 class="text-muted">Cliquez ou glissez votre nouvelle image ici</h5>
                                    <p class="text-muted">Formats acceptés : JPG, PNG, GIF, WEBP (max 5MB)</p>
                                </div>
                                <input type="file" name="image" id="imageInput" class="d-none" accept="image/*">
                            </div>
                            <div id="imagePreview" class="mt-3"></div>
                        </div>
                        
                        <!-- Boutons -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= site_url('artisan/dashboard') ?>" class="btn btn-secondary btn-lg">
                                <i class="bi bi-arrow-left"></i> Annuler
                            </a>
                            <button class="btn btn-edit-product btn-lg" type="submit">
                                <i class="bi bi-check-circle"></i> Modifier la création
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
    
    // Gestion de l'upload d'image (même code que add.php)
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    const uploadArea = document.querySelector('.image-upload-area');
    const uploadPlaceholder = document.getElementById('upload-placeholder');
    
    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            if (!file.type.match('image.*')) {
                alert('Veuillez sélectionner une image valide');
                return;
            }
            
            if (file.size > 5 * 1024 * 1024) {
                alert('L\'image est trop volumineuse (max 5MB)');
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                uploadPlaceholder.style.display = 'none';
                imagePreview.innerHTML = `
                    <div class="position-relative d-inline-block">
                        <img src="${e.target.result}" class="img-fluid rounded" style="max-width: 300px; max-height: 200px; object-fit: cover;" alt="Aperçu">
                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2" onclick="removeImage()">
                            <i class="bi bi-x"></i>
                        </button>
                        <div class="mt-2 text-center">
                            <small class="text-success">Nouvelle image sélectionnée: ${file.name}</small>
                        </div>
                    </div>
                `;
                uploadArea.style.background = '#f8f9fa';
                uploadArea.style.border = '2px solid #28a745';
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
</script>
</body>
</html>
