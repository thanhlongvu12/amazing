<?php
/**
 * Template Name: Home Page
*/

$uri = get_template_directory_uri();

$ID = get_the_ID();

$titlePage = get_field('tieu_de_trang', $ID);

$evaluate = get_field('danh_gia', $ID);



?>

<?php get_header(); ?>
<div class="traveltour-page-wrapper" id="traveltour-page-wrapper">
    <div class="gdlr-core-page-builder-body">
        <div class="gdlr-core-pbf-wrapper " style="padding: 165px 0px 165px 0px;" data-skin="orange" id="gdlr-core-wrapper-1">
            <div class="gdlr-core-pbf-background-wrap">
                <?php $fieldBanner = get_field('image', $ID); ?>
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(<?= $fieldBanner; ?>) ;background-size: cover ;background-position: top center ;" data-parallax-speed="0.2"></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 50px ;">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 52px ;text-transform: none ;color: #ffffff ;">
                                    <?= $titlePage['title']?><span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                </h3>
                            </div>
                            <span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 21px ;font-style: normal ;color: #ffffff ;margin-top: 5px ;"><?= $titlePage['solution']?></span>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                            <div class="gdlr-core-pbf-background-wrap"></div>
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js " style="max-width: 900px ;">
                                <div class="gdlr-core-pbf-element">
                                    <div class="tourmaster-tour-search-item clearfix tourmaster-style-column tourmaster-column-count-4 tourmaster-item-pdlr tourmaster-input-style-no-border" style="padding-bottom: 0px;">
                                        <div class="tourmaster-tour-search-wrap clearfix ">
                                            <form class="tourmaster-form-field  tourmaster-medium" action="<?= get_permalink(getIdPage('searchtour')); ?>" method="GET">
                                                <div class="tourmaster-tour-search-field tourmaster-tour-search-field-keywords" style="padding-right: 2px;margin-bottom: 2px;">
                                                    <div class="tourmaster-tour-search-field-inner">
                                                        <input name="tour-search" type="text" placeholder="Keywords" value=""/>
                                                    </div>
                                                </div>
                                                <div class="tourmaster-tour-search-field tourmaster-tour-search-field-tax" style="padding-right: 2px;margin-bottom: 2px;">
                                                    <div class="tourmaster-combobox-wrap">
                                                        <?php
                                                        $location = get_terms('location');
                                                        ?>
                                                        <select type="search" name="tax-tour-destination">
                                                            <option value="">Destination</option>
                                                            <?php foreach ($location as $value): ?>
                                                            <option value="<?= $value->slug?>"><?= $value->name?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="tourmaster-tour-search-field tourmaster-tour-search-field-duration" style="padding-right: 2px;margin-bottom: 2px;">
                                                    <div class="tourmaster-combobox-wrap">
                                                        <select name="duration">
                                                            <option value="">Duration</option>
                                                            <option value="1">1 Day Tour</option>
                                                            <option value="2">2-4 Days Tour</option>
                                                            <option value="5">5-7 Days Tour</option>
                                                            <option value="7">7+ Days Tour</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <input class="tourmaster-tour-search-submit" type="submit" value="Search"/>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gdlr-core-pbf-wrapper " style="margin-top: -40px;margin-right: auto;margin-left: auto;padding: 50px 20px 0px 30px;max-width: 1200px ;">
            <div class="gdlr-core-pbf-background-wrap" style="border-radius: 3px 3px 3px 3px;-moz-border-radius: 3px 3px 3px 3px;-webkit-border-radius: 3px 3px 3px 3px;background-color: #f97251 ;background: linear-gradient(rgba(249, 114, 81, 1), rgba(255, 152, 108, 1));-moz-background: linear-gradient(rgba(249, 114, 81, 1), rgba(255, 152, 108, 1));-o-background: linear-gradient(rgba(249, 114, 81, 1), rgba(255, 152, 108, 1));-webkit-background: linear-gradient(rgba(249, 114, 81, 1), rgba(255, 152, 108, 1));"></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class=" gdlr-core-pbf-wrapper-container-inner gdlr-core-item-mglr clearfix">
                        <?php for ($i=0; $i<count($evaluate); $i++):?>
                            <?php if($i == 0){?>
                                <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first" data-skin="White Text">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-background-wrap"></div>
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-column-service-icon-left gdlr-core-no-caption gdlr-core-item-pdlr" style="padding-bottom: 30px;">
                                                    <div class="gdlr-core-column-service-media gdlr-core-media-image">
                                                        <img src="<?= $evaluate[$i]['image']?>" alt="" width="59" height="59" title="" />
                                                    </div>
                                                    <div class="gdlr-core-column-service-content-wrapper">
                                                        <div class="gdlr-core-column-service-title-wrap" style="margin-bottom: 10px ;">
                                                            <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 13px ;letter-spacing: 2px ;"><?= $evaluate[$i]['title']?></h3>
                                                        </div>
                                                        <div class="gdlr-core-column-service-content" style="text-transform: none ;">
                                                            <p><?= $evaluate[$i]['content']?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="gdlr-core-pbf-column gdlr-core-column-20" data-skin="White Text">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-background-wrap"></div>
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-column-service-icon-left gdlr-core-no-caption gdlr-core-item-pdlr" style="padding-bottom: 30px;">
                                                    <div class="gdlr-core-column-service-media gdlr-core-media-image">
                                                        <img src="<?= $evaluate[$i]['image']?>" alt="" width="59" height="59" title="" />
                                                    </div>
                                                    <div class="gdlr-core-column-service-content-wrapper">
                                                        <div class="gdlr-core-column-service-title-wrap" style="margin-bottom: 10px ;">
                                                            <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 13px ;letter-spacing: 2px ;"><?= $evaluate[$i]['title']?></h3>
                                                        </div>
                                                        <div class="gdlr-core-column-service-content" style="text-transform: none ;">
                                                            <p><?= $evaluate[$i]['content']?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        <?php endfor;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 73px 0px 0px 0px;">
            <div class="gdlr-core-pbf-background-wrap"></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px ;">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 28px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">
                                    Popular Destinations<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-button-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align" style="padding-bottom: 52px ;">
                            <a class="gdlr-core-button  gdlr-core-button-transparent gdlr-core-center-align gdlr-core-button-no-border" href="/traveltour/main4/destinations/" style="font-size: 15px ;font-weight: 400 ;letter-spacing: 0px ;color: #e66836 ;padding: 8px 0px 0px 0px;">
                                <span class="gdlr-core-content">View All Destinations</span>
                                <i class="gdlr-core-pos-right fa fa-long-arrow-right" style="font-size: 17px ;"></i>
                            </a>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="tourmaster-tour-category clearfix " style="padding-bottom: 0px;">
                            <?php
                            $count = 1;
                            $term = get_terms('location');

                            foreach ($term as $t){
                                $field = get_field('location', $t);
                                if ($count == 1){?>
                                    <div class="tourmaster-tour-category-grid-3 tourmaster-item-list  tourmaster-item-pdlr tourmaster-item-mgb tourmaster-column-40 tourmaster-column-first tourmaster-with-thumbnail">
                                        <div class="tourmaster-tour-category-item-wrap" style="border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                            <div class="tourmaster-tour-category-thumbnail tourmaster-media-image">
                                                <img src="<?= $field['image']?>" width="1200" height="567" srcset="<?= $field['image']?> 400w, <?= $field['image']?> 600w, <?= $field['image']?> 800w, <?= $field['image']?>" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 100vw, 1150px" alt="" style="max-height: 370px"/>
                                            </div>
                                            <div class="tourmaster-tour-category-count"><?= $t->count?> tours</div>
                                            <div class="tourmaster-tour-category-overlay"></div>
                                            <div class="tourmaster-tour-category-overlay-front"></div>
                                            <div class="tourmaster-tour-category-head">
                                                <div class="tourmaster-tour-category-head-display clearfix">
                                                    <h3 class="tourmaster-tour-category-title"><?= $t->name?></h3>
                                                </div>
                                                <div class="tourmaster-tour-category-head-animate">
                                                    <div class="tourmaster-tour-category-description"><?= $field['description']?></div>
                                                    <a class="tourmaster-tour-category-head-link" href="<?= get_term_link($t->term_id); ?>">View all tours</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }else{?>
                                    <div class="tourmaster-tour-category-grid-3 tourmaster-item-list  tourmaster-item-pdlr tourmaster-item-mgb tourmaster-column-20 tourmaster-with-thumbnail">
                                        <div class="tourmaster-tour-category-item-wrap" style="border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                            <div class="tourmaster-tour-category-thumbnail tourmaster-media-image">
                                                <img src="<?= $field['image']?>" width="600" height="600" srcset="<?= $field['image']?> 400w, <?= $field?> 600w, <?= $field['image']?>" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 100vw, 1150px" alt="" style="max-height: 370px"/>
                                            </div>
                                            <div class="tourmaster-tour-category-count"><?= $t->count?> tours</div>
                                            <div class="tourmaster-tour-category-overlay"></div>
                                            <div class="tourmaster-tour-category-overlay-front"></div>
                                            <div class="tourmaster-tour-category-head">
                                                <div class="tourmaster-tour-category-head-display clearfix">
                                                    <h3 class="tourmaster-tour-category-title"><?= $t->name?></h3>
                                                </div>
                                                <div class="tourmaster-tour-category-head-animate">
                                                    <div class="tourmaster-tour-category-description"><?= $field['description']?></div>
                                                    <a class="tourmaster-tour-category-head-link" href="<?= get_term_link($t->term_id); ?>">View all tours</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                $count = 2;
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 50px 0px 60px 0px;">
            <div class="gdlr-core-pbf-background-wrap">
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(https://a6e8z9v6.stackpathcdn.com/traveltour/main4/wp-content/uploads/2019/04/title-bg-popular-3.jpg) ;background-repeat: no-repeat ;background-position: top center ;" data-parallax-speed="0.05"></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px ;">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 28px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">
                                    <?php
                                    $title_tour_noi_tieng = get_field('title', $ID);
                                    ?>
                                    <?= $title_tour_noi_tieng['title']; ?><span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-button-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align" style="padding-bottom: 52px ;">
                            <a class="gdlr-core-button  gdlr-core-button-transparent gdlr-core-center-align gdlr-core-button-no-border" href="  <?= get_permalink(getIdPage('tourlist')); ?>" style="font-size: 15px ;font-weight: 400 ;letter-spacing: 0px ;color: #e66836 ;padding: 8px 0px 0px 0px;">
                                <span class="gdlr-core-content"><?= $title_tour_noi_tieng['name_link']; ?></span>
                                <i class="gdlr-core-pos-right fa fa-long-arrow-right" style="font-size: 17px ;"></i>
                            </a>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element-test">
                        <div class="tourmaster-tour-item clearfix  tourmaster-tour-item-style-grid tourmaster-item-pdlr tourmaster-tour-item-column-3">
                            <div class="gdlr-core-flexslider flexslider gdlr-core-js-2  gdlr-core-v1" data-type="carousel" data-column="3" data-nav="navigation-outer" data-nav-parent="tourmaster-tour-item" data-disable-autoslide="1">
                                <ul class="slides">
                                    <?php
                                    $popularTour = get_field('tour_noi_tieng', $ID);
                                    foreach ($popularTour as $item){
                                        $fieldTour = get_field('general_imformation', $item->ID);
                                        if ($fieldTour['best_seller'] == 'yes'){?>
                                            <li class="gdlr-core-item-mglr">
                                                <div class="tourmaster-tour-grid  tourmaster-tour-frame tourmaster-tour-grid-style-2 tourmaster-price-right-title">
                                                    <div class="tourmaster-tour-grid-inner" style="box-shadow: 0 0 23px rgba(10, 10, 10,0.08); -moz-box-shadow: 0 0 23px rgba(10, 10, 10,0.08); -webkit-box-shadow: 0 0 23px rgba(10, 10, 10,0.08); border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                                        <div class="tourmaster-tour-thumbnail tourmaster-media-image  tourmaster-zoom-on-hover gdlr-core-outer-frame-element">
                                                            <a class="gdlr-core-lightgallery gdlr-core-js " href="https://www.youtube.com/watch?v=eZjmjT5SLYs">
                                                                <div class="tourmaster-tour-thumbnail-overlay">
                                                                    <i class="fa fa-film"></i>
                                                                </div>
                                                                <img src="<?= get_the_post_thumbnail_url($item->ID)?>" width="700" height="500" srcset="<?= get_the_post_thumbnail_url($item->ID)?> 400w, <?= get_the_post_thumbnail_url($item->ID)?> 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 33vw, 383px" alt=""/>
                                                            </a>
                                                        </div>
                                                        <div class="tourmaster-tour-content-wrap gdlr-core-skin-e-background gdlr-core-js" data-sync-height="tour-item-35">
                                                            <div class="tourmaster-thumbnail-ribbon gdlr-core-outer-frame-element" style="color: #ffffff;background-color: #f97150;">
                                                                <div class="tourmaster-thumbnail-ribbon-cornor" style="border-right-color: rgba(249, 113, 80, 0.5);"></div>
                                                                Best Seller
                                                            </div>
                                                            <h3 class="tourmaster-tour-title gdlr-core-skin-title" style="font-size: 18px;font-weight: 400;letter-spacing: 0px;text-transform: none;">
                                                                <a href="<?= $item->guid?>">
                                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve" style="fill: #f97150">
                                                                                <path d="M397.413,199.303c-2.944-4.576-8-7.296-13.408-7.296h-112v-176c0-7.552-5.28-14.08-12.672-15.648
			c-7.52-1.6-14.88,2.272-17.952,9.152l-128,288c-2.208,4.928-1.728,10.688,1.216,15.2c2.944,4.544,8,7.296,13.408,7.296h112v176
			c0,7.552,5.28,14.08,12.672,15.648c1.12,0.224,2.24,0.352,3.328,0.352c6.208,0,12-3.616,14.624-9.504l128-288
			C400.805,209.543,400.389,203.847,397.413,199.303z"/>
                                                                            </svg>
                                                                    <span><?= $item->post_title?></span>
                                                                </a>
                                                            </h3>
                                                            <div class="tourmaster-tour-price-wrap tourmaster-discount">
                                                                <?php if (empty($fieldTour['old_price'])):?>
                                                                        <span class="tourmaster-tour-price">
                                                                            <span class="tourmaster-head">From</span>
                                                                            <span class="tourmaster-tail">$<?= $fieldTour['save_price']?></span>
                                                                        </span>
                                                                <?php else:?>
                                                                        <span class="tourmaster-tour-price">
                                                                            <span class="tourmaster-head">From</span>
                                                                            <span class="tourmaster-tail">$<?= $fieldTour['old_price']?></span>
                                                                        </span>
                                                                <span class="tourmaster-tour-discount-price">$<?= $fieldTour['save_price']?></span>
                                                                <?php endif;?>
                                                            </div>
                                                            <div class="tourmaster-tour-info-wrap clearfix">
                                                                <div class="tourmaster-tour-info tourmaster-tour-info-duration-text">
                                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 465 465" xml:space="preserve">
                                                                                <path d="M279.591,423.714c-3.836,0.956-7.747,1.805-11.629,2.52c-10.148,1.887-16.857,11.647-14.98,21.804
				c0.927,4.997,3.765,9.159,7.618,11.876c3.971,2.795,9.025,4.057,14.175,3.099c4.623-0.858,9.282-1.867,13.854-3.008
				c10.021-2.494,16.126-12.646,13.626-22.662C299.761,427.318,289.618,421.218,279.591,423.714z"/>
                                                                        <path d="M417.887,173.047c1.31,3.948,3.811,7.171,6.97,9.398c4.684,3.299,10.813,4.409,16.662,2.475
				c9.806-3.256,15.119-13.83,11.875-23.631c-1.478-4.468-3.118-8.95-4.865-13.314c-3.836-9.59-14.714-14.259-24.309-10.423
				c-9.585,3.834-14.256,14.715-10.417,24.308C415.271,165.528,416.646,169.293,417.887,173.047z"/>
                                                                        <path d="M340.36,397.013c-3.299,2.178-6.704,4.286-10.134,6.261c-8.949,5.162-12.014,16.601-6.854,25.546
				c1.401,2.433,3.267,4.422,5.416,5.942c5.769,4.059,13.604,4.667,20.127,0.909c4.078-2.352,8.133-4.854,12.062-7.452
				c8.614-5.691,10.985-17.294,5.291-25.912C360.575,393.686,348.977,391.318,340.36,397.013z"/>
                                                                        <path d="M465.022,225.279c-0.407-10.322-9.101-18.356-19.426-17.953c-10.312,0.407-18.352,9.104-17.947,19.422
				c0.155,3.945,0.195,7.949,0.104,11.89c-0.145,6.473,3.021,12.243,7.941,15.711c2.931,2.064,6.488,3.313,10.345,3.401
				c10.322,0.229,18.876-7.958,19.105-18.285C465.247,234.756,465.208,229.985,465.022,225.279z"/>
                                                                        <path d="M414.835,347.816c-8.277-6.21-19.987-4.524-26.186,3.738c-2.374,3.164-4.874,6.289-7.434,9.298
				c-6.69,7.86-5.745,19.666,2.115,26.361c0.448,0.38,0.901,0.729,1.371,1.057c7.814,5.509,18.674,4.243,24.992-3.171
				c3.057-3.59,6.037-7.323,8.874-11.102C424.767,365.735,423.089,354.017,414.835,347.816z"/>
                                                                        <path d="M442.325,280.213c-9.855-3.09-20.35,2.396-23.438,12.251c-1.182,3.765-2.492,7.548-3.906,11.253
				c-3.105,8.156-0.13,17.13,6.69,21.939c1.251,0.879,2.629,1.624,4.126,2.19c9.649,3.682,20.454-1.159,24.132-10.812
				c1.679-4.405,3.237-8.906,4.646-13.382C457.66,293.795,452.178,283.303,442.325,280.213z"/>
                                                                        <path d="M197.999,426.402c-16.72-3.002-32.759-8.114-47.968-15.244c-0.18-0.094-0.341-0.201-0.53-0.287
				c-3.584-1.687-7.162-3.494-10.63-5.382c-0.012-0.014-0.034-0.023-0.053-0.031c-6.363-3.504-12.573-7.381-18.606-11.628
				C32.24,331.86,11.088,209.872,73.062,121.901c13.476-19.122,29.784-35.075,47.965-47.719c0.224-0.156,0.448-0.311,0.67-0.468
				c64.067-44.144,151.06-47.119,219.089-1.757l-14.611,21.111c-4.062,5.876-1.563,10.158,5.548,9.518l63.467-5.682
				c7.12-0.64,11.378-6.799,9.463-13.675L387.61,21.823c-1.908-6.884-6.793-7.708-10.859-1.833l-14.645,21.161
				C312.182,7.638,252.303-5.141,192.87,5.165c-5.986,1.036-11.888,2.304-17.709,3.78c-0.045,0.008-0.081,0.013-0.117,0.021
				c-0.225,0.055-0.453,0.128-0.672,0.189C123.122,22.316,78.407,52.207,46.5,94.855c-0.269,0.319-0.546,0.631-0.8,0.978
				c-1.061,1.429-2.114,2.891-3.145,4.353c-1.686,2.396-3.348,4.852-4.938,7.308c-0.199,0.296-0.351,0.597-0.525,0.896
				C10.762,149.191-1.938,196.361,0.24,244.383c0.005,0.158-0.004,0.317,0,0.479c0.211,4.691,0.583,9.447,1.088,14.129
				c0.027,0.302,0.094,0.588,0.145,0.89c0.522,4.708,1.177,9.427,1.998,14.145c8.344,48.138,31.052,91.455,65.079,125.16
				c0.079,0.079,0.161,0.165,0.241,0.247c0.028,0.031,0.059,0.047,0.086,0.076c9.142,9.017,19.086,17.357,29.793,24.898
				c28.02,19.744,59.221,32.795,92.729,38.808c10.167,1.827,19.879-4.941,21.703-15.103
				C214.925,437.943,208.163,428.223,197.999,426.402z"/>
                                                                        <path d="M221.124,83.198c-8.363,0-15.137,6.78-15.137,15.131v150.747l137.87,71.271c2.219,1.149,4.595,1.69,6.933,1.69
				c5.476,0,10.765-2.982,13.454-8.185c3.835-7.426,0.933-16.549-6.493-20.384l-121.507-62.818V98.329
				C236.243,89.978,229.477,83.198,221.124,83.198z"/>
                                                                            </svg>
                                                                    <?php if (!empty($fieldTour['day_vacation'])):?>
                                                                        <?= $fieldTour['day_vacation']?> Days
                                                                    <?php endif;?>
                                                                    <?php if (!empty($fieldTour['night_vacation'])):?>
                                                                        <?= $fieldTour['night_vacation']?> Nights
                                                                    <?php endif;?>
                                                                    <?php if (!empty($fieldTour['hour'])):?>
                                                                        <?= $fieldTour['hour']?> Hours
                                                                    <?php endif;?>
                                                                </div>
                                                            </div>
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
                                            </li>
                                        <?php } else {?>
                                            <li class="gdlr-core-item-mglr">
                                                <div class="tourmaster-tour-grid  tourmaster-tour-frame tourmaster-tour-grid-style-2 tourmaster-price-right-title">
                                                    <div class="tourmaster-tour-grid-inner" style="box-shadow: 0 0 23px rgba(10, 10, 10,0.08); -moz-box-shadow: 0 0 23px rgba(10, 10, 10,0.08); -webkit-box-shadow: 0 0 23px rgba(10, 10, 10,0.08); border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                                        <div class="tourmaster-tour-thumbnail tourmaster-media-image  tourmaster-zoom-on-hover gdlr-core-outer-frame-element">
                                                            <a href="<?= $item->guid?>">
                                                                <img src="<?= get_the_post_thumbnail_url($item->ID)?>" width="700" height="500" srcset="<?= get_the_post_thumbnail_url($item->ID)?> 400w, <?= get_the_post_thumbnail_url($item->ID)?> 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 33vw, 383px" alt=""/>
                                                            </a>
                                                        </div>
                                                        <div class="tourmaster-tour-content-wrap gdlr-core-skin-e-background gdlr-core-js" data-sync-height="tour-item-35">
                                                            <h3 class="tourmaster-tour-title gdlr-core-skin-title" style="font-size: 18px;font-weight: 400;letter-spacing: 0px;text-transform: none;">
                                                                <a href="<?= $item->guid?>"><?= $item->post_title?></a>
                                                            </h3>
                                                                <?php if (empty($fieldTour['old_price'])):?>
                                                                    <div class="tourmaster-tour-price-wrap">
                                                                        <span class="tourmaster-tour-price">
                                                                            <span class="tourmaster-head">From</span>
                                                                            <span class="tourmaster-tail">$<?= $fieldTour['save_price']?></span>
                                                                        </span>
                                                                    </div>
                                                                <?php else:?>
                                                                    <div class="tourmaster-tour-price-wrap tourmaster-discount">
                                                                        <span class="tourmaster-tour-price">
                                                                            <span class="tourmaster-head">From</span>
                                                                            <span class="tourmaster-tail">$<?= $fieldTour['old_price']?></span>
                                                                            </span>
                                                                        <span class="tourmaster-tour-discount-price">$<?= $fieldTour['save_price']?></span>
                                                                    </div>
                                                                <?php endif;?>

                                                            <div class="tourmaster-tour-info-wrap clearfix">
                                                                <div class="tourmaster-tour-info tourmaster-tour-info-duration-text ">
                                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 465 465" xml:space="preserve">
                                                                                <path d="M279.591,423.714c-3.836,0.956-7.747,1.805-11.629,2.52c-10.148,1.887-16.857,11.647-14.98,21.804
				c0.927,4.997,3.765,9.159,7.618,11.876c3.971,2.795,9.025,4.057,14.175,3.099c4.623-0.858,9.282-1.867,13.854-3.008
				c10.021-2.494,16.126-12.646,13.626-22.662C299.761,427.318,289.618,421.218,279.591,423.714z"/>
                                                                        <path d="M417.887,173.047c1.31,3.948,3.811,7.171,6.97,9.398c4.684,3.299,10.813,4.409,16.662,2.475
				c9.806-3.256,15.119-13.83,11.875-23.631c-1.478-4.468-3.118-8.95-4.865-13.314c-3.836-9.59-14.714-14.259-24.309-10.423
				c-9.585,3.834-14.256,14.715-10.417,24.308C415.271,165.528,416.646,169.293,417.887,173.047z"/>
                                                                        <path d="M340.36,397.013c-3.299,2.178-6.704,4.286-10.134,6.261c-8.949,5.162-12.014,16.601-6.854,25.546
				c1.401,2.433,3.267,4.422,5.416,5.942c5.769,4.059,13.604,4.667,20.127,0.909c4.078-2.352,8.133-4.854,12.062-7.452
				c8.614-5.691,10.985-17.294,5.291-25.912C360.575,393.686,348.977,391.318,340.36,397.013z"/>
                                                                        <path d="M465.022,225.279c-0.407-10.322-9.101-18.356-19.426-17.953c-10.312,0.407-18.352,9.104-17.947,19.422
				c0.155,3.945,0.195,7.949,0.104,11.89c-0.145,6.473,3.021,12.243,7.941,15.711c2.931,2.064,6.488,3.313,10.345,3.401
				c10.322,0.229,18.876-7.958,19.105-18.285C465.247,234.756,465.208,229.985,465.022,225.279z"/>
                                                                        <path d="M414.835,347.816c-8.277-6.21-19.987-4.524-26.186,3.738c-2.374,3.164-4.874,6.289-7.434,9.298
				c-6.69,7.86-5.745,19.666,2.115,26.361c0.448,0.38,0.901,0.729,1.371,1.057c7.814,5.509,18.674,4.243,24.992-3.171
				c3.057-3.59,6.037-7.323,8.874-11.102C424.767,365.735,423.089,354.017,414.835,347.816z"/>
                                                                        <path d="M442.325,280.213c-9.855-3.09-20.35,2.396-23.438,12.251c-1.182,3.765-2.492,7.548-3.906,11.253
				c-3.105,8.156-0.13,17.13,6.69,21.939c1.251,0.879,2.629,1.624,4.126,2.19c9.649,3.682,20.454-1.159,24.132-10.812
				c1.679-4.405,3.237-8.906,4.646-13.382C457.66,293.795,452.178,283.303,442.325,280.213z"/>
                                                                        <path d="M197.999,426.402c-16.72-3.002-32.759-8.114-47.968-15.244c-0.18-0.094-0.341-0.201-0.53-0.287
				c-3.584-1.687-7.162-3.494-10.63-5.382c-0.012-0.014-0.034-0.023-0.053-0.031c-6.363-3.504-12.573-7.381-18.606-11.628
				C32.24,331.86,11.088,209.872,73.062,121.901c13.476-19.122,29.784-35.075,47.965-47.719c0.224-0.156,0.448-0.311,0.67-0.468
				c64.067-44.144,151.06-47.119,219.089-1.757l-14.611,21.111c-4.062,5.876-1.563,10.158,5.548,9.518l63.467-5.682
				c7.12-0.64,11.378-6.799,9.463-13.675L387.61,21.823c-1.908-6.884-6.793-7.708-10.859-1.833l-14.645,21.161
				C312.182,7.638,252.303-5.141,192.87,5.165c-5.986,1.036-11.888,2.304-17.709,3.78c-0.045,0.008-0.081,0.013-0.117,0.021
				c-0.225,0.055-0.453,0.128-0.672,0.189C123.122,22.316,78.407,52.207,46.5,94.855c-0.269,0.319-0.546,0.631-0.8,0.978
				c-1.061,1.429-2.114,2.891-3.145,4.353c-1.686,2.396-3.348,4.852-4.938,7.308c-0.199,0.296-0.351,0.597-0.525,0.896
				C10.762,149.191-1.938,196.361,0.24,244.383c0.005,0.158-0.004,0.317,0,0.479c0.211,4.691,0.583,9.447,1.088,14.129
				c0.027,0.302,0.094,0.588,0.145,0.89c0.522,4.708,1.177,9.427,1.998,14.145c8.344,48.138,31.052,91.455,65.079,125.16
				c0.079,0.079,0.161,0.165,0.241,0.247c0.028,0.031,0.059,0.047,0.086,0.076c9.142,9.017,19.086,17.357,29.793,24.898
				c28.02,19.744,59.221,32.795,92.729,38.808c10.167,1.827,19.879-4.941,21.703-15.103
				C214.925,437.943,208.163,428.223,197.999,426.402z"/>
                                                                        <path d="M221.124,83.198c-8.363,0-15.137,6.78-15.137,15.131v150.747l137.87,71.271c2.219,1.149,4.595,1.69,6.933,1.69
				c5.476,0,10.765-2.982,13.454-8.185c3.835-7.426,0.933-16.549-6.493-20.384l-121.507-62.818V98.329
				C236.243,89.978,229.477,83.198,221.124,83.198z"/>
                                                                            </svg>
                                                                    <?php if (!empty($fieldTour['day_vacation'])):?>
                                                                        <?= $fieldTour['day_vacation']?> Days
                                                                    <?php endif;?>
                                                                    <?php if (!empty($fieldTour['night_vacation'])):?>
                                                                        <?= $fieldTour['night_vacation']?> Nights
                                                                    <?php endif;?>
                                                                    <?php if (!empty($fieldTour['hour'])):?>
                                                                        <?= $fieldTour['hour']?> Hour
                                                                    <?php endif;?>
                                                                </div>
                                                            </div>
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
                                            </li>
                                        <?php }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php
                $fieldDiscount = get_field('chuong_trinh_giam_gia', $ID);
            ?>
        <div class="gdlr-core-pbf-wrapper " style="margin-left: auto;margin-right: auto;padding: 0px 0px 35px 0px;max-width: 1220px ;" data-skin="White Text">
            <div class="gdlr-core-pbf-background-wrap"></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 58px 0px 44px 0px;border-radius: 3px 0px 0px 3px;-moz-border-radius: 3px 0px 0px 3px;-webkit-border-radius: 3px 0px 0px 3px;" data-sync-height="sh1">
                            <div class="gdlr-core-pbf-background-wrap" style="background-color: #f97251 ;border-radius: 3px 0px 0px 3px;-moz-border-radius: 3px 0px 0px 3px;-webkit-border-radius: 3px 0px 0px 3px;background: linear-gradient(rgba(249, 114, 81, 1), rgba(255, 152, 108, 1));-moz-background: linear-gradient(rgba(249, 114, 81, 1), rgba(255, 152, 108, 1));-o-background: linear-gradient(rgba(249, 114, 81, 1), rgba(255, 152, 108, 1));-webkit-background: linear-gradient(rgba(249, 114, 81, 1), rgba(255, 152, 108, 1));"></div>
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js  gdlr-core-sync-height-content">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr">
                                        <span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 20px ;font-weight: 700 ;font-style: normal ;color: #fed7c8 ;"><?= $fieldDiscount['ten_discout']?></span>
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 31px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">
                                                Up to <?= $fieldDiscount['phan_tram_discount']?>% Discount!<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-button-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align">
                                        <a class="gdlr-core-button  gdlr-core-button-gradient gdlr-core-center-align gdlr-core-button-no-border" href="#" style="font-size: 12px ;font-weight: 600 ;letter-spacing: 1px ;padding: 9px 24px 11px 24px;text-transform: uppercase ;border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;background: #1e354c ;">
                                            <span class="gdlr-core-content">Learn More</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-image-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-item-pdlr" style="padding-bottom: 10px ;">
                                        <div class="gdlr-core-image-item-wrap gdlr-core-media-image  gdlr-core-image-item-style-rectangle" style="border-width: 0px;">
                                            <a class="gdlr-core-lightgallery gdlr-core-js " href="https://a6e8z9v6.stackpathcdn.com/traveltour/main4/wp-content/uploads/2019/03/tvicon4.png">
                                                <img src="https://a6e8z9v6.stackpathcdn.com/traveltour/main4/wp-content/uploads/2019/03/tvicon4.png" alt="" width="134" height="28" title="tvicon4"/>
                                                <span class="gdlr-core-image-overlay ">
                                                    <i class="gdlr-core-image-overlay-icon  gdlr-core-size-22 fa fa-search"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align gdlr-core-no-p-space" style="padding-bottom: 0px ;">
                                        <div class="gdlr-core-text-box-item-content" style="font-size: 11px ;text-transform: none ;">
                                            <p>*Terms applied</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-column gdlr-core-column-30" id="gdlr-core-column-30476">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 60px 0px 40px 0px;border-radius: 0px 3px 3px 0px;-moz-border-radius: 0px 3px 3px 0px;-webkit-border-radius: 0px 3px 3px 0px;" data-sync-height="sh1" data-sync-height-center>
                            <div class="gdlr-core-pbf-background-wrap" style="border-radius: 0px 3px 3px 0px;-moz-border-radius: 0px 3px 3px 0px;-webkit-border-radius: 0px 3px 3px 0px;">
                                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(<?= $fieldDiscount['image']?>) ;background-size: cover ;background-position: center ;" data-parallax-speed="0"></div>
                            </div>
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js  gdlr-core-sync-height-content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 45px 0px 60px 0px;">
            <div class="gdlr-core-pbf-background-wrap">
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(<?= $fieldRecommentBachground?>) ;background-repeat: no-repeat ;background-position: top center ;" data-parallax-speed="0.05"></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px ;">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 28px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">
                                    <?php
                                    $fieldTitleRecommend = get_field('title_recommend', $ID);
                                    ?>
                                    <?= $fieldTitleRecommend['title']; ?><span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-button-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align" style="padding-bottom: 52px ;">
                            <a class="gdlr-core-button  gdlr-core-button-transparent gdlr-core-center-align gdlr-core-button-no-border" href="<?= get_permalink(getIdPage('tourlist')); ?>" style="font-size: 15px ;font-weight: 400 ;letter-spacing: 0px ;color: #e66836 ;padding: 8px 0px 0px 0px;">
                                <span class="gdlr-core-content"><?= $fieldTitleRecommend['name_link']; ?></span>
                                <i class="gdlr-core-pos-right fa fa-long-arrow-right" style="font-size: 17px ;"></i>
                            </a>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="tourmaster-tour-item clearfix  tourmaster-tour-item-style-grid tourmaster-item-pdlr tourmaster-tour-item-column-3">
                            <div class="gdlr-core-flexslider flexslider gdlr-core-js-2  gdlr-core-v1" data-type="carousel" data-column="3" data-nav="navigation-outer" data-nav-parent="tourmaster-tour-item" data-disable-autoslide="1">
                                <ul class="slides">
                                    <?php
                                    $fieldRecommentBachground = get_field('background', $ID);
                                    $recommentTour = get_field('goi_y_tour', $ID);
                                    foreach ($recommentTour as $item){
                                        $fieldRecommentTour = get_field('general_imformation', $item->ID);
                                        if ($fieldRecommentTour['best_seller'] == 'yes'){?>
                                            <li class="gdlr-core-item-mglr">
                                                <div class="tourmaster-tour-grid  tourmaster-tour-frame tourmaster-tour-grid-style-2 tourmaster-price-right-title">
                                                    <div class="tourmaster-tour-grid-inner" style="box-shadow: 0 0 23px rgba(10, 10, 10,0.08); -moz-box-shadow: 0 0 23px rgba(10, 10, 10,0.08); -webkit-box-shadow: 0 0 23px rgba(10, 10, 10,0.08); border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                                        <div class="tourmaster-tour-thumbnail tourmaster-media-image  tourmaster-zoom-on-hover gdlr-core-outer-frame-element">
                                                            <a class="gdlr-core-lightgallery gdlr-core-js " href="https://www.youtube.com/watch?v=eZjmjT5SLYs">
                                                                <div class="tourmaster-tour-thumbnail-overlay">
                                                                    <i class="fa fa-film"></i>
                                                                </div>
                                                                <img src="<?= get_the_post_thumbnail_url($item->ID)?>" width="700" height="500" srcset="<?= get_the_post_thumbnail_url($item->ID)?> 400w, <?= get_the_post_thumbnail_url($item->ID)?> 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 33vw, 383px" alt=""/>
                                                            </a>
                                                        </div>
                                                        <div class="tourmaster-tour-content-wrap gdlr-core-skin-e-background gdlr-core-js" data-sync-height="tour-item-35">
                                                            <div class="tourmaster-thumbnail-ribbon gdlr-core-outer-frame-element" style="color: #ffffff;background-color: #f97150;">
                                                                <div class="tourmaster-thumbnail-ribbon-cornor" style="border-right-color: rgba(249, 113, 80, 0.5);"></div>
                                                                Best Seller
                                                            </div>
                                                            <h3 class="tourmaster-tour-title gdlr-core-skin-title" style="font-size: 18px;font-weight: 400;letter-spacing: 0px;text-transform: none;">
                                                                <a href="<?= $item->guid; ?>">
                                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve" style="fill: #f97150">
                                                                                <path d="M397.413,199.303c-2.944-4.576-8-7.296-13.408-7.296h-112v-176c0-7.552-5.28-14.08-12.672-15.648
			c-7.52-1.6-14.88,2.272-17.952,9.152l-128,288c-2.208,4.928-1.728,10.688,1.216,15.2c2.944,4.544,8,7.296,13.408,7.296h112v176
			c0,7.552,5.28,14.08,12.672,15.648c1.12,0.224,2.24,0.352,3.328,0.352c6.208,0,12-3.616,14.624-9.504l128-288
			C400.805,209.543,400.389,203.847,397.413,199.303z"/>
                                                                            </svg>
                                                                    <span><?= $item->post_title?></span>
                                                                </a>
                                                            </h3>
                                                            <div class="tourmaster-tour-price-wrap tourmaster-discount">
                                                                <?php if (empty($fieldRecommentTour['old_price'])):?>
                                                                    <span class="tourmaster-tour-price">
                                                                            <span class="tourmaster-head">From</span>
                                                                            <span class="tourmaster-tail">$<?= $fieldRecommentTour['save_price']?></span>
                                                                        </span>
                                                                <?php else:?>
                                                                    <span class="tourmaster-tour-price">
                                                                            <span class="tourmaster-head">From</span>
                                                                            <span class="tourmaster-tail">$<?= $fieldRecommentTour['old_price']?></span>
                                                                        </span>
                                                                    <span class="tourmaster-tour-discount-price">$<?= $fieldRecommentTour['save_price']?></span>
                                                                <?php endif;?>
                                                            </div>
                                                            <div class="tourmaster-tour-info-wrap clearfix">
                                                                <div class="tourmaster-tour-info tourmaster-tour-info-duration-text ">
                                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 465 465" xml:space="preserve">
                                                                                <path d="M279.591,423.714c-3.836,0.956-7.747,1.805-11.629,2.52c-10.148,1.887-16.857,11.647-14.98,21.804
				c0.927,4.997,3.765,9.159,7.618,11.876c3.971,2.795,9.025,4.057,14.175,3.099c4.623-0.858,9.282-1.867,13.854-3.008
				c10.021-2.494,16.126-12.646,13.626-22.662C299.761,427.318,289.618,421.218,279.591,423.714z"/>
                                                                        <path d="M417.887,173.047c1.31,3.948,3.811,7.171,6.97,9.398c4.684,3.299,10.813,4.409,16.662,2.475
				c9.806-3.256,15.119-13.83,11.875-23.631c-1.478-4.468-3.118-8.95-4.865-13.314c-3.836-9.59-14.714-14.259-24.309-10.423
				c-9.585,3.834-14.256,14.715-10.417,24.308C415.271,165.528,416.646,169.293,417.887,173.047z"/>
                                                                        <path d="M340.36,397.013c-3.299,2.178-6.704,4.286-10.134,6.261c-8.949,5.162-12.014,16.601-6.854,25.546
				c1.401,2.433,3.267,4.422,5.416,5.942c5.769,4.059,13.604,4.667,20.127,0.909c4.078-2.352,8.133-4.854,12.062-7.452
				c8.614-5.691,10.985-17.294,5.291-25.912C360.575,393.686,348.977,391.318,340.36,397.013z"/>
                                                                        <path d="M465.022,225.279c-0.407-10.322-9.101-18.356-19.426-17.953c-10.312,0.407-18.352,9.104-17.947,19.422
				c0.155,3.945,0.195,7.949,0.104,11.89c-0.145,6.473,3.021,12.243,7.941,15.711c2.931,2.064,6.488,3.313,10.345,3.401
				c10.322,0.229,18.876-7.958,19.105-18.285C465.247,234.756,465.208,229.985,465.022,225.279z"/>
                                                                        <path d="M414.835,347.816c-8.277-6.21-19.987-4.524-26.186,3.738c-2.374,3.164-4.874,6.289-7.434,9.298
				c-6.69,7.86-5.745,19.666,2.115,26.361c0.448,0.38,0.901,0.729,1.371,1.057c7.814,5.509,18.674,4.243,24.992-3.171
				c3.057-3.59,6.037-7.323,8.874-11.102C424.767,365.735,423.089,354.017,414.835,347.816z"/>
                                                                        <path d="M442.325,280.213c-9.855-3.09-20.35,2.396-23.438,12.251c-1.182,3.765-2.492,7.548-3.906,11.253
				c-3.105,8.156-0.13,17.13,6.69,21.939c1.251,0.879,2.629,1.624,4.126,2.19c9.649,3.682,20.454-1.159,24.132-10.812
				c1.679-4.405,3.237-8.906,4.646-13.382C457.66,293.795,452.178,283.303,442.325,280.213z"/>
                                                                        <path d="M197.999,426.402c-16.72-3.002-32.759-8.114-47.968-15.244c-0.18-0.094-0.341-0.201-0.53-0.287
				c-3.584-1.687-7.162-3.494-10.63-5.382c-0.012-0.014-0.034-0.023-0.053-0.031c-6.363-3.504-12.573-7.381-18.606-11.628
				C32.24,331.86,11.088,209.872,73.062,121.901c13.476-19.122,29.784-35.075,47.965-47.719c0.224-0.156,0.448-0.311,0.67-0.468
				c64.067-44.144,151.06-47.119,219.089-1.757l-14.611,21.111c-4.062,5.876-1.563,10.158,5.548,9.518l63.467-5.682
				c7.12-0.64,11.378-6.799,9.463-13.675L387.61,21.823c-1.908-6.884-6.793-7.708-10.859-1.833l-14.645,21.161
				C312.182,7.638,252.303-5.141,192.87,5.165c-5.986,1.036-11.888,2.304-17.709,3.78c-0.045,0.008-0.081,0.013-0.117,0.021
				c-0.225,0.055-0.453,0.128-0.672,0.189C123.122,22.316,78.407,52.207,46.5,94.855c-0.269,0.319-0.546,0.631-0.8,0.978
				c-1.061,1.429-2.114,2.891-3.145,4.353c-1.686,2.396-3.348,4.852-4.938,7.308c-0.199,0.296-0.351,0.597-0.525,0.896
				C10.762,149.191-1.938,196.361,0.24,244.383c0.005,0.158-0.004,0.317,0,0.479c0.211,4.691,0.583,9.447,1.088,14.129
				c0.027,0.302,0.094,0.588,0.145,0.89c0.522,4.708,1.177,9.427,1.998,14.145c8.344,48.138,31.052,91.455,65.079,125.16
				c0.079,0.079,0.161,0.165,0.241,0.247c0.028,0.031,0.059,0.047,0.086,0.076c9.142,9.017,19.086,17.357,29.793,24.898
				c28.02,19.744,59.221,32.795,92.729,38.808c10.167,1.827,19.879-4.941,21.703-15.103
				C214.925,437.943,208.163,428.223,197.999,426.402z"/>
                                                                        <path d="M221.124,83.198c-8.363,0-15.137,6.78-15.137,15.131v150.747l137.87,71.271c2.219,1.149,4.595,1.69,6.933,1.69
				c5.476,0,10.765-2.982,13.454-8.185c3.835-7.426,0.933-16.549-6.493-20.384l-121.507-62.818V98.329
				C236.243,89.978,229.477,83.198,221.124,83.198z"/>
                                                                            </svg>
                                                                    <?php if (!empty($fieldRecommentTour['day_vacation'])):?>
                                                                        <?= $fieldRecommentTour['day_vacation']?> Days
                                                                    <?php endif;?>
                                                                    <?php if (!empty($fieldRecommentTour['night_vacation'])):?>
                                                                        <?= $fieldRecommentTour['night_vacation']?> Nights
                                                                    <?php endif;?>
                                                                    <?php if (!empty($fieldRecommentTour['hour'])):?>
                                                                        <?= $fieldRecommentTour['hour']?> Hour
                                                                    <?php endif;?>
                                                                </div>
                                                            </div>
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
                                            </li>
                                        <?php } else {?>
                                            <li class="gdlr-core-item-mglr">
                                                <div class="tourmaster-tour-grid  tourmaster-tour-frame tourmaster-tour-grid-style-2 tourmaster-price-right-title">
                                                    <div class="tourmaster-tour-grid-inner" style="box-shadow: 0 0 23px rgba(10, 10, 10,0.08); -moz-box-shadow: 0 0 23px rgba(10, 10, 10,0.08); -webkit-box-shadow: 0 0 23px rgba(10, 10, 10,0.08); border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                                        <div class="tourmaster-tour-thumbnail tourmaster-media-image  tourmaster-zoom-on-hover gdlr-core-outer-frame-element">
                                                            <a href="<?= $item->guid; ?>">
                                                                <img src="<?= get_the_post_thumbnail_url($item->ID)?>" width="700" height="500" srcset="<?= get_the_post_thumbnail_url($item->ID)?> 400w, <?= get_the_post_thumbnail_url($item->ID)?> 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 33vw, 383px" alt=""/>
                                                            </a>
                                                        </div>
                                                        <div class="tourmaster-tour-content-wrap gdlr-core-skin-e-background gdlr-core-js" data-sync-height="tour-item-35">
                                                            <h3 class="tourmaster-tour-title gdlr-core-skin-title" style="font-size: 18px;font-weight: 400;letter-spacing: 0px;text-transform: none;">
                                                                <a href="<?= $item->guid; ?>"><?= $item->post_title?></a>
                                                            </h3>
                                                            <?php if (empty($fieldRecommentTour['old_price'])):?>
                                                                <div class="tourmaster-tour-price-wrap">
                                                                        <span class="tourmaster-tour-price">
                                                                            <span class="tourmaster-head">From</span>
                                                                            <span class="tourmaster-tail">$<?= $fieldRecommentTour['save_price']?></span>
                                                                        </span>
                                                                </div>
                                                            <?php else:?>
                                                                <div class="tourmaster-tour-price-wrap tourmaster-discount">
                                                                        <span class="tourmaster-tour-price">
                                                                            <span class="tourmaster-head">From</span>
                                                                            <span class="tourmaster-tail">$<?= $fieldRecommentTour['old_price']?></span>
                                                                            </span>
                                                                    <span class="tourmaster-tour-discount-price">$<?= $fieldRecommentTour['save_price']?></span>
                                                                </div>
                                                            <?php endif;?>

                                                            <div class="tourmaster-tour-info-wrap clearfix">
                                                                <div class="tourmaster-tour-info tourmaster-tour-info-duration-text ">
                                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 465 465" xml:space="preserve">
                                                                                <path d="M279.591,423.714c-3.836,0.956-7.747,1.805-11.629,2.52c-10.148,1.887-16.857,11.647-14.98,21.804
				c0.927,4.997,3.765,9.159,7.618,11.876c3.971,2.795,9.025,4.057,14.175,3.099c4.623-0.858,9.282-1.867,13.854-3.008
				c10.021-2.494,16.126-12.646,13.626-22.662C299.761,427.318,289.618,421.218,279.591,423.714z"/>
                                                                        <path d="M417.887,173.047c1.31,3.948,3.811,7.171,6.97,9.398c4.684,3.299,10.813,4.409,16.662,2.475
				c9.806-3.256,15.119-13.83,11.875-23.631c-1.478-4.468-3.118-8.95-4.865-13.314c-3.836-9.59-14.714-14.259-24.309-10.423
				c-9.585,3.834-14.256,14.715-10.417,24.308C415.271,165.528,416.646,169.293,417.887,173.047z"/>
                                                                        <path d="M340.36,397.013c-3.299,2.178-6.704,4.286-10.134,6.261c-8.949,5.162-12.014,16.601-6.854,25.546
				c1.401,2.433,3.267,4.422,5.416,5.942c5.769,4.059,13.604,4.667,20.127,0.909c4.078-2.352,8.133-4.854,12.062-7.452
				c8.614-5.691,10.985-17.294,5.291-25.912C360.575,393.686,348.977,391.318,340.36,397.013z"/>
                                                                        <path d="M465.022,225.279c-0.407-10.322-9.101-18.356-19.426-17.953c-10.312,0.407-18.352,9.104-17.947,19.422
				c0.155,3.945,0.195,7.949,0.104,11.89c-0.145,6.473,3.021,12.243,7.941,15.711c2.931,2.064,6.488,3.313,10.345,3.401
				c10.322,0.229,18.876-7.958,19.105-18.285C465.247,234.756,465.208,229.985,465.022,225.279z"/>
                                                                        <path d="M414.835,347.816c-8.277-6.21-19.987-4.524-26.186,3.738c-2.374,3.164-4.874,6.289-7.434,9.298
				c-6.69,7.86-5.745,19.666,2.115,26.361c0.448,0.38,0.901,0.729,1.371,1.057c7.814,5.509,18.674,4.243,24.992-3.171
				c3.057-3.59,6.037-7.323,8.874-11.102C424.767,365.735,423.089,354.017,414.835,347.816z"/>
                                                                        <path d="M442.325,280.213c-9.855-3.09-20.35,2.396-23.438,12.251c-1.182,3.765-2.492,7.548-3.906,11.253
				c-3.105,8.156-0.13,17.13,6.69,21.939c1.251,0.879,2.629,1.624,4.126,2.19c9.649,3.682,20.454-1.159,24.132-10.812
				c1.679-4.405,3.237-8.906,4.646-13.382C457.66,293.795,452.178,283.303,442.325,280.213z"/>
                                                                        <path d="M197.999,426.402c-16.72-3.002-32.759-8.114-47.968-15.244c-0.18-0.094-0.341-0.201-0.53-0.287
				c-3.584-1.687-7.162-3.494-10.63-5.382c-0.012-0.014-0.034-0.023-0.053-0.031c-6.363-3.504-12.573-7.381-18.606-11.628
				C32.24,331.86,11.088,209.872,73.062,121.901c13.476-19.122,29.784-35.075,47.965-47.719c0.224-0.156,0.448-0.311,0.67-0.468
				c64.067-44.144,151.06-47.119,219.089-1.757l-14.611,21.111c-4.062,5.876-1.563,10.158,5.548,9.518l63.467-5.682
				c7.12-0.64,11.378-6.799,9.463-13.675L387.61,21.823c-1.908-6.884-6.793-7.708-10.859-1.833l-14.645,21.161
				C312.182,7.638,252.303-5.141,192.87,5.165c-5.986,1.036-11.888,2.304-17.709,3.78c-0.045,0.008-0.081,0.013-0.117,0.021
				c-0.225,0.055-0.453,0.128-0.672,0.189C123.122,22.316,78.407,52.207,46.5,94.855c-0.269,0.319-0.546,0.631-0.8,0.978
				c-1.061,1.429-2.114,2.891-3.145,4.353c-1.686,2.396-3.348,4.852-4.938,7.308c-0.199,0.296-0.351,0.597-0.525,0.896
				C10.762,149.191-1.938,196.361,0.24,244.383c0.005,0.158-0.004,0.317,0,0.479c0.211,4.691,0.583,9.447,1.088,14.129
				c0.027,0.302,0.094,0.588,0.145,0.89c0.522,4.708,1.177,9.427,1.998,14.145c8.344,48.138,31.052,91.455,65.079,125.16
				c0.079,0.079,0.161,0.165,0.241,0.247c0.028,0.031,0.059,0.047,0.086,0.076c9.142,9.017,19.086,17.357,29.793,24.898
				c28.02,19.744,59.221,32.795,92.729,38.808c10.167,1.827,19.879-4.941,21.703-15.103
				C214.925,437.943,208.163,428.223,197.999,426.402z"/>
                                                                        <path d="M221.124,83.198c-8.363,0-15.137,6.78-15.137,15.131v150.747l137.87,71.271c2.219,1.149,4.595,1.69,6.933,1.69
				c5.476,0,10.765-2.982,13.454-8.185c3.835-7.426,0.933-16.549-6.493-20.384l-121.507-62.818V98.329
				C236.243,89.978,229.477,83.198,221.124,83.198z"/>
                                                                            </svg>
                                                                    <?php if (!empty($fieldRecommentTour['day_vacation'])):?>
                                                                        <?= $fieldRecommentTour['day_vacation']?> Days
                                                                    <?php endif;?>
                                                                    <?php if (!empty($fieldRecommentTour['night_vacation'])):?>
                                                                        <?= $fieldRecommentTour['night_vacation']?> Nights
                                                                    <?php endif;?>
                                                                    <?php if (!empty($fieldRecommentTour['hour'])):?>
                                                                        <?= $fieldRecommentTour['hour']?> Hour
                                                                    <?php endif;?>
                                                                </div>
                                                            </div>
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
                                            </li>
                                        <?php }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php
                $fieldHighlight = get_field('highlights', $ID);
            ?>
        <div class="gdlr-core-pbf-wrapper " style="padding: 190px 0px 160px 0px;">
            <div class="gdlr-core-pbf-background-wrap">
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(<?= $fieldHighlight['backgroud']; ?>) ;background-size: cover ;background-position: bottom center ;" data-parallax-speed="0.2"></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 25px ;">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 55px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;color: #ffffff ;">
                                    <?= $fieldHighlight['title']; ?><span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 34px ;">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 23px ;letter-spacing: 0px ;text-transform: none ;color: #ff7d5d ;">
                                    <?= $fieldHighlight['content']; ?><span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-image-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-item-pdlr" style="padding-bottom: 0px ;">
                            <div class="gdlr-core-image-item-wrap gdlr-core-media-image  gdlr-core-image-item-style-rectangle" style="border-width: 0px;">
                                <a class="gdlr-core-lightgallery gdlr-core-js " href="<?= $fieldHighlight['video']?>">
                                    <img src="<?= $fieldHighlight['icon_play']?>" alt="" width="71" height="71" title="tvicon5"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 110px 0px 60px 0px;">
            <div class="gdlr-core-pbf-background-wrap">
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(https://a6e8z9v6.stackpathcdn.com/traveltour/main4/wp-content/uploads/2019/04/title-bg-testimonial-2.jpg) ;background-repeat: no-repeat ;background-position: top center ;" data-parallax-speed="0.05"></div>
            </div>
            <?php
            $fieldReview = get_field('reviews', $ID);
            ?>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 60px ;">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 28px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">
                                    <?php
                                    $fieldTitleReview = get_field('title_reviews', $ID);
                                    ?>
                                    <?= $fieldTitleReview; ?><span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-testimonial-item gdlr-core-item-pdb clearfix  gdlr-core-testimonial-style-left gdlr-core-item-pdlr">
                            <div class="gdlr-core-flexslider flexslider gdlr-core-js-2 " data-type="carousel" data-column="3" data-move="1" data-nav="bullet" data-disable-autoslide="1">
                                <ul class="slides">
                                    <?php foreach ($fieldReview as $value):?>
                                    <li class="gdlr-core-item-mglr">
                                        <div class="gdlr-core-testimonial clearfix">
                                            <div class="gdlr-core-testimonial-frame clearfix gdlr-core-skin-e-background ">
                                                <div class="gdlr-core-testimonial-frame-border"></div>
                                                <div class="gdlr-core-testimonial-quote gdlr-core-quote-font gdlr-core-skin-icon  gdlr-core-top">&#8220;</div>
                                                <div class="gdlr-core-testimonial-content-wrap">
                                                    <div class="gdlr-core-testimonial-content gdlr-core-info-font gdlr-core-skin-content" style="font-size: 15px ;">
                                                        <p><?= $value['content']?></p>
                                                    </div>
                                                    <div class="gdlr-core-testimonial-author-wrap clearfix">
                                                        <div class="gdlr-core-testimonial-author-image gdlr-core-media-image">
                                                            <img src="<?= $value['image']?>" alt="" width="150" height="150"/>
                                                        </div>
                                                        <div class="gdlr-core-testimonial-author-content">
                                                            <div class="gdlr-core-testimonial-title gdlr-core-title-font gdlr-core-skin-title"><?= $value['name_reviewer']?></div>
                                                            <div class="gdlr-core-testimonial-position gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 16px ;">
                                                                                <span class="gdlr-core-rating ">
                                                                                    <?php for($i=0; $i<floor($value['start_rate']);$i++):?>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <?php endfor;?>
                                                                                    <?php if (($value['start_rate']-floor($value['start_rate'])) == 0.5):?>
                                                                                    <i class="fa fa-star-half-o"></i>
                                                                                    <?php endif;?>
                                                                                </span>
                                                                <?= $value['job']?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 90px 0px 35px 0px;">
            <div class="gdlr-core-pbf-background-wrap" style="background-color: #f5f5f5 ;"></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-column gdlr-core-column-36 gdlr-core-column-first">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                            <div class="gdlr-core-pbf-background-wrap"></div>
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 32px ;">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">
                                                Browse Tour By Category<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-column gdlr-core-column-24">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 23px ;">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">
                                                Newsletter<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-column gdlr-core-column-36 gdlr-core-column-first">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                            <div class="gdlr-core-pbf-background-wrap"></div>
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-icon-list-item gdlr-core-item-pdlr gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-style-1">
                                        <ul>
                                            <?php
                                            $count = 1;
                                            foreach ($term as $item){
                                                if ($count == 1){
                                                    ?>
                                                    <li class=" gdlr-core-skin-divider gdlr-core-column-30 gdlr-core-column-first clearfix" style="margin-bottom: 13px ;">
                                                        <a href="<?= get_permalink($item->term_id); ?>" target="_self">
                                                            <div class="gdlr-core-icon-list-content-wrap">
                                                                <span class="gdlr-core-icon-list-content" style="color: #f97150 ;font-size: 15px ;font-weight: 400 ;"><?= $item->name; ?></span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <?php
                                                    $count = 2;
                                                }else{
                                                    ?>
                                                    <li class=" gdlr-core-skin-divider gdlr-core-column-30 clearfix" style="margin-bottom: 13px ;">
                                                        <a href="<?= get_permalink($item->term_id); ?>" target="_self">
                                                            <div class="gdlr-core-icon-list-content-wrap">
                                                                <span class="gdlr-core-icon-list-content" style="color: #f97150 ;font-size: 15px ;font-weight: 400 ;"><?= $item->name; ?></span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <?php
                                                    $count = 1;
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-column gdlr-core-column-24" data-skin="White Newsletter">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                            <div class="gdlr-core-pbf-background-wrap"></div>
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 0px ;">
                                        <div class="gdlr-core-text-box-item-content">
                                            <p>Subscribe for updates &#038;promotions</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-newsletter-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-style-rectangle" style="padding-bottom: 25px ;">
                                        <div class="newsletter newsletter-subscription">
                                            <?php
                                            $formSubScribe = '[contact-form-7 id="368" title="Subcribe"]';
                                            echo do_shortcode($formSubScribe);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-element">
                                    <?php
                                    $fieldSocialNetwork = get_field('social_network', $ID);
                                    ?>
                                    <div class="gdlr-core-social-network-item gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-item-pdlr">
                                        <?php
                                        foreach ($fieldSocialNetwork as $item){
                                            ?>
                                            <a href="<?= $item['link']; ?>" target="_blank" class="gdlr-core-social-network-icon" title="<?= $item['name']; ?>" style="font-size: 19px ;color: #aaaaaa ;">
                                                <i class="fa fa-<?= $item['name']; ?>"></i>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 100px 0px 10px 0px;">
            <div class="gdlr-core-pbf-background-wrap">
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(https://a6e8z9v6.stackpathcdn.com/traveltour/main4/wp-content/uploads/2019/04/title-bg-articles.jpg) ;background-repeat: no-repeat ;background-position: top center ;" data-parallax-speed="0.05"></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px ;">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 28px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">
                                    Recent Articles<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-button-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align" style="padding-bottom: 40px ;">
                            <a class="gdlr-core-button  gdlr-core-button-transparent gdlr-core-center-align gdlr-core-button-no-border" href="#" style="font-size: 15px ;font-weight: 400 ;letter-spacing: 0px ;color: #e66836 ;padding: 8px 0px 0px 0px;">
                                <span class="gdlr-core-content">Read The Blog</span>
                                <i class="gdlr-core-pos-right fa fa-long-arrow-right" style="font-size: 17px ;"></i>
                            </a>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-blog-item gdlr-core-item-pdb clearfix  gdlr-core-style-blog-image" style="padding-bottom: 0px ;">
                            <div class="gdlr-core-blog-item-holder gdlr-core-js-2 clearfix" data-layout="fitrows">
                                <?php
                                $articles = get_field('bai_blog', $ID);
                                ?>
                                <?php for ($i=0; $i<count($articles); $i++):?>
                                <?php if ($i == 0):?>
                                        <div class="gdlr-core-item-list  gdlr-core-item-pdlr gdlr-core-item-mgb gdlr-core-column-20 gdlr-core-column-first">
                                            <div class="gdlr-core-blog-modern  gdlr-core-with-image gdlr-core-opacity-on-hover gdlr-core-zoom-on-hover gdlr-core-style-3 gdlr-core-outer-frame-element">
                                                <div class="gdlr-core-blog-modern-inner">
                                                    <div class="gdlr-core-blog-thumbnail gdlr-core-media-image">
                                                        <img src="<?= get_the_post_thumbnail_url($articles[$i]->ID)?>" width="600" height="700" srcset="<?= get_the_post_thumbnail_url($articles[$i]->ID)?> 400w, <?= get_the_post_thumbnail_url($articles[$i]->ID)?> 600w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 33vw, 383px" alt=""/>
                                                    </div>
                                                    <div class="gdlr-core-blog-modern-content-overlay"></div>
                                                    <div class="gdlr-core-blog-modern-content  gdlr-core-left-align">
                                                        <h3 class="gdlr-core-blog-title gdlr-core-skin-title" style="font-weight: 400 ;">
                                                            <a href="<?= $articles[$i]->guid?>"><?= $articles[$i]->post_title?></a>
                                                        </h3>
                                                        <div class="gdlr-core-blog-info-wrapper gdlr-core-skin-divider">
                                                                    <span class="gdlr-core-blog-info gdlr-core-blog-info-font gdlr-core-skin-caption gdlr-core-blog-info-date">
                                                                        <span class="gdlr-core-blog-info-sep">•</span>
                                                                        <span class="gdlr-core-head">
                                                                            <i class="icon_clock_alt"></i>
                                                                        </span>
                                                                        <a href="<?= $articles[$i]->guid?>">
                                                                            <?php
                                                                            $dateTime = new DateTime($articles[$i]->post_modified);
                                                                            echo $dateTime->format('M d Y');
                                                                            ?>
                                                                        </a>
                                                                    </span>
                                                            <span class="gdlr-core-blog-info gdlr-core-blog-info-font gdlr-core-skin-caption gdlr-core-blog-info-author">
                                                                        <span class="gdlr-core-blog-info-sep">•</span>
                                                                        <span class="gdlr-core-head">
                                                                            <i class="icon_documents_alt"></i>
                                                                        </span>
                                                                        <a href="#" title="Posts by <?= get_the_author_meta('user_nicename',$articles[0]->post_author); ?>" rel="author"><?= get_the_author_meta('user_nicename',$articles[0]->post_author);?></a>
                                                                    </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else:?>
                                        <div class="gdlr-core-item-list  gdlr-core-item-pdlr gdlr-core-item-mgb gdlr-core-column-20">
                                            <div class="gdlr-core-blog-modern  gdlr-core-with-image gdlr-core-opacity-on-hover gdlr-core-zoom-on-hover gdlr-core-style-3 gdlr-core-outer-frame-element">
                                                <div class="gdlr-core-blog-modern-inner">
                                                    <div class="gdlr-core-blog-thumbnail gdlr-core-media-image">
                                                        <img src="<?= get_the_post_thumbnail_url($articles[$i]->ID)?>" width="600" height="700" srcset="<?= get_the_post_thumbnail_url($articles[$i]->ID)?> 400w, <?= get_the_post_thumbnail_url($articles[$i]->ID)?> 600w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 33vw, 383px" alt=""/>
                                                    </div>
                                                    <div class="gdlr-core-blog-modern-content-overlay"></div>
                                                    <div class="gdlr-core-blog-modern-content  gdlr-core-left-align">
                                                        <h3 class="gdlr-core-blog-title gdlr-core-skin-title" style="font-weight: 400 ;">
                                                            <a href="<?= $articles[$i]->guid?>"><?= $articles[$i]->post_title?></a>
                                                        </h3>
                                                        <div class="gdlr-core-blog-info-wrapper gdlr-core-skin-divider">
                                                                    <span class="gdlr-core-blog-info gdlr-core-blog-info-font gdlr-core-skin-caption gdlr-core-blog-info-date">
                                                                        <span class="gdlr-core-blog-info-sep">•</span>
                                                                        <span class="gdlr-core-head">
                                                                            <i class="icon_clock_alt"></i>
                                                                        </span>
                                                                        <a href="<?= $articles[$i]->guid?>">
                                                                            <?php
                                                                            $dateTime = new DateTime($articles[$i]->post_modified);
                                                                            echo $dateTime->format('M d Y');
                                                                            ?>
                                                                        </a>
                                                                    </span>
                                                            <span class="gdlr-core-blog-info gdlr-core-blog-info-font gdlr-core-skin-caption gdlr-core-blog-info-author">
                                                                        <span class="gdlr-core-blog-info-sep">•</span>
                                                                        <span class="gdlr-core-head">
                                                                            <i class="icon_documents_alt"></i>
                                                                        </span>
                                                                        <a href="https://demo.goodlayers.com/traveltour/main4/author/superuser/" title="Posts by <?= get_the_author_meta('user_nicename',$articles[0]->post_author);?>" rel="author"><?= get_the_author_meta('user_nicename',$articles[0]->post_author);?></a>
                                                                    </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php endif;?>
                                <?php endfor;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 45px 0px 40px 0px;">
            <div class="gdlr-core-pbf-background-wrap">
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-size: cover ;background-position: center ;" data-parallax-speed="0.1"></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 10px ;">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 28px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">
                                    <?php
                                    $fieldTitleDoiTac = get_field('title_doi_tac', $ID);
                                    ?>
                                    <?= $fieldTitleDoiTac['title']; ?><span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align">
                            <div class="gdlr-core-text-box-item-content" style="font-size: 17px ;text-transform: none ;">
                                <p><?= $fieldTitleDoiTac['content']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-gallery-item gdlr-core-item-pdb clearfix  gdlr-core-gallery-item-style-grid" style="padding-bottom: 0px ;">
                            <div class="gdlr-core-gallery-item-holder gdlr-core-js-2 clearfix" data-layout="fitrows">
                                <?php
                                $doiTac = get_field('doi_tac', $ID);
                                $check = true;
                                ?>
                                <?php foreach ($doiTac as $dt):?>
                                <?php if ($check):?>
                                        <div class="gdlr-core-item-list gdlr-core-gallery-column  gdlr-core-column-12 gdlr-core-column-first gdlr-core-item-pdlr gdlr-core-item-mgb">
                                            <div class="gdlr-core-gallery-list gdlr-core-media-image">
                                                <img src="<?= $dt?>" alt="" width="300" height="129"/>
                                            </div>
                                        </div>
                                <?php $check = false; else:?>
                                        <div class="gdlr-core-item-list gdlr-core-gallery-column  gdlr-core-column-12 gdlr-core-item-pdlr gdlr-core-item-mgb">
                                            <div class="gdlr-core-gallery-list gdlr-core-media-image">
                                                <img src="<?= $dt?>" alt="" width="300" height="129" title="banner-2"/>
                                            </div>
                                        </div>
                                <?php endif;?>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>