<?php

// Should be set to 0 in production
error_reporting(E_ALL);

// Should be set to '0' in production
ini_set('display_errors', '1');

// Settings
$settings = [
    'displayErrorDetails' => true,
    'dbconf' => __DIR__ . '/config.ini',
];

return $settings;
