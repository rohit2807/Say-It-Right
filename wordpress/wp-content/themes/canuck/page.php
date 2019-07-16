<?php
/**
 * This file is the default Page template file, used to display static
 * Pages if no custom Page template is defined.
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017-2018  Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */

global $canuck_include_breadcrumbs,$canuck_exclude_page_title;
$layout_option              = sanitize_text_field( ( '' === get_post_meta( $post->ID, 'canuck_metabox_page_layout', true ) ? 'right_sidebar' : get_post_meta( $post->ID, 'canuck_metabox_page_layout', true ) ) );
$canuck_include_breadcrumbs = get_theme_mod( 'canuck_breadcrumbs' ) ? true : false;
$canuck_exclude_page_title  = get_post_meta( $post->ID, 'canuck_metabox_title', true ) ? true : false;
$sidebar_a                  = esc_html( ( '' === get_post_meta( $post->ID, 'canuck_metabox_sidebar_a', true ) ? 'default-a' : get_post_meta( $post->ID, 'canuck_metabox_sidebar_a', true ) ) );
$sidebar_b                  = esc_html( ( '' === get_post_meta( $post->ID, 'canuck_metabox_sidebar_b', true ) ? 'default-b' : get_post_meta( $post->ID, 'canuck_metabox_sidebar_b', true ) ) );
get_header( 'no-feature' );
get_template_part( '/template-parts/partials', 'page-title' );
?>
<div id="main-section">
	<div id="content-wrap">
		<?php
		if ( 'left_sidebar' === $layout_option ) {
			?>
			<aside id="two-column-sidebar-left" class="toggle-sb-a">
				<?php get_template_part( '/template-parts/sidebars/sidebar', $sidebar_a ); ?>
			</aside>
			<div id="two-column-content">
				<?php get_template_part( '/template-parts/partials', 'page-post' ); ?>
			</div>
			<?php
		} elseif ( 'both_sidebars' === $layout_option ) {
			?>
			<aside id="three-column-sidebar-left" class="toggle-sb-a">
				<?php get_template_part( '/template-parts/sidebars/sidebar', $sidebar_a ); ?>
			</aside>
			<div id="three-column-content">
				<?php get_template_part( '/template-parts/partials', 'page-post' ); ?>
			</div>
			<aside id="three-column-sidebar-right" class="toggle-sb-b">
				<?php get_template_part( '/template-parts/sidebars/sidebar', $sidebar_b ); ?>
			</aside>
			<?php
		} elseif ( 'fullwidth' === $layout_option ) {
			?>
			<div id="fullwidth">
				<?php get_template_part( '/template-parts/partials', 'page-post' ); ?>
			</div>
			<?php
		} else {
			?>
			<div id="two-column-content">
				<?php get_template_part( '/template-parts/partials', 'page-post' ); ?>
			</div>
			<aside id="two-column-sidebar-right" class="toggle-sb-b">
				<?php get_template_part( '/template-parts/sidebars/sidebar', $sidebar_a ); ?>
			</aside>
			<?php
		}// End if().
		?>
	</div>
</div>
<div class="clearfix"></div>
<?php
get_footer();

