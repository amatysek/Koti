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
<h1>Silk Gallery</h1>


<?php if( have_rows('silk_gallery') ): ?>

<ul class="slides">

<?php while( have_rows('silk_gallery') ): the_row(); 

	// vars
	$title = get_sub_field('silk_title');
	$image = get_sub_field('silk_image');
	$content = get_sub_field('silk_description');
	
?>

	<?php if( $title ): ?>
		<?php echo $title; ?>
	<?php endif; ?>

		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

			<?php if( $title ): ?>
		
			<?php endif; ?>

			<?php echo $content; ?>

	<?php endwhile; ?>
	<?php endif; ?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
