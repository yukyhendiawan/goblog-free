<?php

/**
 * Goblog Free: Custom Class for Range Customizer Control.
 *
 * @package Goblog Free
 * @since 1.0
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Custom class for the Range Customizer Control.
	 */
	class Goblog_Free_Customize_Range extends WP_Customize_Control {
	
		/**
		 * Control type.
		 *
		 * @var string
		 */
		public $type = 'range';

		/**
		 * Constructor.
		 *
		 * @param WP_Customize_Manager $manager Customizer manager instance.
		 * @param string               $id      Control ID.
		 * @param array                $args    Control arguments.
		 */
		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );

			$defaults = array(
				'min'  => 1,
				'max'  => 2500,
				'step' => 1,
			);

			$args = wp_parse_args( $args, $defaults );

			$this->min  = $args['min'];
			$this->max  = $args['max'];
			$this->step = $args['step'];
		}

		/**
		 * Render the content of the Range Customizer Control.
		 */
		public function render_content() {
			?>
			<div class="container-range">
				<label class="title-customize"><?php echo esc_html( $this->label ); ?></label>

				<input disabled min="<?php echo esc_attr( $this->min ); ?>" max="<?php echo esc_attr( $this->max ); ?>" step="<?php echo esc_attr( $this->step ); ?>" type='range' <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" oninput="jQuery(this).next('input').val( jQuery(this).val() )">

				<input disabled onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() )" type='text' value='<?php echo esc_attr( $this->value() ); ?>'>
			</div>
			<?php
		} // End Function render_content()
	} // End Class Goblog_Free_Customize_Range
} // End Check class_exists
