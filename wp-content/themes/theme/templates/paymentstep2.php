<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 6/8/2023
 * Time: 9:26 AM
 * Template Name: Payment Step 2
 */

$postID = no_sql_injection($_GET['tour-id']);

$people = no_sql_injection($_GET['tour-people']);

$tour = get_post($postID);

$fieldInformation = get_field('general_imformation', $postID);

$fieldTour = get_field('imformation_tour', $postID);

get_header();
?>

<div class="traveltour-page-wrapper" id="traveltour-page-wrapper">
    <div class="tourmaster-page-wrapper tourmaster-payment-style-1" id="tourmaster-page-wrapper">
        <div class="tourmaster-payment-head tourmaster-with-background" style="background-image: url(<?= get_the_post_thumbnail_url($tour->ID); ?>);">
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
                        <div class="tourmaster-payment-step-item tourmaster-current " data-step="2"><span class="tourmaster-payment-step-item-icon"><i class="fa fa-check"></i><span class="tourmaster-text">2</span></span><span class="tourmaster-payment-step-item-title">Contact Details</span></div>
                        <div class="tourmaster-payment-step-item " data-step="3"><span class="tourmaster-payment-step-item-icon"><i class="fa fa-check"></i><span class="tourmaster-text">3</span></span><span class="tourmaster-payment-step-item-title">Payment</span></div>
                        <div class="tourmaster-payment-step-item " data-step="4"><span class="tourmaster-payment-step-item-icon"><i class="fa fa-check"></i><span class="tourmaster-text">4</span></span><span class="tourmaster-payment-step-item-title">Complete</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tourmaster-template-wrapper" id="tourmaster-payment-template-wrapper">
<!--            data-ajax-url="--><?//= admin_url('admin-ajax.php'); ?><!--" data-booking-detail="{&quot;tour-id&quot;:&quot;4647&quot;,&quot;tour-date&quot;:&quot;2023-06-08&quot;,&quot;tour-room&quot;:&quot;1&quot;,&quot;tour-adult&quot;:[&quot;2&quot;,&quot;&quot;],&quot;tour-children&quot;:[&quot;&quot;,&quot;&quot;]}-->
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
                                        <div class="tourmaster-tour-booking-bar-summary-people-amount"><span class="tourmaster-head">Traveller : </span><span class="tourmaster-tail"><?= $people; ?></span></div>
                                    </div>
<!--                                    <div class="tourmaster-tour-booking-bar-coupon-wrap"><input type="text" class="tourmaster-tour-booking-bar-coupon" name="coupon-code" placeholder="Coupon Code" value="" /><a class="tourmaster-tour-booking-bar-coupon-validate" data-ajax-url="--><?//= admin_url('admin-ajax.php'); ?><!--" data-tour-id="4647" data-tid="">Apply</a>-->
<!--                                        <div class="tourmaster-tour-booking-coupon-message"></div>-->
<!--                                    </div>-->
                                    <div class="tourmaster-tour-booking-bar-price-breakdown-wrap"><span class="tourmaster-tour-booking-bar-price-breakdown-link" id="tourmaster-tour-booking-bar-price-breakdown-link">View Price Breakdown</span>
                                        <div class="tourmaster-price-breakdown">
                                            <div class="tourmaster-price-breakdown-base-price-wrap">
                                                <div class="tourmaster-price-breakdown-base-price"><span class="tourmaster-head">Adult Base Price</span><span class="tourmaster-tail"><span class="tourmaster-price-detail"><?= $people?> x $<?= $fieldInformation['save_price']?></span><span class="tourmaster-price">$<?= ($people * $fieldInformation['save_price']); ?></span></span></div>
                                            </div>
                                            <div class="tourmaster-price-breakdown-summary">
                                                <div class="tourmaster-price-breakdown-sub-total "><span class="tourmaster-head">Sub Total Price</span><span class="tourmaster-tail tourmaster-right">$<?= $total = ($people * $fieldInformation['save_price']); ?></span></div>
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
<!--                                <a class="tourmaster-tour-booking-continue tourmaster-button tourmaster-payment-step" data-step="3">Next Step</a>-->
<!--                                <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>-->
<!--                                <script>-->
<!--                                    window.tourmaster_total_price = "5668"-->
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
                    <form action="<?= get_permalink(getIdPage('paymentstep3')); ?>" method="get">
                        <input type="hidden" name="tour-id" value="<?= $postID?>">
                        <input type="hidden" name="number-people" value="<?= $people?>">
                        <input type="hidden" name="name-tour" value="<?= $tour->post_title; ?>">
                        <input type="hidden" name="total-tour" value="<?= $totalPrice; ?>">
                            <input type="hidden" name="date-tout" value="<?= $fieldTour['tour_start']; ?>">
                    <div class="tourmaster-tour-payment-content" id="tourmaster-tour-payment-content">
                        <div class="tourmaster-payment-traveller-info-wrap tourmaster-form-field tourmaster-with-border">
                            <h3 class="tourmaster-payment-traveller-info-title"><i class="fa fa-suitcase"></i>Traveller Details</h3>
                            <?php
                            for ($i=0; $i<$people; $i++){
                                ?>
                                <div class="tourmaster-traveller-info-field clearfix  tourmaster-with-info-title"><span class="tourmaster-head">Traveller <?= ($i + 1); ?></span><span class="tourmaster-tail clearfix">
												<div class="tourmaster-combobox-wrap tourmaster-traveller-info-title"><select name="traveller_title[]">
														<option value="mr">Mr</option>
														<option value="mrs">Mrs</option>
														<option value="ms">Ms</option>
														<option value="miss">Miss</option>
														<option value="master">Master</option>
													</select>
                                                </div>
                                        <input type="text" class="tourmaster-traveller-info-input" name="traveller_first_name[]" value="" placeholder="First Name *" data-required />
                                        <input type="text" class="tourmaster-traveller-info-input" name="traveller_last_name[]" value="" placeholder="Last Name *" data-required />
												<div style="float: left; width: 50%">
													<div class="tourmaster-traveller-info-custom">
														<div class="tourmaster-combobox-wrap"><select name="traveller_age[]">
																<option value="">Age</option>
																<option value="12-15">12-15</option>
																<option value="15-18">15-18</option>
																<option value="18+ 20">18+ 20</option>
															</select>
                                                        </div>
													</div>
												</div>
												<div style="float: left; width: 50%">
													<div class="tourmaster-traveller-info-custom"><input type="text" name="traveller_phone[]" value="" placeholder="Phone *" data-required /></div>
												</div>
											</span>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="tourmaster-payment-contact-wrap tourmaster-form-field tourmaster-with-border">
                            <h3 class="tourmaster-payment-contact-title"><i class="fa fa-file-text-o"></i>Contact Details</h3>
                            <div class="tourmaster-contact-field tourmaster-contact-field-first_name tourmaster-type-text clearfix">
                                <div class="tourmaster-head">First Name<span class="tourmaster-req">*</span></div>
                                <div class="tourmaster-tail clearfix"><input type="text" name="first_name" value="" data-required /></div>
                            </div>
                            <div class="tourmaster-contact-field tourmaster-contact-field-last_name tourmaster-type-text clearfix">
                                <div class="tourmaster-head">Last Name<span class="tourmaster-req">*</span></div>
                                <div class="tourmaster-tail clearfix"><input type="text" name="last_name" value="" data-required /></div>
                            </div>
                            <div class="tourmaster-contact-field tourmaster-contact-field-email tourmaster-type-email clearfix">
                                <div class="tourmaster-head">Email<span class="tourmaster-req">*</span></div>
                                <div class="tourmaster-tail clearfix"><input type="email" name="email" value="" data-required /></div>
                            </div>
                            <div class="tourmaster-contact-field tourmaster-contact-field-phone tourmaster-type-text clearfix">
                                <div class="tourmaster-head">Phone<span class="tourmaster-req">*</span></div>
                                <div class="tourmaster-tail clearfix"><input type="text" name="phone" value="" data-required /></div>
                            </div>
                            <div class="tourmaster-contact-field tourmaster-contact-field-country tourmaster-type-combobox clearfix">
                                <div class="tourmaster-head">Country<span class="tourmaster-req">*</span></div>
                                <div class="tourmaster-tail clearfix">
                                    <div class="tourmaster-combobox-wrap"><select name="country" data-required>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cabo Verde">Cabo Verde</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Central African Republic (CAR)">Central African Republic (CAR)</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                                            <option value="Republic of the Congo">Republic of the Congo</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote d&#039;Ivoire">Cote d&#039;Ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Kosovo">Kosovo</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macedonia">Macedonia</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia">Micronesia</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="North Korea">North Korea</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestine">Palestine</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Korea">South Korea</option>
                                            <option value="South Sudan">South Sudan</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Timor-Leste">Timor-Leste</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates (UAE)">United Arab Emirates (UAE)</option>
                                            <option value="United Kingdom (UK)">United Kingdom (UK)</option>
                                            <option value="United States of America (USA)" selected>United States of America (USA)</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Vatican City (Holy See)">Vatican City (Holy See)</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select></div>
                                </div>
                            </div>
                            <div class="tourmaster-contact-field tourmaster-contact-field-contact_address tourmaster-type-textarea clearfix">
                                <div class="tourmaster-head">Address</div>
                                <div class="tourmaster-tail clearfix"><textarea name="contact_address"></textarea></div>
                            </div>
                        </div>
                        <div class="tourmaster-payment-additional-note-wrap tourmaster-form-field tourmaster-with-border">
                            <h3 class="tourmaster-payment-additional-note-title"><i class="fa fa-file-text-o"></i>Notes</h3>
                            <div class="tourmaster-additional-note-field clearfix"><span class="tourmaster-head">Additional Notes</span><span class="tourmaster-tail clearfix"><textarea name="additional_notes"></textarea></span></div>
                        </div>
                        <div class="tourmaster-tour-booking-required-error tourmaster-notification-box tourmaster-failure" data-default="Please fill all required fields." data-email="Invalid E-Mail, please try again." data-phone="Invalid phone number, please try again."></div>
<!--                        <a class="tourmaster-tour-booking-continue tourmaster-button tourmaster-payment-step" data-step="3">Next Step</a>-->
                        <input type="submit" value="Next Step" />
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->


<?php
get_footer();
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tourmaster-tour-booking-bar-price-breakdown-link').click(function() {
            $(this).siblings('.tourmaster-price-breakdown').slideToggle(200);
        });
    });

    $(document).ready(function() {
        $('#editSpan').click(function() {
            // Thay đổi thuộc tính "action" của form
            // $('#myForm').attr('action', '');
            ``
            // Gửi form
            $('#myForm').submit();
        });
    });
</script>
