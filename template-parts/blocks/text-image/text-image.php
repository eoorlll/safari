<?php
/**
 * Text and Image Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>
<section class="section text-image-section">
	<div class="container">
		<div class="text-image <?php echo get_field("reverse") ? 'text-image--reverse' : '' ; ?>">
			<div class="text-image__image">
				<?php 
				$image = get_field('image');
				if( !empty( $image ) ): ?>
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>
			</div>
			<div class="text-image__content">
				<h3 class="text-image__subtitle section-subtitle"><?php the_field( 'subtitle' ) ?></h3>
				<h2 class="text-image__title"><?php the_field( 'title' ) ?></h2>
				<div class="text-image__indicators grid grid--col-2">
					<?php if( have_rows('indicators') ):
						while( have_rows('indicators') ): the_row(); ?>
							<div class="indicator <?php echo get_sub_field("show_only_on_mobile") ? 'show-on-mobile show-on-mobile--flex' : '' ; ?>">
								<span><?php the_sub_field( 'indicator' ) ?></span>
								<small><?php the_sub_field( 'text' ) ?></small>
							</div>
						<?php endwhile;
					endif; ?>
				</div>
				<div class="text-image__calculator hide-on-mobile">
					<div class="calculator-title"><?php the_field( 'calculator_title' ) ?></div>
					<form class="calculator-form grid grid--col-3" action="<?php echo get_home_url(); ?>/wp-admin/admin-ajax.php">
						<input type="number" name="calculator-start" value="0">
						<select name="calculator-operator">
							<option value="+">+</option>
							<option value="-">-</option>
							<option value="*">*</option>
							<option value="/">/</option>
						</select>
						<input type="number" name="calculator-end" value="0">
						<input type="hidden" name="action" value="calculator">
					</form>
					<div class="calculator-result">Result: <strong id="calculator-result">0</strong></div>
				</div>
			</div>
		</div>
	</div>
</section>