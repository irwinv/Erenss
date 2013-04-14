<?php
// $Id: page.tpl.php,v 1.1 2009/12/20 06:22:45 blagoj Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head profile="http://gmpg.org/xfn/11">

<title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>

<link rel="shortcut icon" href="<?php print base_path() . path_to_theme(); ?>/favicon.ico" />

<!--[if lte IE 6]>
  <style type="text/css" media="screen">
    @import "<?php print base_path() . path_to_theme(); ?>/ie6.css";
  </style>
<![endif]-->

</head>
<body class="home <?php print $body_classes; ?>">
 <!-- page wrap -->
  <div id="page" class="with-sidebar">
  <!-- header -->
    <div id="header-wrap">
      <div id="header" class="block-content">
        <div id="pagetitle" class="clearfix">
          <h1 class="logo"><a href="<?php print $front_page; ?>"><?php print $site_name; ?></a></h1>    
          <h4><?php print $site_slogan; ?></h4>
          
          <!-- search form -->
          <?php if ($search_box): ?>
            <div class="search-block">
              <div class="searchform-wrap">
                <?php print $search_box; ?>
              </div>
            </div>
          <?php endif; ?>
        </div>

        <!-- main navigation -->
        <div id="nav-wrap1">
          <div id="nav-wrap2">
            <?php if ($p_links): ?>
              <ul id="nav">
                <?php print $p_links; ?>
              </ul>
            <?php endif ?>   
          </div>
        </div>
     <!-- /main navigation -->
      </div>
    </div>
  <!-- /header -->
  <!-- main wrappers -->
  <div id="main-wrap1">
    <div id="main-wrap2">
      <!-- main page block -->
      <div id="main" class="block-content clearfix">
        <div class="mask-main rightdiv">
          <div class="mask-left">
            <!-- first column -->
            <div class="col1">
              <div id="main-content">     
                <?php if (!empty($breadcrumb)): ?><div class="drupal-breadcrumb"><?php print $breadcrumb; ?></div><?php endif; ?>
                <?php if (!empty($title) && empty($node)): ?><h2 class="topTitle"><?php print $title; ?></h2><?php endif; ?>
                <?php if (!empty($tabs)): ?><div class="tabbed-content post-tabs"><div class="tabs-wrap"><?php print $tabs; ?></div><div class="clear"></div></div><?php endif; ?>
                <?php if (!empty($messages)): print $messages; endif; ?>
	            <?php if (!empty($help)): print $help; endif; ?>
                <?php if ($is_front && !empty($mission)): ?>
                  <div class="navigation clearfix" id="pagenavi">
                    <div class="alignleft"><a><?php print $mission; ?></a></div>
                    <div class="alignright"></div>
                    <div class="clear-block"></div>
                  </div>
                <?php endif; ?>
                <?php print $content; ?>  
              </div>
            </div>
            <!-- /first column -->
            <!-- 2nd column (sidebar) -->
            <div class="col2">
              <?php if ($right): ?>
                <ul id="sidebar">    
                  <?php print $right; ?>
                </ul>
              <?php endif; ?>
            </div>
            <!-- /2nd column -->
          </div>
        </div>
      </div>
      <!-- /main page block -->
    </div>
  </div>
  <!-- /main wrappers -->
  <!-- footer -->
  <div id="footer">
    <!-- page block -->
    <div class="block-content">
      <!-- footer widgets -->
      <?php if ($footer): ?>
        <ul id="footer-widgets" class="widgetcount-3 clearfix">
          <?php print $footer; ?>       
        </ul>
      <?php endif; ?>
<!-- /footer widgets -->
      <div class="copyright">
         <p>
           <?php print $footer_msg; ?> | <?php print $footer_message ?><br />
           <!-- please do not remove this. respect the authors :) -->
           <a href="http://topdrupalthemes.net/theme/arclitetheme">Arclite drupal theme</a> by <a href="http://digitalnature.ro">digitalnature</a>. | <a href="http://topdrupalthemes.net">Drupal Themes</a> 
         </p>
         <p>
           <?php print $feed_icons ?> <a href="#" class="toplink">TOP</a>
         </p>
      </div>
      
    </div>
  <!-- /page block -->
  </div>
 <!-- /footer -->
</div>
<!-- /page -->
<?php print $closure; ?>
</body>
</html>