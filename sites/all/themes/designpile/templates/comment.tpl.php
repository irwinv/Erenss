<?php
// $Id$
?>

<div class="comment<?php print ($comment->new) ? ' comment-new' : ''; print ' '. $status?>">
<?php print $picture ?>
  <div class="comment-meta">
  	<?php print $submitted; ?>
  </div>
  <div class="text">
  	<?php print $content; ?>
    <?php if ($signature): ?>
    <div class="user-signature clear-block">
      <?php print $signature; ?>
    </div>
    <?php endif; ?>
  </div>
  <?php if ($links): ?>
  <div class="reply"><?php print $links ?></div>
  <?php endif; ?>
    

</div>
