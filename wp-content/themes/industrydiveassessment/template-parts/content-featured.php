
        <?php
            $featured = get_categorized_posts('featured',3);
            if ($featured->have_posts()) :
        ?>
        <div class="featured-posts-section">
            <div class="container">
                <div class="featured-posts-wrapper">
                    <?php
                        while ($featured->have_posts()) : $featured->the_post();
                    ?>
                    <div class="featured-post-item" style="background-image: url(<?=get_the_post_thumbnail_url();?>);background-size: cover">
                        <div class="featured-post-content">
                            <ul class="posts-cat">
                                <?php
                                    $term_lists = get_the_terms(get_the_ID(),'category');
                                    if (is_array($term_lists)) :
                                    foreach (get_the_terms(get_the_ID(),'category') as $term):
                                ?>
                                <li><a href="<?=get_term_link($term->slug,'category')?>"><?php echo $term->name; ?></a></li>
                                <?php

                                    endforeach;
                                    endif;
                                ?>
                            </ul>
                            <h1><?php echo get_the_title();?></h1>
                            <div class="readtime-link">
                                <p><?=reading_time(get_the_ID())?> Min Read</p>
                                <a href="<?=get_the_permalink();?>">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <?php endif; ?>