<?php 

// THEME OPTIONS
require_once(TEMPLATEPATH . '/functions/theme-options.php');


// THEME OPTIONS FUNCTIONS
require_once(TEMPLATEPATH . '/functions/theme-options-functions.php');


// CREATE LAUNCHEFFECT TABLES
require_once(TEMPLATEPATH . '/functions/le-tables.php');

function stats_iframe() {
  echo '<iframe width="100%" height="600" src="http://dev.localband.com/stats/">Not supported.</iframe>';
  echo '<br />';
  echo '<a href="http://dev.localband.com/wp-content/themes/launcheffect/download.php?table=data">Download CSV</a>';
}

function launch_effect_stats() {
    wp_add_dashboard_widget('iframe_dashboard_widget', 'Stats', 'stats_iframe');
}

// Hook into the 'wp_dashboard_setup' action to register our other functions';
add_action('wp_dashboard_setup', 'launch_effect_stats' );

?>
