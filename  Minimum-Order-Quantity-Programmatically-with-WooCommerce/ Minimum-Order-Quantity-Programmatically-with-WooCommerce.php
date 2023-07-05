<?php

function get_free_shipping_minimum ($zone_name = "Romania") {
  if( ! isset($zone_name)) return null;

  $result = null;
  $zone = null;

  $zones = WC_Shipping_Zones();

  foreach ($zones as $z ) {
     if($z['zone_name'] == $zone_name) {
      $zone = $z;
     }
  }

  var_dump($zone);

  if($zone) {
     $shipping_methods = $zone['$shipping_methods'];
     $free_shipping = null;

     foreach ($shipping_methods as  $method) {
      //  var_dump($method);
      if($method->id == 'free_shipping') {
        $free_shipping = $method;
        break;
      }
     }

    //  var_dump($free_shipping);
    if($free_shipping) {
      $result = $free_shipping->min_amount;
    }
  }
  return $result;
}