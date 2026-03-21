<?php
/**
 * Projects section template part
 *
 * Displays project cards using WordPress CPT query loop
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

?>
<!-- Projects Section -->
<section class="projects" id="projects">
    <div class="container">
        <h2 class="section-title">Projects</h2>
        <p class="section-subtitle">Check out my latest work</p>
        
        <div class="projects-grid">
            <?php
            $projects_query = new WP_Query([
                'post_type'      => 'project',
                'posts_per_page' => 6,
            ]);

            if ($projects_query->have_posts()) :
                while ($projects_query->have_posts()) :
                    $projects_query->the_post();
                    ?>
                    <article class="project-card" id="post-<?php the_ID(); ?>">
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="project-card-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', [
                                        'loading' => 'lazy',
                                        'alt'     => get_the_title(),
                                    ]); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="project-card-content">
                            <div class="project-card-meta">
                                <span class="project-card-category">
                                    <?php
                                    $categories = get_the_category();
                                    if ($categories) {
                                        echo esc_html($categories[0]->name);
                                    } else {
                                        esc_html_e('Project', 'stratos-one');
                                    }
                                    ?>
                                </span>
                            </div>

                            <h3 class="project-card-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <p class="project-card-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>

                            <?php
                            $technologies = get_the_terms(get_the_ID(), 'technology');
                            if ($technologies && !is_wp_error($technologies)) :
                                ?>
                                <div class="project-card-tech" aria-label="Technologies">
                                    <?php foreach (array_slice($technologies, 0, 4) as $tech) : ?>
                                        <span class="tech-badge"><?php echo esc_html($tech->name); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>" class="project-card-link">
                                <?php esc_html_e('View Project', 'stratos-one'); ?>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p class="projects-no-results">
                    <?php esc_html_e('No projects found. Check back soon!', 'stratos-one'); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>
