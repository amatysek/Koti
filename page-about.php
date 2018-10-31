<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KotiDesigns
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

	<h1>Kaarina Talvila</h1>

	<?php $image = get_field('artist_photo');
		$size = 'medium'; // (thumbnail, medium, large, full or custom size)

		if( $image ) {
			echo wp_get_attachment_image( $image, $size );
		}
	?>

	<?php
		if(get_field('artist_bio')){
			echo '<p>' . get_field('artist_bio') . '</p>';
		}
	?>
	
	<h2>Awards</h2>
	<?php
		if(get_field('awards')){
			echo '<p>' . get_field('awards') . '</p>';
		}
	?>

	<h2>Solo Exhibition</h2>
	<?php
		if(get_field('solo')){
			echo '<p>' . get_field('solo') . '</p>';
		}
	?>

	<h2>Select Group Exhibitions</h2>
	<?php
		if(get_field('exhibitions')){
			echo '<p>' . get_field('exhibitions') . '</p>';
		}
	?>
	

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
