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

	<?php $images = get_field('pap_gallery');
if( $images ): ?>
<div class="gallery">
    <ul>
        <?php foreach( $images as $image ): 
            $content = '<li>';
                $content .= '<a class="gallery_image" href="'. $image['url'] .'">';
                     $content .= '<img src="'. $image['sizes']['thumbnail'] .'" alt="'. $image['alt'] .'" />';
                $content .= '</a>';
            $content .= '</li>';
            if ( function_exists('slb_activate') ){
    $content = slb_activate($content);
    }
    
echo $content;?>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
