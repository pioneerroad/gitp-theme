<?php
function gitp_breadcrumb($variables) {
    $breadcrumb = $variables['breadcrumb'];
    $items = '';

    if (!empty($breadcrumb)) {
        // Provide a navigational heading to give context for breadcrumb links to
        // screen-reader users. Make the heading invisible with .element-invisible.

        $label = '<h2 aria-hidden="true" aria-label="breadcrumb navigation" role="navigation" class="hidden">' . t('You are here') . '</h2>';

        foreach($breadcrumb as $key=>$item) {
            $items .= '<li>'.$item.'</li>';
        }

        $list = '<ol class="breadcrumb">'.$items.'</ol>';
        $wrapper = '<div class="container">'.$label.$list.'</div>';

        return $wrapper;
    }
}

function gitp_select($variables) {
    $element = $variables['element'];
    element_set_attributes($element, array('id', 'name', 'size'));
    _form_set_class($element, array('form-select'));

    return '<select' . drupal_attributes($element['#attributes']) . ' class="form-control">' . form_select_options($element) . '</select>';
}

function gitp_button__submit($variables) {
    $element = $variables['element'];
    $element['#attributes']['type'] = 'submit';
    element_set_attributes($element, array('id', 'name', 'value'));

    $element['#attributes']['class'][] = 'form-' . $element['#button_type'];
    $element['#attributes']['class'][] = 'btn btn-success';
    if (!empty($element['#attributes']['disabled'])) {
        $element['#attributes']['class'][] = 'form-button-disabled';
    }

    return '<input' . drupal_attributes($element['#attributes']) . ' />';
}

function gitp_button__reset($variables) {
    $element = $variables['element'];
    $element['#attributes']['type'] = 'submit';
    element_set_attributes($element, array('id', 'name', 'value'));

    $element['#attributes']['class'][] = 'form-' . $element['#button_type'];
    $element['#attributes']['class'][] = 'btn btn-warning';
    if (!empty($element['#attributes']['disabled'])) {
        $element['#attributes']['class'][] = 'form-button-disabled';
    }

    return '<input' . drupal_attributes($element['#attributes']) . ' />';
}

function gitp_menu_local_task($variables) {
    $link = $variables['element']['#link'];
    $link_text = $link['title'];

    if (!empty($variables['element']['#active'])) {
        // Add text to indicate active tab for non-visual users.
        $active = '<span class="hidden" aria-label="active tab">' . t('(active tab)') . '</span>';

        // If the link does not contain HTML already, check_plain() it now.
        // After we set 'html'=TRUE the link will not be sanitized by l().
        if (empty($link['localized_options']['html'])) {
            $link['title'] = check_plain($link['title']);
        }
        $link['localized_options']['html'] = TRUE;
        $link_text = t('!local-task-title!active', array('!local-task-title' => $link['title'], '!active' => $active));
    }

    return '<li' . (!empty($variables['element']['#active']) ? ' role="presentation" class="active"' : '') . '>' . l($link_text, $link['href'], $link['localized_options']) . "</li>\n";
}

function gitp_menu_local_tasks(&$variables) {
    $output = '';

    if (!empty($variables['primary'])) {
        $variables['primary']['#prefix'] = '<h2 class="hidden" aria-label="Primary Tabs" aria-hidden="true">' . t('Primary tabs') . '</h2>';
        $variables['primary']['#prefix'] .= '<ul class="nav nav-pills">';
        $variables['primary']['#suffix'] = '</ul>';
        $output .= drupal_render($variables['primary']);
    }
    if (!empty($variables['secondary'])) {
        $variables['secondary']['#prefix'] = '<h2 class="hidden" aria-hidden="true" aria-label="Secondary tabs">' . t('Secondary tabs') . '</h2>';
        $variables['secondary']['#prefix'] .= '<ul class="nav-pills">';
        $variables['secondary']['#suffix'] = '</ul>';
        $output .= drupal_render($variables['secondary']);
    }

    return $output;
}

function gitp_field__field_member_fullname__main($variables) {

}

?>