<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 6/5/2023
 * Time: 9:20 AM
 *
 * Template Name: Liên Hệ
 */

$obj = get_queried_object();

$infor = get_field('information', $obj->ID);

get_header();
?>

<div class="traveltour-page-wrapper" id="traveltour-page-wrapper">
    <div class="gdlr-core-page-builder-body">
        <div class="gdlr-core-pbf-wrapper " style="padding: 220px 0px 150px 0px;" data-skin="Dark">
            <div class="gdlr-core-pbf-background-wrap">
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(<?= get_field('banner', $obj->ID); ?>) ;background-size: cover ;background-position: center ;" data-parallax-speed="0.1"></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js " data-gdlr-animation="fadeInUp" data-gdlr-animation-duration="600ms" data-gdlr-animation-offset="0.8">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 75px ;">
                                    <?= $obj->post_title; ?><span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                </h3>
                            </div>
                            <span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 25px ;margin-top: 25px ;">Get Intouch</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gdlr-core-pbf-wrapper ">
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <?php
                    $count = 1;
                    foreach ($infor as $value){
                        if ($count == 1){
                            ?>
                            <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first">
                                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 50px 20px 0px 20px;">
                                    <div class="gdlr-core-pbf-background-wrap"></div>
                                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js " data-gdlr-animation="fadeInUp" data-gdlr-animation-duration="600ms" data-gdlr-animation-offset="0.8">
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-icon-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align" style="padding-bottom: 55px ;">
<!--                                                <i class=" gdlr-core-icon-item-icon  --><?//= $value['contact_method']['icon']; ?><!--" style="color: #454545 ;font-size: 40px ;min-width: 40px ;min-height: 40px ;"></i>-->
                                                <img src="<?= $value['contact_method']['icon']; ?>" style="color: #454545 ;font-size: 40px ;min-width: 40px ;min-height: 40px ; max-height: 50px;">
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 25px ;">
                                                <div class="gdlr-core-title-item-title-wrap">
                                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 18px ;letter-spacing: 1.5px ;">
                                                        <?= $value['contact_method']['name']; ?><span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align" style="padding-bottom: 0px ;">
                                                <div class="gdlr-core-text-box-item-content" style="font-size: 16px ;">
                                                    <p><?= $value['contact_method']['content']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align">
                                                <div class="gdlr-core-text-box-item-content" style="font-size: 16px ;">
                                                    <p>
                                                        <a href="#"> <?= $value['contact_method']['method']; ?></a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }else{
                            if ($value['contact_method']['name'] == 'location'){
                                ?>
                                <div class="gdlr-core-pbf-column gdlr-core-column-20">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 50px 20px 0px 20px;">
                                        <div class="gdlr-core-pbf-background-wrap"></div>
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js " data-gdlr-animation="fadeInDown" data-gdlr-animation-duration="600ms" data-gdlr-animation-offset="0.8">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-icon-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align" style="padding-bottom: 55px ;">
<!--                                                    <i class=" gdlr-core-icon-item-icon  --><?//= $value['contact_method']['icon']; ?><!--" style="color: #454545 ;font-size: 40px ;min-width: 40px ;min-height: 40px ;"></i>-->
                                                    <img src="<?= $value['contact_method']['icon']; ?>" style="color: #454545 ;font-size: 40px ;min-width: 40px ;min-height: 40px ; max-height: 50px;">
                                                </div>
                                            </div>
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 25px ;">
                                                    <div class="gdlr-core-title-item-title-wrap">
                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 18px ;letter-spacing: 1.5px ;">
                                                            <?= $value['contact_method']['name']; ?><span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align" style="padding-bottom: 0px ;">
                                                    <div class="gdlr-core-text-box-item-content" style="font-size: 16px ;">
                                                        <p> <?= $value['contact_method']['content']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align">
                                                    <div class="gdlr-core-text-box-item-content" style="font-size: 16px ;">
                                                        <p>
                                                            <a href="<?= $value['contact_method']['method']; ?>">
                                                                View On Map
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="gdlr-core-pbf-column gdlr-core-column-20">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js "
                                         style="padding: 50px 20px 0px 20px;">
                                        <div class="gdlr-core-pbf-background-wrap"></div>
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js "
                                             data-gdlr-animation="fadeInDown" data-gdlr-animation-duration="600ms"
                                             data-gdlr-animation-offset="0.8">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-icon-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align"
                                                     style="padding-bottom: 55px ;">
<!--                                                    <i class=" gdlr-core-icon-item-icon  --><?//= $value['contact_method']['icon']; ?><!--" style="color: #454545 ;font-size: 40px ;min-width: 40px ;min-height: 40px ;"></i>-->
                                                    <img src="<?= $value['contact_method']['icon']; ?>" style="color: #454545 ;font-size: 40px ;min-width: 40px ;min-height: 40px ; max-height: 50px;">
                                                </div>
                                            </div>
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr"
                                                     style="padding-bottom: 25px ;">
                                                    <div class="gdlr-core-title-item-title-wrap">
                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title"
                                                            style="font-size: 18px ;letter-spacing: 1.5px ;">
                                                            <?= $value['contact_method']['name']; ?><span
                                                                    class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align"
                                                     style="padding-bottom: 0px ;">
                                                    <div class="gdlr-core-text-box-item-content"
                                                         style="font-size: 16px ;">
                                                        <p> <?= $value['contact_method']['content']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align">
                                                    <div class="gdlr-core-text-box-item-content"
                                                         style="font-size: 16px ;">
                                                        <p>
                                                            <a href="#">
                                                                <?= $value['contact_method']['method']; ?>
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        $count ++ ;
                        if($count == 4){
                            $count = 1;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 95px 0px 50px 0px;" data-skin="Grey">
            <div class="gdlr-core-pbf-background-wrap" style="background-color: #f3f3f3 ;"></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                            <div class="gdlr-core-pbf-background-wrap"></div>
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js " style="max-width: 760px ;">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 35px ;font-weight: 900 ;letter-spacing: 2px ;">
                                                Leave us your info <span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h3>
                                        </div>
                                        <span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;">and we will get back to you.</span>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 50px ;">
                                        <div class="gdlr-core-divider-container" style="max-width: 60px ;">
                                            <div class="gdlr-core-divider-line gdlr-core-skin-divider" style="border-width: 4px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-contact-form-7-item gdlr-core-item-pdlr gdlr-core-item-pdb ">
                                        <div class="wpcf7 no-js" id="wpcf7-f1319-p1964-o1" lang="en-US" dir="ltr">
                                            <div class="screen-reader-response">
                                                <p role="status" aria-live="polite" aria-atomic="true"></p>
                                                <ul></ul>
                                            </div>
                                            <?php
                                            $form_shortcode = '[contact-form-7 id="266" title="Contact"]';
                                            echo do_shortcode($form_shortcode);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 0px 0px 0px 0px;">
            <div class="gdlr-core-pbf-background-wrap"></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-pbf-wrapper-full-no-space">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-wp-google-map-plugin-item gdlr-core-item-pdlr gdlr-core-item-pdb " style="padding-bottom: 0px ;">
                            <style>
                                .gm-style-iw {
                                    line-height: inherit !important;
                                }
                            </style>
                            <div class="wpgmp_map_container wpgmp-map-1" rel="map1">
                                <div class="wpgmp_map_parent">
                                    <div class="wpgmp_map" style="width:100%; height:500px;" id="map1">
                                        <?php
                                        $fieldMap = get_field('map', $obj->ID);
                                        ?>
                                        <?= $fieldMap; ?>
                                        <style>
                                            .wpgmp_map_parent .wpgmp_map iframe{
                                                width: 100%;
                                                height: 100%;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 80px 0px 50px 0px;">
            <div class="gdlr-core-pbf-background-wrap" style="background-color: #2d2d2d ;"></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-social-network-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-item-pdlr">
                            <a href="/cdn-cgi/l/email-protection#3714" target="_blank" class="gdlr-core-social-network-icon" title="email" style="font-size: 20px ;color: #ffffff ;">
                                <i class="fa fa-envelope"></i>
                            </a>
                            <a href="#" target="_blank" class="gdlr-core-social-network-icon" title="facebook" style="font-size: 20px ;color: #ffffff ;margin-left: 40px ;">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#" target="_blank" class="gdlr-core-social-network-icon" title="google-plus" style="font-size: 20px ;color: #ffffff ;margin-left: 40px ;">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a href="#" target="_blank" class="gdlr-core-social-network-icon" title="skype" style="font-size: 20px ;color: #ffffff ;margin-left: 40px ;">
                                <i class="fa fa-skype"></i>
                            </a>
                            <a href="#" target="_blank" class="gdlr-core-social-network-icon" title="twitter" style="font-size: 20px ;color: #ffffff ;margin-left: 40px ;">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
