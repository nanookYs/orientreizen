<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @since The Box 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">	

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
	
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="page">

	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header clearfix" role="banner">
		<div class="site-brand clearfix">
		
			<hgroup>
				<?php
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif;
					?>
			</hgroup>
			
			<?php $options = get_option( 'thebox_theme_options' ); ?>
			
			<div class="social-links">
			
				<?php if ( $options['facebookurl'] != '' ) : ?>
					<a href="<?php echo $options['facebookurl']; ?>" class="facebook" alt="facebook"><span class="icon-facebook"></span></a>
				<?php endif; ?>
				
				<?php if ( $options['twitterurl'] != '' ) : ?>
					<a href="<?php echo $options['twitterurl']; ?>" class="twitter" alt="twitter"><span class="icon-twitter"></span></a>
				<?php endif; ?>

				<?php if ( $options['googleplusurl'] != '' ) : ?>
					<a href="<?php echo $options['googleplusurl']; ?>" class="googleplus" alt="google plus"><span class="icon-googleplus"></span></a>
				<?php endif; ?>
				
				<?php if ( $options['linkedinurl'] != '' ) : ?>
					<a href="<?php echo $options['linkedinurl']; ?>" class="linkedin" alt="instagram"><span class="icon-linkedin"></span></a>
				<?php endif; ?>
				
				<?php if ( $options['instagramurl'] != '' ) : ?>
					<a href="<?php echo $options['instagramurl']; ?>" class="instagram" alt="instagram"><span class="icon-instagram"></span></a>
				<?php endif; ?>
				
				<?php if ( $options['youtubeurl'] != '' ) : ?>
					<a href="<?php echo $options['youtubeurl']; ?>" class="youtube" alt="youtube"><span class="icon-youtube"></span></a>
				<?php endif; ?>
				
				<?php if ( $options['pinteresturl'] != '' ) : ?>
					<a href="<?php echo $options['pinteresturl']; ?>" class="pinterest" alt="pinterest"><span class="icon-pinterest"></span></a>
				<?php endif; ?>
				
				<?php if ( $options['stumbleuponurl'] != '' ) : ?>
					<a href="<?php echo $options['stumbleuponurl']; ?>" class="stumbleupon" alt="stumble upon"><span class="icon-stumbleupon"></span></a>
				<?php endif; ?>
				
				<?php if ( $options['flickrurl'] != '' ) : ?>
					<a href="<?php echo $options['flickrurl']; ?>" class="flickr" alt="flickr upon"><span class="icon-flickr"></span></a>
				<?php endif; ?>
				
				<?php if ( $options['tumblrurl'] != '' ) : ?>
					<a href="<?php echo $options['tumblrurl']; ?>" class="tumblr" alt="tumblr"><span class="icon-tumblr"></span></a>
				<?php endif; ?>
				
				<?php if ( $options['mediumurl'] != '' ) : ?>
					<a href="<?php echo $options['mediumurl']; ?>" class="medium" alt="medium"><span class="icon-medium"></span></a>
				<?php endif; ?>
				
				<?php if ( $options['githuburl'] != '' ) : ?>
					<a href="<?php echo $options['githuburl']; ?>" class="github" alt="github"><span class="icon-github"></span></a>
				<?php endif; ?>
				
				<?php if ( ! $options['hiderss'] ) : ?>
					<a href="<?php bloginfo( 'rss2_url' ); ?>" class="rss"><span class="icon-rss" alt="rss"></span></a>
				<?php endif; ?>
				
			</div><!-- .social-links-->
			
		</div>	
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><span class="icon-font icon-menu"></span></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
		
	</header><!-- #masthead .site-header -->

	<div id="main" class="site-main clearfix">
		
		<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) { ?>
				<a class="header-image" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
				</a>
		<?php } // if ( ! empty( $header_image ) ) ?>
		