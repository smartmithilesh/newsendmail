<?php
// -------------------------------------------------
// CORS (if form is used cross-domain)
// -------------------------------------------------
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json");

// -------------------------------------------------
// Load configs & helpers
// -------------------------------------------------
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/mail-config.php';
require_once __DIR__ . '/helpers/email-escape.php';
require_once __DIR__ . '/helpers/mail-template-loader.php';
require_once __DIR__ . '/helpers/db-insert.php';
require_once __DIR__ . '/helpers/acymailing-helper.php';

// -------------------------------------------------
// Stop if not POST
// -------------------------------------------------

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'type' => 'error',
        'text' => 'Invalid request.'
    ]);
    exit;
}

// -------------------------------------------------
// Sanitize Inputs (MATCHING FORM FIELDS)
// -------------------------------------------------
$first_name = trim(filter_var($_POST['first_name'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$last_name  = trim(filter_var($_POST['last_name'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$name       = trim(filter_var($_POST['name'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));

$full_name = !empty($name)
    ? $name
    : trim($first_name . ' ' . $last_name);
$email     = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$country   = trim(filter_var($_POST['country'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$phone     = trim(filter_var($_POST['phone'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$jobtitle = trim(filter_var(
    $_POST['jobtitle'] ?? $_POST['designation'] ?? '',
    FILTER_SANITIZE_SPECIAL_CHARS
));

$event_title   = trim(filter_var($_POST['event_title'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$start_date    = trim(filter_var($_POST['start_date'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$end_date      = trim(filter_var($_POST['end_date'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));

$event_location = trim(filter_var($_POST['event_location'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$event_website  = trim(filter_var($_POST['event_website'] ?? '', FILTER_SANITIZE_URL));

$company   = trim(filter_var($_POST['company'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$topic   = trim(filter_var($_POST['topic'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$subject    = trim(filter_var($_POST['industry'], FILTER_SANITIZE_STRING));
$message   = trim(filter_var($_POST['content'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));

$postID    = trim(filter_var($_POST['postID'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$permalink = trim(filter_var($_POST['permalink'] ?? '', FILTER_SANITIZE_URL));
$postTitle = trim(filter_var($_POST['postTitle'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$ClientName = trim(filter_var($_POST['ClientName'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$formname    = trim(filter_var($_POST['formname'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$acymailingID    = trim(filter_var($_POST['acymailingID'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$whitepaper_link = trim(filter_var($_POST['whitepaperlink'] ?? '', FILTER_SANITIZE_URL));

$address1 = trim(filter_var($_POST['address1'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$address2 = trim(filter_var($_POST['address2'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$state = trim(filter_var($_POST['state'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
$zip = trim(filter_var($_POST['zip'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));

$alldetails = $AlltemplatesDetails[$formname];

$first_name = explode(' ', $full_name)[0];

$headers = MAIL_HEADERS;
// -------------------------------------------------
// Validation
// -------------------------------------------------
if ( empty($email)) {
    echo json_encode([
        'type' => 'error',
        'text' => 'Email are required.'
    ]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        'type' => 'error',
        'text' => 'Invalid email address.'
    ]);
    exit;
}

// -------------------------------------------------
// Business Email MX Check
// -------------------------------------------------
//$email_domain = substr(strrchr($email, "@"), 1);
$email_domain = strtolower(substr(strrchr($email, "@"), 1));

if($formname == "CPHI") {
$blocked_domains = [
	'gmail.com','googlemail.com','yahoo.com','yahoo.co.in','yahoo.co.uk',
	'hotmail.com','outlook.com','live.com','msn.com','icloud.com',
	'me.com','aol.com','protonmail.com','rediffmail.com'
];

if (in_array($email_domain, $blocked_domains, true)) {
	die(json_encode([
		'type' => 'error',
		'text' => 'Please use your official business email address.'
	]));
}
}

if (!checkdnsrr($email_domain, 'MX')) {
    echo json_encode([
        'type' => 'error',
        'text' => 'Please enter a valid business email.'
    ]);
    exit;
}

// -------------------------------------------------
// reCAPTCHA Validation (REQUIRED)
// -------------------------------------------------
//if (empty($_POST['g-recaptcha-response'])) {
//    echo json_encode([
//        'type' => 'error',
//        'text' => 'Captcha verification failed.'
//    ]);
//    exit;
//}

$secret = G_RECAPTCHA_SECRET_KEY;
$verify = file_get_contents(
    "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response=".$_POST['g-recaptcha-response']
);

$captcha = json_decode($verify);
if (empty($captcha->success)) {
    echo json_encode([
        'type' => 'error',
        'text' => 'Captcha validation failed.'
    ]);
    exit;
}

// -------------------------------------------------
// ADMIN EMAIL
// -------------------------------------------------
$admin_subject = "New Enquiry on – ".$formname. '-' .COMPANY_NAME;

$admin_message = load_email_template('admin-master-notification', [
    'form_title'     => clean_input($formname),
    'event_title'    => clean_input($event_title),
    'start_date'     => clean_input($start_date),
    'end_date'       => clean_input($end_date),
    'event_location' => clean_input($event_location),
    'event_website'  => clean_input($event_website),

    'user_name'      => clean_input($full_name),
    'user_email'     => clean_input($email),
    'user_company'   => clean_input($company),
    'job_title'      => clean_input($jobtitle),
    'country'        => clean_input($country),
    'user_phone'     => clean_input($phone),
    'message'        => clean_input($message),

    'postID'         => clean_input($postID),
    'permalink'      => clean_input($permalink),
    'postTitle'      => clean_input($postTitle),
	'ClientName'      => clean_input($ClientName),

    'address1'       => clean_input($address1),
    'address2'       => clean_input($address2),
    'zip'            => clean_input($zip),
    'state'          => clean_input($state),
]);

if (!mail(ADMIN_NOTIFICATION_EMAILS, $admin_subject, $admin_message, $headers)) {
    echo json_encode([
        'type' => 'error',
        'text' => 'Unable to send admin email.'
    ]);
    exit;
}

if($alldetails["sendmailtouser"]) {
// -------------------------------------------------
// USER AUTO-REPLY
// -------------------------------------------------
$user_subject = $alldetails["subject"]; // "New enquiry on [post_title]- [_site_title]".COMPANY_NAME;

$email_body = load_email_template($alldetails["template_name"], [
    'fullname'    => clean_input($full_name),
    'first_name'  => clean_input($first_name),
    'user_email'  => clean_input($email),
    'message'     => clean_input($message),
    'form_title'  => clean_input($user_subject),
]);

$user_message = load_email_template('comman-template', [
    'subject'     => clean_input($user_subject),
    'message'     => $email_body, // ⚠️ KEEP RAW (already HTML)
    'colorcode'   => '#0a5adb',
    'site_title'  => COMPANY_NAME,
    'first_name'  => clean_input($first_name),
    'user_name'   => clean_input($first_name),
    'user_email'  => clean_input($email),
    'form_title'  => clean_input($user_subject),
]);


mail($email, $user_subject, $user_message, $headers);

}else {
	//mail("smartmithilesh26@gmail.com", "user not send mail", $email);
}

$acyListsId = $acymailingID ?: ($alldetails["acymailing_id"] ?? 1);
$customFields = [
    //'3' => $country,
    //'4' => $phone,
    //'5' => $company
];



subscribe_to_acymailing(
    $email,
    $full_name,
    [$acyListsId],
    $customFields
);


// -------------------------------------------------
// DATABASE INSERT (Dynamic Multi Table)
// -------------------------------------------------
$leadDate    = date('Y-m-d');
$sector      = COMPANY_SECTOR;
$industry_id = INDUSTRY_ID;

$table = $alldetails['table'] ?? 'fin_web_leads';

// ----------------------------------
// ARTICLE REQUEST TABLE
// ----------------------------------
if ($table === 'article_request') {

    $data = [
        'sector'      => $sector,
        'date'        => $leadDate,
        'name'        => $full_name,
        'email'       => $email,
        'phone'       => $phone,
        'company'     => $company,
        'designation' => $jobtitle,
        'topics'      => $topic,
        'country'     => $country,
        'message'     => $message
    ];

// ----------------------------------
// SUBSCRIPTION TABLE
// ----------------------------------
} elseif ($table === 'subscriptions') {

    $data = [
        'sector'            => $sector,
        'date'              => $leadDate,
        'email'             => $email,
        'name'              => $full_name,
        'job_title'         => $jobtitle,
        'phone'             => $phone,
        'company'           => $company,
        'address1'          => $address1,
        'address2'          => $address2,
        'zip'               => $zip,
        'state'             => $state,
        'country'           => $country,
        'subcription_type'  => $alldetails["leadType"]
    ];

// ----------------------------------
// DEFAULT (fin_web_leads)
// ----------------------------------
} else {

    $data = [
        'industry_id'     => $industry_id,
        'agent_name'      => 'web admin',
        'sector'          => $sector,
        'booking_status'  => 'web lead',
        'designation'     => $jobtitle,
        'lead_date'       => $leadDate,
        'contact_person'  => $full_name,
        'contact_number'  => $phone,
        'email'           => $email,
        'company'         => $company,
        'sourceurl'       => $permalink,
        'lead_type'       => $alldetails["leadType"] ?? 'Contact Enquiry',
        'post_id'         => $postID,
        'message'         => $message,
        'event_date'      => $start_date,
        'event_end_date'  => $end_date,
        'event_name'      => $event_title,
        'event_country'   => $event_location,
        'event_website'   => $event_website,
		'subject'        => $subject
    ];
}

// Execute Insert
insertLead($conn, $table, $data);

$conn->close();
// -------------------------------------------------
// FINAL SUCCESS RESPONSE
// -------------------------------------------------
$replacements = [
    '{name}' => $first_name,
    '{WhitepaperLinks}' => $whitepaper_link,
];
$downloadLinks = [];
if($formname == "MediaPacks") {
	$downloadLinks[] = MEDIAPACKS_URL;
}
if (!empty($whitepaper_link)) {
    $downloadLinks[] = $whitepaper_link;
}
echo json_encode([
    'type' => $alldetails['messagetype'] ?? 'message',
	'downloadLinks' => $downloadLinks,
    'text' => str_replace(
        array_keys($replacements),
        array_values($replacements),
        $alldetails["message"] ?? ''
    ) ?: "Hi {$first_name}, Thank you for reaching out—your inquiry is important to us, and we'll get back to you at the earliest."
]);
exit;
