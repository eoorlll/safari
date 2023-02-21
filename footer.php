<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pineparks-test
 */

?>

<footer class="section footer">
    <div class="footer-content">
        <div class="container footer__container">
            <div class="footer-col">
                <div class="logo footer-logo">
                    <a href="<?php echo get_home_url(); ?>">
                        <?php 
						$footer__logo = get_field('footer__logo', 'option');
						if( !empty( $footer__logo ) ): ?>
							<img src="<?php echo esc_url($footer__logo['url']); ?>" alt="<?php echo esc_attr($footer__logo['alt']); ?>" />
						<?php endif; ?>
                    </a>
                </div>
            </div>
            <div class="footer-col footer-menus-wrap">
				<?php if( have_rows('menus', 'option') ):
					while( have_rows('menus', 'option') ): the_row(); ?>
						<nav class="footer-menu">
							<h3 class="footer-menu__title"><?php the_sub_field('title', 'option') ?></h3>
							<?php 
							$menu = get_sub_field( 'menu', 'option');

							wp_nav_menu(array(
								'menu' => $menu, 
								'items_wrap' => '<ul class="footer-menu__list">%3$s</ul>', 
								'walker' => new footerMenu(), 
								'container'=>false 
							)); ?>
						</nav>
					<?php endwhile;
				endif; ?>
				<div class="footer__btn btn-wrap">
					<a href="<?php the_field('footer__button_link', 'option') ?>" class="btn btn--white"><?php the_field('footer__button_text', 'option') ?></a>
				</div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container footer-bottom__container">
            <nav class="footer-links">
                <ul class="footer-links__list">
                    <li><p><?php the_field('copyright', 'option') ?></p></li>
					<?php if( have_rows('bottom_links', 'option') ):
						while( have_rows('bottom_links', 'option') ): the_row(); ?>
							<li><a href="<?php the_sub_field('link', 'option') ?>"><?php the_sub_field('label', 'option') ?></a></li>
						<?php endwhile;
					endif; ?>
                </ul>
            </nav>
            <div class="socials footer-socials">
				<?php if( have_rows('socials', 'option') ): ?>
					<ul class="socials__list">
					<?php while( have_rows('socials', 'option') ): the_row(); ?>
						<li><a href="<?php the_sub_field('link', 'option') ?>">
							<?php 
							$icon = get_sub_field('icon', 'option');
							if( !empty( $icon ) ): ?>
								<img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
							<?php endif; ?>
						</a></li>
					<?php endwhile; ?>
					</ul>
				<?php endif; ?>                
            </div>
        </div>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
