
<?php
$sapavshop_layout_class = "col-md-9";
if( !is_active_sidebar("right-sidebar-1") ){
    $sapavshop_layout_class= "col-md-12";
}
?>


<?php get_header();?>


    <div id="content">

        <!-- Blog List -->
        <section class="blog-list blog-list-3 padding-top-100 padding-bottom-100 <?php post_class(); ?>">
            <div class="container">
                <div class="row">

                    <div class="<?php echo $sapavshop_layout_class?>">
                        <!-- Article -->
                        <article>
                            <?php

                            while(have_posts()){
                                the_post();
                                get_template_part("post-formats/common",get_post_format());
                            }
                            ?>

                        </article>

                        <ul class="pagination active ">
                            <?php echo sapavshop_custom_pagination();?>

                        </ul>
                    </div>

                <!--sidebar here-->
                    <?php if( is_active_sidebar("right-sidebar-1")):
                    ?>
                        <?php get_template_part("template-parts/sidebar/sidebar")?>
                    <?php endif;?>
                <!--sidebar End here -->
                </div>
            </div>
        </section>
        <!-- Culture BLOCK -->

    </div>
<?php get_footer();?>