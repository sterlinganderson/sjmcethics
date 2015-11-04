<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php include("nav.php"); ?>
		
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php if ( ! cje_is_shared_post() ) : ?>
					<?php get_template_part( 'content' ); ?>
				<?php else : ?>
					<?php get_template_part( 'content', 'link' ); ?>
				<?php endif; ?>
				<div class="clearfix"></div>
				<?php comments_template(); ?>

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>