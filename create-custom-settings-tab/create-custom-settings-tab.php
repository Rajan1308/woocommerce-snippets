<?php
/**
 * Plugin name: Package Cost Extra fee with Custom Settings Tab
 * Description: Package Cost Extra fee information for Web designer.
 * Author: Rajan Gupta
 * Plugin URI: https://github.com/rajan1308
 * Author URI: https://github.com/rajan1308
 * text-domain: om-service-widget
 */

function lab_pacakge_cost() {
    
    $flat_fee    = get_option( 'WPCusrom_vat_pricing_flat_fee' );
    $dynamic_fee = get_option( 'WPCusrom_vat_pricing_dynamic_fee' );
    
    global $woocommerce;
   
    $taxable = $flat_rate + ( $woocommerce->cart->cart_contents_total * $dynamic_fee );

    $woocommerce->cart->add_fee( __( 'VAT', 'om-service-widget' ), $taxable );
    
}

add_action( 'woocommerce_cart_calculate_fees', 'lab_pacakge_cost');


add_filter( 'woocommerce_settings_tabs_array', 'WPCusrom_add_vat_pricing', 50 );

function WPCusrom_add_vat_pricing( $settings_tab ) {
    
    $settings_tab['WPCusrom_vat_pricing'] = __( 'VAT Pricing', 'om-service-widget' );
    
    return $settings_tab;
}


add_action( 'woocommerce_settings_tabs_WPCusrom_vat_pricing', 'WPCusrom_add_vat_pricing_settings' );

function WPCusrom_add_vat_pricing_settings() {
    woocommerce_admin_fields( get_WPCusrom_vat_pricing_settings() );
}

add_action( 'woocommerce_update_options_WPCusrom_vat_pricing', 'WPCusrom_update_options_vat_pricing_settings' );

function WPCusrom_update_options_vat_pricing_settings() {
    woocommerce_update_options( get_WPCusrom_vat_pricing_settings() );
}

function get_WPCusrom_vat_pricing_settings() {
    
    $settings = array(
        
        'section_title' => array(
            'id'   => 'WPCusrom_vat_pricing_settings_title',
            'desc' => 'Section for handlign VAT information',
            'type' => 'title',
            'name' => 'VAT Pricing Information',
        ),
        
        'vat_pricing_flat_fee' => array(
            'id'   => 'WPCusrom_vat_pricing_flat_fee',
            'desc' => 'Flat Fee number',
            'type' => 'text',
            'name' => 'Flat Fee',
        ),
        
        'vat_pricing_dynamic_fee' => array(
            'id'   => 'WPCusrom_vat_pricing_dynamic_fee',
            'desc' => 'Percentage of Tax',
            'type' => 'text',
            'name' => 'Dynamic Fee',
        ),
        
        'section_end' => array(
            'id'   => 'WPCusrom_vat_pricing_sectionend',
            'type' => 'sectionend',
        ),
    );
    
    return apply_filters( 'filter_WPCusrom_vat_pricing_settings', $settings );
}
