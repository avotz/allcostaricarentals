<?php

function allcostaricarentals_meta_box($meta_boxes)
{
    $prefix = 'rw_';

    $meta_boxes[] = array(
        'id' => 'additional',
        'title' => esc_html__('Additional Information', 'allcostaricarentals'),
        'post_types' => array('product'),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => false,
        'fields' => array(
        
            array(
                'id' => $prefix . 'details',
                'name' => esc_html__('Details', 'allcostaricarentals'),
                'type' => 'wysiwyg',
                'options' => array(
                    'textarea_rows' => 10,
                ),
            ),
           
        ),
    );
   

    return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'allcostaricarentals_meta_box');