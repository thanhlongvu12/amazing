<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 6/22/2023
 * Time: 11:26 AM
 * Template Name: Destinations
 */

$uri = get_template_directory_uri();

$obj = get_queried_object();

$terms = get_terms(array(
    'taxonomy'=>'location',
    'hide_empty'=>false
));

$fieldBanner = get_field('banner', $obj->ID);

get_header();
?>
<div class="traveltour-page-title-wrap  traveltour-style-large traveltour-center-align" style="background-image: url(<?= $fieldBanner; ?>)">
    <div class="traveltour-header-transparent-substitute"></div>
    <div class="traveltour-page-title-overlay"></div>
    <div class="traveltour-page-title-container traveltour-container">
        <div class="traveltour-page-title-content traveltour-item-pdlr">
            <h1 class="traveltour-page-title"><?= $obj->post_title?></h1>
            <div class="traveltour-page-caption">Explore Tours By Destinations</div>
        </div>
    </div>
</div>
<div class="traveltour-page-wrapper" id="traveltour-page-wrapper">
    <div class="gdlr-core-page-builder-body">
        <div class="gdlr-core-pbf-section">
            <div class="gdlr-core-pbf-section-container gdlr-core-container clearfix">
                <div class="gdlr-core-pbf-element">
                    <div class="tourmaster-tour-category clearfix ">
                        <?php
                        $count = 1;
                        foreach ($terms as $item){
                            $field = get_field('location', $item);
                            if ($count == 1) {
                                ?>
                                <div class="tourmaster-tour-category-grid-3 tourmaster-item-list  tourmaster-item-pdlr tourmaster-item-mgb tourmaster-column-20 tourmaster-column-first tourmaster-with-thumbnail">
                                    <div class="tourmaster-tour-category-item-wrap">
                                        <div class="tourmaster-tour-category-thumbnail tourmaster-media-image">
                                            <img src="<?= $field['image']?>" width="800" height="960" srcset="<?= $field['image']?> 400w, <?= $field['image']?> 600w, <?= $field['image']?> 800w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 100vw, 1150px" alt="" style="max-height: 370px"/>
                                        </div>
                                        <div class="tourmaster-tour-category-count"><?= $item->count?>tours</div>
                                        <div class="tourmaster-tour-category-overlay"></div>
                                        <div class="tourmaster-tour-category-overlay-front"></div>
                                        <div class="tourmaster-tour-category-head">
                                            <div class="tourmaster-tour-category-head-display clearfix">
                                                <h3 class="tourmaster-tour-category-title"><?= $item->name?></h3>
                                            </div>
                                            <div class="tourmaster-tour-category-head-animate">
                                                <div class="tourmaster-tour-category-description"><?= $field['description']?></div>
                                                <a class="tourmaster-tour-category-head-link" href="<?= get_term_link($item->term_id); ?>">View all tours</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }else{
                                ?>
                                <div class="tourmaster-tour-category-grid-3 tourmaster-item-list  tourmaster-item-pdlr tourmaster-item-mgb tourmaster-column-20 tourmaster-with-thumbnail">
                                    <div class="tourmaster-tour-category-item-wrap">
                                        <div class="tourmaster-tour-category-thumbnail tourmaster-media-image">
                                            <img src="<?= $field['image']?>" width="800" height="960" srcset="<?= $field['image']?> 400w, <?= $field['image']?> 600w, <?= $field['image']?> 800w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 100vw, 1150px" alt="" style="max-height: 370px"/>
                                        </div>
                                        <div class="tourmaster-tour-category-count"><?= $item->count?> tours</div>
                                        <div class="tourmaster-tour-category-overlay"></div>
                                        <div class="tourmaster-tour-category-overlay-front"></div>
                                        <div class="tourmaster-tour-category-head">
                                            <div class="tourmaster-tour-category-head-display clearfix">
                                                <h3 class="tourmaster-tour-category-title"><?= $item->name?></h3>
                                            </div>
                                            <div class="tourmaster-tour-category-head-animate">
                                                <div class="tourmaster-tour-category-description"><?= $field['description']?></div>
                                                <a class="tourmaster-tour-category-head-link" href="<?= get_term_link($item->term_id); ?>">View all tours</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            $count==3?$count=1:$count++;
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
