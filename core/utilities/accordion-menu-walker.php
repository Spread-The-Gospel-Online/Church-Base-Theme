<?php

class CHRCH_Accordion_Menu_Walker extends Walker_Nav_Menu {

	function start_lvl (&$output, $depth = 0, $args = array()) {
        $output .= '<ul class="accordion-menu__sub-menu">';
    }

    function end_el (&$output, $data_object, $depth = 0, $args = null) {
    	$is_parent = $args->walker->has_children;
    	if (!empty($data_object->classes) && is_array($data_object->classes) && in_array('menu-item-has-children', $data_object->classes)) {
    		$is_parent = true;
		}

    	if ($depth == 0 && $is_parent) {
    		$output .= '</details>';
    	}
    }

	function start_el (&$output, $item, $depth = 0, $args = [], $id = 0) {
		$is_parent = $args->walker->has_children;
		$extra_classes = $is_parent ? ' ' . 'accordion-menu__item--parent' : '';
		$output .= '<li class="' . 'accordion-menu__item' . $extra_classes . '">';
 	
		if ($depth == 0 && $is_parent) {
			$output .= '<details><summary>';
		}

		$output .= '<span class="accordion-menu__item-label">';

		if ($item->url && $item->url != '#' && ($depth > 0 || !$is_parent)) {
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
 
		if ($depth == 0 && $is_parent) {
			$output .= '<svg class="item-icon" style="width: 1em;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>';
		}

		$output .= '</span>';

		if ($depth == 0 && $is_parent) {
			$output .= '</summary>';
		}
	}

}