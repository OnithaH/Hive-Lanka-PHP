// Banner Slider Functionality
let currentSlide = 0;
const slides = document.querySelectorAll('.banner-slide');
const dots = document.querySelectorAll('.dot');
const totalSlides = slides.length;

// Auto-slide interval (10 seconds)
let slideInterval;

// Initialize slider
function initSlider() {
    if (slides.length > 0) {
        showSlide(0);
        startAutoSlide();
    }
}

// Show specific slide
function showSlide(index) {
    // Remove active class from all slides and dots
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));
    
    // Add active class to current slide and dot
    if (slides[index] && dots[index]) {
        slides[index].classList.add('active');
        dots[index].classList.add('active');
    }
    
    currentSlide = index;
}

// Go to next slide
function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
}

// Go to previous slide
function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    showSlide(currentSlide);
}

// Change slide (for manual navigation)
function changeSlide(direction) {
    stopAutoSlide();
    
    if (direction === 1) {
        nextSlide();
    } else {
        prevSlide();
    }
    
    // Restart auto-slide after manual navigation
    setTimeout(startAutoSlide, 3000);
}

// Start auto-slide
function startAutoSlide() {
    if (totalSlides > 1) {
        slideInterval = setInterval(nextSlide, 10000); // 10 seconds
    }
}

// Stop auto-slide
function stopAutoSlide() {
    if (slideInterval) {
        clearInterval(slideInterval);
    }
}

// Add click events to dots
dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        stopAutoSlide();
        showSlide(index);
        setTimeout(startAutoSlide, 3000);
    });
});

// Pause auto-slide on hover
const bannerContainer = document.querySelector('.banner-container');
if (bannerContainer) {
    bannerContainer.addEventListener('mouseenter', stopAutoSlide);
    bannerContainer.addEventListener('mouseleave', startAutoSlide);
}

// Products Showcase Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Category icon click handlers
    const categoryItems = document.querySelectorAll('.category-icon-item');
    categoryItems.forEach((item, index) => {
        item.addEventListener('click', function() {
            // Remove active class from all categories
            categoryItems.forEach(cat => cat.classList.remove('active'));
            // Add active class to clicked category
            this.classList.add('active');
            
            console.log(`Category ${index + 1} clicked`);
            // Add your category filter logic here
        });
    });

    // Category navigation arrows
    const prevCategoriesBtn = document.querySelector('.prev-categories');
    const nextCategoriesBtn = document.querySelector('.next-categories');
    
    if (prevCategoriesBtn) {
        prevCategoriesBtn.addEventListener('click', function() {
            console.log('Previous categories clicked');
            // Add logic to scroll categories if you have more than visible
        });
    }
    
    if (nextCategoriesBtn) {
        nextCategoriesBtn.addEventListener('click', function() {
            console.log('Next categories clicked');
            // Add logic to scroll categories if you have more than visible
        });
    }

    // Product card click handlers
    const productCards = document.querySelectorAll('.product-showcase-card');
    productCards.forEach(card => {
        card.addEventListener('click', function() {
            const productTitle = this.querySelector('.product-showcase-title').textContent;
            const productPrice = this.querySelector('.product-showcase-price').textContent;
            
            console.log(`Product clicked: ${productTitle} - ${productPrice}`);
            // Add navigation to product details page here
            // Example: window.location.href = `product-details.html?product=${encodeURIComponent(productTitle)}`;
        });
    });

    // Add hover effects for product cards
    productCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});

// Action bar buttons functionality (if action bar exists)
const actionButtons = document.querySelectorAll('.action-btn');
actionButtons.forEach(button => {
    button.addEventListener('click', function() {
        const buttonText = this.textContent;
        
        // Add click animation
        this.style.transform = 'scale(0.95)';
        setTimeout(() => {
            this.style.transform = 'scale(1)';
        }, 150);
        
        console.log(`Action button clicked: ${buttonText}`);
    });
});

// Event Banner Functionality
let currentEventSlide = 0;
const eventSlides = document.querySelectorAll('.event-banner-slide');
const eventDots = document.querySelectorAll('.event-dot');
const totalEventSlides = eventSlides.length;
let eventSlideInterval;

function changeEventSlide(direction) {
    stopEventAutoSlide();
    
    if (direction === 1) {
        nextEventSlide();
    } else {
        prevEventSlide();
    }
    
    setTimeout(startEventAutoSlide, 3000);
}

function nextEventSlide() {
    currentEventSlide = (currentEventSlide + 1) % totalEventSlides;
    showEventSlide(currentEventSlide);
}

function prevEventSlide() {
    currentEventSlide = (currentEventSlide - 1 + totalEventSlides) % totalEventSlides;
    showEventSlide(currentEventSlide);
}

function showEventSlide(index) {
    eventSlides.forEach(slide => slide.classList.remove('active'));
    eventDots.forEach(dot => dot.classList.remove('active'));
    
    if (eventSlides[index] && eventDots[index]) {
        eventSlides[index].classList.add('active');
        eventDots[index].classList.add('active');
    }
    
    currentEventSlide = index;
}

function startEventAutoSlide() {
    if (totalEventSlides > 1) {
        eventSlideInterval = setInterval(nextEventSlide, 10000);
    }
}

function stopEventAutoSlide() {
    if (eventSlideInterval) {
        clearInterval(eventSlideInterval);
    }
}

// Initialize in DOMContentLoaded (add to existing)
eventDots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        stopEventAutoSlide();
        showEventSlide(index);
        setTimeout(startEventAutoSlide, 3000);
    });
});

// Add to existing DOMContentLoaded
if (eventSlides.length > 0) {
    showEventSlide(0);
    startEventAutoSlide();
}

// Counter Animation for Stats
function animateCounter(element, target, duration = 2000) {
    let start = 0;
    const increment = target / (duration / 16);
    
    function updateCounter() {
        start += increment;
        if (start < target) {
            element.textContent = Math.floor(start) + '+';
            requestAnimationFrame(updateCounter);
        } else {
            element.textContent = target + '+';
        }
    }
    updateCounter();
}

// Intersection Observer for Stats Animation
const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const statNumbers = entry.target.querySelectorAll('.stat-number');
            
            statNumbers.forEach(stat => {
                const text = stat.textContent;
                let targetNumber;
                
                // Extract number from text (handles ₹2M+ format)
                if (text.includes('₹') && text.includes('M')) {
                    targetNumber = parseInt(text.replace(/[₹M+]/g, ''));
                    stat.setAttribute('data-suffix', 'M+');
                    stat.setAttribute('data-prefix', '₹');
                } else {
                    targetNumber = parseInt(text.replace(/[+]/g, ''));
                    stat.setAttribute('data-suffix', '+');
                }
                
                stat.textContent = '0';
                
                // Start animation with delay
                setTimeout(() => {
                    animateCounterWithFormat(stat, targetNumber);
                }, 200);
            });
            
            // Unobserve after animation starts
            statsObserver.unobserve(entry.target);
        }
    });
}, {
    threshold: 0.5
});

function animateCounterWithFormat(element, target) {
    const prefix = element.getAttribute('data-prefix') || '';
    const suffix = element.getAttribute('data-suffix') || '+';
    let start = 0;
    const duration = 2000;
    const increment = target / (duration / 16);
    
    function updateCounter() {
        start += increment;
        if (start < target) {
            element.textContent = prefix + Math.floor(start) + suffix;
            requestAnimationFrame(updateCounter);
        } else {
            element.textContent = prefix + target + suffix;
        }
    }
    updateCounter();
}

// Initialize everything when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initSlider();
    
    // Initialize stats observer
    const statsSection = document.querySelector('.about-stats');
    if (statsSection) {
        statsObserver.observe(statsSection);
    }
    
    // Add loading animation completion
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.3s ease';
    
    setTimeout(() => {
        document.body.style.opacity = '1';
    }, 100);
});

// Handle window resize for responsive adjustments
window.addEventListener('resize', function() {
    // Adjust slider height on mobile if needed
    const bannerContainer = document.querySelector('.banner-container');
    if (bannerContainer && window.innerWidth <= 480) {
        bannerContainer.style.height = '200px';
    } else if (bannerContainer && window.innerWidth <= 768) {
        bannerContainer.style.height = '250px';
    } else if (bannerContainer) {
        bannerContainer.style.height = '400px';
    }
});