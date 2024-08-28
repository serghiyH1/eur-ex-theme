<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eurex
 */

?>
	<footer id="colophon" class="site-footer">
		<div class="site-info container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-4 t-12 footer-copyright-col">
                    <span>&copy; <?php echo get_theme_mod( 'copyright_info_start_year' ); ?>-<?php echo date('Y'); ?> <?php echo pll__( '"EUROEX". Всі права захищені' ); ?></span>
                </div>
                <div class="col-12 col-lg-8 t-12 footer-links-col">
                    <div class="links-wrap">
                        <a href="<?php echo get_theme_mod( 'footer_terms_link' ); ?>" class="footer-link"><?php echo pll__( 'Умови використання' ); ?></a> |
                        <a href="<?php echo get_theme_mod( 'footer_politics_link' ); ?>" class="footer-link"><?php echo pll__( 'Політика конфіденційності' ); ?></a>
                    </div>
                </div>
            </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php
get_template_part( 'template-parts/content', 'modals' );
wp_footer(); ?>

</body>
</html>
