<?php
/**
 * Projects section template part
 *
 * Displays project cards using WordPress query loop
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

?>
<!-- Projects Section -->
<section class="projects wrapper" id="projects">
    <div class="container">
        <h2 class="projects__title">Projects</h2>
        <div class="projects__grid">
            <?php
            $projects_query = new WP_Query([
                'post_type'      => 'project',
                'posts_per_page' => 6,
            ]);

            if ($projects_query->have_posts()) :
                while ($projects_query->have_posts()) :
                    $projects_query->the_post();
                    ?>
                    <article class="project-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="project-card__image">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>

                        <h3 class="project-card__title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>

                        <div class="project-card__excerpt">
                            <?php the_excerpt(); ?>
                        </div>

                        <?php
                        $technologies = get_the_terms(get_the_ID(), 'technology');
                        if ($technologies && !is_wp_error($technologies)) :
                            ?>
                            <div class="project-card__tags">
                                <?php foreach ($technologies as $tech) : ?>
                                    <span class="project-card__tag"><?php echo esc_html($tech->name); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <a href="<?php the_permalink(); ?>" class="project-card__button">
                            <?php esc_html_e('View Project', 'stratos-one'); ?>
                        </a>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p class="projects__no-results">
                    <?php esc_html_e('No projects found. Check back soon!', 'stratos-one'); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>
