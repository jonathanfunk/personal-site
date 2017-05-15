<?php
/**
 * The header for our theme.
 *
 * @package Jonathan_Funk_Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="hfeed site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html( 'Skip to content' ); ?></a>
			<header id="masthead" class="site-header">
				<div class="container">
          <div class="site-branding">
            <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><i class="fa fa-code" aria-hidden="true"></i>Jonathan Funk</a></h2>
          </div><!-- .site-branding -->
          <nav id="site-navigation" class="main-navigation">
						<div class="hamburger-menu">
							<div class="bar"></div>	
						</div>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
          </nav><!-- #site-navigation -->
        </div>
			</header><!-- #masthead -->

			<div id="content" class="site-content">
