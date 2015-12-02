<?php
/* HOOK_alter functions */
function gitp_page_alter(&$page) {
    if (arg(0) == 'node' && is_numeric(arg(1))) {
        $nid = arg(1);
        $node = node_load($nid);

        switch($node->type) {
            case 'resources':
                $page['content_bottom'][] = field_view_field('node', $node, 'field_resources', 'full');
                unset($page['content']['system_main']['nodes'][$nid]['field_resources']);
                break;
            case 'news':

                break;
            default;
        }
    }

    if($page['content']['system_main']['term_heading']['term']['#entity_type'] == 'taxonomy_term') {
        $page['content_bottom']['system_main']['nodes'] = $page['content']['system_main']['nodes'];
        $page['content_bottom']['system_main']['pager'] = $page['content']['system_main']['pager'];
        unset($page['content']['system_main']['nodes']);
        unset($page['content']['system_main']['pager']);
    }
}

function gitp_css_alter(&$css) {
    $exclude = array(
        'modules/aggregator/aggregator.css' => FALSE,
        'modules/block/block.css' => FALSE,
        'modules/book/book.css' => FALSE,
        'modules/comment/comment.css' => FALSE,
        'modules/dblog/dblog.css' => FALSE,
        'modules/file/file.css' => FALSE,
        'modules/filter/filter.css' => FALSE,
        'modules/forum/forum.css' => FALSE,
        'modules/help/help.css' => FALSE,
        'modules/menu/menu.css' => FALSE,
        'modules/node/node.css' => FALSE,
        'modules/openid/openid.css' => FALSE,
        'modules/poll/poll.css' => FALSE,
        'modules/profile/profile.css' => FALSE,
        'modules/statistics/statistics.css' => FALSE,
        'modules/syslog/syslog.css' => FALSE,
        'modules/system/maintenance.css' => FALSE,
        'modules/system/system.css' => FALSE,
        //'modules/system/system.base.css' => FALSE,
        'modules/system/system.maintenance.css' => FALSE,
        'modules/system/system.menus.css' => FALSE,
        //'modules/system/system.messages.css' => FALSE,
        'modules/system/system.theme.css' => FALSE,
        'modules/taxonomy/taxonomy.css' => FALSE,
        'modules/tracker/tracker.css' => FALSE,
        'modules/update/update.css' => FALSE,
        'modules/user/user.css' => FALSE,
    );
    $css = array_diff_key($css, $exclude);
}

function gitp_form_search_block_form_alter(&$form, &$form_state) {

    $form['search_block_form']['#theme_wrappers'] = array('gitp_search_form_wrapper');

    // Prevent user from searching the default text
    $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='Search'){ alert('Please enter a search'); return false; }";

    // Alternative (HTML5) placeholder attribute instead of using the javascript
    $form['actions']['submit']['#attributes']['class'][] = 'hidden';
    $form['search_block_form']['#attributes']['placeholder'] = t('Search');
}
?>