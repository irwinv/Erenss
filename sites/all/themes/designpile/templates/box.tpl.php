<?php
// $Id

/**
 * @file box.tpl.php
 * Theme implementation to display a box.
 *
 * Available variables:
 * - $title: Box title.
 * - $content: Box content.
 *
 * @see template_preprocess()
 */
?>
<div class="box">
  <?php if ($title): ?>
    <h2 class="boxtitle"><?php print $title ?></h2>
  <?php endif; ?>
  <?php print $content ?>
</div> <!-- /box -->