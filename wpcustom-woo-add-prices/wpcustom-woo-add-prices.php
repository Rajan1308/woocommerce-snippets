<?php

/**
 * Plugin Name: WPCusrom Add Prices
 * Author: WPCusrom
 * Plugin URI: https://github.com/rajan1308
 * Author URI: https://github.com/rajan1308
 * Description: This plugin adds extra fees to woocommerce.
*/

function lab_pacakge_cost() {
    global $woocommerce;

    $flat_rate = 5;

    $taxable = $flat_rate + ( $woocommerce->cart->cart_contents_total * 0.18 );

    $woocommerce->cart->add_fee( __( 'Soda price', 'om-service-widget' ), $taxable );
}

add_action( 'woocommerce_cart_calculate_fees', 'lab_pacakge_cost');