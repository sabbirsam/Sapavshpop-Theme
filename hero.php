<section class="sub-bnr" data-stellar-background-ratio="0.5">
    <img alt="" src="<?php echo esc_attr( header_image()); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>">

    <div class="position-center-center">
        <div class="container">
            <?php
            if(!display_header_text()){
                echo "";
            } else{
                ?>
            <h4 class="tagline" style="color:#<?php echo get_header_textcolor(); ?>;"><?php bloginfo("name");?></h4>
            <p class="heading" style="color: #<?php echo get_header_textcolor(); ?>;"><?php bloginfo("description");?></p>

                <?php
                }
            ?>
            <ol class="breadcrumb">
                <li>   PUT breadcum </li>
            </ol>
        </div>
    </div>
</section>