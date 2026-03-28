<?php
/**
 * Hero section template part
 *
 * Premium enterprise hero with headline, tech stack, CTA buttons and architecture diagram.
 *
 * @package Stratos_One_Portfolio
 * @version 1.1.0
 */

if (!defined('ABSPATH')) {
    exit;
}

$tech_stack_raw = get_option('hero_tech_stack', '.NET, Angular, TypeScript, Docker, Traefik, SQL, API');
$tech_stack = array_map('trim', explode(',', $tech_stack_raw));
?>
<!-- Hero Section -->
<section class="hero" id="hero" aria-label="Hero section">
    <div class="container">
        <div class="hero-content">

            <!-- Left Column: Text Content -->
            <div class="hero-text">
                <div class="hero-eyebrow">
                    <span>Full-Stack Architect</span>
                </div>
                
                <h1 class="hero-headline">
                    Production-Grade .NET + Angular Applications
                </h1>
                
                <p class="hero-subheadline">
                    I design backend, frontend and infrastructure that are fast, scalable and ready for real traffic.
                </p>

                <?php if (!empty($tech_stack) && $tech_stack[0] !== ''): ?>
                <div class="hero-tech-stack" aria-label="<?php esc_attr_e('Technologies', 'stratos-one'); ?>">
                    <?php foreach ($tech_stack as $tech): ?>
                        <?php if (!empty($tech)): ?>
                        <span class="tech-badge"><?php echo esc_html($tech); ?></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <div class="hero-cta">
                    <a href="#projects" class="btn btn-primary">
                        View Projects
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="#contact" class="btn btn-secondary">
                        Contact Me
                    </a>
                    <!-- Mobile only: View Architecture button -->
                    <button class="btn btn-secondary btn-architecture stratos-modal-trigger"
                            type="button"
                            data-type="inline"
                            data-title="Architecture Diagram"
                            data-content-ref="#modal-diagram">
                        View Architecture
                    </button>
                </div>
            </div>

            <!-- Right Column: Architecture Diagram -->
            <div class="hero-visual">
                <div class="diagram-container stratos-modal-trigger"
                     role="button"
                     tabindex="0"
                     aria-label="Architecture diagram. Click to enlarge."
                     data-type="inline"
                     data-title="Architecture Diagram"
                     data-content-ref="#modal-diagram">

                    <!-- SVG Diagram -->
                    <svg class="hero-diagram" viewBox="0 0 600 450" xmlns="http://www.w3.org/2000/svg" aria-label="Architecture diagram .NET API Angular Docker Traefik Database">

                        <!-- Cloudflare -->
                        <rect x="225" y="10" width="150" height="50" rx="8" fill="#F38020"/>
                        <text x="300" y="35" text-anchor="middle" fill="white" font-size="13" font-weight="600">Cloudflare</text>
                        <text x="300" y="50" text-anchor="middle" fill="white" font-size="10">DNS / SSL</text>

                        <!-- Arrow down (Cloudflare → Traefik) -->
                        <line class="arrow-line" x1="300" y1="60" x2="300" y2="80" stroke="#4da6ff" stroke-width="2" marker-end="url(#arrow)"/>

                        <!-- Traefik -->
                        <rect x="225" y="80" width="150" height="60" rx="8" fill="#56B881"/>
                        <text x="300" y="105" text-anchor="middle" fill="white" font-size="14" font-weight="600">Traefik</text>
                        <text x="300" y="125" text-anchor="middle" fill="white" font-size="10">Reverse Proxy / SSL</text>

                        <!-- Arrow down (Traefik → Docker) -->
                        <line class="arrow-line" x1="300" y1="140" x2="300" y2="160" stroke="#4da6ff" stroke-width="2" marker-end="url(#arrow)"/>

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

                        <!-- Bidirectional arrow between Angular and .NET (REST) -->
                        <line class="arrow-line" x1="200" y1="245" x2="230" y2="245" stroke="#4da6ff" stroke-width="2" marker-end="url(#arrow-small)"/>
                        <line class="arrow-line" x1="230" y1="255" x2="200" y2="255" stroke="#4da6ff" stroke-width="2" marker-end="url(#arrow-small)"/>
                        <text x="215" y="238" text-anchor="middle" fill="#4da6ff" font-size="9">REST</text>

                        <!-- Arrow down (.NET → SQL DB) -->
                        <line class="arrow-line" x1="300" y1="280" x2="300" y2="310" stroke="#4da6ff" stroke-width="2" marker-end="url(#arrow)"/>

                        <!-- SQL DB -->
                        <rect x="230" y="310" width="140" height="60" rx="8" fill="#0075C9"/>
                        <text x="300" y="335" text-anchor="middle" fill="white" font-size="14" font-weight="600">SQL DB</text>
                        <text x="300" y="355" text-anchor="middle" fill="white" font-size="10">PostgreSQL</text>

                        <!-- Markers - MUST BE AT END like robert-portfolio -->
                        <defs>
                            <marker id="arrow" markerWidth="12" markerHeight="12" refX="10" refY="6" orient="auto">
                                <path d="M0,0 L0,12 L12,6 z" fill="#4da6ff"/>
                            </marker>
                            <marker id="arrow-small" markerWidth="8" markerHeight="8" refX="7" refY="4" orient="auto">
                                <path d="M0,0 L0,8 L8,4 z" fill="#4da6ff"/>
                            </marker>
                        </defs>
                    </svg>

                    <!-- Zoom Button -->
                    <button class="diagram-zoom-btn stratos-modal-trigger"
                            type="button"
                            aria-label="Click to view diagram in full size"
                            data-type="inline"
                            data-title="Architecture Diagram"
                            data-content-ref="#modal-diagram">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14zM12.5 10H11V8.5h1.5V10h1.5v1.5H12.5V13H11v-1.5H9.5V10h3z"/>
                        </svg>
                    </button>

                    <!-- Tooltip - Also clickable -->
                    <span class="diagram-tooltip stratos-modal-trigger"
                          data-type="inline"
                          data-title="Architecture Diagram"
                          data-content-ref="#modal-diagram">Click to enlarge</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Hidden Modal Content for StratosModal -->
<div id="modal-diagram" style="display:none;">
    <div class="modal-diagram-wrapper">
        <svg class="modal-hero-diagram" viewBox="0 0 600 450" xmlns="http://www.w3.org/2000/svg" aria-label="Architecture diagram .NET API Angular Docker Traefik Database">

            <!-- Cloudflare -->
            <rect x="225" y="10" width="150" height="50" rx="8" fill="#F38020"/>
            <text x="300" y="35" text-anchor="middle" fill="white" font-size="13" font-weight="600">Cloudflare</text>
            <text x="300" y="50" text-anchor="middle" fill="white" font-size="10">DNS / SSL</text>

            <!-- Arrow down (Cloudflare → Traefik) -->
            <line class="arrow-line" x1="300" y1="60" x2="300" y2="80" stroke="#4da6ff" stroke-width="2" marker-end="url(#arrow)"/>

            <!-- Traefik -->
            <rect x="225" y="80" width="150" height="60" rx="8" fill="#56B881"/>
            <text x="300" y="105" text-anchor="middle" fill="white" font-size="14" font-weight="600">Traefik</text>
            <text x="300" y="125" text-anchor="middle" fill="white" font-size="10">Reverse Proxy / SSL</text>

            <!-- Arrow down (Traefik → Docker) -->
            <line class="arrow-line" x1="300" y1="140" x2="300" y2="160" stroke="#4da6ff" stroke-width="2" marker-end="url(#arrow)"/>

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

            <!-- Bidirectional arrow between Angular and .NET (REST) -->
            <line class="arrow-line" x1="200" y1="245" x2="230" y2="245" stroke="#4da6ff" stroke-width="2" marker-end="url(#arrow-small)"/>
            <line class="arrow-line" x1="230" y1="255" x2="200" y2="255" stroke="#4da6ff" stroke-width="2" marker-end="url(#arrow-small)"/>
            <text x="215" y="238" text-anchor="middle" fill="#4da6ff" font-size="9">REST</text>

            <!-- Arrow down (.NET → SQL DB) -->
            <line class="arrow-line" x1="300" y1="280" x2="300" y2="310" stroke="#4da6ff" stroke-width="2" marker-end="url(#arrow)"/>

            <!-- SQL DB -->
            <rect x="230" y="310" width="140" height="60" rx="8" fill="#0075C9"/>
            <text x="300" y="335" text-anchor="middle" fill="white" font-size="14" font-weight="600">SQL DB</text>
            <text x="300" y="355" text-anchor="middle" fill="white" font-size="10">PostgreSQL</text>

            <!-- Markers - MUST BE AT END like robert-portfolio -->
            <defs>
                <marker id="arrow" markerWidth="12" markerHeight="12" refX="10" refY="6" orient="auto">
                    <path d="M0,0 L0,12 L12,6 z" fill="#4da6ff"/>
                </marker>
                <marker id="arrow-small" markerWidth="8" markerHeight="8" refX="7" refY="4" orient="auto">
                    <path d="M0,0 L0,8 L8,4 z" fill="#4da6ff"/>
                </marker>
            </defs>
        </svg>
    </div>
</div>
