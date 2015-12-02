<?php
function gitp_field__field_tags($variables) {
    $output = '';
    $items = $variables['items'];
    $items_string = '';

    foreach($items as $index=>$item) {

        $items_string .= $item['#markup'];
        $items_string .= ', ';
    }
    $items_string = rtrim($items_string,", ");

    // Render the label, if it's not hidden.
    if (!$variables['label_hidden']) {
        $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
    }

    // Render the items.
    $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
    $output .= '<div>';
    if($variables['display_field_icon']) {
        $output .= '<span class="indent">';
        $output .= '<span class="glyphicon glyphicon-tags"></span>';
    }

    $output .='<span class="text">'.$items_string.'</span>'. '</span></div>';

    $output .= '</div>';

    // Render the top-level DIV.
    $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

    return $output;
}

function gitp_field__field_action_area($variables) {
    $output = '';
    $items = $variables['items'];
    $items_string = '';

    foreach($items as $index=>$item) {

        $items_string .= $item['#markup'];
        $items_string .= ', ';
    }
    $items_string = rtrim($items_string,", ");

    // Render the label, if it's not hidden.
    if (!$variables['label_hidden']) {
        $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
    }

    // Render the items.
    $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
    if (isset($items['#markup'])) {
        $item_string = implode(', ',$items['#markup']);
    }

    $output .= '<div>';
    if($variables['display_field_icon']) {
        $output .= '<span class="indent">';
        $output .= '<span class="glyphicon glyphicon-refresh"></span>';
    }
    $output .='<span class="text">'.$items_string.'</span>'. '</span></div>';

    $output .= '</div>';

    // Render the top-level DIV.
    $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

    return $output;
}

function gitp_field__field_country($variables) {
    $output = '';
    $items = $variables['items'];
    $items_string = '';

    foreach($items as $index=>$item) {

        $items_string .= $item['#markup'];
        $items_string .= ', ';
    }
    $items_string = rtrim($items_string,", ");

    // Render the label, if it's not hidden.
    if (!$variables['label_hidden']) {
        $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
    }

    // Render the items.
    $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
    if (isset($items['#markup'])) {
        $item_string = implode(', ',$items['#markup']);
    }

    $output .= '<div>';
    if($variables['display_field_icon']) {
        $output .= '<span class="indent">';
        $output .= '<span class="glyphicon glyphicon-globe"></span>';
    }
    $output .= '<span class="text">'.$items_string.'</span>'. '</span></div>';

    $output .= '</div>';

    // Render the top-level DIV.
    $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

    return $output;
}

function gitp_field__field_partner_organisation($variables) {
    $output = '';
    $items = $variables['items'];
    $items_string = '';

    foreach($items as $index=>$item) {

        $items_string .= $item['#markup'];
        $items_string .= ', ';
    }
    $items_string = rtrim($items_string,", ");

    // Render the label, if it's not hidden.
    if (!$variables['label_hidden']) {
        $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
    }

    // Render the items.
    $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
    if (isset($items['#markup'])) {
        $item_string = implode(', ',$items['#markup']);
    }



    $output .= '<div>';
    if($variables['display_field_icon']) {
        $output .= '<span class="indent">';
        $output .= '<span class="glyphicon glyphicon-user"></span>';
    }
    $output .= '<span class="text">'.$items_string.'</span>'. '</span></div>';

    $output .= '</div>';

    // Render the top-level DIV.
    $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

    return $output;
}

?>