<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _tw
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php esc_html_e( 'Page Not Found', '_tw' ); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> style="display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; background-color: #f9f9f9;">

	<div style="text-align: center; max-width: 600px; padding: 20px;">
		<h1 style="font-size: 2rem; color: #BD161C; margin-bottom: 20px;"><?php esc_html_e( 'Oops! Halaman Tidak Ditemukan', '_tw' ); ?></h1>
		<p style="font-size: 1.2rem; color: #333;"><?php esc_html_e( 'Tampaknya halaman yang Anda cari tidak ada. Mungkin telah dipindahkan atau dihapus.', '_tw' ); ?></p>

		<!-- Styled Search Form -->
		<div style="display: flex; justify-content: center; margin-top: 20px;">
			<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: flex; align-items: center;">
				<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search...', '_tw' ); ?>" value="<?php echo get_search_query(); ?>" name="s" style="padding: 10px; font-size: 1rem; border: 1px solid #ccc; border-radius: 5px 0 0 5px; outline: none; width: 250px;">
				<button type="submit" class="search-submit" style="padding: 10px 20px; background-color: #BD161C; color: white; font-size: 1rem; border: none; border-radius: 0 5px 5px 0; cursor: pointer;">
					<?php esc_html_e( 'Search', '_tw' ); ?>
				</button>
			</form>
		</div>

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #BD161C; color: #fff; text-decoration: none; border-radius: 5px; font-size: 1rem;">
			<?php esc_html_e( 'Return to Home', '_tw' ); ?>
		</a>
	</div>

	<?php wp_footer(); ?>
</body>
</html>
