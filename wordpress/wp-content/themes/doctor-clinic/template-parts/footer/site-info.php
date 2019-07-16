<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage doctor-clinic
 * @since 1.0
 * @version 1.4
 */

?>

<div class="site-info">
	<p><?php echo esc_html(get_theme_mod('doctor_clinic_footer_copy',__('Doctor Clinic WordPress Theme By','doctor-clinic'))); ?> <?php doctor_clinic_credit(); ?></p>
</div>