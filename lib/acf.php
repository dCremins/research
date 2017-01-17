<?php

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {

    // append path
    $paths[] = plugin_dir_path( __FILE__ ) . '/lib/acf.json';

    // return
    return $paths;
}

?>
