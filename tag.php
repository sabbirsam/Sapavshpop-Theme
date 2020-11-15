
<!--php get_template_part('header'); ?>-->
<!--This section is ok used as view single post accuretly-->
<?php get_header();?>
<div id="content">
    <!-- Blog List -->
    <section class="blog-list blog-list-3 single-post padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="row">
                <h5><i class="primary-color icon-settings"></i> Post Under "<?php single_tag_title(); ?>"</h5>
                <?php
                while( have_posts() ){
                    the_post();
                    ?>
                    <div class="col-md-12">

                        <article>
                            <div class="post-tittle left"> <a href="<?php the_permalink();?>" class="tittle"> <?php the_title();?></a>
                                <!-- Post Info -->
                                <span><i class="primary-color icon-user"></i> by <?php the_author_posts_link(); ?></span>
                                <span><i class="primary-color icon-calendar"></i> <?php echo get_the_date();?></span>
                                <span><i class="primary-color icon-bubble"></i> <?php echo get_comments_number($post->ID);?></span>
                                <span><i class="primary-color icon-tag"></i><?php echo get_the_tag_list(" "," "," ");?>
                            </span>
                            </div>
                        </article>

                    </div>

                <?php
                }
                ?>

            </div>
            <ul class="pagination active ">
                <?php echo sapavshop_custom_pagination();?>

            </ul>
        </div>
    </section>>
</div>
<!-- Culture BLOCK -->
<?php get_footer();?>

