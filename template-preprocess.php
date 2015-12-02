<?php

/**
 * HOOK_preprocess functions for system theme elements
 **/

function gitp_preprocess_html(&$variables) {
    $path = drupal_get_path('theme','gitp');
    /** Add global javascript files that are required on all pages */
    drupal_add_js('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js',
        array(
            'type' => 'external',
            'scope' => 'header',
            'group' => JS_LIBRARY,
            'every_page' => TRUE,
        )
    );
    drupal_add_js('https://oss.maxcdn.com/respond/1.4.2/respond.min.js',
        array(
            'type' => 'external',
            'scope' => 'header',
            'group' => JS_LIBRARY,
            'every_page' => TRUE,
        )
    );
    drupal_add_js('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
        array(
            'type' => 'external',
            'scope' => 'header',
            'group' => JS_LIBRARY,
            'every_page' => TRUE,
        )
    );
    drupal_add_js($path.'/assets/js/main.js', // Only for javascript that needs to be loaded on every page, and has no dependency on plugins/libraries that may not be loaded on every page
        array(
            'type' => 'file',
            'scope' => 'header',
            'group' => JS_THEME,
            'every_page' => TRUE,
            'requires_jquery' => TRUE
        )
    );
}

/** hook_preprocess_page(&$variables) */
function gitp_preprocess_page(&$variables) {
    $path = drupal_get_path('theme','gitp');
    if($variables['theme_hook_suggestions'][0] == 'page__taxonomy') {
        drupal_add_js('/'.$path.'/assets/js/init-bs-popover.js','file');
    }
}

/**
/** HOOK_preprocess functions for specific node types
 */
function gitp_preprocess_node(&$variables, $hook) {
    // If node preprocess function exists, pass variables
    $function = __FUNCTION__ . '__' . $variables['node']->type;
    if (function_exists($function)) {
        $function($variables, $hook);
    }

    // Provide an aliased path to the node that can be rendered as a 'Read More' button
    $node_path = 'node/'.$variables['nid'];
    $url = (function_exists('drupal_get_path_alias')) ? drupal_get_path_alias($node_path) : $node_path;
    $variables['read_more'] = array(
        '#theme' => 'read_more',
        '#path' => $url,
        '#label' => t('Read More'),
        '#classes' => 'btn btn-default'
    );
}

/** HOOK_preprocess functions for specific node types */

function gitp_preprocess_node__event(&$variables) {

    $node = $variables['node'];

    $timestamp = strtotime($node->field_event_date['und'][0]['value']);
    $event_date = array(
        'day' => date('j',$timestamp),
        'month' => date('M',$timestamp),
        'year' => date('Y',$timestamp)
    );

    $variables['content']['date_box'] = array(
        '#theme' => 'date_box',
        '#date' => $event_date,
        '#classes' => array('event_date_border')
    );

    $variables['content']['field_contact_details']['#title'] = t('For further information');
}

function gitp_preprocess_node__blog(&$variables) {
    $author_uid = $variables['uid'];
    $author = profile2_load_by_user($author_uid);
    $variables['author_thumbnail_profile'] = entity_view('profile2',$author,'thumbnail_profile');
    $variables['author_profile'] = entity_view('profile2',$author,'author_profile');
}

function gitp_preprocess_breadcrumb(&$variables) {
    if($current = menu_get_item()) {
        $title = !empty($current['title']) ? $current['title'] : $current['page_arguments'][0]->name;
        $variables['breadcrumb'][] = $title;
    }
}

function gitp_preprocess_field(&$variables) {
    $theme_hook_suggestions = $variables['theme_hook_suggestions'];
    if(in_array('field__field_resources',$theme_hook_suggestions) && in_array('field__field_collection',$theme_hook_suggestions)) {
        $fn = 'gitp_preprocess_field__field_resources';
        if (function_exists($fn)) {
            $fn($variables);
        }

    }
    $target_bundles = array('resources','blog','news','event');
    if (in_array($variables['element']['#bundle'],$target_bundles)) {
        $variables['display_field_icon'] = true;
    }
}

/**
 * hook_preprocess_field__field_resources()
 * Prepare resource data from field collection to create file/language table for resources
 * @todo add a method to count how many languages are available in language field (currently 4) and pass to template
 */
function gitp_preprocess_field__field_resources(&$variables) {
    $items = $variables['items'];
    $resources = array();

    $fields = field_info_fields();
    $languages = list_allowed_values($fields['field_fc_resource_language']);
    $lang_count = count($languages);
    $processed = array();

    foreach($languages as $language=>$lang_value) {
        foreach($items as $key=>$item) {
            foreach($item['entity']['field_collection_item'] as $delta=>$fc_item) {
                $delta_lang = $fc_item['field_fc_resource_language'][0]['#markup'];
                $title = $fc_item['field_fc_resource_file_title'][0]['#markup'];


                if ($lang_value == $delta_lang) {
                    if (isset($fc_item['field_fc_resource_upload_file'])) {
                        $url = file_create_url($fc_item['field_fc_resource_upload_file']['#items'][0]['uri']);
                    }
                    if (isset($fc_item['field_fc_resource_link'])) {
                        $url = $fc_item['field_fc_resource_link']['#items'][0]['display_url'];
                    }
                    if (!array_key_exists($title, $resources)) {
                        $resources[$title] = array();
                    }
                    if (!array_key_exists($lang_value, $resources[$title])) {
                        $resources[$title][$lang_value] = array();
                    }
                    $resources[$title][$lang_value] = $url;
                } else {
                    if (!isset($resources[$title][$lang_value])) {
                        $resources[$title][$lang_value] = NULL;
                    }
                }
            }
        }
        $processed[$lang_value] = TRUE;
    }

    $variables['element']['resources_table_data'] = $resources;
    $variables['element']['available_language_count'] = $lang_count;
}

function gitp_preprocess_image(&$variables) {
    // Unset these since rendering width/height attributes on HTML img tag wrecks havoc on fluid widths
    if (isset($variables['width'])) {
        unset($variables['width']);
    }
    if (isset($variables['height'])) {
        unset($variables['height']);
    }
}

function gitp_preprocess_button(&$variables) {
    $button_type = $variables['element']['#value'];
    switch($button_type) {
        case 'Apply Filter':
            $variables['theme_hook_suggestions'][] = 'button__submit';
            break;
        case 'Reset':
            $variables['theme_hook_suggestions'][] = 'button__reset';
            break;
    }

}

function gitp_preprocess_user_profile(&$variables) {
    $og_memberships = $variables['elements']['og_user_node']['#items'];
    $og_nodes = array();
    foreach($og_memberships as $delta=>$group_id) {
        $og_nodes[$delta] = node_load($group_id['target_id']);
    }
    foreach($og_nodes as $delta=>$data) {
        if ($data->title == 'Steering Group Portal') {
            $variables['rscg_member'] = true;
        }
    }

    $user_profile = $variables['user_profile']['profile_main']['view']['profile2'];
    foreach($user_profile as $delta=>$data) {
        $variables['content'] = $data;
    }
    $variables['content']['field_member_fullname']['#prefix'] = '<h1>';
    $variables['content']['field_member_fullname']['#suffix'] = '</h1>';
}
?>