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
			<header id="masthead" class="site-header" role="banner">
				<div class="container">
          <div class="site-branding">
            <h1><?php bloginfo( 'name' ); ?></h1>
            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
          </div><!-- .site-branding -->

          <nav id="site-navigation" class="main-navigation" role="navigation">
             <ul>
              <li><a href="https://ca.linkedin.com/in/jonathan-funk" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></a></i>
              <li><a href="https://github.com/jonathanfunk" target="_blank"><i class="fa fa-github-alt" aria-hidden="true"></a></i>
              <li><a href="mailto:jonfunk88@mail.com"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
            </ul>
          </nav><!-- #site-navigation -->
        </div>
			</header><!-- #masthead -->

			<div id="content" class="site-content">
