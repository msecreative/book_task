<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Starter Blog
 *
 */

get_header(); ?>
	<div class="content-inner">
		<?php
		do_action( 'starterblog/content/before' );
		woocommerce_content();
		do_action( 'starterblog/content/after' );
		?>
	</div><!-- #.content-inner -->
<?php
get_footer();
