<?php 
/* Add the ability to sort blog posts by title, for staff */
add_filter('avia_blog_post_query', 'avia_modify_post_grid_query_desc');
function avia_modify_post_grid_query_desc( $query ) {
	$query['orderby'] = 'title';
	$query['order'] = 'DESC';

  return $query;
}

if(!function_exists('avia_custom_query_extension'))
{
    function avia_custom_query_extension($query, $params)
    {
        global $avia_config;
        if(!empty($avia_config['avia_custom_query_options']['order']))
        {
            $query['order'] = $avia_config['avia_custom_query_options']['order'];
        }

        if(!empty($avia_config['avia_custom_query_options']['orderby']))
        {
            $query['orderby'] = $avia_config['avia_custom_query_options']['orderby'];
        }

        unset($avia_config['avia_custom_query_options']);

        return $query;
    }

    add_filter('avia_masonry_entries_query', 'avia_custom_query_extension', 10, 2);
    add_filter('avia_post_grid_query', 'avia_custom_query_extension', 10, 2);
    add_filter('avia_post_slide_query', 'avia_custom_query_extension', 10, 2);
    add_filter('avia_blog_post_query', 'avia_custom_query_extension', 10, 2);
    add_filter('avf_magazine_entries_query', 'avia_custom_query_extension', 10, 2);

    add_filter('avf_template_builder_shortcode_elements','avia_custom_query_options', 10, 1);
    function avia_custom_query_options($elements)
    {
        $allowed_elements = array('av_blog','av_masonry_entries','av_postslider','av_portfolio','av_magazine');

        if(isset($_POST['params']['allowed']) && in_array($_POST['params']['allowed'], $allowed_elements))
        {
            $elements[] = array(
                "name" => __("Custom Query Orderby",'avia_framework' ),
                "desc" => __("Set a custom query orderby value",'avia_framework' ),
                "id"   => "orderby",
                "type" 	=> "select",
                "std" 	=> "",
                "subtype" => array(
                    __('Default Order',  'avia_framework' ) =>'',
                    __('Title',  'avia_framework' ) =>'title',
                    __('Random',  'avia_framework' ) =>'rand',
                    __('Date',  'avia_framework' ) =>'date',
                    __('Author',  'avia_framework' ) =>'author',
                    __('Name (Post Slug)',  'avia_framework' ) =>'name',
                    __('Modified',  'avia_framework' ) =>'modified',
                    __('Comment Count',  'avia_framework' ) =>'comment_count',
                    __('Page Order',  'avia_framework' ) =>'menu_order')
            );

            $elements[] = array(
                "name" => __("Custom Query Order",'avia_framework' ),
                "desc" => __("Set a custom query order",'avia_framework' ),
                "id"   => "order",
                "type" 	=> "select",
                "std" 	=> "",
                "subtype" => array(
                    __('Default Order',  'avia_framework' ) =>'',
                    __('Ascending Order',  'avia_framework' ) =>'ASC',
                    __('Descending Order',  'avia_framework' ) =>'DESC'));
        }

        return $elements;
    }

    add_filter('avf_template_builder_shortcode_meta', 'avia_custom_query_add_query_params_to_config', 10, 4);
    function avia_custom_query_add_query_params_to_config($meta, $atts, $content, $shortcodename)
    {
        global $avia_config;
        if(empty($avia_config['avia_custom_query_options'])) $avia_config['avia_custom_query_options'] = array();

        if(!empty($atts['order']))
        {
            $avia_config['avia_custom_query_options']['order'] = $atts['order'];
        }

        if(!empty($atts['orderby']))
        {
            $avia_config['avia_custom_query_options']['orderby'] = $atts['orderby'];
        }

        return $meta;
    }
}