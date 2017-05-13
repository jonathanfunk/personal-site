<?php
/**
 * The template for displaying all single posts.
 *
 * @package Jonathan_Funk_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="project-hero">
        <h1><?php the_title() ?></h1>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
