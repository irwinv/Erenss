<?php
// $Id $
?>
<div class="blogPost">
  <div class="date"><?php print $nodesubmited;?></div>
  <h1><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h1>
  <div class="meta"> 
  	By <span class="author"><?php print $name; ?></span> //
    <?php print $terms ?> // 
    <a class="meta-comments" href="<?php print $node_url.'#comments'; ?>" title="<?php print $title; ?>"><?php print $node->comment_count; ?> Comments</a>
  </div>
  <?php print $content;?>
<?php if ($page == 0){ ?>
  <a class="more-link" href="<?php print $node_url; ?>"></a>
<?php } ?>
</div>