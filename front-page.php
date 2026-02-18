<?php
/**
 * Front Page Template - Freelance Web Developer Homepage
 */
get_header();
?>

<!-- Hero Section -->
<section class="home-hero">
    <div class="home-hero-bg" style="background-image: url('<?php echo esc_url(home_url('/wp-content/uploads/2026/02/360_F_373784438_lEuzytWcTtLRdZ9CFks7I81yG3lOiSWK.jpg')); ?>');"></div>
    <div class="container">
        <div class="home-hero-content">
            <div class="home-hero-text">
                <span class="home-hero-badge">Web Developer & Automation Expert</span>
                <h1 class="home-hero-title">Custom Websites That <span class="gradient-text">Stand Out</span></h1>

                <div class="typewriter-wrapper">
                    <span class="typewriter-text"></span><span class="typewriter-cursor">|</span>
                </div>

                <p class="home-hero-description">I will provide everything you need to build and optimize your online presence. From custom web development to automation solutions that streamline your workflows, my goal is to help your business run smarter and stand out online. </p>

                <div class="home-hero-buttons">
                    <a href="#pricing" class="btn btn-primary">View Packages</a>
                    <a href="#services" class="btn btn-secondary">Learn More</a>
                </div>
            </div>
            <div class="home-hero-image">
                <div class="laptop-mockup">
                    <div class="laptop-lid">
                        <div class="laptop-camera"></div>
                        <div class="laptop-screen-inner">
                            <?php
                            $hero_screenshots = get_option('hero_screenshots', array());
                            if (!empty($hero_screenshots)) :
                                foreach ($hero_screenshots as $index => $screenshot) :
                            ?>
                                <div class="laptop-slide <?php echo $index === 0 ? 'active' : ''; ?>">
                                    <img src="<?php echo esc_url($screenshot['url']); ?>" alt="<?php echo esc_attr($screenshot['caption'] ?: 'Website screenshot'); ?>">
                                </div>
                            <?php
                                endforeach;
                            else :
                            ?>
                                <div class="laptop-slide active">
                                    <div class="laptop-placeholder">
                                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                            <polyline points="21 15 16 10 5 21"></polyline>
                                        </svg>
                                        <span>Add screenshots in Hero Screenshots admin</span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="laptop-bottom-edge"></div>
                </div>
                <?php
                $hero_caption = get_option('hero_caption', '');
                if ($hero_caption) :
                ?>
                    <p class="hero-caption"><?php echo esc_html($hero_caption); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Hero Divider -->
<div class="hero-divider"></div>

<!-- Services Section -->
<section id="services" class="home-services">
    <div class="container">
        <div class="section-header">
            <span class="section-label">What I Offer</span>
            <h2 class="section-title">Services That Drive Results</h2>
            <p class="section-subtitle">Everything you need to establish a powerful online presence and streamline your business operations.</p>
        </div>
        <div class="services-layout">
            <div class="services-phone-mockup">
                <div class="iphone-mockup">
                    <div class="iphone-screen">
                        <div class="iphone-status-bar">
                            <div class="iphone-status-left"><span class="iphone-time">9:41</span></div>
                            <div class="iphone-dynamic-island"></div>
                            <div class="iphone-status-right">
                                <svg class="iphone-signal" width="11" height="8" viewBox="0 0 14 10" fill="#000">
                                    <rect x="0" y="6" width="2.5" height="4" rx="0.5"/>
                                    <rect x="3.5" y="4" width="2.5" height="6" rx="0.5"/>
                                    <rect x="7" y="2" width="2.5" height="8" rx="0.5"/>
                                    <rect x="10.5" y="0" width="2.5" height="10" rx="0.5"/>
                                </svg>
                                <svg class="iphone-wifi" width="10" height="8" viewBox="0 0 24 18" fill="none" stroke="#000" stroke-width="2.5" stroke-linecap="round">
                                    <path d="M2 5C6.5 1 17.5 1 22 5"/>
                                    <path d="M6 9.5C9 6.5 15 6.5 18 9.5"/>
                                    <circle cx="12" cy="14" r="1.5" fill="#000" stroke="none"/>
                                </svg>
                                <svg class="iphone-battery" width="16" height="8" viewBox="0 0 28 13" fill="none">
                                    <rect x="0.5" y="0.5" width="23" height="12" rx="2.5" stroke="#000" stroke-width="1.2"/>
                                    <rect x="2" y="2" width="18" height="9" rx="1.5" fill="#000"/>
                                    <path d="M25 4.5V8.5" stroke="#000" stroke-width="1.2" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>
                        <?php
                        $services_video_id = get_option('services_phone_video', '');
                        $services_video_url = $services_video_id ? wp_get_attachment_url($services_video_id) : '';
                        if ($services_video_url) :
                        ?>
                            <video autoplay muted loop playsinline class="iphone-video">
                                <source src="<?php echo esc_url($services_video_url); ?>" type="video/mp4">
                            </video>
                        <?php else : ?>
                            <div class="iphone-placeholder">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                </svg>
                                <span>Add a video in Services Phone admin</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <div class="services-accordion">
            <div class="service-item">
                <div class="service-item-header">
                    <div class="service-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                            <line x1="8" y1="21" x2="16" y2="21"></line>
                            <line x1="12" y1="17" x2="12" y2="21"></line>
                        </svg>
                    </div>
                    <h3>Custom Website Design</h3>
                </div>
                <div class="service-item-body">
                    <p>Unique, modern designs tailored to your brand. Every site is built from scratch to stand out from the competition.</p>
                </div>
            </div>
            <div class="service-item">
                <div class="service-item-header">
                    <div class="service-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                            <path d="M2 17l10 5 10-5"></path>
                            <path d="M2 12l10 5 10-5"></path>
                        </svg>
                    </div>
                    <h3>WordPress CMS</h3>
                </div>
                <div class="service-item-body">
                    <p>Using Wordpress as your CMS will make it easy to upload and change or update content. Manage your site with ease, no coding required.</p>
                </div>
            </div>
            <div class="service-item">
                <div class="service-item-header">
                    <div class="service-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                        </svg>
                    </div>
                    <h3>Performance & SEO</h3>
                </div>
                <div class="service-item-body">
                    <p>Fast-loading, optimized websites that rank higher on Google and popular AI like ChatGPT. Every site is built with performance and search visibility in mind.</p>
                </div>
            </div>
            <div class="service-item">
                <div class="service-item-header">
                    <div class="service-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                            <line x1="12" y1="18" x2="12.01" y2="18"></line>
                        </svg>
                    </div>
                    <h3>Mobile Responsive</h3>
                </div>
                <div class="service-item-body">
                    <p>Mobile devices account for approximately 60-65% of all business website traffic. Your site design will look clean on all mobile devices.</p>
                </div>
            </div>
            <div class="service-item">
                <div class="service-item-header">
                    <div class="service-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                        </svg>
                    </div>
                    <h3>n8n Automations</h3>
                </div>
                <div class="service-item-body">
                    <p>Automate annoying repetitive tasks and connect your tools. From email workflows to data sync, save hours every week with smart automations using n8n.io.</p>
                </div>
            </div>
                        <div class="service-item">
                <div class="service-item-header">
                    <div class="service-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <h3>Ongoing Support</h3>
                </div>
                <div class="service-item-body">
                    <p>I don't disappear after launch. Get reliable support, updates, and option for ongoing hosting and maintenance to keep your site running smoothly.</p>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>

<!-- Portfolio Showcase Section -->
<section class="home-showcase">
    <div class="home-showcase-bg" style="background-image: url('<?php echo esc_url(home_url('/wp-content/uploads/2026/02/360_F_373784438_lEuzytWcTtLRdZ9CFks7I81yG3lOiSWK.jpg')); ?>');"></div>
    <div class="home-showcase-overlay"></div>
    <div class="container">
        <div class="section-header">
            <span class="section-label">See What I Can Do</span>
            <h2 class="section-title">Websites That Convert</h2>
            <p class="section-subtitle">I design and develop that will turn visitors into leads.</p>
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
                <p>Your website is often the first impression potential customers have of your business. I will work with you to create a website for your brand that will impress visitors.</p>
                <ul class="showcase-benefits">
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span><strong>Clean designs</strong> — Modern, professional designs that capture attention</span>
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
                        <span><strong>Mobile-responsive</strong> — Perfect experience on every device</span>
                    </li>
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span><strong>SEO optimized</strong> — Built to rank higher and get found on Google or AI search</span>
                    </li>
                </ul>
                <a href="#contact" class="btn btn-primary">Start Your Project</a>
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
                        <span class="price-currency"><sup>$</sup></span>
                        <span class="price-amount">500</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Up to 3 pages
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
                        <span class="price-currency"><sup>$</sup></span>
                        <span class="price-amount">1,000</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Up to 8 pages
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
                        Plugin integration
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


<!-- Automation Section -->
<section id="automation" class="home-automation">
    <div class="container">
        <div class="section-header">
            <span class="section-label">n8n Automation Services</span>
            <h2 class="section-title">Automate Your Business Workflows</h2>
            <p class="section-subtitle">Stop wasting hours on busy work. I build custom automations that connect your tools and run your workflows on autopilot.</p>
        </div>
        <div class="automation-content">
                <lottie-player
                    src="<?php echo get_template_directory_uri(); ?>/assets/automation.json"
                    background="transparent"
                    speed="1"
                    style="width: 400px; height: 400px;"
                    loop
                    autoplay>
                </lottie-player>
            <div class="automation-text">
                <h3>What Can Be Automated?</h3>
                <ul class="automation-list">
                    <li>
                        <strong>Lead Management</strong> — Automatically capture leads from forms, send follow-up emails, and add them to your CRM
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
                </ul>
            </div>
        </div>
        <div class="automation-cta">
                <p class="automation-cta-text">Every business is different. Let's discuss your workflows and create a custom automation solution.</p>
                <a href="#contact" class="btn btn-primary">Contact for Pricing</a>
            </div>
    </div>
</section>

<!-- Contact Form Section -->
<section id="contact" class="home-contact">
    <div class="home-contact-bg" style="background-image: url('<?php echo esc_url(home_url('/wp-content/uploads/2026/02/360_F_373784438_lEuzytWcTtLRdZ9CFks7I81yG3lOiSWK.jpg')); ?>');"></div>
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
                        <span>Fast turnaround</span>
                    </li>
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Clear communication</span>
                    </li>
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>No BS!</span>
                    </li>
                </ul>
                <div class="contact-direct">
                    <p>Prefer to reach out directly?</p>
                    <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'alejsilvadev@gmail.com')); ?>" class="contact-email">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <?php echo esc_html(get_theme_mod('contact_email', 'alejsilvadev@gmail.com')); ?>
                    </a>
                </div>
            </div>
            <div class="home-contact-form">
                <?php echo do_shortcode('[contact-form-7 id="551c974" title="Homepage Contact Form"]'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
