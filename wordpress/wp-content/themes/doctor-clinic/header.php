<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage doctor-clinic
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'doctor-clinic' ) ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="header">
	<div class="container-fluid">
		<div class="row m-0">
			<div class="col-lg-2 col-md-12 logo">
		        <?php if( has_custom_logo() ){ doctor_clinic_the_custom_logo();
		           }else{ ?>
		          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		          <?php $description = get_bloginfo( 'description', 'display' );
		          if ( $description || is_customize_preview() ) : ?> 
		            <p class="site-description"><?php echo esc_html($description); ?></p>
		        <?php endif; }?>
			</div>
			<div class="col-lg-10 col-md-12 menu-top">
				<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','doctor-clinic'); ?></a></div>
				<div class="row m-0">
					<div class="col-lg-7 col-md-6 contact p-0">
						<span><?php if( get_theme_mod('doctor_clinic_call1') != ''){ ?>
							<span class="col-org"><i class="fas fa-phone"></i><?php echo esc_html( get_theme_mod('doctor_clinic_call1','') ); ?></span>
							<?php } ?>
						</span>
						<span><?php if( get_theme_mod('doctor_clinic_email1') != ''){ ?>
							<span><i class="fas fa-envelope"></i><?php echo esc_html( get_theme_mod('doctor_clinic_email1','') ); ?></span>
						<?php } ?>
						</span>
					</div>
					<div class="col-lg-5 col-md-6 social-media p-0">
						<?php if( get_theme_mod('doctor_clinic_facebook_url') != '' || get_theme_mod( 'doctor_clinic_twitter_url' )!= '' ||get_theme_mod('doctor_clinic_insta_url') != ''||get_theme_mod('doctor_clinic_linkedin_url') != ''){ ?>
						<span class="social-icons">
						<?php if( get_theme_mod( 'doctor_clinic_facebook_url') != '') { ?>
					      <a href="<?php echo esc_url( get_theme_mod( 'doctor_clinic_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
					    <?php } ?>
					    <?php if( get_theme_mod( 'doctor_clinic_twitter_url') != '') { ?>
					      <a href="<?php echo esc_url( get_theme_mod( 'doctor_clinic_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
					    <?php } ?>
					     <?php if( get_theme_mod( 'doctor_clinic_insta_url') != '') { ?>
					      <a href="<?php echo esc_url( get_theme_mod( 'doctor_clinic_insta_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
					    <?php } ?>
					    <?php if( get_theme_mod( 'doctor_clinic_linkedin_url') != '') { ?>
					      <a href="<?php echo esc_url( get_theme_mod( 'doctor_clinic_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i></a>
					    <?php } ?>	            
						</span>	
						<?php }?> 
						<span>
						<?php if ( get_theme_mod('doctor_clinic_btn_text','') != "" ) {?>
						   	<span class="app-btn">            
						     <a href="<?php echo esc_html( get_theme_mod('doctor_clinic_btn_link','') ); ?>"><?php echo esc_html( get_theme_mod('doctor_clinic_btn_text','') ); ?></a>    
						    </span>   
						<?php }?>
						</span>
					</div>
				</div>
				<div class="menu-section">
				<div class="nav">
					<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>