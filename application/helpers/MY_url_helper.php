<?php

// +----------------------------------------------------------
// | TV Shop
// +----------------------------------------------------------
// | 2ITF - 201x-201x
// +----------------------------------------------------------
// | MY url helper
// |
// +----------------------------------------------------------
// | Thomas More
// +----------------------------------------------------------

function divAnchor($uri = '', $title = '', $attributes = '') {
    return "<div>" . anchor($uri, $title, $attributes) . "</div>\n";
}

function smallDivAnchor($uri = '', $title = '', $attributes = '') {
    return "<div style='margin-top: 4px'>" .
            anchor($uri, $title, $attributes) . "</div>\n";
}

function anchor_simple($uri = '', $attributes = '') {

    $site_url = is_array($uri) ? site_url($uri) : (preg_match('#^(\w+:)?//#i', $uri) ? $uri : site_url($uri));

    if ($attributes !== '') {
        $attributes = _stringify_attributes($attributes);
    }

    return '"' . $site_url . '"' . $attributes;
}

?>
