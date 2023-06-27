<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 6/21/2023
 * Time: 7:27 PM
 * Template Name: Send
 */

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $fullName = $_POST['full-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $notes = $_POST['notes'];
    $member = $_POST['member'];
    $tourID = $_POST['id-tour'];
    $nameTour = $_POST['tour-name'];
    $tourDate = $_POST['tour-date'];
    $price = $_POST['price-tour'];

    //Gửi mail
    $to = get_field('email', 'option');
    $subject = "Customer " . $fullName . ' '. $email . "Book Tour" . $nameTour . "\n";
    $email_body = "Tour Name: " . $nameTour . "ID: " . $tourID . "\n";
    $email_body .= "Tour Date: " . $tourDate . "\n";
    $email_body .= "Member: " . $member . "\n";
    $email_body .= "Price: " . $price . "\n";
    $email_body .= "Customer Phone: " . $phone . "\n";
    $email_body .= "Customer Email: " . $email . "\n";

    wp_mail($to, $subject, $email_body);

    //Lưu vào Database
    global $wpdb;
    $table_name = 'users';
     $wpdb->insert(
        $table_name,
        array(
            'username'=>$fullName,
            'email'=>$email,
            'phone'=>$phone,
            'address'=>$address,
            'name_tour'=>$nameTour,
            'id_tour'=>$tourID,
            'menber'=>$member,
            'price'=>$price,
            'date_tour'=>$tourDate,
            'status'=>0,
            'creat_time'=>$create_time,
            'update_time'=>$update_time,
        )
    );

    if ($wpdb->last_error){
        echo "<script>alert('Eros');</script>";
        echo "Error inserting data: " . $wpdb->last_error;
    }else{
        $currentMem = get_field('imformation_tour_max_people', $tourID);
        $memUpdate = $currentMem - $member;
        update_field('imformation_tour_max_people', $memUpdate , $tourID);
        $redirect = add_query_arg('id', $tourID, get_permalink(getIdPage('paymentpage4')));
        wp_redirect($redirect);
        exit();
    }
}
?>

<script>alert("Eros");</script>


