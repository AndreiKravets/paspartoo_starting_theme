<!DOCTYPE HTML>
<html>

<head <?php language_attributes(); ?>>
	<title><?php wp_title(''); ?></title>
	<meta http-equiv="Content-Type" content="text/html;">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

	<?php
	global $wp_query;
	wp_head();
	?>
</head>

<body <?php if (is_front_page()) { print ' class="front_page" '; }
else { print ' class="inner_page" '; }?>>

	<div id="root">
		<div class="app">
			<div class="app_main"> 



                  <header class="header_1">
					<div class="header_fluid">
                        <div class="container">
								<div class="row head_menu valign-wrapper">
                                    <button id="hamb_button" class="hamburger hamburger--collapse" type="button"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
									<div class="col-auto header_logo">
                                        <?php if ( !is_front_page()) { print '<a href="'.get_home_url().'">'; dynamic_sidebar('header_logo'); print '</a>'; }
                                        else {
                                            dynamic_sidebar('header_logo');
                                        }
                                        ?>
									</div>
									<div class="col head_menu_col">
										<?php
										if (has_nav_menu('header_menu')) {
											wp_nav_menu(array(
												'theme_location' 	=> 'header_menu',
												'menu_class' 	 	=> 'menu-menu-container',
												'container'		 	=> '',
												'container_class' 	=> '',
												'walker' 			=> new Main_Submenu_Class()
											));
										}
										?>
									</div>
                                    <div class="col-auto header_call">
                                        <?php dynamic_sidebar('header_call'); ?>
                                     <!-- <h6>Call Us Today</h6>
                                      <a href="tel:19545463403">
                                      <span class="call_us_lg">(195)454-63403</span>
                                      <i class="fas fa-phone"></i></a>-->
                                    </div>
                                </div>
							</div>

					</div>


                      <div class="fixed-bar animated-quick fadeOutUp header_fluid">
                          <div class="container">
                          <div class="row head_menu valign-wrapper">
                              <div class="col-auto header_logo">
                                  <?php if ( !is_front_page()) { print '<a href="'.get_home_url().'">'; } ?>
                                  <?php dynamic_sidebar('header_logo'); ?>
                                  <?php if ( !is_front_page()) print '</a>'; ?>

                              </div>
                              <div class="col right-align head_burger">
                                  <button id="hamb_button" class="hamburger hamburger--collapse" type="button"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
                                  <?php
                                  if (has_nav_menu('header_menu')) {
                                      wp_nav_menu(array(
                                          'theme_location' 	=> 'header_menu',
                                          'menu_class' 	 	=> 'menu-menu-container',
                                          'container'		 	=> '',
                                          'container_class' 	=> '',
                                          'walker' 			=> new Main_Submenu_Class()
                                      ));
                                  }
                                  ?>
                              </div>
                              <div class="col-auto header_call">
                                  <?php dynamic_sidebar('header_call'); ?>
                              </div>

                             </div>

                          </div>
                      </div>


					<div class="mobile_menu ">
						<?php
						if (has_nav_menu('header_menu')) {
							wp_nav_menu(array(
								'theme_location' 	=> 'header_menu',
								'menu_class' 	 	=> 'menu_mobile',
								'container'		 	=> '',
								'container_class' 	=> '',
								'walker' 			=> new Main_Submenu_Class()
							));
						}
						?>

                    </div>
					<div class="bg "></div>
				</header>