<?php
// $Id$

/**
* Implementation of THEMEHOOK_settings() function.
*
* @param $saved_settings
*   array An array of saved settings for this theme.
* @return
*   array A form array.
*/
function phptemplate_settings($saved_settings) {
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
	
	 // Merge the saved variables and their default values
	$settings = array_merge($defaults, $saved_settings);
	
	// Create theme settings form widgets using Forms API
	// General Settings
	$form['ab_container']['general_settings'] = array(
		'#type' => 'fieldset',
		'#title' => t('General settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
		'#attributes' => array('class' => 'general_settings'),
	);
	
	$form['ab_container']['general_settings']['theme_color_scheme'] = array(
      '#type'          => 'select',
      '#title'         => t('Theme color scheme'),
      '#default_value' => $settings['theme_color_scheme'],
	  '#options'       => array(
                          'pink'   => t('pink.css'),
                          'green' => t('green.css'),
                          'blue'    => t('blue.css'),
                        ),
    );
	$form['ab_container']['general_settings']['google_analytics_id'] = array(
      '#type'          => 'textfield',
      '#title'         => t('Google analytics ID'),
      '#default_value' => $settings['google_analytics_id'],
      '#description'   => t('Insert Google analytics ID'),
    );
	
	// Social Settings
	$form['ab_container']['social_settings'] = array(
		'#type' => 'fieldset',
		'#title' => t('Social settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
		'#attributes' => array('class' => 'social_settings'),
	);
	
	$form['ab_container']['social_settings']['twitter_username'] = array(
      '#type'          => 'textfield',
      '#title'         => t('Twitter username'),
      '#default_value' => $settings['twitter_username'],
      '#description'   => t('Insert your twitter username'),
    );
	$form['ab_container']['social_settings']['facebook_link'] = array(
      '#type'          => 'textfield',
      '#title'         => t('Facebook link'),
      '#default_value' => $settings['facebook_link'],
      '#description'   => t('Insert your facebook link without http://facebook.com/'),
    );
	$form['ab_container']['social_settings']['rss_link'] = array(
      '#type'          => 'textfield',
      '#title'         => t('RSS link'),
      '#default_value' => $settings['rss_link'],
      '#description'   => t('Insert your rss link'),
    );
	
	
	// Return theme settings form
	return $form;
}