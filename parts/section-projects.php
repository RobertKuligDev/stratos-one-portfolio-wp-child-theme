<?php
/**
 * Projects section template part
 *
 * Displays featured projects showcase + standard project grid
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

        <!-- Featured Projects (Priority 1, 2, 3) -->
        <?php get_template_part('parts/section-projects', 'featured'); ?>

        <!-- Standard Projects Grid -->
        <?php get_template_part('parts/section-projects', 'grid'); ?>
        
    </div>
</section>

<!-- Hidden Case Study Content (loaded by Stratos Modal) -->
<?php if ($project_ids) :
    $modal_query = new WP_Query([
        'post_type'      => 'project',
        'post__in'       => $project_ids,
        'posts_per_page' => -1,
    ]);

    while ($modal_query->have_posts()) :
        $modal_query->the_post();
        $project_id = get_the_ID();
        $technologies = get_the_terms($project_id, 'technology');
        $categories = get_the_category($project_id);
        $category = $categories ? $categories[0]->name : 'Project';

        $case_study_problem = get_post_meta($project_id, '_case_study_problem', true) ?: '';
        $case_study_solution = get_post_meta($project_id, '_case_study_solution', true) ?: '';
        $readme_text = get_post_meta($project_id, '_readme_text', true) ?: '';
        $pdf_url = get_post_meta($project_id, '_pdf_url', true) ?: '';
        $project_url = get_post_meta($project_id, '_project_url', true) ?: get_permalink();
        $github_url = get_post_meta($project_id, '_github_url', true) ?: '';
        
        // Get project metrics (optional ACF or custom fields)
        $project_metrics = get_post_meta($project_id, '_project_metrics', true) ?: [];
        ?>
        <div id="case-study-<?php echo esc_attr($project_id); ?>" style="display:none;">
            <div class="case-study-content">

                <!-- Header with Breadcrumbs & Category -->
                <div class="case-study-header">
                    <nav class="case-study-breadcrumbs" aria-label="Breadcrumb">
                        <ol class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="#projects"><?php esc_html_e('Projects', 'stratos-one-portfolio'); ?></a></li>
                            <li class="breadcrumb-item" aria-current="page"><?php echo esc_html($category); ?></li>
                        </ol>
                    </nav>
                    <span class="case-study-category-badge"><?php echo esc_html($category); ?></span>
                    <h2 class="case-study-main-title"><?php the_title(); ?></h2>
                </div>

                <!-- Featured Image -->
                <?php if (has_post_thumbnail($project_id)) : ?>
                <section class="case-study-section case-study-featured-image">
                    <div class="featured-image-wrapper">
                        <?php echo get_the_post_thumbnail($project_id, 'large', ['loading' => 'lazy', 'alt' => get_the_title($project_id)]); ?>
                    </div>
                </section>
                <?php endif; ?>

                <!-- Main Content (Gutenberg Editor) -->
                <?php if (has_blocks()) : ?>
                <section class="case-study-section case-study-main-content">
                    <h3 class="case-study-section-title"><?php esc_html_e('Project Overview', 'stratos-one-portfolio'); ?></h3>
                    <div class="project-content">
                        <?php the_content(); ?>
                    </div>
                </section>
                <?php else : ?>

                <!-- Classic Layout -->
                
                <!-- README / Quick Description -->
                <?php if ($readme_text) : ?>
                <section class="case-study-section">
                    <h3 class="case-study-section-title"><?php esc_html_e('Overview', 'stratos-one-portfolio'); ?></h3>
                    <p class="case-study-overview"><?php echo esc_html($readme_text); ?></p>
                </section>
                <?php endif; ?>

                <!-- Problem & Solution Grid -->
                <?php if ($case_study_problem || $case_study_solution) : ?>
                <section class="case-study-section">
                    <div class="problem-solution-grid">
                        <?php if ($case_study_problem) : ?>
                        <div class="problem-solution-card problem-card">
                            <div class="card-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <circle cx="12" cy="12" r="10"/>
                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                                    <line x1="12" y1="17" x2="12.01" y2="17"/>
                                </svg>
                            </div>
                            <h4 class="card-title"><?php esc_html_e('The Challenge', 'stratos-one-portfolio'); ?></h4>
                            <p class="card-content"><?php echo esc_html($case_study_problem); ?></p>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($case_study_solution) : ?>
                        <div class="problem-solution-card solution-card">
                            <div class="card-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                </svg>
                            </div>
                            <h4 class="card-title"><?php esc_html_e('The Solution', 'stratos-one-portfolio'); ?></h4>
                            <p class="card-content"><?php echo esc_html($case_study_solution); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                </section>
                <?php endif; ?>

                <?php endif; // end has_blocks ?>

                <!-- Technologies -->
                <?php if ($technologies && !is_wp_error($technologies)) : ?>
                <section class="case-study-section">
                    <h3 class="case-study-section-title"><?php esc_html_e('Technologies Used', 'stratos-one-portfolio'); ?></h3>
                    <div class="case-study-tech">
                        <?php foreach ($technologies as $tech) : ?>
                            <span class="tech-badge tech-badge-large"><?php echo esc_html($tech->name); ?></span>
                        <?php endforeach; ?>
                    </div>
                </section>
                <?php endif; ?>

                <!-- Project Metrics (if available) -->
                <?php if (!empty($project_metrics)) : ?>
                <section class="case-study-section">
                    <h3 class="case-study-section-title"><?php esc_html_e('Key Results', 'stratos-one-portfolio'); ?></h3>
                    <div class="case-study-results">
                        <?php foreach ($project_metrics as $metric) : ?>
                        <div class="result-metric">
                            <div class="result-value"><?php echo esc_html($metric['value']); ?></div>
                            <div class="result-label"><?php echo esc_html($metric['label']); ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </section>
                <?php endif; ?>

                <!-- Links & Actions -->
                <section class="case-study-section case-study-actions-section">
                    <h3 class="case-study-section-title"><?php esc_html_e('Project Links', 'stratos-one-portfolio'); ?></h3>
                    <div class="case-study-links">
                        <?php if ($project_url) : ?>
                        <a href="<?php echo esc_url($project_url); ?>" class="case-study-link-btn case-study-link-primary" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                                <polyline points="15 3 21 3 21 9"/>
                                <line x1="10" y1="14" x2="21" y2="3"/>
                            </svg>
                            <span><?php esc_html_e('Visit Live Project', 'stratos-one-portfolio'); ?></span>
                        </a>
                        <?php endif; ?>

                        <?php if ($github_url) : ?>
                        <a href="<?php echo esc_url($github_url); ?>" class="case-study-link-btn" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/>
                            </svg>
                            <span><?php esc_html_e('View Source Code', 'stratos-one-portfolio'); ?></span>
                        </a>
                        <?php endif; ?>

                        <?php if ($pdf_url) : ?>
                        <a href="<?php echo esc_url($pdf_url); ?>" class="case-study-link-btn" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14 2 14 8 20 8"/>
                                <line x1="12" y1="18" x2="12" y2="12"/>
                                <line x1="9" y1="15" x2="15" y2="15"/>
                            </svg>
                            <span><?php esc_html_e('Download PDF Case Study', 'stratos-one-portfolio'); ?></span>
                        </a>
                        <?php endif; ?>
                    </div>
                </section>

            </div>
        </div>
        <?php
    endwhile;
    wp_reset_postdata();
endif; ?>
