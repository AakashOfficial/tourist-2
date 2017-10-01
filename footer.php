<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HitMag
 */

?>
	</div><!-- .hm-container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="hm-container">
			<div class="footer-widget-area">
				<div class="footer-sidebar" role="complementary">
					<?php if ( ! dynamic_sidebar( 'footer-left' ) ) : ?>
						
					<?php endif; // end sidebar widget area ?>
				</div><!-- .footer-sidebar -->
		
				<div class="footer-sidebar" role="complementary">
					<?php if ( ! dynamic_sidebar( 'footer-mid' ) ) : ?>

					<?php endif; // end sidebar widget area ?>
				</div><!-- .footer-sidebar -->		

				<div class="footer-sidebar" role="complementary">
					<?php if ( ! dynamic_sidebar( 'footer-right' ) ) : ?>

					<?php endif; // end sidebar widget area ?>
				</div><!-- .footer-sidebar -->			
			</div><!-- .footer-widget-area -->
		</div><!-- .hm-container -->

		<div class="site-info">
			<div class="hm-container">
				<div class="site-info-owner">
					<?php
						$footer_copyright_text = get_theme_mod( 'footer_copyright_text', '' );

						if ( ! empty ( $footer_copyright_text ) ) {
							echo wp_kses_post( $footer_copyright_text );
						} else {
							$site_link = '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" >' . esc_attr( get_bloginfo( 'name' ) ) . '</a>';
							printf( esc_html__( 'Copyright &#169; %1$s %2$s.', 'hitmag' ), date_i18n( 'Y' ), $site_link );
						}		
					?>
				</div>			
				<div class="site-info-designer">
					<a href="https://themezhut.com/themes/hitmag/" rel="designer">ThemezHut</a>
					<span class="sep"> | </span>
					<a href="http://wp-templates.ru/" title="Шаблоны WordPress">Шаблоны</a>
					<span class="sep"> | </span>
					<a href="https://rastenievod.com/" title="Уход за домашними цветами" rel="nofollow" target="_blank">Домашние цветы</a>
				</div>
			</div><!-- .hm-container -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAejImZgfH6IX5siSsrrxFI_VJfKvdq2xE" async defer></script>
</body>
</html>