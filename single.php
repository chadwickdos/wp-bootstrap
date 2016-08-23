<?php get_header(); ?>

	<main id="main" class="site-content" >
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'bootstrap' ),
				'next_text'          => __( 'Next page', 'bootstrap' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bootstrap' ) . ' </span>',
			) );


			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-content -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
