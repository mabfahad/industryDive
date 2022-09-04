<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IndustryDiveAssessment
 */

get_header();
?>

    <main id="primary" class="site-main">

        <?php
        if (have_posts()) : ?>
            <div class="latest-posts-section">
                <div class="container">
                    <div class="latest-posts-wrapper">
                        <?php
                        while (have_posts()) : the_post();
                            get_template_part('template-parts/content',get_post_type());
                            ?>

                        <?php
                        endwhile; ?>
                    </div>
                </div>
            </div>
        <?php

        else :

            get_template_part('template-parts/content', 'none');

        endif;
        ?>

    </main><!-- #main -->

<?php
get_footer();
