<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package theme
 * Template Name: Search
 */
$search = $_GET['s'];
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$arrTour = array(
    'post_type'=>'dia_diem_du_lich',
    'paged' => $paged,
    'posts_per_page'=>2,
    's'=>$search,
);

$resultTour = new WP_Query($arrTour);
$resultTour->the_post();


get_header();
?>
<?php if($resultTour->post_count == 0): ?>
    <style>
        .traveltour-not-found-wrap .traveltour-not-found-background {
            position: absolute;
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 0px;
            opacity: 0.27;
            filter: alpha(opacity=27);
            background-position: center;
            background-size: cover;
            background-image: url(https://demo.goodlayers.com/traveltour/main4/wp-content/themes/traveltour/images/404-background.jpg);
        }
    </style>
    <div class="traveltour-not-found-wrap" id="traveltour-full-no-header-wrap">
        <div class="traveltour-not-found-background"></div>
        <div class="traveltour-not-found-container traveltour-container">
            <div class="traveltour-not-found-content traveltour-item-pdlr">
                <h1 class="traveltour-not-found-head">Not Found</h1>
                <div class="traveltour-not-found-caption">Nothing matched your search criteria. Please try again with different keywords.</div>
                <form role="search" method="get" class="search-form" action="http://amazing.test/">
                    <input type="text" class="search-field traveltour-title-font" placeholder="Type Keywords..." value="" name="s">
                    <div class="traveltour-top-search-submit">
                        <i class="fa fa-search"></i>
                    </div>
                    <input type="submit" class="search-submit" value="Search">
                </form>
                <div class="traveltour-not-found-back-to-home">
                    <a href="http://amazing.test/">Or Back To Homepage</a>
                </div>
            </div>
        </div>
    </div>
    <div class="traveltour-page-wrapper" id="traveltour-page-wrapper"></div>
<?php else:?>
<div class="traveltour-page-title-wrap  traveltour-style-medium traveltour-center-align">
    <div class="traveltour-header-transparent-substitute"></div>
    <div class="traveltour-page-title-overlay"></div>
    <div class="traveltour-page-title-container traveltour-container">
        <div class="traveltour-page-title-content traveltour-item-pdlr">
            <h3 class="traveltour-page-title">Search Results</h3>
            <div class="traveltour-page-caption"><?= $search; ?></div>
        </div>
    </div>
</div>
<div class="traveltour-page-wrapper" id="traveltour-page-wrapper">
    <div class="traveltour-content-container traveltour-container">
        <div class=" traveltour-sidebar-wrap clearfix traveltour-line-height-0 traveltour-sidebar-style-right">
            <div class=" traveltour-sidebar-center traveltour-column-40 traveltour-line-height">
                <div class="traveltour-content-area">
                    <div class="gdlr-core-blog-item gdlr-core-item-pdb clearfix  gdlr-core-style-blog-full">
                        <div class="gdlr-core-blog-item-holder gdlr-core-js-2 clearfix" data-layout="fitrows">
                            <?php foreach ($resultTour->posts as $value): ?>
                                <?php
                                $date=$value->post_date;
                                $day = date('d', strtotime($date));
                                $month = date('M', strtotime($date));
                                $yeah = date('Y', strtotime($date));
                                $date_format = date_i18n('M d, Y', $date);
                                ?>
                                <?php if (!empty(get_the_post_thumbnail_url($value->ID))):?>
                                    <div class="gdlr-core-item-list gdlr-core-blog-full  gdlr-core-item-pdlr gdlr-core-style-left">
                                        <div class="gdlr-core-blog-thumbnail gdlr-core-media-image  gdlr-core-opacity-on-hover gdlr-core-zoom-on-hover">
                                            <a href="<?= $value->guid; ?>">
                                                <img src="<?= get_the_post_thumbnail_url($value->ID); ?>" width="2000" height="1333" srcset="<?= get_the_post_thumbnail_url($value->ID); ?> 400w, <?= get_the_post_thumbnail_url($value->ID); ?> 600w, <?= get_the_post_thumbnail_url($value->ID); ?> 800w, <?= get_the_post_thumbnail_url($value->ID); ?> 2000w" sizes="(max-width: 767px) 100vw, (max-width: 1150px) 100vw, 1150px" alt=""/>
                                            </a>
                                        </div>
                                        <div class="gdlr-core-blog-full-head clearfix">
                                            <div class="gdlr-core-blog-date-wrapper gdlr-core-skin-divider">
                                                <div class="gdlr-core-blog-date-day gdlr-core-skin-caption"><?= $day; ?></div>
                                                <div class="gdlr-core-blog-date-month gdlr-core-skin-caption"><?= $month; ?></div>
                                            </div>
                                            <div class="gdlr-core-blog-full-head-right">
                                                <div class="gdlr-core-blog-info-wrapper gdlr-core-skin-divider">
                                                                <span class="gdlr-core-blog-info gdlr-core-blog-info-font gdlr-core-skin-caption gdlr-core-blog-info-date">
                                                                    <span class="gdlr-core-head">
                                                                        <i class="icon_clock_alt"></i>
                                                                    </span>
                                                                    <?= $date_format?>
                                                                </span>
                                                    <span class="gdlr-core-blog-info gdlr-core-blog-info-font gdlr-core-skin-caption gdlr-core-blog-info-author">
                                                                    <span class="gdlr-core-head">
                                                                        <i class="icon_documents_alt"></i>
                                                                    </span>
                                                                    <a href="https://demo.goodlayers.com/traveltour/main4/author/superuser/" title="Posts by John Smith" rel="author"><?= the_author_meta('user_nicename', $value->post_author); ?></a>
                                                                </span>
                                                </div>
                                                <h3 class="gdlr-core-blog-title gdlr-core-skin-title">
                                                    <a href="<?= $value->guid; ?>"><?= $value->post_title; ?></a>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-blog-content clearfix">
                                            <div class="clear"></div>
                                            <a class="gdlr-core-excerpt-read-more gdlr-core-button gdlr-core-rectangle" href="<?= $value->guid; ?>">Read More</a>
                                        </div>
                                    </div>
                                <?php else:?>
                                    <div class="gdlr-core-item-list gdlr-core-blog-full  gdlr-core-item-pdlr gdlr-core-style-left">
                                        <div class="gdlr-core-blog-full-head clearfix">
                                            <div class="gdlr-core-blog-date-wrapper gdlr-core-skin-divider">
                                                <div class="gdlr-core-blog-date-day gdlr-core-skin-caption"><?= $day; ?></div>
                                                <div class="gdlr-core-blog-date-month gdlr-core-skin-caption"><?= $month; ?></div>
                                            </div>
                                            <div class="gdlr-core-blog-full-head-right">
                                                <div class="gdlr-core-blog-info-wrapper gdlr-core-skin-divider">
                                                                <span class="gdlr-core-blog-info gdlr-core-blog-info-font gdlr-core-skin-caption gdlr-core-blog-info-date">
                                                                    <span class="gdlr-core-head">
                                                                        <i class="icon_clock_alt"></i>
                                                                    </span>
                                                                    <?= $date_format; ?>
                                                                </span>
                                                    <span class="gdlr-core-blog-info gdlr-core-blog-info-font gdlr-core-skin-caption gdlr-core-blog-info-author">
                                                                    <span class="gdlr-core-head">
                                                                        <i class="icon_documents_alt"></i>
                                                                    </span>
                                                                    <a href="https://demo.goodlayers.com/traveltour/main4/author/superuser/" title="Posts by <?php the_author_meta('user_nicename', $value->post_author); ?>" rel="author"><?php the_author_meta('user_nicename', $value->post_author); ?></a>
                                                                </span>
                                                </div>
                                                <h3 class="gdlr-core-blog-title gdlr-core-skin-title">
                                                    <a href="<?= $value->guid?>"></a>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-blog-content clearfix">
                                            <div class="clear"></div>
                                            <a class="gdlr-core-excerpt-read-more gdlr-core-button gdlr-core-rectangle" href="<?= $value->guid?>">Read More</a>
                                        </div>
                                    </div>
                                <?php endif;?>
                            <?php endforeach;?>

                            <?php
                            $pages = paginate_links(
                                array(
                                    'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                                    'format' => '?paged=%#%',
                                    'type'=>'array',
                                    'end_size'=>2,
                                    'mid_size'=>1,
                                    'current' => max(1, get_query_var('paged')),
                                    'total' => $resultTour->max_num_pages,
                                    'prev_text' => __(''),
                                    'next_text' => __(''),
                                )
                            );

                            if (is_array($pages)){
                                $pagination = '<div class="gdlr-core-pagination  gdlr-core-style-round gdlr-core-right-align gdlr-core-item-pdlr">';
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
            <div class=" traveltour-sidebar-right traveltour-column-20 traveltour-line-height traveltour-line-height">
                <div class="traveltour-sidebar-area traveltour-item-pdlr">
                    <div id="search-2" class="widget widget_search traveltour-widget">
                        <form role="search" method="get" class="search-form" action="<?= get_permalink(getIdPage(search)); ?>">
                            <label>
                                <span class="screen-reader-text">Search for:</span>
                                <input type="search" class="search-field" placeholder="Search &hellip;" value="ha" name="s"/>
                            </label>
                            <input type="submit" class="search-submit" value="Search"/>
                        </form>
                    </div>
                    <div id="recent-posts-2" class="widget widget_recent_entries traveltour-widget">
                        <h3 class="traveltour-widget-title">
                            <span class="traveltour-widget-head-text">Recent Posts</span>
                        </h3>
                        <span class="clear"></span>
                        <ul>
                            <li>
                                <a href="https://demo.goodlayers.com/traveltour/main4/2019/03/22/hello-world/">Hello world!</a>
                            </li>
                            <li>
                                <a href="https://demo.goodlayers.com/traveltour/main4/2016/06/06/how-to-travel-with-paper-map/">How to travel with paper map</a>
                            </li>
                            <li>
                                <a href="https://demo.goodlayers.com/traveltour/main4/2016/06/06/introducing-this-amazing-city/">Introducing this amazing city</a>
                            </li>
                            <li>
                                <a href="https://demo.goodlayers.com/traveltour/main4/2016/06/06/change-your-place-and-get-the-fresh-air/">Change your place and get the fresh air</a>
                            </li>
                            <li>
                                <a href="https://demo.goodlayers.com/traveltour/main4/2016/06/06/pityful-a-rethoric-question-ran/">Pityful a rethoric question ran</a>
                            </li>
                        </ul>
                    </div>
                    <div id="archives-2" class="widget widget_archive traveltour-widget">
                        <h3 class="traveltour-widget-title">
                            <span class="traveltour-widget-head-text">Archives</span>
                        </h3>
                        <span class="clear"></span>
                        <ul>
                            <li>
                                <a href='https://demo.goodlayers.com/traveltour/main4/2019/03/'>March 2019</a>
                            </li>
                            <li>
                                <a href='https://demo.goodlayers.com/traveltour/main4/2016/06/'>June 2016</a>
                            </li>
                        </ul>
                    </div>
                    <div id="categories-2" class="widget widget_categories traveltour-widget">
                        <h3 class="traveltour-widget-title">
                            <span class="traveltour-widget-head-text">Categories</span>
                        </h3>
                        <span class="clear"></span>
                        <ul>
                            <li class="cat-item cat-item-2">
                                <a href="https://demo.goodlayers.com/traveltour/main4/category/blog/">Blog</a>
                            </li>
                            <li class="cat-item cat-item-3">
                                <a href="https://demo.goodlayers.com/traveltour/main4/category/masonry/">Masonry</a>
                            </li>
                            <li class="cat-item cat-item-5">
                                <a href="https://demo.goodlayers.com/traveltour/main4/category/post-format/">Post Format</a>
                            </li>
                            <li class="cat-item cat-item-1">
                                <a href="https://demo.goodlayers.com/traveltour/main4/category/uncategorized/">Uncategorized</a>
                            </li>
                        </ul>
                    </div>
                    <div id="meta-2" class="widget widget_meta traveltour-widget">
                        <h3 class="traveltour-widget-title">
                            <span class="traveltour-widget-head-text">Meta</span>
                        </h3>
                        <span class="clear"></span>
                        <ul>
                            <li>
                                <a href="https://demo.goodlayers.com/traveltour/main4/wp-login.php?action=register">Register</a>
                            </li>
                            <li>
                                <a href="https://demo.goodlayers.com/traveltour/main4/wp-login.php">Log in</a>
                            </li>
                            <li>
                                <a href="https://demo.goodlayers.com/traveltour/main4/feed/">Entries feed</a>
                            </li>
                            <li>
                                <a href="https://demo.goodlayers.com/traveltour/main4/comments/feed/">Comments feed</a>
                            </li>
                            <li>
                                <a href="https://wordpress.org/">WordPress.org</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>

<?php
get_footer();
?>
