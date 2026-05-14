<?php
if (!function_exists('e')) {
    function e($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('u')) {
    function u($value) {
        return filter_var($value, FILTER_SANITIZE_URL);
    }
}


function clean_input($value) {
    return trim(html_entity_decode($value, ENT_QUOTES, 'UTF-8'));
}