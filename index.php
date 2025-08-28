<link rel="stylesheet" href="assets/css/home.css">
<link rel="stylesheet" href="assets/css/header.css">
<link rel="stylesheet" href="assets/css/footer.css">
<?php include 'includes/header.php'; ?>
<!-- Main Content -->
<main class="main-content">
    <!-- Green Action Bar -->
    <section class="action-bar">
        <!--<div class="action-buttons">
            <button class="action-btn">Quick Start</button>
            <button class="action-btn">Best Deals</button>
            <button class="action-btn">New Arrivals</button>
            <button class="action-btn">Support Local</button>
            <button class="action-btn">Join Community</button>
        </div>-->
    </section>

    <!-- Advertisement Banner Section -->
    <section class="banner-section">
        <div class="banner-container">
            <div class="banner-slider">
                <div class="banner-slide active">
                    <img src="assets/images/banner/ad1.jpg" alt="Advertisement 1" class="banner-image">
                </div>
                <div class="banner-slide">
                    <img src="assets/images/banner/ad2.png" alt="Advertisement 2" class="banner-image">
                </div>
                <div class="banner-slide">
                    <img src="assets/images/banner/ad3.png" alt="Advertisement 3" class="banner-image">
                </div>
            </div>
            
            <!-- Banner Navigation Dots -->
            <div class="banner-dots">
                <span class="dot active" data-slide="0"></span>
                <span class="dot" data-slide="1"></span>
                <span class="dot" data-slide="2"></span>
            </div>
            
            <!-- Banner Navigation Arrows -->
            <button class="banner-nav prev" onclick="changeSlide(-1)">&#10094;</button>
            <button class="banner-nav next" onclick="changeSlide(1)">&#10095;</button>
        </div>
    </section>

    <!-- Products Showcase Section -->
    <section class="products-showcase">
        <div class="container">
            <!-- Category Icons Row -->
            <div class="category-icons-row">
                <button class="category-nav prev-categories">⮜</button>
                <div class="category-icons-container">
                    <div class="category-icon-item">
                        <div class="category-circle">
                            <img src="assets/images/categories/jewelry.jpg" alt="Jewelry" class="category-image">
                        </div>
                    </div>
                    <div class="category-icon-item">
                        <div class="category-circle">
                            <img src="assets/images/categories/ceramic.jpg" alt="Ceramic" class="category-image">
                        </div>
                    </div>
                    <div class="category-icon-item">
                        <div class="category-circle">
                            <img src="assets/images/categories/living.jpg" alt="Living Room" class="category-image">
                        </div>
                    </div>
                    <div class="category-icon-item">
                        <div class="category-circle">
                            <img src="assets/images/categories/kitchen.jpg" alt="Kitchen" class="category-image">
                        </div>
                    </div>
                </div>
                <button class="category-nav next-categories">⮞</button>
            </div>

            <!-- Products Grid -->
            <div class="products-showcase-grid">
                <!-- Row 1 -->
                <div class="product-showcase-card">
                    <div class="product-showcase-image">
                        <img src="assets/images/products/jewelry1.jpg" alt="Jewelry Product 01" class="product-image">
                    </div>
                    <div class="product-showcase-info">
                        <h3 class="product-showcase-title">Jewelry Product 01</h3>
                        <p class="product-showcase-price">LKR 2500.00</p>
                        <div class="product-showcase-seller">
                            <span class="shop-name">Shop Name</span>
                            <span class="verified-badge">✓ Verified Seller</span>
                        </div>
                    </div>
                </div>

                <div class="product-showcase-card">
                    <div class="product-showcase-image">
                        <img src="assets/images/products/ceramic1.jpg" alt="Ceramic Product 01" class="product-image">
                    </div>
                    <div class="product-showcase-info">
                        <h3 class="product-showcase-title">Ceramic Product 01</h3>
                        <p class="product-showcase-price">LKR 3200.00</p>
                        <div class="product-showcase-seller">
                            <span class="shop-name">Shop Name</span>
                            <span class="verified-badge">✓ Verified Seller</span>
                        </div>
                    </div>
                </div>

                <div class="product-showcase-card">
                    <div class="product-showcase-image">
                        <img src="assets/images/products/living1.jpg" alt="Living Room Product 01" class="product-image">
                    </div>
                    <div class="product-showcase-info">
                        <h3 class="product-showcase-title">Living Room Product 01</h3>
                        <p class="product-showcase-price">LKR 15000.00</p>
                        <div class="product-showcase-seller">
                            <span class="shop-name">Shop Name</span>
                            <span class="verified-badge">✓ Verified Seller</span>
                        </div>
                    </div>
                </div>

                <div class="product-showcase-card">
                    <div class="product-showcase-image">
                        <img src="assets/images/products/kitchen1.jpg" alt="Kitchen Product 01" class="product-image">
                    </div>
                    <div class="product-showcase-info">
                        <h3 class="product-showcase-title">Kitchen Product 01</h3>
                        <p class="product-showcase-price">LKR 8500.00</p>
                        <div class="product-showcase-seller">
                            <span class="shop-name">Shop Name</span>
                            <span class="verified-badge">✓ Verified Seller</span>
                        </div>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="product-showcase-card">
                    <div class="product-showcase-image">
                        <img src="assets/images/products/jewelry2.jpg" alt="Jewelry Product 02" class="product-image">
                    </div>
                    <div class="product-showcase-info">
                        <h3 class="product-showcase-title">Jewelry Product 02</h3>
                        <p class="product-showcase-price">LKR 2250.00</p>
                        <div class="product-showcase-seller">
                            <span class="shop-name">Shop Name</span>
                            <span class="verified-badge">✓ Verified Seller</span>
                        </div>
                    </div>
                </div>

                <div class="product-showcase-card">
                    <div class="product-showcase-image">
                        <img src="assets/images/products/ceramic2.jpg" alt="Ceramic Product 02" class="product-image">
                    </div>
                    <div class="product-showcase-info">
                        <h3 class="product-showcase-title">Ceramic Product 02</h3>
                        <p class="product-showcase-price">LKR 1250.00</p>
                        <div class="product-showcase-seller">
                            <span class="shop-name">Shop Name</span>
                            <span class="verified-badge">✓ Verified Seller</span>
                        </div>
                    </div>
                </div>

                <div class="product-showcase-card">
                    <div class="product-showcase-image">
                        <img src="assets/images/products/living2.jpg" alt="Living Room Product 02" class="product-image">
                    </div>
                    <div class="product-showcase-info">
                        <h3 class="product-showcase-title">Living Room Product 02</h3>
                        <p class="product-showcase-price">LKR 8000.00</p>
                        <div class="product-showcase-seller">
                            <span class="shop-name">Shop Name</span>
                            <span class="verified-badge">✓ Verified Seller</span>
                        </div>
                    </div>
                </div>

                <div class="product-showcase-card">
                    <div class="product-showcase-image">
                        <img src="assets/images/products/kitchen2.jpg" alt="Kitchen Product 02" class="product-image">
                    </div>
                    <div class="product-showcase-info">
                        <h3 class="product-showcase-title">Kitchen Product 02</h3>
                        <p class="product-showcase-price">LKR 9500.00</p>
                        <div class="product-showcase-seller">
                            <span class="shop-name">Shop Name</span>
                            <span class="verified-badge">✓ Verified Seller</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Event Banner Section -->
    <section class="event-banner-section">
        <div class="container">
            <div class="event-banner-container">
                <div class="event-banner-slider">
                    <div class="event-banner-slide active">
                        <img src="assets/images/event/event1.jpg" alt="Event 1" class="event-banner-image">
                    </div>
                    <div class="event-banner-slide">
                        <img src="assets/images/event/event2.jpg" alt="Event 2" class="event-banner-image">
                    </div>
                    <div class="event-banner-slide">
                        <img src="assets/images/event/event3.jpg" alt="Event 3" class="event-banner-image">
                    </div>
                </div>
                
                <!-- Event Navigation Dots -->
                <div class="event-banner-dots">
                    <span class="event-dot active" data-slide="0"></span>
                    <span class="event-dot" data-slide="1"></span>
                    <span class="event-dot" data-slide="2"></span>
                </div>
                
                <!-- Event Navigation Arrows -->
                <button class="event-banner-nav prev" onclick="changeEventSlide(-1)">&#10094;</button>
                <button class="event-banner-nav next" onclick="changeEventSlide(1)">&#10095;</button>
            </div>
        </div>
    </section>

    <!-- About Hive Lanka Section -->
    <section class="about-hive-section">
        <div class="container">
            <h2 class="about-hive-title">What is Hive Lanka?</h2>
            <div class="about-hive-content">
                <div class="about-card mission-card">
                    <div class="card-icon">🌱</div>
                    <div class="card-content">
                        <h3>Our Mission</h3>
                        <p>Our mission is to create opportunities for entrepreneurs across the country, especially those from underrepresented groups like orphanages and elderly homes to showcase and sell their products to a wider audience. More than just a marketplace, we offer buyers the chance to give back by donating directly to these homes and small businesses in need.</p>
                    </div>
                    <div class="card-decoration"></div>
                </div>
                
                <div class="about-card vision-card">
                    <div class="card-icon">🤝</div>
                    <div class="card-content">
                        <h3>Our Vision</h3>
                        <p>At Hive Lanka we believe in empowering communities by uniting small businesses, local vendors, and charitable organizations on one inclusive platform. Together, we're building a supportive ecosystem where commerce meets compassion, and every purchase has the power to make a difference.</p>
                    </div>
                    <div class="card-decoration"></div>
                </div>
            </div>
            
            <div class="about-stats">
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Local Vendors</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">1000+</div>
                    <div class="stat-label">Products</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Communities Helped</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">₹2M+</div>
                    <div class="stat-label">Donations Raised</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <h2 class="testimonials-title">What Does Our Guests Say ?</h2>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="stars-rating">
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                        </div>
                        <div class="rating-score">9.1</div>
                    </div>
                    <p class="testimonial-text">"The website is good experience for beginners"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="assets/images/testimonials/person1.jpg" alt="Onithaa Bandulaa" class="avatar-image">
                        </div>
                        <div class="author-info">
                            <div class="author-name">Limuthu Jundathissa</div>
                            <div class="author-role">Customer</div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="stars-rating">
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                        </div>
                        <div class="rating-score">10</div>
                    </div>
                    <p class="testimonial-text">"The website is good experience for beginners. I liked how we can buy products easily"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="assets/images/testimonials/person2.png" alt="Onithaa Bandulaa" class="avatar-image">
                        </div>
                        <div class="author-info">
                            <div class="author-name">Random man</div>
                            <div class="author-role">Seller / Business Owner</div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="stars-rating">
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                        </div>
                        <div class="rating-score">9.7</div>
                    </div>
                    <p class="testimonial-text">"The website is good experience for beginners. It helped me raise funds Easily"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="assets/images/testimonials/person3.jpg" alt="Onithaa Bandulaa" class="avatar-image">
                        </div>
                        <div class="author-info">
                            <div class="author-name">Binduli Rathnayaka</div>
                            <div class="author-role">Organization Owner</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="assets/js/home.js"></script>
<?php include 'includes/footer.php';?>