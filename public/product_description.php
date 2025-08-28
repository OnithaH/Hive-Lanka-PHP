<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Description Page</title>
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/product_description.css">
    <?php include '../includes/header.php'; ?>
</head>


<body>


    <div class="pd-container">
        <!-- Product Section -->
        <div class="product-section">
            <!-- Image Gallery -->
            <div class="image-gallery">
                <div class="main-image-container">
                    <img src="../../../../asset/images/product_description/image1.png" alt="Product" class="main-image" id="mainImage">
                    <button class="nav-btn prev" onclick="previousImage()">‹</button>
                    <button class="nav-btn next" onclick="nextImage()">›</button>
                </div>
                <div class="thumbnail-container">
                    <div class="thumbnail active" onclick="changeImage(0)">
                        <img src="../../../../asset/images/product_description/image1.png" alt="Thumbnail 1">
                    </div>
                    <div class="thumbnail" onclick="changeImage(1)">
                        <img src="../../../../asset/images/product_description/image2.png" alt="Thumbnail 2">
                    </div>
                    <div class="thumbnail" onclick="changeImage(2)">
                        <img src="../../../../asset/images/product_description/image3.png" alt="Thumbnail 3">
                    </div>
                    <div class="thumbnail" onclick="changeImage(3)">
                        <img src="../../../../asset/images/product_description/image4.png" alt="Thumbnail 4">
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="product-info">
                <h1 class="product-title">One Piece of a Capybara Scarf Doll</h1>

                <div class="store-info">
                    <span class="store-name">Store name</span>
                </div>

                <div class="rating">
                    <div class="stars" id="ratingStars">
                        <span class="star active" onclick="setRating(1)">★</span>
                        <span class="star active" onclick="setRating(2)">★</span>
                        <span class="star active" onclick="setRating(3)">★</span>
                        <span class="star active" onclick="setRating(4)">★</span>
                        <span class="star active" onclick="setRating(5)">★</span>
                    </div>
                </div>

                <div class="price">LKR 2500</div>

                <div class="quantity-section">
                    <div class="quantity-controls">
                        <button class="qty-btn" onclick="decreaseQuantity()">-</button>
                        <input type="number" class="qty-input" id="quantity" value="1" min="1">
                        <button class="qty-btn" onclick="increaseQuantity()">+</button>
                    </div>
                    <button class="add-to-cart" onclick="addToCart()">ADD TO CART</button>
                </div>

                <div class="purchase-info">
                    <span> Purchase are not just from their doorstep</span>
                </div>

                <div>
                    <span class="share-btn">📤 Share</span>
                </div>
            </div>
        </div>

        <!-- Details Section -->
        <div class="details-section">
            <h3>Details</h3>
            <div>Featuring a Funny And Cute Plush Design, Perfect for All Ages And Ideal for Gifts on Birthdays,
                Thanksgiving, And Christmas.</div>
        </div>

        <!-- Shop Section -->
        <div class="shop-section">
            <div class="shop-header">
                <div class="shop-details">
                    <h3>Shop Name</h3>
                    <div class="shop-address">Shop Address</div>
                </div>
                <div class="verified-badge">
                    <span>✓ Verified seller</span>
                </div>
            </div>
            <button class="message-seller-btn" onclick="openChat()">MESSAGE SELLER</button>
        </div>

        <!-- Returns Section -->
        <div class="returns-section">
            <h3>Returns</h3>
            <ul class="returns-list">
                <li>Return Policy - All sales are final 24 hours after delivery, unless otherwise specified in the
                    description of the product</li>
                <li><a href="#" class="view-policies">View standard return policies</a></li>
            </ul>
        </div>

        <!-- Recommendations -->
        <div class="recommendations">
            <h3>Recommendations</h3>
            <div class="recommendations-grid">
                <div class="recommendation-item" onclick="viewProduct(1)">
                    <div class="recommendation-image">
                        <img src="../../../../asset/images/product_description/rec1.png" alt="Product 01">
                    </div>
                    <div class="recommendation-title">Cute Kapi Bar Capybara Plush Bracelet Doll</div>
                    <div class="recommendation-price">LKR 2000</div>
                </div>
                <div class="recommendation-item" onclick="viewProduct(2)">
                    <div class="recommendation-image">
                        <img src="../../../../asset/images/product_description/rec2.png" alt="Product 02">
                    </div>
                    <div class="recommendation-title">Adorable Capybara in Detachable Avocado</div>
                    <div class="recommendation-price">LKR 3500</div>
                </div>
                <div class="recommendation-item" onclick="viewProduct(3)">
                    <div class="recommendation-image">
                        <img src="../../../../asset/images/product_description/rec3.png" alt="Product 03">
                    </div>
                    <div class="recommendation-title">WOOFABLE Giant Capybara & Shark Snack Bag Plush Pillow</div>
                    <div class="recommendation-price">LKR 8000</div>
                </div>
                <div class="recommendation-item" onclick="viewProduct(4)">
                    <div class="recommendation-image">
                        <img src="../../../../asset/images/product_description/rec4.png" alt="Product 04">
                    </div>
                    <div class="recommendation-title">A cute shark and capybara</div>
                    <div class="recommendation-price">LKR 4,150</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay -->
    <div class="overlay" id="overlay" onclick="closePanels()"></div>

    <!-- Cart Panel -->
    <div class="slide-panel" id="cartPanel">
        <div class="panel-header">
            <h3>Added to Cart</h3>
            <button class="close-btn" onclick="closeCart()">×</button>
        </div>
        <div class="panel-content">
            <p>Product has been added to your cart successfully!</p>
            <div class="cart-actions">
                <button class="cart-btn continue-shopping" onclick="continueShopping()">Continue Shopping</button>
                <button class="cart-btn visit-cart" onclick="visitCart()">Visit Cart</button>
            </div>
        </div>
    </div>

    <!-- Chat Panel -->
    <div class="slide-panel" id="chatPanel">
        <div class="panel-header">
            <h3>Chat with Seller</h3>
            <button class="close-btn" onclick="closeChat()">×</button>
        </div>
        <div class="panel-content">
            <div class="chat-messages" id="chatMessages">
                <p><strong>Seller:</strong> Hello! How can I help you with this product?</p>
            </div>
            <div class="chat-input-container">
                <input type="text" class="chat-input" id="chatInput" placeholder="Type your message...">
                <button class="send-btn" onclick="sendMessage()">Send</button>
            </div>
        </div>
    </div>

   <?php include '../includes/footer.php'; ?>

    <script>
        // Image gallery functionality
        const images = [
            '../../../../asset/images/product_description/image1.png',
            '../../../../asset/images/product_description/image2.png',
            '../../../../asset/images/product_description/image3.png',
            '../../../../asset/images/product_description/image4.png',
        ];

        let currentImageIndex = 0;

        function changeImage(index) {
            currentImageIndex = index;
            document.getElementById('mainImage').src = images[index];

            // Update active thumbnail
            const thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach((thumb, i) => {
                thumb.classList.toggle('active', i === index);
            });
        }

        function previousImage() {
            currentImageIndex = currentImageIndex === 0 ? images.length - 1 : currentImageIndex - 1;
            changeImage(currentImageIndex);
        }

        function nextImage() {
            currentImageIndex = currentImageIndex === images.length - 1 ? 0 : currentImageIndex + 1;
            changeImage(currentImageIndex);
        }

        // Rating functionality
        let currentRating = 5;

        function setRating(rating) {
            currentRating = rating;
            const stars = document.querySelectorAll('.star');
            stars.forEach((star, index) => {
                star.classList.toggle('active', index < rating);
            });
        }

        // Add hover effect for stars
        const stars = document.querySelectorAll('.star');
        stars.forEach((star, index) => {
            star.addEventListener('mouseenter', () => {
                stars.forEach((s, i) => {
                    s.classList.toggle('hover', i <= index);
                });
            });

            star.addEventListener('mouseleave', () => {
                stars.forEach(s => s.classList.remove('hover'));
            });
        });

        // Quantity controls
        function increaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }

        function decreaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        }

        // Cart functionality
        function addToCart() {
            document.getElementById('overlay').classList.add('show');
            document.getElementById('cartPanel').classList.add('open');
        }

        function closeCart() {
            document.getElementById('cartPanel').classList.remove('open');
            document.getElementById('overlay').classList.remove('show');
        }

        function continueShopping() {
            closeCart();
        }

        function visitCart() {
            alert('Redirecting to shopping cart...');
            closeCart();
        }

        // Chat functionality
        function openChat() {
            document.getElementById('overlay').classList.add('show');
            document.getElementById('chatPanel').classList.add('open');
        }

        function closeChat() {
            document.getElementById('chatPanel').classList.remove('open');
            document.getElementById('overlay').classList.remove('show');
        }

        function sendMessage() {
            const chatInput = document.getElementById('chatInput');
            const chatMessages = document.getElementById('chatMessages');

            if (chatInput.value.trim()) {
                const messageDiv = document.createElement('p');
                messageDiv.innerHTML = `<strong>You:</strong> ${chatInput.value}`;
                chatMessages.appendChild(messageDiv);

                chatInput.value = '';
                chatMessages.scrollTop = chatMessages.scrollHeight;

                // Simulate seller response
                setTimeout(() => {
                    const responseDiv = document.createElement('p');
                    responseDiv.innerHTML = `<strong>Seller:</strong> Thank you for your message. I'll get back to you shortly!`;
                    chatMessages.appendChild(responseDiv);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }, 1000);
            }
        }

        // Close panels when clicking overlay
        function closePanels() {
            document.getElementById('cartPanel').classList.remove('open');
            document.getElementById('chatPanel').classList.remove('open');
            document.getElementById('overlay').classList.remove('show');
        }

        // Recommendations functionality
        function viewProduct(productId) {
            alert(`Viewing Product ${productId}`);
        }

        // Allow Enter key in chat input
        document.getElementById('chatInput').addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
    </script>
</body>

</html>