<?php
/**
 * Template Part: Hero Section
 */

$hero_greeting = get_theme_mod('hero_greeting', "Hello, I'm");
$hero_description = get_theme_mod('hero_description', 'I build modern, responsive websites and web applications that help businesses grow and succeed online.');
?>

<section id="home" class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <span class="hero-greeting"><?php echo esc_html($hero_greeting); ?></span>
                <h1 class="hero-title">Alejandro Silva</h1>
                <p class="hero-subtitle">Web Developer</p>
                <p class="hero-description"><?php echo esc_html($hero_description); ?></p>
                <div class="hero-buttons">
                    <a href="#projects" class="btn btn-primary">
                        View My Work
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="#contact" class="btn btn-secondary">Get In Touch</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="hero-image-wrapper">
                    <div class="hero-shape">
                        <div class="hero-shape-inner">
                            AS
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
