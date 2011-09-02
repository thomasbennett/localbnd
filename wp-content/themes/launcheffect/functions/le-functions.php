<?php

// INCLUDE WORDPRESS STUFF
require_once(ABSPATH . 'wp-config.php');
include_once(ABSPATH . 'wp-load.php');
include_once(ABSPATH . 'wp-includes/wp-db.php');


// THE TABLES
$stats_table = $wpdb->prefix . "launcheffect";


// GET RANDOM 

function randomString() {
    $length = 5;
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz';
    $string = '';    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }
    return $string;
}


// GET REFERRED_BY CODE

$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

$parseurl = parse_url($url, PHP_URL_PATH);
$parseurlstr = substr($parseurl, -5, 5);

if (strstr($parseurlstr, '/') OR $parseurlstr == '') {
	$referredBy = 'direct';
} else {
	$referredBy = $parseurlstr;
}


// QUERY DAT

function wpdbQuery($query, $type) {

	global $wpdb;
	$result = $wpdb->$type( $query );
	return $result;

}


// LOG VISITS 

function logVisits($referredBy, $table) {
	
	$update = wpdbQuery("UPDATE $table SET visits = visits+1 WHERE code = '$referredBy'", query);
	
}


// POST DATA

function postData($table, $referredBy) {

	$result = wpdbQuery("INSERT INTO $table (time, email, code, referred_by, visits, conversions, ip) VALUES('" . date('n-j-y, g:i:s') . "','$_POST[email]', '$_POST[code]','$referredBy',0,0,'" . $_SERVER['REMOTE_ADDR'] . "')", query);
	
	$update2 = wpdbQuery("UPDATE $table SET conversions = conversions+1 WHERE code = '$referredBy'", query);
	
}


// COUNT CHECK (RETURN COUNT OF INSTANCES WHERE X = Y)

function countCheck($table, $entry, $value) {
	$query = wpdbQuery(wpdbQuery("SELECT COUNT(*) FROM $table WHERE $entry = '$value'", prepare), get_var);
	return $query;
}


// REPEAT CODE CHECK

function codeCheck() {
	$code = randomString(); 
	$count = countCheck($stats_table, code, $code);
	if($count > 0) { echo randomString(); } else { echo $code; }	
}


// GET DATA, PAGINATE IT

function getPaginatedData($table, $order, $ad, $offset, $rowsperpage) {

	$result = wpdbQuery("SELECT * FROM $table ORDER BY $order $ad LIMIT $offset, $rowsperpage", get_results);
	return $result;
	
}


// GET DETAIL (RETURN X WHERE Y = Z)

function getDetail($table, $entry, $value) {

	$result = wpdbQuery("SELECT * FROM $table WHERE $entry = '$value' ORDER BY time DESC", get_results);
	return $result;
	
}


// COUNT DATA

function countData($table) {
	$count = wpdbQuery(wpdbQuery("SELECT COUNT(*) FROM $table", prepare), get_var);
	return $count;
}

?>