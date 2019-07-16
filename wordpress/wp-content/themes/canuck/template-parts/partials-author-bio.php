<?php
/**
 * Template Part, author bio
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017-2018  Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */

global $canuck_page_title,$curauth,$canuck_exclude_page_title;
$include_bio = get_theme_mod( 'canuck_include_author_bio', false );
if ( true === $include_bio ) {
	if ( '' !== $curauth->description ) {
		?>
		<div class="author-bio-header">
			<?php echo get_avatar( $curauth->user_email, 150 ); ?>
			<div class="author-bio-content-wrap">
				<p><?php echo wp_kses_post( $curauth->description ); ?></p>
				<?php
				if ( '' !== $curauth->user_url ) {
					echo esc_html__( 'Website: ', 'canuck' ) . '<a href="' . esc_url( $curauth->user_url ) . '">' . esc_url( $curauth->user_url ) . '</a>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
echo '<div class="clearfix"></div>';

