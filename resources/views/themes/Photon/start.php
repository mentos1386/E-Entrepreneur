<?php
/**
 * About Theme
 */

$about = [
    'name'        => 'Photon',
    'description' => 'Beautiful responsive theme.',
    'author'      => 'Html5up',
    'author_url'  => 'http://html5up.net/',
    'version'     => '1.0'
];

/**
 * Listing of all available menus
 */
$menus = [
    [
        'name'        => 'Top Menu',
        'description' => 'This is menu on top',
        'pos'         => 'top',
    ],
    [
        'name'        => 'Bottom Menu',
        'description' => 'This is menu on bottom, for social links',
        'pos'         => 'bottom',
    ],
];

/**
 * Listing of all available page types
 */
$page_types = [
    [
        'name'        => 'Default',
        'description' => 'Default page view',
        'dashboard'   => 'default',
        'view'        => 'default',
    ],
    [
        'name'        => 'About',
        'description' => 'Page view designed for About pages',
        'dashboard'   => 'default',
        'view'        => 'about',
    ],
    // Overwrite default view of Page creating with custom one!
    [
        'name'        => 'Location',
        'description' => 'Page designed to show maps',
        'dashboard'   => 'layouts.dashboard.location',
        'view'        => 'location',
    ],
];