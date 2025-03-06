<?php
/**
 * Template admin/views/templates/banner/wpmudev-expired.php
 *
 * @package Forminator
 */

$current_login_user = wp_get_current_user(); ?>
<div class="sui-box forminator-banner">
	<div class="sui-box forminator-banner-content">
		<div>
			<img src="<?php echo esc_url( forminator_plugin_url() . 'assets/images/wpmudev-logo.png' ); ?>"
				srcset="<?php echo esc_url( forminator_plugin_url() . 'assets/images/wpmudev-logo.png' ); ?> 1x, <?php echo esc_url( forminator_plugin_url() . 'assets/images/wpmudev-logo@2x.png' ); ?> 2x"
				alt="<?php esc_attr_e( 'WPMU DEV Logo', 'forminator' ); ?>"
				class="sui-image sui-image-center fui-image">
		</div>
		<div>
			<h2><?php esc_html_e( 'WPMU DEV Membership Expired', 'forminator' ); ?></h2>
			<p>
				<?php
				printf(
					/* translators: %s - current user display name */
					esc_html__( 'Hey %s, your WPMU DEV membership has expired. You need an active membership to use the preset templates. Renew your membership to get instant access to our pre-designed form templates.', 'forminator' ),
					esc_html( $current_login_user->display_name )
				);
				?>
			</p>
			<p>
				<a href="https://wpmudev.com/project/forminator-pro/?utm_source=forminator&utm_medium=plugin&utm_campaign=forminator_template-page_preset-template_renew" target="_blank" class="sui-button sui-button-icon-left sui-button-purple">
					<span class="sui-icon-wpmudev-logo" aria-hidden="true"></span>
					<?php esc_html_e( 'Renew Membership', 'forminator' ); ?>
				</a>
			</p>
		</div>
	</div>
</div>
