<?php
/**
 * Main Menu Walker
 */

class mainMenu extends Walker_Nav_Menu {
    // Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= '<ul class="menu__drop-children">';
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= '</ul>';
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu__item--' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		
		if($args->walker->has_children)
        {
        $output .= '<li class="menu__item menu__has-children '.esc_attr($class_names).'">
                        <div class="menu__parent-wrap">
                            <div class="menu__parent-url-wrap">
                                <a href="'.$item->url.'" class="menu__url menu__parent-url">'.$item->title.'</a>
                                <button class="menu__parent-url-icon btn-reset"></button>
                            </div>
                        </div>';
        }  else {
		$output .= '<li class="menu__item '.esc_attr($class_names).'">
                        <a class="menu__url" href="'.$item->url.'">'.$item->title.'</a>
                    ';
		}

	}
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</li>";
	}
}