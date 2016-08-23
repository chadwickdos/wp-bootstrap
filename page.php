<?php get_header(); ?>

<main id="main" class="site-content col-md-8">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>
</main><!-- .site-content -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
