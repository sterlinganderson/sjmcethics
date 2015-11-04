<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		<div class="clearfix"></div>
		<?php /* clearfix to push footer#colophon below #side and #main */ ?>

		</div><!-- #page -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			
			<div class="footer-inner">

			<div class="footer-bar footer-widget footer-contact">
				<h3>Center for Journalism Ethics</h3>
				<p>	5152 Vilas Hall<br/>
					821 University Ave.<br/>
				Madison, WI 53706 </p>
				<p><a href="mailto:ethics@journalism.wisc.edu">ethics@journalism.wisc.edu</a></p>
			</div>

			<div class="footer-bar footer-bar-1">
				<div class="footer-widget">
					<h3>About</h3>
					<ul>
						<li><a href="<?php bloginfo('url'); ?>/about">About the Center</a></li>
						<?php /* <li><a href="<?php bloginfo('url'); ?>">People</a></li> */ ?>
						<li><a href="<?php bloginfo('url'); ?>/contact">Contact Us</a></li>
					</ul>
				</div>

				<div class="footer-widget">
					<h3>Events</h3>
					<ul>
						<li><a href="<?php bloginfo('url'); ?>/conference">Conference</a></li>
					</ul>
				</div>

			</div>

			<div class="footer-bar footer-bar-1">
				<div class="footer-widget">
					<h3>Resources</h3>
					<ul>
						<li><a href="<?php bloginfo('url'); ?>/resources/ethics-in-a-nutshell/">Ethics in a nutshell</a></li>
						<li><a href="<?php bloginfo('url'); ?>/resources/holding-media-accountable/">Holding media accountable</a></li>
						<li><a href="<?php bloginfo('url'); ?>/resources/digital-media-ethics/">Digital media ethics</a></li>
						<li><a href="<?php bloginfo('url'); ?>/resources/global-media-ethics/">Global media ethics</a></li>
						<li><a href="<?php bloginfo('url'); ?>/resources/new-publications/">New publications</a></li>
	
					</ul>
				</div>
			</div>

			<div class="footer-bar footer-bar-1">
				<div class="footer-widget">
					<h3>Support</h3>
					<ul>
						<li><a href="<?php bloginfo('url'); ?>/donate">Donate</a></li>
						<?php /*
						<li><a href="<?php bloginfo('url'); ?>/sponsorships">Sponsorships</a></li>
						<li><a href="#">Fellowships</a></li>
						*/ ?>
					</ul>
				</div>
			</div>

			<div class="footer-bar footer-bar-1">
				<div class="footer-widget">
					<h3>Newsletter</h3>
					<p>Subscribe to our newsletter:</p>
		<?php /*			
					<form>
						<input type="text" placeholder="Email..." class="footer-newsletter-input" />
						<input type="button" class="footer-newsletter-submit">
					</form> */ ?>

<!-- Begin MailChimp Signup Form -->
<p>
<div id="mc_embed_signup">
<form action="http://wisc.us3.list-manage.com/subscribe/post?u=2369c60a3bd5a0eb8cb17a152&amp;id=5bf3f4aff3" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

	<label for="mce-LNAME"  class="hidden">Name  <span class="asterisk">*</span></label>
	<input type="text" value="" placeholder="Name..." name="LNAME" class="footer-newsletter-input required" id="mce-LNAME">

	<label for="mce-EMAIL" class="hidden">Email Address  <span class="asterisk">*</span></label>
	<input type="email" value="" name="EMAIL" placeholder="Email..." class="footer-newsletter-input required email" id="mce-EMAIL">

	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->

    <div style="position: absolute; left: -5000px;"><input type="text" name="b_2369c60a3bd5a0eb8cb17a152_5bf3f4aff3" value=""></div>
	<div class="clear"><input type="Submit" value="" name="subscribe" id="mc-embedded-subscribe" class="button footer-newsletter-submit "></div>

</form>
</div>
</p>

<!--End mc_embed_signup-->





				</div>
			</div>
			

			<div class="clearfix"></div>
		
			</div>

		</footer><!-- #colophon -->



	<?php wp_footer(); ?>
</body>
</html>