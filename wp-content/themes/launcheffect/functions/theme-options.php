<?php

add_action('admin_menu', 'create_theme_options_page');

function create_theme_options_page() {
  add_theme_page('Launch Effect', 'Launch Effect', 'edit_theme_options', __FILE__, 'build_options_page');
}

add_action('admin_head', 'admin_register_head');
function admin_register_head() {
  $url = get_bloginfo('template_directory') . '/functions/theme-options.css';
  echo "<link rel='stylesheet' href='$url' />\n";
}

function build_options_page() {

$sectionarray = array(

'Page' => 
	array(
		array( // subsection 1
			array( 
				'label' => 'Background Color',
				'type' => 'color',
				'option_name' => 'page_background_color',
				'default' => '',
				'class' => 'le-color'
			),
		),
		array( // subsection 2
			array( 
				'label' => 'Background Image',
				'type' => 'image',
				'option_name' => 'supersize',
				'option_disable' => 'supersize_disable',
				'desc' => 'For best results, choose an image that is large but keep the image size under 200KB.',
				'class' => 'le-threecol'
			)
		),
	),

'Container' => 
	array(
		array( // subsection 1
			array( 
				'label' => 'Background Color',
				'type' => 'color',
				'option_name' => 'container_background_color',
				'default' => '',
				'class' => 'le-color'
			),
			array(
				'label' => 'Border Width',
				'type' => 'select',
				'option_name' => 'container_border_width',
				'selectarray' => array('0px', '1px', '2px', '3px', '4px', '5px', '6px', '8px', '10px', '12px', '14px', '16px', '18px', '20px'),
				'class' => 'le-select_small'
			),
			array( 
				'label' => 'Border Color',
				'type' => 'color',
				'option_name' => 'container_border_color',
				'default' => '',
				'class' => 'le-color'
			),
			array( 
				'label' => 'Effects',
				'type' => 'select',
				'option_name' => 'container_effects',
				'selectarray' => array('dropshadow', 'glow', 'none'),
				'class' => 'le-select_small'
			),
		),

		array( // subsection 2
			array( 
				'label' => 'Logo Image',
				'type' => 'image',
				'option_name' => 'bkt_logo',
				'option_disable' => 'bkt_logodisable',
				'option_disable2' => 'bkt_logotitledisable',
				'subtype' => 'logo',
				'desc' => 'Image should not exceed 320 x 200 pixels.  Check the box to disable the custom image.  Your image will not be deleted.',
				'class' => 'le-threecol'
			)
		),
		array( // subsection 3
			array( 
				'label' => 'Video Embed (Vimeo/YouTube)',
				'type' => 'text',
				'option_name' => 'video_embed',
				'desc' => 'Paste the URL (NOT the embed code) to your YouTube OR Vimeo video here.',
			)
		),
		array( // subsection 4
			array( 
				'label' => 'Background Image',
				'type' => 'image',
				'option_name' => 'background',
				'option_disable' => 'background_disable',
				'desc' => 'For best results, choose an image that is tile-able.',
				'class' => 'le-threecol'
			)
		),
		array( // subsection 5
			array(
				'label' => 'Link URL',
				'type' => 'text',
				'option_name' => 'description_linkurl',
				'desc' => 'Link to your blog, another website, Facebook, or Twitter.'
			),
		),
		array( // subsection 6
			array(
				'label' => 'Link Text',
				'type' => 'text',
				'option_name' => 'description_linktext',
				'desc' => 'This visible text will appear on the bottom right corner of the container.'
			),
		)
	),

'Title' => 	
	array(
		array( // subsection 1
			array(
				'label' => 'Color',
				'type' => 'color',
				'option_name' => 'heading_color',
				'default' => '',
				'class' => 'le-color'
			),
			array(
				'label' => 'Size',
				'type' => 'select',
				'option_name' => 'heading_size',
				'selectarray' => array('2.4', '2.6', '2.8', '3.0', '3.2', '3.4', '3.6', '3.8', '4.0', '4.2', '4.4', '4.6', '5.0'),
				'class' => 'le-select_small'
			),
			array(
				'label' => 'Style',
				'type' => 'select',
				'option_name' => 'heading_style',
				'selectarray' => array('normal', 'bold', 'italic', 'bold italic'),
				'class' => 'le-select_small'
			),
			array(
				'label' => 'Effects',
				'type' => 'select',
				'option_name' => 'heading_effects',
				'selectarray' => array('none','letterpress','shadow'),
				'class' => 'le-select_small'
			),
		),
		array( // subsection 2
			array(
				'label' => 'Font: Google WebFonts',
				'type' => 'select',
				'subtype' => 'webfont',
				'option_name' => 'heading_font_goog',
				'class' => 'le-select_large le-select_webfont',
				'selectarray' => array('','Abel','Allerta Stencil','Anton','Architects Daughter','Arvo','Bangers','Bevan','Bowlby One SC','Cabin Sketch:700','Cardo','Chewy','Corben:700','Dancing Script','Delius Swash Caps','Didact Gothic','Forum','Francois One','Geo','Gravitas One','Gruppo','Hammersmith One','IM Fell Double Pica SC','Josefin Sans','Kameron','League Script','Leckerli One','Loved by the King','Maiden Orange','Maven Pro','Muli','Nixie One','Old Standard TT','Oswald','Ovo','Pacifico','Permanent Marker','Playfair Display','Podkova','Pompiere','Raleway:100','Rokkitt','Six Caps','Sniglet:800','Syncopate','Terminal Dosis Light','Ultra','Unna','Varela Round','Yanone Kaffeesatz'),
				'desc' => 'Select your Google Webfont from this list.'
			),
		),
		array( // subsection 3
			array(
				'label' => 'Font: Basic Sets',
				'type' => 'select',
				'option_name' => 'heading_font',
				'class' => 'le-select_large',
				'selectarray' => array('Arial, "Helvetica Neue", Helvetica, sans-serif', 'Baskerville, Times, "Times New Roman", serif', 'Cambria, Georgia, Times, "Times New Roman", serif', '"Century Gothic", "Apple Gothic", sans-serif', 'Consolas, "Lucida Console", Monaco, monospace', '"Copperplate Light", "Copperplate Gothic Light", serif', '"Courier New", Courier, monospace', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif', 'Futura, "Century Gothic", AppleGothic, sans-serif', 'Garamond, "Hoefler Text", Palatino, "Palatino Linotype", serif', 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Georgia, Times, "Times New Roman", serif', '"Gill Sans", "Trebuchet MS", Calibri, sans-serif', 'Helvetica, "Helvetica Neue", Arial, sans-serif', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif', 'Tahoma, Verdana, Geneva', 'Times, "Times New Roman", Georgia, serif', '"Trebuchet MS", Tahoma, Arial, sans-serif', 'Verdana, Tahoma, Geneva, sans-serif'),
				'desc' => 'Select from this list if you\'d prefer to use a basic font set instead of Google WebFonts.'
			)
		),
		array( // subsection 4
			array(
				'label' => 'Heading Text',
				'type' => 'text',
				'option_name' => 'heading_content',
				'desc' => 'Your company/product name or a fancy title goes here.'
			),
		),
	),
	
'Sub-Heading' => 	
	array(
		array( // subsection 1
			array(
				'label' => 'Color',
				'type' => 'color',
				'option_name' => 'subheading_color',
				'default' => '',
				'class' => 'le-color'
			),
			array(
				'label' => 'Size',
				'type' => 'select',
				'option_name' => 'subheading_size',
				'selectarray' => array('0.8', '1.0', '1.2', '1.4', '1.6', '1.8', '2.0'),
				'class' => 'le-select_small'
			),
			array(
				'label' => 'Style',
				'type' => 'select',
				'option_name' => 'subheading_style',
				'selectarray' => array('normal', 'bold', 'italic', 'bold italic'),
				'class' => 'le-select_small'
			),
			array(
				'label' => 'Effects',
				'type' => 'select',
				'option_name' => 'subheading_effects',
				'selectarray' => array('none','letterpress','shadow'),
				'class' => 'le-select_small'
			),
		),
		array( // subsection 2
			array(
				'label' => 'Font: Google WebFonts',
				'type' => 'select',
				'subtype' => 'webfont',
				'option_name' => 'subheading_font_goog',
				'class' => 'le-select_large le-select_webfont',
				'selectarray' => array('','Abel','Allerta Stencil','Anton','Architects Daughter','Arvo','Bangers','Bevan','Bowlby One SC','Cabin Sketch:700','Cardo','Chewy','Corben:700','Dancing Script','Delius Swash Caps','Didact Gothic','Forum','Francois One','Geo','Gravitas One','Gruppo','Hammersmith One','IM Fell Double Pica SC','Josefin Sans','Kameron','League Script','Leckerli One','Loved by the King','Maiden Orange','Maven Pro','Muli','Nixie One','Old Standard TT','Oswald','Ovo','Pacifico','Permanent Marker','Playfair Display','Podkova','Pompiere','Raleway:100','Rokkitt','Six Caps','Sniglet:800','Syncopate','Terminal Dosis Light','Ultra','Unna','Varela Round','Yanone Kaffeesatz'),
				'desc' => 'Select your Google Webfont from this list.'
			),
		),
		array( // subsection 3
			array(
				'label' => 'Font: Basic Sets',
				'type' => 'select',
				'option_name' => 'subheading_font',
				'class' => 'le-select_large',
				'selectarray' => array('Arial, "Helvetica Neue", Helvetica, sans-serif', 'Baskerville, "Times New Roman", Times, serif', 'Cambria, Georgia, Times, "Times New Roman", serif', '"Century Gothic", "Apple Gothic", sans-serif', 'Consolas, "Lucida Console", Monaco, monospace', '"Copperplate Light", "Copperplate Gothic Light", serif', '"Courier New", Courier, monospace', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif', 'Futura, "Century Gothic", AppleGothic, sans-serif', 'Garamond, "Hoefler Text", Times New Roman, Times, serif', 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif', 'Georgia, Palatino," Palatino Linotype", Times, "Times New Roman", serif', '"Gill Sans", Calibri, "Trebuchet MS", sans-serif', '"Helvetica Neue", Arial, Helvetica, sans-serif', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif', 'Tahoma, Geneva, Verdana', 'Times, "Times New Roman", Georgia, serif', '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande"," Lucida Sans", Arial, sans-serif', 'Verdana, Geneva, Tahoma, sans-serif'),
				'desc' => 'Select from this list if you\'d prefer to use a basic font set instead of Google WebFonts.'
			)
		),
		array( // subsection 4
			array(
				'label' => 'Sub-Heading Text',
				'type' => 'text',
				'option_name' => 'subheading_content',
				'desc' => 'This text goes under the Heading and is usually a very brief description.'
			),
		),
		array( // subsection 5
			array(
				'label' => 'Sub-Heading Text, after Submit',
				'type' => 'text',
				'option_name' => 'subheading_content2',
				'desc' => 'Usually a "Thanks!" would do.'
			),
		)
	),
	
'Label' => 	
	array(
		array( // subsection 1
			array(
				'label' => 'Color',
				'type' => 'color',
				'option_name' => 'label_color',
				'default' => '',
				'class' => 'le-color',
				'desc' => 'Note: Button will take on same color as label.'
			),
			array(
				'label' => 'Size',
				'type' => 'select',
				'option_name' => 'label_size',
				'selectarray' => array('0.8', '1.0', '1.2', '1.4', '1.6', '1.8', '2.0'),
				'class' => 'le-select_small'
			),
			array(
				'label' => 'Style',
				'type' => 'select',
				'option_name' => 'label_style',
				'selectarray' => array('normal', 'bold', 'italic', 'bold italic'),
				'class' => 'le-select_small'
			),
			array(
				'label' => 'Effects',
				'type' => 'select',
				'option_name' => 'label_effects',
				'selectarray' => array('none', 'letterpress','shadow'),
				'class' => 'le-select_small'
			),
		),
		array( // subsection 2
			array(
				'label' => 'Font: Google WebFonts',
				'type' => 'select',
				'subtype' => 'webfont',
				'option_name' => 'label_font_goog',
				'class' => 'le-select_large le-select_webfont',
				'selectarray' => array('','Abel','Allerta Stencil','Anton','Architects Daughter','Arvo','Bangers','Bevan','Bowlby One SC','Cabin Sketch:700','Cardo','Chewy','Corben:700','Dancing Script','Delius Swash Caps','Didact Gothic','Forum','Francois One','Geo','Gravitas One','Gruppo','Hammersmith One','IM Fell Double Pica SC','Josefin Sans','Kameron','League Script','Leckerli One','Loved by the King','Maiden Orange','Maven Pro','Muli','Nixie One','Old Standard TT','Oswald','Ovo','Pacifico','Permanent Marker','Playfair Display','Podkova','Pompiere','Raleway:100','Rokkitt','Six Caps','Sniglet:800','Syncopate','Terminal Dosis Light','Ultra','Unna','Varela Round','Yanone Kaffeesatz'),
				'desc' => 'Select your Google Webfont from this list.'
			),
		),
		array( // subsection 3
			array(
				'label' => 'Font: Basic Sets',
				'type' => 'select',
				'option_name' => 'label_font',
				'class' => 'le-select_large',
				'selectarray' => array('Arial, "Helvetica Neue", Helvetica, sans-serif', 'Baskerville, "Times New Roman", Times, serif', 'Cambria, Georgia, Times, "Times New Roman", serif', '"Century Gothic", "Apple Gothic", sans-serif', 'Consolas, "Lucida Console", Monaco, monospace', '"Copperplate Light", "Copperplate Gothic Light", serif', '"Courier New", Courier, monospace', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif', 'Futura, "Century Gothic", AppleGothic, sans-serif', 'Garamond, "Hoefler Text", Times New Roman, Times, serif', 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif', 'Georgia, Palatino," Palatino Linotype", Times, "Times New Roman", serif', '"Gill Sans", Calibri, "Trebuchet MS", sans-serif', '"Helvetica Neue", Arial, Helvetica, sans-serif', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif', 'Tahoma, Geneva, Verdana', 'Times, "Times New Roman", Georgia, serif', '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande"," Lucida Sans", Arial, sans-serif', 'Verdana, Geneva, Tahoma, sans-serif'),
				'desc' => 'Select from this list if you\'d prefer to use a basic font set instead of Google WebFonts.'
			)
		),
/*
		array( // subsection 4
			array(
				'label' => 'Label Text',
				'type' => 'text',
				'option_name' => 'label_content',
				'desc' => 'Character Limit:100'
			),
		),
		array( // subsection 5
			array(
				'label' => 'Social Media Label Text',
				'type' => 'text',
				'option_name' => 'label_social',
				'desc' => 'Only appears after submit.  Character Limit:100'
			),
		),
		array( // subsection 6
			array(
				'label' => 'Unique URL Label Text',
				'type' => 'text',
				'option_name' => 'label_success_content',
				'desc' => 'Only appears after submit.  Character Limit:100'
			),
		)
*/
	),
	
'Body Text' => 	
	array(
		array( // subsection 1
			array(
				'label' => 'Text Color',
				'type' => 'color',
				'option_name' => 'description_color',
				'default' => '',
				'class' => 'le-color'
			),
			array(
				'label' => 'Link Color',
				'type' => 'color',
				'option_name' => 'description_link_color',
				'default' => '',
				'class' => 'le-color'
			),
			array(
				'label' => 'Size',
				'type' => 'select',
				'option_name' => 'description_size',
				'selectarray' => array('0.6', '0.8', '1.0', '1.2', '1.4', '1.6', '1.8', '2.0'),
				'class' => 'le-select_small'
			)
		),
		array( // subsection 2
			array(
				'label' => 'Font: Google WebFonts',
				'type' => 'select',
				'subtype' => 'webfont',
				'option_name' => 'description_font_goog',
				'class' => 'le-select_large le-select_webfont',
				'selectarray' => array('','Abel','Allerta Stencil','Anton','Architects Daughter','Arvo','Bangers','Bevan','Bowlby One SC','Cabin Sketch:700','Cardo','Chewy','Corben:700','Dancing Script','Delius Swash Caps','Didact Gothic','Forum','Francois One','Geo','Gravitas One','Gruppo','Hammersmith One','IM Fell Double Pica SC','Josefin Sans','Kameron','League Script','Leckerli One','Loved by the King','Maiden Orange','Maven Pro','Muli','Nixie One','Old Standard TT','Oswald','Ovo','Pacifico','Permanent Marker','Playfair Display','Podkova','Pompiere','Raleway:100','Rokkitt','Six Caps','Sniglet:800','Syncopate','Terminal Dosis Light','Ultra','Unna','Varela Round','Yanone Kaffeesatz'),
				'desc' => 'Select your Google Webfont from this list.'
			),
		),
		array( // subsection 3
			array(
				'label' => 'Font: Basic Sets',
				'type' => 'select',
				'option_name' => 'description_font',
				'class' => 'le-select_large',
				'selectarray' => array('Arial, "Helvetica Neue", Helvetica, sans-serif', 'Baskerville, "Times New Roman", Times, serif', 'Cambria, Georgia, Times, "Times New Roman", serif', '"Century Gothic", "Apple Gothic", sans-serif', 'Consolas, "Lucida Console", Monaco, monospace', '"Copperplate Light", "Copperplate Gothic Light", serif', '"Courier New", Courier, monospace', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif', 'Futura, "Century Gothic", AppleGothic, sans-serif', 'Garamond, "Hoefler Text", Times New Roman, Times, serif', 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif', 'Georgia, Palatino," Palatino Linotype", Times, "Times New Roman", serif', '"Gill Sans", Calibri, "Trebuchet MS", sans-serif', '"Helvetica Neue", Arial, Helvetica, sans-serif', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif', 'Tahoma, Geneva, Verdana', 'Times, "Times New Roman", Georgia, serif', '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande"," Lucida Sans", Arial, sans-serif', 'Verdana, Geneva, Tahoma, sans-serif'),
				'desc' => 'Select from this list if you\'d prefer to use a basic font set instead of Google WebFonts.'
			)
		),
		array( // subsection 4
			array(
				'label' => 'Description Text',
				'type' => 'textarea',
				'option_name' => 'description_content',
				'desc' => 'Write a short description about your company/product and if you want, offer an incentive for signing up and sharing (discount, early access, etc.)'
			),
		),
		array( // subsection 5
			array(
				'label' => 'Description Text, after Submit',
				'type' => 'textarea',
				'option_name' => 'description_content2',
				'desc' => 'You can repeat the description or write more about how to achieve the incentive. (e.g. "Invite friends using the link below. The more friends you invite, the better your chances!")'
			),
		),
	),
	
'Head' => 	
	array(
		array( // subsection 1
			array( 
				'label' => 'Upload Favicon',
				'type' => 'image',
				'option_name' => 'bkt_favicon',
				'option_disable' => 'bkt_favdisable',
				'desc' => 'Favicon should not exceed 16 x 16 pixels.  Check the box to disable the favicon.  Your favicon will not be deleted.',
				'class' => 'le-threecol le-favicon'
			)
		),
		array( // subsection 2
			array( 
				'label' => 'Upload Site Thumbnail',
				'type' => 'image',
				'option_name' => 'bkt_thumb',
				'option_disable' => 'bkt_thumbdisable',
				'desc' => 'Image to accompany Facebook Like/Send posts.  Image must be at least 50 x 50 pixels. Square images work best.',
				'class' => 'le-threecol'
			)
		),
		array( // subsection 3
			array(
				'label' => 'Page Title',
				'type' => 'text',
				'class' => 'le-threecol',
				'option_name' => 'page_title',
				'desc' => 'This is the title that\'ll appear on the web browser.'
			),
		),
		array( // subsection 4
			array(
				'label' => 'Meta Description',
				'type' => 'textarea',
				'class' => 'le-threecol',
				'option_name' => 'bkt_metadesc',
				'desc' => 'A short sentence should do.'
			),
		),
		array( // subsection 5
			array(
				'label' => 'Meta Keywords',
				'type' => 'textarea',
				'class' => 'le-threecol',
				'option_name' => 'bkt_metakey',
				'desc' => 'Separate keywords with a comma.'
			),
		)
	),
	
'Google Analytics' => 	
	array(
		array( // subsection 1
			array(
				'label' => 'Embed Code',
				'type' => 'textarea',
				'class' => 'le-threecol',
				'option_name' => 'bkt_google',
				'desc' => 'Simply paste your analytics code here.'
			),
		)
	),

);

?>


<div class="wrap le-wrapper">

	<h2>Launch Effect Designer</h2>
		
	<div id="le-iexploder">
		<h3>You're using a really old version of Internet Explorer.</h3>
		
		<p>This theme options panel has been optimized for <strong>Internet Explorer 8 and 9</strong> and most widely used versions of <strong>Safari, Firefox and Chrome</strong>. If you are using an earlier version of Internet Explorer, you may experience performance issues within this area of the site.</p>
		
		<p>Additionally, using an outdated browser makes your computer <strong>unsafe</strong>. For the best WordPress experience, please update your browser.</p>

		<p><a href="http://www.microsoft.com/windows/internet-explorer/">Update Internet Explorer</a></p>

	</div>


<?php $option = get_option('le_initiate');  if ($option == 'initiated') : ?>		
		

		<form method="post" action="options.php" enctype="multipart/form-data">
		
		<p>You can use the controls on this page to change the look & feel of your Launch Effect page. If you're having any issues, please feel free to contact us at our <a href="http://launcheffectapp.com/support" target="_blank">support forums</a> or via email at <a href="mailto:support@launcheffectapp.com">support@launcheffectapp.com</a>.</p>

		<?php settings_fields('plugin_options'); ?>
		
		<?php foreach ($sectionarray as $key => $value): ?>
		
			<div class="le-section">
			
				<div class="le-title">
					<h3><?php echo $key; ?></h3>
					<span class="expand" id="<?php echo str_replace(' ', '', $key); ?>">+</span>
					<span class="submit"><input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" /></span>
					<div class="clearfix"></div>
				</div>
			
				<?php foreach ($value as $subsection): ?>
				
					<div class="le-sub_section">
				
					<?php foreach ($subsection as $op): ?>
					
						<div class="le-input<?php echo ' ' . $op['class']; ?>">
							<label><?php echo $op['label']; ?></label>
					
						<?php if($op['type'] == 'color'): ?>
							
							<input name="<?php echo $op['option_name']; ?>" type='text' value="<?php if (get_option($op['option_name']) != "") { echo stripslashes(get_option($op['option_name'])); } else { echo $op['default']; } ?>" class="colorpicker" />
							<small><?php echo $op['desc']; ?></small>
							
						<?php endif; ?>

						<?php if($op['type'] == 'select'): ?>
							
							<small><?php echo $op['desc']; ?></small>
							
							<?php
							 $options = get_option('plugin_options');
							 $optionname = $op['option_name'];
							 $selected = "{$options[$optionname]}";
							 $selectarray = $op['selectarray']; 
							  echo "<select name='plugin_options[$optionname]' value='{$options[$optionname]}'>";
								foreach($selectarray as $selectarray)
								{
									$firstfive = substr($selectarray, 0, 5);
									$nospace = str_replace(' ','',$firstfive);
									$is_selected = ($selectarray == $selected) ? 'selected' : '';		
									echo "<option class='$nospace' value='$selectarray' $is_selected>$selectarray</option>"; 
								}
								echo "</select>";
							?>
							
							<?php 
							
							if($op['subtype'] == 'webfont'): 
								
								$selectarray = $op['selectarray']; 
								echo '<ul>';
								
								foreach($selectarray as $selectarray) 
								{
									if($selectarray != '') {
									
									$firstfive = substr($selectarray, 0, 5);
									$nospace = str_replace(' ','',$firstfive);
									echo '<li class="' . $nospace . '"><img src="' . get_bloginfo('template_url') . '/functions/im/' . $nospace . '.png" alt="" /></li>';
									
									}
									
								}
								echo '</ul>';
								
							endif; ?>
							
						<?php endif; ?>

						
						<?php if($op['type'] == 'text'): ?>

							<input name="<?php echo $op['option_name']; ?>" type='text' value="<?php echo get_option($op['option_name']); ?>" />
							<small><?php echo $op['desc']; ?></small>

						<?php endif; ?>
						
						<?php if($op['type'] == 'textarea'): ?>

							<?php $descriptionText = get_option($op['option_name']); ?>
							<textarea name="<?php echo $op['option_name']; ?>" type='text' value="<?php echo htmlentities($descriptionText); ?>" /><?php echo htmlentities($descriptionText); ?></textarea>
							<small><?php echo $op['desc']; ?></small>

						<?php endif; ?>
						
						<?php if($op['type'] == 'image'): 
						
							 $options = get_option('plugin_options');
						?>
							
							<input type="file" name="<?php echo $op['option_name']; ?>" size="20"/>
							
							<?php if(get_option($op['option_disable'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
							
							<small><?php echo $op['desc']; ?></small> 
							<div class="le-check-delete"><input type="checkbox" name="<?php echo $op['option_disable']; ?>" value="true" <?php echo $checked; ?>/><p>Check to disable <?php echo $op['label']; ?>.</p></div>
							
							<?php if($op['subtype'] == 'logo'): 
							
								if(get_option($op['option_disable2'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
								<div class="le-check-delete"><input type="checkbox" name="<?php echo $op['option_disable2']; ?>" value="true" <?php echo $checked; ?>/><p>Check to disable Text Title.</p></div>
							
							<?php endif; ?>
							
							<br /><?php if($logopreview = "{$options[$op['option_name']]}") { echo "<div class=\"le-preview\"><img src='$logopreview' class=\"le-logopreview\" /></div>"; } ?>
							<div class="clearfix"></div>  

						<?php endif; ?>
						
						</div>
						
					<?php endforeach; ?>
					
					</div>
					
				<?php endforeach; ?>
			
			</div>
			
			<br />
		
		<?php endforeach; ?>		
		
		<input name="le_initiate" type='hidden' value="initiated" />	
		
	</form>
	
<?php else: ?>
	
	<div id="le-iexploder">
		<h3>You're using a really old version of Internet Explorer.</h3>
		
		<p>This theme options panel has been optimized for <strong>Internet Explorer 8 and 9</strong> and most widely used versions of <strong>Safari, Firefox and Chrome</strong>. If you are using an earlier version of Internet Explorer, you may experience performance issues within this area of the site.</p>
		
		<p>Additionally, using an outdated browser makes your computer <strong>unsafe</strong>. For the best WordPress experience, please update your browser.</p>

		<p><a href="http://www.microsoft.com/windows/internet-explorer/">Update Internet Explorer</a></p>

	</div>
	
	<div id="le-initiater">
		<h3>Welcome!</h3>
		
		<p>Thank you for downloading the Launch Effect theme!  Click "Get Started" to begin customizing the look and feel of your page.  If you're having any issues, please feel free to contact us at our <a href="http://launcheffectapp.com/support" target="_blank">support forums</a> or via email at <a href="mailto:support@launcheffectapp.com">support@launcheffectapp.com</a>.</p>
				
		<form method="post" action="options.php" enctype="multipart/form-data">
			
			<?php settings_fields('plugin_options'); ?>
		
			<input name="le_initiate" type='hidden' value="initiated" />
			<span class="submit initiate"><input name="Submit" type="submit" value="<?php esc_attr_e('Get Started &rarr;'); ?>" /></span>
		
		</form>
	</div>

<?php endif; ?>

</div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_url'); ?>/js/jpicker/css/jPicker-1.1.6.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/js/jpicker/jpicker-1.1.6.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/js/jquery.cookie.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	
		if ($.browser.msie && $.browser.version.substr(0,1)<8) {
			$('#le-iexploder').show();
		}
		
		$('.colorpicker').jPicker({window:{expandable: true}});
		
		$('input.colorpicker, span.jPicker').click(function(){
				var modalPos = $(window).scrollTop() + 70;
			$('div.jPicker.Container').css('top', modalPos + 'px');
		});

 		$('span.expand').click(function(){
 		
 			var thisID = $(this).attr('id');
 			
			if($(this).parent('.le-title').parent('.le-section').hasClass('open')) {
				$(this).parent('.le-title').parent('.le-section').removeClass('open');
				$(this).text('+');
				$.cookie(thisID, 'collapsered');
			} else {
				$(this).parent('.le-title').parent('.le-section').addClass('open');
				$(this).text('-');
				$.cookie(thisID, 'expandered');
			}
		});

		var cooky = $.cookie();
		
		$.each(cooky, function(key, value) {
			
			if(value == 'expandered') {
				$('span.expand#' + key).parent('.le-title').parent('.le-section').addClass('open');
				$('span.expand#' + key).text('-');
			}
			
		});

	    $('.le-select_webfont select').each(function(){
			var selectVal = $(this).find('option:selected').attr('value');
		    if(selectVal.length > 0) {
		    	$(this).parent().children('ul').children('li.' + $(this).find('option:selected').attr('class')).show();
		    }
	    });
		
		$('.le-select_webfont select').change(function(){
			
			var selectVal = $(this).find('option:selected').attr('value');
			
			if(selectVal.length > 0) {
				$(this).parent().children('ul').children('li').hide();
				$(this).parent().children('ul').children('li.' + $(this).find('option:selected').attr('class')).show();
			} else {
				$(this).parent().children('ul').children('li').hide();
			}
		
		});
	
	    	    
		$('#footer').hide();
		
	});
</script>


<?php
}

add_action('admin_init', 'register_and_build_fields');
function register_and_build_fields() { 
	register_setting('plugin_options', 'plugin_options', 'validate_setting');
    register_setting('plugin_options', 'supersize');
    register_setting('plugin_options', 'supersize_disable');
  	register_setting('plugin_options', 'bkt_copyright');
  	register_setting('plugin_options', 'bkt_logo');
  	register_setting('plugin_options', 'bkt_favicon');
    register_setting('plugin_options', 'bkt_metadesc');
    register_setting('plugin_options', 'bkt_metakey');
    register_setting('plugin_options', 'bkt_google');
    register_setting('plugin_options', 'bkt_logodisable');
    register_setting('plugin_options', 'bkt_logotitledisable');   
    register_setting('plugin_options', 'bkt_favdisable');
    register_setting('plugin_options', 'bkt_thumb');
    register_setting('plugin_options', 'bkt_thumbdisable');
    register_setting('plugin_options', 'heading_font_goog');
    register_setting('plugin_options', 'heading_font');
    register_setting('plugin_options', 'heading_color');
    register_setting('plugin_options', 'heading_size');
    register_setting('plugin_options', 'heading_style');
    register_setting('plugin_options', 'heading_effects');
    register_setting('plugin_options', 'heading_content');
    register_setting('plugin_options', 'subheading_font_goog');
    register_setting('plugin_options', 'subheading_font');
    register_setting('plugin_options', 'subheading_color');
    register_setting('plugin_options', 'subheading_size');
    register_setting('plugin_options', 'subheading_style');
    register_setting('plugin_options', 'subheading_effects');
    register_setting('plugin_options', 'subheading_content');
    register_setting('plugin_options', 'subheading_content2');
    register_setting('plugin_options', 'label_font_goog');
    register_setting('plugin_options', 'label_font');
    register_setting('plugin_options', 'label_color');
    register_setting('plugin_options', 'label_size');
    register_setting('plugin_options', 'label_style');
    register_setting('plugin_options', 'label_effects');
    register_setting('plugin_options', 'description_font_goog');
    register_setting('plugin_options', 'description_font');
    register_setting('plugin_options', 'description_color');
    register_setting('plugin_options', 'description_link_color');
    register_setting('plugin_options', 'description_size');
    register_setting('plugin_options', 'description_content');
    register_setting('plugin_options', 'description_content2');
    register_setting('plugin_options', 'description_linktext');
    register_setting('plugin_options', 'description_linkurl');
    register_setting('plugin_options', 'container_border_color');
    register_setting('plugin_options', 'container_border_width');
    register_setting('plugin_options', 'container_effects');
    register_setting('plugin_options', 'container_background_color');
    register_setting('plugin_options', 'page_title');
    register_setting('plugin_options', 'page_background_color');    
    register_setting('plugin_options', 'background');
    register_setting('plugin_options', 'background_disable');
    register_setting('plugin_options', 'video_embed');
    register_setting('plugin_options', 'le_initiate');
  }

$options = get_option('plugin_options');
echo $options['value'];

function validate_setting($plugin_options) {
 $keys = array_keys($_FILES);
 $i = 0;

foreach ( $_FILES as $image ) {
   // if a files was upload
   if ($image['size']) {

       $override = array('test_form' => false);
       // save the file, and store an array, containing its location in $file
       $file = wp_handle_upload( $image, $override );
       $plugin_options[$keys[$i]] = $file['url'];
   }

   // Else, the user didn't upload a file.
   // Retain the image that's already on file.
   else {
     $options = get_option('plugin_options');
     $plugin_options[$keys[$i]] = $options[$keys[$i]];
   }
   $i++;
 }
 return $plugin_options;
}
?>