
<!--php get_template_part('header'); ?>-->
<!--This section is ok used as view single post accuretly-->
<?php get_header();?>
<div id="content">
    <!-- Blog List -->
    <section class="blog-list blog-list-3 single-post padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="row">
<!--                <h5><i class="primary-color icon-settings"></i> Post Under "--><?php //single_tag_title(); ?><!--"</h5>-->

                <div class="admin-info">
                    <div class="media-left">
                        <div class="admin-pic">
                            <?php echo get_avatar(get_the_author_meta("id"));?>
                        </div>
                    </div>
                    <div class="media-body">
                        <h6>
                            <?php echo get_the_author_meta("display_name"); ?>
                        </h6>
                        <p>
                            <?php echo get_the_author_meta("description");?>
                        </p>
                        <div class="admin-social"> <a href="#."><i class="icon-social-facebook"></i></a> <a href="#."><i class="icon-social-twitter"></i></a> <a href="#."><i class="icon-social-dribbble"></i></a> <a href="#."><i class="icon-envelope"></i></a> </div>
                    </div>
                </div>
                <?php
                while( have_posts() ){
                    the_post();
                    ?>
                    <div class="col-md-12">
                        <article>
                            <div class="post-tittle left"> <a href="<?php the_permalink();?>" class="tittle"> <?php the_title();?></a>
                                <!-- Post Info -->
<!--                                <span><i class="primary-color icon-user"></i> by --><?php //the_author_posts_link(); ?><!--</span>-->
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

