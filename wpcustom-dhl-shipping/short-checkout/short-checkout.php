<?php

/**
 * Plugin Name: WPCusrom short Checkout
 * Plugin URI: https://github.com/rajan1308
 * Author: WPCusrom
 * Author URI: https://github.com/rajan1308
 * Description: This plugin makes short checkout process
 * Version: 0.1.0
 * License: GPL2 or Later
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: WPCusrom-short-checkout
*/

function WPCusrom_skipcart() {
    return wc_get_checkout_url();
}

add_filter( 'woocommerce_add_to_cart_redirect', 'WPCusrom_skipcart' );