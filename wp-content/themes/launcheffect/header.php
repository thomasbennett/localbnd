<?php
session_start();
header('HTTP/1.1 200 OK'); ?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 

<head>
  <meta charset="utf-8" />
	<title>Localbnd</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta name="description" content=""  /> 
	<meta name="keywords" content=""  /> 
	
	<meta property="og:title" content=""/> 
	<meta property="og:image" content=""/>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/fancybox.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script> 

<?php wp_head(); 

include('functions/le-functions.php');

// STORE REFERRED BY CODE
$_SESSION['referredBy'] = $referredBy;

// LOG VISITS AND CONVERSIONS
logVisits($referredBy, $stats_table);
?>
</head>
