<?php
/**
 * The main template file.
 *
 * @package Jonathan_Funk_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="hero">
				<h1><?php bloginfo( 'name' ); ?></h1>
			  <p><?php bloginfo( 'description' ); ?></p>
			</section>
			<section class="about">
        <div class="container">
         <h2>About</h2>
        </div>
			</section>
			<section class="projects">
        <div class="container">
          <h2>Projects</h2>
        </div>
			</section>
			<section class="clients">
        <div class="container">
          <h2>Clients</h2>
        </div>
			</section>
			<section class="contact">
        <div class="container">
          <h2>Contact</h2>
        </div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
