<?php
/**
 * The main template file.
 *
 * @package Jonathan_Funk_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="hero">
				<header>
					<h1><?php bloginfo( 'name' ); ?></h1>
					<p><?php bloginfo( 'description' ); ?></p>
				</header>
			</section>
			<section class="about" id="about">
        <div class="container">
         <h2>Who I am</h2>
				 <?php echo CFS()->get( 'about' ); ?>
         <h2>What I do</h2>
				 <ul class="grayscale-hover">
					 <?php
							$upload_path = content_url() . '/uploads/';
							$fields = CFS()->get('what_i_do');
							foreach ($fields as $field) {
								$skill_image_ID = $field['skill_image'];
								$skill_image_ALT = get_post_meta($skill_image_ID, '_wp_attachment_image_alt', true);
								$skill_image_TITLE = get_the_title($skill_image_ID);
								$skill_image_URL_data = wp_get_attachment_metadata($skill_image_ID, true);
								$skill_image_URL = $skill_image_URL_data["file"];
									echo '<li><img src="';
									echo $upload_path . $skill_image_URL;
									echo '" title="'.$skill_image_TITLE.'" alt="';
									echo $skill_image_ALT;
									echo '"><h3>'.$field["skill_name"].'</h3>';
							}
						?>
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
							$upload_path = content_url() . '/uploads/';
							$fields = CFS()->get('feature_clients');
							foreach ($fields as $field) {
								$logo_image_ID = $field['client'];
								$logo_image_ALT = get_post_meta($logo_image_ID, '_wp_attachment_image_alt', true);
								$logo_image_TITLE = get_the_title($logo_image_ID);
								$logo_image_URL_data = wp_get_attachment_metadata($logo_image_ID, true);
								$logo_image_URL = $logo_image_URL_data["file"];
									echo '<li><img src="';
									echo $upload_path . $logo_image_URL;
									echo '" title="'.$logo_image_TITLE.'" alt="';
									echo $logo_image_ALT;
									echo '">';
							}
						?>
					</ul>
        </div>
			</section>
			<section class="contact" id="contact">
        <div class="container">
          <h2>Contact</h2>
          <ul>
						<li><a href="https://ca.linkedin.com/in/jonathan-funk" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li><a href="https://github.com/jonathanfunk" target="_blank"><i class="fa fa-github-alt" aria-hidden="true"></i></a></li>
						<li><a href="/cdn-cgi/l/email-protection#513b3e3f37243f3a6969113c30383d7f323e3c"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
					</ul>
					<?php echo do_shortcode( '[contact-form-7 id="26" title="Contact Form"]' ); ?>
        </div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
