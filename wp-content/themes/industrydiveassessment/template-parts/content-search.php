<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IndustryDiveAssessment
 */

?>

<div class="latest-post-item"
         style="background-image: url(<?= get_the_post_thumbnail_url(); ?>);background-size: cover">
        <div class="trending-post-content">
            <ul class="posts-cat">
                <?php
                $term_lists = get_the_terms(get_the_ID(), 'category');
                if (is_array($term_lists)) :
                    foreach (get_the_terms(get_the_ID(), 'category') as $term):
                        ?>
                        <li><a href="<?= get_term_link($term->slug, 'category') ?>"><?php
                                echo $term->name; ?></a></li>
                    <?php

                    endforeach;
                endif;
                ?>
            </ul>
            <h1><?= get_the_title(); ?></h1>
            <div class="readtime-link">
                <p><?= reading_time(get_the_ID()) ?> Min Read</p>
                <a href="<?= get_the_permalink(); ?>">Read More <i
                            class="fa-solid fa-arrow-right-long"></i></a>
            </div>
        </div>
    </div>
