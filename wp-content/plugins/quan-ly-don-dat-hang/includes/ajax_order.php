<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 6/30/2023
 * Time: 10:16 AM
 */

add_action('wp_ajax_order_admin_ajax', 'order_admin_ajax');
add_action('wp_ajax_nopri_order_admin_ajax', 'order_admin_ajax');

function order_admin_ajax(){
    $orderID = $_POST['orderID'];
    $type = $_POST['type'];
    $update = new ActionDatabase();
    $update->updateStatus($orderID, $type);
    $res = [
        'success'=>true,
    ];
    echo json_encode($res);
    die();
}