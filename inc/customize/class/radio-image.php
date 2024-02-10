<?php

/**
 * Goblog Free: Custom Class for Radio Image Customizer Control.
 *
 * @package Goblog Free
 * @since 1.0
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Custom class for the Radio Image Customizer Control.
	 */
	class Goblog_Free_Customize_Radio_Image extends WP_Customize_Control {
	
		/**
		 * Control type.
		 *
		 * @var string
		 */
		public $type = 'radio_image';

		/**
		 * Render the content of the Radio Image Customizer Control.
		 */
		public function render_content() {
			?>
			<div class="image-radio-button">
				<?php if ( ! empty( $this->label ) ) : ?>
					<span class="title-customize"><?php echo esc_html( $this->label ); ?></span>
				<?php endif; ?>

				<div class="container-image">
					<?php foreach ( $this->choices as $key => $value ) : ?>
						<div class="box-image">
							<label class="radio-button-label">
								<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?> />
								<img src="<?php echo esc_attr( $value['image'] ); ?>" alt="<?php echo esc_attr( $value['name'] ); ?>" class="layout-nav" title="<?php echo esc_attr( $value['name'] ); ?>" />
							</label>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php
		} // End Function render_content()
	} // End Class Goblog_Free_Customize_Radio_Image
} // End Check class_exists
