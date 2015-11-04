<div id="slider">

	<div class="slide">

		<div class="slide-image-container">
			

		<?php $first = true; $sliderCount = 0; for ($i = 10; $i>=0;$i-=1) : ?>
	
			<?php 

			/* Find if there is a post specified for this position */ 
			if (array_key_exists('cje_'.'slider_'.$i.'_post_id',$eto_options)) : 
				// print_r($eto_options);

			if ( 
				array_key_exists('cje_'.'slider_'.$i.'_toggle',$eto_options) &&
				$eto_options['cje_'.'slider_'.$i.'_toggle']=="on") :
			?> 

			<?php $sID = $eto_options['cje_'.'slider_'.$i.'_post_id']; ?>


			<?php if (has_post_thumbnail( $sID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $sID ), 'single-post-thumbnail' ); ?>
			

			<div class="main-slide-image <?php if($first) { echo "active"; $first=false; } ?>">
				<img src="<?php echo $image[0] ?>" />
			</div>

			<?php endif; ?>

			<?php 
			$sliderCount++;
			endif; /* this position is included */
			endif; /* this array exists */
			endfor; ?>

		</div>
		
		<div class="slide-content">

		<?php $first = true; for ($i = 10; $i>=0;$i-=1) : ?>
	
			<?php 

			/* Find if there is a post specified for this position */ 
			if (array_key_exists('cje_'.'slider_'.$i.'_post_id',$eto_options)) : 
				// print_r($eto_options);

			if ( 
				array_key_exists('cje_'.'slider_'.$i.'_toggle',$eto_options) &&
				$eto_options['cje_'.'slider_'.$i.'_toggle']=="on") :
			?> 
	
			<!-- Slide Inner -->

			<?php $sID = $eto_options['cje_'.'slider_'.$i.'_post_id']; ?>

			<div class="slide-content-inner <?php if($first) { echo "active"; $first=false; } ?>">

			<header>
				<?php $cat = get_the_category($sID); ?>
				<?php if (array_key_exists(0, $cat)) : ?>
				<span class="categories-links">
				<span class="category-tag">
					<a href="<?php echo get_category_link($cat[0]->term_id); ?>"><?php print_r($cat[0]->name) ?></a>
				</span>
				</span>
				<?php endif; ?>

				<?php

				/* Get the title */
				$title = get_the_title($sID);
				
				/* If there is a new title in the options, use that instead */
				if ( array_key_exists('cje_'.'slider_'.$i.'_title',$eto_options) &&
					 $eto_options['cje_'.'slider_'.$i.'_title']!="") {
						$title = $eto_options['cje_'.'slider_'.$i.'_title'];
				}

				?> 


				<h2><a href="<?php echo get_permalink($sID); ?>"><?php echo $title ?></a></h2>

			</header>

		<?php 

		/* If there is a new except in the options, use that instead */

		if ( array_key_exists('cje_'.'slider_'.$i.'_excerpt',$eto_options) &&
			 $eto_options['cje_'.'slider_'.$i.'_excerpt']!="") {
				excerpt(15,$sID,$eto_options['cje_'.'slider_'.$i.'_excerpt']);
		} else {
			excerpt(15,$sID);
		}
		
		?>

		<?php /* <span class="post-meta">Shared &middot; <span>Oct 25, 2013</span></span> */ ?>

	</div><!-- .slide-content-inner -->

			<?php 
			endif; /* this position is included */
			endif; /* this array exists */
			endfor; ?>


			<ul class="slider-nav">
			
			<?php $first = true; for( $i = 1; $i <=$sliderCount ; $i+=1) : ?>
				<li><a class="<?php if($first) { echo "active"; $first=false; } ?>" href="#<?php echo"{$i}" ?>"></a></li>
			<?php endfor; ?>
			
			</ul>
		
		</div>

	</div><!-- .slide.slide-2 -->

<div class="clearfix"></div>

</div><!-- #slider -->
