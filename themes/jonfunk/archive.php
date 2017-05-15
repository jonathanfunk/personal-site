<?php
/**
 * The template for displaying archive pages.
 *
 * @package Jonathan_Funk_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
      <section class="archive-hero">
        <header class="page-header">
          <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
          ?>
        </header><!-- .page-header -->
      </section>
      <section class="projects">
      <ul class="project-list">
        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <li <?php post_class( 'project-item' ); ?> data-cat=<?php echo get_the_category()[0]->category_nicename; ?>>
          <?php the_post_thumbnail('project-item-size'); ?>
          <div class="project-title">
            <div class="project-title-wrap">
              <h3><?php the_title() ?></h3>
              <p><a class="box-link" href="<?php the_permalink(); ?>">Read More</a></p>
            </div>
          </div>
        </li>
        <?php endwhile; ?>
      <?php else : ?>
        <?php get_template_part( 'template-parts/content', 'none' ); ?>
      <?php endif; ?>
    </ul>
    </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
