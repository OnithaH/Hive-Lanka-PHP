<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hive Lanka</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #ffffff;
        }

        /* Header container - Updated to accommodate two rows */
        .header {
            background-color: white;
            border-bottom: 1px solid #e0e0e0;
            padding: 8px 20px;
            display: flex;
            flex-direction: column;
            min-height: 150px;
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.1);
        }

        /* Top row of header */
        .header-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 90px;
        }

        /* Left section */
        .left-section {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo {
            height: 110px;
            width: auto;
        }

        /* Language selector with background box */
        .language-selector {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            padding: 10px 16px;
            border-radius: 20px;
            background-color: #f0e6d2;
            transition: all 0.2s ease;
            border: 0px solid #e8dcc0;
            margin-left: 20px;
            position: relative;
        }

        .language-selector:hover {
            background-color: #F7EACC;
            transform: translateY(-1px);
        }

        .globe-icon {
            width: 23px;
            height: 23px;
            background: url("/assets/images/icons/internet.png") no-repeat center;
            background-size: contain;
        }

        .language-text {
            font-size: 14px;
            font-weight: 500;
            color: black;
            margin: 0 4px;
        }

        .dropdown-arrow {
            width: 12px;
            height: 12px;
            background: url("/assets/images/icons/down.png") no-repeat center;
            background-size: contain;
        }

        .language-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            margin-top: 8px;
        }

        .language-dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .language-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            color: #333;
        }

        .language-option:hover {
            background-color: #f0e6d2;
        }

        .language-option:first-child {
            border-radius: 8px 8px 0 0;
        }

        .language-option:last-child {
            border-radius: 0 0 8px 8px;
        }

        .lang-flag {
            font-size: 16px;
        }

        /* Center section - Search */
        .center-section {
            flex: 1;
            max-width: 1000px;
            margin: 0 40px;
        }

        .search-container {
            position: relative;
            width: 100%;
            height: 48px;
            border-radius: 24px;
            background-color: white;
            border: 2px solid black;
            display: flex;
            align-items: center;
            padding: 0 20px;
            transition: all 0.2s ease;
        }

        .search-container:hover {
            border-color: #d4c7a8;
        }

        .search-container:focus-within {
            border-color: #4285f4;
            background-color: white;
        }

        .mic-icon {
            width: 20px;
            height: 20px;
            background: url("/assets/images/icons/mic.png") no-repeat center;
            background-size: contain;
            cursor: pointer;
            flex-shrink: 0;
        }

        .search-input {
            flex: 1;
            border: none;
            background: transparent;
            outline: none;
            font-size: 16px;
            padding: 0 15px;
            color: #333;
        }

        .search-input::placeholder {
            color: #999;
        }

        .image-recognition {
            margin-left: 5px;
            width: 20px;
            height: 20px;
            background: url("/assets/images/icons/image-adjustment.png") no-repeat center;
            background-size: contain;
            cursor: pointer;
            flex-shrink: 0;
        }

        .divider{
            width: 1px;
            height: 20px;
            background-color: #000000;
            margin: 0 10px;
        }

        .search-icon {
            width: 20px;
            height: 20px;
            background: url("/assets/images/icons/magnifier.png") no-repeat center;
            background-size: contain;
            cursor: pointer;
            flex-shrink: 0;
        }

        /* Right section */
        .right-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* Cart button with background box */
        .cart-button {
            width: 48px;
            height: 48px;
            border: none;
            background-color: #ffffff;
            cursor: pointer;
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            border: 1px solid #ffffff;
        }

        .cart-button:hover {
            background-color: #f0e6d2;
            transform: translateY(-1px);
        }

        .cart-icon {
            width: 22px;
            height: 22px;
            background: url("/assets/images/icons/shopping-cart (1).png") no-repeat center;
            background-size: contain;
        }

        /* User section with background box */
        .user-section {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            padding: 10px 16px;
            border-radius: 20px;
            background-color: #f0e6d2; 
            transition: all 0.2s ease;
            border: 0px solid #e0e0e0;
        }

        .user-section:hover {
            background-color: #F7EACC;
            transform: translateY(-1px);
        }

        .user-icon {
            width: 20px;
            height: 20px;
            background: url("/assets/images/icons/user.png") no-repeat center;
            background-size: contain;
        }

        .signin-text {
            font-size: 14px;
            font-weight: 500;
            color: #333;
        }

        /* Navigation section - NEW */
        .navigation-section {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px 0;
            border-top: 1px solid #f0f0f0;
            margin-top: 8px;
            margin-left: 100px;
        }

        .nav-buttons {
            display: flex;
            align-items: center;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .nav-button {
            background: none;
            border: none;
            font-size: 20px;
            font-weight: 500;
            color: #333;
            cursor: pointer;
            padding: 8px 16px;
            border-radius: 20px;
            transition: all 0.2s ease;
            text-decoration: none;
            white-space: nowrap;
        }

        .nav-button:hover {
            background-color: #f0e6d2;
            color: #000;
            transform: translateY(-1px);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .header {
                padding: 8px 15px;
                min-height: 180px;
            }
            
            .header-top {
                gap: 10px;
            }
            
            .left-section {
                gap: 10px;
            }
            
            .center-section {
                margin: 0 15px;
            }
            
            .right-section {
                gap: 10px;
            }
            
            .language-text,
            .signin-text {
                display: none;
            }

            .language-selector,
            .user-section {
                padding: 8px 12px;
            }

            .cart-button {
                width: 40px;
                height: 40px;
            }

            .nav-buttons {
                gap: 15px;
            }

            .nav-button {
                font-size: 13px;
                padding: 6px 12px;
            }
        }

        @media (max-width: 480px) {
            .header {
                min-height: 200px;
            }

            .center-section {
                margin: 0 10px;
            }
            
            .search-container {
                height: 40px;
            }
            
            .language-selector,
            .user-section {
                padding: 6px 10px;
            }
            
            .cart-button {
                width: 36px;
                height: 36px;
            }

            .nav-buttons {
                gap: 10px;
            }

            .nav-button {
                font-size: 12px;
                padding: 5px 10px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <!-- Top row with logo, search, and user controls -->
        <div class="header-top">
            <div class="left-section">
                <img src="/assets/images/logo.png" alt="HIVE G&H Logo" class="logo">
                
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