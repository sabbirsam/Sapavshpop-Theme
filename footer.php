
<!--======= FOOTER =========-->
<footer>
    <div class="container">

        <!-- ABOUT Location -->
        <div class="col-md-3">
            <?php
            is_active_sidebar("footer-sidebar-2"){
            dynamic_sidebar("footer-sidebar-2")
            }
            ?>
        </div>

        <!-- HELPFUL LINKS -->
        <div class="col-md-3">
<!--            <h6>HELPFUL LINKS</h6>-->
            <?php
            is_active_sidebar("footer-sidebar-3"){
            dynamic_sidebar("footer-sidebar-3")
            }
            ?>
        </div>

        <!-- SHOP -->
        <div class="col-md-3">
<!--            <h6>SHOP</h6>-->
            <?php
            is_active_sidebar("footer-sidebar-4"){
            dynamic_sidebar("footer-sidebar-4")
            }
            ?>
        </div>

        <!-- MY ACCOUNT -->
        <div class="col-md-3">
<!--            <h6>MY ACCOUNT</h6>-->
            <?php
            is_active_sidebar("footer-sidebar-five"){
            dynamic_sidebar("footer-sidebar-five")
            }
            ?>
        </div>

        <!-- Rights -->
        <div class="rights">
            <?php
            is_active_sidebar("footer-sidebar-allright"){
            dynamic_sidebar("footer-sidebar-allright")
            }
            ?>

            <div class="scroll"> <a href="#wrap" class="go-up"><i class="lnr lnr-arrow-up"></i></a> </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>

