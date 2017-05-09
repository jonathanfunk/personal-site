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
				<div class="hero-text">
					<h1><?php bloginfo( 'name' ); ?></h1>
					<p><?php bloginfo( 'description' ); ?></p>
				</div>
			</section>
			<section class="about" id="about">
        <div class="container">
         <h2>About</h2>
				 <?php echo CFS()->get( 'about' ); ?>
        </div>
			</section>
			<section class="projects" id="projects">
        <div class="container">
          <h2>Projects</h2>
        </div>
			</section>
			<section class="clients" id="clients">
        <div class="container">
          <h2>Feature Clients</h2>
					<ul>
					<?php
						$feature_clients = CFS()->get('feature_clients');
						foreach ($feature_clients as $client) {
							echo '<li><img src="'.$client["client"].'"/></li>';
						}
					?>
					</ul>
        </div>
			</section>
			<section class="contact" id="contact">
        <div class="container">
          <h2>Contact</h2>
        </div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
