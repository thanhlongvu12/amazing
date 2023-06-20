<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 6/8/2023
 * Time: 2:56 PM
 * Template Name: Tour List
 */

$obj = get_queried_object();

$location = get_terms('location');
$listLocation = array();
foreach ($location as $item){
    array_push($listLocation, $item->slug);
}
get_header();
?>

<div class="traveltour-page-title-wrap  traveltour-style-medium traveltour-center-align" style="background-image: url(<?= get_field('banner', $obj->ID); ?>)">
    <div class="traveltour-header-transparent-substitute"></div>
    <div class="traveltour-page-title-overlay"></div>
    <div class="traveltour-page-title-container traveltour-container">
        <div class="traveltour-page-title-content traveltour-item-pdlr">
            <h1 class="traveltour-page-title"><?= $obj->post_title; ?></h1>
        </div>
    </div>
</div>
<div class="traveltour-page-wrapper" id="traveltour-page-wrapper">
    <div class="gdlr-core-page-builder-body">
        <div class="gdlr-core-pbf-section">
            <div class="gdlr-core-pbf-section-container gdlr-core-container clearfix">
                <div class="gdlr-core-pbf-element">
                    <div class="tourmaster-tour-item clearfix  tourmaster-tour-item-style-grid tourmaster-tour-item-column-3">
                        <div class="tourmaster-tour-item-holder gdlr-core-js-2 clearfix" data-layout="fitrows">
                            <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $arr = array(
                                'post_type'=>'dia_diem_du_lich',
                                'paged' => $paged,
                                'tax_query'=>array(
                                    'relation'=>'AND',
                                    array(
                                        'taxonomy'=>'location',
                                        'field'=>'slug',
                                        'terms'=>$listLocation,
                                    ),
                                ),
                            );

                            $query = new WP_Query($arr);
                            $query->the_post();
                            $queryItem = $query->posts;

                            $count = 0;
                            ?>
                            <?php foreach ($queryItem as $value){
                                $field = get_field('general_imformation', $value->ID);
                                $count == 3 ? $count = 1 : $count++;
                                if ($count == 1){
                                    if ($field['best_seller'] == 'yes'){?>
                                        <div class="gdlr-core-item-list  tourmaster-item-pdlr tourmaster-column-20 tourmaster-column-first">
                                            <div class="tourmaster-tour-grid  tourmaster-tour-grid-style-1 tourmaster-price-right-title">
                                                <div class="tourmaster-thumbnail-ribbon gdlr-core-outer-frame-element" style="color: #ffffff;background-color: #f97150;">
                                                    <div class="tourmaster-thumbnail-ribbon-cornor" style="border-right-color: rgba(249, 113, 80, 0.5);"></div>
                                                    Best Seller
                                                </div>
                                                <div class="tourmaster-tour-grid-inner">
                                                    <div class="tourmaster-tour-thumbnail tourmaster-media-image ">
                                                        <a href="<?= $value->guid?>">
                                                            <img src="<?= get_the_post_thumbnail_url($value->ID)?>" width="700" height="500" srcset="<?= get_the_post_thumbnail_url($value->ID)?> 400w, <?= get_the_post_thumbnail_url($value->ID)?> 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 33vw, 383px" alt="" style="max-height: 263.58px"/>
                                                        </a>
                                                    </div>
                                                    <div class="tourmaster-tour-content-wrap ">
                                                        <h3 class="tourmaster-tour-title gdlr-core-skin-title" style="font-size: 17px;text-transform: uppercase;">
                                                            <a href="<?= $value->guid?>"><?= $value->post_title?></a>
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
                                                        <div class="tourmaster-tour-info-wrap clearfix">
                                                            <div class="tourmaster-tour-info tourmaster-tour-info-duration-text ">
                                                                <i class="fa-light fa-clock"></i>

                                                                <?php if (!empty($field['day_vacation'])):?>
                                                                    <?= $field['day_vacation']?> Days
                                                                <?php endif;?>
                                                                <?php if (!empty($field['night_vacation'])):?>
                                                                    <?= $field['night_vacation']?> Nights
                                                                <?php endif;?>
                                                                <?php if (!empty($field['hour'])):?>
                                                                    <?= $field['hour']?> Hours
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
                                        </div>
                                        <?php
                                    }else{?>
                                        <div class="gdlr-core-item-list  tourmaster-item-pdlr tourmaster-column-20 tourmaster-column-first">
                                            <div class="tourmaster-tour-grid  tourmaster-tour-grid-style-1 tourmaster-price-right-title">
                                                <div class="tourmaster-tour-grid-inner">
                                                    <div class="tourmaster-tour-thumbnail tourmaster-media-image ">
                                                        <a href="<?= $value->guid?>">
                                                            <img src="<?= get_the_post_thumbnail_url($value->ID)?>" width="700" height="500" srcset="<?= get_the_post_thumbnail_url($value->ID)?> 400w, <?= get_the_post_thumbnail_url($value->ID)?> 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 33vw, 383px" alt="" style="max-height: 263.58px"/>
                                                        </a>
                                                    </div>
                                                    <div class="tourmaster-tour-content-wrap ">
                                                        <h3 class="tourmaster-tour-title gdlr-core-skin-title" style="font-size: 17px;text-transform: uppercase;">
                                                            <a href="<?= $value->guid?>"><?= $value->post_title?></a>
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
                                                        <div class="tourmaster-tour-info-wrap clearfix">
                                                            <div class="tourmaster-tour-info tourmaster-tour-info-duration-text ">
                                                                <i class="fa-light fa-clock"></i>
                                                                <?php if (!empty($field['day_vacation'])):?>
                                                                    <?= $field['day_vacation']?> Days
                                                                <?php endif;?>
                                                                <?php if (!empty($field['night_vacation'])):?>
                                                                    <?= $field['night_vacation']?> Nights
                                                                <?php endif;?>
                                                                <?php if (!empty($field['hour'])):?>
                                                                    <?= $field['hour']?> Hours
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
                                        </div>
                                        <?php
                                    }
                                }else{
                                    if ($field['best_seller'] == 'yes'){?>
                                        <div class="gdlr-core-item-list  tourmaster-item-pdlr tourmaster-column-20">
                                            <div class="tourmaster-tour-grid  tourmaster-tour-grid-style-1 tourmaster-price-right-title">
                                                <div class="tourmaster-thumbnail-ribbon gdlr-core-outer-frame-element" style="color: #ffffff;background-color: #f97150;">
                                                    <div class="tourmaster-thumbnail-ribbon-cornor" style="border-right-color: rgba(249, 113, 80, 0.5);"></div>
                                                    Best Seller
                                                </div>
                                                <div class="tourmaster-tour-grid-inner">
                                                    <div class="tourmaster-tour-thumbnail tourmaster-media-image ">
                                                        <a href="<?= $value->guid?>">
                                                            <img src="<?= get_the_post_thumbnail_url($value->ID)?>" width="700" height="500" srcset="<?= get_the_post_thumbnail_url($value->ID)?> 400w, <?= get_the_post_thumbnail_url($value->ID)?> 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 33vw, 383px" alt="" style="max-height: 263.58px" />
                                                        </a>
                                                    </div>
                                                    <div class="tourmaster-tour-content-wrap ">
                                                        <h3 class="tourmaster-tour-title gdlr-core-skin-title" style="font-size: 17px;text-transform: uppercase;">
                                                            <a href="<?= $value->guid?>"><?= $value->post_title?></a>
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
                                                        <div class="tourmaster-tour-info-wrap clearfix">
                                                            <div class="tourmaster-tour-info tourmaster-tour-info-duration-text ">
                                                                <i class="fa-light fa-clock"></i>
                                                                <?php if (!empty($field['day_vacation'])):?>
                                                                    <?= $field['day_vacation']?> Days
                                                                <?php endif;?>
                                                                <?php if (!empty($field['night_vacation'])):?>
                                                                    <?= $field['night_vacation']?> Nights
                                                                <?php endif;?>
                                                                <?php if (!empty($field['hour'])):?>
                                                                    <?= $field['hour']?> Hours
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
                                        </div>
                                        <?php
                                    }else{?>
                                        <div class="gdlr-core-item-list  tourmaster-item-pdlr tourmaster-column-20">
                                            <div class="tourmaster-tour-grid  tourmaster-tour-grid-style-1 tourmaster-price-right-title">
                                                <div class="tourmaster-tour-grid-inner">
                                                    <div class="tourmaster-tour-thumbnail tourmaster-media-image ">
                                                        <a href="<?= $value->guid?>">
                                                            <img src="<?= get_the_post_thumbnail_url($value->ID)?>" width="700" height="500" srcset="<?= get_the_post_thumbnail_url($value->ID)?> 400w, <?= get_the_post_thumbnail_url($value->ID)?> 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 33vw, 383px" alt="" style="max-height: 263.58px"/>
                                                        </a>
                                                    </div>
                                                    <div class="tourmaster-tour-content-wrap ">
                                                        <h3 class="tourmaster-tour-title gdlr-core-skin-title" style="font-size: 17px;text-transform: uppercase;">
                                                            <a href="<?= $value->guid?>"><?= $value->post_title?></a>
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
                                                        <div class="tourmaster-tour-info-wrap clearfix">
                                                            <div class="tourmaster-tour-info tourmaster-tour-info-duration-text ">
                                                                <i class="fa-light fa-clock"></i>
                                                                <?php if (!empty($field['day_vacation'])):?>
                                                                    <?= $field['day_vacation']?> Days
                                                                <?php endif;?>
                                                                <?php if (!empty($field['night_vacation'])):?>
                                                                    <?= $field['night_vacation']?> Nights
                                                                <?php endif;?>
                                                                <?php if (!empty($field['hour'])):?>
                                                                    <?= $field['hour']?> Hours
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
                                        </div>
                                        <?php
                                    }
                                }
                            }?>
                        </div>
                        <?php
                        $pages = paginate_links(
                            array(
                                'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                                'format' => '?paged=%#%',
                                'type'=>'array',
                                'end_size'=>2,
                                'mid_size'=>1,
                                'current' => max(1, get_query_var('paged')),
                                'total' => $query->max_num_pages,
                                'prev_text' => __(''),
                                'next_text' => __(''),
                            )
                        );

                        if (is_array($pages)){
                            $pagination = '<div class="gdlr-core-pagination  gdlr-core-style-circle gdlr-core-center-align tourmaster-item-pdlr">';
                            foreach ($pages as $page){
                                $pagination .= $page;
                            }
                            $pagination .= '</div>';

                            echo $pagination;
                        }else{
                            echo "";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
