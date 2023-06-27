<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 5/22/2023
 * Time: 2:32 PM
 */

$obj = get_queried_object();

$terms = wp_get_post_terms($obj->ID ,'location');

$fieldInformation = get_field("imformation_tour", $obj->ID);

$fieldBooking = get_field("information_booking_tour", $obj->ID);

get_header();
?>
<script>
    var id = document.querySelector('#traveltour-with-sticky-navigation');
    id.classList.remove("single-post");
    id.classList.add('single-tour');
</script>

<div class="traveltour-page-wrapper" id="traveltour-page-wrapper">
    <div class="tourmaster-page-wrapper tourmaster-tour-style-2 tourmaster-with-sidebar" id="tourmaster-page-wrapper">

        <?php
        $fieldDetail = get_field("gallery", $obj->ID);
        ?>
        <div class="tourmaster-single-header" style="background-image: url(<?= get_the_post_thumbnail_url($obj->ID); ?>);">
            <div class="tourmaster-single-header-background-overlay"></div>
            <div class="tourmaster-single-header-overlay"></div>
            <div class="tourmaster-single-header-container tourmaster-container">
                <div class="tourmaster-single-header-container-inner">
                    <div class="tourmaster-single-header-title-wrap tourmaster-item-pdlr">
                        <div class="tourmaster-single-header-gallery-wrap">
                            <?php
                            $count = 1;
                            foreach ($fieldDetail['gallery'] as $image):?>
                            <?php if ($count == 1):?>
                                    <a class="gdlr-core-lightgallery gdlr-core-js tourmaster-single-header-gallery-button" href="<?= $image?>" data-lightbox-group="tourmaster-single-header-gallery">
                                        <i class="fa fa-image"></i>
                                        Gallery
                                    </a>
                                <?php $count = 2; else:?>
                                    <a class="gdlr-core-lightgallery gdlr-core-js " href="<?= $image?>" data-lightbox-group="tourmaster-single-header-gallery"></a>
                            <?php endif;?>
                            <?php endforeach;?>
                            <a  href="<?= $fieldDetail['video']?>" style="padding: 10px 15px 8px; background-color: white; border-radius: 3px; font-size: 12px; cursor: pointer; display: inline-block; margin-right: 10px; color: #2a2a2a;">
                                <i class="fa fa-video-camera"></i>
                                Video
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tourmaster-template-wrapper">
            <div class="tourmaster-tour-booking-bar-container tourmaster-container">
                <div class="tourmaster-tour-booking-bar-container-inner">
                    <div class="tourmaster-tour-booking-bar-anchor tourmaster-item-mglr"></div>
                    <div class="tourmaster-tour-booking-bar-wrap tourmaster-item-mglr" id="tourmaster-tour-booking-bar-wrap">
                        <div class="tourmaster-tour-booking-bar-outer">
                            <div class="tourmaster-header-price tourmaster-item-mglr">
                                <?php
                                $fieldGareral = get_field('general_imformation', $obj->ID);

                                if ($fieldGareral['best_seller'] == "no"){?>
                                    <div class="tourmaster-header-price-ribbon">Best Seller</div>
                                    <?php
                                }
                                ?>
                                <div class="tourmaster-header-price-wrap">
                                    <?php if (empty($fieldGareral['old_price'])):?>
                                        <div class="tourmaster-tour-price-wrap">
                                                                        <span class="tourmaster-tour-price">
                                                                            <span class="tourmaster-head">From</span>
                                                                            <span class="tourmaster-tail">$<?= $fieldGareral['save_price']?></span>
                                                                        </span>
                                        </div>
                                    <?php else:?>
                                        <div class="tourmaster-tour-price-wrap tourmaster-discount">
                                            <i class="fa-light fa-tag" style="font-size: 23px; margin-right: 15px"></i>
                                                                        <span class="tourmaster-tour-price">
<!--                                                                            <span class="tourmaster-head">From</span>-->
                                                                            <span class="tourmaster-tail">$<?= $fieldGareral['old_price']?></span>
                                                                            </span>
                                            <span class="tourmaster-tour-discount-price">$<?= $fieldGareral['save_price']?></span>
                                        </div>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="tourmaster-tour-booking-bar-inner">
                                <div class="tourmaster-booking-tab-title clearfix" id="tourmaster-booking-tab-title">
                                    <div class="tourmaster-booking-tab-title-item tourmaster-active" data-tourmaster-tab="booking">Booking Form</div>
                                    <div class="tourmaster-booking-tab-title-item" data-tourmaster-tab="enquiry">Enquiry Form</div>
                                </div>
                                <div class="tourmaster-booking-tab-content" data-tourmaster-tab="enquiry">
                                    <div class="tourmaster-tour-booking-enquiry-wrap">
                                        <?php
                                        $formEnquiry = '[contact-form-7 id="330" title="Enquiry Form"]';
                                        echo do_shortcode($formEnquiry);
                                        ?>
                                    </div>
                                </div>
                                <div class="tourmaster-booking-tab-content tourmaster-active" data-tourmaster-tab="booking">
                                    <form class="tourmaster-single-tour-booking-fields tourmaster-update-header-price tourmaster-form-field tourmaster-with-border" method="get" action="<?= get_permalink(getIdPage('paymentstep2')); ?>" >
<!--                                        id="tourmaster-single-tour-booking-fields" data-ajax-url="https://demo.goodlayers.com/traveltour/main4/wp-admin/admin-ajax.php"-->
                                        <input type="hidden" name="tour-id" value="<?= $obj->ID; ?>"/>
                                        <div class="tourmaster-tour-booking-date clearfix" data-step="1">
                                            <i class="fa fa-calendar"></i>
                                            <div class="tourmaster-tour-booking-date-input">
                                                <?php
                                                $datetest = date_create($fieldInformation['tour_start']);
                                                $dateFormat = date_format($datetest, 'Y-m-d');
                                                ?>
                                                <div class="tourmaster-tour-booking-date-display"><?= $fieldInformation['tour_start']; ?></div>
                                                <input type="hidden" name="tour-date" value="<?= $dateFormat?>"/>
                                            </div>
                                        </div>
                                        <div class="tourmaster-tour-booking-available" data-step="2">
                                            <?php
                                            if (!empty($fieldBooking['available']) || $fieldBooking['available'] != 0){
                                                ?>
                                                Available: <?= $fieldBooking['available']; ?> seats
                                                <?php
                                            }else{
                                                ?>
                                                Not Available!
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="tourmaster-tour-booking-people clearfix" data-step="4">
                                            <div class="tourmaster-tour-booking-next-sign">
                                                <span></span>
                                            </div>
                                            <i class="fa fa-users"></i>
                                            <div class="tourmaster-tour-booking-people-input">
                                                <div class="tourmaster-combobox-wrap">
                                                    <select name="tour-people">
                                                        <option value="">Number Of People</option>
                                                        <?php
                                                        for ($i=1; $i<=$fieldBooking['max_number_people']; $i++){
                                                            ?>
                                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tourmaster-tour-booking-submit" data-step="5">
                                            <div class="tourmaster-tour-booking-next-sign">
                                                <span></span>
                                            </div>
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.007 512.007" style="enable-background:new 0 0 512.007 512.007;" xml:space="preserve">
                                                                <path d="M397.413,199.303c-2.944-4.576-8-7.296-13.408-7.296h-112v-176c0-7.552-5.28-14.08-12.672-15.648
			c-7.52-1.6-14.88,2.272-17.952,9.152l-128,288c-2.208,4.928-1.728,10.688,1.216,15.2c2.944,4.544,8,7.296,13.408,7.296h112v176
			c0,7.552,5.28,14.08,12.672,15.648c1.12,0.224,2.24,0.352,3.328,0.352c6.208,0,12-3.616,14.624-9.504l128-288
			C400.805,209.543,400.389,203.847,397.413,199.303z" fill="#f97150"/>
                                                            </svg>
                                            <i class="fa fa-check-circle"></i>
                                            <div class="tourmaster-tour-booking-submit-input">
                                                <input class="tourmaster-button" type="submit" value="Proceed Booking"/>
                                                <div class="tourmaster-tour-booking-submit-error">* Please select all required fields to proceed to the next step.</div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="tourmaster-lightbox-content-wrap tourmaster-style-1" data-tmlb-id="proceed-without-login">
                                        <div class="tourmaster-lightbox-head">
                                            <h3 class="tourmaster-lightbox-title">Proceed Booking</h3>
                                            <i class="tourmaster-lightbox-close icon_close"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tourmaster-tour-booking-bar-widget  traveltour-sidebar-area">
                            <div id="text-11" class="widget widget_text traveltour-widget">
                                <div class="textwidget">
                                    <span class="gdlr-core-space-shortcode" style="margin-top: -20px ;"></span>
                                    <div class="gdlr-core-widget-list-shortcode" id="gdlr-core-widget-list-0">
                                        <h3 class="gdlr-core-widget-list-shortcode-title">Why Book With Us?</h3>
                                        <ul>
                                            <?php
                                            $reasons = get_field('reason' ,'option');
                                            foreach ($reasons as $reason){
                                                ?>
                                                <li>
                                                    <?= $reason['icon']; ?>
                                                    <?= $reason['title']; ?>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div id="text-12" class="widget widget_text traveltour-widget">
                                <div class="textwidget">
                                    <span class="gdlr-core-space-shortcode" style="margin-top: -10px ;"></span>
                                    <div class="gdlr-core-widget-box-shortcode " style="color: #ffefe8 ;padding:  50px 40px 30px 40px;background-image: url(https://demo.goodlayers.com/traveltour/main4/wp-content/uploads/2019/04/widget-bg-1.jpg) ;">
                                        <h3 class="gdlr-core-widget-box-shortcode-title" style="color: #ffffff ;">Get a Question?</h3>
                                        <div class="gdlr-core-widget-box-shortcode-content">
                                            <p>Do not hesitage to give us a call. We are an expert team and we are happy to talk to you.</p>
                                            <p>
                                                <i class="fa fa-phone" style="font-size: 20px ;color: #ffe786 ;margin-right: 10px ;"></i>
                                                <span style="font-size: 20px; color: #ffffff; font-weight: 600;"><?= get_field('phone', 'option'); ?></span>
                                                <br />
                                                <span class="gdlr-core-space-shortcode" style="margin-top: -15px ;"></span>
                                                <br />
                                                <i class="fa fa-envelope-o" style="font-size: 17px ;color: #ffe786 ;margin-right: 10px ;"></i>
                                                <span style="font-size: 14px; color: #fff; font-weight: 600;">
<!--                                                                <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d890bdb4a898bfb7b7bcb4b9a1bdaaabf6bbb7b5">[email &#160;protected]</a>-->
                                                    <?= get_field('email', 'option'); ?>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tourmaster-single-tour-content-wrap">
                <div class="gdlr-core-page-builder-body">
                    <div class="gdlr-core-pbf-wrapper " style="padding: 0px 0px 0px 0px;">
                        <div class="gdlr-core-pbf-background-wrap"></div>
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-pbf-wrapper-full">
                                <div class="gdlr-core-pbf-element">
                                    <div class="tourmaster-content-navigation-item-wrap clearfix" style="padding-bottom: 0px;">
                                        <div class="tourmaster-content-navigation-item-outer" id="tourmaster-content-navigation-item-outer" style="border-bottom-width: 1px;border-bottom-style: solid;">
                                            <div class="tourmaster-content-navigation-item-container tourmaster-container">
                                                <div class="tourmaster-content-navigation-item tourmaster-item-pdlr">
                                                    <a class="tourmaster-content-navigation-tab tourmaster-active" href="#detail">Detail</a>
                                                    <a class="tourmaster-content-navigation-tab " href="#photos">Photos</a>
                                                    <a class="tourmaster-content-navigation-tab " href="#itinerary">Itinerary</a>
                                                    <a class="tourmaster-content-navigation-tab " href="#map">Map</a>
                                                    <a class="tourmaster-content-navigation-tab " href="#faq">FAQ</a>
                                                    <a class="tourmaster-content-navigation-tab " href="#tourmaster-single-review">Reviews</a>
                                                    <div class="tourmaster-content-navigation-slider" style="background-color: #f97150;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-wrapper " style="padding: 70px 0px 40px 0px;" id="detail">
                        <div class="gdlr-core-pbf-background-wrap"></div>
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                <div class="gdlr-core-pbf-element">
                                    <div class="tourmaster-tour-title-item tourmaster-item-pdlr tourmaster-item-pdb clearfix gdlr-core-left-align">
                                        <h1 class="tourmaster-tour-title-item-title" style="font-size: 27px;font-weight: 700;text-transform: none;"><?= $obj->post_title?></h1>
                                        <div class="tourmaster-tour-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <span class="tourmaster-tour-rating-text"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-style-1">
                                        <ul>
                                            <li class=" gdlr-core-skin-divider gdlr-core-column-20 gdlr-core-column-first clearfix" style="margin-bottom: 20px ;">
                                                                <span class="gdlr-core-icon-list-icon-wrap gdlr-core-left" style="margin-top: 0px ;margin-right: 18px ;">
                                                                    <i class="fa-sharp fa-regular fa-clock" style="color: #f97150 ;font-size: 22px ;width: 22px ;"></i>
                                                                </span>
                                                <div class="gdlr-core-icon-list-content-wrap">
                                                    <?php if (empty($fieldGareral['day_vacation']) && empty($fieldGareral['night_vacation'])):?>
                                                        <span class="gdlr-core-icon-list-content" style="font-size: 15px ;"><?= $fieldGareral['hour']?> Hours</span>
                                                    <?php else :?>
                                                        <span class="gdlr-core-icon-list-content" style="font-size: 15px ;"><?= $fieldGareral['day_vacation']?> Days <?= $fieldGareral['night_vacation']?> Nights</span>
                                                    <?php endif;?>
                                                </div>
                                            </li>
                                            <?php
                                            if (!empty($fieldInformation['max_people']) || ($fieldInformation['max_people']>0)){ ?>
                                                <li class=" gdlr-core-skin-divider gdlr-core-column-20 clearfix" style="margin-bottom: 20px ;">
                                                                <span class="gdlr-core-icon-list-image gdlr-core-left" style="margin-top: 0px ;margin-right: 18px ;">
                                                                    <img src="https://a6e8z9v6.stackpathcdn.com/traveltour/main4/wp-content/uploads/2017/01/single-icon-2.png" alt="" width="36" height="18" title="single-icon-2"/>
                                                                </span>
                                                    <div class="gdlr-core-icon-list-content-wrap">
                                                        <span class="gdlr-core-icon-list-content" style="font-size: 15px ;">Max People : <?= $fieldInformation['max_people']?></span>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                            <?php
                                            if ($fieldInformation['wifi_available'] == "yes"){ ?>
                                                <li class=" gdlr-core-skin-divider gdlr-core-column-20 clearfix" style="margin-bottom: 20px ;">
                                                                <span class="gdlr-core-icon-list-image gdlr-core-left" style="margin-top: 0px ;margin-right: 18px ;">
                                                                    <img src="https://a6e8z9v6.stackpathcdn.com/traveltour/main4/wp-content/uploads/2017/01/single-icon-3.png" alt="" width="30" height="21" title="single-icon-3"/>
                                                                </span>
                                                    <div class="gdlr-core-icon-list-content-wrap">
                                                        <span class="gdlr-core-icon-list-content" style="font-size: 15px ;">Wifi Available</span>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                            <?php

                                            $dateStart = date_create($fieldInformation['tour_start']);
                                            $dateEnd = date_create($fieldInformation['tour_end']);
                                            ?>
                                            <li class=" gdlr-core-skin-divider gdlr-core-column-20 gdlr-core-column-first clearfix" style="margin-bottom: 20px ;">
                                                                <span class="gdlr-core-icon-list-image gdlr-core-left" style="margin-top: 0px ;margin-right: 18px ;">
                                                                    <img src="https://a6e8z9v6.stackpathcdn.com/traveltour/main4/wp-content/uploads/2017/01/single-icon-6.png" alt="" width="22" height="22" title="single-icon-6"/>
                                                                </span>
                                                <div class="gdlr-core-icon-list-content-wrap">
                                                    <span class="gdlr-core-icon-list-content" style="font-size: 15px ;"><?= date_format($dateStart, 'M d')?>’ - <?= date_format($dateEnd, 'M d')?>'</span>
                                                </div>
                                            </li>
                                            <?php
                                            if ($fieldInformation['min_age'] > 0 || !empty($fieldInformation['min_age']))
                                            ?>
                                            <li class=" gdlr-core-skin-divider gdlr-core-column-20 clearfix" style="margin-bottom: 20px ;">
                                                                <span class="gdlr-core-icon-list-image gdlr-core-left" style="margin-top: 0px ;margin-right: 18px ;">
                                                                    <img src="https://a6e8z9v6.stackpathcdn.com/traveltour/main4/wp-content/uploads/2017/01/single-icon-4.png" alt="" width="36" height="22" title="single-icon-4"/>
                                                                </span>
                                                <div class="gdlr-core-icon-list-content-wrap">
                                                    <span class="gdlr-core-icon-list-content" style="font-size: 15px ;">Min Age : <?= $fieldInformation['min_age']; ?>+</span>
                                                </div>
                                            </li>
                                            <?php
                                            if (!empty($fieldInformation['pickup'])){ ?>
                                                <li class=" gdlr-core-skin-divider gdlr-core-column-20 clearfix" style="margin-bottom: 20px ;">
                                                                <span class="gdlr-core-icon-list-image gdlr-core-left" style="margin-top: 0px ;margin-right: 18px ;">
                                                                    <img src="https://a6e8z9v6.stackpathcdn.com/traveltour/main4/wp-content/uploads/2017/01/single-icon-5.png" alt="" width="30" height="23" title="single-icon-5"/>
                                                                </span>
                                                    <div class="gdlr-core-icon-list-content-wrap">
                                                        <span class="gdlr-core-icon-list-content" style="font-size: 15px ;">Pickup: <?= $fieldInformation['pickup']; ?></span>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 45px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 41px ;">
                                        <div class="gdlr-core-text-box-item-content" style="text-transform: none ;">
                                            <?= $obj->post_content; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $fieldService = get_field('service', $obj->ID);
                                $fieldUtilities = $fieldService['utilities'];
                                ?>
                                <?php
                                foreach ($fieldUtilities as $item){ ?>
                                    <div class="gdlr-core-pbf-element">
                                        <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 20px ;">
                                            <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                        </div>
                                    </div>

                                    <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                            <div class="gdlr-core-pbf-background-wrap"></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px ;">
                                                        <div class="gdlr-core-title-item-title-wrap">
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;">
                                                                <?= $item['name']; ?> <span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-30">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 0px ;">
                                                        <div class="gdlr-core-text-box-item-content">
                                                            <p>
                                                                <?= $item['utility']?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>

                                <?php
                                $fieldDeparture = $fieldService['departure_&_return_location'];
                                if (!empty($fieldDeparture)){
                                    ?>
                                    <div class="gdlr-core-pbf-element">
                                        <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 20px ;">
                                            <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                            <div class="gdlr-core-pbf-background-wrap"></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px ;">
                                                        <div class="gdlr-core-title-item-title-wrap">
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;">
                                                                Departure & Return Location <span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-30">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 0px ;">
                                                        <div class="gdlr-core-text-box-item-content">
                                                            <p>
                                                                <?= $fieldDeparture['name_location']; ?> (<a href="<?= $fieldDeparture['link_map'];?>">Google Map</a>)
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                                <?php
                                $fieldDepartureTime = $fieldService['departure_time'];
                                if (!empty(departure_time) || $fieldDepartureTime != 0){
                                    ?>
                                    <div class="gdlr-core-pbf-element">
                                        <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 19px ;">
                                            <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                            <div class="gdlr-core-pbf-background-wrap"></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px ;">
                                                        <div class="gdlr-core-title-item-title-wrap">
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;">
                                                                Departure Time<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-30">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 0px ;">
                                                        <div class="gdlr-core-text-box-item-content">
                                                            <p><?= $fieldDepartureTime?> Hours Before Start</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                                <?php
                                $fieldBedroom = $fieldService['bedroom'];
                                if (!empty($fieldBedroom) || $fieldBedroom!=0){
                                    ?>
                                    <div class="gdlr-core-pbf-element">
                                        <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 19px ;">
                                            <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                            <div class="gdlr-core-pbf-background-wrap"></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px ;">
                                                        <div class="gdlr-core-title-item-title-wrap">
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;">
                                                                Bedroom<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-30">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 0px ;">
                                                        <div class="gdlr-core-text-box-item-content" style="text-transform: none ;">
                                                            <p><?= $fieldBedroom?> Bedrooms</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                                <?php
                                $fieldBathroom = $fieldService['bathroom'];
                                if (!empty($fieldBathroom) || $fieldBathroom != 0){
                                    ?>
                                    <div class="gdlr-core-pbf-element">
                                        <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 19px ;">
                                            <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                            <div class="gdlr-core-pbf-background-wrap"></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px ;">
                                                        <div class="gdlr-core-title-item-title-wrap">
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;">
                                                                Bathroom<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-30">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 0px ;">
                                                        <div class="gdlr-core-text-box-item-content" style="text-transform: none ;">
                                                            <p><?= $fieldBathroom; ?> Bathrooms</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 25px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-background-wrap"></div>
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px ;">
                                                    <div class="gdlr-core-title-item-title-wrap">
                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;">
                                                            Price Includes<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-style-1" style="padding-bottom: 15px ;">
                                                    <ul>
                                                        <?php foreach ($fieldService['price_includes'] as $item):?>
                                                            <li class=" gdlr-core-skin-divider clearfix">
                                                                            <span class="gdlr-core-icon-list-icon-wrap gdlr-core-left">
                                                                                <i class="fa-solid fa-check gdlr-core-icon-list-icon" style="color: #f97150 ;font-size: 16px ;width: 16px ;"></i>
                                                                            </span>
                                                                <div class="gdlr-core-icon-list-content-wrap">
                                                                    <span class="gdlr-core-icon-list-content" style="font-size: 15px ;"><?= $item['name']; ?></span>
                                                                </div>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 24px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-background-wrap"></div>
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px ;">
                                                    <div class="gdlr-core-title-item-title-wrap">
                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;">
                                                            Price Excludes<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-style-1" style="padding-bottom: 15px ;">
                                                    <ul>
                                                        <?php foreach ($fieldService['price_excludes'] as $item):?>
                                                            <li class=" gdlr-core-skin-divider clearfix">
                                                                            <span class="gdlr-core-icon-list-icon-wrap gdlr-core-left">
                                                                                <i class="fa-solid fa-xmark gdlr-core-icon-list-icon" style="color: #7f7f7f ;font-size: 17px ;width: 17px ;"></i>
                                                                            </span>
                                                                <div class="gdlr-core-icon-list-content-wrap">
                                                                    <span class="gdlr-core-icon-list-content" style="font-size: 15px ;"><?= $item['name']; ?></span>
                                                                </div>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 24px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-background-wrap"></div>
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px ;">
                                                    <div class="gdlr-core-title-item-title-wrap">
                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;">
                                                            Complementaries<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-30">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-style-1" style="padding-bottom: 15px ;">
                                                    <ul>
                                                        <?php foreach ($fieldService['complementaries'] as $item):?>
                                                            <li class=" gdlr-core-skin-divider clearfix">
                                                                            <span class="gdlr-core-icon-list-icon-wrap gdlr-core-left">
                                                                                <i class="fa-solid fa-check gdlr-core-icon-list-icon" style="color: #f97150 ;font-size: 16px ;width: 16px ;"></i>
                                                                            </span>
                                                                <div class="gdlr-core-icon-list-content-wrap">
                                                                    <span class="gdlr-core-icon-list-content" style="font-size: 15px ;"><?= $item['name']; ?></span>
                                                                </div>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $fieldExpect = get_field('what_to_expect', $obj->ID);
                                ?>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 55px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h6 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 20px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;">
                                                What to Expect<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 10px ;">
                                        <div class="gdlr-core-text-box-item-content">
                                            <?= $fieldExpect['content']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-style-1">
                                        <ul>
                                            <?php foreach ($fieldExpect['field'] as $item):?>
                                                <li class=" gdlr-core-skin-divider clearfix">
                                                                <span class="gdlr-core-icon-list-icon-wrap gdlr-core-left" style="margin-top: 4px ;margin-right: 13px ;">
                                                                    <i class="gdlr-core-icon-list-icon fa fa-dot-circle-o" style="color: #444444 ;font-size: 15px ;width: 15px ;"></i>
                                                                </span>
                                                    <div class="gdlr-core-icon-list-content-wrap">
                                                        <span class="gdlr-core-icon-list-content" style="font-size: 15px ;"><?= $item['title']; ?></span>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 15px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $fieldImage = get_field('photos', $obj->ID);
                    ?>
                    <div class="gdlr-core-pbf-wrapper " style="padding: 0px 0px 30px 0px;" id="photos">
                        <div class="gdlr-core-pbf-background-wrap"></div>
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 35px ;">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h6 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;">
                                                                <span class="gdlr-core-title-item-left-icon" style="font-size: 18px ;">
<!--                                                                    <i class="icon_images" style="color: #1e1e1e ;"></i>-->
                                                                    <i class="fa-light fa-image" style="color: #1e1e1e ;"></i>
                                                                </span>
                                                Photos<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-gallery-item gdlr-core-item-pdb clearfix  gdlr-core-gallery-item-style-slider gdlr-core-item-pdlr ">
                                        <div class="gdlr-core-flexslider flexslider gdlr-core-js-2 " data-type="slider" data-effect="default" data-nav="both">
                                            <ul class="slides">
                                                <?php foreach ($fieldImage as $item):?>
                                                    <li>
                                                        <div class="gdlr-core-gallery-list gdlr-core-media-image">
                                                            <a class="gdlr-core-lightgallery gdlr-core-js " href="<?= $item['url']; ?>" data-lightbox-group="gdlr-core-img-group-1">
                                                                <img src="<?= $item['url']; ?>" width="1500" height="1000" srcset="<?= $item['url']; ?> 400w, <?= $item['url']?> 600w, <?= $item['url']?> 800w, <?= $item['url']?> 1500w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 100vw, 1150px" alt="" style="max-height: 500px"/>
                                                                <span class="gdlr-core-image-overlay "><i class="gdlr-core-image-overlay-icon  gdlr-core-size-22 fa fa-search"></i></span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-wrapper " style="padding: 20px 0px 30px 0px;" data-skin="Blue Icon" id="itinerary">
                        <div class="gdlr-core-pbf-background-wrap"></div>
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 55px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider" style="border-width: 2px;"></div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 35px ;">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h6 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;">
                                                Itinerary<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <?php
                                    $fieldItinerary = get_field('itinerary', $obj->ID);
                                    ?>
                                    <div class="gdlr-core-toggle-box-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-toggle-box-style-background-title gdlr-core-left-align" style="padding-bottom: 15px ;">
                                        <?php
                                        foreach ($fieldItinerary as $item){
                                            ?>
                                            <div class="gdlr-core-toggle-box-item-tab clearfix  gdlr-core-active">
                                                <div class="gdlr-core-toggle-box-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-toggle-box-item-content-wrapper">
                                                    <h4 class="gdlr-core-toggle-box-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">
                                                        <span class="gdlr-core-head"><?= $item['time']; ?></span>
                                                        <?= $item['title']; ?>
                                                    </h4>
                                                    <div class="gdlr-core-toggle-box-item-content">
                                                        <p><?= $item['content']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-wrapper " style="padding: 0px 0px 30px 0px;" data-skin="Blue Icon" id="map">
                        <div class="gdlr-core-pbf-background-wrap"></div>
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 55px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider" style="border-width: 2px;"></div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 35px ;">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h6 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;">
                                                                <span class="gdlr-core-title-item-left-icon" style="font-size: 18px ;">
                                                                    <i class="fa fa-map-o" style="color: #5e5e5e ;"></i>
                                                                </span>
                                                Map<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 25px ;">
                                        <div class="gdlr-core-text-box-item-content" style="text-transform: none ;">
                                            <div class="road-map">
                                                <?php
                                                $fieldMap = get_field('map', $obj->ID);
                                                ?>
                                                <?= $fieldMap; ?>
                                                <style>
                                                    .gdlr-core-text-box-item-content .road-map iframe{
                                                        width: 100%;
                                                        height: 480px;
                                                    }
                                                </style>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-wrapper " style="padding: 20px 0px 30px 0px;" id="faq">
                        <div class="gdlr-core-pbf-background-wrap"></div>
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 55px ;">
                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider" style="border-width: 2px;"></div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 35px ;">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h6 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;">
                                                FAQ<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-accordion-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-accordion-style-box-icon">
                                        <?php
                                        $fieldFAQ = get_field('faq', $obj->ID);
                                        ?>
                                        <?php
                                        $count = 1;
                                        foreach ($fieldFAQ as $item){
                                            if ($count == 1) {
                                                $i = 1;
                                                $count = 2;
                                                ?>
                                                <div class="gdlr-core-accordion-item-tab clearfix  gdlr-core-active">
                                                    <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon  gdlr-core-skin-e-background gdlr-core-skin-border icon-<?= $i?>" data-id="<?= $i?>" >
                                                        <i id="icon-<?= $i?>" class="fa-light fa-minus icon-check"></i>
                                                    </div>
                                                    <div class="gdlr-core-accordion-item-content-wrapper">
                                                        <h4 class="gdlr-core-accordion-item-title gdlr-core-js "><?= $item['title']; ?></h4>
                                                        <div class="gdlr-core-accordion-item-content">
                                                            <p><?= $item['content']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }else{
                                                ?>
                                                <div class="gdlr-core-accordion-item-tab clearfix">
                                                    <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon  gdlr-core-skin-e-background gdlr-core-skin-border " data-id="<?= $i?>" >
                                                        <i id="icon-<?= $i?>" class="fa-light fa-plus icon-check"></i>
                                                    </div>
                                                    <div class="gdlr-core-accordion-item-content-wrapper">
                                                        <h4 class="gdlr-core-accordion-item-title gdlr-core-js "><?= $item['title']; ?></h4>
                                                        <div class="gdlr-core-accordion-item-content">
                                                            <p><?= $item['content']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            $i++;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tourmaster-single-tour-read-more-gradient"></div>
                <div class="tourmaster-single-tour-read-more-wrap">
                    <div class="tourmaster-container">
                        <a class="tourmaster-button tourmaster-item-mglr" href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="tourmaster-single-related-tour tourmaster-tour-item tourmaster-style-grid">
                <div class="tourmaster-single-related-tour-container tourmaster-container">
                    <h3 class="tourmaster-single-related-tour-title tourmaster-item-pdlr">Related Tours</h3>
                    <div class="tourmaster-tour-item-holder clearfix ">
                        <?php
                        $arrTourRelated = array(
                            'post_type'=>'dia_diem_du_lich',
                            'tax_query'=>array(
                                'relation'=>'AND',
                                array(
                                    'taxonomy'=>'location',
                                    'field'=>'slug',
                                    'terms'=>$terms[0]->slug,
                                ),
                            ),
                        );

                        $listTourRelated = new WP_Query($arrTourRelated);
                        ?>

                        <?php
                        $count = 1;
                        foreach ($listTourRelated->posts as $item){
                            $field = get_field('general_imformation', $item->ID);
                            if ($count % 2 == 1) {
                                ?>
                                <div class="gdlr-core-item-list  tourmaster-column-30 tourmaster-item-pdlr tourmaster-column-first">
                                    <div class="tourmaster-tour-grid  tourmaster-tour-grid-style-1 tourmaster-price-right-title">
                                        <div class="tourmaster-tour-grid-inner">
                                            <div class="tourmaster-tour-thumbnail tourmaster-media-image ">
                                                <a href="<?= $item->guid; ?>">
                                                    <img src="<?= get_the_post_thumbnail_url($item->ID)?>" width="700" height="430" srcset="<?= get_the_post_thumbnail_url($item->ID)?> 400w, <?= get_the_post_thumbnail_url($item->ID)?> 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 100vw, 1150px" alt=""/>
                                                </a>
                                            </div>
                                            <div class="tourmaster-tour-content-wrap ">
                                                <h3 class="tourmaster-tour-title gdlr-core-skin-title">
                                                    <a href="<?= $item->guid?>"><?= $item->post_title; ?></a>
                                                </h3>
                                                <?php if (empty($field['old_price'])):?>
                                                    <div class="tourmaster-tour-price-wrap">
                                                                        <span class="tourmaster-tour-price">
                                                                            <span class="tourmaster-head">From</span>
                                                                            <span class="tourmaster-tail">$<?= $field['save_price']?></span>
                                                                        </span>
                                                    </div>
                                                <?php else:?>
                                                    <div class="tourmaster-tour-price-wrap tourmaster-discount">
                                                                        <span class="tourmaster-tour-price">
                                                                            <span class="tourmaster-head">From</span>
                                                                            <span class="tourmaster-tail">$<?= $field['old_price']?></span>
                                                                            </span>
                                                        <span class="tourmaster-tour-discount-price">$<?= $field['save_price']?></span>
                                                    </div>
                                                <?php endif;?>
                                                <div class="tourmaster-tour-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <span class="tourmaster-tour-rating-text"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }else{
                                ?>
                                <div class="gdlr-core-item-list  tourmaster-column-30 tourmaster-item-pdlr">
                                    <div class="tourmaster-tour-grid  tourmaster-tour-grid-style-1 tourmaster-price-right-title">
<!--                                        <div class="tourmaster-thumbnail-ribbon gdlr-core-outer-frame-element" style="color: #ffffff;background-color: #f97150;">-->
<!--                                            <div class="tourmaster-thumbnail-ribbon-cornor" style="border-right-color: rgba(249, 113, 80, 0.5);"></div>-->
<!--                                            Best Seller-->
<!--                                        </div>-->
                                        <div class="tourmaster-tour-grid-inner">
                                            <div class="tourmaster-tour-thumbnail tourmaster-media-image ">
                                                <a href="<?= $item->guid; ?>">
                                                    <img src="<?= get_the_post_thumbnail_url($item->ID)?>" width="700" height="430" srcset="<?= get_the_post_thumbnail_url($item->ID)?> 400w, <?= get_the_post_thumbnail_url($item->ID)?> 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 100vw, 1150px" alt=""/>
                                                </a>
                                            </div>
                                            <div class="tourmaster-tour-content-wrap ">
                                                <h3 class="tourmaster-tour-title gdlr-core-skin-title">
                                                    <a href="<?= $item->guid?>"><?= $item->post_title; ?></a>
                                                </h3>
                                                <?php if (empty($field['old_price'])):?>
                                                    <div class="tourmaster-tour-price-wrap">
                                                                        <span class="tourmaster-tour-price">
                                                                            <span class="tourmaster-head">From</span>
                                                                            <span class="tourmaster-tail">$<?= $field['save_price']?></span>
                                                                        </span>
                                                    </div>
                                                <?php else:?>
                                                    <div class="tourmaster-tour-price-wrap tourmaster-discount">
                                                                        <span class="tourmaster-tour-price">
                                                                            <span class="tourmaster-head">From</span>
                                                                            <span class="tourmaster-tail">$<?= $field['old_price']?></span>
                                                                            </span>
                                                        <span class="tourmaster-tour-discount-price">$<?= $field['save_price']?></span>
                                                    </div>
                                                <?php endif;?>
                                                <div class="tourmaster-tour-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <span class="tourmaster-tour-rating-text"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            $count++;
                        }
                        ?>
                    </div>
                </div>
            </div>
<!--            <div class="tourmaster-single-review-container tourmaster-container">-->
<!--                <div class="tourmaster-single-review-item tourmaster-item-pdlr">-->
<!--                    <div class="tourmaster-single-review" id="tourmaster-single-review">-->
<!--                        <div class="tourmaster-single-review-head clearfix">-->
<!--                            <div class="tourmaster-single-review-head-info clearfix">-->
<!--                                <div class="tourmaster-tour-rating">-->
<!--                                    <span class="tourmaster-tour-rating-text">1 Review</span>-->
<!--                                    <i class="fa fa-star"></i>-->
<!--                                    <i class="fa fa-star"></i>-->
<!--                                    <i class="fa fa-star"></i>-->
<!--                                    <i class="fa fa-star"></i>-->
<!--                                    <i class="fa fa-star"></i>-->
<!--                                </div>-->
<!--                                <div class="tourmaster-single-review-filter" id="tourmaster-single-review-filter">-->
<!--                                    <div class="tourmaster-single-review-sort-by">-->
<!--                                        <span class="tourmaster-head">Sort By:</span>-->
<!--                                        <span class="tourmaster-sort-by-field" data-sort-by="rating">Rating</span>-->
<!--                                        <span class="tourmaster-sort-by-field tourmaster-active" data-sort-by="date">Date</span>-->
<!--                                    </div>-->
<!--                                    <div class="tourmaster-single-review-filter-by tourmaster-form-field tourmaster-with-border">-->
<!--                                        <div class="tourmaster-combobox-wrap">-->
<!--                                            <select id="tourmaster-filter-by">-->
<!--                                                <option value="">Filter By</option>-->
<!--                                                <option value="solo">Solo</option>-->
<!--                                                <option value="couple">Couple</option>-->
<!--                                                <option value="family">Family</option>-->
<!--                                                <option value="group">Group</option>-->
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="tourmaster-single-review-content" id="tourmaster-single-review-content" data-tour-id="4649" data-ajax-url="https://demo.goodlayers.com/traveltour/main4/wp-admin/admin-ajax.php">-->
<!--                            <div class="tourmaster-single-review-content-item clearfix">-->
<!--                                <div class="tourmaster-single-review-user clearfix">-->
<!--                                    <div class="tourmaster-single-review-avatar tourmaster-media-image">-->
<!--                                        <img alt='' src='https://secure.gravatar.com/avatar/e9fb3348941be9d33fa944e0c6441345?s=85&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/e9fb3348941be9d33fa944e0c6441345?s=170&#038;d=mm&#038;r=g 2x' class='avatar avatar-85 photo' height='85' width='85' loading='lazy' decoding='async'/>-->
<!--                                    </div>-->
<!--                                    <h4 class="tourmaster-single-review-user-name">Jenny Doe</h4>-->
<!--                                    <div class="tourmaster-single-review-user-type">Couple Traveller</div>-->
<!--                                </div>-->
<!--                                <div class="tourmaster-single-review-detail">-->
<!--                                    <div class="tourmaster-single-review-detail-description">-->
<!--                                        <p>Very nice city</p>-->
<!--                                    </div>-->
<!--                                    <div class="tourmaster-single-review-detail-rating">-->
<!--                                        <i class="fa fa-star"></i>-->
<!--                                        <i class="fa fa-star"></i>-->
<!--                                        <i class="fa fa-star"></i>-->
<!--                                        <i class="fa fa-star"></i>-->
<!--                                        <i class="fa fa-star"></i>-->
<!--                                    </div>-->
<!--                                    <div class="tourmaster-single-review-detail-date">April 4, 2019</div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</div>

<?php
get_footer();
?>
