<main>
    <section class="page-header">
        <div class="container">
            <h1>Catalogue de ballots</h1>
            <p>Trouvez les meilleurs ballots de vêtements pour votre activité de revente</p>
        </div>
    </section>
    
    <section class="catalogue">
        <div class="container">
            <div class="catalogue-filters">
                <div class="filter-group">
                    <h3>Catégories</h3>
                    <ul class="filter-list">
                        <li>
                            <a href="<?php echo base_url('catalogue'); ?>" class="filter-btn <?php echo (!$active_category) ? 'active' : ''; ?>">
                                Tous les ballots
                            </a>
                        </li>
                        <?php foreach ($categories as $cat): ?>
                            <li>
                                <a href="<?php echo base_url('catalogue?cat=' . $cat['slug']); ?>" class="filter-btn <?php echo ($active_category == $cat['slug']) ? 'active' : ''; ?>">
                                    <?php echo $cat['name']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                
                <div class="filter-group">
                    <h3>Marques</h3>
                    <div class="brand-filters">
                        <div class="filter-subgroup">
                            <h4>Marques Premium</h4>
                            <?php foreach ($brands_by_tier['premium'] as $brand): ?>
                                <div class="filter-checkbox">
                                    <input type="checkbox" id="brand-<?php echo $brand['id']; ?>" name="brands[]" value="<?php echo $brand['id']; ?>" class="brand-filter"
                                          <?php echo (in_array($brand['id'], $selected_brands)) ? 'checked' : ''; ?>>
                                    <label for="brand-<?php echo $brand['id']; ?>"><?php echo $brand['name']; ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="filter-subgroup">
                            <h4>Marques Luxe</h4>
                            <?php foreach ($brands_by_tier['luxe'] as $brand): ?>
                                <div class="filter-checkbox">
                                    <input type="checkbox" id="brand-<?php echo $brand['id']; ?>" name="brands[]" value="<?php echo $brand['id']; ?>" class="brand-filter"
                                          <?php echo (in_array($brand['id'], $selected_brands)) ? 'checked' : ''; ?>>
                                    <label for="brand-<?php echo $brand['id']; ?>"><?php echo $brand['name']; ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="filter-subgroup">
                            <h4>Marques Standard</h4>
                            <?php foreach ($brands_by_tier['standard'] as $brand): ?>
                                <div class="filter-checkbox">
                                    <input type="checkbox" id="brand-<?php echo $brand['id']; ?>" name="brands[]" value="<?php echo $brand['id']; ?>" class="brand-filter"
                                          <?php echo (in_array($brand['id'], $selected_brands)) ? 'checked' : ''; ?>>
                                    <label for="brand-<?php echo $brand['id']; ?>"><?php echo $brand['name']; ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
                <div class="filter-group">
                    <h3>Prix</h3>
                    <div class="price-filter">
                        <input type="range" min="<?php echo $price_range['min_price']; ?>" max="<?php echo $price_range['max_price']; ?>" value="<?php echo $price_max; ?>" class="price-slider" id="price-slider">
                        <div class="price-inputs">
                            <input type="number" id="min-price" placeholder="Min" min="0" value="<?php echo $price_min; ?>">
                            <span>-</span>
                            <input type="number" id="max-price" placeholder="Max" min="0" value="<?php echo $price_max; ?>">
                            <button id="apply-price">Appliquer</button>
                        </div>
                    </div>
                </div>
                
                <div class="filter-group">
                    <h3>Trier par</h3>
                    <select id="sort-options" class="sort-select" onchange="applyFilters()">
                        <option value="newest" <?php echo ($sort == 'newest') ? 'selected' : ''; ?>>Plus récents</option>
                        <option value="price_low" <?php echo ($sort == 'price_low') ? 'selected' : ''; ?>>Prix croissant</option>
                        <option value="price_high" <?php echo ($sort == 'price_high') ? 'selected' : ''; ?>>Prix décroissant</option>
                        <option value="popularity" <?php echo ($sort == 'popularity') ? 'selected' : ''; ?>>Popularité</option>
                    </select>
                </div>
                
                <button id="apply-all-filters" class="btn btn-primary btn-block">Appliquer tous les filtres</button>
            </div>
            
            <div class="catalogue-results">
                <?php if (!empty($ballots)): ?>
                    <div class="product-grid">
                        <?php foreach ($ballots as $ballot): ?>
                            <div class="product-card" data-category="<?php echo $ballot['category_slug']; ?>" data-price="<?php echo $ballot['price']; ?>">
                                <div class="product-badge">
                                    <?php if($ballot['is_premium']): ?>
                                        <span class="badge premium">Premium</span>
                                    <?php endif; ?>
                                    <?php if($ballot['discount_percent'] > 0): ?>
                                        <span class="badge discount">-<?php echo $ballot['discount_percent']; ?>%</span>
                                    <?php endif; ?>
                                </div>
                                <img src="<?php echo base_url('assets/images/ballots/' . $ballot['image']); ?>" alt="<?php echo $ballot['name']; ?>">
                                <div class="product-info">
                                    <h3><?php echo $ballot['name']; ?></h3>
                                    <p class="product-category"><?php echo $ballot['category_name']; ?></p>
                                    
                                    <?php if (!empty($ballot['brands'])): ?>
                                        <div class="product-brands">
                                            <?php foreach ($ballot['brands'] as $brand): ?>
                                                <span class="brand-tag <?php echo $brand['tier']; ?>"><?php echo $brand['name']; ?> <?php echo $brand['percentage']; ?>%</span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <p class="product-description"><?php echo substr($ballot['description'], 0, 100); ?>...</p>
                                    <div class="product-details">
                                        <div class="detail">
                                            <span class="label">Poids:</span>
                                            <span class="value"><?php echo $ballot['weight']; ?> kg</span>
                                        </div>
                                        <div class="detail">
                                            <span class="label">Pièces:</span>
                                            <span class="value">~<?php echo $ballot['pieces_count']; ?></span>
                                        </div>
                                        <div class="detail">
                                            <span class="label">Marge potentielle:</span>
                                            <span class="value highlight">+<?php echo $this->ballot_model->calculate_potential_margin($ballot['price'], $ballot['estimated_retail']); ?>%</span>
                                        </div>
                                    </div>
                                    <div class="product-footer">
                                        <div class="product-price">
                                            <?php if($ballot['discount_percent'] > 0): ?>
                                                <span class="original-price"><?php echo number_format($ballot['original_price'], 2, ',', ' '); ?> €</span>
                                            <?php endif; ?>
                                            <span class="current-price"><?php echo number_format($ballot['price'], 2, ',', ' '); ?> €</span>
                                        </div>
                                        <a href="<?php echo base_url('catalogue/detail/' . $ballot['id']); ?>" class="btn btn-outline">Voir détails</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="no-results">
                        <i class="fas fa-search"></i>
                        <h3>Aucun ballot trouvé</h3>
                        <p>Essayez de modifier vos critères de recherche</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    
    <section class="cta">
        <div class="container">
            <h2>Vous ne trouvez pas ce que vous cherchez ?</h2>
            <p>Contactez-nous pour des ballots sur mesure selon vos besoins spécifiques</p>
            <a href="<?php echo base_url('contact'); ?>" class="btn btn-secondary">Nous contacter</a>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Logique pour le filtre de prix
    const priceSlider = document.getElementById('price-slider');
    const minPrice = document.getElementById('min-price');
    const maxPrice = document.getElementById('max-price');
    const applyPriceBtn = document.getElementById('apply-price');
    const applyAllFiltersBtn = document.getElementById('apply-all-filters');
    const brandCheckboxes = document.querySelectorAll('.brand-filter');
    
    if (priceSlider && minPrice && maxPrice) {
        priceSlider.addEventListener('input', function() {
            maxPrice.value = this.value;
        });
    }
    
    if (applyPriceBtn) {
        applyPriceBtn.addEventListener('click', function() {
            applyFilters();
        });
    }
    
    if (applyAllFiltersBtn) {
        applyAllFiltersBtn.addEventListener('click', function() {
            applyFilters();
        });
    }
    
    if (brandCheckboxes.length > 0) {
        brandCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    console.log('Brand selected: ' + this.value);
                }
            });
        });
    }
});

function applyFilters() {
    const minPrice = document.getElementById('min-price').value || '';
    const maxPrice = document.getElementById('max-price').value || '';
    const sortOption = document.getElementById('sort-options').value;
    
    // Récupérer les marques sélectionnées
    const selectedBrands = [];
    document.querySelectorAll('.brand-filter:checked').forEach(checkbox => {
        selectedBrands.push(checkbox.value);
    });
    
    // Construire l'URL avec les paramètres
    let url = '<?php echo base_url('catalogue'); ?>';
    const params = new URLSearchParams(window.location.search);
    
    // Conserver la catégorie si présente
    const category = params.get('cat');
    if (category) {
        url += '?cat=' + category;
    }
    
    // Ajouter les autres paramètres
    const queryChar = url.includes('?') ? '&' : '?';
    
    url += queryChar + 'sort=' + sortOption;
    
    if (minPrice) {
        url += '&min=' + minPrice;
    }
    
    if (maxPrice) {
        url += '&max=' + maxPrice;
    }
    
    if (selectedBrands.length > 0) {
        selectedBrands.forEach(brandId => {
            url += '&brands[]=' + brandId;
        });
    }
    
    // Rediriger vers l'URL avec les filtres
    window.location.href = url;
}
</script>
