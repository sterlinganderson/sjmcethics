<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("stream-post"); ?>>
	
	<header class="entry-header">

		<div class="entry-meta">
			<?php cje_duo_entry_meta_shared_stream( "stream-post-meta"); ?>
			<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<a class="stream-post-link" href="<?php the_permalink(); ?>" rel="bookmark">
	<h2 class="entry-title">
		<span><?php the_title(); ?></span>
	</h2>


	<p><?php echo get_the_excerpt(); ?> <span class="excerpt-more">...</span></p>
	</a>
		<p><a target="_blank" class="shared-link-url" href="<?php echo cje_duo_get_shared_url(); ?>">Link: <?php echo cje_duo_get_vanity_shared_url(); ?></a></p>


	<?php /*
	<footer class="entry-meta">
		<?php if ( comments_open() && ! is_single() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'twentythirteen' ) . '</span>', __( 'One comment so far', 'twentythirteen' ), __( 'View all % comments', 'twentythirteen' ) ); ?>
			</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
	*/ ?>

</article><!-- #post -->
