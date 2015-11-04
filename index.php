<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php include("nav.php"); ?>
		
		<div id="content" class="site-content content-wrapper" role="main">

		<div id="slider">

			<div class="slide slide-1">

				<div class="slide-image-container">
					
					<div class="main-slide-image active">
						<img src="<?php bloginfo('template_directory') ?>/img/temp/slide-1.jpg" />
					</div>

					<div class="main-slide-image">
						<img src="<?php bloginfo('template_directory') ?>/img/temp/slide-2.jpg" />
					</div>

					<div class="main-slide-image">
						<img src="<?php bloginfo('template_directory') ?>/img/temp/slide-3.png" />
					</div>

				</div>
				
				<div class="slide-content">

					<!-- Slide inner 1 -->

					<div class="slide-content-inner active">
					
						<header>
						<span class="categories-links">
						<span class="category-tag">
						<a href="https://ethics.journalism.wisc.edu/conference/">Conference</a>
						</span>
							</span>
							<h2><a href="#">This year's conference</a></h2>
						</header>

						<p>Join us as we address the issues facing 21st century journalism in a world of Wikileaks, NSA sweeps, corporate cooperation, whistleblowers and data mining.</p>

						<p><strong>Save the date:</strong> Friday, May 2, 2014</p>

						<span class="post-meta">By <span class="author">Staff</span> &middot; <span>Oct 02, 2013</span></span>

					</div><!-- .slide-content-inner -->


					<?php include('slider.php'); ?>




				
				</div>

			</div><!-- .slide.slide-2 -->

		<div class="clearfix"></div>

		</div><!-- #slider -->


		<div class="stream">
		<h3 class="header-text">Ethics News Feed</h3>
			<?php if ( have_posts() ) : ?>

				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

				<?php if ( ! cje_is_shared_post() ) : ?>
					<?php get_template_part( 'content', 'stream' ); ?>
				<?php else : ?>
					<?php get_template_part( 'content', 'link-stream' ); ?>
				<?php endif; ?>

				<?php endwhile; ?>

				<?php twentythirteen_paging_nav(); ?>

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

		</div><!-- .stream -->

		<div class="home-sidebar">
			
			<div class="home-sidebar-widget member-widget">
				<h3 class="header-text">Center Members</h3>
				
				<p><img src="<?php bloginfo('template_directory') ?>/img/temp/robert.jpg" width="36px" height="36px" /><strong>Robert E. Drechsel</strong> <br/><span class="position">Director</p>

				<p><img src="<?php bloginfo('template_directory') ?>/img/temp/kulver.jpg" width="36px" height="36px" /><strong>Kathleen Culver</strong> <br/><span class="position">Associate Director</p>
				
				<p><img src="<?php bloginfo('template_directory') ?>/img/temp/palmer.jpg" width="36px" height="36px" /><strong>Lindsay Palmer</strong> <br/><span class="position">Associated Faculty</p>

				<p><img src="<?php bloginfo('template_directory') ?>/img/temp/duncan.jpg" width="36px" height="36px" /><strong>Megan Duncan</strong> <br/><span class="position">Project Assistant</p>

			</div>

			<?php dynamic_sidebar( 'hp-sidebar-2' ); ?>


		</div><!-- class="homepage-sidebar" -->

<div class="clearfix"></div>
		</div><!-- #content -->
		
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
