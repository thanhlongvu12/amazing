<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 6/12/2023
 * Time: 9:44 AM
 * Template Name: List Blog
 */

$obj = get_queried_object();

$category = get_terms('category');
$listCategory = array();

foreach ($category as $item){
    array_push($listCategory, $item->slug);
}

$listPost = array(
    'post_type'=>'post',
    'posts_per_page'=>-1,
    'tax_query'=>array(
        'relation'=>'AND',
        array(
            'taxonomy'=>'category',
            'field'=>'slug',
            'terms'=>$listCategory,
        ),
    ),
);

$listPostQuery = new WP_Query($listPost);

get_header();
?>

<div class="traveltour-page-title-wrap  traveltour-style-medium traveltour-center-align" style="background-image: url(<?= get_field('banner', $obj->ID); ?>)">
    <div class="traveltour-header-transparent-substitute"></div>
    <div class="traveltour-page-title-overlay"></div>
    <div class="traveltour-page-title-container traveltour-container">
        <div class="traveltour-page-title-content traveltour-item-pdlr">
            <h1 class="traveltour-page-title"><?= $obj->post_title; ?></h1>
<!--            <div class="traveltour-page-caption">Page caption algined here</div>-->
        </div>
    </div>
</div>
<div class="traveltour-page-wrapper" id="traveltour-page-wrapper">
    <div class="gdlr-core-page-builder-body">
        <div class="gdlr-core-pbf-wrapper " style="padding: 60px 0px 10px 0px;">
            <div class="gdlr-core-pbf-background-wrap" style="background-color: #f7f7f7 ;"></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-blog-item gdlr-core-item-pdb clearfix  gdlr-core-style-blog-column-with-frame" style="padding-bottom: 40px ;">
                            <div class="gdlr-core-blog-item-holder gdlr-core-js-2 clearfix" data-layout="fitrows">
                                <?php
                                $count = 1;
                                foreach ($listPostQuery->posts as $item){
                                    $cate = get_field('categoty_review', $item->ID);
                                    if ($count == 1){
                                        ?>
                                        <div class="gdlr-core-item-list  gdlr-core-item-pdlr gdlr-core-column-20 gdlr-core-column-first">
                                            <div class="gdlr-core-blog-grid gdlr-core-js  gdlr-core-blog-grid-with-frame gdlr-core-item-mgb gdlr-core-skin-e-background " data-sync-height="blog-item-1">
                                                <div class="gdlr-core-blog-thumbnail gdlr-core-media-image  gdlr-core-opacity-on-hover gdlr-core-zoom-on-hover">
                                                    <a href="<?= $item->guid; ?>">
                                                        <img src="<?= get_the_post_thumbnail_url($item->ID); ?>" width="700" height="500" srcset="<?= get_the_post_thumbnail_url($item->ID); ?> 400w, <?= get_the_post_thumbnail_url($item->ID); ?> 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 33vw, 383px" alt="" style="max-height: 263.59px"/>
                                                    </a>
                                                </div>
                                                <div class="gdlr-core-blog-grid-frame">
                                                    <div class="gdlr-core-blog-grid-date">
                                                <span class="gdlr-core-blog-info gdlr-core-blog-info-font gdlr-core-skin-caption gdlr-core-blog-info-date">
                                                    <span class="gdlr-core-head">
                                                        <i class="icon_clock_alt"></i>
                                                    </span>
                                                    <?php
                                                    $date = new DateTime($item->post_date);
                                                    ?>
                                                    <a href="#"><?= $date->format('M d Y'); ?></a>
                                                </span>
                                                    </div>
                                                    <h3 class="gdlr-core-blog-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;">
                                                        <a href="<?= $item->guid; ?>"><?= $item->post_title; ?></a>
                                                    </h3>
                                                    <div class="gdlr-core-blog-content clearfix">
                                                        A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm...<div class="clear"></div>
                                                    </div>
                                                    <div class="gdlr-core-blog-info-wrapper gdlr-core-skin-divider" data-sync-height-offset>
                                                <span class="gdlr-core-blog-info gdlr-core-blog-info-font gdlr-core-skin-caption gdlr-core-blog-info-author">
                                                    <span class="gdlr-core-head">
                                                        <i class="fa-light fa-folder"></i>
                                                    </span>
                                                    <a href="#" title="Posts by <?= get_the_author_meta('user_nicename',$item->post_author); ?>" rel="author"><?= get_the_author_meta('user_nicename',$item->post_author); ?></a>
                                                </span>
                                                        <span class="gdlr-core-blog-info gdlr-core-blog-info-font gdlr-core-skin-caption gdlr-core-blog-info-category">
                                                    <span class="gdlr-core-head">
                                                        <i class="fa-thin fa-file"></i>
                                                    </span>
                                                            <?php
                                                            $index = 1;
                                                            foreach ($cate as $c){
                                                                if ($index == 1) {
                                                                    ?>
                                                                    <a href="<?= get_term_link($c->term_id); ?>"><?= $c->name?></a>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <span class="gdlr-core-sep">,</span>
                                                                    <a href="<?= get_term_link($c->term_id); ?>"><?= $c->name?></a>
                                                                    <?php
                                                                }
                                                                $index++;
                                                            }
                                                            ?>
                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="gdlr-core-item-list  gdlr-core-item-pdlr gdlr-core-column-20">
                                            <div class="gdlr-core-blog-grid gdlr-core-js  gdlr-core-blog-grid-with-frame gdlr-core-item-mgb gdlr-core-skin-e-background " data-sync-height="blog-item-1">
                                                <div class="gdlr-core-blog-thumbnail gdlr-core-media-image  gdlr-core-opacity-on-hover gdlr-core-zoom-on-hover">
                                                    <a href="<?= $item->guid; ?>">
                                                        <img src="<?= get_the_post_thumbnail_url($item->ID); ?>" width="700" height="500" srcset="<?= get_the_post_thumbnail_url($item->ID); ?> 400w, <?= get_the_post_thumbnail_url($item->ID); ?> 700w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 33vw, 383px" alt="" style="max-height: 263.59px;"/>
                                                    </a>
                                                </div>
                                                <div class="gdlr-core-blog-grid-frame">
                                                    <div class="gdlr-core-blog-grid-date">
                                                <span class="gdlr-core-blog-info gdlr-core-blog-info-font gdlr-core-skin-caption gdlr-core-blog-info-date">
                                                    <span class="gdlr-core-head">
                                                        <i class="icon_clock_alt"></i>
                                                    </span>
                                                    <?php
                                                    $date = new DateTime($item->post_date);
                                                    ?>
                                                    <a href="#"><?= $date->format('M d Y'); ?></a>
                                                </span>
                                                    </div>
                                                    <h3 class="gdlr-core-blog-title gdlr-core-skin-title" style="font-size: 24px ;font-weight: 700 ;letter-spacing: 0px ;">
                                                        <a href="<?= $item->guid; ?>"><?= $item->post_title; ?></a>
                                                    </h3>
                                                    <div class="gdlr-core-blog-content clearfix">
                                                        A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm...<div class="clear"></div>
                                                    </div>
                                                    <div class="gdlr-core-blog-info-wrapper gdlr-core-skin-divider" data-sync-height-offset>
                                                <span class="gdlr-core-blog-info gdlr-core-blog-info-font gdlr-core-skin-caption gdlr-core-blog-info-author">
                                                    <span class="gdlr-core-head">
                                                        <i class="fa-light fa-folder"></i>
                                                    </span>
                                                    <a href="#" title="Posts by <?= get_the_author_meta('user_nicename',$item->post_author); ?>" rel="author"><?= get_the_author_meta('user_nicename',$item->post_author); ?></a>
                                                </span>
                                                        <span class="gdlr-core-blog-info gdlr-core-blog-info-font gdlr-core-skin-caption gdlr-core-blog-info-category">
                                                    <span class="gdlr-core-head">
                                                        <i class="fa-thin fa-file"></i>
                                                    </span>
                                                            <?php
                                                            $index = 1;
                                                            foreach ($cate as $c){
                                                                if ($index == 1) {
                                                                    ?>
                                                                    <a href="<?= get_term_link($c->term_id); ?>"><?= $c->name?></a>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <span class="gdlr-core-sep">,</span>
                                                                    <a href="<?= get_term_link($c->term_id); ?>"><?= $c->name?></a>
                                                                    <?php
                                                                }
                                                                $index++;
                                                            }
                                                            ?>
                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    $count++;
                                    if($count == 4){
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
</div>

<?php
get_footer();
?>
