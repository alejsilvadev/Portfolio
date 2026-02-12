<?php
/**
 * Front Page Template - Freelance Web Developer Homepage
 */
get_header();
?>

<!-- Hero Section -->
<section class="home-hero">
    <div class="container">
        <div class="home-hero-content">
            <span class="home-hero-badge">Web Developer & Automation Expert</span>
            <h1 class="home-hero-title">Custom Websites That <span class="gradient-text">Grow Your Business</span></h1>
            <p class="home-hero-description">I build stunning, high-performance websites powered by WordPress — giving you full control over your content without touching a single line of code. Plus, I'll automate your workflows so you can focus on what matters most.</p>
            <div class="home-hero-buttons">
                <a href="#pricing" class="btn btn-primary">View Packages</a>
                <a href="#services" class="btn btn-secondary">Learn More</a>
            </div>
            <div class="home-hero-stats">
                <div class="stat-item">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">Projects Delivered</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Client Satisfaction</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support Available</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="home-services">
    <div class="container">
        <div class="section-header">
            <span class="section-label">What I Offer</span>
            <h2 class="section-title">Services That Drive Results</h2>
            <p class="section-subtitle">Everything you need to establish a powerful online presence and streamline your business operations.</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                </div>
                <h3>Custom Website Design</h3>
                <p>Unique, modern designs tailored to your brand. No templates — every site is built from scratch to stand out from the competition.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                        <path d="M2 17l10 5 10-5"></path>
                        <path d="M2 12l10 5 10-5"></path>
                    </svg>
                </div>
                <h3>WordPress CMS</h3>
                <p>Your website runs on WordPress — the world's most popular CMS. Update content, add pages, and manage your site with ease. No coding required.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                    </svg>
                </div>
                <h3>n8n Automations</h3>
                <p>Automate repetitive tasks and connect your tools. From email workflows to data sync — save hours every week with smart automations.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                    </svg>
                </div>
                <h3>Performance & SEO</h3>
                <p>Fast-loading, optimized websites that rank higher on Google. Every site is built with performance and search visibility in mind.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                        <line x1="12" y1="18" x2="12.01" y2="18"></line>
                    </svg>
                </div>
                <h3>Mobile Responsive</h3>
                <p>Your website looks perfect on every device — desktop, tablet, and mobile. Reach customers wherever they are.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                </div>
                <h3>Ongoing Support</h3>
                <p>I don't disappear after launch. Get reliable support, updates, and maintenance to keep your site running smoothly.</p>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Showcase Section -->
<section class="home-showcase">
    <div class="container">
        <div class="section-header">
            <span class="section-label">See What I Can Do</span>
            <h2 class="section-title">Websites That Convert Visitors Into Customers</h2>
            <p class="section-subtitle">I design and develop custom websites that not only look stunning but are strategically built to grow your business and attract more customers.</p>
        </div>
        <div class="showcase-content">
            <div class="showcase-gallery">
                <?php
                $showcase_images = get_option('showcase_images', array());
                if (!empty($showcase_images)) :
                    foreach ($showcase_images as $index => $image) :
                ?>
                    <div class="showcase-item">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['title'] ?? 'Portfolio work'); ?>">
                        <?php if (!empty($image['title'])) : ?>
                            <div class="showcase-overlay">
                                <span class="showcase-title"><?php echo esc_html($image['title']); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php
                    endforeach;
                else :
                ?>
                    <div class="showcase-item placeholder">
                        <div class="placeholder-content">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                            <span>Add images in WordPress Admin</span>
                        </div>
                    </div>
                    <div class="showcase-item placeholder">
                        <div class="placeholder-content">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                            <span>Add images in WordPress Admin</span>
                        </div>
                    </div>
                    <div class="showcase-item placeholder">
                        <div class="placeholder-content">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                            <span>Add images in WordPress Admin</span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="showcase-info">
                <h3>Custom Designs That Stand Out</h3>
                <p>Your website is often the first impression potential customers have of your business. I create custom designs tailored to your brand — no cookie-cutter templates.</p>
                <ul class="showcase-benefits">
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span><strong>Visually stunning</strong> — Modern, professional designs that capture attention</span>
                    </li>
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span><strong>Built to convert</strong> — Strategic layouts designed to turn visitors into customers</span>
                    </li>
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span><strong>Mobile-first</strong> — Perfect experience on every device</span>
                    </li>
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span><strong>SEO optimized</strong> — Built to rank higher and get found online</span>
                    </li>
                </ul>
                <a href="#contact" class="btn btn-primary">Start Your Project</a>
            </div>
        </div>
    </div>
</section>

<!-- Automation Section -->
<section id="automation" class="home-automation">
    <div class="container">
        <div class="section-header">
            <span class="section-label">n8n Automation Services</span>
            <h2 class="section-title">Automate Your Business Workflows</h2>
            <p class="section-subtitle">Stop wasting hours on repetitive tasks. I build custom automations that connect your tools and run your workflows on autopilot.</p>
        </div>
        <div class="automation-content">
            <div class="automation-visual">
                <div class="automation-diagram">
                    <div class="auto-node node-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </div>
                    <div class="auto-line line-1"></div>
                    <div class="auto-node node-center">
                        <span>n8n</span>
                    </div>
                    <div class="auto-line line-2"></div>
                    <div class="auto-node node-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <div class="auto-line line-3"></div>
                    <div class="auto-node node-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="21" x2="9" y2="9"></line>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="automation-text">
                <h3>What Can Be Automated?</h3>
                <ul class="automation-list">
                    <li>
                        <strong>Lead Management</strong> — Automatically capture leads from forms, send follow-up emails, and add them to your CRM
                    </li>
                    <li>
                        <strong>Data Synchronization</strong> — Keep your spreadsheets, databases, and apps in sync without manual entry
                    </li>
                    <li>
                        <strong>Social Media</strong> — Auto-post to multiple platforms when you publish new content
                    </li>
                    <li>
                        <strong>Notifications & Alerts</strong> — Get instant alerts for orders, form submissions, or custom triggers
                    </li>
                    <li>
                        <strong>Report Generation</strong> — Automatically compile and send daily, weekly, or monthly reports
                    </li>
                    <li>
                        <strong>400+ Integrations</strong> — Connect virtually any tool you use: Google, Slack, Notion, Airtable, and more
                    </li>
                </ul>
                <div class="automation-cta">
                    <p class="automation-cta-text">Every business is different. Let's discuss your workflows and create a custom automation solution.</p>
                    <a href="#contact" class="btn btn-primary">Contact for Pricing</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section id="pricing" class="home-pricing">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Website Development Pricing</span>
            <h2 class="section-title">Simple, Transparent Pricing</h2>
            <p class="section-subtitle">Choose the package that fits your needs. All packages include WordPress CMS and mobile-responsive design.</p>
        </div>
        <div class="pricing-grid">
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Starter</h3>
                    <p class="pricing-description">Perfect for small businesses and personal brands</p>
                    <div class="pricing-price">
                        <span class="price-currency">$</span>
                        <span class="price-amount">500</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Up to 5 pages
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Mobile responsive design
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        WordPress CMS
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Contact form
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Basic SEO setup
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        2 weeks delivery
                    </li>
                </ul>
                <a href="#contact" class="btn btn-secondary pricing-btn">Get Started</a>
            </div>
            <div class="pricing-card featured">
                <div class="pricing-badge">Most Popular</div>
                <div class="pricing-header">
                    <h3>Professional</h3>
                    <p class="pricing-description">For growing businesses that need more features</p>
                    <div class="pricing-price">
                        <span class="price-currency">$</span>
                        <span class="price-amount">1,000</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Up to 10 pages
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Custom design
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        WordPress CMS
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Blog setup
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Advanced SEO
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Google Analytics setup
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        3 weeks delivery
                    </li>
                </ul>
                <a href="#contact" class="btn btn-primary pricing-btn">Get Started</a>
            </div>
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Enterprise</h3>
                    <p class="pricing-description">Custom solutions for complex requirements</p>
                    <div class="pricing-price">
                        <span class="price-amount custom">Let's Talk</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Unlimited pages
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        E-commerce / Booking systems
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Custom functionality
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        API integrations
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Priority support
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Ongoing maintenance
                    </li>
                </ul>
                <a href="#contact" class="btn btn-secondary pricing-btn">Contact Me</a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section id="contact" class="home-contact">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Get In Touch</span>
            <h2 class="section-title">Let's Work Together</h2>
            <p class="section-subtitle">Ready to start your project? Fill out the form below and I'll get back to you within 24 hours.</p>
        </div>
        <div class="home-contact-content">
            <div class="home-contact-info">
                <h3>Why Work With Me?</h3>
                <ul class="contact-benefits">
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Fast turnaround times</span>
                    </li>
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Clear communication throughout</span>
                    </li>
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Unlimited revisions until you're happy</span>
                    </li>
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Ongoing support after launch</span>
                    </li>
                </ul>
                <div class="contact-direct">
                    <p>Prefer to reach out directly?</p>
                    <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'hello@alejandrosilva.com')); ?>" class="contact-email">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <?php echo esc_html(get_theme_mod('contact_email', 'hello@alejandrosilva.com')); ?>
                    </a>
                </div>
            </div>
            <div class="home-contact-form">
                <form action="#" method="POST" class="contact-form-home">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-name">Your Name *</label>
                            <input type="text" id="contact-name" name="name" required placeholder="John Doe">
                        </div>
                        <div class="form-group">
                            <label for="contact-email">Email Address *</label>
                            <input type="email" id="contact-email" name="email" required placeholder="john@example.com">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-business">Business Name</label>
                            <input type="text" id="contact-business" name="business" placeholder="Your Company LLC">
                        </div>
                        <div class="form-group">
                            <label for="contact-service">Service Interested In *</label>
                            <select id="contact-service" name="service" required>
                                <option value="" disabled selected>Select a service...</option>
                                <optgroup label="Website Development">
                                    <option value="website-starter">Starter Package ($500)</option>
                                    <option value="website-professional">Professional Package ($1,000)</option>
                                    <option value="website-enterprise">Enterprise Package (Custom)</option>
                                </optgroup>
                                <optgroup label="Automation">
                                    <option value="n8n-automation">n8n Automation Services</option>
                                </optgroup>
                                <option value="other">Other / Not Sure</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact-budget">Budget Range</label>
                        <select id="contact-budget" name="budget">
                            <option value="" disabled selected>Select your budget...</option>
                            <option value="under-500">Under $500</option>
                            <option value="500-1000">$500 - $1,000</option>
                            <option value="1000-2500">$1,000 - $2,500</option>
                            <option value="2500-5000">$2,500 - $5,000</option>
                            <option value="5000-plus">$5,000+</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="contact-message">Tell Me About Your Project *</label>
                        <textarea id="contact-message" name="message" rows="5" required placeholder="Describe your project, goals, and any questions you have..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-large btn-full">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
