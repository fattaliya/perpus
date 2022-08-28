<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>  
  	<meta charset="<?php bloginfo('charset'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php wp_title('&#124;', true, 'right'); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
    <?php wp_head(); ?>
</head>

  <body <?php body_class(); ?>>

 	<!-- logo and navigation -->

 <nav id="site-navigation" class="main-nav" role="navigation">
    <div id="main-nav-wrapper"> 
                <div id="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"  title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
              
                    <?php $pinbin_options = get_option('theme_pinbin_options'); ?>

                <?php if ( $pinbin_options['logo'] != '' ): ?>
                  <div id="logo">
                    <img src="<?php echo $pinbin_options['logo']; ?>" />
                  </div>
                <?php  endif; ?>
              </a>
              
         </div>  
          <?php if ( has_nav_menu( 'main_nav' ) ) { ?>
          <?php wp_nav_menu( array( 'theme_location' => 'main_nav' ) ); ?>
          <?php } else { ?>
          <ul><?php wp_list_pages("depth=3&title_li=");  ?></ul>
          <?php } ?> 

    </div>
  </nav>  
<div class="clear"></div>
<div id="wrap">
  <div id="header"></div>




  <?php
/**
 * Theme index file
 */

?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
<div id="post-area">

<?php while (have_posts()) : the_post(); ?>	

   		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		 <?php if ( has_post_thumbnail() ) { ?>
         <div class="pinbin-image"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'summary-image' );  ?></a></div>
          <div class="pinbin-category"><p><?php the_category(', ') ?></p></div>
       
		  <?php } ?>
       			<div class="pinbin-copy"><h2><a class="front-link" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                <p class="pinbin-date"><?php the_time(get_option('date_format')); ?>  </p>

                  <?php the_excerpt(); ?> 

               <p class="pinbin-link"><a href="<?php the_permalink() ?>">&rarr;</a></p>
         </div>
       </div>
       
<?php endwhile; ?>
</div>
<?php else : ?>

<article id="post-0" class="post no-results not-found">
        <header class="entry-header">
          <h1 class="entry-title"><?php _e( 'Nothing Found', 'pinbin' ); ?></h1>
        </header><!-- .entry-header -->

        <div class="entry-content">
          <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'pinbin' ); ?></p>
          <?php get_search_form(); ?>
        </div><!-- .entry-content -->
</article><!-- #post-0 -->

<?php endif; ?>
    <nav id="nav-below" class="navigation" role="navigation">
        <div class="view-previous"><?php next_posts_link( __( '&#171; Previous', 'pinbin' ) ) ?></div>
        <div class="view-next"><?php previous_posts_link( __( 'Next &#187', 'pinbin' ) ) ?> </div>
    </nav> 
<?php get_footer(); ?>




  <?php
/**
 * The template for displaying the footer.
 */

?>

<?php if ( is_active_sidebar( 'pinbin_footer')) { ?>     
   <div id="footer-area">
			<?php dynamic_sidebar( 'pinbin_footer' ); ?>
        </div><!-- // footer area with widgets -->   
<?php }  ?>           
<footer class="site-footer">
	 <div id="copyright">
	 	<?php _e( 'Pinbin Theme by', 'pinbin' ); ?> <a href="<?php echo esc_url( 'http://colorawesomeness.com/themes/' ); ?>" title="Color Awesomeness" target="_blank"><?php _e( 'Color Awesomeness', 'pinbin' ); ?></a> | 
		<?php _e( 'Copyright', 'pinbin' ) ?> <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> |
		<?php _e( 'Powered by' , 'pinbin' ); ?> <a href="http://www.wordpress.org" target="_blank" title="<?php _e( 'Powered by WordPress' , 'pinbin' ); ?>">WordPress</a>
	 </div><!-- // copyright -->   
</footer>     
</div><!-- // close wrap div -->   

<?php wp_footer(); ?>
	
</body>
</html>

