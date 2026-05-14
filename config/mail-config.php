<?php
/**
 * GLOBAL MAIL CONFIGURATION
 * Used across all forms & templates
 */

$AlltemplatesDetails = array(

    "AdvertiseUS" => array(
        "subject"       => "Your Advertising Inquiry: Next Steps with - ".COMPANY_NAME,
		"message"		=> "Thank you {name}, your enquiry has been submitted successfully.",
        "template_name" => "advertise-with-us",
		"leadType"      => "Advertise with us Enquiry",
        "acymailing_id" => "11",
		'table' => 'fin_web_leads',
		'sendmailtouser' => true
    ),
	
	"MediaPacks" => array(
        "subject"       => "Download Media Pack - ".COMPANY_NAME,
		"message"		=> "Thank you for your interest in ".COMPANY_NAME.", please <a href='".MEDIAPACKS_URL."' target='_blank'>click here to open the MediaPack </a>, we have also emailed it to you for your perusal.",
        "template_name" => "MediaPacks",
		"leadType"      => "MediaPacks Enquiry",
        "acymailing_id" => "9",
		'table' => 'fin_web_leads',
		'sendmailtouser' => true
    ),

    "ContactUs" => array(
        "subject"       => COMPANY_NAME." - Your Enquiry",
		"message"		=> "Hi {name}, thank you for the Enquiry. We will get back to you shortly.",
        "template_name" => "ContactUs",
		"leadType"      => "ContactUs Enquiry",
        "acymailing_id" => "6", //Done
		'table' => 'fin_web_leads',
		'sendmailtouser' => true
    ),
	"EnquiryNow" => array(
        "subject"       => COMPANY_NAME." - Your Enquiry",
		"message"		=> "Hi {name}, thank you for the Enquiry. We will get back to you shortly.",
        "template_name" => "ContactUs",
		"leadType"      => "ContactUs Enquiry",
        "acymailing_id" => "12",
		'table' => 'fin_web_leads',
		'sendmailtouser' => true
    ),

    "Magazine" => array(
        "subject"       => COMPANY_NAME." – Thank You for Subscribing to Our Magazine!",
		"message"		=> "Thank you for subscribing to our magazines. We will send you a copy once the next issue is launched - enjoy exclusive access to expert insights and premium content!",
        "template_name" => "Magazine",
		"leadType"      => "Magazine Enquiry",
        "acymailing_id" => "1",
		'table' => 'fin_web_leads',
		'sendmailtouser' => true
    ),
	
	"EventSubmission" => array(
        "subject"       => "Event Submitted - ".COMPANY_NAME,
		"message"		=> "Thank you for submitting your Event. Our event team will review and get back to you shortly.",
        "template_name" => "Event",
		"leadType"      => "New Event Submited",
        "acymailing_id" => "8",
		'table' => 'fin_web_leads',
		'sendmailtouser' => true
    ),
	
	"ContentSubmssion" => array(
        "subject"       => COMPANY_NAME." - Article Submission Request",
		"message"		=> "Hi {name}, thank you for the Enquiry. We will get back to you shortly",
        "template_name" => "ContentSubmssion",
		"leadType"      => "Content Enquiry",
        "acymailing_id" => "13",
		'table' => 'article_request',
		'sendmailtouser' => true
    ),
	
	"agendaForm" => array(
        "subject"       => "New Agenda on ".COMPANY_NAME,
		"message"		=> true,
        "template_name" => "agendaForm",
		"leadType"      => "agenda Enquiry",
        "acymailing_id" => "14",
		'table' => 'fin_web_leads',
		'sendmailtouser' => false,
		'messagetype' => 'agmessage'
    ),
	
	"WhitepaperDownload" => array(
        "subject"       => COMPANY_NAME." - Your Whitepaper Download",
		"message"		=> "Thank you for your interest in the WhitePaper. Please <a href='{WhitepaperLinks}' target='_blank'><b>click here to open</b></a>, we have also emailed it to you for your perusal.",
        "template_name" => "ContactUs",
		"leadType"      => "Whitepaper Download",
        "acymailing_id" => "15", //Done
		'table' => 'fin_web_leads',
		'sendmailtouser' => false
    ),
	
	

);