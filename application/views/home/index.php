<main>
    <section class="hero">
        <div class="container">
            <h1>Achetez des ballots de vêtements en gros</h1>
            <h2>Maximisez vos profits avec notre sélection premium</h2>
            <p>Fournisseur privilégié pour revendeurs, friperies et boutiques en ligne</p>
            <a href="<?php echo base_url('catalogue'); ?>" class="btn btn-primary">Découvrir nos ballots</a>
        </div>
    </section>
    
    <section class="features">
        <div class="container">
            <div class="feature-card">
                <i class="fas fa-tshirt"></i>
                <h3>Qualité garantie</h3>
                <p>Tous nos ballots sont vérifiés et triés selon des critères stricts</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-percentage"></i>
                <h3>Marges importantes</h3>
                <p>Jusqu'à 300% de marge potentielle sur la revente</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-truck"></i>
                <h3>Livraison rapide</h3>
                <p>Expédition sous 48h pour toute commande</p>
            </div>
        </div>
    </section>
    
    <section class="categories">
        <div class="container">
            <h2>Nos catégories de ballots</h2>
            <div class="category-grid">
                <?php foreach($categories as $category): ?>
                    <a href="<?php echo base_url('catalogue?cat=' . $category['slug']); ?>" class="category-card">
                        <img src="<?php echo base_url('assets/images/' . $category['image']); ?>" alt="<?php echo $category['name']; ?>">
                        <h3><?php echo $category['name']; ?></h3>
                        <p><?php echo $category['description']; ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
    <section class="testimonials">
        <div class="container">
            <h2>Ils nous font confiance</h2>
            <div class="testimonial-slider">
                <?php foreach($testimonials as $testimonial): ?>
                    <div class="testimonial">
                        <p>"<?php echo $testimonial['content']; ?>"</p>
                        <cite>— <?php echo $testimonial['author']; ?></cite>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
    <section class="cta">
        <div class="container">
            <h2>Prêt à développer votre activité?</h2>
            <p>Inscrivez-vous et commencez à commander vos premiers ballots</p>
            <a href="<?php echo base_url('inscription'); ?>" class="btn btn-secondary">Créer un compte pro</a>
        </div>
    </section>
</main>
