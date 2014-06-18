<?php
/**
 * Template Name: Blank
 *
 * @package WordPress
 * @subpackage Thunder WordPress Theme 
*/
?>

<!DOCTYPE html>

<!-- WordPress Theme by WPExplorer (http://www.wpexplorer.com) -->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title><?php wp_title(''); ?><?php if( wp_title('', false) ) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( wpex_get_data('custom_favicon') ) : ?>
    	<link rel="shortcut icon" href="<?php echo wpex_get_data('custom_favicon'); ?>" />
    <?php endif; ?>
	<?php wp_head(); ?>
</head>

<!-- Begin Body -->
<body <?php body_class(); ?>>
    <div id="wrap" class="clr">
    	  <div id="main" class="site-main clr wpex-fitvids">
				<?php wpex_page_slider(); //see functions/page-slider.php  ?>
                <?php
                // Display main header title unless disabled via the meta options
                if ( get_post_meta( get_the_ID(), 'wpex_disable_title', true ) !== 'on' ) { ?>
                    <header class="page-header">
                        <div class="container clr">
                            <h1 class="page-header-title"><?php the_title(); ?></h1>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php if ( !empty( $post->post_excerpt ) ) { ?>
                                    <div id="page-header-description" class="clr">
                                    <?php the_excerpt(); ?>
                                    </div><!-- #page-header-description -->
                                <?php } ?>
                            <?php endwhile; ?>
                            <?php wpex_breadcrumbs(); // see functions/breadcrumbs.php ?>
                        </div>
                    </header>
                <?php } ?>
                
                <div class="container clr">
                	<?php get_sidebar(); ?>
                    <section id="primary" class="content-area clr">
                        <div id="content" class="clr site-content" role="main">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <article class="clr">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <div id="page-featured-img" class="clr">
                                            <?php the_post_thumbnail(); ?>
                                        </div><!-- #page-featured-img -->
                                    <?php } ?>
                                    <div class="entry-content entry clr">
                                        <?php the_content(); ?>
                                        <?php wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
                                    </div><!-- .entry-content -->
                                </article><!-- #post -->
                                <?php comments_template(); ?>
                            <?php endwhile; ?>
                        </div><!-- #content -->
                    </section><!-- #primary -->
                </div><!-- .container -->
     </div><!-- #main-content -->
	</div><!-- #wrap -->
<?php wp_footer(); ?>
</body>
</html> 
