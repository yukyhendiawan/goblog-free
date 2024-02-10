<?php

/**
 * Goblog Free: Custom Class for Toggle Switch Customizer Control.
 *
 * @package Goblog Free
 * @since 1.0
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Custom class for the Toggle Switch Customizer Control.
	 */
	class Goblog_Free_Customize_Toggle_Switch extends WP_Customize_Control {
	
		/**
		 * Control type.
		 *
		 * @var string
		 */
		public $type = 'toggle_switch';

		/**
		 * Render the content of the Toggle Switch Customizer Control.
		 */
		public function render_content() {
			?>
			<div class="container-toggle-switch">
				<input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" class="toggle-switch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" 
													  <?php 
														$this->link();
																																																		checked( $this->value() ); 
														?>
																																																		>
				<label class="toggle-switch-label" for="<?php echo esc_attr( $this->id ); ?>">
					<span class="toggle-switch-inner"></span>
					<span class="toggle-switch-switch"></span>
				</label>
			</div>
			<span class="title-customize"><?php echo esc_html( $this->label ); ?></span>
			<?php
		} // End Function render_content()
	} // End Class Goblog_Free_Customize_Toggle_Switch
} // End Check class_exists
