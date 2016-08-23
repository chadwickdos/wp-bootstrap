<?php get_header(); ?>

	<main id="main" class="site-content" >

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
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
