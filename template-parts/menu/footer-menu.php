<?php
/**
 * Main Menu Walker
 */

class footerMenu extends Walker_Nav_Menu {
    // Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= '<ul class="footer-menu__drop-children">';
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= '</ul>';
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'footer-menu__item--' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		
		if($args->walker->has_children)
        {
        $output .= '<li class="footer-menu__item footer-menu__has-children '.esc_attr($class_names).'">
                        <div class="footer-menu__parent-wrap">
                            <div class="footer-menu__parent-url-wrap">
                                <a href="'.$item->url.'" class="footer-menu__url footer-menu__parent-url">'.$item->title.'</a>
                                <button class="footer-menu__parent-url-icon btn-reset"></button>
                            </div>
                        </div>';
        }  else {
		$output .= '<li class="footer-menu__item '.esc_attr($class_names).'">
                        <a class="footer-menu__url" href="'.$item->url.'">'.$item->title.'</a>
                    ';
		}

	}
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</li>";
	}
}