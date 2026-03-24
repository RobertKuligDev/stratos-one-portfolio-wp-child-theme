<?php
/**
 * Projects section template part
 *
 * Displays project cards with case study modals
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get all projects for case study modals
$all_projects = new WP_Query([
    'post_type'      => 'project',
    'posts_per_page' => -1,
    'fields'         => 'ids',
]);
$project_ids = $all_projects->posts;

// Get all technologies for filter buttons
$technologies = get_terms([
    'taxonomy'   => 'technology',
    'hide_empty' => true,
]);
?>
<!-- Projects Section -->
<section class="projects" id="projects">
    <div class="container">
        
        <header class="section-header reveal">
            <h2 class="section-title">
                <svg class="section-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                </svg>
                <?php esc_html_e('Projects', 'stratos-one-portfolio'); ?>
            </h2>
            <p class="section-subtitle"><?php esc_html_e('Check out my latest work', 'stratos-one-portfolio'); ?></p>
        </header>

        <!-- Project Filters -->
        <div class="projects-filter">
            <button class="filter-btn active" data-filter="all"><?php esc_html_e('All', 'stratos-one-portfolio'); ?></button>
            <?php if ($technologies && !is_wp_error($technologies)) : ?>
                <?php foreach ($technologies as $tech) : ?>
                    <button class="filter-btn" data-filter="<?php echo esc_attr($tech->slug); ?>"><?php echo esc_html($tech->name); ?></button>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="projects-grid">
            <?php
            $projects_query = new WP_Query([
                'post_type'      => 'project',
                'posts_per_page' => 6,
            ]);

            if ($projects_query->have_posts()) :
                while ($projects_query->have_posts()) :
                    $projects_query->the_post();
                    
                    // Get project data
                    $project_id = get_the_ID();
                    $technologies = get_the_terms($project_id, 'technology');
                    $categories = get_the_category($project_id);
                    $category = $categories ? $categories[0]->name : 'Project';

                    // Get meta fields (native WP, no ACF required)
                    $case_study_problem = get_post_meta($project_id, '_case_study_problem', true) ?: '';
                    $case_study_solution = get_post_meta($project_id, '_case_study_solution', true) ?: '';
                    $project_url = get_post_meta($project_id, '_project_url', true) ?: get_permalink();
                    $github_url = get_post_meta($project_id, '_github_url', true) ?: '';

                    // Get category slug for filter (first technology)
                    $category_slug = '';
                    if ($technologies && !is_wp_error($technologies)) {
                        $category_slug = $technologies[0]->slug;
                    }
                    ?>
                    <article class="project-card" data-category="<?php echo esc_attr($category_slug); ?>" id="post-<?php the_ID(); ?>">
                        <div class="project-card-content">
                            
                            <span class="project-category"><?php echo esc_html($category); ?></span>

                            <h3 class="project-card-title">
                                <?php the_title(); ?>
                            </h3>

                            <p class="project-card-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>

                            <?php if ($technologies && !is_wp_error($technologies)) : ?>
                                <div class="project-card-tech" aria-label="Technologies">
                                    <?php foreach (array_slice($technologies, 0, 5) as $tech) : ?>
                                        <span class="tech-badge"><?php echo esc_html($tech->name); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <button type="button" class="project-card-btn stratos-modal-trigger"
                                    data-type="inline"
                                    data-title="<?php echo esc_attr(get_the_title()); ?>"
                                    data-content-ref="#case-study-<?php echo esc_attr($project_id); ?>"
                                    aria-label="<?php esc_attr_e('View case study', 'stratos-one-portfolio'); ?>: <?php echo esc_attr(get_the_title()); ?>">
                                <?php esc_html_e('View case study', 'stratos-one-portfolio'); ?>
                                <span class="arrow" aria-hidden="true">→</span>
                            </button>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p class="projects-no-results">
                    <?php esc_html_e('No projects found. Check back soon!', 'stratos-one-portfolio'); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>