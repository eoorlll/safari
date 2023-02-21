<?php
/**
 * Hero Block Template.
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
<section class="section faq-section">
        <div class="container section-container">
            <div class="section-header">
                <h3 class="section-subtitle"><?php the_field( 'subtitle' ) ?></h3>
                <h2 class="text-image__title"><?php the_field( 'title' ) ?></h2>
            </div>
            <div class="section-content">
				<?php if( have_rows('accordion') ):
					while( have_rows('accordion') ): the_row(); ?>
						<div class="accordion">
							<button class="accordion__head btn-reset">
								<span class="accordion__text"><?php the_sub_field( 'question' ) ?></span>
								<span class="accordion__plus"></span>
							</button>
							<div class="accordion__content"><?php the_sub_field( 'answer' ) ?></div>
						</div>
					<?php endwhile;
				endif; ?>
            </div>
        </div>
    </section>