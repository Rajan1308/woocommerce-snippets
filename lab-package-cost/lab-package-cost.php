<?php
/*
Plugin name: Package Cost Extra fee
Description: Package Cost Extra fee information for Web designer.
Author: Rajan Gupta
Plugin URI: https://github.com/rajan1308
Author URI: https://github.com/rajan1308
text-domain: om-service-widget
*/

function lab_pacakge_cost() {
    global $woocommerce;
    
    $flat_rate = 5;
    $taxable = $flat_rate + ( $woocommerce->cart->cart_contents_total * 0.18 );

    $woocommerce->cart->add_fee( __( 'VAT', 'om-service-widget' ), $taxable );
}

add_action( 'woocommerce_cart_calculate_fees', 'lab_pacakge_cost');