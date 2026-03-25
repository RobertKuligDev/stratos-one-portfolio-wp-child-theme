<?php
/**
 * Standard Projects Grid
 *
 * Displays non-featured projects in 3-column grid
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get standard (non-featured) projects
$standard_projects = [];

$standard_query = new WP_Query([
    'post_type'      => 'project',
    'posts_per_page' => -1,
    'meta_query'     => [
        'relation' => 'OR',
        [
            'key'     => '_featured_priority',
            'value'   => '0',
            'compare' => '=',
        ],
        [
            'key'     => '_featured_priority',
            'compare' => 'NOT EXISTS',
        ],
    ],
]);

if ($standard_query->have_posts()) :
    while ($standard_query->have_posts()) :
        $standard_query->the_post();
        $standard_projects[] = get_post(get_the_ID());
    endwhile;
    wp_reset_postdata();
endif;
?>

<?php if (!empty($standard_projects)) : ?>
<div class="projects-grid">
    <?php foreach ($standard_projects as $project) : 
        setup_postdata($project);
        $project_id = $project->ID;
        $technologies = get_the_terms($project_id, 'technology');
        $categories = get_the_category($project_id);
        $category = $categories ? $categories[0]->name : 'Project';
        $category_slug = $technologies && !is_wp_error($technologies) ? $technologies[0]->slug : '';
    ?>
    <article class="project-card" data-category="<?php echo esc_attr($category_slug); ?>" id="post-<?php the_ID(); ?>">
        
        <?php if (has_post_thumbnail($project_id)) : ?>
        <div class="project-card-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium_large', [
                    'loading' => 'lazy',
                    'alt'     => get_the_title(),
                    'class'   => 'project-card-img',
                ]); ?>
            </a>
        </div>
        <?php endif; ?>
        
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
    <?php endforeach; ?>
</div>
<?php wp_reset_postdata(); endif; ?>
