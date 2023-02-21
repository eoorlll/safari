<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pineparks-test
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	
	<header class="section header">
        <div class="container header__container">
            <div class="logo">
                <a href="<?php echo get_home_url(); ?>">
                    <?php 
					$header__logo = get_field('header__logo', 'option');
					if( !empty( $header__logo ) ): ?>
						<img src="<?php echo esc_url($header__logo['url']); ?>" alt="<?php echo esc_attr($header__logo['alt']); ?>" />
					<?php endif; ?>
                </a>
            </div>
            <nav class="menu header__menu hide-on-mobile">
				<?php 
				$header__menu = get_field( 'header__menu', 'option');

				wp_nav_menu(array(
					'menu' => $header__menu, 
					'items_wrap' => '<ul class="menu__list">%3$s</ul>', 
					'walker' => new mainMenu(), 
					'container'=>false 
				)); ?>
            </nav>
            <div class="btn-wrap header__btn">
                <a href="<?php the_field('header__button_link', 'option') ?>" class="btn hide-on-mobile"><?php the_field('header__button_text', 'option') ?></a>
                <div class="hamburger show-on-mobile">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </header>

    <div class="mobile-menu-modal">
        <nav class="menu menu--mobile">
            <?php 
			$header__menu = get_field( 'header__menu', 'option');

			wp_nav_menu(array(
				'menu' => $header__menu, 
				'items_wrap' => '<ul class="menu__list">%3$s</ul>', 
				'walker' => new mainMenu(), 
				'container'=>false 
			)); ?>
        </nav>
    </div>
	
