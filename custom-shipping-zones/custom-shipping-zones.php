<?php
/**
 * Plugin Name: Custom Woo Shipping Zones
 * Plugin URI: https://github.com/rajan1308
 * Author: WPCusrom
 * Author URI: https://github.com/rajan1308
 * Description: Custom Woo Shipping Zones
 * Version: 0.1.0
 * License: GPL2 or Later.
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: prefix-plugin-name
*/

add_filter( 'woocommerce_states', 'WPCusrom_custom_shipping_zones' );

function WPCusrom_custom_shipping_zones( $states ) {
    
    $states['CR'] = array(
        'CR001' => 'Jaco',    
        'CR002' => 'San Jose',    
        'CR003' => 'Liberia',    
    );
    
    return $states ;
}
