/**
 * GSAP Animations for Alejandro Portfolio
 */

document.addEventListener('DOMContentLoaded', function() {
    // Register ScrollTrigger plugin
    gsap.registerPlugin(ScrollTrigger);

    // Handle anchor links from URL
    handleAnchorLinks();

    // Hero Section Animations (Portfolio page)
    initHeroAnimations();

    // Homepage Hero Animations
    initHomeHeroAnimations();

    // Hero parallax background
    initHeroParallax();

    // Typewriter effect
    initTypewriter();


    // Section Fade-In Animations
    initSectionAnimations();

    // Logo Carousel scroll-driven movement
    initLogoCarousel();

    // Service Accordion
    initServiceAccordion();
});

function handleAnchorLinks() {
    // Scroll to anchor if present in URL
    if (window.location.hash) {
        const target = document.querySelector(window.location.hash);
        if (target) {
            setTimeout(() => {
                const headerHeight = document.querySelector('.site-header').offsetHeight;
                const targetPosition = target.offsetTop - headerHeight;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }, 100);
        }
    }

    // Handle anchor link clicks
    document.querySelectorAll('a[href*="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');

            // Check if it's a same-page anchor
            if (href.startsWith('#')) {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    const headerHeight = document.querySelector('.site-header').offsetHeight;
                    const targetPosition = target.offsetTop - headerHeight;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            }
            // For cross-page anchors (like /portfolio#contact), let the browser handle navigation
        });
    });
}

function initSectionAnimations() {
    // Sections to animate (Portfolio page)
    const sections = [
        { selector: '.about', elements: ['.about .section-header', '.about-image', '.about-text'] },
        { selector: '.what-i-do', elements: ['.what-i-do-text', '.what-i-do-animation'] },
        { selector: '.projects', elements: ['.projects .section-header', '.project-card'] },
        { selector: '.contact', elements: ['.contact .section-header', '.contact-info', '.contact-form'] },
        // Homepage sections
        { selector: '.home-services', elements: ['.home-services .section-header', '.services-phone-mockup', '.service-item'] },
        { selector: '.home-showcase', elements: ['.home-showcase .section-header', '.showcase-gallery', '.showcase-info'] },
        { selector: '.home-pricing', elements: ['.home-pricing .section-header', '.pricing-card'] },
        { selector: '.home-contact', elements: ['.home-contact .section-header', '.home-contact-info', '.home-contact-form'] }
    ];

    sections.forEach(section => {
        const sectionEl = document.querySelector(section.selector);
        if (!sectionEl) return;

        section.elements.forEach((elementSelector, index) => {
            const elements = document.querySelectorAll(elementSelector);

            elements.forEach((el, elIndex) => {
                gsap.set(el, {
                    opacity: 0,
                    y: 50
                });

                gsap.to(el, {
                    opacity: 1,
                    y: 0,
                    duration: 0.8,
                    ease: 'power3.out',
                    delay: elIndex * 0.1,
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 85%',
                        toggleActions: 'play none none none'
                    }
                });
            });
        });
    });
}

function initHeroAnimations() {
    // Create a timeline for sequenced animations
    const heroTimeline = gsap.timeline({
        defaults: {
            ease: 'power3.out',
            duration: 1
        }
    });

    // Set initial states (hidden)
    gsap.set('.hero-greeting', { opacity: 0, y: 30 });
    gsap.set('.hero-title', { opacity: 0, y: 50 });
    gsap.set('.hero-subtitle', { opacity: 0, y: 30 });
    gsap.set('.hero-description', { opacity: 0, y: 30 });
    gsap.set('.hero-buttons .btn', { opacity: 0, y: 20 });
    gsap.set('.hero-image-wrapper', { opacity: 0, scale: 0.8, rotation: -10 });

    // Animate hero text elements in sequence
    heroTimeline
        // Greeting badge slides in
        .to('.hero-greeting', {
            opacity: 1,
            y: 0,
            duration: 0.6
        })
        // Title comes in with a punch
        .to('.hero-title', {
            opacity: 1,
            y: 0,
            duration: 0.8,
            ease: 'power4.out'
        }, '-=0.3')
        // Subtitle follows
        .to('.hero-subtitle', {
            opacity: 1,
            y: 0,
            duration: 0.6
        }, '-=0.5')
        // Description fades in
        .to('.hero-description', {
            opacity: 1,
            y: 0,
            duration: 0.6
        }, '-=0.4')
        // Buttons stagger in
        .to('.hero-buttons .btn', {
            opacity: 1,
            y: 0,
            duration: 0.5,
            stagger: 0.15
        }, '-=0.3')
        // Hero visual spins in
        .to('.hero-image-wrapper', {
            opacity: 1,
            scale: 1,
            rotation: 0,
            duration: 1.2,
            ease: 'elastic.out(1, 0.5)'
        }, '-=1');

    // Floating animation for the hero shape (continuous)
    gsap.to('.hero-shape', {
        y: -15,
        duration: 2,
        ease: 'power1.inOut',
        yoyo: true,
        repeat: -1
    });

    // Subtle rotation on the inner shape
    gsap.to('.hero-shape-inner', {
        rotation: 5,
        duration: 3,
        ease: 'power1.inOut',
        yoyo: true,
        repeat: -1
    });

    // Mouse move parallax effect on hero
    const heroSection = document.querySelector('.hero');
    const heroVisual = document.querySelector('.hero-image-wrapper');

    if (heroSection && heroVisual) {
        heroSection.addEventListener('mousemove', (e) => {
            const rect = heroSection.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;

            gsap.to(heroVisual, {
                x: x * 30,
                y: y * 30,
                duration: 0.5,
                ease: 'power2.out'
            });
        });

        heroSection.addEventListener('mouseleave', () => {
            gsap.to(heroVisual, {
                x: 0,
                y: 0,
                duration: 0.5,
                ease: 'power2.out'
            });
        });
    }

    // Text scramble effect on hover for the title
    const heroTitle = document.querySelector('.hero-title');
    if (heroTitle) {
        const originalText = heroTitle.textContent;

        heroTitle.addEventListener('mouseenter', () => {
            gsap.to(heroTitle, {
                scale: 1.02,
                duration: 0.3,
                ease: 'power2.out'
            });
        });

        heroTitle.addEventListener('mouseleave', () => {
            gsap.to(heroTitle, {
                scale: 1,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
    }

    // Button hover animations
    const buttons = document.querySelectorAll('.hero-buttons .btn');
    buttons.forEach(btn => {
        btn.addEventListener('mouseenter', () => {
            gsap.to(btn, {
                scale: 1.05,
                duration: 0.3,
                ease: 'power2.out'
            });
        });

        btn.addEventListener('mouseleave', () => {
            gsap.to(btn, {
                scale: 1,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
    });
}

function initHomeHeroAnimations() {
    const homeHero = document.querySelector('.home-hero');
    if (!homeHero) return;

    // Create a timeline for sequenced animations
    const homeHeroTimeline = gsap.timeline({
        defaults: {
            ease: 'power3.out',
            duration: 1
        }
    });

    // Set initial states (hidden)
    gsap.set('.home-hero-badge', { opacity: 0, y: 30 });
    gsap.set('.home-hero-title', { opacity: 0, y: 50 });
    gsap.set('.typewriter-wrapper', { opacity: 0, y: 20 });
    gsap.set('.home-hero-description', { opacity: 0, y: 30 });
    gsap.set('.home-hero-buttons .btn', { opacity: 0, y: 20 });
    gsap.set('.stat-item', { opacity: 0, y: 30 });
    gsap.set('.laptop-mockup', { opacity: 0, y: 40, scale: 0.95 });
    gsap.set('.hero-caption', { opacity: 0, y: 20 });

    // Animate hero elements in sequence
    homeHeroTimeline
        .to('.home-hero-badge', {
            opacity: 1,
            y: 0,
            duration: 0.6
        })
        .to('.home-hero-title', {
            opacity: 1,
            y: 0,
            duration: 0.8,
            ease: 'power4.out'
        }, '-=0.3')
        .to('.typewriter-wrapper', {
            opacity: 1,
            y: 0,
            duration: 0.6
        }, '-=0.4')
        .to('.home-hero-description', {
            opacity: 1,
            y: 0,
            duration: 0.6
        }, '-=0.4')
        .to('.home-hero-buttons .btn', {
            opacity: 1,
            y: 0,
            duration: 0.5,
            stagger: 0.15
        }, '-=0.3')
        .to('.laptop-mockup', {
            opacity: 1,
            y: 0,
            scale: 1,
            duration: 1,
            ease: 'power3.out'
        }, '-=0.8')
        .to('.hero-caption', {
            opacity: 1,
            y: 0,
            duration: 0.5
        }, '-=0.4')
        .to('.stat-item', {
            opacity: 1,
            y: 0,
            duration: 0.6,
            stagger: 0.1
        }, '-=0.3');

    // Screenshot slideshow
    initLaptopSlideshow();
}

function initTypewriter() {
    var el = document.querySelector('.typewriter-text');
    if (!el) return;

    var phrases = ['Website Development', 'Website Design'];
    var phraseIndex = 0;
    var charIndex = 0;
    var isDeleting = false;
    var typeSpeed = 100;
    var deleteSpeed = 50;
    var pauseAfterType = 2000;
    var pauseAfterDelete = 500;

    function tick() {
        var current = phrases[phraseIndex];

        if (!isDeleting) {
            charIndex++;
            el.textContent = current.substring(0, charIndex);

            if (charIndex === current.length) {
                isDeleting = true;
                setTimeout(tick, pauseAfterType);
                return;
            }
            setTimeout(tick, typeSpeed);
        } else {
            charIndex--;
            el.textContent = current.substring(0, charIndex);

            if (charIndex === 0) {
                isDeleting = false;
                phraseIndex = (phraseIndex + 1) % phrases.length;
                setTimeout(tick, pauseAfterDelete);
                return;
            }
            setTimeout(tick, deleteSpeed);
        }
    }

    tick();
}

function initHeroParallax() {
    // Handled via CSS background-attachment: fixed
}

function initLogoCarousel() {
    var rows = document.querySelectorAll('.logo-carousel-row');
    if (!rows.length) return;

    var scrollDistance = 100;
    var initialized = false;

    function setup() {
        if (initialized) return;
        initialized = true;

        rows.forEach(function(row) {
            var direction = parseInt(row.getAttribute('data-direction')) || 1;
            // Use the first item's width * item count / 3 for reliable measurement
            var items = row.querySelectorAll('.logo-carousel-item');
            var totalItems = items.length;
            var oneThird = Math.floor(totalItems / 3);
            var itemWidth = 0;

            // Measure actual rendered width of one set
            for (var i = 0; i < oneThird; i++) {
                itemWidth += items[i].offsetWidth + 60; // 60 = gap
            }

            var startX = -itemWidth;

            gsap.set(row, { x: startX });

            gsap.fromTo(row,
                { x: startX - (direction * scrollDistance) },
                {
                    x: startX + (direction * scrollDistance),
                    ease: 'none',
                    scrollTrigger: {
                        trigger: '.logo-carousel',
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: 0.5
                    }
                }
            );
        });

        ScrollTrigger.refresh();
    }

    // Try setup after a short delay, and also on window load as backup
    setTimeout(setup, 500);
    window.addEventListener('load', setup);
}

function initServiceAccordion() {
    const items = document.querySelectorAll('.service-item');
    if (!items.length) return;

    const isTouchDevice = window.matchMedia('(hover: none)').matches;

    if (isTouchDevice) {
        // Mobile: tap to toggle
        items.forEach(function(item) {
            item.querySelector('.service-item-header').addEventListener('click', function() {
                const wasActive = item.classList.contains('active');
                items.forEach(function(i) { i.classList.remove('active'); });
                if (!wasActive) item.classList.add('active');
            });
        });
    } else {
        // Desktop: hover to open
        items.forEach(function(item) {
            item.addEventListener('mouseenter', function() {
                items.forEach(function(i) { i.classList.remove('active'); });
                item.classList.add('active');
            });
        });

        // Close when mouse leaves the whole accordion
        var accordion = document.querySelector('.services-accordion');
        if (accordion) {
            accordion.addEventListener('mouseleave', function() {
                items.forEach(function(i) { i.classList.remove('active'); });
            });
        }
    }
}

function initLaptopSlideshow() {
    const slides = document.querySelectorAll('.laptop-slide');
    if (slides.length <= 1) return;

    let current = 0;
    const interval = 3500;

    setInterval(function() {
        const prev = current;
        current = (current + 1) % slides.length;

        // Current slide exits to the left
        slides[prev].classList.remove('active');
        slides[prev].classList.add('exit');

        // New slide enters from the right
        slides[current].classList.add('active');

        // Clean up exit class after transition ends
        setTimeout(function() {
            slides[prev].classList.remove('exit');
        }, 600);
    }, interval);
}
