<?php get_header(); ?>
<body <?php body_class(); ?>>


    <div class="posts">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <div <?php post_class(); ?>>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h2 class="post-title text-center">
                                <?php the_title(); ?>
                            </h2>
                            <p class="text-center">
                                <em><?php the_author(); ?></em><br/>
                                <?php echo get_the_date(); ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <p>
                                <?php
                                if(has_post_thumbnail()) {
                                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                    echo '<a href="' . $featured_img_url . '" data-featherlight="image">';
                                    the_post_thumbnail("large", array("class" => "img-responsive"));
                                    echo '</a>';
                                }

                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        ?>

        <div class="container post-pagination">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <?php
                    the_posts_pagination( array(
                        "screen_reader_text" => ' ',
                        "prev_text"          => "New Posts",
                        "next_text"          => "Old Posts"
                    ) );
                    ?>
                </div>
            </div>
        </div>
    </div>


<?php get_footer(); ?>