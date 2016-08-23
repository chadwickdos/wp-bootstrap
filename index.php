<?php get_header(); ?>

		<main id="main" class="site-content col-md-8">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'parts/content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'bootstrap' ),
				'next_text'          => __( 'Next page', 'bootstrap' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bootstrap' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
