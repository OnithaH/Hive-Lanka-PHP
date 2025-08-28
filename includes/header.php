<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hive Lanka</title>
    
</head>
<body>
    <header class="header">
        <!-- Top row with logo, search, and user controls -->
        <div class="header-top">
            <div class="left-section">
                <!--<img src="assets/images/logo.png" alt="HIVE G&H Logo" class="logo">-->
                <div class="logo"></div>
                
                <div class="language-selector">
                    <div class="globe-icon"></div>
                    <span class="language-text">Eng</span>
                    <div class="dropdown-arrow"></div>
                </div>
            </div>

            <div class="center-section">
                <div class="search-container">
                    <div class="mic-icon"></div>
                    <span class="divider"></span> 
                    <div class="image-recognition"></div> 
                    <input type="text" class="search-input" placeholder="Search...">              
                    <div class="search-icon"></div>
                </div>
            </div>

            <div class="right-section">
                <button class="icon-button cart-button">
                    <div class="cart-icon"></div>
                </button>
                
                <div class="user-section">
                    <div class="user-icon"></div>
                    <span class="signin-text">Sign In</span>
                </div>
            </div>
        </div>

        <!-- Navigation buttons row -->
        <div class="navigation-section">
            <div class="nav-buttons">
                <button class="nav-button">Home</button>                
                <button class="nav-button">Shop</button>
                <button class="nav-button">Donate</button>
                <button class="nav-button">Community Forum</button>
                <button class="nav-button">Tutorials</button>
                <button class="nav-button">Events</button>
                <button class="nav-button">About Us</button>
                <button class="nav-button">Contact</button>
                <button class="nav-button">FAQ</button>
            </div>
        </div>
    </header>

    <script>
        // Language Selector Dropdown
        document.addEventListener('DOMContentLoaded', function() {
            const languageSelector = document.querySelector('.language-selector');
            const languageText = document.querySelector('.language-text');
            
            if (!languageSelector || !languageText) return;
            
            // Create dropdown menu
            const dropdown = document.createElement('div');
            dropdown.className = 'language-dropdown';
            dropdown.innerHTML = `
                <div class="language-option" data-lang="en">
                    <span class="lang-flag">🇺🇸</span>
                    <span>English</span>
                </div>
                <div class="language-option" data-lang="si">
                    <span class="lang-flag">🇱🇰</span>
                    <span>සිංහල</span>
                </div>
            `;
            
            languageSelector.appendChild(dropdown);
            
            // Toggle dropdown
            languageSelector.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdown.classList.toggle('show');
            });
            
            // Handle language selection
            dropdown.addEventListener('click', function(e) {
                e.stopPropagation();
                const option = e.target.closest('.language-option');
                if (option) {
                    const lang = option.dataset.lang;
                    const text = option.querySelector('span:last-child').textContent;
                    
                    if (lang === 'en') {
                        languageText.textContent = 'Eng';
                    } else {
                        languageText.textContent = 'සිං';
                    }
                    
                    dropdown.classList.remove('show');
                    console.log(`Language changed to: ${text}`);
                }
            });
            
            // Close dropdown when clicking
            document.addEventListener('click', function() {
                dropdown.classList.remove('show');
            });

            // Navigation buttons click handler
            const navButtons = document.querySelectorAll('.nav-button');
            
            navButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const buttonText = this.textContent.trim();
                    
                    switch(buttonText) {
                        case 'Home':
                            window.location.href = 'index.php';
                            break;
                        case 'Shop':
                            window.location.href = 'shop.php';
                            break;
                        case 'Donate':
                            window.location.href = 'public/fundraising.php';
                            break;
                        case 'Community Forum':
                            window.location.href = 'public/forum.php';
                            break;
                        case 'Tutorials':
                            window.location.href = 'public/tutorials.php';
                            break;
                        case 'Events':
                            window.location.href = 'events.php';
                            break;
                        case 'About Us':
                            window.location.href = 'about.php';
                            break;
                        case 'Contact':
                            window.location.href = 'contact.php';
                            break;
                        case 'FAQ':
                            console.log('FAQ page coming soon');
                            break;
                        default:
                            console.log(`Page not found for: ${buttonText}`);
                    }
                });
            });
        });
    </script>