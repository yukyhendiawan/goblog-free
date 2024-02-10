<?php

/**
 * Goblog Free Sanitization Functions for Customizer.
 *
 * @package Goblog Free
 * @since 1.0.0
 */

// Switch Sanitization
if ( ! function_exists( 'goblog_free_sanitize_switch' ) ) {
	/**
	 * Sanitize switch control value.
	 *
	 * @param mixed $input Switch value.
	 * @return int Sanitized switch value (1 for true, 0 for false).
	 */
	function goblog_free_sanitize_switch( $input ) {
		if ( true === $input ) {
			return 1;
		} else {
			return 0;
		}
	}
}

// Range Sanitization
if ( ! function_exists( 'goblog_free_sanitize_range' ) ) {
	/**
	 * Sanitize range control value.
	 *
	 * @param mixed $input Range value.
	 * @return int Sanitized range value.
	 */
	function goblog_free_sanitize_range( $input ) {
		return absint( $input );
	}
}

// Radio Image Sanitization
if ( ! function_exists( 'goblog_free_sanitize_radio_image' ) ) {
	/**
	 * Sanitize radio text control value.
	 *
	 * @param mixed                $input   Selected value.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return string Sanitized text value or default if not in choices.
	 */    
	function goblog_free_sanitize_radio_image( $input, $setting ) {
		// Get the list of possible radio box or select options.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		if ( array_key_exists( $input, $choices ) ) {
			return sanitize_text_field( $input );
		} else {
			return $setting->default;
		}
	}
}

// Google Font Sanitization
if ( ! function_exists( 'goblog_free_sanitize_google_font' ) ) {
	/**
	 * Sanitize Google Font control value.
	 *
	 * @param mixed $input Google Font value.
	 * @return mixed Sanitized Google Font value.
	 */    
	function goblog_free_sanitize_google_font( $input ) {
		$val = json_decode( $input, true );
		if ( is_array( $val ) ) {
			foreach ( $val as $key => $value ) {
				$val[ $key ] = sanitize_text_field( $value );
			}
			$input = json_encode( $val );
		} else {
			$input = json_encode( sanitize_text_field( $val ) );
		}
		return $input;
	}
}
