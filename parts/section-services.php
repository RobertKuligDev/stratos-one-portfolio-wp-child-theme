<?php
/**
 * What I Do section template part
 *
 * Services grid with 3 cards - clean engineering-focused layout
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

?>
<!-- Services Section -->
<section class="services" id="services">
    <div class="container">
        <header class="section-header">
            <h2 class="section-title">What I Do</h2>
            <p class="section-subtitle">Three pillars of my services</p>
        </header>

        <div class="services-grid">

            <!-- Card 1: Backend Architecture -->
            <div class="service-card" data-service="backend">
                <div class="service-icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <path d="M3 9h18"/>
                        <path d="M9 21V9"/>
                    </svg>
                </div>

                <h3 class="service-card-title">Backend Architecture</h3>
                <p class="service-card-text">
                    I design scalable, maintainable backend systems using .NET, clean architecture and domain-driven design.
                </p>

                <ul class="service-features">
                    <li>.NET API & backend logic</li>
                    <li>Clean architecture & DDD</li>
                    <li>Database design (SQL/NoSQL)</li>
                    <li>Caching & performance optimization</li>
                    <li>Security & authentication</li>
                </ul>

                <div class="service-tech" aria-label="Technologies">
                    <span class="tech-badge">.NET</span>
                    <span class="tech-badge">C#</span>
                    <span class="tech-badge">SQL</span>
                    <span class="tech-badge">Redis</span>
                    <span class="tech-badge">RabbitMQ</span>
                </div>

                <button class="service-card-toggle" aria-label="Toggle service details" aria-expanded="false" type="button">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>
            </div>

            <!-- Card 2: Frontend Engineering -->
            <div class="service-card" data-service="frontend">
                <div class="service-icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1m15.5-6.5l-4.5 4.5m-4 4L7.5 16.5"/>
                    </svg>
                </div>

                <h3 class="service-card-title">Frontend Engineering</h3>
                <p class="service-card-text">
                    I build fast, responsive and production-ready Angular applications with modular architecture.
                </p>

                <ul class="service-features">
                    <li>Angular SPA applications</li>
                    <li>Component-based architecture</li>
                    <li>State management (NgRx)</li>
                    <li>Performance optimization</li>
                    <li>Accessibility (WCAG 2.1)</li>
                </ul>

                <div class="service-tech" aria-label="Technologies">
                    <span class="tech-badge">Angular</span>
                    <span class="tech-badge">TypeScript</span>
                    <span class="tech-badge">RxJS</span>
                    <span class="tech-badge">NgRx</span>
                    <span class="tech-badge">SCSS</span>
                </div>

                <button class="service-card-toggle" aria-label="Toggle service details" aria-expanded="false" type="button">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>
            </div>

            <!-- Card 3: DevOps & Infrastructure -->
            <div class="service-card" data-service="devops">
                <div class="service-icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                        <path d="M2 17l10 5 10-5"/>
                        <path d="M2 12l10 5 10-5"/>
                    </svg>
                </div>

                <h3 class="service-card-title">DevOps & Infrastructure</h3>
                <p class="service-card-text">
                    I create Docker-based environments, CI/CD pipelines and production-grade deployments.
                </p>

                <ul class="service-features">
                    <li>Docker containerization</li>
                    <li>CI/CD pipelines (GitHub Actions)</li>
                    <li>Traefik reverse proxy</li>
                    <li>Linux server management</li>
                    <li>Monitoring & logging</li>
                </ul>

                <div class="service-tech" aria-label="Technologies">
                    <span class="tech-badge">Docker</span>
                    <span class="tech-badge">Traefik</span>
                    <span class="tech-badge">Linux</span>
                    <span class="tech-badge">GitHub Actions</span>
                    <span class="tech-badge">Cloudflare</span>
                </div>

                <button class="service-card-toggle" aria-label="Toggle service details" aria-expanded="false" type="button">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>
</section>
