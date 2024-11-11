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
	<main id="main" class="container mx-auto px-4">

		<?php if ( have_posts() ) : ?>

			<header class="page-header mb-8 text-center">
				<h1 class="text-3xl font-bold text-gray-800">
					<?php
					printf(
						/* translators: 1: search result title. 2: search term. */
						esc_html__( 'Search results for: ', '_tw' ) . '<span class="text-indigo-600">%s</span>',
						get_search_query()
					);
					?>
				</h1>
			</header><!-- .page-header -->

			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
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
			<div class="mt-8">
				<?php _tw_the_posts_navigation(); ?>
			</div>

		<?php else : ?>

			<!-- If no content is found, show a friendly message -->
			<div class="text-center">
				<h2 class="text-2xl font-semibold text-gray-700 mb-4">
					<?php esc_html_e( 'No results found', '_tw' ); ?>
				</h2>
				<p class="text-lg text-gray-500 mb-4">
					<?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', '_tw' ); ?>
				</p>

				<!-- Search form -->
				<div class="mt-4">
					<form role="search" method="get" class="search-form flex justify-center items-center space-x-4" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="search" class="search-field w-80 p-3 text-base border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="<?php esc_attr_e( 'Search...', '_tw' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
						<button type="submit" class="search-submit px-6 py-3 bg-indigo-600 text-white rounded-r-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
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
