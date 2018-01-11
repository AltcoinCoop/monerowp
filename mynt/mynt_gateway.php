<?php
/*
Copyright (c) 2018, The Mynt Project
Portions Copyright (c) 2017, Monero Integrations
Plugin Name: Mynt - WooCommerce Gateway
Plugin URI: http://monerointegrations.com
Description: Extends WooCommerce by Adding the Mynt Gateway
Version: 1.0.1
Author: SerHack
Author URI: http://monerointegrations.com
*/

// This code isn't for Dark Net Markets, please report them to Authority!
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
// Include our Gateway Class and register Payment Gateway with WooCommerce
add_action('plugins_loaded', 'mynt_init', 0);
function mynt_init()
{
    /* If the class doesn't exist (== WooCommerce isn't installed), return NULL */
    if (!class_exists('WC_Payment_Gateway')) return;


    /* If we made it this far, then include our Gateway Class */
    include_once('include/mynt_payments.php');
    require_once('library.php');

    // Lets add it too WooCommerce
    add_filter('woocommerce_payment_gateways', 'mynt_gateway');
    function mynt_gateway($methods)
    {
        $methods[] = 'Mynt_Gateway';
        return $methods;
    }
}

/*
 * Add custom link
 * The url will be http://yourworpress/wp-admin/admin.php?=wc-settings&tab=checkout
 */
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'mynt_payment');
function mynt_payment($links)
{
    $plugin_links = array(
        '<a href="' . admin_url('admin.php?page=wc-settings&tab=checkout') . '">' . __('Settings', 'mynt_payment') . '</a>',
    );

    return array_merge($plugin_links, $links);
}

add_action('admin_menu', 'mynt_create_menu');
function mynt_create_menu()
{
    add_menu_page(
        __('Mynt', 'textdomain'),
        'Mynt',
        'manage_options',
        'admin.php?page=wc-settings&tab=checkout&section=mynt_gateway',
        '',
        plugins_url('monero/assets/icon.png'),
        56 // Position on menu, woocommerce has 55.5, products has 55.6

    );
}


