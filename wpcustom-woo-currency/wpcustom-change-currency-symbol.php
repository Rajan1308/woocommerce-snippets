<?php
/**
 * Plugin Name: Change Currencies in WooCommerce
 * Plugin URI: https://github.com/rajan1308
 * Author: WPCusrom
 * Author URI: https://github.com/rajan1308
 * Description: Change Currencies in WooCommerce
 * Version: 0.1.0
 * License: GPL2
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: ocotw
*/

/**
 * Change an exisiting currency
 *
 * Go to https://github.com/woocommerce/woocommerce/blob/master/includes/wc-core-functions.php
 * In the get_woocommerce_currencies() to find your currency code.
 */
add_filter( 'woocommerce_currency_symbol', 'WPCusrom_change_woocommerce_currency_symbol', 10, 2 );

function WPCusrom_change_woocommerce_currency_symbol( $currency_symbol, $currency ) {
    
    switch( $currency ) {
		    
	// Insert currency code from the get_woocommerce_currencies().
        case 'AED' : $currency_symbol = 'AED';
        break;
		    
    }
    
    return $currency_symbol;
    
}
