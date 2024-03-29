<?php
/**
 * Plugin Name: WPCustom Twillio Messaging
 * Plugin URI: https://github.com/ytwpcustom/wpcustom-twilio-messaging
 * Author: wpcustom
 * Author URI: https://github.com/ytwpcustom/wpcustom-twilio-messaging
 * Description: WP and Woocommerce example plugins to send SMS using Twilio.
 * Version: 0.1.0
 * License: MIT
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: wpcustom-twilio-messaging
 */

//Basic Security.
defined('ABSPATH') or die('Unauthorized Access');

// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Send SMS when a new post is published.
// add_action( 'publish_post', 'wpcustom_publish_post_twilio' );

// function wpcustom_publish_post_twilio( $post_id ) {

//     // Your Account SID and Auth Token from twilio.com/console
//     $sid = ''; // <---Add your ids in quotes here
//     $token = ''; // <---Add your token in quotes here

//     $client = new Client($sid, $token);

//     // Use the client to do fun stuff like send text messages!
//     $client->messages->create(
//         // the number you'd like to send the message to
//         '+256782886702',
//         [
//             // A Twilio phone number you purchased at twilio.com/console
//             'from' => '+14153601931',
//             // the body of the text message you'd like to send
//             'body' => 'Hey, It is WordPress!' . $post_id . ' is created.'
//         ]
//     );

// }

// Event of a new email for the order - change in status
add_action('woocommerce_order_status_changed', 'wpcustom_send_sms_on_new_order_status', 10, 4);

// Event of the order note
add_action('woocommerce_new_customer_note_notification', 'wpcustom_send_sms_on_new_order_notes', 10, 1);


function wpcustom_send_sms_on_new_order_status($order_id, $old_status, $new_status, $order)
{
    // Get the order Object
    $my_order = wc_get_order($order_id);

    $firstname = $my_order->get_billing_first_name(); // firstname
    $phone = $my_order->get_billing_phone(); // Phone
    $shopname = get_option('woocommerce_email_from_name');

    $default_sms_message = "Thank you $firstname for shopping with $shopname. Your Order #$orderid is $new_status";

    wpcustom_send_sms_to_customer($phone, $default_sms_message, $shopname);

}

function wpcustom_send_sms_on_new_order_notes($email_args)
{

    $order = wc_get_order($email_args['order_id']);
    $note = $email_args['customer_note'];

    $phone = $order->get_billing_phone(); // Phone
    $shopname = get_option('woocommerce_email_from_name');

    wpcustom_send_sms_to_customer($phone, $note, $shopname);
}

function wpcustom_send_sms_to_customer($phone = 'NULL', $default_sms_message, $shopname)
{

    if ('NULL' === $phone) {
        return;
    }

    // Your Account SID and Auth Token from twilio.com/console
    $sid = 'AC3112db8ef99cddbb6ee563ef1f62e05d';
    $token = '91ab52eec20f7ba48acc07077842e460';

    $client = new Client($sid, $token);

    // Use the client to do fun stuff like send text messages!
    $client->messages->create(
        // the number you'd like to send the message to
        '+' . $phone,
        [
            // A Twilio phone number you purchased at twilio.com/console
            'from' => '+14153601931',
            // the body of the text message you'd like to send
            'body' => $default_sms_message . ' - ' . $shopname
        ]
    );

}