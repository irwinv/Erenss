<?php
// $Id$
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <link type="text/css" rel="stylesheet" media="all" href="<?php print $theme_basepath; ?>css/<?php print $theme_color_scheme; ?>.css" />
    <?php print $scripts ?>
<?php print phptemplate_get_ie_fix(); ?>
</head>
<body class="<?php print $body_classes; ?>">
<div id="mainWrapper">
  <div id="wrapper">
    <div id="header">
      <div id="getSocial"></div>
      <?php
		// Prepare header
		$site_fields = array();
		if ($site_name) {
		$site_fields[] = check_plain($site_name);
		}
		if ($site_slogan) {
		$site_fields[] = check_plain($site_slogan);
		}
		$site_title = implode(' ', $site_fields);
	  ?>
		<div id="logo"><a href="<?php print check_url($front_page);?>" title="<?php print $site_title;?>">
		<?php 
		if ($logo) {
			print '<img src="'. check_url($logo) .'" alt="'. $site_title .'" />';
		} else {
			print '<img src="'. $theme_basepath .'images/logo.png" alt="'. $site_title .'" />';
		}?>
		</a></div>
        <?php if (isset($primary_links)) : ?>
        <div id="topMenuCont" class="clearfix">
        <?php print theme('links', $primary_links, array('class' => 'clearfix')) ?>
        </div><!-- // top menu -->
        <?php endif; ?>
      <ul id="socialLinks">
            <li> <a href="http://www.twitter.com/<?php print $twitter_username;?>" title="Twitter"><img src="<?php print $theme_basepath;?>images/ico_twitter.png" alt="Twitter" /></a></li>
            <li> <a href="http://www.facebook.com/<?php print $facebook_link;?>" title="Facebook"><img src="<?php print $theme_basepath;?>images/ico_facebook.png" alt="Facebook" /></a></li>
            <li><a href="<?php print $rss_link;?>" title="RSS" class="rssTag"><img src="<?php print $theme_basepath;?>images/ico_rss.png" alt="Feeds" /></a></li>
        </ul><!-- // social links -->
    </div><!-- // header -->
    <div id="content" class="clearfix">
      <div id="colLeft">
      	<div id="colLeftInner" class="clearfix">
        	<?php print $content_top; ?>
			<?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
            <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
            <?php if ($title): print '<h1'. ($tabs ? ' class="title with-tabs"' : ' class="title"') .'>'. $title .'</h1>'; endif; ?>
            <?php if ($tabs): print $tabs .'</div>'; endif; ?>
            <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
            <?php if ($show_messages && $messages): print $messages; endif; ?>
            <?php print $help; ?>
            <?php print $content; ?>
            <?php print $content_bottom; ?>
         </div>
      </div><!-- // colleft -->
      <div id="colRight">
      	<?php if ($search_box): ?><div id="searchBox" class="clearfix"><?php print $search_box ?></div><?php endif; ?>
          <?php print $right; ?>
      </div><!-- // colRight -->
    </div><!-- // content -->
  </div><!-- // wrapper -->
  <div id="footer">
    <div id="footerInner"><div class="clearfix">
 		<?php print $block_footer; ?>
    </div></div>
  </div>
  <div id="copyright">
    <div id="copyrightInner"> &copy; 2010 <a href="http://abthemes.com" target="_blank">designpile</a>. All Right Reserved.
      <div id="site5bottom"><a href="http://www.site5.com/resellers" target="_blank"><img src="<?php print $theme_basepath; ?>images/site5bottom.png" alt="Site5 | Experts in Reseller Hosting." /></a></div>
    </div>
  </div><!-- // footer -->
</div><!-- // mainWrapper -->
<?php print $closure; ?>
</body>
</html>