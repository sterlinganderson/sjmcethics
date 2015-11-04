<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("content-single"); ?>>
	<header class="entry-header">

	<div class="entry-header-inner 	<?php if ( has_post_thumbnail() && ! post_password_required() ) { echo "featured-padding"; } ?>">
	<span class="category-tag">
	<?php
	$categories_list = get_the_category_list( __( ' ', 'twentythirteen' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}  ?>
	</span>
	
		<h1 class="entry-title"><?php the_title(); ?></h1>

	</div>
	</header><!-- .entry-header -->

	<div class="post-sidebar">
		<?php cje_duo_entry_meta( ""); ?>
	</div>
	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
	<div class="article-feature">
		<div class="entry-thumb">
			<?php the_post_thumbnail(); ?>
		</div>
	</div>
	<?php endif; ?>


	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->


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
</article><!-- #post -->
