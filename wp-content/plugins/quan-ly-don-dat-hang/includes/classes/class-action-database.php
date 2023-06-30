<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 6/29/2023
 * Time: 9:43 AM
 */

class ActionDatabase{
    private $_orders = '';
    public function __construct(){
        global $wpdb;
        $this->_orders = 'users';
    }

    public function all(){
        global $wpdb;
        $sql = "SELECT * FROM $this->_orders";
        $items = $wpdb->get_results($sql);
        if ($wpdb->last_error){
            echo "Error inserting data: " . $wpdb->last_error;
        }else{
            return $items;
        }
    }

    public function paginate($limit = 20){
        global $wpdb;

        $s = isset($_REQUEST['s']) ? $_REQUEST['s'] : '';
        $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
        $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : '';
        $action2 = isset($_REQUEST['action2']) ? $_REQUEST['action2'] : '';


        $paged = isset($_REQUEST['paged']) ? $_REQUEST['paged'] : 1;
        // lat tong so records
        $sql = "SELECT count(id) FROM $this->_orders WHERE 1=1 ";
        if (!empty($s)){
            $sql .= " AND ( username LIKE '%$s%' OR email LIKE '%$s%' OR phone LIKE '%$s%' ) ";
        }

        if (!empty($status)){
            $sql .= " AND status = '$status' ";
        }
        $total_item = $wpdb->get_var($sql);

        $total_pages = ceil( $total_item / $limit);
        $offset = ( $paged * $limit) - $limit;

        $sql = "SELECT * FROM $this->_orders WHERE 1=1";
        if (!empty($s)){
            $sql .= " AND (username LIKE '%$s%' OR email LIKE '%$s%' OR phone LIKE '%$s%' ) ";
        }

        if (!empty($status)){
            $sql .= " AND status = '$status' ";
        }
        $sql .= " ORDER BY id DESC";
        $sql .= " LIMIT $limit OFFSET $offset";

        $items = $wpdb->get_results($sql);
        return [
            'total_pages' => $total_pages,
            'total_items' => $total_item,
            'items' => $items
        ];
    }

    public function find($id){
        global $wpdb;
        $sql = "SELECT * FROM $this->_orders WHERE id = $id";
        $item = $wpdb->get_row($sql);
        return $item;
    }

    public function save($data){
        global $wpdb;
        $wpdb->insert($this->_orders, $data);
        $lastID = $wpdb->insert_id;
        $item = $this->find($lastID);
        return $item;
    }

    public function update($id, $data){
        global $wpdb;
        $wpdb->update($this->_orders, $data, [
            'id'=>$id
        ]);
        return true;
    }

    public function updateStatus($orderID, $status){
        global $wpdb;
        $wpdb->update(
            $this->_orders,
            [
              'status'=>$status,
            ],
            [
                'id'=>$orderID,
            ]
        );
        return true;
    }
}