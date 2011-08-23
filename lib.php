<?php

/**
 * Makes our changes to the CSS
 *
 * @param string $css
 * @param theme_config $theme
 * @return string
 */
function mooch_process_css($css, $theme) {

    // Set the link color
    if (!empty($theme->settings->linkcolor)) {
        $linkcolor = $theme->settings->linkcolor;
    } else {
        $linkcolor = null;
    }
    $css = mooch_set_linkcolor($css, $linkcolor);

    // Set the region width
    if (!empty($theme->settings->regionwidth)) {
        $regionwidth = $theme->settings->regionwidth;
    } else {
        $regionwidth = null;
    }
    $css = mooch_set_regionwidth($css, $regionwidth);

    // Set the custom CSS
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = mooch_set_customcss($css, $customcss);

    // Hide login panel
    $css = mooch_set_hideloginpanel($css, !empty($theme->settings->hideloginpanel));

    // Return the CSS
    return $css;
}

/**
 * Sets the background colour variable in CSS
 *
 * @param string $css
 * @param mixed $backgroundcolor
 * @return string
 */
function mooch_set_linkcolor($css, $linkcolor) {
    $tag = '[[setting:linkcolor]]';
    $replacement = $linkcolor;
    if (is_null($replacement)) {
        $replacement = '#f25f0f';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

/**
 * Sets the region width variable in CSS
 *
 * @param string $css
 * @param mixed $regionwidth
 * @return string
 */
 
function mooch_set_regionwidth($css, $regionwidth) {
    $tag = '[[setting:regionwidth]]';
    $replacement = $regionwidth;
    if (is_null($replacement)) {
        $replacement = 250;
    }
    $css = str_replace($tag, $replacement.'px', $css);
    return $css;
}

/**
 * Sets the custom css variable in CSS
 *
 * @param string $css
 * @param mixed $customcss
 * @return string
 */
function mooch_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

function mooch_set_hideloginpanel($css, $hide) {
    $tagbegin = '[[setting:hideloginpanelbegin]]';
    $tagend = '[[setting:hideloginpanelbegin]]';
    if ($hide) {
        $replacementbegin = '';
        $replacementend = '';
    } else {
        $replacementbegin = '/*';
        $replacementend = '*/';
    }
    $css = str_replace($tagbegin, $replacementbegin, $css);
    $css = str_replace($tagend, $replacementend, $css);
    return $css;
}