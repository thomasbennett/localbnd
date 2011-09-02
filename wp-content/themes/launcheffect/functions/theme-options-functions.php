<?php 

// GET OPTIONS FUNCTIONS

// echo, with default value
function le($opname, $default) {
	$option = get_option($opname);
	if($option != '') { 
		echo nl2br(get_option($opname)); 
	} else {
		echo $default;
	}
}

// return
function ler($opname) {
	$option = get_option($opname);
	if($option != '') { 
		return get_option($opname); 
	}
}

// return, type 2 (for selects and some other options that require plugin_options to be called again)
function  ler2($opname) {
	$options = get_option('plugin_options');
	if($options[$opname] != '') {
		return $options[$opname];
	}
}

// images: checks if the image is disabled, checks if the image is blank
function leimg($opname, $opdisable) {
	$options = get_option($opdisable); 
	if($options[$opdisable] != 't') { 
		$options = get_option('plugin_options'); if($options[$opname] != '') {
			$options = get_option('plugin_options');
			return $options[$opname];
		}
 	}
}

// google webfonts for CSS: strips the colon
function legogl($opname, $default) {
	$options = get_option('plugin_options');
	if($options[$opname] != '') { 
		$str = $options[$opname];
		$pos = strpos($str,':'); 
		if($pos === false) { 	
			echo $str; 
		} else { 
			echo substr($str, 0, strpos($str, ':'));
		}  
	} else { 
		echo ler2($default); 
	}
}

// font weight 
function lewt($opname) {
	$options = get_option('plugin_options');
	if($options[$opname] == 'bold' || $options[$opname] == 'bold italic') {
		echo 'bold';
	} else {
		echo 'normal';
	}
}

// font style 
function lestyle($opname) {
	$options = get_option('plugin_options');
	if($options[$opname] == 'italic' || $options[$opname] == 'bold italic') {
		echo 'italic';
	} else {
		echo 'normal';
	}
}


// calculates a darker color
function darker($opname) {
	
	$color = ler($opname);

	if(!preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $color, $parts))
	
	$out = ""; // Prepare to fill with the results
	for($i = 1; $i <= 3; $i++) {
	  $parts[$i] = hexdec($parts[$i]);
	
	  $parts[$i] = round($parts[$i]) * 85/100; // 80/100 = 80%, i.e. 20% darker
	  // Increase or decrease it to fit your needs
	
	  $out .= str_pad(dechex($parts[$i]), 2, '0', STR_PAD_LEFT);
	}
	return $out;
}

// calculates a lighter color
function lighter($opname) {

	$color = ler($opname);

	if(!preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $color, $parts))
	
	$out = ""; // Prepare to fill with the results
	for($i = 1; $i <= 3; $i++) {
	  $parts[$i] = hexdec($parts[$i]);
	
		if ($parts[$i] < 195) {
		  $parts[$i] = round($parts[$i]) * 1.8; // 20% lighter
		  // Increase or decrease it to fit your needs
		} else {
			$parts[$i] = round($parts[$i]);
		}
		
		 $out .= str_pad(dechex($parts[$i]), 2, '0', STR_PAD_LEFT);
	}
	
	return $out;
}

?>