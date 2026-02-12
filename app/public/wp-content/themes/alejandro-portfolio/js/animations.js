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

    // Section Fade-In Animations
    initSectionAnimations();
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
        { selector: '.logo-carousel', elements: ['.logo-carousel-container'] },
        { selector: '.what-i-do', elements: ['.what-i-do-text', '.what-i-do-animation'] },
        { selector: '.projects', elements: ['.projects .section-header', '.project-card'] },
        { selector: '.contact', elements: ['.contact .section-header', '.contact-info', '.contact-form'] },
        // Homepage sections
        { selector: '.home-services', elements: ['.home-services .section-header', '.service-card'] },
        { selector: '.home-showcase', elements: ['.home-showcase .section-header', '.showcase-gallery', '.showcase-info'] },
        { selector: '.home-automation', elements: ['.home-automation .section-header', '.automation-visual', '.automation-text'] },
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
    gsap.set('.home-hero-description', { opacity: 0, y: 30 });
    gsap.set('.home-hero-buttons .btn', { opacity: 0, y: 20 });
    gsap.set('.stat-item', { opacity: 0, y: 30 });

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
        .to('.stat-item', {
            opacity: 1,
            y: 0,
            duration: 0.6,
            stagger: 0.1
        }, '-=0.3');
}
