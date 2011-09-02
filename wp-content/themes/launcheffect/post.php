<?php 

session_start();

// INCLUDE WORDPRESS STUFF
include_once('../../../wp-config.php');
include_once('../../../wp-load.php');
include_once('../../../wp-includes/wp-db.php');
include('functions/le-functions.php');

$referredBy = $_SESSION['referredBy'];

// POST FORM WITH AJAX
$email_check = '';
$reuser = '';
$clicks = '';
$conversions = '';
$return_arr = array();

if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

	$email_check = 'valid';
	
	$postEmail = $_POST['email'];
	
	$count = countCheck($stats_table, email, $postEmail);

	if ($count > 0) {
		
		$reuser = 'true';
		
		$stats = getDetail($stats_table, email, $_POST['email']);
		
		foreach ($stats as $stat) {
			$clicks = $stat->visits;
			$conversions = $stat->conversions;
			$returncode = $stat->code;
		}
		
	} else {
		
		$reuser = 'false';
		postData($stats_table, $referredBy);
		
	}
		
} else {

    $email_check = 'invalid';

}

if(isset($_POST['email'])){ 
	
	$return_arr["email_check"] = $email_check;
	$return_arr["reuser"] = $reuser;
	$return_arr["clicks"] = $clicks;
	$return_arr["conversions"] = $conversions;
	$return_arr["returncode"] = $returncode;
	$return_arr["email"] = $_POST['email'];
	$return_arr["code"] = $_POST['code'];

} else if(!isset($_POST)){ 

	echo "hmmm..."; 

}  

echo json_encode($return_arr);

?>