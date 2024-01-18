<?php

/**
 * Enable ACF cache 
 */

function rg_acf_cache_duration($cache_duration) {
    // Set cache duration to 48 hours (2 days)
    $cache_duration = 48 * 60 * 60; // Convert to seconds
    
    return $cache_duration;
}
add_filter('acf/settings/cache', 'rg_acf_cache_duration');

/**
 * Disable caching for ACF field groups during development
 */
function rg_disable_acf_cache($cache_duration) {
    return 0; // Set cache duration to 0 (disable caching)
}
add_filter('acf/settings/cache', 'rg_disable_acf_cache');


// For testing enable cache or disable

$cache_enabled = acf_get_setting('cache');

if ($cache_enabled) {
    echo 'ACF cache is enabled.';
    echo 'Cache duration: ' . $cache_enabled . ' seconds.';
} else {
    echo 'ACF cache is disabled.';
}