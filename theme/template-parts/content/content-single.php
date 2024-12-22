<?php
/**
 * Template part for displaying single posts
 *
 * @package _tw
 */

?>

<!-- Banner Section before main content -->
<section class="bg-blue-600 text-white text-center w-full">
<img
    src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-berita.jpeg"
    alt="footer-background"
    class="w-full right-0 bottom-0"
  /> 
</section>
 
<section class="max-w-7xl mx-auto text-gray-800 w-full py-5">
    <nav class="flex items-center space-x-3 text-sm text-gray-500">
        <?php
        // Check if Breadcrumb NavXT plugin is active
        if ( function_exists( 'bcn_display' ) ) {
            bcn_display();  // Display breadcrumbs if plugin is active
        } else {
            // Fallback for dynamic breadcrumbs
            if ( is_home() || is_front_page() ) {
                echo '<span class="text-gray-600">Home</span>';
            } elseif ( is_category() || is_single() ) {
                // Display the category for posts
                echo '<span class="text-indigo-600 hover:text-indigo-800 transition-colors">Category: </span>';
                the_category(' <span class="text-gray-400">/</span> ');
                if ( is_single() ) {
                    // Add the post title for single post pages
                    echo ' <span class="text-gray-400">/</span> <span class="text-indigo-600 hover:text-indigo-800 transition-colors">' . get_the_title() . '</span>';
                }
            } elseif ( is_page() ) {
                // For static pages, show the page title
                echo ' <span class="text-gray-400">/</span> <span class="text-indigo-600 hover:text-indigo-800 transition-colors">' . get_the_title() . '</span>';
            }
        }
        ?>
    </nav>
</section>




 
<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white shadow-lg rounded-lg overflow-hidden mb-8 transition-all duration-500 ease-in-out flex flex-col lg:flex-row  max-w-7xl mx-auto'); ?>>

    <!-- Main content area -->
    <div class="flex-1 p-6 bg-gray-100">

	<header class="entry-header mb-6">
    <h1 class="entry-title text-4xl font-extrabold text-gray-900">
        <?php echo esc_html( get_the_title() ); ?>
    </h1>

    <?php if ( ! is_page() ) : ?>
        <div class="entry-meta mt-4 text-sm text-gray-600 flex space-x-6 items-center">
            <span class="inline-flex items-center space-x-2">
                <i class="fas fa-calendar-alt text-gray-500"></i>
                <span><?php echo get_the_date(); ?></span>
            </span>
            <span class="inline-flex items-center space-x-2">
                <i class="fas fa-user text-gray-500"></i>
                <span><?php echo get_the_author(); ?></span>
            </span>
        </div>
		<?php endif; ?>
	</header>


        <?php _tw_post_thumbnail(); ?>

        <div <?php _tw_content_class( 'entry-content p-6 text-lg text-gray-800' ); ?>>
            <?php
            the_content(
                sprintf(
                    wp_kses(
                        __( 'Continue reading<span class="sr-only"> "%s"</span>', '_tw' ),
                        [ 'span' => [ 'class' => [] ] ]
                    ),
                    esc_html( get_the_title() )
                )
            );

            wp_link_pages([ 
                'before' => '<div class="mt-4 text-sm text-gray-600">' . __( 'Pages:', '_tw' ), 
                'after'  => '</div>', 
            ]);
            ?>
        </div>

        <footer class="entry-footer p-6 bg-gray-50">
            <div class="flex items-center space-x-4 text-sm text-gray-600">
                <?php _tw_entry_footer(); ?>
            </div>
        </footer>
    </div>

    <!-- Sidebar with Related Posts and Next Post -->
    <aside class="lg:w-1/3 flex flex-col space-y-6 p-6 bg-gray-50">

        <!-- Related Posts Section -->
        <section class="related-posts bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Related Posts</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-4">
                <?php
                $related_posts = get_posts([ /* Add your query args here for related posts */ ]);
                if ( $related_posts ) :
                    foreach ( $related_posts as $post ) :
                        setup_postdata( $post );
                        ?>
                        <div class="bg-white shadow-lg rounded-lg p-4 transform transition-transform hover:scale-105 hover:shadow-xl">
                            <h3 class="text-xl font-medium text-gray-800"><?php the_title(); ?></h3>
                            <p class="text-sm text-gray-600 mt-2"><?php echo wp_trim_words( get_the_excerpt(), 15 ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="text-blue-500 hover:underline mt-4 block">Read More</a>
                        </div>
                    <?php
                    endforeach;
                    wp_reset_postdata();
                else :
                    echo '<p class="text-sm text-gray-600">No related posts available.</p>';
                endif;
                ?>
            </div>
        </section>

        <!-- Next Post Section -->
        <section class="next-post bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Next Content to Read</h2>
            <div class="flex flex-col space-y-4">
                <?php 
                $next_post = get_next_post();
                if ( $next_post ) :
                    ?>
                    <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="text-xl text-blue-500">
                        <?php echo esc_html( get_the_title( $next_post->ID ) ); ?>
                    </a>
                    <p class="text-sm text-gray-600">Click here to read the next post.</p>
                <?php else : ?>
                    <p class="text-sm text-gray-600">No next post available.</p>
                <?php endif; ?>
            </div>
        </section>

    </aside>
</article>
