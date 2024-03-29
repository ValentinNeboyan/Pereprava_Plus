<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StoreCommerce
 */

?>


</div>

<?php if (is_active_sidebar('express-off-canvas-panel')) : ?>
    <div id="sidr" class="primary-background">
        <a class="sidr-class-sidr-button-close" href="#sidr-nav">
            <i class="fa fa-window-close-o primary-footer" aria-hidden="true"></i>
        </a>
        <?php dynamic_sidebar('express-off-canvas-panel'); ?>
    </div>
<?php endif; ?>


<footer class="site-footer">
    <?php $storecommerce_footer_widgets_number = storecommerce_get_option('number_of_footer_widget');
    if (1 == $storecommerce_footer_widgets_number) {
        $col = 'col-md-12';
    } elseif (2 == $storecommerce_footer_widgets_number) {
        $col = 'col-md-6';
    } elseif (3 == $storecommerce_footer_widgets_number) {
        $col = 'col-md-4';
    } else {
        $col = 'col-md-4';
    } ?>
    <?php if (is_active_sidebar( 'footer-first-widgets-section') || is_active_sidebar( 'footer-second-widgets-section') || is_active_sidebar( 'footer-third-widgets-section') || is_active_sidebar( 'footer-fourth-widgets-section')) : ?>
        <div class="primary-footer">
            <div class="container-wrapper">
                            <?php if (is_active_sidebar( 'footer-first-widgets-section') ) : ?>
                                <div class="primary-footer-area footer-first-widgets-section <?php echo esc_attr($col); ?> col-sm-12">
                                    <section class="widget-area">
                                        <?php dynamic_sidebar('footer-first-widgets-section'); ?>
                                    </section>
                                </div>
                            <?php endif; ?>

                            <?php if (is_active_sidebar( 'footer-second-widgets-section') ) : ?>
                                <div class="primary-footer-area footer-second-widgets-section <?php echo esc_attr($col); ?>  col-sm-12">
                                    <section class="widget-area">
                                        <?php dynamic_sidebar('footer-second-widgets-section'); ?>
                                    </section>
                                </div>
                            <?php endif; ?>

                            <?php if (is_active_sidebar( 'footer-third-widgets-section') ) : ?>
                                <div class="primary-footer-area footer-third-widgets-section <?php echo esc_attr($col); ?>  col-sm-12">
                                    <section class="widget-area">
                                        <?php dynamic_sidebar('footer-third-widgets-section'); ?>
                                    </section>
                                </div>
                            <?php endif; ?>
                            <?php if (is_active_sidebar( 'footer-fourth-widgets-section') ) : ?>
                                <div class="primary-footer-area footer-fourth-widgets-section <?php echo esc_attr($col); ?>  col-sm-12">
                                    <section class="widget-area">
                                        <?php dynamic_sidebar('footer-fourth-widgets-section'); ?>
                                    </section>
                                </div>
                            <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(1 != storecommerce_get_option('hide_footer_menu_section')): ?>
        <?php

        if (has_nav_menu( 'aft-footer-nav' ) || has_nav_menu( 'aft-social-nav' )):
            $class = 'single-align-c';
            if ((has_nav_menu( 'aft-footer-nav' ) && has_nav_menu( 'aft-social-nav' )) ){
                $class = 'col-2 float-l';
            }

            ?>
            <div class="secondary-footer">
                <div class="container-wrapper">
                        <?php if (has_nav_menu( 'aft-footer-nav' )): ?>
                            <div class="<?php echo esc_attr($class); ?>">
                                <div class="footer-nav-wrapper">
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'aft-footer-nav',
                                        'menu_id' => 'footer-menu',
                                        'depth' => 1,
                                        'container' => 'div',
                                        'container_class' => 'footer-navigation'
                                    )); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (has_nav_menu( 'aft-social-nav' )): ?>
                            <div class="<?php echo esc_attr($class); ?>">
                                <div class="footer-social-wrapper">
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'aft-social-nav',
                                        'link_before' => '<span class="screen-reader-text">',
                                        'link_after' => '</span>',
                                        'menu_id' => 'social-menu',
                                        'container' => 'div',
                                        'container_class' => 'social-navigation'
                                    ));
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="site-info">
        <div class="container-wrapper">

            <div class="site-info-wrap">


                <?php
                $storecommerce_secure_payment_badge = storecommerce_get_option('secure_payment_badge');
                $storecommerce_copy_right = storecommerce_get_option('footer_copyright_text');

                $class = 'single-align-c';
                if (!empty($storecommerce_secure_payment_badge) && !empty( $storecommerce_copy_right ) ){
                    $class = 'col-2 float-l';
                } ?>
<!--                <div class="--><?php //echo esc_attr($class); ?><!--">-->
<!--                    --><?php // ?>
<!--                    --><?php //if (!empty($storecommerce_copy_right)): ?>
<!--                        --><?php //echo esc_html($storecommerce_copy_right); ?>
<!--                    --><?php //endif; ?>

<!--                        <span class="sep"> | </span>-->
<!--                        --><?php
//                        /* translators: 1: Theme name, 2: Theme author. */
//                        printf(esc_html__('%1$s by %2$s.', 'storecommerce'), '<a href="https://afthemes.com/products/storecommerce">StoreCommerce</a>', 'AF themes');
//                        ?>

<!--                </div>-->
                <div class="footer-contacts">
                    <a href="mailto:perepravaplus@gmail.com" class="footer-mail">perepravaplus@gmail.com</a>
                    <a href="tel:+380669284338" class="footer-phone"> +38 (066) 928-43-38</a>
                </div>
                <div class="social">
                    <!--					<span>Мы в соц сетях:</span>-->
                    <a class="instagram-icon" href="https://instagram.com/perepravaplus?igshid=yfiei4ysn8zt" target="_blank"></a>
                    <a class="facebook-icon" href="https://facebook.com/perepravaplus.zp" target="_blank"></a>
                </div>

                <?php
                if (!empty($storecommerce_secure_payment_badge)):
                    $storecommerce_secure_payment_badge = absint($storecommerce_secure_payment_badge);
                    $storecommerce_secure_payment_badge = wp_get_attachment_image($storecommerce_secure_payment_badge, 'full');

                    $storecommerce_secure_payment_badge_url = storecommerce_get_option('secure_payment_badge_url');
                    $storecommerce_secure_payment_badge_url = isset($storecommerce_secure_payment_badge_url) ? esc_url($storecommerce_secure_payment_badge_url) : '#';

                    ?>
                    <div class="<?php echo esc_attr($class); ?>">
                        <a href="<?php echo esc_url($storecommerce_secure_payment_badge_url); ?>">
                            <?php echo $storecommerce_secure_payment_badge; ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
</div>
<a id="scroll-up" class="secondary-color">
    <i class="fa fa-angle-up"></i>
</a>
<?php wp_footer(); ?>

</body>
</html>
