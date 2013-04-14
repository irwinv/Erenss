<?php
// $Id: block-footer.tpl.php,v 1.1 2009/12/20 06:22:45 blagoj Exp $
?>
<li class="block widget block-<?php print $block->module ?>" id="block-<?php print $block->module .'-'. $block->delta; ?>">
  <div class="the-content">
    <?php if ($block->subject): ?>
      <h6 class="title"><?php print $block->subject; ?></h6>
    <?php endif; ?>
    <?php print $block->content; ?>
  </div>
</li>
