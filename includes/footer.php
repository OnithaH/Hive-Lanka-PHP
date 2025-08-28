    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-left">
                    <div class="footer-brand-section">
                        <h3 class="footer-brand">Hive Lanka <span class="footer-tagline">by Vision Stack</span></h3>
                    </div>
                    
                    <div class="footer-social">
                        <h4>Follow Us On :</h4>
                        <div class="social-content">
                            <div class="footer-logo">
                                <div class="footer-logo-img"></div>
                            </div>
                            <div class="social-links">
                                <a href="#" class="social-link">
                                    <div class="social-icon linkedin-icon"></div>
                                    lk.hive_lanka.com
                                </a>
                                <a href="#" class="social-link">
                                    <div class="social-icon instagram-icon"></div>
                                    @hive_lanka
                                </a>
                                <a href="#" class="social-link">
                                    <div class="social-icon twitter-icon"></div>
                                    #hive_lanka
                                </a>
                                <a href="#" class="social-link">
                                    <div class="social-icon facebook-icon"></div>
                                    hive_lanka
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4>Contact Info</h4>
                    <div class="contact-info">
                        <p>• No: 313/17/3 Gonamaditthta road, Piliyandala, Sri Lanka.</p>
                        <p>• Phone: +94 112 595 5982</p>
                        <p>• hive_lanka@gmail.com</p>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4>Stay up to date</h4>
                    <p class="newsletter-desc">Subscribe to our newsletter to stay up-to-date with the latest news, tips, and trends in the industry</p>
                    <div class="newsletter-form">
                        <input type="email" placeholder="Your email address" class="newsletter-input">
                        <button class="newsletter-button">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Footer Newsletter Functionality
        function initFooter() {
            const newsletterButton = document.querySelector('.newsletter-button');
            const newsletterInput = document.querySelector('.newsletter-input');

            if (newsletterButton && newsletterInput) {
                // Remove any existing event listeners
                newsletterButton.replaceWith(newsletterButton.cloneNode(true));
                const newNewsletterButton = document.querySelector('.newsletter-button');
                
                newNewsletterButton.addEventListener('click', function() {
                    const email = newsletterInput.value.trim();
                    
                    console.log('Subscribe button clicked!', email); // Debug log
                    
                    if (email) {
                        if (validateEmail(email)) {
                            // Add subscription logic here
                            console.log(`Newsletter subscription: ${email}`);
                            
                            // Show success message
                            this.textContent = 'Subscribed!';
                            this.style.background = '#4CAF50';
                            newsletterInput.value = '';
                            
                            // Reset button after 3 seconds
                            setTimeout(() => {
                                this.textContent = 'Subscribe';
                                this.style.background = '#2E2E2E';
                            }, 3000);
                        } else {
                            // Show error for invalid email
                            newsletterInput.style.border = '2px solid #f44336';
                            setTimeout(() => {
                                newsletterInput.style.border = 'none';
                            }, 2000);
                        }
                    } else {
                        // Show error for empty email
                        newsletterInput.style.border = '2px solid #f44336';
                        setTimeout(() => {
                            newsletterInput.style.border = 'none';
                        }, 2000);
                    }
                });
                
                // Allow Enter key to subscribe
                newsletterInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        newNewsletterButton.click();
                    }
                });
            } else {
                console.log('Newsletter elements not found'); // Debug log
            }
        }

        // Email validation function
        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', initFooter);

        // Also try to initialize after a short delay
        setTimeout(initFooter, 1000);
    </script>

</body>
</html>