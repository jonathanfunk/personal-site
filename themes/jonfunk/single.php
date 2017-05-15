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
        <header>
         <h1><?php the_title() ?></h1>
        </header>
			</section>
      <section class="summary">
        <div class="container">
          <h2>Summary</h2>
          <?php echo CFS()->get( 'summary' ); ?>
          <?php
          $links = CFS()->get('links');
          foreach ($links as $link) :
          ?>
            <?php echo $link["single_link"]; ?>
          <?php endforeach ?>              
          <h2>Technology</h2>
          <?php the_tags( '<ul class="technology"><li>', '</li><li>', '</li></ul>' ); ?>      
        </div>
      </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
