<?php
$button_level= get_post_meta(get_the_ID(),"button-level",true);
$newstaller_content= get_post_meta(get_the_ID(),"newstaller-content",true);
$newstaller_text= get_post_meta(get_the_ID(),"newstaller-text",true);
$placeholder= get_post_meta(get_the_ID(),"placeholder",true);

?>

<section class="news-letter padding-top-150 padding-bottom-150">
    <div class="container">
        <div class="heading light-head text-center margin-bottom-30">
            <h4><?php echo esc_attr($newstaller_text); ?></h4>
            <span><?php echo esc_attr($newstaller_content); ?></span>
        </div>
        <form>
            <input type="email" placeholder="<?php echo esc_attr($placeholder); ?>" required>
            <button type="submit"><?php echo esc_attr($button_level); ?></button>
        </form>
    </div>
</section>
