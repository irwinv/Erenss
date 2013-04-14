<?php
// $Id: template.php,v 1.1 2009/12/20 06:22:45 blagoj Exp $

function arclitetheme_preprocess_page(&$vars) {
  $vars['footer_msg'] = ' &copy; ' . $vars['site_name'] . ' ' . date('Y');
  $vars['search_box'] = str_replace(t('Search this site: '), '', $vars['search_box']);

  $vars['p_links'] = '';
  if(!empty($vars['primary_links'])) {

    foreach ($vars['primary_links'] as $link) {
      $link_current = '';
      $attributes = 'class="page_item"';

      $href_attributes = 'class="fadeThis"';
      $href = url($link['href']);

      if ($link['href'] == '<front>') {
        $attributes = 'id="nav-homelink"';

        if (drupal_is_front_page())
        $attributes .= ' class="current_page_item"';

        $href_attributes = 'class="fadeThis"';

      }

      if($link['href'] == $_GET['q']) {
        $attributes = 'class="current_page_item fadeThis"';
      }
      $vars['p_links'] .= '<li ' . $attributes . '><a ' . $href_attributes . ' href="' . $href . '" ><span>' . $link['title'] . '</span></a></li>';
    }
  }
}

function arclitetheme_preprocess_node(&$vars) {
  $vars['post_day'] = format_date($vars['node']->created, 'custom', 'd');
  $vars['post_month'] = format_date($vars['node']->created, 'custom', 'M');
  $vars['author'] = theme('username', $vars['node']);
  if ($vars['author'])
  $vars['posted_by'] = t('By') . ' ' . $vars['author'];
}

function arclitetheme_preprocess_comment_wrapper(&$vars) {
  $node = $vars['node'];
  $vars['header'] = t('<strong>!count comments</strong> on %title', array('!count' => $node->comment_count, '%title' => $node->title));
}

function arclitetheme_preprocess_comment(&$vars) {
  $vars['classes'] = array('comment');
  if ($vars['zebra'] == 'even') {
    $vars['classes'][] = 'alt';
  }
  $vars['classes'] = implode(' ', $vars['classes']);
}

function arclitetheme_fix_tags($terms, $separator = ' ') {
  $output = '';
  if (is_array($terms)) {
    $links = array();

    foreach ($terms as $term) {
      $links[] = l($term->name, taxonomy_term_path($term), array('rel' => 'tag', 'title' => strip_tags($term->description)));
    }

    $output .= implode($separator, $links);
  }

  return $output;
}

function arclitetheme_fix_post_links($links, $separator = ' ') {
  $r = array();
  foreach($links as $link) {
    $r[] = '<a href="' . url($link['href']) . (!empty($link['fragment']) ? '#' . $link['fragment'] : '') . '" ' . arclitetheme_link_attributes($link['attributes']) . ' >' . $link['title'] . '</a>';
  }

  $r = implode($separator, $r);
  return $r;
}

function arclitetheme_link_attributes($attributes) {
  $r = ' ';
  if (is_array($attributes)) {
    foreach ($attributes as $key => $value) {
      $r .= $key . '="' . $value . '" ';
    }
  }
  return $r;
}



function arclitetheme_search_theme_form($form) {
  $form['submit']['#type'] = 'button';
  $form['submit']['#attributes']['class'] = 'go';
  $form['submit']['#value'] = t('Go');
  $form['search_theme_form']['#attributes']['class'] = 'searchfield';
  $form['search_theme_form']['#title'] = t('');
  return drupal_render($form);
}

