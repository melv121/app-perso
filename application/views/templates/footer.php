<footer>
    <div class="container">
        <div class="footer-sections">
            <div class="footer-section">
                <h3>BallotPro</h3>
                <p>Fournisseur de ballots de vêtements de qualité pour les revendeurs professionnels.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Liens utiles</h3>
                <ul>
                    <li><a href="<?php echo base_url('a-propos'); ?>">À propos</a></li>
                    <li><a href="<?php echo base_url('comment-ca-marche'); ?>">Comment ça marche</a></li>
                    <li><a href="<?php echo base_url('faq'); ?>">FAQ</a></li>
                    <li><a href="<?php echo base_url('blog'); ?>">Blog & conseils</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Catégories</h3>
                <ul>
                    <li><a href="<?php echo base_url('catalogue?cat=premium'); ?>">Ballots Premium</a></li>
                    <li><a href="<?php echo base_url('catalogue?cat=vintage'); ?>">Ballots Vintage</a></li>
                    <li><a href="<?php echo base_url('catalogue?cat=casual'); ?>">Ballots Casual</a></li>
                    <li><a href="<?php echo base_url('catalogue?cat=enfants'); ?>">Ballots Enfants</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact</h3>
                <ul class="contact-info">
                    <li><i class="fas fa-map-marker-alt"></i> 123 Rue du Commerce, 75000 Paris</li>
                    <li><i class="fas fa-phone"></i> 01 23 45 67 89</li>
                    <li><i class="fas fa-envelope"></i> contact@ballotpro.com</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> BallotPro. Tous droits réservés.</p>
            <ul>
                <li><a href="<?php echo base_url('mentions-legales'); ?>">Mentions légales</a></li>
                <li><a href="<?php echo base_url('cgv'); ?>">CGV</a></li>
                <li><a href="<?php echo base_url('confidentialite'); ?>">Politique de confidentialité</a></li>
            </ul>
        </div>
    </div>
</footer>

<script src="<?php echo base_url('assets/js/script.js'); ?>"></script>
</body>
</html>
