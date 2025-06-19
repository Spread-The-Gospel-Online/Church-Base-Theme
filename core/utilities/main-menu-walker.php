<?php

class CHRCH_Menu_Walker extends Walker_Nav_Menu {

	function start_lvl (&$output, $depth = 0, $args = array()) {
		$menu_alignment = get_option('header_menu_alignment', 'middle');
		$main_class = apply_filters('church-menu-main-class', 'main-menu');
        $extra_classes = 'main-menu__sub-menu--' . $menu_alignment;        
        $output .= '<ul class="' . $main_class . '__sub-menu ' . $extra_classes . '">';
    }

	function start_el (&$output, $item, $depth=0, $args=[], $id=0) {
		$main_class = apply_filters('church-menu-main-class', 'main-menu');
		$is_parent = $args->walker->has_children;
		$extra_classes = $is_parent ? ' ' . $main_class . '__item--parent' : '';
		$output .= '<li class="' . $main_class . '__item' . $extra_classes . '"><span class="' . $main_class . '__item-label">';
 
		if ($item->url && $item->url != '#') {
			$target_attribute = wp_is_internal_link($item->url) ? '' : ' target="_blank"';
			$output .= '<a href="' . $item->url . '"' . $target_attribute . '>';
		} else {
			$output .= '<span>';
		}

		$output .= $item->title;

		if ($item->url && $item->url != '#') {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}
 
		if ($is_parent) {
			$output .= '<svg class="item-icon" style="width: 1em;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>';
		}

		$output .= '</span>';
	}

}