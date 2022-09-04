
        <?php
            $trending = get_categorized_posts('trending',3);
            if ($trending->have_posts()) :
        ?>
        <div class="container">
            <h1 class="section-title">Trending Now</h1>
        </div>
        <div class="trending-posts-section">
            <div class="container">
                <div class="trending-posts-wrapper">
                    <?php
                        while ($trending->have_posts()) : $trending->the_post();
                    ?>
                    <div class="trending-post-item" style="background-image: url(<?=get_the_post_thumbnail_url();?>);background-size: cover">
                        <div class="trending-post-content">
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