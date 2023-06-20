<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 5/30/2023
 * Time: 1:52 PM
 *
 * Template Name: About Us
 */

$obj = get_queried_object();

get_header();
?>
<div class="traveltour-page-title-wrap  traveltour-style-medium traveltour-left-align" style="background-image: url(<?= get_field('banner', $obj->ID); ?>)">
    <div class="traveltour-header-transparent-substitute"></div>
    <div class="traveltour-page-title-overlay"></div>
    <div class="traveltour-page-title-container traveltour-container">
        <div class="traveltour-page-title-content traveltour-item-pdlr">
            <h1 class="traveltour-page-title"><?= $obj->post_title?></h1>
            <div class="traveltour-page-caption">Justo Vulputate Vehicula</div>
        </div>
    </div>
</div>
<div class="traveltour-page-wrapper" id="traveltour-page-wrapper">
    <div class="gdlr-core-page-builder-body">
        <div class="gdlr-core-pbf-wrapper " style="padding: 0px 0px 0px 0px;">
            <div class="gdlr-core-pbf-background-wrap"></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">

                    <?php
                    $fieldSkill = get_field('ki_nang', $obj->ID);
                    ?>

                    <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 109px 80px 80px 0px;" data-sync-height="height-3">
                            <div class="gdlr-core-pbf-background-wrap"></div>
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js  gdlr-core-sync-height-content">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 35px ;">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 36px ;letter-spacing: 0px ;text-transform: none ;">
                                                <?= $fieldSkill['thong_tin']['title']?><span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 0px ;">
                                        <div class="gdlr-core-text-box-item-content" style="font-size: 17px ;">
                                            <p><?= $fieldSkill['thong_tin']['content']?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-column gdlr-core-column-30">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 105px 0px 30px 0px;" data-sync-height="height-3">
                            <div class="gdlr-core-pbf-background-wrap"></div>
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js  gdlr-core-sync-height-content" data-gdlr-animation="fadeInRight" data-gdlr-animation-duration="600ms" data-gdlr-animation-offset="0.8">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-skill-bar-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-size-small gdlr-core-type-round">
                                        <?php foreach ($fieldSkill['danh_sach_ki_nang'] as $value):?>
                                            <div class="gdlr-core-skill-bar">
                                                <div class="gdlr-core-skill-bar-head gdlr-core-title-font">
                                                    <span class="gdlr-core-skill-bar-title"><?= $value['ten_ki_nang']?></span>
                                                    <span class="gdlr-core-skill-bar-right"><?= $value['do_thong_thao']?></span>
                                                </div>
                                                <div class="gdlr-core-skill-bar-progress">
                                                    <div class="gdlr-core-skill-bar-filled gdlr-core-js" data-width="<?= $value['do_thong_thao']?>" style="background-color: #161616 ;"></div>
                                                </div>
                                            </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $fieldLinhVuc = get_field('linh_vuc', $obj->ID);
                    ?>

                    <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  gdlr-core-column-extend-left" style="padding: 100px 100px 0px 0px;" data-sync-height="height-1">
                            <div class="gdlr-core-pbf-background-wrap" style="background-color: #f1f0f0 ;">
                                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(<?= $fieldLinhVuc['image']?>) ;background-size: cover ;background-position: center ;" data-parallax-speed="0.2"></div>
                            </div>
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js  gdlr-core-sync-height-content" data-gdlr-animation="fadeInLeft" data-gdlr-animation-duration="600ms" data-gdlr-animation-offset="0.8"></div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-column gdlr-core-column-30">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  gdlr-core-column-extend-right" style="padding: 130px 0px 110px 70px;" data-sync-height="height-1" data-sync-height-center>
                            <div class="gdlr-core-pbf-background-wrap" style="background-color: #f2f2f2 ;"></div>
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js  gdlr-core-sync-height-content" data-gdlr-animation="fadeInRight" data-gdlr-animation-duration="600ms" data-gdlr-animation-offset="0.8">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 25px ;">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 33px ;letter-spacing: 0px ;text-transform: none ;">
                                                <?= $fieldLinhVuc['mo_ta']['title']?><span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 15px ;">
                                        <div class="gdlr-core-text-box-item-content" style="font-size: 17px ;">
                                            <p><?= $fieldLinhVuc['mo_ta']['content']?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-style-1">
                                        <ul>
                                            <?php
                                            $count = 1;
                                            foreach ($fieldLinhVuc['ten_linh_vực'] as $value){
                                                if ($count % 2 == 1){ ?>
                                                    <li class=" gdlr-core-skin-divider gdlr-core-with-hover gdlr-core-column-30 gdlr-core-column-first clearfix">
                                                                <span class="gdlr-core-icon-list-icon-wrap gdlr-core-left">
                                                                    <i class="gdlr-core-icon-list-icon-hover fa fa-check-circle" style="font-size: 16px ;"></i>
                                                                    <i class="gdlr-core-icon-list-icon fa fa-check-circle" style="font-size: 16px ;width: 16px ;"></i>
                                                                </span>
                                                        <div class="gdlr-core-icon-list-content-wrap">
                                                            <span class="gdlr-core-icon-list-content" style="font-size: 16px ;"><?= $value['title']; ?></span>
                                                        </div>
                                                    </li>
                                                <?php }else{ ?>
                                                    <li class=" gdlr-core-skin-divider gdlr-core-with-hover gdlr-core-column-30 clearfix">
                                                                <span class="gdlr-core-icon-list-icon-wrap gdlr-core-left">
                                                                    <i class="gdlr-core-icon-list-icon-hover fa fa-check-circle" style="font-size: 16px ;"></i>
                                                                    <i class="gdlr-core-icon-list-icon fa fa-check-circle" style="font-size: 16px ;width: 16px ;"></i>
                                                                </span>
                                                        <div class="gdlr-core-icon-list-content-wrap">
                                                            <span class="gdlr-core-icon-list-content" style="font-size: 16px ;"><?= $value['title']; ?></span>
                                                        </div>
                                                    </li>
                                                <?php }
                                                $count++;
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $fieldServices = get_field('dich_vu', $obj->ID);
                    ?>
                    
                    <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  gdlr-core-column-extend-left" style="padding: 135px 80px 110px 0px;" data-sync-height="height-2" data-sync-height-center>
                            <div class="gdlr-core-pbf-background-wrap" style="background-color: #ffffff ;"></div>
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js  gdlr-core-sync-height-content" data-gdlr-animation="fadeInLeft" data-gdlr-animation-duration="600ms" data-gdlr-animation-offset="0.8">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 35px ;">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 36px ;letter-spacing: 0px ;text-transform: none ;">
                                                <?= $fieldServices['about_services']['title']; ?><span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 25px ;">
                                        <div class="gdlr-core-text-box-item-content" style="font-size: 17px ;">
                                        <p><?= $fieldServices['about_services']['content']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-column gdlr-core-column-30" data-skin="Dark">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  gdlr-core-column-extend-right" style="padding: 110px 0px 50px 80px;" data-sync-height="height-2">
                            <div class="gdlr-core-pbf-background-wrap" style="background-color: #1f1f1f ;"></div>
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js  gdlr-core-sync-height-content" data-gdlr-animation="fadeInRight" data-gdlr-animation-duration="600ms" data-gdlr-animation-offset="0.8">
                                <?php
                                $fieldListService = $fieldServices['danh_sach_dich_vu'];
                                ?>
                                <?php foreach ($fieldListService as $value): ?>
                                    <div class="gdlr-core-pbf-element">
                                        <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-column-service-icon-left gdlr-core-no-caption gdlr-core-item-pdlr">
                                            <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-top: 15px;margin-right: 55px;"></div>
                                            <div class="gdlr-core-column-service-content-wrapper">
                                                <div class="gdlr-core-column-service-title-wrap">
                                                    <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 21px ;text-transform: none ;"><?= $value['title']?></h3>
                                                </div>
                                                <div class="gdlr-core-column-service-content" style="font-size: 16px ;">
                                                    <p><?= $value['content']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 110px 0px 0px 0px;">
            <div class="gdlr-core-pbf-background-wrap" style="background-color: #f0f0f0 ;"></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 60px ;">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 45px ;letter-spacing: 0px ;text-transform: none ;">
                                    Meet The Team<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-personnel-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-personnel-item-style-grid-with-background gdlr-core-personnel-style-grid gdlr-core-with-background">
                            <?php
                            $fieldEmployee = get_field('employee', $obj->ID);
                            ?>
                            <?php
                            $count = 1;
                            foreach ($fieldEmployee as $employee){
                                if ($count  == 1) {
                                    ?>
                                    <div class="gdlr-core-personnel-list-column  gdlr-core-column-20 gdlr-core-column-first gdlr-core-item-pdlr">
                                        <div class="gdlr-core-personnel-list clearfix">
                                            <div class="gdlr-core-personnel-list-image gdlr-core-media-image  gdlr-core-opacity-on-hover gdlr-core-zoom-on-hover">
                                                    <img src="<?= $employee['image']; ?>" width="550" height="500" srcset="<?= $employee['image']; ?> 400w, <?= $employee['image']; ?> 550w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 33vw, 383px" alt=""/>
                                            </div>
                                            <div class="gdlr-core-personnel-list-content-wrap ">
                                                <h3 class="gdlr-core-personnel-list-title">
                                                    <?= $employee['name']; ?>
                                                </h3>
                                                <div class="gdlr-core-personnel-list-position gdlr-core-info-font gdlr-core-skin-caption" style="font-style: normal ;"><?= $employee['job']; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="gdlr-core-personnel-list-column  gdlr-core-column-20 gdlr-core-item-pdlr">
                                        <div class="gdlr-core-personnel-list clearfix">
                                            <div class="gdlr-core-personnel-list-image gdlr-core-media-image  gdlr-core-opacity-on-hover gdlr-core-zoom-on-hover">
                                                    <img src="<?= $employee['image']; ?>" width="550" height="500" srcset="<?= $employee['image']; ?> 400w, <?= $employee['image']; ?> 550w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 33vw, 383px" alt=""/>
                                            </div>
                                            <div class="gdlr-core-personnel-list-content-wrap ">
                                                <h3 class="gdlr-core-personnel-list-title">
                                                    <?= $employee['name']; ?>
                                                </h3>
                                                <div class="gdlr-core-personnel-list-position gdlr-core-info-font gdlr-core-skin-caption" style="font-style: normal ;"><?= $employee['job']; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ++$count;
                                if ($count == 4){
                                    $count = 1;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
