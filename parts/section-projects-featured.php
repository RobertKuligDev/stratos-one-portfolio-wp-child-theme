<?php
/**
 * Featured Projects Showcase
 *
 * Displays Featured #1 (main showcase) and Featured #2+#3 (secondary)
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get featured projects by priority
$featured_1 = null;
$featured_2 = null;
$featured_3 = null;

$featured_query = new WP_Query([
    'post_type'      => 'project',
    'posts_per_page' => -1,
    'meta_key'       => '_featured_priority',
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC',
    'meta_query'     => [
        [
            'key'     => '_featured_priority',
            'value'   => ['1', '2', '3'],
            'compare' => 'IN',
        ],
    ],
]);

if ($featured_query->have_posts()) :
    while ($featured_query->have_posts()) :
        $featured_query->the_post();
        $priority = get_post_meta(get_the_ID(), '_featured_priority', true);
        
        if ($priority == '1' && !$featured_1) {
            $featured_1 = get_post(get_the_ID());
        } elseif ($priority == '2' && !$featured_2) {
            $featured_2 = get_post(get_the_ID());
        } elseif ($priority == '3' && !$featured_3) {
            $featured_3 = get_post(get_the_ID());
        }
    endwhile;
    wp_reset_postdata();
endif;
?>

<!-- Featured Project #1 (Main Showcase) -->
<?php if ($featured_1) : 
    setup_postdata($featured_1);
    $project_id = $featured_1->ID;
    $technologies = get_the_terms($project_id, 'technology');
    $categories = get_the_category($project_id);
    $category = $categories ? $categories[0]->name : 'Project';
    $case_study_problem = get_post_meta($project_id, '_case_study_problem', true) ?: '';
    $case_study_solution = get_post_meta($project_id, '_case_study_solution', true) ?: '';
    $project_url = get_post_meta($project_id, '_project_url', true) ?: get_permalink($project_id);
    $github_url = get_post_meta($project_id, '_github_url', true) ?: '';
    
    // Get all technology slugs for filter
    $category_slugs = [];
    if ($technologies && !is_wp_error($technologies)) {
        foreach ($technologies as $tech) {
            $category_slugs[] = $tech->slug;
        }
    }
    $categories_attr = !empty($category_slugs) ? implode(',', $category_slugs) : '';
?>
<div class="featured-project featured-project-main" data-category="<?php echo esc_attr($category_slugs[0] ?? ''); ?>" data-categories="<?php echo esc_attr($categories_attr); ?>">
    <div class="featured-project-header">
        <span class="featured-badge">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
            </svg>
            <?php esc_html_e('Featured Project', 'stratos-one-portfolio'); ?>
        </span>
        <span class="project-category"><?php echo esc_html($category); ?></span>
    </div>
    
    <div class="featured-project-content">
        <div class="featured-project-image">
            <?php if (has_post_thumbnail($project_id)) : ?>
                <?php echo get_the_post_thumbnail($project_id, 'large', ['loading' => 'lazy', 'alt' => get_the_title($project_id)]); ?>
            <?php else : ?>
                <div class="featured-project-placeholder">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <polyline points="21 15 16 10 5 21"/>
                    </svg>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="featured-project-details">
            <h3 class="featured-project-title"><?php echo esc_html(get_the_title($project_id)); ?></h3>
            <p class="featured-project-excerpt"><?php echo esc_html(get_the_excerpt($project_id)); ?></p>
            
            <?php if ($case_study_problem || $case_study_solution) : ?>
            <div class="featured-project-highlights">
                <?php if ($case_study_problem) : ?>
                <div class="highlight-item">
                    <span class="highlight-label"><?php esc_html_e('Problem', 'stratos-one-portfolio'); ?></span>
                    <span class="highlight-text"><?php echo esc_html(wp_trim_words($case_study_problem, 15)); ?></span>
                </div>
                <?php endif; ?>
                <?php if ($case_study_solution) : ?>
                <div class="highlight-item">
                    <span class="highlight-label"><?php esc_html_e('Solution', 'stratos-one-portfolio'); ?></span>
                    <span class="highlight-text"><?php echo esc_html(wp_trim_words($case_study_solution, 15)); ?></span>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            
            <?php if ($technologies && !is_wp_error($technologies)) : ?>
            <div class="featured-project-tech">
                <?php foreach (array_slice($technologies, 0, 6) as $tech) : ?>
                    <span class="tech-badge"><?php echo esc_html($tech->name); ?></span>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            
            <div class="featured-project-actions">
                <button type="button" class="btn-case-study stratos-modal-trigger"
                        data-type="inline"
                        data-title="<?php echo esc_attr(get_the_title($project_id)); ?>"
                        data-content-ref="#case-study-<?php echo esc_attr($project_id); ?>"
                        aria-label="<?php esc_attr_e('View case study', 'stratos-one-portfolio'); ?>: <?php echo esc_attr(get_the_title($project_id)); ?>">
                    <?php esc_html_e('View Case Study', 'stratos-one-portfolio'); ?>
                    <span class="arrow" aria-hidden="true">→</span>
                </button>
                
                <?php if ($project_url) : ?>
                <a href="<?php echo esc_url($project_url); ?>" class="btn-visit-project" target="_blank" rel="noopener">
                    <?php esc_html_e('Visit Project', 'stratos-one-portfolio'); ?>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                        <polyline points="15 3 21 3 21 9"/>
                        <line x1="10" y1="14" x2="21" y2="3"/>
                    </svg>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php wp_reset_postdata(); endif; ?>

<!-- Featured Projects #2 + #3 (Secondary) -->
<?php if ($featured_2 || $featured_3) : ?>
<div class="featured-projects-secondary">
    <?php if ($featured_2) : 
        setup_postdata($featured_2);
        $project_id = $featured_2->ID;
        $technologies = get_the_terms($project_id, 'technology');
        $categories = get_the_category($project_id);
        $category = $categories ? $categories[0]->name : 'Project';
        $category_slug = $technologies && !is_wp_error($technologies) ? $technologies[0]->slug : '';
    ?>
    <div class="featured-project featured-project-secondary" data-category="<?php echo esc_attr($category_slug); ?>">
        <div class="featured-project-header">
            <span class="featured-badge featured-badge-sm">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                </svg>
                <?php esc_html_e('Featured', 'stratos-one-portfolio'); ?>
            </span>
            <span class="project-category"><?php echo esc_html($category); ?></span>
        </div>
        
        <?php if (has_post_thumbnail($project_id)) : ?>
        <div class="featured-project-image-sm">
            <?php echo get_the_post_thumbnail($project_id, 'medium', ['loading' => 'lazy', 'alt' => get_the_title($project_id)]); ?>
        </div>
        <?php endif; ?>
        
        <div class="featured-project-content-sm">
            <h3 class="featured-project-title-sm"><?php echo esc_html(get_the_title($project_id)); ?></h3>
            <p class="featured-project-excerpt-sm"><?php echo esc_html(get_the_excerpt($project_id)); ?></p>
            
            <?php if ($technologies && !is_wp_error($technologies)) : ?>
            <div class="featured-project-tech-sm">
                <?php foreach (array_slice($technologies, 0, 4) as $tech) : ?>
                    <span class="tech-badge"><?php echo esc_html($tech->name); ?></span>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            
            <button type="button" class="btn-case-study-sm stratos-modal-trigger"
                    data-type="inline"
                    data-title="<?php echo esc_attr(get_the_title($project_id)); ?>"
                    data-content-ref="#case-study-<?php echo esc_attr($project_id); ?>">
                <?php esc_html_e('View Case Study', 'stratos-one-portfolio'); ?>
                <span class="arrow" aria-hidden="true">→</span>
            </button>
        </div>
    </div>
    <?php wp_reset_postdata(); endif; ?>
    
    <?php if ($featured_3) : 
        setup_postdata($featured_3);
        $project_id = $featured_3->ID;
        $technologies = get_the_terms($project_id, 'technology');
        $categories = get_the_category($project_id);
        $category = $categories ? $categories[0]->name : 'Project';
        $category_slug = $technologies && !is_wp_error($technologies) ? $technologies[0]->slug : '';
    ?>
    <div class="featured-project featured-project-secondary" data-category="<?php echo esc_attr($category_slug); ?>">
        <div class="featured-project-header">
            <span class="featured-badge featured-badge-sm">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                </svg>
                <?php esc_html_e('Featured', 'stratos-one-portfolio'); ?>
            </span>
            <span class="project-category"><?php echo esc_html($category); ?></span>
        </div>
        
        <?php if (has_post_thumbnail($project_id)) : ?>
        <div class="featured-project-image-sm">
            <?php echo get_the_post_thumbnail($project_id, 'medium', ['loading' => 'lazy', 'alt' => get_the_title($project_id)]); ?>
        </div>
        <?php endif; ?>
        
        <div class="featured-project-content-sm">
            <h3 class="featured-project-title-sm"><?php echo esc_html(get_the_title($project_id)); ?></h3>
            <p class="featured-project-excerpt-sm"><?php echo esc_html(get_the_excerpt($project_id)); ?></p>
            
            <?php if ($technologies && !is_wp_error($technologies)) : ?>
            <div class="featured-project-tech-sm">
                <?php foreach (array_slice($technologies, 0, 4) as $tech) : ?>
                    <span class="tech-badge"><?php echo esc_html($tech->name); ?></span>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            
            <button type="button" class="btn-case-study-sm stratos-modal-trigger"
                    data-type="inline"
                    data-title="<?php echo esc_attr(get_the_title($project_id)); ?>"
                    data-content-ref="#case-study-<?php echo esc_attr($project_id); ?>">
                <?php esc_html_e('View Case Study', 'stratos-one-portfolio'); ?>
                <span class="arrow" aria-hidden="true">→</span>
            </button>
        </div>
    </div>
    <?php wp_reset_postdata(); endif; ?>
</div>
<?php endif; ?>
