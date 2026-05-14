<?php
/**
 * Load HTML email template safely
 */
function load_email_template($template, $data = []) {

    // BASE PATH: project root (same level as submit-cphi.php)
    $base_path = dirname(__DIR__);  

    $template_path = $base_path . '/email-templates/' . $template . '.php';

    // DEBUG (temporary – remove later)
    if (!file_exists($template_path)) {
        error_log('EMAIL TEMPLATE NOT FOUND: ' . $template_path);
        return '';
    }

    extract($data, EXTR_SKIP);

    ob_start();
    include $template_path;
    return trim(ob_get_clean());
}
