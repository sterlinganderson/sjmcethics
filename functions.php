<?php
/**
 * CJE Duo theme setup, and support
 *
 */

/**
 * Sets up the content width value based on the theme's design.
 */
if ( ! isset( $content_width ) )
	$content_width = 604;

/**
 * Sets up theme defaults for cje-duo
 *
 * @since cje-duo 1.0
 * @author Will Haynes
 *
 * @return void
 */
function cje_duo_setup() {
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'fonts/genericons.css', fonts_url() ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Switches default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 *
	 * TODO: Add back link?
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );
	 */

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'cje_duo_top' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 750, 500, true );

	/*
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
	*/
}
add_action( 'after_setup_theme', 'cje_duo_setup' );

/*
 * Enqueues scripts and styles for front end.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 *
 */
function cje_duo_scripts_styles() {

	// Enqueue google/typekit's webfont loader from google's libraries:
	// https://github.com/typekit/webfontloader
	wp_enqueue_script( 'cje-duo-fonts', "//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js", array(), null );

	wp_enqueue_script( 'cje-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '1.0.0', true );

	// Load our main stylesheet.
	// TODO: Add a version.
	wp_enqueue_style( 'cje-duo-style', get_stylesheet_uri(), array() );
}
add_action( 'wp_enqueue_scripts', 'cje_duo_scripts_styles' );

/**
 * Returns the Google font stylesheet URL, if available.
 *
 * The use of Source Sans Pro and Bitter by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'twentythirteen' );

	/* Translators: If there are characters in your language that are not
	 * supported by Bitter, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$bitter = _x( 'on', 'Bitter font: on or off', 'twentythirteen' );

	if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {
		$font_families = array();

		if ( 'off' !== $source_sans_pro )
			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';

		if ( 'off' !== $bitter )
			$font_families[] = 'Bitter:400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentythirteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentythirteen_wp_title', 10, 2 );

/**
 * Registers two widget areas.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_widgets_init() {


	register_sidebar( array(
		'name'          => __( 'Main Widget Area', 'twentythirteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the footer section of the site.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/* Register right homepage sidebar widget area */
	
	register_sidebar( array(
		'name'          => __( 'Homepage Right Sidebar', 'cje-duo' ),
		'id'            => 'hp-sidebar-2',
		'description'   => __( 'Appears on the right side of the homepage', 'cje-duo' ),
		'before_widget' => '<div id="%1$s" class="home-sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="header-text">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Homepage Left Sidebar', 'cje-duo' ),
		'id'            => 'hp-sidebar-1',
		'description'   => __( 'Appears on the left side of the homepage', 'cje-duo' ),
		'before_widget' => '<div id="%1$s" class="home-sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="header-text">',
		'after_title'   => '</h3>',
	) );


}
add_action( 'widgets_init', 'twentythirteen_widgets_init' );

if ( ! function_exists( 'twentythirteen_paging_nav' ) ) :
/**
 * Displays navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h3 class="screen-reader-text header-text"><?php _e( 'Posts navigation', 'twentythirteen' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'cje_duo_byline' ) ) :

function cje_duo_byline() {

	global $post;

	$byline = get_post_meta($post->ID, 'Byline', true);

	if( !$byline ) {
		$byline = "Staff";
	}

	return $byline;
}

endif;

if ( ! function_exists( 'cje_duo_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * @since cje-duo 1.0
 *
 * @return void
 */
function cje_duo_entry_meta($classes = "") {

	printf( '<div class="post-meta '. $classes .'">');
	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard">By <a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
			cje_duo_byline()
		);
	}

	printf( ' &middot; ' );

	cje_duo_entry_date();

	/*
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	} */
	/*
	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	} */

	printf( '</div> ');


}
endif;

function cje_duo_entry_meta_shared($classes = "") {
	printf( '<div class="post-meta '. $classes .'">');
	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard">Shared By <a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
			cje_duo_byline()
		);
	}

	printf( ' &middot; ' );

	cje_duo_entry_date();

	printf( '</div> ');


}


function cje_duo_entry_meta_shared_stream($classes = "") {

	printf( '<div class="post-meta '. $classes .'">');
	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard">Shared</span>'
		);
	}

	printf( ' &middot; ' );

	cje_duo_entry_date();

	/*
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	} */
	/*
	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	} */

	printf( '</div> ');


}

if ( ! function_exists( 'cje_duo_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * @since cje-duo 1.0
 *
 * @param boolean $echo Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function cje_duo_entry_date( $echo = true ) {

	$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( '%s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

/** 
 * Is this a shared post?
 *
 * @since cje-duo 1.0
 * @author Will Haynes
 *
 * @return true if post has article URL, false if otherwise.
 */
function cje_is_shared_post() {
	global $post;
	
	$fields = get_post_custom();
	

	if( array_key_exists("Article URL",$fields) && $fields["Article URL"][0] != "" ) 
		return true;
	else 
		return false;
	
}

/** 
 * Does this shared post have an organization?
 *
 * @since cje-duo 1.0
 * @author Will Haynes
 *
 * @return true if post has article URL, false if otherwise.
 */
function cje_duo_has_shared_outlet() {
	global $post;
	
	$fields = get_post_custom();
	

	if( array_key_exists("Media outlet",$fields) && $fields["Media outlet"][0] != "" ) 
		return true;
	else 
		return false;
	
}

/** 
 * Get the shared outlet
 *
 * @since cje-duo 1.0
 * @author Will Haynes
 *
 * @return returns the shared posts media outlet.
 */
function cje_duo_get_shared_outlet() {
	global $post;
	
	$fields = get_post_custom();
	

	if( array_key_exists("Media outlet",$fields) && $fields["Media outlet"][0] != "" ) 
		return $fields["Media outlet"][0];
	else 
		return "";
	
}

/** 
 * Does this shared post have an organization?
 *
 * @since cje-duo 1.0
 * @author Will Haynes
 *
 * @return true if post has article URL, false if otherwise.
 */
function cje_duo_has_shared_summary() {
	global $post;
	
	$fields = get_post_custom();
	

	if( array_key_exists("Shared summary",$fields) && $fields["Shared summary"][0] != "" ) 
		return true;
	else 
		return false;
	
}

/** 
 * Get the shared outlet
 *
 * @since cje-duo 1.0
 * @author Will Haynes
 *
 * @return returns the shared posts media outlet.
 */
function cje_duo_get_shared_title() {
	global $post;
	
	$fields = get_post_custom();
	

	if( array_key_exists("Shared title",$fields) && $fields["Shared title"][0] != "" ) 
		return $fields["Shared title"][0];
	else 
		return "";
	
}

/** 
 * Does this shared post have an organization?
 *
 * @since cje-duo 1.0
 * @author Will Haynes
 *
 * @return true if post has article URL, false if otherwise.
 */
function cje_duo_has_shared_title() {
	global $post;
	
	$fields = get_post_custom();
	

	if( array_key_exists("Shared title",$fields) && $fields["Shared title"][0] != "" ) 
		return true;
	else 
		return false;
	
}
/** 
 * Get the shared outlet
 *
 * @since cje-duo 1.0
 * @author Will Haynes
 *
 * @return returns the shared posts media outlet.
 */
function cje_duo_get_shared_summary() {
	global $post;
	
	$fields = get_post_custom();
	

	if( array_key_exists("Shared summary",$fields) && $fields["Shared summary"][0] != "" ) 
		return $fields["Shared summary"][0];
	else 
		return "";
	
}

/** 
 * Is this a shared post?
 *
 * @since cje-duo 1.0
 * @author Will Haynes
 *
 * @return url of shared article
 */
function cje_duo_get_shared_url() {
	global $post;
	
	$fields = get_post_custom();
	
	if( array_key_exists("Article URL",$fields) && $fields["Article URL"][0] != "" ) 
		return $fields["Article URL"][0];
	else 
		return "";
	
}

/** 
 * Is this a shared post?
 *
 * @since cje-duo 1.0
 * @author Will Haynes
 *
 * @return url of shared article
 */
function cje_duo_get_vanity_shared_url() {
	global $post;
	
	$fields = get_post_custom();
	
	if( array_key_exists("Article URL",$fields) && $fields["Article URL"][0] != "" ) {
		$url = $fields["Article URL"][0];
		$urlParts = array();
		preg_match("#^(.*://)?([a-z\-.]+(:[0-9]+)?/)?(.*)$#",$url,$urlParts);


		if(strlen($urlParts[4])>35) {
			$urlParts[4] = "..." . substr($urlParts[4], -25); ;
		}
		return $urlParts[1] . $urlParts[2] . $urlParts[3] . $urlParts[4];
	}
	else 
		return "";
	
}



/**
 * Returns no exerpt more tag, we do this in stream ourselves.
 *
 * @author Will Haynes 
 * @param $more 
 * @return Anchor tag exerpt link 
 */
function cje_duo_new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'cje_duo_new_excerpt_more');


/**
 *
 * Echo's an excerpt trimed to the exact number of words as $limit,
 * for the provided $postID with wrapped in <p></p>.
 * 
 * If $content is provided, we use this instead of querying the post.
 * 
 * @author Will Haynes
 *
 * @param int $limit the number of words to include in the excerpt.
 * @param int $postID the postID of the post to get content from.
 * @param optional string $content which overrides the post content.
 *
 * @return void.
 */
function excerpt($limit,$postID,$content = null) {

	global $post;

	if(!$content) {
		$post_object = get_post( $postID );
		$content = $post_object->post_exerpt;
		if(!$content) {
			$content = $post_object->post_content;
		}
	}

	echo "<p>" . wp_trim_words( $content , $limit ) . "</p>";

}



/**
 *
 * -----------------------------------------------------------------------------
 * Post excerpt for Pages
 * -----------------------------------------------------------------------------
 *
 *    Adding excerpt field to pages as well as posts. 
 *    This is a plugin, but I'm including it in functions.php as it's just
 *    a few lines of code. — Will Haynes
 *
 *
 * Plugin Name: Page Excerpt
 * Plugin URI: http://masseltech.com/plugins/page-excerpt/
 * Description: Adds support for page excerpts - uses WordPress code
 * Author: Jeremy Massel
 * Version: 1.3
 * Author URI: http://www.masseltech.com/
 *
 * -----------------------------------------------------------------------------
 * 
 */

add_action( 'edit_page_form', 'pe_add_box');
add_action('init', 'pe_init');

function pe_init() {
	if(function_exists("add_post_type_support")) //support 3.1 and greater
	{
		add_post_type_support( 'page', 'excerpt' );
	}
}

function pe_page_excerpt_meta_box($post) {
?>
<label class="hidden" for="excerpt"><?php _e('Excerpt') ?></label><textarea rows="1" cols="40" name="excerpt" tabindex="6" id="excerpt"><?php echo $post->post_excerpt ?></textarea>
<p><?php _e('Excerpts are optional hand-crafted summaries of your content. You can <a href="http://codex.wordpress.org/Template_Tags/the_excerpt" target="_blank">use them in your template</a>'); ?></p>
<?php
}


function pe_add_box()
{
	if(!function_exists("add_post_type_support")) //legacy
	{
		add_meta_box('postexcerpt', __('Page Excerpt'), 'pe_page_excerpt_meta_box', 'page', 'advanced', 'core');
	}
}
