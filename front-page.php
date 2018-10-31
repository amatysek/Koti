<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KotiDesigns
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<h1>Koti Designs</h1>

		<?php $image = get_field('hero_image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

if( $image ) {

	echo wp_get_attachment_image( $image, $size );

} ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
