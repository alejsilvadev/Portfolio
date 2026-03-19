<?php
/**
 * Template Name: Services Page
 * Services page template for Alejandro Silva - Web Developer
 */
get_header();
?>

<!-- Services Hero -->
<?php
$services_hero_bg = get_option('services_hero_bg_url', '');
$services_hero_bg_id = get_option('services_hero_bg_id', '');
if ($services_hero_bg_id) {
    $services_hero_bg = wp_get_attachment_url($services_hero_bg_id);
}
?>
<section class="services-hero"<?php if ($services_hero_bg) echo ' style="--services-hero-bg: url(\'' . esc_url($services_hero_bg) . '\')"'; ?>>
    <?php if ($services_hero_bg) : ?>
    <div class="services-hero-bg" style="background-image: url('<?php echo esc_url($services_hero_bg); ?>');"></div>
    <?php endif; ?>
    <div class="container">
        <div class="services-hero-content">
            <span class="section-label">What I Do</span>
            <h1 class="services-hero-title">Web Development <span class="gradient-text">Services</span></h1>
            <p class="services-hero-subtitle">Custom-built websites — everything you need to grow your online presence and stand out in 2026.</p>
            <div class="services-hero-buttons">
                <a href="#services-grid" class="btn btn-primary">View Services</a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary">Get a Quote</a>
            </div>
        </div>
    </div>
</section>

<!-- Services Grid Section -->
<section id="services-grid" class="services-grid-section">
    <div class="container">
        <div class="section-header">
            <span class="section-label">What I Offer</span>
            <h2 class="section-title">Everything You Need Online</h2>
            <p class="section-subtitle">A full suite of web development services tailored to help your business stand out and scale.</p>
        </div>
        <div class="services-card-grid">

            <div class="service-card">
                <div class="service-card-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                </div>
                <h3>Custom Website Design</h3>
                <p>Every site is designed from scratch to match your brand — no cookie-cutter templates. You get a unique, professional design that stands out from competitors.</p>
            </div>

            <div class="service-card">
                <div class="service-card-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                        <path d="M2 17l10 5 10-5"></path>
                        <path d="M2 12l10 5 10-5"></path>
                    </svg>
                </div>
                <h3>WordPress CMS</h3>
                <p>Built on WordPress so you can update content, add pages, and manage your site yourself — no coding knowledge required. You stay in control.</p>
            </div>

            <div class="service-card">
                <div class="service-card-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
                <h3>SEO Optimization</h3>
                <p>Built to rank. Every site is optimized for Google and AI-powered search tools like ChatGPT. Fast load speeds, clean code, and proper structure from day one.</p>
            </div>

            <div class="service-card">
                <div class="service-card-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                        <line x1="12" y1="18" x2="12.01" y2="18"></line>
                    </svg>
                </div>
                <h3>Mobile Responsive</h3>
                <p>Over 60% of web traffic comes from mobile devices. Your site will look sharp and work flawlessly on every screen size — phones, tablets, and desktops.</p>
            </div>

            <div class="service-card">
                <div class="service-card-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                    </svg>
                </div>
                <h3>Performance & Speed</h3>
                <p>Slow websites lose visitors and rank lower on Google. I optimize every site for speed — fast hosting setup, image compression, caching, and lean code.</p>
            </div>

            <div class="service-card">
                <div class="service-card-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="3" y1="9" x2="21" y2="9"></line>
                        <line x1="9" y1="21" x2="9" y2="9"></line>
                    </svg>
                </div>
                <h3>ACF Integration</h3>
                <p>Using Advanced Custom Fields, I build custom admin panels so you can update text, images, and content across your site through simple, clearly labeled fields — no page builder or code needed.</p>
            </div>

            <div class="service-card">
                <div class="service-card-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </div>
                <h3>Contact & Lead Forms</h3>
                <p>Custom-built contact forms, quote request forms, and booking integrations that funnel leads directly to your inbox — or into your CRM automatically.</p>
            </div>

            <div class="service-card">
                <div class="service-card-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                </div>
                <h3>Ongoing Support</h3>
                <p>I don't disappear after launch. Get reliable post-launch support, hosting management, security updates, and maintenance to keep your site running at its best.</p>
            </div>

        </div>
    </div>
</section>

<!-- Pricing Section -->
<section id="services-pricing" class="services-pricing">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Pricing</span>
            <h2 class="section-title">Simple, Transparent Pricing</h2>
            <p class="section-subtitle">Every project is different, but here's a clear starting point. All packages include WordPress CMS, mobile-responsive design, and basic SEO setup.</p>
        </div>

        <!-- Packages -->
        <div class="sp-packages">

            <div class="sp-card">
                <div class="sp-card-header">
                    <h3>Starter</h3>
                    <p class="sp-card-desc">Great for small businesses, local services, and personal brands that need a clean, professional online presence fast.</p>
                    <div class="sp-price">
                        <sup>$</sup><span>750</span>
                    </div>
                </div>
                <ul class="sp-features">
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Up to 3 pages
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Custom design (no templates)
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        WordPress CMS — edit your own content
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Mobile responsive on all devices
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Contact form
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Basic SEO setup
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        2 weeks delivery
                    </li>
                </ul>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary sp-btn">Get Started</a>
            </div>

            <div class="sp-card sp-card--featured">
                <div class="sp-badge">Most Popular</div>
                <div class="sp-card-header">
                    <h3>Professional</h3>
                    <p class="sp-card-desc">Built for growing businesses that need more pages, more features, and a site that works harder to bring in leads.</p>
                    <div class="sp-price">
                        <sup>$</sup><span>1,750</span>
                    </div>
                </div>
                <ul class="sp-features">
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Up to 8 pages
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Custom design (no templates)
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        WordPress CMS with ACF content manager
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Mobile responsive on all devices
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Blog setup
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Advanced SEO optimization
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Google Analytics setup
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        3 weeks delivery
                    </li>
                </ul>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary sp-btn">Get Started</a>
            </div>

            <div class="sp-card">
                <div class="sp-card-header">
                    <h3>Enterprise</h3>
                    <p class="sp-card-desc">For businesses with complex requirements — custom functionality, integrations, and everything built exactly to spec.</p>
                    <div class="sp-price sp-price--custom">
                        <span>Let's Talk</span>
                    </div>
                </div>
                <ul class="sp-features">
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Unlimited pages
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Custom functionality & plugin development
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Third-party API integrations
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        E-commerce & booking systems
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Priority support & ongoing maintenance
                    </li>
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Timeline discussed per project
                    </li>
                </ul>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary sp-btn">Contact Me</a>
            </div>

        </div>

        <!-- Add-ons -->
        <div class="sp-addons">
            <div class="sp-addons-header">
                <h3>Add-Ons</h3>
                <p>Need something extra? These can be added to any package. <a href="<?php echo esc_url(home_url('/contact')); ?>">Contact me</a> for pricing on any add-on.</p>
            </div>
            <div class="sp-addons-grid">

                <div class="sp-addon">
                    <div class="sp-addon-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </div>
                    <div>
                        <strong>E-Commerce (WooCommerce)</strong>
                        <p>Full online store with products, cart, checkout, and payment gateway integration.</p>
                    </div>
                </div>

                <div class="sp-addon">
                    <div class="sp-addon-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                    <div>
                        <strong>Calendly / Booking Integration</strong>
                        <p>Embed a booking widget so clients can schedule appointments directly from your site.</p>
                    </div>
                </div>

                <div class="sp-addon">
                    <div class="sp-addon-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"></path>
                            <path d="M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"></path>
                            <path d="M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                            <path d="M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 0 1-7 0z"></path>
                            <path d="M5 12.5A3.5 3.5 0 0 1 8.5 9H12v7H8.5A3.5 3.5 0 0 1 5 12.5z"></path>
                        </svg>
                    </div>
                    <div>
                        <strong>Figma Design Buildout</strong>
                        <p>Already have a designer? I'll take your Figma file and build it out exactly as designed — matching every spacing, font, color, and interaction down to the pixel.</p>
                    </div>
                </div>

                <div class="sp-addon">
                    <div class="sp-addon-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                        </svg>
                    </div>
                    <div>
                        <strong>Google Analytics & Tracking</strong>
                        <p>Full GA4 setup with event tracking so you can see exactly how visitors use your site.</p>
                    </div>
                </div>

                <div class="sp-addon">
                    <div class="sp-addon-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <strong>Live Chat Integration</strong>
                        <p>Connect a live chat tool (Tidio, Crisp, or similar) so visitors can reach you instantly.</p>
                    </div>
                </div>

                <div class="sp-addon">
                    <div class="sp-addon-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>
                    <div>
                        <strong>SEO Setup</strong>
                        <p>Full on-page SEO setup — meta tags, schema markup, sitemap, and keyword-optimized content structure to help you rank on Google.</p>
                    </div>
                </div>

                <div class="sp-addon">
                    <div class="sp-addon-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 8v4l3 3"></path>
                        </svg>
                    </div>
                    <div>
                        <strong>Accessibility (ADA/WCAG)</strong>
                        <p>Full accessibility audit and remediation — WCAG 2.1 compliance, keyboard navigation, screen reader support, and proper contrast ratios.</p>
                    </div>
                </div>

                <div class="sp-addon">
                    <div class="sp-addon-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </div>
                    <div>
                        <strong>Ongoing Maintenance Plan</strong>
                        <p>Monthly retainer covering security updates, plugin maintenance, backups, minor content changes, and 1 blog post per month.</p>
                    </div>
                </div>

            </div>
            <p class="sp-addons-note">Not sure what you need? <a href="<?php echo esc_url(home_url('/contact')); ?>">Send me a message</a> and I'll put together a custom quote.</p>
        </div>

    </div>
</section>

<!-- CTA Section -->
<?php
$cta_bg_id  = get_option('services_cta_bg_id', '');
$cta_bg_url = $cta_bg_id ? wp_get_attachment_url($cta_bg_id) : get_option('services_cta_bg_url', '');
?>
<section class="services-cta">
    <?php if ($cta_bg_url) : ?>
    <div class="services-cta-bg" style="background-image: url('<?php echo esc_url($cta_bg_url); ?>');"></div>
    <?php endif; ?>
    <div class="services-cta-overlay"></div>
    <div class="container">
        <div class="services-cta-inner">
            <h2>Ready to Build Something Great?</h2>
            <p>Let's talk about your project. I'll help you figure out exactly what you need and give you a clear plan to get there.</p>
            <div class="services-cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">Start Your Project</a>
                <a href="<?php echo esc_url(home_url('/#pricing')); ?>" class="btn btn-secondary">View Pricing</a>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="services-faq">
    <div class="container">
        <div class="section-header">
            <span class="section-label">FAQ</span>
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-subtitle">Everything you need to know before getting started.</p>
        </div>
        <div class="faq-list">

            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>How long does it take to build a website?</span>
                    <svg class="faq-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div class="faq-answer">
                    <p>It depends on the package and complexity. The Starter package typically takes around 2 weeks, the Professional package around 3 weeks. Larger enterprise projects are scoped on a case-by-case basis. I'll always give you a clear timeline before we start.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>Will I be able to update the website myself?</span>
                    <svg class="faq-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div class="faq-answer">
                    <p>Yes — all sites are built on WordPress, and I set up custom admin panels using ACF so you can update text, images, and content through simple, clearly labeled fields. No coding or technical knowledge required.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>Do you offer hosting?</span>
                    <svg class="faq-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div class="faq-answer">
                    <p>I don't sell hosting directly, but I'll help you get set up with a reliable hosting provider and handle the full deployment for you. I can also manage your hosting as part of an ongoing maintenance plan.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>What do you need from me to get started?</span>
                    <svg class="faq-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div class="faq-answer">
                    <p>To kick things off I'll need a general idea of what you want, your logo and brand assets if you have them, and any content (text, photos) you'd like on the site. If you don't have content ready, I can help guide you on what's needed.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>Do you work with businesses outside your local area?</span>
                    <svg class="faq-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div class="faq-answer">
                    <p>Absolutely. I work with clients remotely and communicate via email, messaging, or video call — whatever works best for you. Location is no barrier.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>What happens after the site launches?</span>
                    <svg class="faq-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div class="faq-answer">
                    <p>I don't disappear after launch. I offer post-launch support and optional ongoing maintenance plans that cover security updates, plugin maintenance, backups, and minor content changes. You'll always have someone to reach out to.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>Can you redesign my existing website?</span>
                    <svg class="faq-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div class="faq-answer">
                    <p>Yes. Whether you need a full redesign or just want to modernize your current site, I can work with your existing content and branding to create something that looks and performs far better.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>How do payments work?</span>
                    <svg class="faq-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div class="faq-answer">
                    <p>I typically ask for a 50% deposit upfront to begin work, with the remaining 50% due before the site goes live. For larger projects, a milestone-based payment schedule can be arranged.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
document.querySelectorAll('.faq-question').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var item = this.closest('.faq-item');
        var answer = item.querySelector('.faq-answer');
        var isOpen = item.classList.contains('open');

        // Close all
        document.querySelectorAll('.faq-item.open').forEach(function(openItem) {
            openItem.classList.remove('open');
            openItem.querySelector('.faq-answer').style.maxHeight = null;
            openItem.querySelector('.faq-question').setAttribute('aria-expanded', 'false');
        });

        // Open clicked if it was closed
        if (!isOpen) {
            item.classList.add('open');
            answer.style.maxHeight = answer.scrollHeight + 'px';
            this.setAttribute('aria-expanded', 'true');
        }
    });
});
</script>

<?php get_footer(); ?>
