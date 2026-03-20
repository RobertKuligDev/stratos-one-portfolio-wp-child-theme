<?php
/**
 * Contact pattern
 *
 * @package Stratos_One_Portfolio
 */

return [
    'title'      => __('Contact (Portfolio)', 'stratos-one-portfolio'),
    'categories' => ['stratos-one'],
    'content'    => <<<'HTML'
<!-- wp:group {"className":"contact-section wrapper contact-section--premium"} -->
<div class="wp-block-group contact-section wrapper contact-section--premium">

    <!-- wp:group {"className":"container"} -->
    <div class="wp-block-group container">

        <!-- wp:heading {"level":2,"className":"contact-title contact-title--premium"} -->
        <h2 class="contact-title contact-title--premium">
            Let&#8217;s build something exceptional together
        </h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"className":"contact-subtitle contact-subtitle--premium"} -->
        <p class="contact-subtitle contact-subtitle--premium">
            I architect and deliver production&#8209;grade systems &#8212; from .NET + Angular applications,
            through API integrations, to custom WordPress themes.<br>
            Tell me about your project and I&#8217;ll get back to you within 24 hours.
        </p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"className":"contact-highlights","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
        <div class="wp-block-group contact-highlights">

            <!-- wp:group {"className":"contact-highlight"} -->
            <div class="wp-block-group contact-highlight">
                <!-- wp:heading {"level":3} -->
                <h3>10+ years experience</h3>
                <!-- /wp:heading -->
                <!-- wp:paragraph -->
                <p>Enterprise&#8209;grade engineering, architecture and delivery.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"contact-highlight"} -->
            <div class="wp-block-group contact-highlight">
                <!-- wp:heading {"level":3} -->
                <h3>Production&#8209;ready code</h3>
                <!-- /wp:heading -->
                <!-- wp:paragraph -->
                <p>Clean, maintainable, scalable &#8212; built for long&#8209;term success.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"contact-highlight"} -->
            <div class="wp-block-group contact-highlight">
                <!-- wp:heading {"level":3} -->
                <h3>Clear communication</h3>
                <!-- /wp:heading -->
                <!-- wp:paragraph -->
                <p>Direct, transparent and reliable collaboration.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"contact-form contact-form--premium","layout":{"type":"constrained"}} -->
        <div class="wp-block-group contact-form contact-form--premium">

            <!-- wp:stratos-one/contact /-->

        </div>
        <!-- /wp:group -->

    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->
HTML
];
