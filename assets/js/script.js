/**
 * BallotPro - Script principal
 */

document.addEventListener('DOMContentLoaded', function() {
    // Menu mobile
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const nav = document.querySelector('nav');
    
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            nav.classList.toggle('active');
        });
    }
    
    // Mise à jour du panier
    updateCartCount();
    
    // Testimonial slider
    const testimonials = document.querySelectorAll('.testimonial');
    let currentTestimonial = 0;
    
    if (testimonials.length > 1) {
        // Cacher tous les testimonials sauf le premier
        for (let i = 1; i < testimonials.length; i++) {
            testimonials[i].style.display = 'none';
        }
        
        // Changer de testimonial toutes les 5 secondes
        setInterval(function() {
            testimonials[currentTestimonial].style.display = 'none';
            currentTestimonial = (currentTestimonial + 1) % testimonials.length;
            testimonials[currentTestimonial].style.display = 'block';
        }, 5000);
    }
});

/**
 * Met à jour le nombre d'articles dans le panier
 */
function updateCartCount() {
    const cartCountElement = document.getElementById('cart-count');
    if (!cartCountElement) return;
    
    // Récupérer le panier depuis le stockage local
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let count = 0;
    
    // Compter le nombre total d'articles
    cart.forEach(item => {
        count += parseInt(item.quantity || 1);
    });
    
    cartCountElement.textContent = count;
}

/**
 * Ajoute un produit au panier
 */
function addToCart(productId, name, price, quantity = 1) {
    // Récupérer le panier actuel ou en créer un nouveau
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // Vérifier si le produit est déjà dans le panier
    const existingItemIndex = cart.findIndex(item => item.id === productId);
    
    if (existingItemIndex > -1) {
        // Mettre à jour la quantité si le produit existe déjà
        cart[existingItemIndex].quantity += parseInt(quantity);
    } else {
        // Ajouter le produit au panier
        cart.push({
            id: productId,
            name: name,
            price: parseFloat(price),
            quantity: parseInt(quantity)
        });
    }
    
    // Enregistrer le panier mis à jour
    localStorage.setItem('cart', JSON.stringify(cart));
    
    // Mettre à jour le compteur du panier
    updateCartCount();
    
    // Afficher un message de confirmation
    alert(`${name} ajouté au panier !`);
}
