<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="M_Adnan">
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


    <!-- LOADER -->
    <div id="loader">
        <div class="position-center-center">
            <div class="ldr"></div>
        </div>

    </div>

    <!-- Wrap -->
    <div id="wrap">

        <!-- header -->
        <header>
            <div class="sticky">

                <div class="container">

                    <!-- Logo -->
                    <?php
                    if (current_theme_supports("custom-logo")):
                    ?>
                    <div class="logo">
                        <a href="index.html">
                            <?php the_custom_logo();?>
                        </a>
                    </div>
                    <?php
                    endif;
                    ?>

                    <nav class="navbar ownmenu">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"><i class="fa fa-navicon"></i></span> </button>
                        </div>

                        <!-- NAV top menu -->

                        <?php get_template_part("template-parts/header-section/navigation"); ?>
                        <!-- Nav Right top menu-->
                        <?php get_template_part("template-parts/header-section/navigation-right"); ?>

                    </nav>
                </div>

            </div>
        </header>

        <!--======= SUB BANNER =========-->
        <?php get_template_part("hero");?>

</html>