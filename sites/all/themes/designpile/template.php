<?php
// $Id$
/**
 * Initialize theme settings
 */
if (is_null(theme_get_setting('user_notverified_display')) || theme_get_setting('rebuild_registry')) {
	
	// Auto-rebuild the theme registry during theme development.
	if(theme_get_setting('rebuild_registry')) {
		drupal_set_message(t('The theme registry has been rebuilt. <a href="!link">Turn off</a> this feature on production websites.', array('!link' => url('admin/build/themes/settings/' . $GLOBALS['theme']))), 'warning');
	}
	
	global $theme_key;
  
	/**
   * The default values for the theme variables.
   * Matches with $defaults in the template.php file.
   */
	$defaults = array(
    	'google_analytics_id'				=> '',
		'twitter_username'					=> '',
		'facebook_link'						=> '',
		'rss_link'							=> '',
		'theme_color_scheme'				=> 'pink',
	);
	
	// Force refresh of Drupal internals
  	theme_get_setting('', TRUE);
}
/**
 * Override or insert PHPTemplate variables into the templates.
 */
function phptemplate_preprocess_page(&$vars) {
	$vars['theme_path'] = path_to_theme().'/';
	$vars['theme_basepath'] = base_path().path_to_theme().'/';
	$vars['tabs2'] = menu_secondary_local_tasks();
	
	if (isset($vars['node'])) {
		if ($vars['node']) {$vars['title'] = "";}
	}
	$classes = explode(' ', $vars['body_classes']);
	// Remove the mostly useless page-ARG0 class.
  if ($index = array_search(preg_replace('![^abcdefghijklmnopqrstuvwxyz0-9-_]+!s', '', 'page-'. drupal_strtolower(arg(0))), $classes)) {
    unset($classes[$index]);
  }
  if (!$vars['is_front']) {
    // Add unique class for each page.
    $path = drupal_get_path_alias($_GET['q']);
    $classes[] = zen_id_safe('page-' . $path);
    // Add unique class for each website section.
    list($section, ) = explode('/', $path, 2);
    if (arg(0) == 'node') {
      if (arg(1) == 'add') {
        $section = 'node-add';
      }
      elseif (is_numeric(arg(1)) && (arg(2) == 'edit' || arg(2) == 'delete')) {
        $section = 'node-' . arg(2);
		
      }
    }
    $classes[] = zen_id_safe('section-' . $section);
  }

	$vars['body_classes_array'] = $classes;
	$vars['body_classes'] = implode(' ', $classes); // Concatenate with spaces.
	
	$vars['theme_color_scheme'] = theme_get_setting('theme_color_scheme');
	$vars['twitter_username'] = theme_get_setting('twitter_username');
	$vars['facebook_link'] = theme_get_setting('facebook_link');
	$vars['rss_link'] = theme_get_setting('rss_link');
	if (theme_get_setting('google_analytics_id')) {
		$vars['closure'] .= "\n".'<script type="text/javascript">
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
			</script>
			<script type="text/javascript">
			try {
			var pageTracker = _gat._getTracker("'.theme_get_setting('google_analytics_id').'");
			pageTracker._trackPageview();
			} catch(err) {}</script>';
		}
 
}



/**
 * Override or insert PHPTemplate variables into the templates.
 */
function phptemplate_preprocess_node(&$vars) {
	$vars['theme_path'] = path_to_theme().'/';
	$vars['theme_basepath'] = base_path().path_to_theme().'/';
	
	$node = $vars['node'];
	$vars['nodesubmited'] = format_date($node->created, 'custom', 'M').'<br /><span>'.format_date($node->created, 'custom', 'j').'</span>';
}


/**
 * Generates IE6 CSS fix png
 */
function phptemplate_get_ie_fix() {
	$theme_path = base_path().path_to_theme();
	$iefix = '<!--[if lte IE 6]>
<script type="text/javascript" src="'.$theme_path.'/js/DD_belatedPNG.js"></script>
<script type="text/javascript">DD_belatedPNG.fix(\'*\');</script>
<link rel="stylesheet" media="screen" href="'.$theme_path.'ie6.css"/>
<![endif]-->';
	return $iefix;
}

/**
 * Converts a string to a suitable html ID attribute.
 *
 * http://www.w3.org/TR/html4/struct/global.html#h-7.5.2 specifies what makes a
 * valid ID attribute in HTML. This function:
 *
 * - Ensure an ID starts with an alpha character by optionally adding an 'id'.
 * - Replaces any character except alphanumeric characters with dashes.
 * - Converts entire string to lowercase.
 *
 * @param $string
 *   The string
 * @return
 *   The converted string
 */
function zen_id_safe($string) {
  // Replace with dashes anything that isn't A-Z, numbers, dashes, or underscores.
  return strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', $string));
}