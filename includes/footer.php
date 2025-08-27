<style>
        /* Footer */
        .footer {
            background: #682626;
            color: rgb(255, 255, 255);
            padding: 50px 0 30px;
            width: 100vw;
            margin-left: calc(-50vw + 50%);
        }

        .footer .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1.5fr;
            gap: 50px;
            align-items: start;
        }

        .footer-left {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .footer-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            margin: 0 0 1px 0;
        }

        .footer-tagline {
            font-size: 1rem;
            color: #ffffff;
            font-weight: 400;
        }

        .footer-section h4 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: white;
            font-weight: 600;
        }

        .footer-social h4 {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: white;
            font-weight: 600;
        }

        .social-content {
            display: flex;
            align-items: flex-start;
            gap: 30px;
        }

        .footer-logo {
            flex-shrink: 0;
        }

        .footer-logo-img {
            height: 200px;
            width: 200px;
            background: url("Hive-Lanka-PHP/assets/images/logo.png") no-repeat center;
            background-size: contain;
            display: block;
        }

        .social-links {
            display: flex;
            flex-direction: column;
            gap: 20px;
            flex: 1;
        }

        .social-link {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: color 0.3s ease;
            font-size: 0.95rem;
        }

        .social-link:hover {
            color: #FFE4B5;
        }

        .social-icon {
            width: 30px;
            height: 30px;
            filter: brightness(0) invert(1);
        }

        .linkedin-icon {
            background: url("/assets/images/icons/linkedin.png") no-repeat center;
            background-size: contain;
        }

        .instagram-icon {
            background: url("/assets/images/icons/instagram.png") no-repeat center;
            background-size: contain;
        }

        .twitter-icon {
            background: url("/assets/images/icons/twitter.png") no-repeat center;
            background-size: contain;
        }

        .facebook-icon {
            background: url("/assets/images/icons/facebook.png") no-repeat center;
            background-size: contain;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .contact-info p {
            font-size: 0.95rem;
            color: #ffffff;
            line-height: 1.5;
            margin: 0;
        }

        .newsletter-desc {
            color: #DEB887;
            margin-bottom: 20px;
            line-height: 1.5;
            font-size: 0.95rem;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
            flex-direction: column;
        }

        .newsletter-input {
            padding: 12px 15px;
            border: none;
            border-radius: 6px;
            outline: none;
            font-size: 0.95rem;
            background: rgba(255, 255, 255, 0.9);
        }

        .newsletter-button {
            background: #2E2E2E;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .newsletter-button:hover {
            background: #1A1A1A;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            
            .footer-left {
                text-align: center;
            }
            
            .social-content {
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }
            
            .footer-logo-img {
                height: 80px;
            }
            
            .newsletter-form {
                flex-direction: row;
            }
        }

        @media (max-width: 480px) {
            .footer {
                padding: 40px 0 20px;
            }
            
            .footer-brand {
                font-size: 1.5rem;
            }
            
            .footer-tagline {
                font-size: 0.9rem;
            }
            
            .footer-logo-img {
                height: 60px;
            }
            
            .newsletter-form {
                flex-direction: column;
            }
        }
    </style>

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