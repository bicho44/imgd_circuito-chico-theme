<?php

// Register the Cover Image feature for Users profiles
function bp_default_register_feature() {
    /**
     * You can choose to register it for Members and / or Groups by including (or not)
     * the corresponding components in your feature's settings. In this example, we
     * chose to register it for both components.
     */
    $components = array( 'groups', 'xprofile');

    // Define the feature's settings
    $cover_image_settings = array(
        'name'     => 'cover_image', // feature name
        'settings' => array(
            'components'   => $components,
            'width'        => 940,
            'height'       => 225,
            'callback'     => 'bp_default_cover_image',
            'theme_handle' => 'bp-default-main',
        ),
    );


    // Register the feature for your theme according to the defined settings.
    bp_set_theme_compat_feature( bp_get_theme_compat_id(), $cover_image_settings );
}
add_action( 'bp_after_setup_theme', 'bp_default_register_feature' );
