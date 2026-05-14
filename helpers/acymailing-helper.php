<?php
/**
 * Load WordPress + AcyMailing safely (only once)
 */
function acy_load_wp() {

    if (!function_exists('acym_get')) {

        $wpPath = dirname(__DIR__, 2) . '/wp-load.php';

        if (!file_exists($wpPath)) {
            die('wp-load.php not found at: ' . $wpPath);
        }

        require_once $wpPath;
    }
}

/**
 * Subscribe & update AcyMailing user
 */
function subscribe_to_acymailing($email, $name = '', $listIds = [],  $customFields = []) {

    acy_load_wp();

    if (empty($email)) return false;

    $email = sanitize_email($email);
    $userClass = acym_get('class.user');

    // Check existing user
    $existingUser = $userClass->getOneByEmail($email);

    if (!empty($existingUser->id)) {
        $myUser = new stdClass();
        $myUser->id    = $existingUser->id;
        $myUser->email = $email;
        $myUser->name  = sanitize_text_field($name);
        $myUser->confirmed = 1;

        $userId = $userClass->save($myUser, $customFields);

    } else {
        $myUser = new stdClass();
        $myUser->email = $email;
        $myUser->name  = sanitize_text_field($name);
        $myUser->confirmed = 1;

        $userId = $userClass->save($myUser, $customFields);
    }

    if (!$userId) return false;

    // Subscribe without unsubscribing from other lists
    if (!empty($listIds)) {
        $userClass->subscribe($userId, $listIds, false);
    }

    return $userId;
}