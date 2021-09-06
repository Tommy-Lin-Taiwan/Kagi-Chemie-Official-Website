+

<?php

/*
// ini_set(): change attribute to new string val in php.ini
// godaddy server has php and no need to alter the ports

ini_set('SMTP', 'localhost');
ini_set('smtp_port', 25);
*/

/*Theoretically would work*/

/* The host email */
$webmaster_email = "kagi.com@msa.hinet.net";

$feedback = "mail_form.html";
/*Guide back to which page after the format fails */
$error = "";
/*Guide back to which page after the info has been successfully sent */
$success = "";

/*
print_r($_POST);
*/

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$company_name = $_POST['company_name'];
$work_email = $_POST['work_email'];
$message = $_POST['message'];

$msg = 
"名: " . $first_name . "\r\n" . 
"姓: " . $last_name . "\r\n" . 
"公司名稱: " . $company_name . "\r\n" . 
"公司電郵地址: " . $work_email . "\r\n" . 
"------------------------------------------" . "\r\n" .
"內容: " . "\r\n" . 
$message ;

/* Check spam injection */
function isInjected($str) {
    $injections = array('(\n+)',
	'(\r+)',
	'(\t+)',
	'(%0A+)',
	'(%0D+)',
	'(%08+)',
	'(%09+)'
	);
	$inject = join('|', $injections);
	$inject = "/$inject/i";
	if(preg_match($inject,$str)) {
		return true;
	}
	else {
		return false;
	}
}

/* Prevent from direct access of this php file */
if (!isset($_REQUEST['work email'])) {
    header( "Location: $feedback" );
}

/* Ensure all required spaces r filled */
if (empty($first_name) || empty($last_name) || empty($company_name) || empty($work_email) || empty($message)) {
    header( "Location: $error" );
}

/* Make sure no spam bots spam the server */
elseif (isInjected($first_name) || isInjected($last_name) || isInjected($company_name) || isInjected($work_email)) {
    header("Location: $error");
}

/* Successful email sent */
else {
    mail("$webmaster_email", "網站來信", $msg);
    header("Location: $success");
}

?>