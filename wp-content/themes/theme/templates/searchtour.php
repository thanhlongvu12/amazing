<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 5/29/2023
 * Time: 8:09 AM
 * Template Name: Search Tour
 */


$location = get_terms('location');

$textSearch = $_GET['tour-search'];

$destination = $_GET['tax-tour-destination'];

$duration = $_GET['duration'];

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if (!empty($destination)){
    $arrTour = array(
        'post_type'=>'dia_diem_du_lich',
        'paged' => $paged,
        'tax_query'=>array(
            array(
                'taxonomy'=>'location',
                'field'=>'slug',
                'terms'=>$destination,
            ),
        ),
        'meta_query'=>array(
            'relation'=>'AND',
            array(
                'key'=>'general_imformation_name',
                'value'=>$textSearch,
                'compare'=>'LIKE',
            ),
            array(
                'key'=>'general_imformation_day_vacation',
                'value'=>$duration,
                'compare'=>'LIKE',
            )
        ),
        'meta_key'=>'general_imformation_save_price',
        'orderby' => 'meta_value_num',
        'order' => 'DES'
    );
}else{
    $arrTour = array(
        'post_type'=>'dia_diem_du_lich',
        'paged' => $paged,
        'meta_query'=>array(
            'relation'=>'AND',
            array(
                'key'=>'general_imformation_name',
                'value'=>$textSearch,
                'compare'=>'LIKE',
            ),
            array(
                'key'=>'general_imformation_day_vacation',
                'value'=>$duration,
                'compare'=>'LIKE',
            )
        ),
        'meta_key'=>'general_imformation_save_price',
        'orderby' => 'meta_value_num',
        'order' => 'DES'
    );
}


$tour = new WP_Query($arrTour);

$listTourSearch = $tour->posts;


get_header();

?>

<script>
    jQuery("#map").click(function() {
        jQuery("#map iframe").css("pointer-events", "auto");
    });
    jQuery("#map").mouseleave(function() {
        jQuery("#map iframe").css("pointer-events", "none");
    });
</script>
<style>
    .tourmaster-page-content{
        display: flex;
    }
    .tourmaster-tour-search-item-wrap{
        width: 100%;
        max-width: 360px;
        float: left;
        margin-bottom: 40px;
    }

    .tourmaster-tour-search-item-style-2{
        padding-left: 20px;
        padding-right: 20px;
    }

    .tourmaster-search-style-2 .tourmaster-tour-search-wrap{
        border-width: 1px;
        border-style: solid;
        border-radius: 4px;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        box-shadow: none;
        -webkit-box-shadow: none;
    }
</style>
<div class="traveltour-page-title-wrap  traveltour-style-medium traveltour-center-align">
    <div class="traveltour-header-transparent-substitute"></div>
    <div class="traveltour-page-title-overlay"></div>
    <div class="traveltour-page-title-container traveltour-container">
        <div class="traveltour-page-title-content traveltour-item-pdlr">
            <h1 class="traveltour-page-title">Search Tours</h1>
        </div>
    </div>
</div>
<div class="traveltour-page-wrapper" id="traveltour-page-wrapper">
    <div class="tourmaster-template-wrapper tourmaster-search-style-2">
        <div class="tourmaster-container">
            <div class=" tourmaster-sidebar-wrap clearfix tourmaster-sidebar-style-none">
                <div class=" tourmaster-sidebar-center tourmaster-column-60">
                    <div class="tourmaster-page-content">
                        <div class="tourmaster-tour-search-item-wrap">
                            <div class="tourmaster-tour-search-item clearfix tourmaster-style-full tourmaster-column-count-8 tourmaster-item-pdlr tourmaster-input-style-default tourmaster-tour-search-item-style-2">
                                <div class="tourmaster-tour-search-wrap clearfix tourmaster-with-frame">
                                    <div class="tourmaster-tour-search-item-head">
                                        <h3 class="tourmaster-tour-search-item-head-title">
                                            <i class="fa fa-search"></i>
                                            Tour Search
                                        </h3>
                                    </div>
                                    <form class="tourmaster-form-field tourmaster-with-border" action="<?= get_permalink(getIdPage('searchtour'))?>" method="GET">
                                        <div class="tourmaster-tour-search-field tourmaster-tour-search-field-keywords">
                                            <label class="gdlr-core-skin-title">Keywords</label>
                                            <div class="tourmaster-tour-search-field-inner">
                                                <input name="tour-search" type="text" value="<?= $textSearch; ?>"/>
                                            </div>
                                        </div>
                                        <div class="tourmaster-tour-search-field tourmaster-tour-search-field-duration">
                                            <label class="gdlr-core-skin-title">Duration</label>
                                            <div class="tourmaster-combobox-wrap">
                                                <select name="duration">
                                                    <option value="">Any</option>
                                                    <option value="1">1 Day Tour</option>
                                                    <option value="2">2-4 Days Tour</option>
                                                    <option value="5">5-7 Days Tour</option>
                                                    <option value="7">7+ Days Tour</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="tourmaster-tour-search-field tourmaster-tour-search-field-date">
                                            <label class="gdlr-core-skin-title">Date</label>
                                            <div class="tourmaster-datepicker-wrap">
                                                <input class="tourmaster-datepicker" type="text" value="" data-date-format="d M yy"/>
                                                <input class="tourmaster-datepicker-alt" name="date" type="hidden" value=""/>
                                            </div>
                                        </div>
                                        <div class="tourmaster-tour-search-field tourmaster-tour-search-field-month">
                                            <label class="gdlr-core-skin-title">Month</label>
                                            <div class="tourmaster-combobox-wrap">
                                                <select name="month">
                                                    <option value="">Any</option>
                                                    <option value="2023-05">May 2023</option>
                                                    <option value="2023-06">June 2023</option>
                                                    <option value="2023-07">July 2023</option>
                                                    <option value="2023-08">August 2023</option>
                                                    <option value="2023-09">September 2023</option>
                                                    <option value="2023-10">October 2023</option>
                                                    <option value="2023-11">November 2023</option>
                                                    <option value="2023-12">December 2023</option>
                                                    <option value="2024-01">January 2024</option>
                                                    <option value="2024-02">February 2024</option>
                                                    <option value="2024-03">March 2024</option>
                                                    <option value="2024-04">April 2024</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="tourmaster-column-30 tourmaster-search-price-column-left">
                                            <div class="tourmaster-tour-search-field tourmaster-tour-search-field-min-price">
                                                <label class="gdlr-core-skin-title">Min Price</label>
                                                <input name="min-price" type="text" value=""/>
                                            </div>
                                        </div>
                                        <div class="tourmaster-column-30 tourmaster-search-price-column-right">
                                            <div class="tourmaster-tour-search-field tourmaster-tour-search-field-max-price">
                                                <label class="gdlr-core-skin-title">Max Price</label>
                                                <input name="max-price" type="text" value=""/>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
<!--                                        <div class="tourmaster-tour-search-field tourmaster-tour-search-field-rating clearfix">-->
<!--                                            <label class="gdlr-core-skin-title">Rating</label>-->
<!--                                            <span class="tourmaster-rating-select" data-rating-score="0"></span>-->
<!--                                            <i class="tourmaster-rating-select fa fa-star-o" data-rating-score="1"></i>-->
<!--                                            <span class="tourmaster-rating-select" data-rating-score="2"></span>-->
<!--                                            <i class="tourmaster-rating-select fa fa-star-o" data-rating-score="3"></i>-->
<!--                                            <span class="tourmaster-rating-select" data-rating-score="4"></span>-->
<!--                                            <i class="tourmaster-rating-select fa fa-star-o" data-rating-score="5"></i>-->
<!--                                            <span class="tourmaster-rating-select" data-rating-score="6"></span>-->
<!--                                            <i class="tourmaster-rating-select fa fa-star-o" data-rating-score="7"></i>-->
<!--                                            <span class="tourmaster-rating-select" data-rating-score="8"></span>-->
<!--                                            <i class="tourmaster-rating-select fa fa-star-o" data-rating-score="9"></i>-->
<!--                                            <span class="tourmaster-rating-select" data-rating-score="10"></span>-->
<!--                                            <input type="hidden" name="rating" value="0"/>-->
<!--                                            <span class="tourmaster-tail">or more</span>-->
<!--                                        </div>-->
                                        <div class="tourmaster-tour-search-item-divier"></div>
                                        <div class="tourmaster-tour-search-type-filter">
                                            <h3 class="tourmaster-type-filter-title">
                                                <i class="fa fa-sliders"></i>
                                                Type Filter<i class="icon_plus tourmaster-active"></i>
                                            </h3>
                                            <div class="tourmaster-type-filter-item-wrap tourmaster-active">
                                                <div class="tourmaster-type-filter-item">
                                                    <h5 class="tourmaster-type-filter-item-title">Tour Age</h5>
                                                    <label class="tourmaster-type-filter-term">
                                                        <input type="checkbox" name="tax-tour-age[]" value="10"/>
                                                        <span class="tourmaster-type-filter-display">
                                                                            <i class="fa fa-check"></i>
                                                                            <span class="tourmaster-head">10+</span>
                                                                        </span>
                                                    </label>
                                                    <label class="tourmaster-type-filter-term">
                                                        <input type="checkbox" name="tax-tour-age[]" value="12"/>
                                                        <span class="tourmaster-type-filter-display">
                                                                            <i class="fa fa-check"></i>
                                                                            <span class="tourmaster-head">12+</span>
                                                                        </span>
                                                    </label>
                                                    <label class="tourmaster-type-filter-term">
                                                        <input type="checkbox" name="tax-tour-age[]" value="15"/>
                                                        <span class="tourmaster-type-filter-display">
                                                                            <i class="fa fa-check"></i>
                                                                            <span class="tourmaster-head">15+</span>
                                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="tourmaster-type-filter-item">
                                                    <h5 class="tourmaster-type-filter-item-title">Destination</h5>
                                                    <?php foreach ($location as $item) : ?>
                                                        <label class="tourmaster-type-filter-term">
                                                            <input type="checkbox" name="tax-tour-destination[]" value="<?= $item->slug; ?>"/>
                                                            <span class="tourmaster-type-filter-display">
                                                                            <i class="fa fa-check"></i>
                                                                            <span class="tourmaster-head"><?= $item->name; ?></span>
                                                                        </span>
                                                        </label>
                                                    <?php endforeach;?>
<!--                                                    <label class="gdlr-core-skin-title">-->
<!--                                                        <input class="tourmaster-type-filter-show-more" type="checkbox"/>-->
<!--                                                        <span class="tourmaster-type-filter-more-button">-->
<!--                                                                            More<i class="fa fa-angle-down"></i>-->
<!--                                                                        </span>-->
<!--                                                        <div class="tourmaster-type-filter-hide">-->
<!--                                                            <label class="tourmaster-type-filter-term">-->
<!--                                                                <input type="checkbox" name="tax-tour-destination[]" value="western-europe"/>-->
<!--                                                                <span class="tourmaster-type-filter-display">-->
<!--                                                                                    <i class="fa fa-check"></i>-->
<!--                                                                                    <span class="tourmaster-head">Western Europe</span>-->
<!--                                                                                </span>-->
<!--                                                            </label>-->
<!--                                                        </div>-->
<!--                                                    </label>-->
                                                </div>
                                            </div>
                                        </div>
                                        <input class="tourmaster-tour-search-submit" type="submit" value="Search"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tourmaster-tour-search-content-wrap">
                            <h3 class="tourmaster-tour-search-content-head tourmaster-item-mglr"><?= $tour->post_count; ?> Results Found</h3>
                            <div class="tourmaster-tour-item clearfix  tourmaster-tour-item-style-grid tourmaster-tour-item-column-2">
<!--                                <div class="tourmaster-tour-order-filterer-wrap tourmaster-item-mglr clearfix" data-tm-ajax="tourmaster_tour_order_ajax" data-settings="{&quot;category&quot;:&quot;&quot;,&quot;tag&quot;:&quot;&quot;,&quot;num-fetch&quot;:&quot;9&quot;,&quot;layout&quot;:&quot;fitrows&quot;,&quot;thumbnail-size&quot;:&quot;Blog Column Thumbnail&quot;,&quot;orderby&quot;:&quot;date&quot;,&quot;order&quot;:&quot;desc&quot;,&quot;tour-style&quot;:&quot;grid&quot;,&quot;hover&quot;:&quot;title-icon&quot;,&quot;hover-info&quot;:[&quot;title&quot;,&quot;icon&quot;],&quot;has-column&quot;:&quot;yes&quot;,&quot;no-space&quot;:&quot;no&quot;,&quot;excerpt&quot;:&quot;specify-number&quot;,&quot;excerpt-number&quot;:&quot;14&quot;,&quot;column-size&quot;:&quot;30&quot;,&quot;filterer&quot;:&quot;none&quot;,&quot;filterer-align&quot;:&quot;center&quot;,&quot;pagination&quot;:&quot;page&quot;,&quot;custom-pagination&quot;:true,&quot;grid-style&quot;:&quot;style-2&quot;,&quot;tour-info&quot;:[&quot;duration-text&quot;,&quot;availability&quot;],&quot;tour-rating&quot;:&quot;enable&quot;,&quot;tour-border-radius&quot;:&quot;3px&quot;,&quot;frame-shadow-size&quot;:{&quot;x&quot;:0,&quot;y&quot;:0,&quot;size&quot;:&quot;25px&quot;},&quot;frame-shadow-color&quot;:&quot;#0a0a0a&quot;,&quot;frame-shadow-opacity&quot;:&quot;0.08&quot;,&quot;tour-title-font-size&quot;:&quot;&quot;,&quot;tour-title-font-weight&quot;:&quot;&quot;,&quot;tour-title-letter-spacing&quot;:&quot;&quot;,&quot;tour-title-text-transform&quot;:&quot;&quot;,&quot;paged&quot;:1,&quot;filter-icon&quot;:&quot;svg&quot;,&quot;enable-order-filterer&quot;:&quot;enable&quot;,&quot;order-filterer-grid-style&quot;:&quot;grid-with-frame&quot;,&quot;order-filterer-grid-style-thumbnail&quot;:&quot;Blog Column Thumbnail&quot;,&quot;order-filterer-grid-style-column&quot;:&quot;30&quot;,&quot;order-filterer-list-style&quot;:&quot;medium-with-frame&quot;,&quot;order-filterer-list-style-thumbnail&quot;:&quot;Tour Category&quot;,&quot;s&quot;:&quot;&quot;,&quot;tax_query&quot;:{&quot;relation&quot;:&quot;AND&quot;},&quot;meta_query&quot;:{&quot;relation&quot;:&quot;AND&quot;},&quot;with-frame&quot;:&quot;enable&quot;,&quot;column-size-temp&quot;:&quot;30&quot;}" data-target="tourmaster-tour-item-holder" data-target-action="replace" data-ajax-url="https://demo.goodlayers.com/traveltour/main4/wp-admin/admin-ajax.php">-->
                                    <div class="tourmaster-tour-order-filterer-wrap tourmaster-item-mglr clearfix">
                                    <h3 class="tourmaster-tour-order-filterer-title">Sort by</h3>
                                    <div class="tourmaster-combobox-wrap">
                                        <form class="form-oiderby-test" method="post">
                                            <select class="form-orderby">
    <!--                                            data-ajax-name="orderby"-->
                                                <option value="date" selected>Release Date</option>
                                                <option value="tour-date" class="order-item">Tour Date</option>
                                                <option value="title" class="order-item">Title</option>
                                                <option value="price" class="order-item">Price</option>
                                                <option value="popularity" class="order-item">Popularity</option>
                                                <option value="rating" class="order-item">Rating</option>
                                                <option value="duration" class="order-item">Duration</option>
                                            </select>
                                        </form>
                                    </div>
                                    <div class="tourmaster-combobox-wrap">
                                        <form class="form-oiderby-sort" method="post">
                                            <select data-ajax-name="order">
                                                <option value="ASC">Ascending</option>
                                                <option value="DES" selected>Descending</option>
                                            </select>
                                        </form>
                                    </div>
<!--                                    <span class="tourmaster-tour-order-filterer-style">-->
<!--                                                        <a href="#" data-ajax-name="item-style" class="" data-ajax-value="list-style">-->
<!--                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" viewBox="0 0 25 20">-->
<!--                                                                <circle class="cls-1" cx="2" cy="2" r="2"/>-->
<!--                                                                <circle id="Ellipse_955_copy_2" data-name="Ellipse 955 copy 2" class="cls-1" cx="2" cy="10" r="2"/>-->
<!--                                                                <circle id="Ellipse_955_copy_3" data-name="Ellipse 955 copy 3" class="cls-1" cx="2" cy="18" r="2"/>-->
<!--                                                                <rect class="cls-1" x="6" width="19" height="4" rx="2" ry="2"/>-->
<!--                                                                <rect id="Rectangle_959_copy" data-name="Rectangle 959 copy" class="cls-1" x="6" y="8" width="19" height="4" rx="2" ry="2"/>-->
<!--                                                                <rect id="Rectangle_959_copy_2" data-name="Rectangle 959 copy 2" class="cls-1" x="6" y="16" width="19" height="4" rx="2" ry="2"/>-->
<!--                                                            </svg>-->
<!--                                                        </a>-->
<!--                                                        <a href="#" data-ajax-name="item-style" class="tourmaster-active" data-ajax-value="grid-style">-->
<!--                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">-->
<!--                                                                <circle id="Ellipse_955_copy_2" data-name="Ellipse 955 copy 2" class="cls-1" cx="2" cy="2" r="2"/>-->
<!--                                                                <circle id="Ellipse_955_copy_3" data-name="Ellipse 955 copy 3" class="cls-1" cx="9" cy="2" r="2"/>-->
<!--                                                                <circle id="Ellipse_955_copy_4" data-name="Ellipse 955 copy 4" class="cls-1" cx="16" cy="2" r="2"/>-->
<!--                                                                <circle id="Ellipse_955_copy_5" data-name="Ellipse 955 copy 5" class="cls-1" cx="2" cy="9" r="2"/>-->
<!--                                                                <circle id="Ellipse_955_copy_5-2" data-name="Ellipse 955 copy 5" class="cls-1" cx="9" cy="9" r="2"/>-->
<!--                                                                <circle id="Ellipse_955_copy_5-3" data-name="Ellipse 955 copy 5" class="cls-1" cx="16" cy="9" r="2"/>-->
<!--                                                                <circle id="Ellipse_955_copy_6" data-name="Ellipse 955 copy 6" class="cls-1" cx="2" cy="16" r="2"/>-->
<!--                                                                <circle id="Ellipse_955_copy_6-2" data-name="Ellipse 955 copy 6" class="cls-1" cx="9" cy="16" r="2"/>-->
<!--                                                                <circle id="Ellipse_955_copy_6-3" data-name="Ellipse 955 copy 6" class="cls-1" cx="16" cy="16" r="2"/>-->
<!--                                                            </svg>-->
<!--                                                        </a>-->
<!--                                                    </span>-->
                                </div>
                                <div class="tourmaster-tour-item-holder gdlr-core-js-2 clearfix" data-layout="fitrows">
                                    <?php
                                    $count = 1;
                                    foreach ($tour->posts as $value){
                                        $field = get_field('general_imformation', $value->ID);
                                        if ( ($count % 2) == 1){
                                            if($field['best_seller'] == 'yes'){?>
                                                <div class="gdlr-core-item-list  tourmaster-item-pdlr tourmaster-column-30 tourmaster-column-first">
                                                    <div class="tourmaster-tour-grid  tourmaster-tour-frame tourmaster-tour-grid-style-2 tourmaster-price-right-title">
                                                        <div class="tourmaster-tour-grid-inner" style="box-shadow: 0 0 25px rgba(10, 10, 10,0.08); -moz-box-shadow: 0 0 25px rgba(10, 10, 10,0.08); -webkit-box-shadow: 0 0 25px rgba(10, 10, 10,0.08); border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                                            <div class="tourmaster-tour-thumbnail tourmaster-media-image  gdlr-core-outer-frame-element">
                                                                <a href="<?= $value->guid?>">
                                                                    <img src="<?= get_the_post_thumbnail_url($value->ID)?>" width="700" height="430" srcset="<?= get_the_post_thumbnail_url($value->ID)?> 400w, <?= get_the_post_thumbnail_url($value->ID)?> 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 50vw, 575px" alt=""/>
                                                                </a>
                                                            </div>
                                                            <div class="tourmaster-tour-content-wrap gdlr-core-skin-e-background gdlr-core-js" data-sync-height="tour-item-52">
                                                                <div class="tourmaster-thumbnail-ribbon gdlr-core-outer-frame-element" style="color: #ffffff;background-color: #f97150;">
                                                                    <div class="tourmaster-thumbnail-ribbon-cornor" style="border-right-color: rgba(249, 113, 80, 0.5);"></div>
                                                                    Best Seller
                                                                </div>
                                                                <h3 class="tourmaster-tour-title gdlr-core-skin-title">
                                                                    <a href="<?= $value->guid?>">
                                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve" style="fill: #f97150">
                                                                                <path d="M397.413,199.303c-2.944-4.576-8-7.296-13.408-7.296h-112v-176c0-7.552-5.28-14.08-12.672-15.648
			c-7.52-1.6-14.88,2.272-17.952,9.152l-128,288c-2.208,4.928-1.728,10.688,1.216,15.2c2.944,4.544,8,7.296,13.408,7.296h112v176
			c0,7.552,5.28,14.08,12.672,15.648c1.12,0.224,2.24,0.352,3.328,0.352c6.208,0,12-3.616,14.624-9.504l128-288
			C400.805,209.543,400.389,203.847,397.413,199.303z"/>
                                                                            </svg>
                                                                        <span><?= $value->post_title?></span>
                                                                    </a>
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
                                                                    <div class="tourmaster-tour-info tourmaster-tour-info-availability ">
                                                                        <i class="fa fa-calendar"></i>
                                                                        <?php
                                                                        $infoTour = get_field('information_tour', $value->ID);
                                                                        if(!empty($infoTour['tour_start']) && !empty($infoTour['tour_end'])){
                                                                            $dateStart = date_create($infoTour['tour_start']);
                                                                            $dateEnd = date_create($infoTour['tour_end']);
                                                                            $start = date_format($dateStart, "M d");
                                                                            $end = date_format($dateEnd, "M d");
                                                                        }
                                                                        ?>
                                                                        Availability : <?php if(!empty($start)){echo $start;}else{echo get_the_date();} ?>’ - <?php if(!empty($end)){echo $end;}else{echo get_the_date();} ?>’
                                                                    </div>
                                                                </div>
                                                                <div class="tourmaster-tour-content">Donec id elit non mi porta gravida at eget metus. Nulla vitae elit libero, [&hellip;]</div>
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
                                            <?php } else{?>
                                                <div class="gdlr-core-item-list  tourmaster-item-pdlr tourmaster-column-30 tourmaster-column-first">
                                                    <div class="tourmaster-tour-grid  tourmaster-tour-frame tourmaster-tour-grid-style-2 tourmaster-price-right-title">
                                                        <div class="tourmaster-tour-grid-inner" style="box-shadow: 0 0 25px rgba(10, 10, 10,0.08); -moz-box-shadow: 0 0 25px rgba(10, 10, 10,0.08); -webkit-box-shadow: 0 0 25px rgba(10, 10, 10,0.08); border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                                            <div class="tourmaster-tour-thumbnail tourmaster-media-image  gdlr-core-outer-frame-element">
                                                                <a href="<?= $value->guid?>">
                                                                    <img src="<?= get_the_post_thumbnail_url($value->ID)?>" width="700" height="430" srcset="<?= get_the_post_thumbnail_url($value->ID)?> 400w, <?= get_the_post_thumbnail_url($value->ID)?> 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 50vw, 575px" alt=""/>
                                                                </a>
                                                            </div>
                                                            <div class="tourmaster-tour-content-wrap gdlr-core-skin-e-background gdlr-core-js" data-sync-height="tour-item-52">
                                                                <h3 class="tourmaster-tour-title gdlr-core-skin-title">
                                                                    <a href="<?= $value->guid?>"><?= $value->post_title; ?></a>
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
                                                                    <div class="tourmaster-tour-info tourmaster-tour-info-availability ">
                                                                        <i class="fa fa-calendar"></i>
                                                                        <?php
                                                                        $infoTour = get_field('information_tour', $value->ID);
                                                                        if(!empty($infoTour['tour_start']) && !empty($infoTour['tour_end'])){
                                                                            $dateStart = date_create($infoTour['tour_start']);
                                                                            $dateEnd = date_create($infoTour['tour_end']);
                                                                            $start = date_format($dateStart, "M d");
                                                                            $end = date_format($dateEnd, "M d");
                                                                        }
                                                                        ?>
                                                                        Availability : <?php if(!empty($start)){echo $start;}else{echo get_the_date();} ?>’ - <?php if(!empty($end)){echo $end;}else{echo get_the_date();} ?>’
                                                                    </div>
                                                                </div>
                                                                <div class="tourmaster-tour-content">Donec id elit non mi porta gravida at eget metus. Nulla vitae elit libero, [&hellip;]</div>
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
                                            <?php }
                                        }else{
                                            if ($field['best_seller'] == 'yes'){?>
                                                <div class="gdlr-core-item-list  tourmaster-item-pdlr tourmaster-column-30">
                                                    <div class="tourmaster-tour-grid  tourmaster-tour-frame tourmaster-tour-grid-style-2 tourmaster-price-right-title">
                                                        <div class="tourmaster-tour-grid-inner" style="box-shadow: 0 0 25px rgba(10, 10, 10,0.08); -moz-box-shadow: 0 0 25px rgba(10, 10, 10,0.08); -webkit-box-shadow: 0 0 25px rgba(10, 10, 10,0.08); border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                                            <div class="tourmaster-tour-thumbnail tourmaster-media-image  gdlr-core-outer-frame-element">
                                                                <a class="gdlr-core-lightgallery gdlr-core-js " href="https://www.youtube.com/watch?v=eZjmjT5SLYs">
                                                                    <div class="tourmaster-tour-thumbnail-overlay">
                                                                        <i class="fa fa-film"></i>
                                                                    </div>
                                                                    <img src="<?= get_the_post_thumbnail_url($value->ID); ?>" width="700" height="430" srcset="<?= get_the_post_thumbnail_url($value->ID)?> 400w, <?= get_the_post_thumbnail_url($value->ID)?>" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 50vw, 575px" alt=""/>
                                                                </a>
                                                            </div>
                                                            <div class="tourmaster-tour-content-wrap gdlr-core-skin-e-background gdlr-core-js" data-sync-height="tour-item-52">
                                                                <div class="tourmaster-thumbnail-ribbon gdlr-core-outer-frame-element" style="color: #ffffff;background-color: #e85e34;">
                                                                    <div class="tourmaster-thumbnail-ribbon-cornor" style="border-right-color: rgba(232, 94, 52, 0.5);"></div>
                                                                    Best Seller
                                                                </div>
                                                                <h3 class="tourmaster-tour-title gdlr-core-skin-title">
                                                                    <a href="<?= $value->guid?>">
                                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve" style="fill: #e85e34">
                                                                                <path d="M397.413,199.303c-2.944-4.576-8-7.296-13.408-7.296h-112v-176c0-7.552-5.28-14.08-12.672-15.648
			c-7.52-1.6-14.88,2.272-17.952,9.152l-128,288c-2.208,4.928-1.728,10.688,1.216,15.2c2.944,4.544,8,7.296,13.408,7.296h112v176
			c0,7.552,5.28,14.08,12.672,15.648c1.12,0.224,2.24,0.352,3.328,0.352c6.208,0,12-3.616,14.624-9.504l128-288
			C400.805,209.543,400.389,203.847,397.413,199.303z"/>
                                                                            </svg>
                                                                        <span><?= $value->post_title?></span>
                                                                    </a>
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
                                                                    <div class="tourmaster-tour-info tourmaster-tour-info-availability ">
                                                                        <i class="fa fa-calendar"></i>
                                                                        <?php
                                                                        $infoTour = get_field('information_tour', $value->ID);
                                                                        if(!empty($infoTour['tour_start']) && !empty($infoTour['tour_end'])){
                                                                            $dateStart = date_create($infoTour['tour_start']);
                                                                            $dateEnd = date_create($infoTour['tour_end']);
                                                                            $start = date_format($dateStart, "M d");
                                                                            $end = date_format($dateEnd, "M d");
                                                                        }
                                                                        ?>
                                                                        Availability : <?php if(!empty($start)){echo $start;}else{echo get_the_date();} ?>’ - <?php if(!empty($end)){echo $end;}else{echo get_the_date();} ?>’
                                                                    </div>
                                                                </div>
                                                                <div class="tourmaster-tour-content">Donec id elit non mi porta gravida at eget metus. Nulla vitae elit libero, [&hellip;]</div>
                                                                <div class="tourmaster-tour-rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <span class="tourmaster-tour-rating-text">(2 Reviews)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }else{?>
                                                <div class="gdlr-core-item-list  tourmaster-item-pdlr tourmaster-column-30">
                                                    <div class="tourmaster-tour-grid  tourmaster-tour-frame tourmaster-tour-grid-style-2 tourmaster-price-right-title">
                                                        <div class="tourmaster-tour-grid-inner" style="box-shadow: 0 0 25px rgba(10, 10, 10,0.08); -moz-box-shadow: 0 0 25px rgba(10, 10, 10,0.08); -webkit-box-shadow: 0 0 25px rgba(10, 10, 10,0.08); border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                                            <div class="tourmaster-tour-thumbnail tourmaster-media-image  gdlr-core-outer-frame-element">
                                                                <a href="<?= $value->guid?>">
                                                                    <img src="<?= get_the_post_thumbnail_url($value->ID); ?>" width="700" height="430" srcset="<?= get_the_post_thumbnail_url($value->ID); ?> 400w, <?= get_the_post_thumbnail_url($value->ID); ?> 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 50vw, 575px" alt=""/>
                                                                </a>
                                                            </div>
                                                            <div class="tourmaster-tour-content-wrap gdlr-core-skin-e-background gdlr-core-js" data-sync-height="tour-item-52">
                                                                <h3 class="tourmaster-tour-title gdlr-core-skin-title">
                                                                    <a href="<?= $value->guid?>"><?= $value->post_title; ?></a>
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
                                                                    <div class="tourmaster-tour-info tourmaster-tour-info-availability ">
                                                                        <i class="fa fa-calendar"></i>
                                                                        <?php
                                                                        $infoTour = get_field('information_tour', $value->ID);
                                                                        if(!empty($infoTour['tour_start']) && !empty($infoTour['tour_end'])){
                                                                            $dateStart = date_create($infoTour['tour_start']);
                                                                            $dateEnd = date_create($infoTour['tour_end']);
                                                                            $start = date_format($dateStart, "M d");
                                                                            $end = date_format($dateEnd, "M d");
                                                                        }
                                                                        ?>
                                                                        Availability : <?php if(!empty($start)){echo $start;}else{echo get_the_date();} ?>’ - <?php if(!empty($end)){echo $end;}else{echo get_the_date();} ?>’
                                                                    </div>
                                                                </div>
                                                                <div class="tourmaster-tour-content">Donec id elit non mi porta gravida at eget metus. Nulla vitae elit libero, [&hellip;]</div>
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
                                            <?php }
                                        }
                                        $count ++;
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
                                        'prev_text' => __('<i class="fa fa-angle-left"></i>'),
                                        'next_text' => __('<i class="fa fa-angle-right"></i>'),
                                    )
                                );

                                if (is_array($pages)){
                                    $pagination = '<div class="tourmaster-pagination tourmaster-ajax-action  tourmaster-style-round tourmaster-right-align tourmaster-item-pdlr">';
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
    </div>
</div>

<?php
get_footer();
?>
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<script src="<?= get_template_directory_uri()?>/templates/includes/js/scripts.js"></script>
<script src="<?= get_template_directory_uri()?>/templates/includes/js/scripts.js"></script>
<script>
    var tourSearch = "<?php echo $textSearch; ?>";
    var destination = "<?php echo $destination; ?>";
    var duration = "<?php echo $duration; ?>";
</script>
