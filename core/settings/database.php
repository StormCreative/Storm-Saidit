<?php

if (!LIVE) {
    $settings[ 'DB_HOST' ] = 'localhost';
    $settings[ 'DB_NAME' ] = 'gileswilson_saidit';
    $settings[ 'DB_USER' ] = 'root';
    $settings[ 'DB_PASS' ] = 'root';
} else {
    $settings[ 'DB_HOST' ] = 'localhost';
    $settings[ 'DB_NAME' ] = 'gileswilson_saidit';
    $settings[ 'DB_USER' ] = 'root';
    $settings[ 'DB_PASS' ] = 'root';
}

$settings[ 'DB_SUFFIX' ] = 'saidit';
// If the website is static dont try and connect to the database
$settings[ 'USE_DB' ] = TRUE;
