<header>
    <div class="container">
        <div class="logo">
            <a href="index.php">
                <img src="images/logo.png" alt="BallotPro Logo">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="catalogue.php">Catalogue</a></li>
                <li><a href="comment-ca-marche.php">Comment ça marche</a></li>
                <li><a href="blog.php">Conseils de revente</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div class="user-actions">
            <?php if (isLoggedIn()): ?>
                <a href="mon-compte.php" class="account-link"><i class="fas fa-user"></i> Mon compte</a>
                <a href="panier.php" class="cart-link"><i class="fas fa-shopping-cart"></i> <span id="cart-count">0</span></a>
            <?php else: ?>
                <a href="connexion.php" class="btn btn-outline">Connexion</a>
                <a href="inscription.php" class="btn btn-primary">Inscription Pro</a>
            <?php endif; ?>
        </div>
        <div class="mobile-menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header>
