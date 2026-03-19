<?php
/**
 * Alejandro Portfolio Theme Functions
 */

// Theme Setup
function alejandro_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'alejandro-portfolio'),
    ));
}
add_action('after_setup_theme', 'alejandro_theme_setup');

// Enqueue styles and scripts
function alejandro_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Sankofa+Display&display=swap',
        array(),
        null
    );

    // Theme stylesheet (base/global)
    wp_enqueue_style(
        'alejandro-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );

    // Forms stylesheet
    wp_enqueue_style(
        'alejandro-forms',
        get_template_directory_uri() . '/css/forms.css',
        array('alejandro-style'),
        wp_get_theme()->get('Version')
    );

    // Portfolio stylesheet
    wp_enqueue_style(
        'alejandro-portfolio',
        get_template_directory_uri() . '/css/portfolio.css',
        array('alejandro-style'),
        wp_get_theme()->get('Version')
    );

    // Front page stylesheet
    if (is_front_page()) {
        wp_enqueue_style(
            'alejandro-front-page',
            get_template_directory_uri() . '/css/front-page.css',
            array('alejandro-style'),
            wp_get_theme()->get('Version')
        );
    }

    // Services page stylesheet
    if (is_page_template('page-services.php') || is_front_page()) {
        wp_enqueue_style(
            'alejandro-services',
            get_template_directory_uri() . '/css/services.css',
            array('alejandro-style'),
            wp_get_theme()->get('Version')
        );
    }

    // GSAP Library
    wp_enqueue_script(
        'gsap',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
        array(),
        '3.12.5',
        true
    );

    // GSAP ScrollTrigger Plugin
    wp_enqueue_script(
        'gsap-scrolltrigger',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
        array('gsap'),
        '3.12.5',
        true
    );

    // Lottie Player
    wp_enqueue_script(
        'lottie-player',
        'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js',
        array(),
        null,
        true
    );

    // Theme animations
    wp_enqueue_script(
        'alejandro-animations',
        get_template_directory_uri() . '/js/animations.js',
        array('gsap'),
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'alejandro_enqueue_assets');

// Custom post type for Projects
function alejandro_register_projects() {
    $labels = array(
        'name'               => 'Projects',
        'singular_name'      => 'Project',
        'menu_name'          => 'Projects',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Project',
        'edit_item'          => 'Edit Project',
        'new_item'           => 'New Project',
        'view_item'          => 'View Project',
        'search_items'       => 'Search Projects',
        'not_found'          => 'No projects found',
        'not_found_in_trash' => 'No projects found in Trash',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'projects'),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('project', $args);
}
add_action('init', 'alejandro_register_projects');

// Add custom meta boxes for projects
function alejandro_project_meta_boxes() {
    add_meta_box(
        'project_details',
        'Project Details',
        'alejandro_project_meta_callback',
        'project',
        'normal',
        'high'
    );

    add_meta_box(
        'project_highlight',
        'Highlight Section (Text Left / Image Right)',
        'alejandro_project_highlight_callback',
        'project',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'alejandro_project_meta_boxes');

function alejandro_project_meta_callback($post) {
    wp_nonce_field('alejandro_project_meta', 'alejandro_project_nonce');

    $live_links  = get_post_meta($post->ID, '_project_live_links', true);
    $live_url    = get_post_meta($post->ID, '_project_live_url', true); // legacy
    $github_url  = get_post_meta($post->ID, '_project_github_url', true);
    $technologies = get_post_meta($post->ID, '_project_technologies', true);
    $order_number = get_post_meta($post->ID, '_project_order', true);

    // Migrate legacy single URL into the new format
    if (empty($live_links) && $live_url) {
        $live_links = array(array('label' => '', 'url' => $live_url));
    }
    if (!is_array($live_links)) {
        $live_links = array();
    }
    ?>
    <p>
        <label for="project_order"><strong>Display Order:</strong></label><br>
        <input type="number" id="project_order" name="project_order" value="<?php echo esc_attr($order_number); ?>" style="width: 100px;" min="1" placeholder="1">
        <span style="color: #666; margin-left: 10px;">Lower numbers appear first on the homepage</span>
    </p>

    <p><strong>Live Links:</strong> <span style="color:#666;font-size:12px;">Each link becomes a button on the project page. Leave label blank for a generic "View Live Site" label.</span></p>
    <div id="live-links-list">
        <?php foreach ($live_links as $i => $link) : ?>
            <div class="live-link-row" style="display:flex;gap:8px;margin-bottom:8px;align-items:center;">
                <input type="text" name="project_live_links[<?php echo $i; ?>][label]" placeholder="Label (e.g. Live Demo)" value="<?php echo esc_attr($link['label'] ?? ''); ?>" style="width:200px;">
                <input type="url"  name="project_live_links[<?php echo $i; ?>][url]"   placeholder="https://..." value="<?php echo esc_attr($link['url'] ?? ''); ?>" style="flex:1;">
                <button type="button" class="button remove-live-link">Remove</button>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" id="add-live-link" class="button button-secondary">+ Add Live Link</button>

    <p style="margin-top:16px;">
        <label for="project_github_url"><strong>GitHub URL:</strong></label><br>
        <input type="url" id="project_github_url" name="project_github_url" value="<?php echo esc_attr($github_url); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="project_technologies"><strong>Technologies (comma-separated):</strong></label><br>
        <input type="text" id="project_technologies" name="project_technologies" value="<?php echo esc_attr($technologies); ?>" style="width: 100%;" placeholder="React, Node.js, MongoDB">
    </p>

    <script>
    jQuery(document).ready(function($) {
        var liveLinkIndex = $('#live-links-list .live-link-row').length;

        $('#add-live-link').on('click', function() {
            var html = '<div class="live-link-row" style="display:flex;gap:8px;margin-bottom:8px;align-items:center;">' +
                '<input type="text" name="project_live_links[' + liveLinkIndex + '][label]" placeholder="Label (e.g. Live Demo)" style="width:200px;">' +
                '<input type="url"  name="project_live_links[' + liveLinkIndex + '][url]"   placeholder="https://..." style="flex:1;">' +
                '<button type="button" class="button remove-live-link">Remove</button>' +
                '</div>';
            $('#live-links-list').append(html);
            liveLinkIndex++;
        });

        $(document).on('click', '.remove-live-link', function() {
            $(this).closest('.live-link-row').remove();
        });
    });
    </script>
    <?php
}

function alejandro_save_project_meta($post_id) {
    if (!isset($_POST['alejandro_project_nonce']) || !wp_verify_nonce($_POST['alejandro_project_nonce'], 'alejandro_project_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save multiple live links
    $live_links = array();
    if (isset($_POST['project_live_links']) && is_array($_POST['project_live_links'])) {
        foreach ($_POST['project_live_links'] as $link) {
            $url = esc_url_raw($link['url'] ?? '');
            if ($url) {
                $live_links[] = array(
                    'label' => sanitize_text_field($link['label'] ?? ''),
                    'url'   => $url,
                );
            }
        }
    }
    update_post_meta($post_id, '_project_live_links', $live_links);

    if (isset($_POST['project_github_url'])) {
        update_post_meta($post_id, '_project_github_url', esc_url_raw($_POST['project_github_url']));
    }

    if (isset($_POST['project_technologies'])) {
        update_post_meta($post_id, '_project_technologies', sanitize_text_field($_POST['project_technologies']));
    }

    if (isset($_POST['project_order'])) {
        update_post_meta($post_id, '_project_order', absint($_POST['project_order']));
    }

    // Save highlight section fields
    if (isset($_POST['project_highlight_title'])) {
        update_post_meta($post_id, '_project_highlight_title', sanitize_text_field($_POST['project_highlight_title']));
    }

    if (isset($_POST['project_highlight_text'])) {
        update_post_meta($post_id, '_project_highlight_text', wp_kses_post($_POST['project_highlight_text']));
    }

    if (isset($_POST['project_highlight_image'])) {
        update_post_meta($post_id, '_project_highlight_image', absint($_POST['project_highlight_image']));
    }

    if (isset($_POST['project_highlight_lottie'])) {
        update_post_meta($post_id, '_project_highlight_lottie', absint($_POST['project_highlight_lottie']));
    }

    if (isset($_POST['project_highlight_media_type'])) {
        update_post_meta($post_id, '_project_highlight_media_type', sanitize_text_field($_POST['project_highlight_media_type']));
    }
}
add_action('save_post_project', 'alejandro_save_project_meta');

// Highlight section meta box callback
function alejandro_project_highlight_callback($post) {
    $highlight_title = get_post_meta($post->ID, '_project_highlight_title', true);
    $highlight_text = get_post_meta($post->ID, '_project_highlight_text', true);
    $highlight_image = get_post_meta($post->ID, '_project_highlight_image', true);
    $highlight_lottie = get_post_meta($post->ID, '_project_highlight_lottie', true);
    $highlight_media_type = get_post_meta($post->ID, '_project_highlight_media_type', true) ?: 'image';
    $image_url = $highlight_image ? wp_get_attachment_image_url($highlight_image, 'medium') : '';
    $lottie_url = $highlight_lottie ? wp_get_attachment_url($highlight_lottie) : '';
    ?>
    <p>
        <label for="project_highlight_title"><strong>Section Title:</strong></label><br>
        <input type="text" id="project_highlight_title" name="project_highlight_title" value="<?php echo esc_attr($highlight_title); ?>" style="width: 100%;" placeholder="e.g., The Challenge">
    </p>
    <p>
        <label for="project_highlight_text"><strong>Section Text:</strong></label><br>
        <textarea id="project_highlight_text" name="project_highlight_text" rows="5" style="width: 100%;" placeholder="Describe this aspect of the project..."><?php echo esc_textarea($highlight_text); ?></textarea>
    </p>

    <p>
        <label><strong>Media Type:</strong></label><br>
        <label style="margin-right: 20px;">
            <input type="radio" name="project_highlight_media_type" value="image" <?php checked($highlight_media_type, 'image'); ?>> Image
        </label>
        <label>
            <input type="radio" name="project_highlight_media_type" value="lottie" <?php checked($highlight_media_type, 'lottie'); ?>> Lottie Animation
        </label>
    </p>

    <div id="image-upload-section" style="<?php echo $highlight_media_type === 'lottie' ? 'display:none;' : ''; ?>">
        <p>
            <label><strong>Section Image:</strong></label><br>
            <input type="hidden" id="project_highlight_image" name="project_highlight_image" value="<?php echo esc_attr($highlight_image); ?>">
            <div id="highlight-image-preview" style="margin: 10px 0;">
                <?php if ($image_url) : ?>
                    <img src="<?php echo esc_url($image_url); ?>" style="max-width: 300px; height: auto; border-radius: 8px;">
                <?php endif; ?>
            </div>
            <button type="button" class="button" id="upload-highlight-image">Select Image</button>
            <button type="button" class="button" id="remove-highlight-image" <?php echo !$highlight_image ? 'style="display:none;"' : ''; ?>>Remove Image</button>
        </p>
    </div>

    <div id="lottie-upload-section" style="<?php echo $highlight_media_type === 'image' ? 'display:none;' : ''; ?>">
        <p>
            <label><strong>Lottie JSON File:</strong></label><br>
            <input type="hidden" id="project_highlight_lottie" name="project_highlight_lottie" value="<?php echo esc_attr($highlight_lottie); ?>">
            <div id="highlight-lottie-preview" style="margin: 10px 0;">
                <?php if ($lottie_url) : ?>
                    <span style="color: green;">Lottie file uploaded: <?php echo basename($lottie_url); ?></span>
                <?php endif; ?>
            </div>
            <button type="button" class="button" id="upload-highlight-lottie">Select Lottie JSON</button>
            <button type="button" class="button" id="remove-highlight-lottie" <?php echo !$highlight_lottie ? 'style="display:none;"' : ''; ?>>Remove Lottie</button>
        </p>
    </div>

    <script>
    jQuery(document).ready(function($) {
        // Toggle media type sections
        $('input[name="project_highlight_media_type"]').on('change', function() {
            if ($(this).val() === 'image') {
                $('#image-upload-section').show();
                $('#lottie-upload-section').hide();
            } else {
                $('#image-upload-section').hide();
                $('#lottie-upload-section').show();
            }
        });

        // Image uploader
        var imageUploader;
        $('#upload-highlight-image').on('click', function(e) {
            e.preventDefault();
            if (imageUploader) {
                imageUploader.open();
                return;
            }
            imageUploader = wp.media({
                title: 'Select Image',
                button: { text: 'Use This Image' },
                multiple: false,
                library: { type: 'image' }
            });
            imageUploader.on('select', function() {
                var attachment = imageUploader.state().get('selection').first().toJSON();
                $('#project_highlight_image').val(attachment.id);
                $('#highlight-image-preview').html('<img src="' + attachment.sizes.medium.url + '" style="max-width: 300px; height: auto; border-radius: 8px;">');
                $('#remove-highlight-image').show();
            });
            imageUploader.open();
        });

        $('#remove-highlight-image').on('click', function(e) {
            e.preventDefault();
            $('#project_highlight_image').val('');
            $('#highlight-image-preview').html('');
            $(this).hide();
        });

        // Lottie uploader
        var lottieUploader;
        $('#upload-highlight-lottie').on('click', function(e) {
            e.preventDefault();
            if (lottieUploader) {
                lottieUploader.open();
                return;
            }
            lottieUploader = wp.media({
                title: 'Select Lottie JSON File',
                button: { text: 'Use This File' },
                multiple: false
            });
            lottieUploader.on('select', function() {
                var attachment = lottieUploader.state().get('selection').first().toJSON();
                $('#project_highlight_lottie').val(attachment.id);
                $('#highlight-lottie-preview').html('<span style="color: green;">Lottie file uploaded: ' + attachment.filename + '</span>');
                $('#remove-highlight-lottie').show();
            });
            lottieUploader.open();
        });

        $('#remove-highlight-lottie').on('click', function(e) {
            e.preventDefault();
            $('#project_highlight_lottie').val('');
            $('#highlight-lottie-preview').html('');
            $(this).hide();
        });
    });
    </script>
    <?php
}

// Enqueue media uploader for admin
function alejandro_enqueue_admin_scripts($hook) {
    if ($hook === 'post.php' || $hook === 'post-new.php' || $hook === 'toplevel_page_logo-carousel' || $hook === 'toplevel_page_portfolio-showcase' || $hook === 'toplevel_page_services-settings') {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'alejandro_enqueue_admin_scripts');

// Logo Carousel Admin Page
function alejandro_add_logo_carousel_menu() {
    add_menu_page(
        'Logo Carousel',
        'Logo Carousel',
        'manage_options',
        'logo-carousel',
        'alejandro_logo_carousel_page',
        'dashicons-images-alt2',
        30
    );
}
add_action('admin_menu', 'alejandro_add_logo_carousel_menu');

function alejandro_logo_carousel_page() {
    if (isset($_POST['save_logos']) && check_admin_referer('save_logo_carousel')) {
        $logos = isset($_POST['carousel_logos']) ? array_map('absint', $_POST['carousel_logos']) : array();
        update_option('alejandro_carousel_logos', $logos);
        echo '<div class="notice notice-success"><p>Logos saved successfully!</p></div>';
    }

    $saved_logos = get_option('alejandro_carousel_logos', array());
    ?>
    <div class="wrap">
        <h1>Logo Carousel</h1>
        <p>Add logos to display in the carousel on the homepage. Recommended: Upload logos with transparent backgrounds (PNG).</p>

        <form method="post">
            <?php wp_nonce_field('save_logo_carousel'); ?>

            <div id="logo-carousel-list" style="display: flex; flex-wrap: wrap; gap: 20px; margin: 20px 0;">
                <?php foreach ($saved_logos as $logo_id) :
                    $img_url = wp_get_attachment_image_url($logo_id, 'medium');
                    if ($img_url) :
                ?>
                    <div class="logo-item" style="position: relative; background: #f0f0f0; padding: 10px; border-radius: 8px;">
                        <img src="<?php echo esc_url($img_url); ?>" style="height: 80px; width: auto;">
                        <input type="hidden" name="carousel_logos[]" value="<?php echo esc_attr($logo_id); ?>">
                        <button type="button" class="remove-logo" style="position: absolute; top: -10px; right: -10px; background: #dc3545; color: white; border: none; border-radius: 50%; width: 24px; height: 24px; cursor: pointer;">&times;</button>
                    </div>
                <?php endif; endforeach; ?>
            </div>

            <button type="button" id="add-logo" class="button button-secondary">Add Logo</button>
            <p></p>
            <input type="submit" name="save_logos" class="button button-primary" value="Save Logos">
        </form>
    </div>

    <script>
    jQuery(document).ready(function($) {
        var mediaUploader;

        $('#add-logo').on('click', function(e) {
            e.preventDefault();

            if (mediaUploader) {
                mediaUploader.open();
                return;
            }

            mediaUploader = wp.media({
                title: 'Select Logo',
                button: { text: 'Add Logo' },
                multiple: true,
                library: { type: 'image' }
            });

            mediaUploader.on('select', function() {
                var attachments = mediaUploader.state().get('selection').toJSON();
                attachments.forEach(function(attachment) {
                    var imgUrl = attachment.sizes.medium ? attachment.sizes.medium.url : attachment.url;
                    var html = '<div class="logo-item" style="position: relative; background: #f0f0f0; padding: 10px; border-radius: 8px;">';
                    html += '<img src="' + imgUrl + '" style="height: 80px; width: auto;">';
                    html += '<input type="hidden" name="carousel_logos[]" value="' + attachment.id + '">';
                    html += '<button type="button" class="remove-logo" style="position: absolute; top: -10px; right: -10px; background: #dc3545; color: white; border: none; border-radius: 50%; width: 24px; height: 24px; cursor: pointer;">&times;</button>';
                    html += '</div>';
                    $('#logo-carousel-list').append(html);
                });
            });

            mediaUploader.open();
        });

        $(document).on('click', '.remove-logo', function() {
            $(this).parent('.logo-item').remove();
        });
    });
    </script>
    <?php
}

// Portfolio Showcase Admin Page
function alejandro_add_showcase_menu() {
    add_menu_page(
        'Portfolio Showcase',
        'Portfolio Showcase',
        'manage_options',
        'portfolio-showcase',
        'alejandro_showcase_page',
        'dashicons-format-gallery',
        31
    );
}
add_action('admin_menu', 'alejandro_add_showcase_menu');

function alejandro_showcase_page() {
    if (isset($_POST['save_showcase']) && check_admin_referer('save_portfolio_showcase')) {
        $images = array();
        if (isset($_POST['showcase_images']) && is_array($_POST['showcase_images'])) {
            foreach ($_POST['showcase_images'] as $image) {
                $images[] = array(
                    'id' => absint($image['id']),
                    'url' => esc_url_raw($image['url']),
                    'title' => sanitize_text_field($image['title'] ?? '')
                );
            }
        }
        update_option('showcase_images', $images);
        echo '<div class="notice notice-success"><p>Showcase images saved successfully!</p></div>';
    }

    $saved_images = get_option('showcase_images', array());
    ?>
    <div class="wrap">
        <h1>Portfolio Showcase</h1>
        <p>Add screenshots of websites you've built. These will display in the "See What I Can Do" section on the homepage.</p>

        <form method="post">
            <?php wp_nonce_field('save_portfolio_showcase'); ?>

            <div id="showcase-list" style="display: flex; flex-wrap: wrap; gap: 20px; margin: 20px 0;">
                <?php foreach ($saved_images as $index => $image) : ?>
                    <div class="showcase-item" style="position: relative; background: #f0f0f0; padding: 15px; border-radius: 8px; width: 280px;">
                        <img src="<?php echo esc_url($image['url']); ?>" style="width: 100%; height: 160px; object-fit: cover; border-radius: 4px;">
                        <input type="hidden" name="showcase_images[<?php echo $index; ?>][id]" value="<?php echo esc_attr($image['id']); ?>">
                        <input type="hidden" name="showcase_images[<?php echo $index; ?>][url]" value="<?php echo esc_url($image['url']); ?>">
                        <div style="margin-top: 10px;">
                            <input type="text" name="showcase_images[<?php echo $index; ?>][title]" value="<?php echo esc_attr($image['title'] ?? ''); ?>" placeholder="Project title (optional)" style="width: 100%;">
                        </div>
                        <button type="button" class="remove-showcase" style="position: absolute; top: -10px; right: -10px; background: #dc3545; color: white; border: none; border-radius: 50%; width: 24px; height: 24px; cursor: pointer;">&times;</button>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="button" id="add-showcase" class="button button-secondary">Add Image</button>
            <p></p>
            <input type="submit" name="save_showcase" class="button button-primary" value="Save Showcase">
        </form>
    </div>

    <script>
    jQuery(document).ready(function($) {
        var mediaUploader;
        var imageIndex = <?php echo count($saved_images); ?>;

        $('#add-showcase').on('click', function(e) {
            e.preventDefault();

            if (mediaUploader) {
                mediaUploader.open();
                return;
            }

            mediaUploader = wp.media({
                title: 'Select Website Screenshot',
                button: { text: 'Add to Showcase' },
                multiple: true,
                library: { type: 'image' }
            });

            mediaUploader.on('select', function() {
                var attachments = mediaUploader.state().get('selection').toJSON();
                attachments.forEach(function(attachment) {
                    var imgUrl = attachment.sizes.large ? attachment.sizes.large.url : attachment.url;
                    var html = '<div class="showcase-item" style="position: relative; background: #f0f0f0; padding: 15px; border-radius: 8px; width: 280px;">';
                    html += '<img src="' + imgUrl + '" style="width: 100%; height: 160px; object-fit: cover; border-radius: 4px;">';
                    html += '<input type="hidden" name="showcase_images[' + imageIndex + '][id]" value="' + attachment.id + '">';
                    html += '<input type="hidden" name="showcase_images[' + imageIndex + '][url]" value="' + imgUrl + '">';
                    html += '<div style="margin-top: 10px;">';
                    html += '<input type="text" name="showcase_images[' + imageIndex + '][title]" value="" placeholder="Project title (optional)" style="width: 100%;">';
                    html += '</div>';
                    html += '<button type="button" class="remove-showcase" style="position: absolute; top: -10px; right: -10px; background: #dc3545; color: white; border: none; border-radius: 50%; width: 24px; height: 24px; cursor: pointer;">&times;</button>';
                    html += '</div>';
                    $('#showcase-list').append(html);
                    imageIndex++;
                });
            });

            mediaUploader.open();
        });

        $(document).on('click', '.remove-showcase', function() {
            $(this).parent('.showcase-item').remove();
        });
    });
    </script>
    <?php
}

// Hero Screenshots Admin Page
function alejandro_add_hero_screenshots_menu() {
    add_menu_page(
        'Hero Screenshots',
        'Hero Screenshots',
        'manage_options',
        'hero-screenshots',
        'alejandro_hero_screenshots_page',
        'dashicons-laptop',
        29
    );
}
add_action('admin_menu', 'alejandro_add_hero_screenshots_menu');

function alejandro_hero_screenshots_page() {
    if (isset($_POST['save_hero_screenshots']) && check_admin_referer('save_hero_screenshots')) {
        $images = array();
        if (isset($_POST['hero_screenshots']) && is_array($_POST['hero_screenshots'])) {
            foreach ($_POST['hero_screenshots'] as $image) {
                $images[] = array(
                    'id' => absint($image['id']),
                    'url' => esc_url_raw($image['url']),
                    'caption' => sanitize_text_field($image['caption'] ?? '')
                );
            }
        }
        $caption = isset($_POST['hero_caption']) ? sanitize_text_field($_POST['hero_caption']) : '';
        update_option('hero_screenshots', $images);
        update_option('hero_caption', $caption);
        echo '<div class="notice notice-success"><p>Hero screenshots saved successfully!</p></div>';
    }

    $saved_images = get_option('hero_screenshots', array());
    $hero_caption = get_option('hero_caption', '');
    ?>
    <div class="wrap">
        <h1>Hero Screenshots</h1>
        <p>Add screenshots of websites you've built. These will cycle inside the laptop mockup in the hero section.</p>
        <p><strong>Tip:</strong> For the best look, use screenshots at <strong>1280x800</strong> or <strong>16:10 aspect ratio</strong>. Take full-page browser screenshots without the browser chrome (address bar, tabs) for the cleanest result.</p>

        <form method="post">
            <?php wp_nonce_field('save_hero_screenshots'); ?>

            <table class="form-table">
                <tr>
                    <th><label for="hero_caption">Hero Caption</label></th>
                    <td>
                        <input type="text" id="hero_caption" name="hero_caption" value="<?php echo esc_attr($hero_caption); ?>" class="regular-text" placeholder="e.g., Sites I've built for real clients">
                        <p class="description">Displayed below the laptop mockup.</p>
                    </td>
                </tr>
            </table>

            <h2>Screenshots</h2>
            <div id="hero-screenshots-list" style="display: flex; flex-wrap: wrap; gap: 20px; margin: 20px 0;">
                <?php foreach ($saved_images as $index => $image) : ?>
                    <div class="hero-screenshot-item" style="position: relative; background: #f0f0f0; padding: 15px; border-radius: 8px; width: 300px;">
                        <img src="<?php echo esc_url($image['url']); ?>" style="width: 100%; height: 180px; object-fit: cover; object-position: top; border-radius: 4px;">
                        <input type="hidden" name="hero_screenshots[<?php echo $index; ?>][id]" value="<?php echo esc_attr($image['id']); ?>">
                        <input type="hidden" name="hero_screenshots[<?php echo $index; ?>][url]" value="<?php echo esc_url($image['url']); ?>">
                        <div style="margin-top: 10px;">
                            <input type="text" name="hero_screenshots[<?php echo $index; ?>][caption]" value="<?php echo esc_attr($image['caption'] ?? ''); ?>" placeholder="Site name (optional)" style="width: 100%;">
                        </div>
                        <button type="button" class="remove-hero-screenshot" style="position: absolute; top: -10px; right: -10px; background: #dc3545; color: white; border: none; border-radius: 50%; width: 24px; height: 24px; cursor: pointer;">&times;</button>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="button" id="add-hero-screenshot" class="button button-secondary">Add Screenshot</button>
            <p></p>
            <input type="submit" name="save_hero_screenshots" class="button button-primary" value="Save Screenshots">
        </form>
    </div>

    <script>
    jQuery(document).ready(function($) {
        var mediaUploader;
        var imgIndex = <?php echo count($saved_images); ?>;

        $('#add-hero-screenshot').on('click', function(e) {
            e.preventDefault();
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            mediaUploader = wp.media({
                title: 'Select Website Screenshot',
                button: { text: 'Add Screenshot' },
                multiple: true,
                library: { type: 'image' }
            });
            mediaUploader.on('select', function() {
                var attachments = mediaUploader.state().get('selection').toJSON();
                attachments.forEach(function(attachment) {
                    var imgUrl = attachment.sizes.large ? attachment.sizes.large.url : attachment.url;
                    var html = '<div class="hero-screenshot-item" style="position: relative; background: #f0f0f0; padding: 15px; border-radius: 8px; width: 300px;">';
                    html += '<img src="' + imgUrl + '" style="width: 100%; height: 180px; object-fit: cover; object-position: top; border-radius: 4px;">';
                    html += '<input type="hidden" name="hero_screenshots[' + imgIndex + '][id]" value="' + attachment.id + '">';
                    html += '<input type="hidden" name="hero_screenshots[' + imgIndex + '][url]" value="' + imgUrl + '">';
                    html += '<div style="margin-top: 10px;">';
                    html += '<input type="text" name="hero_screenshots[' + imgIndex + '][caption]" value="" placeholder="Site name (optional)" style="width: 100%;">';
                    html += '</div>';
                    html += '<button type="button" class="remove-hero-screenshot" style="position: absolute; top: -10px; right: -10px; background: #dc3545; color: white; border: none; border-radius: 50%; width: 24px; height: 24px; cursor: pointer;">&times;</button>';
                    html += '</div>';
                    $('#hero-screenshots-list').append(html);
                    imgIndex++;
                });
            });
            mediaUploader.open();
        });

        $(document).on('click', '.remove-hero-screenshot', function() {
            $(this).parent('.hero-screenshot-item').remove();
        });
    });
    </script>
    <?php
}

// Enqueue media on hero-screenshots and services-phone admin pages
function alejandro_enqueue_hero_admin_scripts($hook) {
    if ($hook === 'toplevel_page_hero-screenshots' || $hook === 'toplevel_page_services-phone-video') {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'alejandro_enqueue_hero_admin_scripts');

// Services Phone Video Admin Page
function alejandro_add_services_phone_menu() {
    add_menu_page(
        'Services Phone Video',
        'Services Phone Video',
        'manage_options',
        'services-phone-video',
        'alejandro_services_phone_page',
        'dashicons-smartphone',
        32
    );
}
add_action('admin_menu', 'alejandro_add_services_phone_menu');

function alejandro_services_phone_page() {
    if (isset($_POST['save_services_phone_video']) && check_admin_referer('save_services_phone_video')) {
        $video_id = isset($_POST['services_phone_video']) ? absint($_POST['services_phone_video']) : '';
        update_option('services_phone_video', $video_id);
        echo '<div class="notice notice-success"><p>Video saved successfully!</p></div>';
    }

    $saved_video_id = get_option('services_phone_video', '');
    $video_url = $saved_video_id ? wp_get_attachment_url($saved_video_id) : '';
    ?>
    <div class="wrap">
        <h1>Services Phone Video</h1>
        <p>Upload a video to display inside the iPhone mockup in the "Services That Drive Results" section.</p>
        <p><strong>Tip:</strong> For the best look, use a vertical video (9:16 aspect ratio, e.g. 1080x1920). MP4 format recommended.</p>

        <form method="post">
            <?php wp_nonce_field('save_services_phone_video'); ?>

            <table class="form-table">
                <tr>
                    <th><label>Phone Video</label></th>
                    <td>
                        <input type="hidden" id="services_phone_video" name="services_phone_video" value="<?php echo esc_attr($saved_video_id); ?>">
                        <div id="phone-video-preview" style="margin: 10px 0;">
                            <?php if ($video_url) : ?>
                                <video src="<?php echo esc_url($video_url); ?>" style="max-width: 300px; border-radius: 8px;" controls muted></video>
                            <?php endif; ?>
                        </div>
                        <button type="button" id="upload-phone-video" class="button button-secondary">Select Video</button>
                        <button type="button" id="remove-phone-video" class="button" <?php echo !$saved_video_id ? 'style="display:none;"' : ''; ?>>Remove Video</button>
                    </td>
                </tr>
            </table>

            <input type="submit" name="save_services_phone_video" class="button button-primary" value="Save Video">
        </form>
    </div>

    <script>
    jQuery(document).ready(function($) {
        var videoUploader;

        $('#upload-phone-video').on('click', function(e) {
            e.preventDefault();
            if (videoUploader) {
                videoUploader.open();
                return;
            }
            videoUploader = wp.media({
                title: 'Select Video',
                button: { text: 'Use This Video' },
                multiple: false,
                library: { type: 'video' }
            });
            videoUploader.on('select', function() {
                var attachment = videoUploader.state().get('selection').first().toJSON();
                $('#services_phone_video').val(attachment.id);
                $('#phone-video-preview').html('<video src="' + attachment.url + '" style="max-width: 300px; border-radius: 8px;" controls muted></video>');
                $('#remove-phone-video').show();
            });
            videoUploader.open();
        });

        $('#remove-phone-video').on('click', function(e) {
            e.preventDefault();
            $('#services_phone_video').val('');
            $('#phone-video-preview').html('');
            $(this).hide();
        });
    });
    </script>
    <?php
}

// Services Page Settings Admin Page
function alejandro_add_services_settings_menu() {
    add_menu_page(
        'Services Page Settings',
        'Services Page',
        'manage_options',
        'services-settings',
        'alejandro_services_settings_page',
        'dashicons-admin-generic',
        32
    );
}
add_action('admin_menu', 'alejandro_add_services_settings_menu');

function alejandro_services_settings_page() {
    if (isset($_POST['save_services_settings']) && check_admin_referer('save_services_settings')) {
        $image_id  = isset($_POST['services_hero_bg_id'])  ? absint($_POST['services_hero_bg_id'])       : '';
        $image_url = isset($_POST['services_hero_bg_url']) ? esc_url_raw($_POST['services_hero_bg_url']) : '';
        update_option('services_hero_bg_id',  $image_id);
        update_option('services_hero_bg_url', $image_url);

        $cta_id  = isset($_POST['services_cta_bg_id'])  ? absint($_POST['services_cta_bg_id'])       : '';
        $cta_url = isset($_POST['services_cta_bg_url']) ? esc_url_raw($_POST['services_cta_bg_url']) : '';
        update_option('services_cta_bg_id',  $cta_id);
        update_option('services_cta_bg_url', $cta_url);

        echo '<div class="notice notice-success"><p>Services page settings saved!</p></div>';
    }

    $saved_id  = get_option('services_hero_bg_id',  '');
    $saved_url = get_option('services_hero_bg_url', '');
    $preview   = $saved_id ? wp_get_attachment_image_url($saved_id, 'large') : $saved_url;

    $cta_saved_id  = get_option('services_cta_bg_id',  '');
    $cta_saved_url = get_option('services_cta_bg_url', '');
    $cta_preview   = $cta_saved_id ? wp_get_attachment_image_url($cta_saved_id, 'large') : $cta_saved_url;
    ?>
    <div class="wrap">
        <h1>Services Page Settings</h1>
        <p>Upload background images for the Services page sections.</p>
        <p><strong>Tip:</strong> Use wide landscape images (at least 1600&times;900px) for the best result.</p>

        <form method="post">
            <?php wp_nonce_field('save_services_settings'); ?>

            <table class="form-table">
                <tr>
                    <th><label>Hero Background Image</label></th>
                    <td>
                        <input type="hidden" id="services_hero_bg_id"  name="services_hero_bg_id"  value="<?php echo esc_attr($saved_id); ?>">
                        <input type="hidden" id="services_hero_bg_url" name="services_hero_bg_url" value="<?php echo esc_url($saved_url); ?>">
                        <div id="services-hero-bg-preview" style="margin: 10px 0;">
                            <?php if ($preview) : ?>
                                <img src="<?php echo esc_url($preview); ?>" style="max-width: 480px; height: 200px; object-fit: cover; border-radius: 8px; display: block;">
                            <?php endif; ?>
                        </div>
                        <button type="button" id="upload-services-hero-bg" class="button button-secondary">Select Image</button>
                        <button type="button" id="remove-services-hero-bg" class="button" <?php echo !$saved_id ? 'style="display:none;"' : ''; ?>>Remove Image</button>
                        <p class="description">Displays as a faint texture behind the hero headline.</p>
                    </td>
                </tr>
                <tr>
                    <th><label>CTA Background Image</label></th>
                    <td>
                        <input type="hidden" id="services_cta_bg_id"  name="services_cta_bg_id"  value="<?php echo esc_attr($cta_saved_id); ?>">
                        <input type="hidden" id="services_cta_bg_url" name="services_cta_bg_url" value="<?php echo esc_url($cta_saved_url); ?>">
                        <div id="services-cta-bg-preview" style="margin: 10px 0;">
                            <?php if ($cta_preview) : ?>
                                <img src="<?php echo esc_url($cta_preview); ?>" style="max-width: 480px; height: 200px; object-fit: cover; border-radius: 8px; display: block;">
                            <?php endif; ?>
                        </div>
                        <button type="button" id="upload-services-cta-bg" class="button button-secondary">Select Image</button>
                        <button type="button" id="remove-services-cta-bg" class="button" <?php echo !$cta_saved_id ? 'style="display:none;"' : ''; ?>>Remove Image</button>
                        <p class="description">Sits behind the dark blue overlay in the "Ready to Build" CTA section at the bottom of the page.</p>
                    </td>
                </tr>
            </table>

            <p class="submit">
                <input type="submit" name="save_services_settings" class="button button-primary" value="Save Settings">
            </p>
        </form>
    </div>

    <script>
    jQuery(document).ready(function($) {
        function makeUploader(uploadBtnId, removeBtnId, hiddenIdField, hiddenUrlField, previewId) {
            var uploader;
            $('#' + uploadBtnId).on('click', function(e) {
                e.preventDefault();
                if (uploader) { uploader.open(); return; }
                uploader = wp.media({
                    title: 'Select Background Image',
                    button: { text: 'Use This Image' },
                    multiple: false,
                    library: { type: 'image' }
                });
                uploader.on('select', function() {
                    var attachment = uploader.state().get('selection').first().toJSON();
                    var imgUrl = attachment.sizes.large ? attachment.sizes.large.url : attachment.url;
                    $('#' + hiddenIdField).val(attachment.id);
                    $('#' + hiddenUrlField).val(attachment.url);
                    $('#' + previewId).html('<img src="' + imgUrl + '" style="max-width: 480px; height: 200px; object-fit: cover; border-radius: 8px; display: block;">');
                    $('#' + removeBtnId).show();
                });
                uploader.open();
            });
            $('#' + removeBtnId).on('click', function(e) {
                e.preventDefault();
                $('#' + hiddenIdField).val('');
                $('#' + hiddenUrlField).val('');
                $('#' + previewId).html('');
                $(this).hide();
            });
        }

        makeUploader('upload-services-hero-bg', 'remove-services-hero-bg', 'services_hero_bg_id', 'services_hero_bg_url', 'services-hero-bg-preview');
        makeUploader('upload-services-cta-bg',  'remove-services-cta-bg',  'services_cta_bg_id',  'services_cta_bg_url',  'services-cta-bg-preview');
    });
    </script>
    <?php
}

// Allow JSON file uploads for Lottie animations
function alejandro_allow_json_uploads($mimes) {
    $mimes['json'] = 'application/json';
    return $mimes;
}
add_filter('upload_mimes', 'alejandro_allow_json_uploads');

// Fix MIME type check for JSON files
function alejandro_fix_json_mime_type($data, $file, $filename, $mimes) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if ($ext === 'json') {
        $data['ext'] = 'json';
        $data['type'] = 'application/json';
    }
    return $data;
}
add_filter('wp_check_filetype_and_ext', 'alejandro_fix_json_mime_type', 10, 4);

// Theme customizer options
function alejandro_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title'    => 'Hero Section',
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_greeting', array(
        'default'           => 'Hello, I\'m',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_greeting', array(
        'label'   => 'Greeting Text',
        'section' => 'hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_description', array(
        'default'           => 'I build modern, responsive websites and web applications that help businesses grow and succeed online.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('hero_description', array(
        'label'   => 'Description',
        'section' => 'hero_section',
        'type'    => 'textarea',
    ));

    // About Section
    $wp_customize->add_section('about_section', array(
        'title'    => 'About Section',
        'priority' => 31,
    ));

    $wp_customize->add_setting('about_text', array(
        'default'           => 'I\'m a passionate web developer with a love for creating beautiful, functional websites. With expertise in modern technologies, I help businesses establish their online presence and achieve their digital goals.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('about_text', array(
        'label'   => 'About Text',
        'section' => 'about_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('skills', array(
        'default'           => 'HTML5, CSS3, JavaScript, React, Node.js, PHP, WordPress, MySQL, Git',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('skills', array(
        'label'       => 'Skills (comma-separated)',
        'section'     => 'about_section',
        'type'        => 'text',
    ));

    // Contact Section
    $wp_customize->add_section('contact_section', array(
        'title'    => 'Contact Section',
        'priority' => 32,
    ));

    $wp_customize->add_setting('contact_email', array(
        'default'           => 'alejsilvadev@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('contact_email', array(
        'label'   => 'Email',
        'section' => 'contact_section',
        'type'    => 'email',
    ));

    $wp_customize->add_setting('contact_phone', array(
        'default'           => '+1 (555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label'   => 'Phone',
        'section' => 'contact_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('contact_location', array(
        'default'           => 'New York, USA',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_location', array(
        'label'   => 'Location',
        'section' => 'contact_section',
        'type'    => 'text',
    ));

    // Social Links
    $wp_customize->add_setting('social_github', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_github', array(
        'label'   => 'GitHub URL',
        'section' => 'contact_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('social_linkedin', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_linkedin', array(
        'label'   => 'LinkedIn URL',
        'section' => 'contact_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('social_twitter', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_twitter', array(
        'label'   => 'Twitter URL',
        'section' => 'contact_section',
        'type'    => 'url',
    ));
}
add_action('customize_register', 'alejandro_customize_register');

