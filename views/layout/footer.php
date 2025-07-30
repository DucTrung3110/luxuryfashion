<!-- PHẦN 3: FOLLOW US + NEWSLETTER + FOOTER -->

<!-- Follow Us Online -->
<section class="follow-us">
    <div class="follow-left">
        <h2>Follow Us Online</h2>
        <a href="#" class="instagram-link">Go to Instagram</a>
    </div>
    <div class="follow-right">
        <img src="https://images.pexels.com/photos/1894263/pexels-photo-1894263.jpeg" alt="Follow us" />
    </div>
</section>

<!-- Newsletter & Thông tin thương hiệu -->
<section class="newsletter-section">
    <div class="newsletter-left">
        <h2>LUXURY</h2>
    </div>
    <div class="newsletter-right">
        <h3>SUBSCRIBE TO OUR NEWSLETTER</h3>
        <p>and get 10% off your first order</p>
        <form action="#" class="newsletter-form">
            <label for="email">Email Address *</label>
            <input type="email" id="email" name="email" required />

            <div class="newsletter-checkbox">
                <input type="checkbox" id="subscribe-check" name="subscribe-check" />
                <label for="subscribe-check">I subscribe to your newsletter.</label>
            </div>

            <button type="submit" class="btn">Subscribe</button>
        </form>
    </div>
</section>

<!-- Footer -->
<footer class="luxury-footer">
    <div class="footer-top">
        <!-- Cột 1: Shop -->
        <div class="footer-col">
            <h5>Shop</h5>
            <ul>
                <li><a href="?controller=home">Home</a></li>
                <li><a href="?controller=products">Products</a></li>
                <?php if (isLoggedIn()): ?>
                    <li><a href="?controller=orders&action=history">Orders</a></li>
                <?php endif; ?>
                <li><a href="?controller=cart">Cart</a></li>
            </ul>
        </div>

        <!-- Cột 2: Chính sách / Thông tin -->
        <div class="footer-col">
            <h5>Information</h5>
            <ul>
                <li><a href="#">Terms &amp; Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Shipping Policy</a></li>
                <li><a href="#">Refund Policy</a></li>
                <li><a href="#">Accessibility Statement</a></li>
            </ul>
        </div>

        <!-- Cột 3: Liên hệ -->
        <div class="footer-col contact-info">
            <h5>Contact</h5>
            <p>support@dcmfashion.com</p>
            <p>123-456-7890</p>
            <p>
                300 Ferry Francine Street,<br />
                San Francisco, CA 94158
            </p>
            <div class="social-links">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="payment-methods">
            <img src="https://cdn-icons-png.flaticon.com/512/196/196578.png" alt="Visa" style="height: 25px;" />
            <img src="https://cdn-icons-png.flaticon.com/512/196/196544.png" alt="Mastercard" style="height: 25px;" />
            <img src="https://cdn-icons-png.flaticon.com/512/196/196566.png" alt="American Express" style="height: 25px;" />
        </div>
        <p class="payment-note">
            *These payment methods are for illustrative purposes only...
        </p>
        <p class="text-center">&copy; 2025 by DCM Fashion. All rights reserved.</p>
    </div>
</footer>
</main>

<!-- Scroll to top button -->
<button class="scroll-top" id="scrollTop">
    <i class="fas fa-arrow-up"></i>
</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="<?= BASE_URL ?>assets/js/main.js"></script>
<script src="<?= BASE_URL ?>assets/js/cart.js"></script>

<script>
    // ScrollReveal animations
    ScrollReveal().reveal('.sidebar', {
        origin: 'left',
        distance: '50px',
        duration: 800,
        easing: 'ease-out'
    });

    ScrollReveal().reveal('.luxury-navbar', {
        origin: 'top',
        distance: '50px',
        duration: 800,
        easing: 'ease-out'
    });

    ScrollReveal().reveal('.hero-section', {
        scale: 0.9,
        duration: 800,
        easing: 'ease-out'
    });

    ScrollReveal().reveal('.category-section', {
        origin: 'bottom',
        distance: '50px',
        duration: 800,
        easing: 'ease-out'
    });

    ScrollReveal().reveal('.featured-collection', {
        origin: 'bottom',
        distance: '50px',
        duration: 800,
        easing: 'ease-out'
    });

    ScrollReveal().reveal('.follow-us', {
        origin: 'bottom',
        distance: '50px',
        duration: 800,
        easing: 'ease-out'
    });

    ScrollReveal().reveal('.newsletter-section', {
        origin: 'bottom',
        distance: '50px',
        duration: 800,
        easing: 'ease-out'
    });

    ScrollReveal().reveal('.luxury-footer', {
        origin: 'bottom',
        distance: '50px',
        duration: 800,
        easing: 'ease-out'
    });
</script>
</body>

</html>
