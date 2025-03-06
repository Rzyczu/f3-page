<?php
/**
 * Template for authorize
 *
 * @package Forminator
 */

// defaults.
$vars = array(
	'error_message' => '',
	'is_close'      => false,
);
/**
 * Template variables.
 *
 * @var array $template_vars
 * */
foreach ( $template_vars as $key => $val ) {
	$vars[ $key ] = $val;
}
?>

<div id="forminator-integrations" class="wpmudev-settings--box">
	<div class="sui-box">
		<div class="sui-box-header">
			<h2 class="sui-box-title"><?php esc_html_e( 'Authorizing Slack', 'forminator' ); ?></h2>
		</div>
		<div class="sui-box-body">
			<?php if ( ! empty( $vars['error_message'] ) ) : ?>
				<?php
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Output is already escaped.
					echo Forminator_Admin::get_red_notice( esc_html( $vars['error_message'] ) );
				?>
			<?php elseif ( $vars['is_close'] ) : ?>
				<?php
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Output is already escaped.
				echo Forminator_Admin::get_green_notice(
					esc_html__(
						'Successfully authorized Slack, you can go back to integration settings.',
						'forminator'
					)
				);
				?>
			<?php else : ?>
				<div
					role="alert"
					class="sui-notice sui-active"
					style="display: block; text-align: left;"
					aria-live="assertive"
				>

					<div class="sui-notice-content">

						<div class="sui-notice-message">

							<span class="sui-notice-icon sui-icon-loader sui-loading" aria-hidden="true"></span>

							<p><?php esc_html_e( 'Please wait...', 'forminator' ); ?></p>

						</div>

					</div>

				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<script>
	(function ($) {
		$( function (e) {
			<?php if ( $vars['is_close'] ) : ?>
			setTimeout(function () {
				window.close();
			}, 3000);
			<?php endif; ?>
		});
	})(jQuery);
</script>
