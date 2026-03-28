<?php
/**
 * About section template part
 *
 * Premium showcase with skills, experience and photo
 * Most spectacular section - different from Contact
 *
 * @package Stratos_One_Portfolio
 * @version 3.1.0
 */

if (!defined('ABSPATH')) {
    exit;
}

?>
<!-- About Section -->
<section class="about-section" id="about">
    <div class="container">

        <!-- Section Header with Badge -->
        <header class="section-header reveal">
            <span class="section-badge">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                </svg>
                <?php esc_html_e('About Me', 'stratos-one-portfolio'); ?>
            </span>
            <h2 class="section-title"><?php esc_html_e('Backend-Focused Full-Stack Developer', 'stratos-one-portfolio'); ?></h2>
            <p class="section-subtitle">
                <?php esc_html_e('.NET / Angular specialist building clean, modular, production-grade architectures', 'stratos-one-portfolio'); ?>
            </p>
        </header>

        <div class="about-grid">

            <!-- Left Column: Photo + Timeline -->
            <div class="about-photo-column">
                <div class="about-photo-frame">
                    <div class="about-photo-wrapper">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/site_robert.png'); ?>" alt="Robert Kulig - Software Architect" loading="lazy" class="about-photo" />
                    </div>
                    <!-- Floating Tech Badges -->
                    <div class="tech-badge tech-badge-1" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                        <span>.NET</span>
                    </div>
                    <div class="tech-badge tech-badge-2" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 18l6-6-6-6"/><path d="M8 6l-6 6 6 6"/></svg>
                        <span>Angular</span>
                    </div>
                    <div class="tech-badge tech-badge-3" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M9 9h6m-6 3h6m-6 3h3"/></svg>
                        <span>Docker</span>
                    </div>
                </div>

                <!-- Experience Timeline -->
                <div class="about-timeline">
                    <h3 class="timeline-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                        <span>10+ Years Experience</span>
                    </h3>
                    <div class="timeline-items">
                        <div class="timeline-item">
                            <span class="timeline-year">2014</span>
                            <span class="timeline-dot"></span>
                            <span class="timeline-label">Started</span>
                        </div>
                        <div class="timeline-item">
                            <span class="timeline-year">2018</span>
                            <span class="timeline-dot"></span>
                            <span class="timeline-label">.NET</span>
                        </div>
                        <div class="timeline-item">
                            <span class="timeline-year">2021</span>
                            <span class="timeline-dot"></span>
                            <span class="timeline-label">DevOps</span>
                        </div>
                        <div class="timeline-item">
                            <span class="timeline-year">2025</span>
                            <span class="timeline-dot"></span>
                            <span class="timeline-label">Architect</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Summary + Skills -->
            <div class="about-content">

                <!-- Profile Summary -->
                <div class="about-summary">
                    <p class="about-text">
                        Backend-oriented full-stack developer with strong experience in <strong>.NET</strong>, <strong>REST API design</strong>, <strong>EF Core</strong>, <strong>SQL</strong>, and <strong>Angular</strong>. I build clean, modular, production-grade architectures with predictable data flow and maintainable structure.
                    </p>
                    <p class="about-text">
                        I deliver complete solutions end-to-end: backend, frontend, data layer, and deployment. My experience in automotive manufacturing environments gives me practical understanding of production flow, traceability, and process discipline.
                    </p>
                </div>

                <!-- Skills Grid -->
                <div class="about-skills">
                    <h3 class="skills-title">Key Skills</h3>
                    <div class="skills-grid">
                        <div class="skill-item">
                            <span class="skill-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                            </span>
                            <div>
                                <strong>Backend</strong>
                                <span>C#, .NET 6-8, EF Core, REST APIs, LINQ, Clean Architecture</span>
                            </div>
                        </div>
                        <div class="skill-item">
                            <span class="skill-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 18l6-6-6-6"/><path d="M8 6l-6 6 6 6"/></svg>
                            </span>
                            <div>
                                <strong>Frontend</strong>
                                <span>Angular, TypeScript, RxJS, Reactive Forms, SCSS</span>
                            </div>
                        </div>
                        <div class="skill-item">
                            <span class="skill-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M9 9h6m-6 3h6m-6 3h3"/></svg>
                            </span>
                            <div>
                                <strong>DevOps</strong>
                                <span>Docker, Git, GitHub Actions, CI/CD, Swagger</span>
                            </div>
                        </div>
                        <div class="skill-item">
                            <span class="skill-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M12 1v6m0 6v6m11-7h-6m-6 0H1m15.5-6.5l-4.5 4.5m-4 4L7.5 16.5"/></svg>
                            </span>
                            <div>
                                <strong>Database</strong>
                                <span>SQL Server, PostgreSQL, query optimization, migrations</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- CTA Button (full width, centered under both columns) -->
        <div class="about-cta-full">
            <button class="btn btn-primary stratos-modal-trigger"
                    type="button"
                    data-type="inline"
                    data-title="My Work Environment"
                    data-content-ref="#modal-work-env">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <rect x="4" y="4" width="16" height="16" rx="2"/>
                    <path d="M9 9h6m-6 3h6m-6 3h3"/>
                </svg>
                <span><?php esc_html_e('View my work environment', 'stratos-one-portfolio'); ?></span>
            </button>
        </div>

    </div>
</section>

<!-- Hidden Modal: Work Environment -->
<div id="modal-work-env" style="display:none;">
    <div class="work-env-content">
        <h3 class="work-env-title">My Work Environment</h3>

        <div class="work-env-grid">
            <div class="work-env-item">
                <h4 class="work-env-subtitle">Backend</h4>
                <ul class="work-env-list">
                    <li>.NET 8 / .NET Core</li>
                    <li>C# / ASP.NET Core</li>
                    <li>Entity Framework Core</li>
                    <li>PostgreSQL / SQL Server</li>
                    <li>Redis / RabbitMQ</li>
                </ul>
            </div>

            <div class="work-env-item">
                <h4 class="work-env-subtitle">Frontend</h4>
                <ul class="work-env-list">
                    <li>Angular 17+</li>
                    <li>TypeScript</li>
                    <li>RxJS / NgRx</li>
                    <li>SCSS / Tailwind</li>
                    <li>Web Components</li>
                </ul>
            </div>

            <div class="work-env-item">
                <h4 class="work-env-subtitle">DevOps</h4>
                <ul class="work-env-list">
                    <li>Docker / Docker Compose</li>
                    <li>Traefik / Nginx</li>
                    <li>GitHub Actions / CI/CD</li>
                    <li>Linux / Bash</li>
                    <li>Monitoring / Logging</li>
                </ul>
            </div>

            <div class="work-env-item">
                <h4 class="work-env-subtitle">Tools</h4>
                <ul class="work-env-list">
                    <li>JetBrains Rider / PhpStorm</li>
                    <li>VS Code</li>
                    <li>Git / GitHub</li>
                    <li>Postman / Insomnia</li>
                    <li>Figma / Excalidraw</li>
                </ul>
            </div>
        </div>
    </div>
</div>
