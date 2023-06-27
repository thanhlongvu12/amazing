<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 6/8/2023
 * Time: 9:29 AM
 * Template Name: Payment Step 3
 */

$uri = get_template_directory_uri();

$tourID = $_GET['tour-id'];
$numPeople = $_GET['number-people'];

$arrTravellerTiler = array();
$arrTravellerFirstName = array();
$arrTravellerLastName = array();
$arrTravellerAge = array();
$arrTravellerPhone = array();
for ($i=0; $i<$numPeople; $i++){
    array_push($arrTravellerTiler, $_GET['traveller_title'][$i]);
    array_push($arrTravellerFirstName, $_GET['traveller_first_name'][$i]);
    array_push($arrTravellerLastName, $_GET['traveller_last_name'][$i]);
    array_push($arrTravellerAge, $_GET['traveller_age'][$i]);
    array_push($arrTravellerPhone, $_GET['traveller_phone'][$i]);
}


$firstName = $_GET['first_name'];
$lastName = $_GET['last_name'];
$phone = $_GET['phone'];
$email = $_GET['email'];
$country = $_GET['country'];
$address = $_GET['contact_address'];
$notes = $_GET['additional_notes'];

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
                        <div class="tourmaster-payment-step-item tourmaster-current " data-step="3"><span class="tourmaster-payment-step-item-icon"><i class="fa fa-check"></i><span class="tourmaster-text">3</span></span><span class="tourmaster-payment-step-item-title">Payment</span></div>
                        <div class="tourmaster-payment-step-item " data-step="4"><span class="tourmaster-payment-step-item-icon"><i class="fa fa-check"></i><span class="tourmaster-text">4</span></span><span class="tourmaster-payment-step-item-title">Complete</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tourmaster-template-wrapper" id="tourmaster-payment-template-wrapper">
            <div class="tourmaster-container">
                <div class="tourmaster-page-content tourmaster-item-pdlr clearfix tourmaster-template-payment">
                    <div class="tourmaster-tour-booking-bar-wrap" id="tourmaster-tour-booking-bar-wrap">
                        <div class="tourmaster-tour-booking-bar-outer">
                            <div class="tourmaster-tour-booking-bar-inner" id="tourmaster-tour-booking-bar-inner">
                                <div class="tourmaster-tour-booking-bar-summary">
                                    <h3 class="tourmaster-tour-booking-bar-summary-title"><?= $tour->post_title; ?></h3>
                                    <div class="tourmaster-tour-booking-bar-summary-info tourmaster-summary-travel-date">
                                        <span class="tourmaster-head">Travel Date : </span>
                                        <span class="tourmaster-tail">
                                            <?= $fieldTour['tour_start']; ?>
                                            ( <span class="tourmaster-tour-booking-bar-date-edit" id="editSpan">edit</span> )
                                            <form class="tourmaster-tour-booking-temp" id="myForm" action="<?= $tour->guid; ?>" method="post">

                                            </form>
                                        </span>
                                    </div>
                                    <div class="tourmaster-tour-booking-bar-summary-people-wrap">
                                        <div class="tourmaster-tour-booking-bar-summary-people-amount"><span class="tourmaster-head">Traveller : </span><span class="tourmaster-tail"><?= $numPeople; ?></span></div>
                                    </div>
                                    <div class="tourmaster-tour-booking-bar-price-breakdown-wrap"><span class="tourmaster-tour-booking-bar-price-breakdown-link" id="tourmaster-tour-booking-bar-price-breakdown-link">View Price Breakdown</span>
                                        <div class="tourmaster-price-breakdown">
                                            <div class="tourmaster-price-breakdown-base-price-wrap">
                                                <div class="tourmaster-price-breakdown-base-price"><span class="tourmaster-head">Adult Base Price</span><span class="tourmaster-tail"><span class="tourmaster-price-detail"><?= $numPeople?> x $<?= $fieldInformation['save_price']?></span><span class="tourmaster-price">$<?= ($numPeople * $fieldInformation['save_price']); ?></span></span></div>
                                            </div>
                                            <div class="tourmaster-price-breakdown-summary">
                                                <div class="tourmaster-price-breakdown-sub-total "><span class="tourmaster-head">Sub Total Price</span><span class="tourmaster-tail tourmaster-right">$<?= $total = ($numPeople * $fieldInformation['save_price']); ?></span></div>
                                                <div class="tourmaster-price-breakdown-tax-rate"><span class="tourmaster-head">Tax Rate</span><span class="tourmaster-tail tourmaster-right"><?= $fieldInformation['tax']; ?>%</span></div>
                                                <div class="tourmaster-price-breakdown-tax-due"><span class="tourmaster-head">Tax Due</span><span class="tourmaster-tail tourmaster-right">$<?= $tax = ($total*$fieldInformation['tax'])/100 ;?></span></div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tourmaster-tour-booking-bar-total-price-wrap "><input type="hidden" name="payment-type" value="full" />
                                    <div class="tourmaster-tour-booking-bar-total-price-container"><i class="icon_tag_alt"></i><span class="tourmaster-tour-booking-bar-total-price-title">Total Price</span><span class="tourmaster-tour-booking-bar-total-price"><?= $totalPrice = $total + $tax; ?></span></div>
                                </div>
<!--                                <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>-->
<!--                                <script>-->
<!--                                    window.tourmaster_total_price = "5721.41"-->
<!--                                </script>-->
                            </div>
                        </div>
                        <div class="tourmaster-tour-booking-bar-widget  traveltour-sidebar-area">
                            <div id="text-14" class="widget widget_text traveltour-widget">
                                <div class="textwidget"><span class="gdlr-core-space-shortcode" style="margin-top: -20px ;"></span>
                                    <div class="gdlr-core-widget-list-shortcode" id="gdlr-core-widget-list-0">
                                        <h3 class="gdlr-core-widget-list-shortcode-title">Why Book With Us?</h3>
                                        <ul>
                                            <li><i class="fa fa-dollar" style="font-size: 15px ;color: #FC7150 ;margin-right: 13px ;"></i>No-hassle best price guarantee</li>
                                            <li><i class="fa fa-headphones" style="font-size: 15px ;color: #FC7150 ;margin-right: 10px ;"></i>Customer care available 24/7</li>
                                            <li><i class="fa fa-star" style="font-size: 15px ;color: #FC7150 ;margin-right: 10px ;"></i>Hand-picked Tours & Activities</li>
                                            <li><i class="fa fa-support" style="font-size: 15px ;color: #FC7150 ;margin-right: 10px ;"></i>Free Travel Insureance</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div id="text-13" class="widget widget_text traveltour-widget">
                                <div class="textwidget"><span class="gdlr-core-space-shortcode" style="margin-top: -10px ;"></span>

                                    <div class="gdlr-core-widget-box-shortcode " style="background-color: #373737 ;">
                                        <h3 class="gdlr-core-widget-box-shortcode-title" style="color: #ffffff ;">Pay Safely With Us</h3><i class="gdlr-core-widget-box-shortcode-icon icon_lock_alt" style="color: #FC7150 ;"></i>
                                        <div class="gdlr-core-widget-box-shortcode-content">
                                            <p><span style="font-size: 13px; color: #ffffff; ">The payment is encrypted and<br />
                                                                transmitted securely with an <strong>SSL<br />
                                                                    protocol.</strong></span></p>
                                            <span class="gdlr-core-space-shortcode" style="margin-top: 25px ;"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tourmaster-tour-payment-content" id="tourmaster-tour-payment-content">
                        <div class="tourmaster-payment-service-form-wrap">
                            <h3 class="tourmaster-payment-service-form-title">Please select your preferred additional services.</h3>
                            <div class="tourmaster-payment-service-form-item-wrap">
                                <div class="tourmaster-payment-service-form-item"><input type="checkbox" name="service[]" value="5217" checked onclick="return false;" /><span class="tourmaster-payment-service-form-item-title">Cleaning fee</span><span class="tourmaster-payment-service-form-price-wrap"><span class="tourmaster-head">$9</span><span class="tourmaster-tail tourmaster-type-room"><span class="tourmaster-sep">/</span>Room<input type="hidden" name="service-amount[]" value="1" /></span></span></div>
                                <div class="tourmaster-payment-service-form-item"><input type="checkbox" name="service[]" value="5216" checked onclick="return false;" /><span class="tourmaster-payment-service-form-item-title">Tip for tour guide</span><span class="tourmaster-payment-service-form-price-wrap"><span class="tourmaster-head">$20</span><span class="tourmaster-tail tourmaster-type-person"><span class="tourmaster-sep">/</span>Person<input type="hidden" name="service-amount[]" value="1" /></span></span></div>
                                <div class="tourmaster-payment-service-form-item"><input type="checkbox" name="service[]" value="5215" /><span class="tourmaster-payment-service-form-item-title">Entrance Ticket</span><span class="tourmaster-payment-service-form-price-wrap"><span class="tourmaster-head">$15</span><span class="tourmaster-tail tourmaster-type-person"><span class="tourmaster-sep">/</span>Person<input type="hidden" name="service-amount[]" value="1" /></span></span></div>
                                <div class="tourmaster-payment-service-form-item"><input type="checkbox" name="service[]" value="5214" /><span class="tourmaster-payment-service-form-item-title">Lunch Meal</span><span class="tourmaster-payment-service-form-price-wrap"><span class="tourmaster-head">$12</span><span class="tourmaster-tail tourmaster-type-person"><span class="tourmaster-sep">/</span>Person<input type="hidden" name="service-amount[]" value="1" /></span></span></div>
                            </div>
                        </div>
                        <div class="tourmaster-summary-info-outer">
                            <div class="tourmaster-payment-contact-detail-wrap clearfix tourmaster-item-rvpdlr">
                                <div class="tourmaster-payment-detail-wrap tourmaster-payment-contact-detail tourmaster-item-pdlr">
                                    <h3 class="tourmaster-payment-detail-title"><i class="fa fa-file-text-o"></i>Contact Details</h3>
                                    <div class="tourmaster-payment-detail"><span class="tourmaster-head">First Name :</span><span class="tourmaster-tail"><?= $firstName; ?></span></div>
                                    <div class="tourmaster-payment-detail"><span class="tourmaster-head">Last Name :</span><span class="tourmaster-tail"><?= $lastName?></span></div>
                                    <div class="tourmaster-payment-detail"><span class="tourmaster-head">Email :</span><span class="tourmaster-tail"><?= $email; ?></span></div>
                                    <div class="tourmaster-payment-detail"><span class="tourmaster-head">Phone :</span><span class="tourmaster-tail"><?= $phone; ?></span></div>
                                    <div class="tourmaster-payment-detail"><span class="tourmaster-head">Country :</span><span class="tourmaster-tail"><?= $country; ?></span></div>
                                    <div class="tourmaster-payment-detail"><span class="tourmaster-head">Address :</span><span class="tourmaster-tail"><?= $address; ?></span></div>
                                </div>
                            </div>
                            <div class="tourmaster-payment-traveller-detail">
                                <h3 class="tourmaster-payment-detail-title"><i class="fa fa-file-text-o"></i>Traveller Details</h3>
                                <?php
                                for ($i=0; $i<$numPeople; $i++){
                                    ?>
                                    <div class="tourmaster-payment-detail clearfix">
                                        <span class="tourmaster-head">Traveller <?= $i+1;?> :</span>
                                        <span class="tourmaster-tail">
                                            <?= $arrTravellerTiler[$i]?>
                                            <?= $arrTravellerFirstName[$i]?>
                                            <?= $arrTravellerLastName[$i]?><br>
                                            Age <?= $arrTravellerAge[$i]?><br>
                                            Phone <?= $arrTravellerPhone[$i]; ?></span>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tourmaster-payment-method-wrap  tourmaster-none-online-payment">
                            <h3 class="tourmaster-payment-method-title">Please select a payment method</h3>
                            <div class="tourmaster-payment-method-description">* If you wish to do a bank transfer, please select &quot;Book and pay later&quot; button.<br>You will have an option to submit payment receipt on your dashboard page.</div>
                            <div class="tourmaster-payment-terms"><input type="checkbox" name="term-and-service" />* I agree with <a href="#" target="_blank">Terms of Service</a> and <a href="#" target="_blank">Privacy Statement</a>.<div class="tourmaster-tour-booking-required-error tourmaster-notification-box tourmaster-failure" data-default="Please agree to all the terms and conditions before proceeding to the next step."></div>
                            </div>
                            <div class="tourmaster-payment-gateway clearfix">
                                <div class="tourmaster-online-payment-method tourmaster-payment-woocommerce tourmaster-center-align"><a class="tourmaster-button " data-method="ajax" data-action="tourmaster_payment_selected">Pay Now</a></div>
                            </div>
                            <div class="tourmaster-payment-method-or" id="tourmaster-payment-method-or"><span class="tourmaster-left"></span><span class="tourmaster-middle">OR</span><span class="tourmaster-right"></span></div>
<!--                            <div class="tourmaster-payment-method-booking" style="background-color: #f97150">Book and pay later</div>-->
                            <div class="tourmaster-payment-method-booking"><a class="tourmaster-button tourmaster-payment-method-booking-button tourmaster-payment-step">Book and pay later</a></div>
                            <?php
//                            $bookTour = '[contact-form-7 id="447" title="Book And Pay Later"]';
//                            echo do_shortcode($bookTour);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="<?= get_permalink(getIdPage('onepay')); ?>" method="post" id="payment-onepay">
    <input type="hidden" name="full-name" value="<?= $firstName .' '. $lastName; ?>">
    <input type="hidden" name="email" value="<?= $email; ?>">
    <input type="hidden" name="phone" value="<?= $phone; ?>">
    <input type="hidden" name="address" value="<?= $address; ?>">
    <input type="hidden" name="notes" value="<?= $notes; ?>">
    <input type="hidden" name="member" value="<?= $numPeople; ?>">
    <input type="hidden" name="id-tour" value="<?= $tourID; ?>">
    <input type="hidden" name="tour-name" value="<?= $tour->post_title; ?>">
    <input type="hidden" name="tour-date" value="<?= $fieldTour['tour_start'];?>">
    <input type="hidden" name="price-tour" value="<?= $totalPrice; ?>">
    <input type="hidden" name="vpc_TicketNo" value="<?php echo $_SERVER ['REMOTE_ADDR']; ?>">
</form>

<form role="form" method="post" id="form-booking-lated" action="<?= get_permalink(getIdPage('send')); ?>">
    <input type="hidden" name="full-name" value="<?= $firstName .' '. $lastName; ?>">
    <input type="hidden" name="email" value="<?= $email; ?>">
    <input type="hidden" name="phone" value="<?= $phone; ?>">
    <input type="hidden" name="address" value="<?= $address; ?>">
    <input type="hidden" name="notes" value="<?= $notes; ?>">
    <input type="hidden" name="member" value="<?= $numPeople; ?>">
    <input type="hidden" name="id-tour" value="<?= $tourID; ?>">
    <input type="hidden" name="tour-name" value="<?= $tour->post_title; ?>">
    <input type="hidden" name="tour-date" value="<?= $fieldTour['tour_start'];?>">
    <input type="hidden" name="price-tour" value="<?= $totalPrice; ?>">
</form>

<?php
get_footer();

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        $('.tourmaster-online-payment-method').on('click', function() {
            $('#payment-onepay').submit();
        });

        $('.tourmaster-payment-method-booking').on('click', function() {
            $('#form-booking-lated').submit();
        });

        $('#tourmaster-tour-booking-bar-price-breakdown-link').click(function() {
            $(this).siblings('.tourmaster-price-breakdown').slideToggle(200);
        });
    });
</script>
