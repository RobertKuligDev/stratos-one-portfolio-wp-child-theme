<?php
/**
 * What I Do section template part
 *
 * Services grid with 3 cards - full layout with outcomes
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

$services = [
    [
        'title'       => 'Production .NET + Angular Apps',
        'description' => 'I create modern web applications based on .NET and Angular — from architecture, through backend and frontend, to production deployment.',
        'features'    => [
            'backend .NET (API, business logic)',
            'frontend Angular (SPA, components)',
            'payment & e-commerce integrations',
            'performance optimization',
            'production deployments & CI/CD',
        ],
        'tech'        => ['.NET', 'C#', 'Angular', 'TypeScript', 'REST API', 'SQL', 'Docker'],
        'icon'        => 'code',
        'for_whom'    => 'For e-commerce and SaaS companies',
        'solves'      => 'Scalable web apps with .NET backend and Angular frontend',
        'outcomes'    => ['Fast loading', 'Secure API', 'Easy development'],
    ],
    [
        'title'       => 'DevOps & Infrastructure',
        'description' => 'I design and maintain production environments for .NET, Angular and WordPress/Shopify applications.',
        'features'    => [
            'Docker + containerization',
            'Traefik (routing, certificates)',
            'monitoring & logging',
            'CI/CD (GitHub Actions)',
            'Linux server optimization',
        ],
        'tech'        => ['Docker', 'Traefik', 'Linux', 'GitHub Actions', 'Cloudflare'],
        'icon'        => 'server',
        'for_whom'    => 'For teams needing stable infrastructure',
        'solves'      => 'Staging/production environments with automated deployments',
        'outcomes'    => ['Zero-downtime', 'Automatic SSL', '24/7 Monitoring'],
    ],
    [
        'title'       => 'API Automation & Integrations',
        'description' => 'I automate business processes and integrate systems to eliminate manual work.',
        'features'    => [
            'API integrations',
            'n8n workflows',
            'data synchronization',
            'lead handling automation',
            'SaaS & CRM integrations',
        ],
        'tech'        => ['n8n', 'REST API', 'Webhooks', 'SaaS', 'CRM'],
        'icon'        => 'automation',
        'for_whom'    => 'For companies with repetitive processes',
        'solves'      => 'Lead automation, data sync, CRM integrations',
        'outcomes'    => ['Time savings', 'Fewer errors', 'Real-time data'],
    ],
];

/**
 * Get SVG icon by name (outline style - Tabler Icons)
 */
function stratos_one_get_service_icon(string $name): string
{
    $icons = [
        'code'        => '<path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 8l-4 4l4 4m10 -8l4 4l-4 4m-14 8h16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
        'server'      => '<path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" stroke-width="2"/><path d="M3 12m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" stroke-width="2"/><path d="M7 8v.01m6 0v.01m6 0v.01" stroke-width="2" stroke-linecap="round"/><path d="M7 16v.01m6 0v.01m6 0v.01" stroke-width="2" stroke-linecap="round"/>',
        'automation'  => '<path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 12h6m-3 -3v6m-6 -3h12" stroke-width="2" stroke-linecap="round"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" stroke-width="2"/><path d="M17 4a2 2 0 0 0 2 2a2 2 0 0 0 -2 2a2 2 0 0 0 -2 -2a2 2 0 0 0 2 -2" stroke-width="2"/><path d="M19 11h2m-1 -1v2" stroke-width="2" stroke-linecap="round"/>',
    ];

    $svg_path = $icons[$name] ?? $icons['code'];

    return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">' . $svg_path . '</svg>';
}
?>

<!-- Services Section -->
<section class="services" id="services">
    <div class="container">
        <header class="section-header reveal">
            <svg class="section-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
            </svg>
            <h2 class="section-title">What I Do</h2>
            <p class="section-subtitle">Three pillars of my services</p>
        </header>

        <div class="services-grid">
            <?php foreach ($services as $index => $service): ?>
            <div class="service-card" data-service="<?php echo esc_attr($service['icon']); ?>">
                <div class="service-icon-wrapper">
                    <?php echo stratos_one_get_service_icon($service['icon']); ?>
                </div>

                <h3 class="service-card-title"><?php echo esc_html($service['title']); ?></h3>
                <p class="service-card-text"><?php echo esc_html($service['description']); ?></p>

                <div class="service-microcopy">
                    <div class="microcopy-item">
                        <span class="microcopy-label">For whom?</span>
                        <span class="microcopy-text"><?php echo esc_html($service['for_whom']); ?></span>
                    </div>
                    <div class="microcopy-item">
                        <span class="microcopy-label">I solve</span>
                        <span class="microcopy-text"><?php echo esc_html($service['solves']); ?></span>
                    </div>
                </div>

                <?php if (!empty($service['features'])): ?>
                <ul class="service-features">
                    <?php foreach ($service['features'] as $feature): ?>
                        <?php if (!empty($feature)): ?>
                        <li><?php echo esc_html($feature); ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <?php if (!empty($service['tech']) && $service['tech'][0] !== ''): ?>
                <div class="service-tech">
                    <?php foreach ($service['tech'] as $tech): ?>
                        <?php if (!empty($tech)): ?>
                        <span class="tech-badge"><?php echo esc_html($tech); ?></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <?php if (!empty($service['outcomes'])): ?>
                <div class="service-outcomes">
                    <?php foreach ($service['outcomes'] as $outcome): ?>
                    <span class="outcome-tag">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                        <?php echo esc_html($outcome); ?>
                    </span>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <button class="service-card-toggle" aria-label="Toggle service details" aria-expanded="false" type="button">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
