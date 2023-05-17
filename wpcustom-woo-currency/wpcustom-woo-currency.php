<?php
/**
 * Plugin Name: Our currencies of the world
 * Plugin URI: https://github.com/rajan1308
 * Author: WPCusrom
 * Author URI: https://github.com/rajan1308
 * Description: Add currencies of the world
 * Version: 0.1.0
 * License: GPL2
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: ocotw
*/

/**
 * Add new Country/Economy currency.
 */
add_filter( 'woocommerce_currencies', 'WPCusrom_add_world_currencies' );

function WPCusrom_add_world_currencies( $currencies ) {

	// Add currency of Abkhazia
	$currencies['ARUB'] = __( 'Abkahzia Kopek', 'ocotw' );

	return $currencies;
}

/**
 * Add new Country/Economy currency code.
 */
add_filter( 'woocommerce_currency_symbol', 'WPCusrom_add_world_currencies_symbol', 10, 2 );

function WPCusrom_add_world_currencies_symbol( $currency_symbol, $currency ) {
	switch ( $currency ) {
		case 'ARUB': 
			$currency_symbol = 'AR'; 
		break;
	}
	return $currency_symbol;
}
