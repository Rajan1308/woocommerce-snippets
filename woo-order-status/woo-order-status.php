<?php
/**
 * Plugin Name: WPCusrom Invoiced Woo Order Status
 * Plugin URI: https://github.com/rajan1308
 * Author: WPCusrom
 * Author URI: https://github.com/rajan1308
 * Description: WPCusrom Invoiced Woo Order Status
 * Version: 0.1.0
 * License: GPL2 0r Later
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: WPCusrom-patterns
*/

function register_my_invoiced_order_status() {
    register_post_status( 'wc-invoiced', array(
            'label' => _x( 'Invoiced', 'Order Status', 'WPCusrom-patterns' ),
            'public' => true,
            'exclude_from_search' => false,
            'show_in_all_admin_list' => true,
            'show_in_admin_status_list' => true,
            'label_count' => _n_noop( 'Invoiced <span class="count">(%s)</span>', 'Invoiced <span class="count">(%s)</span>', 'WPCusrom-patterns' )
        )
    );
}

add_action( 'init', 'register_my_invoiced_order_status' );

function my_invoiced_order_status( $order_statuses ){
    $order_statuses['wc-invoiced'] = _x( 'Invoiced', 'Order Status', 'WPCusrom-patterns' );
    return $order_statuses;

}
add_filter( 'wc_order_statuses', 'my_invoiced_order_status' );

function add_to_bulk_actions_orders() {
    global $post_type;

    if( 'shop_order' == $post_type ) {
        ?>
            <script type="text/javascript">
                jQuery(document).ready(function(){
                    jQuery('<option>').val('mark_invoiced').text('<?php _e( 'Change Status to Invoiced','WPCusrom-patterns' ); ?>').appendTo("select[name='action']");
                    jQuery('<option>').val('mark_invoiced').text('<?php _e( 'Change Status to Invoiced','WPCusrom-patterns' ); ?>').appendTo("select[name='action2']");
                });
            </script>
        <?php
    }
}

add_action( 'admin_footer', 'add_to_bulk_actions_orders' );