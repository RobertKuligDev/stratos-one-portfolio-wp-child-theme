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
                    
                    // Get project data
                    $project_id = get_the_ID();
                    $technologies = get_the_terms($project_id, 'technology');
                    $categories = get_the_category($project_id);
                    $category = $categories ? $categories[0]->name : 'Project';
                    
                    // Get ACF fields (if available) or use fallback
                    $case_study_problem = get_field('case_study_problem') ?: 'Detailed problem description will be added soon.';
                    $case_study_solution = get_field('case_study_solution') ?: 'Solution details coming soon.';
                    $case_study_results = get_field('case_study_results') ?: [];
                    $project_url = get_field('project_url') ?: get_permalink();
                    $github_url = get_field('github_url') ?: '';
                    
                    // Get gallery images
                    $gallery = [];
                    if (function_exists('get_field')) {
                        $gallery_images = get_field('project_gallery');
                        if ($gallery_images) {
                            foreach ($gallery_images as $image) {
                                $gallery[] = [
                                    'type' => 'image',
                                    'src'  => $image['url'],
                                    'alt'  => $image['alt'] ?: get_the_title(),
                                ];
                            }
                        }
                    }
                    
                    // Get PDF if exists
                    $case_study_pdf = get_field('case_study_pdf');
                    $has_pdf = $case_study_pdf && function_exists('get_field');
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
                                    <?php echo esc_html($category); ?>
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

                            <?php if ($technologies && !is_wp_error($technologies)) : ?>
                                <div class="project-card-tech" aria-label="Technologies">
                                    <?php foreach (array_slice($technologies, 0, 4) as $tech) : ?>
                                        <span class="tech-badge"><?php echo esc_html($tech->name); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <div class="project-card-actions">
                                <?php if ($project_url) : ?>
                                <a href="<?php echo esc_url($project_url); ?>" class="project-card-link" target="_blank" rel="noopener">
                                    <?php esc_html_e('Visit Project', 'stratos-one'); ?>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                                        <polyline points="15 3 21 3 21 9"/>
                                        <line x1="10" y1="14" x2="21" y2="3"/>
                                    </svg>
                                </a>
                                <?php endif; ?>
                                
                                <button class="project-card-link stratos-modal-trigger"
                                        type="button"
                                        data-type="inline"
                                        data-title="<?php echo esc_attr(get_the_title()); ?>"
                                        data-content-ref="#case-study-<?php echo esc_attr($project_id); ?>"
                                        aria-label="<?php esc_attr_e('View case study', 'stratos-one'); ?>: <?php echo esc_attr(get_the_title()); ?>">
                                    <?php esc_html_e('Case Study', 'stratos-one'); ?>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </button>
                            </div>
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
    
    <!-- Hidden Case Study Content (loaded by Stratos Modal) -->
    <?php
    // Reset query to get all projects for modal content
    if ($project_ids) :
        $modal_query = new WP_Query([
            'post_type'      => 'project',
            'post__in'       => $project_ids,
            'posts_per_page' => -1,
        ]);
        
        while ($modal_query->have_posts()) :
            $modal_query->the_post();
            $project_id = get_the_ID();
            $technologies = get_the_terms($project_id, 'technology');
            $case_study_problem = get_field('case_study_problem') ?: 'Problem description coming soon.';
            $case_study_solution = get_field('case_study_solution') ?: 'Solution details coming soon.';
            $case_study_results = get_field('case_study_results') ?: [];
            $case_study_pdf = get_field('case_study_pdf');
            $project_url = get_field('project_url') ?: get_permalink();
            $github_url = get_field('github_url') ?: '';
            
            // Get gallery for modal
            $gallery_json = '[]';
            if (function_exists('get_field')) {
                $gallery_images = get_field('project_gallery');
                if ($gallery_images) {
                    $gallery_data = [];
                    foreach ($gallery_images as $image) {
                        $gallery_data[] = [
                            'type' => 'image',
                            'src'  => $image['url'],
                            'alt'  => $image['alt'] ?: get_the_title(),
                        ];
                    }
                    $gallery_json = esc_attr(json_encode($gallery_data));
                }
            }
            ?>
            <div id="case-study-<?php echo esc_attr($project_id); ?>" style="display:none;">
                <div class="case-study-content">
                    
                    <!-- Overview -->
                    <section class="case-study-section">
                        <h3 class="case-study-section-title">Overview</h3>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                    </section>
                    
                    <!-- Problem -->
                    <section class="case-study-section">
                        <h3 class="case-study-section-title">Problem</h3>
                        <p><?php echo esc_html($case_study_problem); ?></p>
                    </section>
                    
                    <!-- Solution -->
                    <section class="case-study-section">
                        <h3 class="case-study-section-title">Solution</h3>
                        <p><?php echo esc_html($case_study_solution); ?></p>
                    </section>
                    
                    <!-- Technologies -->
                    <?php if ($technologies && !is_wp_error($technologies)) : ?>
                    <section class="case-study-section">
                        <h3 class="case-study-section-title">Technologies</h3>
                        <div class="case-study-tech">
                            <?php foreach ($technologies as $tech) : ?>
                                <span class="tech-badge"><?php echo esc_html($tech->name); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </section>
                    <?php endif; ?>
                    
                    <!-- Results -->
                    <?php if ($case_study_results) : ?>
                    <section class="case-study-section">
                        <h3 class="case-study-section-title">Results</h3>
                        <div class="case-study-results">
                            <?php foreach ($case_study_results as $result) : ?>
                                <div class="result-metric">
                                    <span class="result-value"><?php echo esc_html($result['value']); ?></span>
                                    <span class="result-label"><?php echo esc_html($result['label']); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                    <?php endif; ?>
                    
                    <!-- Gallery -->
                    <?php if (!empty($gallery_json) && $gallery_json !== '[]') : ?>
                    <section class="case-study-section">
                        <h3 class="case-study-section-title">Gallery</h3>
                        <div class="case-study-gallery" data-gallery='<?php echo $gallery_json; ?>'>
                            <button class="gallery-view-btn stratos-modal-trigger"
                                    type="button"
                                    data-type="gallery"
                                    data-gallery='<?php echo $gallery_json; ?>'
                                    data-title="<?php echo esc_attr(get_the_title()); ?> - Gallery">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                    <circle cx="8.5" cy="8.5" r="1.5"/>
                                    <polyline points="21 15 16 10 5 21"/>
                                </svg>
                                <span>View Gallery</span>
                            </button>
                        </div>
                    </section>
                    <?php endif; ?>
                    
                    <!-- PDF Download -->
                    <?php if ($case_study_pdf) : ?>
                    <section class="case-study-section">
                        <h3 class="case-study-section-title">Documentation</h3>
                        <a href="<?php echo esc_url($case_study_pdf['url']); ?>" class="pdf-download-btn" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14 2 14 8 20 8"/>
                                <line x1="12" y1="18" x2="12" y2="12"/>
                                <line x1="9" y1="15" x2="15" y2="15"/>
                            </svg>
                            <span>Download Case Study (PDF)</span>
                        </a>
                    </section>
                    <?php endif; ?>
                    
                    <!-- Links -->
                    <section class="case-study-section">
                        <h3 class="case-study-section-title">Links</h3>
                        <div class="case-study-links">
                            <?php if ($project_url) : ?>
                            <a href="<?php echo esc_url($project_url); ?>" class="project-link" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                                    <polyline points="15 3 21 3 21 9"/>
                                    <line x1="10" y1="14" x2="21" y2="3"/>
                                </svg>
                                <span>Visit Project</span>
                            </a>
                            <?php endif; ?>
                            
                            <?php if ($github_url) : ?>
                            <a href="<?php echo esc_url($github_url); ?>" class="project-link" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/>
                                </svg>
                                <span>GitHub</span>
                            </a>
                            <?php endif; ?>
                        </div>
                    </section>
                    
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>
</section>
