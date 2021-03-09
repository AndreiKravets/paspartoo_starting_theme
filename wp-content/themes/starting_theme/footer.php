</div>
<footer>
    <div class="container-fluid footer_fluid footer_top_fluid">



        <div class="home_get_in_touch_section">
            <div class="container">
                <div class="row wpb_row">
                <div class="vc_col-sm-12">
                    <div class="vc_column-inner">
                    <div class="row wpb_row">
                    <div class="vc_col-sm-4">
            <?php dynamic_sidebar('get_in_touch'); ?>
                    </div>
            <div class="vc_col-sm-8">
                <div class="wpb_raw_code">
            <?php dynamic_sidebar('get_in_touch_form'); ?>
                    </div>
            </div>
                </div>
                </div>
                </div>
                </div>
                <img src="<?php print get_home_url();?>/wp-content/uploads/2021/02/Group-23.svg" alt="">
            </div>
        </div>



        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-12 footer_left">
					<?php dynamic_sidebar( 'footer_logo' ); ?>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 footer_center">
					<?php
					if ( has_nav_menu( 'footer_menu' ) ) {
						wp_nav_menu( array(
							'theme_location'  => 'footer_menu',
							'menu_class'      => 'footer_menu',
							'container'       => '',
							'container_class' => '',
							'walker'          => new Main_Submenu_Class()
						) );
					}
					?>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 footer_right">
                    <?php dynamic_sidebar('footer_social'); ?>
                </div>
            </div>
        </div>
    </div>
        <div class="container-fluid footer_fluid">
        <div class="container">
            <div class="row footer_copyright privacy_policy">
                <div class="col-lg-4 col-md-12"><?php dynamic_sidebar( 'footer_privacy' ); ?></div>
                <div class="col-lg-4 col-md-6 footer_phone">
                    <?php dynamic_sidebar( 'footer_phone' ); ?>
                </div>
                <div class="col-lg-4 col-md-6 footer_addres">
                    <?php dynamic_sidebar( 'footer_addres' ); ?>
                </div>

            </div>
        </div>

    </div>
    </div>
</footer>
</div>
</div>

<div class="submit_perent">
    <div class="submit_popup_con">
    </div>
    <div class="submit_popup_form">
        <button><i class="fal fa-plus"></i></button>
        <h4>Thanks for contacting us!</h4>


    </div>

</div>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script>
    var ajax_web_url = '<?php echo admin_url( 'admin-ajax.php', 'relative' ) ?>';
</script>
<?php wp_footer(); ?>
</body>
</html>
