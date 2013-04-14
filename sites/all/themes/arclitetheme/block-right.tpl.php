<?php
// $Id: block-right.tpl.php,v 1.1 2009/12/20 06:22:45 blagoj Exp $
?>
<li class="block widget block-<?php print $block->module ?>" id="block-<?php print $block->module .'-'. $block->delta; ?>">
  <div class="box">
    <div class="wrapleft">
      <div class="wrapright">
        <div class="tr">
          <div class="bl">
            <div class="tl">
              <div class="br the-content">
                <?php if ($block->subject): ?>
                  <div class="titlewrap"><h4><span><?php print $block->subject; ?></span></h4></div>
                <?php endif ?>
                <?php print $block->content; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</li>
