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

<?php 
$totalSlides = count(get_field('slides'));
if( have_rows('slides') ): ?>
		<section id="hero" class="hero">
			<div class="swiper-wrapper">
				<?php while( have_rows('slides') ): the_row(); ?>
					<div class="swiper-slide">
						<div class="hero-slide" style="background-image: url(<?php the_sub_field( 'image' ) ?>)">
							<div class="container hero-slide__container">
								<div class="row hero-slide__row">
									<h1 class="hero-slide__title"><?php the_sub_field( 'title' ) ?></h1>
									<div class="hero-slide__text">
										<p><?php the_sub_field( 'text' ) ?></p>
									</div>
									<div class="hero-slide__btn btn-wrap">
										<a href="<?php the_sub_field( 'button_url' ) ?>" class="btn btn--white"><?php the_sub_field( 'button_text' ) ?></a>
									</div>
									<?php if( have_rows('check_list') ): ?>
										<div class="hero-slide__list">
											<ul class="check-list">
											<?php while( have_rows('check_list') ): the_row(); ?>
												<li><?php the_sub_field( 'text' ) ?></li>
											<?php endwhile; ?>
											</ul>
										</div>
									<?php endif; ?>										
								</div>
								<div class="hero-slide__navigation">
									<div class="slider-count hide-on-mobile">
										<span><?php echo get_row_index() < 9 ? '0' . get_row_index() : get_row_index() ; ?></span>
										<div class="slider-count__progress">
											<span style="height: <?php echo 100 / $totalSlides * get_row_index() ?>%;"></span>
										</div>
										<span><?php echo $totalSlides < 9 ? '0' . $totalSlides : $totalSlides ; ?></span>
									</div>
									<div class="slider-nav">
										<button id="hero__prev" class="slider-nav-button btn-reset">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
												 xmlns="http://www.w3.org/2000/svg">
												<path
													  d="M15 19.92L8.48003 13.4C7.71003 12.63 7.71003 11.37 8.48003 10.6L15 4.07996"
													  stroke="white" stroke-width="1.5" stroke-miterlimit="10"
													  stroke-linecap="round" stroke-linejoin="round" />
											</svg>
										</button>
										<button id="hero__next" class="slider-nav-button btn-reset">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
												 xmlns="http://www.w3.org/2000/svg">
												<path d="M8.91 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.91 4.07996"
													  stroke="white" stroke-width="1.5" stroke-miterlimit="10"
													  stroke-linecap="round" stroke-linejoin="round" />
											</svg>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</section>
<?php endif; ?>