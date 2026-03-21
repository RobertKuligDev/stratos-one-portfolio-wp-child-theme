<?php
/**
 * Hero section template part
 *
 * Premium hero with headline, tech stack, CTA buttons and architecture diagram.
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

?>
<!-- Hero Section -->
<section class="hero" id="hero" aria-label="Hero section">
    <div class="container">
        <div class="hero-content">
            
            <!-- Left Column: Text Content -->
            <div class="hero-text">
                <h1 class="hero-headline">
                    Production-Grade .NET + Angular Applications
                </h1>
                <p class="hero-subheadline">
                    I design backend, frontend and infrastructure that are fast, scalable and ready for real traffic.
                </p>
                
                <div class="hero-tech-stack" aria-label="Technologies">
                    <span class="tech-badge">.NET</span>
                    <span class="tech-badge">Angular</span>
                    <span class="tech-badge">TypeScript</span>
                    <span class="tech-badge">Docker</span>
                    <span class="tech-badge">Traefik</span>
                    <span class="tech-badge">SQL</span>
                    <span class="tech-badge">API</span>
                </div>
                
                <div class="hero-cta">
                    <a href="#projects" class="btn btn-primary">
                        View Projects
                    </a>
                    <a href="#contact" class="btn btn-secondary">
                        Contact Me
                    </a>
                    <!-- Mobile only: View Architecture button -->
                    <a href="#architecture" class="btn btn-secondary btn-architecture">
                        View Architecture
                    </a>
                </div>
            </div>
            
            <!-- Right Column: Architecture Diagram -->
            <div class="hero-visual">
                <div class="diagram-container">
                    <span class="diagram-label">Architecture Diagram</span>
                    <svg class="hero-diagram" viewBox="0 0 600 450" xmlns="http://www.w3.org/2000/svg" aria-label="Architecture diagram .NET API Angular Docker Traefik Database">
                        <!-- Cloudflare -->
                        <rect x="225" y="10" width="150" height="50" rx="8" fill="#F38020"/>
                        <text x="300" y="35" text-anchor="middle" fill="white" font-size="13" font-weight="600">Cloudflare</text>
                        <text x="300" y="50" text-anchor="middle" fill="white" font-size="10">DNS / SSL</text>

                        <!-- Arrow down -->
                        <line x1="300" y1="60" x2="300" y2="80" stroke="#4da6ff" stroke-width="2" marker-end="url(#arrow)"/>

                        <!-- Traefik -->
                        <rect x="225" y="80" width="150" height="60" rx="8" fill="#56B881"/>
                        <text x="300" y="105" text-anchor="middle" fill="white" font-size="14" font-weight="600">Traefik</text>
                        <text x="300" y="125" text-anchor="middle" fill="white" font-size="10">Reverse Proxy / SSL</text>

                        <!-- Arrow down -->
                        <line x1="300" y1="140" x2="300" y2="160" stroke="#4da6ff" stroke-width="2" marker-end="url(#arrow)"/>

                        <!-- Docker Container Border -->
                        <rect x="30" y="170" width="540" height="180" rx="12" fill="none" stroke="#2496ED" stroke-width="2" stroke-dasharray="8,4"/>
                        <text x="50" y="190" fill="#2496ED" font-size="11" font-weight="600">DOCKER CONTAINERS</text>

                        <!-- Angular -->
                        <rect x="60" y="210" width="140" height="70" rx="8" fill="#DD0031"/>
                        <text x="130" y="240" text-anchor="middle" fill="white" font-size="14" font-weight="600">Angular</text>
                        <text x="130" y="260" text-anchor="middle" fill="white" font-size="10">SPA Frontend</text>

                        <!-- .NET API -->
                        <rect x="230" y="210" width="140" height="70" rx="8" fill="#512BD4"/>
                        <text x="300" y="240" text-anchor="middle" fill="white" font-size="14" font-weight="600">.NET API</text>
                        <text x="300" y="260" text-anchor="middle" fill="white" font-size="10">C# Backend</text>

                        <!-- Other Apps -->
                        <rect x="400" y="210" width="140" height="70" rx="8" fill="#21759B"/>
                        <text x="470" y="240" text-anchor="middle" fill="white" font-size="14" font-weight="600">WordPress</text>
                        <text x="470" y="260" text-anchor="middle" fill="white" font-size="10">Other Apps</text>

                        <!-- Bidirectional arrow between Angular and .NET -->
                        <line x1="200" y1="245" x2="230" y2="245" stroke="#4da6ff" stroke-width="2" marker-end="url(#arrow-small)"/>
                        <line x1="230" y1="255" x2="200" y2="255" stroke="#4da6ff" stroke-width="2" marker-end="url(#arrow-small)"/>
                        <text x="215" y="238" text-anchor="middle" fill="#4da6ff" font-size="9">REST</text>

                        <!-- Arrow .NET to DB -->
                        <line x1="300" y1="280" x2="300" y2="310" stroke="#4da6ff" stroke-width="2" marker-end="url(#arrow)"/>

                        <!-- SQL DB -->
                        <rect x="230" y="310" width="140" height="60" rx="8" fill="#0075C9"/>
                        <text x="300" y="335" text-anchor="middle" fill="white" font-size="14" font-weight="600">SQL DB</text>
                        <text x="300" y="355" text-anchor="middle" fill="white" font-size="10">PostgreSQL</text>

                        <defs>
                            <marker id="arrow" markerWidth="12" markerHeight="12" refX="10" refY="6" orient="auto">
                                <path d="M0,0 L0,12 L12,6 z" fill="#4da6ff"/>
                            </marker>
                            <marker id="arrow-small" markerWidth="8" markerHeight="8" refX="7" refY="4" orient="auto">
                                <path d="M0,0 L0,8 L8,4 z" fill="#4da6ff"/>
                            </marker>
                        </defs>
                    </svg>
                    <button class="diagram-zoom-btn" aria-label="Click to view diagram in full size" type="button">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <circle cx="11" cy="11" r="8"/>
                            <path d="M21 21l-4.35-4.35"/>
                            <path d="M11 8v6M8 11h6"/>
                        </svg>
                        <span class="diagram-zoom-text">Click to view details</span>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</section>
