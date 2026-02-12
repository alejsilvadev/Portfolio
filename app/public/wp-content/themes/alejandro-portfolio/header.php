<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Alejandro Silva - Web Developer. Building modern, responsive websites and web applications.">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <nav class="nav-container">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
            Alejandro<span>.</span>
        </a>
        <nav class="main-nav">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                <li><a href="<?php echo esc_url(home_url('/portfolio')); ?>">Portfolio</a></li>
                <li><a href="<?php echo esc_url(home_url('/portfolio#projects')); ?>">Projects</a></li>
                <li><a href="<?php echo esc_url(home_url('/portfolio#contact')); ?>">Contact</a></li>
            </ul>
        </nav>
    </nav>
</header>

<main>
