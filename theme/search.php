<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package _tw
 */

get_header();
?>

<section id="primary" class="bg-gray-50 py-8">
	<main id="main" class="container mx-auto px-4 lg:px-8">

		<?php if ( have_posts() ) : ?>

			<header class="page-header text-center mb-8">
				<h1 class="text-4xl font-semibold text-gray-900 mb-4">
					<?php
					printf(
						/* translators: 1: search result title. 2: search term. */
						esc_html__( 'Search results for: ', '_tw' ) . '<span class="text-indigo-600">%s</span>',
						get_search_query()
					);
					?>
				</h1>
			</header><!-- .page-header -->

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
				<?php
				// Start the Loop.
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content/content', 'excerpt' );
				// End the loop.
				endwhile;
				?>
			</div>

			<!-- Pagination -->
			<div class="mt-12 text-center">
				<?php _tw_the_posts_navigation(); ?>
			</div>

		<?php else : ?>

			<!-- If no content is found, show a friendly message -->
			<div class="text-center py-16 px-4 bg-white shadow-md rounded-lg">
				<h2 class="text-3xl font-semibold text-gray-700 mb-4">
					<?php esc_html_e( 'No results found', '_tw' ); ?>
				</h2>
				<p class="text-lg text-gray-500 mb-6">
					<?php esc_html_e( 'Pencarian Anda tidak menghasilkan hasil apa pun. Silakan coba pencarian lain.', '_tw' ); ?>
				</p>
				<!-- Enhanced Search Form -->
				<div style="display: flex; justify-content: center; margin-top: 20px;">
			<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: flex; align-items: center;">
				<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search...', '_tw' ); ?>" value="<?php echo get_search_query(); ?>" name="s" style="padding: 10px; font-size: 1rem; border: 1px solid #ccc; border-radius: 5px 0 0 5px; outline: none; width: 250px;">
				<button type="submit" class="search-submit" style="padding: 10px 20px; background-color: #BD161C; color: white; font-size: 1rem; border: none; border-radius: 0 5px 5px 0; cursor: pointer;">
					<?php esc_html_e( 'Search', '_tw' ); ?>
				</button>
			</form>
		</div>
			</div>

		<?php endif; ?>
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
