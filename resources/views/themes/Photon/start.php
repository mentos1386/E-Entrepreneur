<?php

/**
 * Listing of all available menus and page types
 */
$menus = [
    'top',
    'bottom'
];

$pages = [
    'default'  => 'default',
    'about'    => 'default',
    // Overwrite default view of Page creating with custom one!
    'location' => 'layouts.dashboard.location',
];