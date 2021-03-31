</div>
<footer>
    <div class="container-fluid footer_fluid footer_top_fluid">

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
            </div>
        </div>
    </div>
        <div class="container-fluid footer_fluid footer_bottom_fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 footer_bottom_left">
                    <?php dynamic_sidebar( 'footer_copyright' ); ?>
                </div>
                <div class="col-lg-4 col-md-6 footer_bottom_center">
                    <?php dynamic_sidebar( 'footer_phone' ); ?>
                </div>
                <div class="col-lg-4 col-md-6 footer_bottom_right">
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