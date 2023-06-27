<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 6/22/2023
 * Time: 9:07 AM
 * Template Name: Success Page
 */

/* -----------------------------------------------------------------------------

 Version 2.0

--------------------------------------------------------------------------------

 @author OnePAy JSC

------------------------------------------------------------------------------*/

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

// If there has been a merchant secret set then sort and loop through all the
// data in the Virtual Payment Client response. While we have the data, we can
// append all the fields that contain values (except the secure hash) so that
// we can create a hash and validate it against the secure hash in the Virtual
// Payment Client response.


// NOTE: If the vpc_TxnResponseCode in not a single character then
// there was a Virtual Payment Client error and we cannot accurately validate
// the incoming data from the secure hash. */

// get and remove the vpc_TxnResponseCode code from the response fields as we
// do not want to include this field in the hash calculation
$vpc_Txn_Secure_Hash = $_GET ["vpc_SecureHash"];
unset ( $_GET ["vpc_SecureHash"] );

// set a flag to indicate if hash has been validated
$errorExists = false;

ksort ($_GET);

if (strlen ( $SECURE_SECRET ) > 0 && $_GET ["vpc_TxnResponseCode"] != "7" && $_GET ["vpc_TxnResponseCode"] != "No Value Returned") {

    //$stringHashData = $SECURE_SECRET;
    //*****************************khởi tạo chuỗi mã hóa rỗng*****************************
    $stringHashData = "";

    // sort all the incoming vpc response fields and leave out any with no value
    foreach ( $_GET as $key => $value ) {
//        if ($key != "vpc_SecureHash" or strlen($value) > 0) {
//            $stringHashData .= $value;
//        }
//      *****************************chỉ lấy các tham số bắt đầu bằng "vpc_" hoặc "user_" và khác trống và không phải chuỗi hash code trả về*****************************
        if ($key != "vpc_SecureHash" && (strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
            $stringHashData .= $key . "=" . $value . "&";
        }
    }
//  *****************************Xóa dấu & thừa cuối chuỗi dữ liệu*****************************
    $stringHashData = rtrim($stringHashData, "&");


//    if (strtoupper ( $vpc_Txn_Secure_Hash ) == strtoupper ( md5 ( $stringHashData ) )) {
//    *****************************Thay hàm tạo chuỗi mã hóa*****************************
    if (strtoupper ( $vpc_Txn_Secure_Hash ) == strtoupper(hash_hmac('SHA256', $stringHashData, pack('H*',$SECURE_SECRET)))) {
        // Secure Hash validation succeeded, add a data field to be displayed
        // later.
        $hashValidated = "CORRECT";
    } else {
        // Secure Hash validation failed, add a data field to be displayed
        // later.
        $hashValidated = "INVALID HASH";
    }
} else {
    // Secure Hash was not validated, add a data field to be displayed later.
    $hashValidated = "INVALID HASH";
}

// Define Variables
// ----------------
// Extract the available receipt fields from the VPC Response
// If not present then let the value be equal to 'No Value Returned'
// Standard Receipt Data
$amount = null2unknown ( $_GET ["vpc_Amount"] );
$locale = null2unknown ( $_GET ["vpc_Locale"] );
//$batchNo = null2unknown ( $_GET ["vpc_BatchNo"] );
$command = null2unknown ( $_GET ["vpc_Command"] );
//$message = null2unknown ( $_GET ["vpc_Message"] );
$version = null2unknown ( $_GET ["vpc_Version"] );
//$cardType = null2unknown ( $_GET ["vpc_Card"] );
$orderInfo = null2unknown ( $_GET ["vpc_OrderInfo"] );
//$receiptNo = null2unknown ( $_GET ["vpc_ReceiptNo"] );
$merchantID = null2unknown ( $_GET ["vpc_Merchant"] );
//$authorizeID = null2unknown ( $_GET ["vpc_AuthorizeId"] );
$merchTxnRef = null2unknown ( $_GET ["vpc_MerchTxnRef"] );
$transactionNo = null2unknown ( $_GET ["vpc_TransactionNo"] );
//$acqResponseCode = null2unknown ( $_GET ["vpc_AcqResponseCode"] );
$txnResponseCode = null2unknown ( $_GET ["vpc_TxnResponseCode"] );

// This is the display title for 'Receipt' page
//$title = $_GET ["Title"];


// This method uses the QSI Response code retrieved from the Digital
// Receipt and returns an appropriate description for the QSI Response Code
//
// @param $responseCode String containing the QSI Response Code
//
// @return String containing the appropriate description
//
function getResponseDescription($responseCode) {

    switch ($responseCode) {
        case "0" :
            $result = "Giao dịch thành công - Approved";
            break;
        case "1" :
            $result = "Ngân hàng từ chối giao dịch - Bank Declined";
            break;
        case "3" :
            $result = "Mã đơn vị không tồn tại - Merchant not exist";
            break;
        case "4" :
            $result = "Không đúng access code - Invalid access code";
            break;
        case "5" :
            $result = "Số tiền không hợp lệ - Invalid amount";
            break;
        case "6" :
            $result = "Mã tiền tệ không tồn tại - Invalid currency code";
            break;
        case "7" :
            $result = "Lỗi không xác định - Unspecified Failure ";
            break;
        case "8" :
            $result = "Số thẻ không đúng - Invalid card Number";
            break;
        case "9" :
            $result = "Tên chủ thẻ không đúng - Invalid card name";
            break;
        case "10" :
            $result = "Thẻ hết hạn/Thẻ bị khóa - Expired Card";
            break;
        case "11" :
            $result = "Thẻ chưa đăng ký sử dụng dịch vụ - Card Not Registed Service(internet banking)";
            break;
        case "12" :
            $result = "Ngày phát hành/Hết hạn không đúng - Invalid card date";
            break;
        case "13" :
            $result = "Vượt quá hạn mức thanh toán - Exist Amount";
            break;
        case "21" :
            $result = "Số tiền không đủ để thanh toán - Insufficient fund";
            break;
        case "99" :
            $result = "Người sủ dụng hủy giao dịch - User cancel";
            break;
        default :
            $result = "Giao dịch thất bại - Failured";
    }
    return $result;
}

//  -----------------------------------------------------------------------------
// If input is null, returns string "No Value Returned", else returns input
function null2unknown($data) {
    if ($data == "") {
        return "No Value Returned";
    } else {
        return $data;
    }
}
//  ----------------------------------------------------------------------------

$transStatus = "";
session_start();
if($hashValidated=="CORRECT" && $txnResponseCode=="0"){
    $icon = true;
    if (isset($_SESSION['email']) && isset($_SESSION['table'])){
        $email = $_SESSION['email'];
        $table_name = $_SESSION['table'];
        $wpdb->update(
            $table_name,
            array(
                'status' => 2,
            ),
            array(
                'email' => $email
            )
        );
    }
    $transStatus = "Giao dịch thành công";
}elseif ($hashValidated=="INVALID HASH" && $txnResponseCode=="0"){
    $icon = false;
    $transStatus = "Giao dịch Pendding";
}else {
    $icon = false;
    if (isset($_SESSION['email']) && isset($_SESSION['table'])){
        $email = $_SESSION['email'];
        $table_name = $_SESSION['table'];
        $wpdb->update(
            $table_name,
            array(
                'status' => 0,
            ),
            array(
                'email' => $email
            )
        );
    }
    $transStatus = "Giao dịch thất bại";
}

//echo $transStatus;

//session_start();
//if (isset($_SESSION['email']) && isset($_SESSION['table'])){
//    $email = $_SESSION['email'];
//    $table_name = $_SESSION['table'];
//    $wpdb->update(
//        $table_name,
//        array(
//            'status' => 1,
//        ),
//        array(
//            'email' => $email
//        )
//    );
//}

$uri = get_template_directory_uri();

$tourID = $_GET['id'];

$tour = get_post($tourID);

$fieldInformation = get_field('general_imformation', $tourID);

$fieldTour = get_field('imformation_tour', $tourID);

get_header();
?>

<div class="traveltour-page-wrapper" id="traveltour-page-wrapper">
    <div class="tourmaster-page-wrapper tourmaster-payment-style-1" id="tourmaster-page-wrapper">
        <div class="tourmaster-payment-head tourmaster-with-background" style="background-image: url(https://demo.goodlayers.com/traveltour/main4/wp-content/uploads/2017/01/shutterstock_759608542.jpg);">
            <div class="traveltour-header-transparent-substitute"></div>
            <div class="tourmaster-payment-head-overlay-opacity"></div>
            <div class="tourmaster-payment-head-overlay"></div>
            <div class="tourmaster-payment-head-top-overlay"></div>
            <div class="tourmaster-payment-title-container tourmaster-container">
                <h1 class="tourmaster-payment-title tourmaster-item-pdlr"><?= $tour->post_title; ?></h1>
            </div>
            <div class="tourmaster-payment-step-wrap" id="tourmaster-payment-step-wrap">
                <div class="tourmaster-payment-step-overlay"></div>
                <div class="tourmaster-payment-step-container tourmaster-container">
                    <div class="tourmaster-payment-step-inner tourmaster-item-mglr clearfix">
                        <div class="tourmaster-payment-step-item tourmaster-checked " data-step="1"><span class="tourmaster-payment-step-item-icon"><i class="fa fa-check"></i><span class="tourmaster-text">1</span></span><span class="tourmaster-payment-step-item-title">Select Tour</span></div>
                        <div class="tourmaster-payment-step-item tourmaster-enable " data-step="2"><span class="tourmaster-payment-step-item-icon"><i class="fa fa-check"></i><span class="tourmaster-text">2</span></span><span class="tourmaster-payment-step-item-title">Contact Details</span></div>
                        <div class="tourmaster-payment-step-item tourmaster-checked " data-step="3"><span class="tourmaster-payment-step-item-icon"><i class="fa fa-check"></i><span class="tourmaster-text">3</span></span><span class="tourmaster-payment-step-item-title">Payment</span></div>
                        <div class="tourmaster-payment-step-item tourmaster-current" data-step="4"><span class="tourmaster-payment-step-item-icon"><i class="fa fa-check"></i><span class="tourmaster-text">4</span></span><span class="tourmaster-payment-step-item-title">Complete</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tourmaster-payment-complete-wrap">
            <div class="tourmaster-payment-complete-head"><?= $transStatus; ?></div>
            <div class="tourmaster-payment-complete-content-wrap">
                <?php
                if ($icon){
                    ?>
                    <i class="fa fa-check tourmaster-payment-complete-icon"></i>
                    <?php
                }else{
                    ?>
                    <i class="fa-light fa-xmark tourmaster-payment-complete-icon"></i>
                    <?php
                }
                ?>

                <div class="tourmaster-payment-complete-thank-you">Thank you!</div>
                <div class="tourmaster-payment-complete-content">Your booking detail has been sent to your email.</div>
                <a class="tourmaster-payment-complete-button tourmaster-button" href="<?= get_permalink(getIdPage('homepage')); ?>">Go to home page</a>
            </div>
        </div>
    </div>
</div>

<?php
unset($_SESSION['email']);
unset($_SESSION['table']);

get_footer();
?>
