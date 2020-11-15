<?php
require_once get_template_directory() . '/template-parts/header-section/Nav_Walker_Class.php';
?>
<div class="collapse navbar-collapse" id="nav-open-btn">


    <ul class="nav">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'topmenu',
            'menu_id' => 'topmenu',
            'menu_class' => 'nav',
            'walker' => new Nav_Walker_Class(),
        ))
        ?>
    </ul>
</div>



