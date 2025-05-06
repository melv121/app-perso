<?php
session_start();
require_once 'includes/config.php';
require_once 'includes/functions.php';

// Récupération des catégories pour le filtre
try {
    $stmt = $db->query("SELECT * FROM categories ORDER BY name");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Erreur de base de données: " . $e->getMessage());
}

// Paramètres de filtrage
$category_slug = isset($_GET['cat']) ? clean($_GET['cat']) : null;
$sort = isset($_GET['sort']) ? clean($_GET['sort']) : 'newest';
$price_min = isset($_GET['min']) ? (float)$_GET['min'] : null;
$price_max = isset($_GET['max']) ? (float)$_GET['max'] : null;

// Récupération de l'étendue des prix pour le slider
try {
    $stmt = $db->query("SELECT MIN(price) as min_price, MAX(price) as max_price FROM ballots");
    $price_range = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Si aucun min/max n'est spécifié, utiliser les valeurs de la base de données
    if ($price_min === null) $price_min = $price_range['min_price'];
    if ($price_max === null) $price_max = $price_range['max_price'];
    
} catch(PDOException $e) {
    $price_range = ['min_price' => 0, 'max_price' => 3500];
}

// Construction de la requête SQL pour les ballots
$sql = "SELECT b.*, c.name as category_name, c.slug as category_slug 
        FROM ballots b 
        JOIN categories c ON b.category_id = c.id 
        WHERE b.stock > 0";

$params = [];

if ($category_slug) {
    $sql .= " AND c.slug = :category";
    $params[':category'] = $category_slug;
}

if ($price_min !== null) {
    $sql .= " AND b.price >= :min_price";
    $params[':min_price'] = $price_min;
}

if ($price_max !== null) {
    $sql .= " AND b.price <= :max_price";
    $params[':max_price'] = $price_max;
}

switch ($sort) {
    case 'price_low':
        $sql .= " ORDER BY b.price ASC";
        break;
    case 'price_high':
        $sql .= " ORDER BY b.price DESC";
        break;
    case 'popularity':
        $sql .= " ORDER BY b.sales DESC";
        break;
    case 'newest':
    default:
        $sql .= " ORDER BY b.created_at DESC";
        break;
}

try {
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    $ballots = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Erreur de base de données: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue de ballots | BallotPro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/catalogue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main>
        <section class="page-header">
            <div class="container">
                <h1>Catalogue de ballots</h1>
                <p>Trouvez les meilleurs ballots de vêtements pour votre activité de revente</p>
            </div>
        </section>
        
        <section class="catalogue">
            <div class="container">
                <div class="catalogue-sidebar">
                    <div class="filter-group">
                        <h3>Catégories</h3>
                        <ul class="filter-list">
                            <li>
                                <a href="catalogue.php" class="filter-btn <?php echo !$category_slug ? 'active' : ''; ?>">
                                    Tous les ballots
                                </a>
                            </li>
                            <?php foreach ($categories as $cat): ?>
                                <li>
                                    <a href="catalogue.php?cat=<?php echo $cat['slug']; ?>" 
                                       class="filter-btn <?php echo $category_slug === $cat['slug'] ? 'active' : ''; ?>">
                                        <?php echo $cat['name']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <div class="filter-group">
                        <h3>Prix</h3>
                        <div class="price-filter">
                            <div class="price-slider-container">
                                <input type="range" min="<?php echo $price_range['min_price']; ?>" 
                                       max="<?php echo $price_range['max_price']; ?>" 
                                       value="<?php echo $price_max; ?>" 
                                       class="price-slider" id="price-slider">
                                <div class="price-range-values">
                                    <span id="price-min-value"><?php echo $price_min; ?> €</span>
                                    <span id="price-max-value"><?php echo $price_max; ?> €</span>
                                </div>
                            </div>
                            <div class="price-inputs">
                                <input type="number" id="min-price" placeholder="Min" min="0" value="<?php echo $price_min; ?>">
                                <span>-</span>
                                <input type="number" id="max-price" placeholder="Max" min="0" value="<?php echo $price_max; ?>">
                                <button id="apply-price" class="btn-apply">Appliquer</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="filter-group">
                        <h3>Trier par</h3>
                        <select id="sort-options" class="sort-select" onchange="window.location.href = updateQueryStringParameter(window.location.href, 'sort', this.value)">
                            <option value="newest" <?php echo $sort === 'newest' ? 'selected' : ''; ?>>Plus récents</option>
                            <option value="price_low" <?php echo $sort === 'price_low' ? 'selected' : ''; ?>>Prix croissant</option>
                            <option value="price_high" <?php echo $sort === 'price_high' ? 'selected' : ''; ?>>Prix décroissant</option>
                            <option value="popularity" <?php echo $sort === 'popularity' ? 'selected' : ''; ?>>Popularité</option>
                        </select>
                    </div>
                </div>
                
                <div class="catalogue-results">
                    <?php if (count($ballots) > 0): ?>
                        <div class="product-grid">
                            <?php foreach ($ballots as $ballot): ?>
                                <div class="product-card">
                                    <div class="product-image">
                                        <img src="images/ballots/<?php echo $ballot['image']; ?>" alt="<?php echo $ballot['name']; ?>">
                                        <div class="product-badges">
                                            <?php if($ballot['is_premium']): ?>
                                                <span class="badge premium">Premium</span>
                                            <?php endif; ?>
                                            <?php if($ballot['discount_percent'] > 0): ?>
                                                <span class="badge discount">-<?php echo $ballot['discount_percent']; ?>%</span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="product-actions">
                                            <a href="detail-ballot.php?id=<?php echo $ballot['id']; ?>" class="quick-view">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <?php if($ballot['stock'] > 0): ?>
                                                <a href="javascript:void(0)" onclick="addToCart(<?php echo $ballot['id']; ?>, '<?php echo addslashes($ballot['name']); ?>', <?php echo $ballot['price']; ?>)" class="add-to-cart">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h3><?php echo $ballot['name']; ?></h3>
                                        <p class="product-category"><?php echo $ballot['category_name']; ?></p>
                                        <p class="product-description"><?php echo substr($ballot['description'], 0, 100); ?>...</p>
                                        
                                        <div class="product-specs">
                                            <div class="spec">
                                                <span class="spec-label">Poids:</span>
                                                <span class="spec-value"><?php echo number_format($ballot['weight'], 2, '.', ''); ?> kg</span>
                                            </div>
                                            <div class="spec">
                                                <span class="spec-label">Pièces:</span>
                                                <span class="spec-value">~<?php echo $ballot['pieces_count']; ?></span>
                                            </div>
                                            <div class="spec">
                                                <span class="spec-label">Marge potentielle:</span>
                                                <span class="spec-value highlight">+<?php echo calculatePotentialMargin($ballot['price'], $ballot['estimated_retail']); ?>%</span>
                                            </div>
                                        </div>
                                        
                                        <div class="product-footer">
                                            <div class="product-price">
                                                <?php if($ballot['discount_percent'] > 0): ?>
                                                    <span class="original-price"><?php echo formatPrice($ballot['original_price']); ?></span>
                                                <?php endif; ?>
                                                <span class="current-price"><?php echo formatPrice($ballot['price']); ?></span>
                                            </div>
                                            <a href="detail-ballot.php?id=<?php echo $ballot['id']; ?>" class="btn btn-outline">Voir détails</a>
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
                <h2>Vous ne trouvez pas ce que vous cherchez?</h2>
                <p>Contactez-nous pour des ballots sur mesure selon vos besoins spécifiques</p>
                <a href="contact.php" class="btn btn-secondary">Nous contacter</a>
            </div>
        </section>
    </main>
    
    <?php include 'includes/footer.php'; ?>
    
    <script src="js/script.js"></script>
    <script>
        // Fonction pour mettre à jour les paramètres d'URL
        function updateQueryStringParameter(uri, key, value) {
            const re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
            const separator = uri.indexOf('?') !== -1 ? "&" : "?";
            
            if (uri.match(re)) {
                return uri.replace(re, '$1' + key + "=" + value + '$2');
            } else {
                return uri + separator + key + "=" + value;
            }
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            // Slider de prix
            const priceSlider = document.getElementById('price-slider');
            const minPrice = document.getElementById('min-price');
            const maxPrice = document.getElementById('max-price');
            const minPriceDisplay = document.getElementById('price-min-value');
            const maxPriceDisplay = document.getElementById('price-max-value');
            
            // Appliquer le filtre de prix
            document.getElementById('apply-price').addEventListener('click', function() {
                const min = minPrice.value || <?php echo $price_range['min_price']; ?>;
                const max = maxPrice.value || <?php echo $price_range['max_price']; ?>;
                
                let url = window.location.href;
                url = updateQueryStringParameter(url, 'min', min);
                url = updateQueryStringParameter(url, 'max', max);
                
                window.location.href = url;
            });
            
            // Mettre à jour l'affichage du slider
            if (priceSlider) {
                priceSlider.addEventListener('input', function() {
                    const percentage = ((this.value - this.min) / (this.max - this.min)) * 100;
                    maxPrice.value = this.value;
                    maxPriceDisplay.textContent = this.value + " €";
                    
                    // Mettre à jour la position visuelle du slider
                    this.style.background = `linear-gradient(to right, #2c3e50 0%, #2c3e50 ${percentage}%, #e1e1e1 ${percentage}%, #e1e1e1 100%)`;
                });
            }
            
            // Effet de survol sur les cartes de produit
            const productCards = document.querySelectorAll('.product-card');
            productCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.querySelector('.product-actions').style.opacity = '1';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.querySelector('.product-actions').style.opacity = '0';
                });
            });
        });
    </script>
</body>
</html>
