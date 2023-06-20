<?php
//
//if(!function_exists('custom_pagination')){
//    function custom_pagination(WP_Query $wp_query = null, $echo = true){
//        if($wp_query === null){
//            global $wp_query;
//        }
//
//        $pages = paginate_links(
//            array(
//                'base'=>str_replace(9999999999, '%#%', esc_url(get_page_link(9999999999))),
//                'format'=>'?paged=%#%',
//                'current'=>max(1, get_query_var('paged')),
//                'type'=>'array',
//                'total'=>$wp_query->max_num_pages,
//                'show_all'=>false,
//                'end_size'=>2,
//                'mid_size'=>1,
//                'prev_next'=>true,
//                'prev_text' => __('<i class="fa fa-angle-left"></i>'),
//                'next_text' => __('<i class="fa fa-angle-right"></i>'),
//                'add_args'=>false,
//                'add_fragment'=>'',
//            )
//        );
//
//        if (is_array($pages)){
//            $pagination = '<div class="gdlr-core-pagination  gdlr-core-style-circle gdlr-core-center-align tourmaster-item-pdlr">';
//            foreach ($pages as $page){
//                echo $page;
//            }
//            $pagination .= '</div>';
//
//            echo $pagination;
//        }
//
//        return null;
//    }
//}