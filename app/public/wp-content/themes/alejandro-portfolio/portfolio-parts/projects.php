<?php
/**
 * Template Part: Projects Section
 */
?>

<section id="projects" class="projects">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Projects</span>
            <h2 class="section-title">Stuff I've Been Working On</h2>
            <p class="section-subtitle">Take a look at some of my recent projects that showcase my skills and expertise.</p>
        </div>
        <div class="projects-grid">
            <?php
            $projects = new WP_Query(array(
                'post_type'      => 'project',
                'posts_per_page' => 6,
                'meta_key'       => '_project_order',
                'orderby'        => array(
                    'meta_value_num' => 'ASC',
                    'date'           => 'DESC'
                ),
            ));

            if ($projects->have_posts()) :
                while ($projects->have_posts()) : $projects->the_post();
                    $live_url = get_post_meta(get_the_ID(), '_project_live_url', true);
                    $github_url = get_post_meta(get_the_ID(), '_project_github_url', true);
                    $technologies = get_post_meta(get_the_ID(), '_project_technologies', true);
            ?>
                <a href="<?php the_permalink(); ?>" class="project-card-link">
                    <article class="project-card">
                        <div class="project-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php else : ?>
                                <span><?php echo esc_html(mb_substr(get_the_title(), 0, 2)); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="project-content">
                            <h3 class="project-title"><?php the_title(); ?></h3>
                            <p class="project-description"><?php echo esc_html(get_the_excerpt()); ?></p>
                            <?php if ($technologies) : ?>
                                <div class="project-tech">
                                    <?php
                                    $tech_array = array_map('trim', explode(',', $technologies));
                                    foreach ($tech_array as $tech) :
                                    ?>
                                        <span class="tech-tag"><?php echo esc_html($tech); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <span class="project-view-more">View Project →</span>
                        </div>
                    </article>
                </a>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Show placeholder projects if none exist
                $placeholder_projects = array(
                    array(
                        'title' => 'E-Commerce Platform',
                        'description' => 'A full-featured online store with product management, cart functionality, and secure checkout.',
                        'tech' => array('React', 'Node.js', 'MongoDB'),
                    ),
                    array(
                        'title' => 'Task Management App',
                        'description' => 'A productivity application for organizing tasks, setting deadlines, and tracking progress.',
                        'tech' => array('Vue.js', 'Firebase', 'Tailwind'),
                    ),
                    array(
                        'title' => 'Portfolio Website',
                        'description' => 'A responsive portfolio site showcasing work and skills with modern design principles.',
                        'tech' => array('WordPress', 'PHP', 'CSS3'),
                    ),
                    array(
                        'title' => 'Weather Dashboard',
                        'description' => 'A real-time weather application with location-based forecasts and interactive maps.',
                        'tech' => array('JavaScript', 'API', 'CSS3'),
                    ),
                );

                foreach ($placeholder_projects as $project) :
            ?>
                <article class="project-card">
                    <div class="project-image">
                        <span><?php echo esc_html(mb_substr($project['title'], 0, 2)); ?></span>
                    </div>
                    <div class="project-content">
                        <h3 class="project-title"><?php echo esc_html($project['title']); ?></h3>
                        <p class="project-description"><?php echo esc_html($project['description']); ?></p>
                        <div class="project-tech">
                            <?php foreach ($project['tech'] as $tech) : ?>
                                <span class="tech-tag"><?php echo esc_html($tech); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <div class="project-links">
                            <a href="#" class="project-link">
                                Live Demo
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14L21 3"/>
                                </svg>
                            </a>
                            <a href="#" class="project-link">
                                GitHub
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
