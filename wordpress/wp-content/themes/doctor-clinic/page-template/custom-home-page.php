<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php do_action( 'doctor_clinic_above_slider' ); ?>

<?php if( get_theme_mod('doctor_clinic_slider_hide_show') != ''){ ?>
	<section id="slider">
	  	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
		    <?php $pages = array();
		      	for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'doctor_clinic_slider' . $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $pages[] = $mod;
			        }
		      	}
		      	if( !empty($pages) ) :
		        $args = array(
		          	'post_type' => 'page',
		          	'post__in' => $pages,
		          	'orderby' => 'post__in'
		        );
		        $query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          $i = 1;
		    ?>     
		    <div class="carousel-inner" role="listbox">
		      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
		        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
		          	<img src="<?php the_post_thumbnail_url('full'); ?>"/>
		          	<div class="carousel-caption">
			            <div class="inner_carousel">
			              	<h2><?php the_title();?></h2>
			              	<p><?php $excerpt = get_the_excerpt(); echo esc_html( doctor_clinic_string_limit_words( $excerpt,15 ) ); ?></p>
			            </div>
			            <div class="read-btn">
			              <a href="<?php the_permalink();?>" class="aaaa" title="<?php esc_attr_e( 'Read More', 'doctor-clinic' ); ?>"><?php esc_html_e('Read More','doctor-clinic'); ?>
			              </a>
				       	</div>
		          	</div>
		        </div>
		      	<?php $i++; endwhile; 
		      	wp_reset_postdata();?>
		    </div>
		    <?php else : ?>
		    <div class="no-postfound"></div>
		      <?php endif;
		    endif;?>
		    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
		    </a>
		    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
		    </a>
	  	</div>  
	  	<div class="clearfix"></div>
	</section>
<?php }?>

<?php do_action('doctor_clinic_below_slider'); ?>

<?php if( get_theme_mod('doctor_clinic_post') != ''){ ?>
	<section id="choose_us">
	 	<div class="container-fluid">
			<?php
	          $postData =  get_theme_mod('doctor_clinic_post');
	         if($postData){
	          $args = array( 'name' => esc_html($postData ,'doctor-clinic'));
	          $query = new WP_Query( $args );
	          if ( $query->have_posts() ) :
	            while ( $query->have_posts() ) : $query->the_post(); ?>
		            <div class="row m-0">
		              	<div class="col-lg-5 col-md-6">
		                  <div class="img-chooseus"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?></div>
		                </div>
		                <div class="col-lg-7 col-md-6">
			                <div class="text-chooseus">
			                    <h4><?php the_title(); ?></h4>
			                    <p><?php the_excerpt(); ?></p>
			                    <div class="more-btn">              
			                      <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','doctor-clinic'); ?></a>
			                    </div>
			                </div>
		                </div>
		            </div>
	            <?php endwhile; 
	            wp_reset_postdata();?>
	            <?php else : ?>
	              <div class="no-postfound"></div>
	            <?php
	        endif;} ?>   
	 	</div>
	</section>
<?php }?> 

<?php do_action('doctor_clinic_below_choose_us_section'); ?>

<div class="container-fluid">
  	<?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>