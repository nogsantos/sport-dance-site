<?php
/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. You can add new regions for block content, modify
 *   or override Drupal's theme functions, intercept or make additional
 *   variables available to your theme, and create custom PHP logic. For more
 *   information, please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/theme-guide
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   The Drupal theme system uses special theme functions to generate HTML
 *   output automatically. Often we wish to customize this HTML output. To do
 *   this, we have to override the theme function. You have to first find the
 *   theme function that generates the output, and then "catch" it and modify it
 *   here. The easiest way to do it is to copy the original function in its
 *   entirety and paste it here, changing the prefix from theme_ to sportdance_.
 *   For example:
 *
 *     original: theme_breadcrumb()
 *     theme override: sportdance_breadcrumb()
 *
 *   where sportdance is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_breadcrumb() function.
 *
 *   If you would like to override any of the theme functions used in Zen core,
 *   you should first look at how Zen core implements those functions:
 *     theme_breadcrumbs()      in zen/template.php
 *     theme_menu_item_link()   in zen/template.php
 *     theme_menu_local_tasks() in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called template suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node-forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and template suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440
 *   and http://drupal.org/node/190815#template-suggestions
 */


/**
 * Implementation of HOOK_theme().
 */
function sportdance_theme(&$existing, $type, $theme, $path) {
  $hooks = zen_theme($existing, $type, $theme, $path);
  
  // Add your theme hooks like this:
  /*
  $hooks['hook_name_here'] = array( // Details go here );
  */
  // @TODO: Needs detailed comments. Patches welcome!
  return $hooks;
}

/**
 * Override or insert variables into all templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered (name of the .tpl.php file.)
 */

function sportdance_preprocess(&$vars, $hook) {
    if(drupal_is_front_page()){
        drupal_add_css(drupal_get_path("theme", "sportdance")."/css/bem-vindo.css");
        drupal_add_css(drupal_get_path("theme", "sportdance")."/css/dicas-musicas.css");
    }
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/*
function sportdance_preprocess_page(&$vars, $hook) {
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/*
function sportdance_preprocess_node(&$vars, $hook) {
    
}
/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function sportdance_preprocess_comment(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function sportdance_preprocess_block(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */
// */
//********************************************
// MENU
//********************************************
/**
 * Returns a rendered menu tree.
 *
 * @param $tree
 *   A data structure representing the tree as returned from menu_tree_data.
 * @return
 *   The rendered HTML of that data structure.
 */
function main_menu_tree_output($tree) {
    $output = '';
    $items = array();
    foreach ($tree as $data) {
        if (!$data['link']['hidden']) {
            $items[] = $data;
        }
    }
    $num_items = count($items);
    foreach ($items as $i => $data) {
        $extra_class = NULL;
        if (stristr($i, 'active')) {
            $extra_class .= "parent";
        }
        if ($i == 0) {
            $extra_class = 'first';
        }
        if ($i == $num_items - 1) {
            $extra_class = 'last';
        }
        $link = main_menu_item_link($data['link']);
        if ($data['below']){
            $extra_class = "parent ";
            if (theme_get_setting(menu_type) == "splitmenu") {
                $output .= main_menu_item($link, $data['link']['has_children'], '', $data['link']['in_active_trail'], $extra_class);
            } else {
                $output .= main_menu_item($link, $data['link']['has_children'], sub_menu_tree_output($data['below']), $data['link']['in_active_trail'], $extra_class);
            }
        } else {
            $output .= main_menu_item($link, $data['link']['has_children'], '', $data['link']['in_active_trail'], $extra_class);
        }
    }
    return $output ? main_menu_tree($output) : '';
}
function sub_menu_tree_output($tree) {
    $output = '';
    $items = array();
    foreach ($tree as $data) {
        if (!$data['link']['hidden']) {
            $items[] = $data;
        }
    }
    $num_items = count($items);
    foreach ($items as $i => $data) {
        $extra_class = NULL;
        if ($i == 0) {
            $extra_class = 'first';
        }
        if ($i == $num_items - 1) {
            $extra_class = 'last';
        }else{
            $extra_class = 'parent';
        }
        $link = sub_menu_item_link($data['link']);
        if ($data['below']) {
            $extra_class = " normal ";
            $output .= sub_menu_item($link, $data['link']['has_children'], sub_menu_tree_output($data['below']), $data['link']['in_active_trail'], $extra_class);
        } else {
            $output .= sub_menu_item($link, $data['link']['has_children'], '', $data['link']['in_active_trail'], $extra_class);
        }
    }
    return $output ? sub_menu_tree($output) : '';
}
/**
 * FULL MENU TREE
 */
function main_menu_tree($tree) {
    return '<ul class="menu">'. $tree .'</ul>';
}
/**
 * SUB MENU TREE
 */
function sub_menu_tree($tree) {
    return '<div><ul>'. $tree .'</ul></div>';
}
/**
  * MENU ITEM 
 */
function main_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
    $class = "";
    if (!empty($extra_class)) {
        $class .= $extra_class;
    }else{
        $class .= 'parent';
    }
    return '<li>' . $link . $menu . "</li>\n";
}
/**
  * SUB MENU ITEM 
 */
function sub_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
    $class = "";
    if (!empty($extra_class)) {
        $class .= $extra_class;
    }else{
        $class .= 'parent';
    }
    return '<li>' . $link . $menu . "</li>\n";
}
/**
 * Generate the HTML output for a single menu link.
 *
 * @ingroup themeable
 */
function main_menu_item_link($link) {
    if (empty($link['localized_options'])) {
        $link['localized_options'] = array();
    }
    if (strlen(strstr($link['href'], "http")) > 0) {
        $href = $link['href'];
    } else {
        if (variable_get('clean_url', 0)) {
            $href = $link['href'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($link['href']);
        } else {
            $href = $link['href'] == "<front>" ? base_path() : base_path() . "?q=" . drupal_get_path_alias($link['href']);
        }
    }
    $this_link = "<a href='" . $href . "'><span>" . $link['title'] . "</span></a>";

    return $this_link;
}
function sub_menu_item_link($link) {
  if (empty($link['localized_options'])) {
        $link['localized_options'] = array();
    }
    if (strlen(strstr($link['href'], "http")) > 0) {
        $href = $link['href'];
    } else {
        if (variable_get('clean_url', 0)) {
            $href = $link['href'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($link['href']);
        } else {
            $href = $link['href'] == "<front>" ? base_path() : base_path() . "?q=" . drupal_get_path_alias($link['href']);
        }
    }
    $this_link = "<a href='" . $href . "'><span>" . $link['title'] . "</span></a>";

    return $this_link;
}
//******************************************************************************