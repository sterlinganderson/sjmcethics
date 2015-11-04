<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
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

				<article id="post-<?php the_ID(); ?>" <?php post_class("content-page"); ?>>
					<header class="entry-header">
					<div class="entry-header-inner">

						<h1 class="entry-title"><?php the_title(); ?></h1>

						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
							<div class="entry-thumbnail">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>
					</div>
					</header><!-- .entry-header -->

					<div class="entry-content entry-content-resources">


						<?php the_content(); ?>
						
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					

						


					</div><!-- .entry-content -->
					
					<div class="external-links">
					<h2>External Resources</h2>
					<?php
							$bookmarks = get_bookmarks( array(
								'orderby'        => 'name',
								'order'          => 'ASC'
								//'category_name'  => 'Related Sites'
							));

						// Loop through each bookmark and print formatted output
						foreach ( $bookmarks as $bookmark ) { 
    						printf( '<li><p><a target="_blank" class="relatedlink" href="%s">%s</a><br />', $bookmark->link_url, $bookmark->link_name );
    						printf( '%s</p></li>', $bookmark->link_description );

						}
					?>
					</div>

					<div class="clearfix"></div>

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->
<div class="clearfix"></div>
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>