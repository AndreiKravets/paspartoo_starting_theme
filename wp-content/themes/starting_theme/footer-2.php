</div>
<div class="footer_2">
    <div class="container-fluid footer_top_fluid">
        <div class="container footer_top_container">
            <div class="row">

                <div class="col-xl-3 col-lg-12 col-md-12 footer_left">
                    <?php dynamic_sidebar( 'footer_logo' ); ?>
                    <?php dynamic_sidebar( 'footer_phone' ); ?>
                    <?php
                    if (has_nav_menu('social')) {
                        wp_nav_menu(array(
                            'theme_location' 	=> 'social',
                            'menu_class' 	 	=> 'footer_social',
                            'container'		 	=> '',
                            'container_class' 	=> '',
                            'walker' 			=> new Main_Submenu_Class()
                        ));
                    }
                    ?>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 footer_center">
                    <h5>Products</h5>
					<?php
					if ( has_nav_menu( 'footer_left_menu' ) ) {
						wp_nav_menu( array(
							'theme_location'  => 'footer_left_menu',
							'menu_class'      => 'footer_left_menu',
							'container'       => '',
							'container_class' => '',
							'walker'          => new Main_Submenu_Class()
						) );
					}
					?>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 footer_center">
                    <h5>Solutions</h5>
                    <?php
                    if ( has_nav_menu( 'footer_center_menu' ) ) {
                        wp_nav_menu( array(
                            'theme_location'  => 'footer_center_menu',
                            'menu_class'      => 'footer_center_menu',
                            'container'       => '',
                            'container_class' => '',
                            'walker'          => new Main_Submenu_Class()
                        ) );
                    }
                    ?>
                    <h5>Helpful links</h5>
					<?php
					if ( has_nav_menu( 'footer_right_menu' ) ) {
						wp_nav_menu( array(
							'theme_location'  => 'footer_right_menu',
							'menu_class'      => 'footer_right_menu',
							'container'       => '',
							'container_class' => '',
							'walker'          => new Main_Submenu_Class()
						) );
					}
					?>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 footer_newsletter">
                    <h5>SignUp to receive our newsletter</h5>
                    <?php echo do_shortcode("[mc4wp_form id='87']"); ?>
                  <!--<div class="footer_subscribe">
                            <input type="email" name="EMAIL" placeholder="Enter your email"
                           required="">
	                       <input type="submit" value="Subscribe" class="subsvribe_btn"/>
                      </div>-->
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid footer_bottom_fluid">
        <div class="container footer_bottom_container">
            <div class="row">
                <div class="col-sm-6 footer_bottom_left">
                    <?php dynamic_sidebar( 'footer_copyright' ); ?>
                </div>
                <div class="col-sm-6 footer_bottom_right">

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