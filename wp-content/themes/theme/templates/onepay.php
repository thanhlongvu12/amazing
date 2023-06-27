<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 6/22/2023
 * Time: 4:29 PM
 * Template Name: OnePay
 *
 */

//Save Data Customer
if($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
    $_SESSION['email'] = $_POST['email'];

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

    $create_time = date("Y-m-d H:s:i");
    $update_time = date("Y-m-d H:s:i");
    global $wpdb;
    $table_name = 'users';

    $_SESSION['table'] = $table_name;
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
}


 //Version 2.0

// *********************
// START OF MAIN PROGRAM
// *********************

// Define Constants
// ----------------
// This is secret for encoding the MD5 hash
// This secret will vary from merchant to merchant
// To not create a secure hash, let SECURE_SECRET be an empty string - ""
// $SECURE_SECRET = "secure-hash-secret";
$SECURE_SECRET = "6D0870CDE5F24F34F3915FB0045120D6";

// add the start of the vpcURL querystring parameters
$vpcURL = 'https://mtf.onepay.vn/paygate/vpcpay.op' . "?";

// Remove the Virtual Payment Client URL from the parameter hash as we
// do not want to send these fields to the Virtual Payment Client.
//unset($_POST["virtualPaymentClientURL"]);

$vpc_Merchant = 'TESTONEPAY23';
$vpc_AccessCode = '6BEB2566';
$vpc_MerchTxnRef = date('YmdHis') . rand() ;
$vpc_OrderInfo = 'JSECURETEST01';
$vpc_Amount = $price * 100;
$vpc_ReturnURL = get_permalink(getIdPage('paymentpage4'));
$vpc_Version = '2';
$vpc_Command = 'pay';
$vpc_Locale = 'vn';
$vpc_Currency = 'VND';
$vpc_TicketNo = $_POST['vpc_TicketNo'];


$data = array(
    'vpc_Merchant' => $vpc_Merchant,
    'vpc_AccessCode' => $vpc_AccessCode,
    'vpc_MerchTxnRef' => $vpc_MerchTxnRef,
    'vpc_OrderInfo' => $vpc_OrderInfo,
    'vpc_Amount' => $vpc_Amount,
    'vpc_ReturnURL' => $vpc_ReturnURL,
    'vpc_Version' => $vpc_Version,
    'vpc_Command' => $vpc_Command,
    'vpc_Locale' => $vpc_Locale,
    'vpc_Currency' => $vpc_Currency,
    'vpc_TicketNo' => $vpc_TicketNo,
);

// The URL link for the receipt to do another transaction.
// Note: This is ONLY used for this example and is not required for
// production code. You would hard code your own URL into your application.

// Get and URL Encode the AgainLink. Add the AgainLink to the array
// Shows how a user field (such as application SessionIDs) could be added
$_POST['AgainLink']=urlencode($_SERVER['HTTP_REFERER']);
//$_POST['AgainLink']=urlencode($_SERVER['HTTP_REFERER']);
// Create the request to the Virtual Payment Client which is a URL encoded GET
// request. Since we are looping through all the data we may as well sort it in
// case we want to create a secure hash and add it to the VPC data if the
// merchant secret has been provided.
//$md5HashData = $SECURE_SECRET; Khởi tạo chuỗi dữ liệu mã hóa trống
$md5HashData = "";

ksort ($data);

// set a parameter to show the first pair in the URL
$appendAmp = 0;

foreach($data as $key => $value) {

    // create the md5 input and URL leaving out any fields that have no value
    if (strlen($value) > 0) {

        // this ensures the first paramter of the URL is preceded by the '?' char
        if ($appendAmp == 0) {
            $vpcURL .= urlencode($key) . '=' . urlencode($value);
            $appendAmp = 1;
        } else {
            $vpcURL .= '&' . urlencode($key) . "=" . urlencode($value);
        }
        //$md5HashData .= $value; sử dụng cả tên và giá trị tham số để mã hóa
        if ((strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
            $md5HashData .= $key . "=" . $value . "&";
        }
    }
}
//xóa ký tự & ở thừa ở cuối chuỗi dữ liệu mã hóa
$md5HashData = rtrim($md5HashData, "&");
// Create the secure hash and append it to the Virtual Payment Client Data if
// the merchant secret has been provided.
if (strlen($SECURE_SECRET) > 0) {
    //$vpcURL .= "&vpc_SecureHash=" . strtoupper(md5($md5HashData));
    // Thay hàm mã hóa dữ liệu
    $vpcURL .= "&vpc_SecureHash=" . strtoupper(hash_hmac('SHA256', $md5HashData, pack('H*',$SECURE_SECRET)));
}

// FINISH TRANSACTION - Redirect the customers using the Digital Order
// ===================================================================
//header("Location: ".$vpcURL);

//update in database when success



wp_redirect($vpcURL);
// *******************
// END OF MAIN PROGRAM
// *******************
