<style type="text/css">

	<?php 
	
	// EFFECTS			
	$textShadow = '0px 2px 1px #333';
	$letterPress = '0px 1px 1px #' . lighter(container_background_color);
	$dropShadow = '-webkit-box-shadow: 0px 0px 10px #111; -moz-box-shadow: 0px 0px 10px #111; box-shadow: 0px 0px 10px #111;';
	$glow = '-webkit-box-shadow: 0px 0px 10px #FFF;	-moz-box-shadow: 0px 0px 10px #FFF; box-shadow: 0px 0px 10px #FFF;';
	$noShadow = '-webkit-box-shadow: 0px 0px 0px #FFF; -moz-box-shadow: 0px 0px 0px #FFF; box-shadow: 0px 0px 0px #FFF;';
	$options = get_option('plugin_options'); ?>
	
	h1 {
		font-family:<?php legogl(heading_font_goog, heading_font); ?>;
		font-size:<?php echo ler2(heading_size) . 'em'; ?>;
		font-weight:<?php lewt(heading_style); ?>;
		font-style:<?php lestyle(heading_style); ?>;
		color:<?php echo '#'; le(heading_color,'777'); ?>;
		text-shadow: <?php if($options['heading_effects'] == 'letterpress') { echo $letterPress; } elseif($options['heading_effects'] == 'shadow') {echo $textShadow;} else {echo 'none'; } ?>;
	}
	
	h2 {
		font-family:<?php legogl(subheading_font_goog, subheading_font); ?>;
		font-size:<?php echo ler2(subheading_size) . 'em'; ?>;
		font-weight:<?php lewt(subheading_style); ?>;
		font-style:<?php lestyle(subheading_style); ?>;
		color:<?php echo '#'; le(subheading_color,'777'); ?>;
		text-shadow: <?php if($options['subheading_effects'] == 'letterpress') { echo $letterPress; } elseif($options['subheading_effects'] == 'shadow') {echo $textShadow;} else {echo 'none'; } ?>;
	}
	
	
	h2.social-heading, label {
		font-family:<?php legogl(label_font_goog, label_font); ?>;
		font-size:<?php echo ler2(label_size) . 'em'; ?>;
		font-weight:<?php lewt(label_style) ?>;
		font-style:<?php lestyle(label_style) ?>;
		color:<?php echo '#'; le(label_color,'777'); ?>;
		text-shadow: <?php if($options['label_effects'] == 'letterpress') { echo $letterPress; } elseif($options['label_effects'] == 'shadow') {echo $textShadow;} else {echo 'none'; } ?>;
	}
	
	p, ul#inner-footer li a {
		font-size:<?php echo ler2(description_size) . 'em'; ?>;
		font-family:<?php legogl(description_font_goog, description_font); ?>;
		color:<?php echo '#'; le(description_color,'777'); ?>;
	}
	
	p a, ul#inner-footer li a {
		color:<?php echo '#'; le(description_link_color,'777'); ?> !important;
	}
	
	input#submit-button {
		background-color:<?php echo '#'; le(label_color,'777'); ?>;
	}
	
	span#submit-button-border {
		border-color:<?php echo '#' . darker(label_color); ?>;
	}
	
	input#submit-button:hover {
		background-color:<?php echo '#' . darker(label_color); ?>;
	}
	
	#inner-container {
	<?php if(leimg(background,background_disable)) { ?>
		background-image:url('<?php echo leimg(background, background_disable); ?>');
		background-color:transparent;
	<?php } else { ?>
		<?php if(ler(container_background_color)) { ?>background-color: <?php echo '#' . ler(container_background_color); ?>; <?php } ?>
	<?php } ?>
	border-width:<?php echo ler2(container_border_width); ?>;
	border-color:<?php echo '#'; le(container_border_color,'fff'); ?>;
	border-style:solid;
	
	<?php if($options['container_effects'] == 'dropshadow') { echo $dropShadow; } elseif($options['container_effects'] == 'glow') { echo $glow; } else { echo $noShadow; } ?>
	
	}

</style>