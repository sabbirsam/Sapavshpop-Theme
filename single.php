

<!--php get_template_part('header'); ?>-->
<!--This section is ok used as view single post accuretly-->
<?php get_header();?>
<div id="content">

    <!-- Blog List -->
    <section class="blog-list blog-list-3 single-post padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="row">
                <?php
                while (have_posts()){
                    the_post();
                    ?>
                    <div class="col-md-9">

                        <!-- Article -->
                        <article>
                            <!-- Post Img -->
                            <?php
                            if(has_post_thumbnail()){
                                the_post_thumbnail("large", array("class"=>"img-responsive"));
                            }
                            ?>


                            <!-- Tittle -->
                            <div class="post-tittle left"> <a href="" class="tittle"> <?php the_title();?></a>

                                <!-- Post Info -->
                                <span><i class="primary-color icon-user"></i> by <?php the_author_posts_link(); ?></span>
                                <span><i class="primary-color icon-calendar"></i> <?php echo get_the_date();?></span>
                                <span><i class="primary-color icon-bubble"></i> <?php echo get_comments_number($post->ID);?></span>
                                <span><i class="primary-color icon-tag"></i><?php echo get_the_tag_list(" "," "," ");?>
                            </span>
                            </div>


                            <!-- Post Content -->
                            <div class="text-left">
                                <div class="text-left">
                                    <p>
                                        <?php

                                        the_content();
                                        wp_link_pages();

                                        ?>

                                    </p>
                                    <a href="http://localhost/sapavshop_check/" class="red-more">HOME</a>
                                </div>
                            </div>
                            <!-- Tags -->
                            <div class="row margin-top-50">
                                <div class="col-md-8">
                                    <h5 class="shop-tittle">PRODUCT TAGS</h5>
                                    <ul class="shop-tags padding-left-15">
                                        <?php echo get_the_tag_list(" "," "," ");?>
                                    </ul>
                                </div>

                                <!-- Share With -->
                                <div class="col-md-4">
                                    <h5 class="shop-tittle">share with</h5>
                                    <ul class="share-post">
                                        <li><a href="#."><i class="icon-social-facebook"></i> Facebook</a></li>
                                        <li><a href="#."><i class="icon-social-twitter"></i> twitter</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- ADMIN info -->
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

                            <!--=======  COMMENTS =========-->
                            <?php if(comments_open()): ?>
                            <div class="comments margin-top-80">
                                <ul class="media-list padding-left-15">
                                    <!--=======  COMMENTS =========-->
                                    <li class="media-body">
                                        <?php
                                        comments_template();
                                        ?>
                                    </li>
                                    <?php endif ;?>
                                    <!--=======  COMMENTS =========-->

                                </ul>
                                <hr>

                                <!--=======  LEAVE COMMENTS =========-->
                                <h5 class="shop-tittle margin-top-80">POST YOUR COMMENTS</h5>
                                <form class="padding-left-15">
                                    <ul class="row">
                                        <li class="col-sm-4">
                                            <label>Name
                                                <input type="text" class="form-control" name="name" placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-sm-4">
                                            <label>Email
                                                <input type="text" class="form-control" name="name" placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-sm-4">
                                            <label>Subject
                                                <input type="text" class="form-control" name="name" placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-sm-12">
                                            <label>COMMENTS
                                                <textarea class="form-control" placeholder=""></textarea>
                                            </label>
                                        </li>
                                        <li class="col-sm-12">
                                            <button type="submit" class="btn margin-top-30">Submit Comment </button>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                    </div>
                    </article>
                    <?php
                }
                ?>
                <!--                ----------------------------heere-->

                <div class="col-md-3">
                    <div class="shop-sidebar">

                        <?php
                        is_active_sidebar("right-sidebar-1"){
                        dynamic_sidebar("right-sidebar-1")
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
</div>
</div>


</div>
</div>
</section>

<!-- Culture BLOCK -->


<!-- News Letter -->
<section class="news-letter padding-top-150 padding-bottom-150">
    <div class="container">
        <div class="heading light-head text-center margin-bottom-30">
            <h4>NEWSLETTER</h4>
            <span>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsumien lacus, eu posuere odi </span> </div>
        <form>
            <input type="email" placeholder="Enter your email address" required>
            <button type="submit">SEND ME</button>
        </form>
    </div>
</section>
</div>


<?php get_footer();?>