<?php

/**
 * Goblog Free: Custom Class for Radio Text Customizer Control.
 *
 * @package Goblog Free
 * @since 1.0
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Custom class for the Radio Text Customizer Control.
	 */
	class Goblog_Free_Customize_Radio_Text extends WP_Customize_Control {
	
		/**
		 * Control type.
		 *
		 * @var string
		 */
		public $type = 'radio_text';

		/**
		 * Render the content of the Radio Text Customizer Control.
		 */
		public function render_content() {
			?>
			<div class="container-radio-txt">
				<?php if ( ! empty( $this->label ) ) : ?>
					<span class="title-customize"><?php echo esc_html( $this->label ); ?></span>
				<?php endif; ?>

				<div class="radio-text">
					<?php foreach ( $this->choices as $key => $value ) : ?>
						<label class="radio-button-label">
							<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?> />
							<span><?php echo esc_html( $value ); ?></span>
						</label>
					<?php endforeach; ?>
				</div>
			</div>
			<?php
		} // End Function render_content()
	} // End Class Goblog_Free_Customize_Radio_Text
} // End Check class_exists
