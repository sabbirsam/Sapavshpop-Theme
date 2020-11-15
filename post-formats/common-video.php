<div class="row">
    <div class="col-sm-5">
        <!-- Post Img -->

        <?php
        if(has_post_thumbnail()) {
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            echo '<a href="' . $featured_img_url . '" data-featherlight="image">';
            the_post_thumbnail("large", array("class" => "img-responsive"));
            echo '</a>';
        }

        ?>
<!--        this is the reason -->
        <span class="dashicons dashicons-video-alt3"></span>

    </div>
    <div class="col-sm-7">
        <!-- Tittle -->
        <div class="post-tittle left"> <a href="<?php the_permalink();?>" class="tittle">
                <?php the_title();?>
            </a>
            <!-- Post Info -->

            <span><i class="primary-color icon-user"></i> by <?php the_author_posts_link(); ?></span>
            <span><i class="primary-color icon-calendar"></i> <?php echo get_the_date();?></span>
            <span><i class="primary-color icon-bubble"></i> <?php echo get_comments_number($post->ID);?></span>
            <span><i class="primary-color icon-tag"></i>
                <!--taglist-->
                                                <?php echo get_the_tag_list(" "," "," ");?>

                                                <!--taglist-->
                                            </span>
        </div>
        <!-- Post Content -->
        <div class="text-left">
            <p>
                <?php
                the_excerpt();

                ?>

            </p>
            <!--<a href="#" class="red-more"></a> -->
        </div>
    </div>
</div>