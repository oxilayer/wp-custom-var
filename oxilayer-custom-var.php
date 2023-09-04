<?php
/*
Plugin Name: Oxilayer PDF Invoice Custom Variable
Plugin URI: https://www.oxilayer.com/
Description: Oxilayer PDF Invoice Custom Variable
Version: 0.0.1
Requires at least: 5.0
Requires PHP: 5.2
Author: MB Vienas bitas
Author URI: https://www.oxilayer.com/
License: GPLv2 or later
Text Domain: oxilayer-custom-var
*/


defined('ABSPATH') || exit;

add_action('oxi_pdf_custom_variable', function ($dataCollector)
{
    //Get order id
    $orderId = $dataCollector->getData('order_id');

    //Load order with
    $order = wc_get_order($orderId);

    //Set value as empty
    $customerId = '';

    //Check, if order exist
    if ($order) {
        //Extract data you need from order object
        $customerId = $order->get_customer_id();;
    }

    //Register new variable
    $dataCollector->setData('customer_id', $customerId);
});