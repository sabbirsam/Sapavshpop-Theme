<?php
//die(site_url());


if (site_url() == "http://localhost/sapavshop_check") {
    define("VERSION", time());
} else {
    define("VERSION", wp_get_theme()->get("Version"));
}


function sapavshop_theme_setup()
{
    load_theme_textdomain("sapavshop");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    $sapavshop_custom_header_details = array(
        'header-text' => true,
        'default-text-color' => '#222',
    );
    add_theme_support('custom-header', $sapavshop_custom_header_details);

    $sapavshop_custom_header_logo = array(
        'width' => '400',
        'height' => '100',
    );
    add_theme_support("custom-logo", $sapavshop_custom_header_logo);

    add_theme_support("custom-background");

    add_theme_support('html5', array('search-form', 'comment-list', 'gallery', 'caption', 'script', 'style'));
    add_theme_support("post-formats", array('image', 'gallery', 'quote', 'audio', 'video', 'link', 'aside'));
    add_editor_style("/assets/css/editor-style.css");

    //navigation menu
    register_nav_menu("topmenu", __("Top Menu", "sapavshop"));
    register_nav_menu("footermenu", __("Footer Menu", "sapavshop"));

}

add_action("after_setup_theme", "sapavshop_theme_setup");


$args = array(
    'flex-width' => true,
    'width' => 1200,
    'flex-height' => true,
    'height' => 500,
    'default-image' => get_template_directory_uri() . '/assets/images/sub-bnr-bg.jpg',
);
add_theme_support('custom-header', $args);


function sapavshop_menu_itm_class($classes, $item)
{
    $classes[] = "dropdown";
    return $classes;
}

add_filter("nav_menu_css_class", "sapavshop_menu_itm_class", 10, 2);
//2 means 2 ta parameter r 10 is priority


function wpb_add_google_fonts()
{

    wp_enqueue_style('wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700', false);
    wp_enqueue_style('wpb-one-google-fonts', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900', false);
}

add_action('wp_enqueue_scripts', 'wpb_add_google_fonts');


function sapavshop_assets()
{


    wp_enqueue_style("html5shiv_bootstrap", "//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js");
    wp_enqueue_style("respond_min_js_bootstrap", "//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js");

    //    custom css enqueue

    wp_enqueue_style("setting-css", get_theme_file_uri("/assets/rs-plugin/css/settings.css"));
    wp_enqueue_style("bootstrap-min-css", get_theme_file_uri("/assets/css/bootstrap.min.css"));

//this one css lightpop
    wp_enqueue_style('feather-light-css', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css');

    wp_enqueue_style("font-awesome-min-css", get_theme_file_uri("/assets/css/font-awesome.min.css"));
    wp_enqueue_style("ionicons-min-css", get_theme_file_uri("/assets/css/ionicons.min.css"), null, VERSION);
    wp_enqueue_style("main-css", get_theme_file_uri("/assets/css/main.css"), null, VERSION);
    wp_enqueue_style("style-css", get_theme_file_uri("/assets/css/style.css"), null, VERSION);
    wp_enqueue_style("responsive-css", get_theme_file_uri("/assets/css/responsive.css"), null, VERSION);
    wp_enqueue_style("settings-ie8-css", get_theme_file_uri("/assets/rs-plugin/css/settings-ie8.css"), null, VERSION);
    wp_enqueue_style("dashicons");

    //    custom JS enqueue

    wp_enqueue_script("modernizr-js", get_theme_file_uri("/assets/js/modernizr.js", null, VERSION));
    wp_enqueue_script("jquery-js", get_theme_file_uri("/assets/js/jquery-1.11.3.min.js", array("jquery"), 1.0, true));
    wp_enqueue_script("bootstrap-min-js", get_theme_file_uri("/assets/js/bootstrap.min.js", array("jquery"), 1.0, true));
    wp_enqueue_script("jquery-fatNav-min-js", get_theme_file_uri("/assets/js/jquery.fatNav.min.js", array("jquery"), 1.0, true));

    wp_enqueue_script("own-menu-js", get_theme_file_uri("/assets/js/own-menu.js", array("jquery"), 1.0, true));
    wp_enqueue_script("query-lighter-js", get_theme_file_uri("/assets/js/jquery.lighter.js", array("jquery"), 1.0, true));
    wp_enqueue_script("owl-carousel-min-js", get_theme_file_uri("/assets/js/owl.carousel.min.js", array("jquery"), 1.0, true));
    wp_enqueue_script("smooth-scroll-js", get_theme_file_uri("/assets/js/smooth-scroll.js", array("jquery"), 1.0, true));
    wp_enqueue_script("sowl-carousel-min-js", get_theme_file_uri("/assets/js/sowl.carousel.min.js", array("jquery"), 1.0, true));

    wp_enqueue_script("jquery-tp-t-min-javascript", get_theme_file_uri("/assets/rs-plugin/js/jquery.tp.t.min.js", array("jquery"), 1.0, true));
    wp_enqueue_script("jquery-tp-min-javascript", get_theme_file_uri("/assets/rs-plugin/js/jquery.tp.min.js", array("jquery"), 1.0, true));
    wp_enqueue_script("main-javascript", get_theme_file_uri("/assets/js/main.js", array("jquery"), 1.0, true));

//this one for light pop
    wp_enqueue_script('featherlight-js', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js', array('jquery'), '1.0', true);

    wp_enqueue_style("sapavshop-css", get_stylesheet_uri(), null, VERSION);


}

add_action("wp_enqueue_scripts", "sapavshop_assets");


//woocommerce support
function woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action("after_setup_theme", "woocommerce_support");


//woocommerce product per item view code
/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
    function loop_columns()
    {
        return 3;
    }
}


//pagination
function sapavshop_custom_pagination()
{
    global $wp_query;
    $big    = 999999999; // need an unlikely integer
    $pages  = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_next' => false,
        'type' => 'array',
        'prev_next' => true,
        'prev_text' => __('«', 'text-domain'),
        'next_text' => __('»', 'text-domain'),
    ));
    $output = '';

    if (is_array($pages)) {
        $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');

        $output .= '<ul class="pagination">';
        foreach ($pages as $page) {
            $output .= "<li>$page</li>";
        }
        $output .= '</ul>';

        // Create an instance of DOMDocument
        $dom = new \DOMDocument();

        // Populate $dom with $output, making sure to handle UTF-8, otherwise
        // problems will occur with UTF-8 characters.
        $dom->loadHTML(mb_convert_encoding($output, 'HTML-ENTITIES', 'UTF-8'));

        // Create an instance of DOMXpath and all elements with the class 'page-numbers'
        $xpath = new \DOMXpath($dom);

        // http://stackoverflow.com/a/26126336/3059883
        $page_numbers = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' page-numbers ')]");

        // Iterate over the $page_numbers node...
        foreach ($page_numbers as $page_numbers_item) {

            // Add class="mynewclass" to the <li> when its child contains the current item.
            $page_numbers_item_classes = explode(' ', $page_numbers_item->attributes->item(0)->value);
            if (in_array('current', $page_numbers_item_classes)) {
                $list_item_attr_class        = $dom->createAttribute('class');
                $list_item_attr_class->value = 'mynewclass';
                $page_numbers_item->parentNode->appendChild($list_item_attr_class);
            }

            // Replace the class 'current' with 'active'
            $page_numbers_item->attributes->item(0)->value = str_replace(
                'current',
                'active',
                $page_numbers_item->attributes->item(0)->value);

            // Replace the class 'page-numbers' with 'page-link'
            $page_numbers_item->attributes->item(0)->value = str_replace(
                'page-numbers',
                'page-link',
                $page_numbers_item->attributes->item(0)->value);
        }

        // Save the updated HTML and output it.
        $output = $dom->saveHTML();
    }

    return $output;
}

//pagination   now call use :- echo wpse247219_custom_pagination();  End here


//widget area------------------------------------------------------------------------------------------START


function sapavshop_sidebar_one()
{
    register_sidebar(array(
        'name' => __('right Sidebar', 'sapavshop'),
        'id' => 'right-sidebar-1',
        'description' => __('Widgets in this area will be shown on shop page left side.', 'sapavshop'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h5 class="shop-tittle margin-bottom-30">',
        'after_title' => '</h5>',
    ));
}

add_action('widgets_init', 'sapavshop_sidebar_one');

function sapavshop_sidebar_two()
{
    register_sidebar(array(
        'name' => __('footer Sidebar address', 'sapavshop'),
        'id' => 'footer-sidebar-2',
        'description' => __('Widgets in this area will be shown on shop page left side.', 'sapavshop'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h5 class="shop-tittle margin-bottom-30">',
        'after_title' => '</h5>',
    ));
}

add_action('widgets_init', 'sapavshop_sidebar_two');
function sapavshop_sidebar_three()
{
    register_sidebar(array(
        'name' => __('footer Sidebar links', 'sapavshop'),
        'id' => 'footer-sidebar-3',
        'description' => __('Widgets in this area will be shown on shop page left side.', 'sapavshop'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h5 class="shop-tittle margin-bottom-30">',
        'after_title' => '</h5>',
    ));
}

add_action('widgets_init', 'sapavshop_sidebar_three');

function sapavshop_sidebar_four()
{
    register_sidebar(array(
        'name' => __('footer Sidebar myaccount', 'sapavshop'),
        'id' => 'footer-sidebar-4',
        'description' => __('Widgets in this area will be shown on shop page left side.', 'sapavshop'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h5 class="shop-tittle margin-bottom-30">',
        'after_title' => '</h5>',
    ));
}

add_action('widgets_init', 'sapavshop_sidebar_four');


function sapavshop_sidebar_five()
{
    register_sidebar(array(
        'name' => __('footer Sidebar five', 'sapavshop'),
        'id' => 'footer-sidebar-five',
        'description' => __('Widgets in this area will be shown on shop page left side.', 'sapavshop'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h5 class="shop-tittle margin-bottom-30">',
        'after_title' => '</h5>',
    ));
}

add_action('widgets_init', 'sapavshop_sidebar_five');

function sapavshop_sidebar_six()
{
    register_sidebar(array(
        'name' => __('footer Sidebar allright', 'sapavshop'),
        'id' => 'footer-sidebar-allright',
        'description' => __('Footer area will be shown copyright text.', 'sapavshop'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));
}

add_action('widgets_init', 'sapavshop_sidebar_six');


//widget area------------------------------------------------------------------------------------------END

function sapavshop_the_excerpt($excerpt)
{
    if (!post_password_required()) {
        return $excerpt;
    } else {
        echo get_the_password_form();
    }
}


add_filter("the_excerpt", "sapavshop_the_excerpt");
//post password

function sapavshop_post_protected_title()
{
    return "%s";
}

add_filter("protected_title_format", "sapavshop_post_protected_title");
//post password title removing


