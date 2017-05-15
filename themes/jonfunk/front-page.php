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
				<header>
					<h1><?php bloginfo( 'name' ); ?></h1>
					<p><?php bloginfo( 'description' ); ?></p>
				</header>
			</section>
			<section class="about" id="about">
        <div class="container">
         <h2>Who I am</h2>
				 <p><?php echo CFS()->get( 'about' ); ?></p>
         <h2>What I do</h2>
				 <ul class="grayscale-hover">
          <?php
            $fields = CFS()->get('what_i_do');
            foreach ($fields as $field) :
            ?>
              <li>
                <?php echo '<img src="'.$field["skill_image"].'"/>'; ?>
                <h3><?php echo $field["skill_name"]; ?>
              </li>
            <?php endforeach ?>
					</ul>
        </div>
			</section>
			<section class="projects" id="projects">
				<h2>Projects</h2>
				<ul class="filters">
					<li class="filter active" data-filter="*">All</li>
					<?php
						$args = array(
							'orderby' => 'name',
							'parent' => 0
							);
						$categories = get_categories( $args );
						foreach ( $categories as $category ) {
							echo "<li class='filter' data-filter=." . $category->category_nicename . ">" . $category->name . "s</li>";
						}
						?>
				</ul>
				<ul class="project-list">
          <?php
          $args = array(
            'post_type' => 'post',
            'order' => 'DESC',);
            $posts = get_posts( $args ); // returns an array of posts
            ?>
            <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
              <li <?php post_class( 'project-item' ); ?> data-cat=<?php echo get_the_category()[0]->category_nicename; ?>>
                <?php the_post_thumbnail('project-item-size'); ?>
                <div class="project-title">
									<div class="project-title-wrap">
										<h3><?php the_title() ?></h3>
										<p><a class="box-link" href="<?php the_permalink(); ?>">Read More</a></p>
									</div>
                </div>
              </li>
          <?php endforeach; wp_reset_postdata(); ?>
				</ul>        
			</section>
			<section class="clients" id="clients">
        <div class="container-small">
          <h2>Feature Clients</h2>
				 <ul class="grayscale-hover">
						<?php
							$fields = CFS()->get('feature_clients');
							foreach ($fields as $field) {
								echo '<li><img src="'.$field["client"].'"/></li>';
							}
						?>
					</ul>
        </div>
			</section>
			<section class="contact" id="contact">
        <div class="container">
          <h2>Contact</h2>
          <ul>
						<li><a href="https://ca.linkedin.com/in/jonathan-funk" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></a></i>
						<li><a href="https://github.com/jonathanfunk" target="_blank"><i class="fa fa-github-alt" aria-hidden="true"></a></i>
						<li><a href="/cdn-cgi/l/email-protection#513b3e3f37243f3a6969113c30383d7f323e3c"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
					</ul>
					<?php echo do_shortcode( '[contact-form-7 id="26" title="Contact Form"]' ); ?>
        </div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
