<?php 
    
 function dynamic_update_hreflang() {
      $mainUrl = home_url(''); 
      
      ?> 
      <link rel="alternate" href="<?php echo str_replace( 'en-sa/', '', get_permalink($post->ID) ); ?>" hreflang="x-default" />
      <link rel="alternate" href="<?php echo $mainUrl. str_replace( home_url(), '', get_permalink($post->ID) ); ?>" hreflang="en-sa" />
      <?php 
}
add_action('wp_head', 'dynamic_update_hreflang');

 
 
 ?>
 
 <!-- OutPut -->
 <!-- 

<link rel="alternate" href="https://rajan1308.github.io//products/testing-product/" hreflang="x-default" />
<link rel="alternate" href="https://rajan1308.github.io//en-sa/products/testing-product/" hreflang="en-sa" />

-->