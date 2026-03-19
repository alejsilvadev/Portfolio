<?php
/**
 * Template Part: About Section
 */

$about_text = get_theme_mod('about_text', "I'm a passionate web developer with a love for creating beautiful, functional websites. With expertise in modern technologies, I help businesses establish their online presence and achieve their digital goals.");
$skills = get_theme_mod('skills', 'HTML5, CSS3, JavaScript, React, Node.js, PHP, WordPress, MySQL, Git');
?>

<section id="about" class="about">
    <div class="container">
        <div class="section-header">
            <span class="section-label">About Me</span>
            <h2 class="section-title">Get to Know Me</h2>
            <p class="section-subtitle">Learn more about my background, skills, and what drives me as a developer.</p>
        </div>
        <div class="about-content">
            <div class="about-image">
                <lottie-player
                    src="<?php echo get_template_directory_uri(); ?>/assets/music.json"
                    background="transparent"
                    speed="1"
                    style="width: 250px; height: auto;"
                    loop
                    autoplay>
                </lottie-player>
            </div>
            <div class="about-text">
                <h3>I like to make cool stuff</h3>
                <p><?php echo esc_html($about_text); ?></p>
                <div class="skills-list">
                    <?php
                    $skills_array = array_map('trim', explode(',', $skills));
                    foreach ($skills_array as $skill) :
                    ?>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</section>
