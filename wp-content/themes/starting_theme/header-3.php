<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head >
	<title><?php wp_title(''); ?></title>
	<meta http-equiv="Content-Type" content="text/html;">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
  <?php
	global $wp_query;
	wp_head();
	?>
</head>

<body <?php if (is_front_page()) { print ' class="front_page" '; } ?>>

	<div id="root">
		<div class="app">
			<div class="app_main">
                <header class="header_3">
					<div class="header_fluid">
                        <div class="container">
								<div class="head_menu">
                                    <button id="hamb_button" class="hamburger hamburger--collapse" type="button"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
                                    <div class="col-md-4 col-sm-1 col-1 head_burger ">
                                        <?php
                                        if (has_nav_menu('header_left_menu')) {
                                            wp_nav_menu(array(
                                                'theme_location' 	=> 'header_left_menu',
                                                'menu_class' 	 	=> 'menu-menu-container',
                                                'container'		 	=> '',
                                                'container_class' 	=> '',
                                                'walker' 			=> new Main_Submenu_Class()
                                            ));
                                        }
                                        ?>
                                    </div>
									<div class="col-9 col-md-4 col-sm-9 header_logo">
                                        <?php if ( !is_front_page()) { print '<a href="'.get_home_url().'">'; dynamic_sidebar('header_logo'); print '</a>'; }
                                         else { dynamic_sidebar('header_logo'); }?>
									</div>
                                    <div class="col-4 header_book">
                                        <?php
                                        if (has_nav_menu('header_right_menu')) {
                                            wp_nav_menu(array(
                                                'theme_location' 	=> 'header_right_menu',
                                                'menu_class' 	 	=> 'menu-menu-container',
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


                      <div class="fixed-bar animated-quick fadeOutUp header_fluid">
                          <div class="container-fluid">
                          <div class="row head_menu valign-wrapper">
                              <div class="col-md-4 col-sm-1 col-1 head_burger">
                                  <button id="hamb_button" class="hamburger hamburger--collapse" type="button"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
                                  <?php
                                  if (has_nav_menu('header_left_menu')) {
                                      wp_nav_menu(array(
                                          'theme_location' 	=> 'header_left_menu',
                                          'menu_class' 	 	=> 'menu-menu-container',
                                          'container'		 	=> '',
                                          'container_class' 	=> '',
                                          'walker' 			=> new Main_Submenu_Class()
                                      ));
                                  }
                                  ?>
                              </div>
                              <div class="col-4 col-md-4 col-sm-9 header_logo">
                                 <?php if ( !is_front_page()) { print '<a href="'.get_home_url().'">'; dynamic_sidebar('header_logo'); print '</a>'; }
                                 else { dynamic_sidebar('header_logo'); }?>
                              </div>
                              <div class="col-4 header_book">
                                  <?php
                                  if (has_nav_menu('header_right_menu')) {
                                      wp_nav_menu(array(
                                          'theme_location' 	=> 'header_right_menu',
                                          'menu_class' 	 	=> 'menu-menu-container',
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


					<div class="mobile_menu ">
                        <div class="mobile_menu_inner">
						<?php
						if (has_nav_menu('header_left_menu')) {
							wp_nav_menu(array(
								'theme_location' 	=> 'header_left_menu',
								'menu_class' 	 	=> 'menu_mobile',
								'container'		 	=> '',
								'container_class' 	=> '',
								'walker' 			=> new Main_Submenu_Class()
							));
						}
						?>
                        <?php
                        if (has_nav_menu('header_right_menu')) {
                            wp_nav_menu(array(
                                'theme_location' 	=> 'header_right_menu',
                                'menu_class' 	 	=> 'menu_mobile',
                                'container'		 	=> '',
                                'container_class' 	=> '',
                                'walker' 			=> new Main_Submenu_Class()
                            ));
                        }
                        ?>
                        </div>
                    </div>

					<div class="bg "></div>
				</header>