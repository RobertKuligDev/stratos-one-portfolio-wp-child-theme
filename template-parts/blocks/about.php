<?php
/**
 * About section template part
 *
 * About me with photo
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

?>
<!-- About Section -->
<section class="about-section" id="about">
    <div class="container">
        <div class="about-grid">
            
            <!-- Left Column: Text Content -->
            <div class="about-text">
                <h2 class="about-title">About Me</h2>
                
                <!-- Always visible: First paragraph (hook) -->
                <p class="about-paragraph about-paragraph--intro">
                    I'm a full-stack engineer and system architect specializing in production-grade .NET + Angular applications, e-commerce platforms, API integrations and infrastructure. I design and build complete systems — backend, frontend and DevOps — with a strong focus on performance, reliability and maintainability.
                </p>
                
                <!-- Hidden on mobile, visible on desktop -->
                <div class="about-details">
                    <p class="about-paragraph">
                        I combine engineering discipline with a product mindset. That means I don't just write code — I design architectures, automate deployments, optimize environments and ensure that the systems I build can handle real traffic and real business needs.
                    </p>
                    <p class="about-paragraph">
                        Alongside my core engineering work, I also build custom WordPress themes as a fast, lightweight solution for landing pages, portfolios and API-driven sites. This portfolio itself runs on Stratos One, my own theme built entirely from scratch.
                    </p>
                    
                    <h3 class="about-subtitle">What I bring to a project</h3>
                    <ul class="about-list">
                        <li>end-to-end ownership: backend, frontend, DevOps</li>
                        <li>clean architecture and scalable system design</li>
                        <li>production-ready infrastructure (Docker, Traefik, CI/CD)</li>
                        <li>API integrations and automation</li>
                        <li>custom WordPress development without page builders</li>
                        <li>a pragmatic, engineering-first approach to problem solving</li>
                    </ul>
                </div>
                
                <!-- Mobile toggle button -->
                <button class="about-toggle" type="button" aria-label="Read more about me" aria-expanded="false">
                    <span class="about-toggle-text">Read More</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>
            </div>
            
            <!-- Right Column: Photo with Parallax -->
            <div class="about-photo">
                <div class="about-photo-wrapper">
                    <figure class="about-image">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/site_robert.png'); ?>" alt="Robert Kulig - Software Architect" loading="lazy" data-parallax />
                    </figure>
                    <div class="about-photo-glow"></div>
                </div>
            </div>
            
        </div>
    </div>
</section>
