/**
 * BallotPro - Script principal
 */

document.addEventListener('DOMContentLoaded', function() {
    // Menu mobile toggle
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const nav = document.querySelector('nav');
    
    if (mobileMenuToggle && nav) {
        mobileMenuToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            nav.classList.toggle('active');
        });
    }
    
    // Mettre à jour le compteur du panier
    updateCartCount();
    
    // Activer toutes les animations lors du chargement
    const animatedElements = document.querySelectorAll('.fadeIn');
    animatedElements.forEach((element, index) => {
        setTimeout(() => {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, 100 * index);
    });
    
    // Activer le slider de testimonials s'il existe
    initTestimonialSlider();
});

/**
 * Initialise le slider de témoignages
 */
function initTestimonialSlider() {
    const testimonials = document.querySelectorAll('.testimonial');
    
    if (testimonials.length <= 1) return;
    
    // Cacher tous les testimonials sauf le premier
    for (let i = 1; i < testimonials.length; i++) {
        testimonials[i].style.display = 'none';
    }
    
    let currentIndex = 0;
    
    // Changer de testimonial toutes les 5 secondes
    setInterval(() => {
        testimonials[currentIndex].style.display = 'none';
        currentIndex = (currentIndex + 1) % testimonials.length;
        testimonials[currentIndex].style.display = 'block';
        testimonials[currentIndex].classList.add('fadeIn');
    }, 5000);
}

/**
 * Met à jour le nombre d'articles dans le panier
 */
function updateCartCount() {
    const cartCountElement = document.getElementById('cart-count');
    
    if (!cartCountElement) return;
    
    // Récupérer le panier depuis le stockage local
    const cart = getCart();
    let totalItems = 0;
    
    // Calculer le nombre total d'articles
    cart.forEach(item => {
        totalItems += parseInt(item.quantity || 1);
    });
    
    cartCountElement.textContent = totalItems;
}

/**
 * Ajoute un produit au panier
 */
function addToCart(productId, name, price, quantity = 1) {
    // Récupérer le panier actuel
    const cart = getCart();
    
    // Vérifier si le produit est déjà dans le panier
    const existingProduct = cart.find(item => item.id === productId);
    
    if (existingProduct) {
        // Mettre à jour la quantité
        existingProduct.quantity += parseInt(quantity);
    } else {
        // Ajouter un nouveau produit
        cart.push({
            id: productId,
            name: name,
            price: parseFloat(price),
            quantity: parseInt(quantity)
        });
    }
    
    // Sauvegarder le panier
    localStorage.setItem('ballotpro_cart', JSON.stringify(cart));
    
    // Mettre à jour l'affichage
    updateCartCount();
    
    // Notification de succès
    showNotification(`${name} ajouté au panier !`, 'success');
}

/**
 * Récupère le panier depuis le stockage local
 */
function getCart() {
    const cartData = localStorage.getItem('ballotpro_cart');
    return cartData ? JSON.parse(cartData) : [];
}

/**
 * Affiche une notification
 */
function showNotification(message, type = 'info') {
    // Créer l'élément de notification
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'}"></i>
            <p>${message}</p>
        </div>
        <button class="notification-close"><i class="fas fa-times"></i></button>
    `;
    
    // Ajouter au DOM
    document.body.appendChild(notification);
    
    // Afficher la notification
    setTimeout(() => {
        notification.classList.add('show');
    }, 100);
    
    // Programmer la disparition
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 5000);
    
    // Permettre la fermeture manuelle
    notification.querySelector('.notification-close').addEventListener('click', () => {
        notification.classList.remove('show');
        setTimeout(() => {
            notification.remove();
        }, 300);
    });
}

/**
 * Ajoute des styles pour les notifications
 */
(function addNotificationStyles() {
    const style = document.createElement('style');
    style.textContent = `
        .notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #fff;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 300px;
            max-width: 90%;
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .notification.show {
            transform: translateY(0);
            opacity: 1;
        }
        
        .notification-content {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .notification.success .notification-content i {
            color: #27ae60;
        }
        
        .notification.error .notification-content i {
            color: #e74c3c;
        }
        
        .notification-close {
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            font-size: 0.9rem;
            padding: 5px;
        }
        
        .notification-close:hover {
            color: #333;
        }
    `;
    
    document.head.appendChild(style);
})();
