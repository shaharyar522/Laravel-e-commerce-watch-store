 // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
        });

        // Cart functionality
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButtons = document.querySelectorAll('.btn-add-to-cart');
            const cartCount = document.querySelector('.cart-count');
            let count = 2;

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    count++;

                    cartCount.textContent = count;

                    // Show added to cart message

                    const productName = this.closest('.product-card').querySelector('.product-name').textContent;
                    // Create a custom notification
                    const notification = document.createElement('div');

                    notification.style.cssText = `
                        position: fixed;
                        top: 100px;
                        right: 30px;
                        background: var(--gold);
                        color: var(--charcoal);
                        padding: 1rem 1.5rem;
                        border-radius: 0;
                        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
                        z-index: 1000;
                        font-weight: 600;
                        transform: translateX(150%);
                        transition: transform 0.4s ease;
                    `;
                    
                    notification.textContent = `Added ${productName} to cart`;
                    document.body.appendChild(notification);

                    // Animate in
                    setTimeout(() => {
                        notification.style.transform = 'translateX(0)';
                    }, 100);

                    // Animate out after 3 seconds
                    setTimeout(() => {
                        notification.style.transform = 'translateX(150%)';
                        setTimeout(() => {
                            document.body.removeChild(notification);
                        }, 400);
                    }, 3000);
                });
            });

            // Wishlist functionality
            const wishlistButtons = document.querySelectorAll('.btn-wishlist');

            wishlistButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const icon = this.querySelector('i');
                    if (icon.classList.contains('far')) {
                        icon.classList.remove('far');
                        icon.classList.add('fas');
                        this.style.background = '#ff6b6b';
                        this.style.color = 'white';
                    } else {
                        icon.classList.remove('fas');
                        icon.classList.add('far');
                        this.style.background = '';
                        this.style.color = '';
                    }
                });
            });
        });
