<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package theme
 */

$obj = get_queried_object();

$backGround = get_field('back_ground', $obj->ID);

get_header();
?>
<div class="traveltour-page-wrapper" id="traveltour-page-wrapper">
    <div class="traveltour-blog-title-wrap  traveltour-style-small" style="background-image: url(<?= $backGround; ?>);">
        <div class="traveltour-header-transparent-substitute"></div>
        <div class="traveltour-blog-title-top-overlay"></div>
        <div class="traveltour-blog-title-overlay"></div>
        <div class="traveltour-blog-title-bottom-overlay"></div>
        <div class="traveltour-blog-title-container traveltour-container">
            <div class="traveltour-blog-title-content traveltour-item-pdlr">
                <header class="traveltour-single-article-head clearfix">
                    <div class="traveltour-single-article-date-wrapper">
                        <?php
                        $date = date_create($obj->post_date);
                        $dateDay = date_format($date, 'd');
                        $dateMonth = date_format($date, 'M');
                        ?>
                        <span class="traveltour-single-article-date-day"><?= $dateDay; ?></span>
                        <span class="traveltour-single-article-date-month"><?= $dateMonth; ?></span>
                    </div>
                    <div class="traveltour-single-article-head-right">
                        <div class="traveltour-blog-info-wrapper">
                            <div class="traveltour-blog-info traveltour-blog-info-font traveltour-blog-info-category">
                                                <span class="traveltour-head">
<!--                                                    <i class="icon_folder-alt"></i>-->
                                                    <i class="fa-light fa-folder"></i>
                                                </span>
                                <?php
                                $category = get_the_category($obj->ID);
                                $count = 1;
                                foreach ($category as $item){
                                    if ($count == 1) {
                                        ?>
                                        <a href="#" rel="tag"><?= $item->name; ?></a>
                                        <?php
                                        $count = 2;
                                    }else{
                                        ?>
                                        <span class="gdlr-core-sep">,</span>
                                        <a href="#" rel="tag"><?= $item->name; ?></a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="traveltour-blog-info traveltour-blog-info-font traveltour-blog-info-tag">
                                                <span class="traveltour-head">
<!--                                                    <i class="icon_tags_alt"></i>-->
                                                    <i class="fa-light fa-tag"></i>
                                                </span>
                                <?php
                                $tags = get_the_tags($obj->ID);

                                $count = 1;
                                foreach ($tags as $item){
                                    if ($count == 1) {
                                        $count = 2;
                                        ?>
                                        <a href="#" rel="tag"><?= $item->name; ?></a>
                                        <?php
                                    }else{
                                        ?>
                                        <span class="gdlr-core-sep">,</span>
                                        <a href="#" rel="tag"><?= $item->name; ?></a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <h1 class="traveltour-single-article-title"><?= $obj->post_title; ?></h1>
                    </div>
                </header>
            </div>
        </div>
    </div>
    <div class="traveltour-content-container traveltour-container">
        <div class=" traveltour-sidebar-wrap clearfix traveltour-line-height-0 traveltour-sidebar-style-right">
            <div class=" traveltour-sidebar-center traveltour-column-40 traveltour-line-height">
                <div class="traveltour-content-wrap traveltour-item-pdlr clearfix">
                    <div class="traveltour-content-area">
                        <article id="post-1714" class="post-1714 post type-post status-publish format-standard has-post-thumbnail hentry category-blog category-uncategorized tag-nature tag-news">
                            <div class="traveltour-single-article">
                                <?= $obj->post_content; ?>
                            </div>
                            <!-- traveltour-single-article -->
                        </article>
                        <!-- post-id -->
                    </div>
                    <div class="traveltour-page-builder-wrap traveltour-item-rvpdlr"></div>
                    <div class="traveltour-single-social-share traveltour-item-rvpdlr">
                        <div class="gdlr-core-social-share-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-social-share-left-text gdlr-core-item-mglr gdlr-core-style-plain" style="padding-bottom: 0px ;">
<!--                                            <span class="gdlr-core-social-share-count gdlr-core-skin-title">-->
<!--                                                <span class="gdlr-core-count">0</span>-->
<!--                                                <span class="gdlr-core-suffix">Shares</span>-->
<!--                                                <span class="gdlr-core-divider gdlr-core-skin-divider"></span>-->
<!--                                            </span>-->
                            <span class="gdlr-core-social-share-wrap">
                                                <a class="gdlr-core-social-share-facebook" href="https://www.facebook.com/sharer/sharer.php?caption=Pack+wisely+before+traveling&#038;u=<?= $obj->guid; ?>" target="_blank" onclick="javascript:window.open(this.href,&#039;&#039;, &#039;menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=602,width=555&#039;);return false;">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                                <a class="gdlr-core-social-share-pinterest" href="https://pinterest.com/pin/create/button/?url=<?= $obj->guid; ?>&#038;media=<?= get_the_post_thumbnail_url($obj->ID); ?>" target="_blank" onclick="javascript:window.open(this.href,&#039;&#039;, &#039;menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=553,width=750&#039;);return false;">
                                                    <i class="fa fa-pinterest-p"></i>
                                                </a>
                                                <a class="gdlr-core-social-share-twitter" href="https://twitter.com/intent/tweet?text=Pack+wisely+before+traveling&#038;url=<?= $obj->guid; ?>" target="_blank" onclick="javascript:window.open(this.href,&#039;&#039;, &#039;menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=255,width=555&#039;);return false;">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </span>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="traveltour-single-author">
                        <div class="traveltour-single-author-wrap">
                            <div class="traveltour-single-author-avartar traveltour-media-image">
                                <img alt='' src='https://secure.gravatar.com/avatar/e93616c6d8116aa5375e95e0458ce064?s=90&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/e93616c6d8116aa5375e95e0458ce064?s=180&#038;d=mm&#038;r=g 2x' class='avatar avatar-90 photo' height='90' width='90' loading='lazy' decoding='async'/>
                            </div>
                            <div class="traveltour-single-author-content-wrap">
                                <div class="traveltour-single-author-caption traveltour-info-font">About the author</div>
                                <h4 class="traveltour-single-author-title">
                                    <a href="https://demo.goodlayers.com/traveltour/main4/author/superuser/" title="Posts by John Smith" rel="author"><?= get_the_author_meta('user_nicename',$obj->post_author); ?></a>
                                </h4>
                                <div class="traveltour-single-author-description">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantic.</div>
                            </div>
                        </div>
                    </div>
<!--                    <div class="traveltour-single-nav-area clearfix">-->
<!--                                        <span class="traveltour-single-nav traveltour-single-nav-left">-->
<!--                                            <a href="https://demo.goodlayers.com/traveltour/main4/2016/06/06/standard-post-type/" rel="prev">-->
<!--                                                <i class="arrow_left"></i>-->
<!--                                                <span class="traveltour-text">Prev</span>-->
<!--                                            </a>-->
<!--                                        </span>-->
<!--                        <span class="traveltour-single-nav traveltour-single-nav-right">-->
<!--                                            <a href="https://demo.goodlayers.com/traveltour/main4/2016/06/06/the-surfing-man-will-blow-your-mind/" rel="next">-->
<!--                                                <span class="traveltour-text">Next</span>-->
<!--                                                <i class="arrow_right"></i>-->
<!--                                            </a>-->
<!--                                        </span>-->
<!--                    </div>-->
<!--                    <div id="comments" class="traveltour-comments-area">-->
<!--                        <div id="respond" class="comment-respond">-->
<!--                            <h4 id="reply-title" class="comment-reply-title traveltour-content-font">-->
<!--                                Leave a Reply-->
<!--                                <small>-->
<!--                                    <a rel="nofollow" id="cancel-comment-reply-link" href="/traveltour/main4/2016/06/06/pack-wisely-before-traveling/#respond" style="display:none;">Cancel Reply</a>-->
<!--                                </small>-->
<!--                            </h4>-->
<!--                            <form action="https://demo.goodlayers.com/traveltour/main4/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate>-->
<!--                                <div class="comment-form-comment">-->
<!--                                    <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Comment*"></textarea>-->
<!--                                </div>-->
<!--                                <div class="traveltour-comment-form-author">-->
<!--                                    <input id="author" name="author" type="text" value="" placeholder="Name*" size="30" aria-required='true'/>-->
<!--                                </div>-->
<!--                                <div class="traveltour-comment-form-email">-->
<!--                                    <input id="email" name="email" type="text" value="" placeholder="Email*" size="30" aria-required='true'/>-->
<!--                                </div>-->
<!--                                <input id="url" name="url" type="text" value="" placeholder="Website" size="30"/>-->
<!--                                <div class="clear"></div>-->
<!--                                <p class="comment-form-cookies-consent">-->
<!--                                    <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"/>-->
<!--                                    <label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label>-->
<!--                                </p>-->
<!--                                <p class="form-submit">-->
<!--                                    <input name="submit" type="submit" id="submit" class="submit" value="Post Comment"/>-->
<!--                                    <input type='hidden' name='comment_post_ID' value='1714' id='comment_post_ID'/>-->
<!--                                    <input type='hidden' name='comment_parent' id='comment_parent' value='0'/>-->
<!--                                </p>-->
<!--                                <!-- Anti-spam plugin wordpress.org/plugins/anti-spam/ -->
<!--                                <div class="wantispam-required-fields">-->
<!--                                    <input type="hidden" name="wantispam_t" class="wantispam-control wantispam-control-t" value="1684291943"/>-->
<!--                                    <div class="wantispam-group wantispam-group-q" style="clear: both;">-->
<!--                                        <label>-->
<!--                                            Current <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="68110d281a">[email &#160;protected]</a>-->
<!--                                            <span class="required">*</span>-->
<!--                                        </label>-->
<!--                                        <input type="hidden" name="wantispam_a" class="wantispam-control wantispam-control-a" value="2023"/>-->
<!--                                        <input type="text" name="wantispam_q" class="wantispam-control wantispam-control-q" value="7.3.5" autocomplete="off"/>-->
<!--                                    </div>-->
<!--                                    <div class="wantispam-group wantispam-group-e" style="display: none;">-->
<!--                                        <label>Leave this field empty</label>-->
<!--                                        <input type="text" name="wantispam_e_email_url_website" class="wantispam-control wantispam-control-e" value="" autocomplete="off"/>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <!--\End Anti-spam plugin -->
<!--                            </form>-->
<!--                        </div>-->
<!--                        <!-- #respond -->
<!--                    </div>-->
                    <!-- traveltour-comments-area -->
                </div>
            </div>
            <div class=" traveltour-sidebar-right traveltour-column-20 traveltour-line-height traveltour-line-height">
                <div class="traveltour-sidebar-area traveltour-item-pdlr">
                    <div id="text-9" class="widget widget_text traveltour-widget">
                        <h3 class="traveltour-widget-title">
                            <span class="traveltour-widget-head-text">Text Widget</span>
                        </h3>
                        <span class="clear"></span>
                        <?php
                        $shortContent = get_field('short_content', $obj->ID);
                        ?>
                        <div class="textwidget"><?= $shortContent; ?></div>
                    </div>
<!--                    <div id="recent-comments-6" class="widget widget_recent_comments traveltour-widget">-->
<!--                        <h3 class="traveltour-widget-title">-->
<!--                            <span class="traveltour-widget-head-text">Recent Comments</span>-->
<!--                        </h3>-->
<!--                        <span class="clear"></span>-->
<!--                        <ul id="recentcomments">-->
<!--                            <li class="recentcomments">-->
<!--                                                <span class="comment-author-link">-->
<!--                                                    <a href="https://wordpress.org/" class="url" rel="ugc external nofollow">A WordPress Commenter</a>-->
<!--                                                </span>-->
<!--                                on <a href="https://demo.goodlayers.com/traveltour/main4/2019/03/22/hello-world/#comment-1">Hello world!</a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
                    <div id="tag_cloud-4" class="widget widget_tag_cloud traveltour-widget">
                        <h3 class="traveltour-widget-title">
                            <span class="traveltour-widget-head-text">Tag Cloud</span>
                        </h3>
                        <span class="clear"></span>
                        <div class="tagcloud">
                            <?php
                            $cate = get_terms('category');
                            foreach ($cate as $item){
                                ?>
                                <a href="<?= get_category_link($item->term_id); ?>" class="tag-cloud-link tag-link-6 tag-link-position-1" style="font-size: 8pt;"><?= $item->name; ?></a>
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

<?php
get_footer();
?>
