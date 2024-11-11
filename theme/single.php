<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _tw
 */

get_header();
?>

<section id="primary" class="">
    <main id="main" class="flex flex-col items-center">

        <?php
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            // Load the single post content template part
            get_template_part( 'template-parts/content/content', 'single' );

            // Display navigation for previous and next posts
            if ( is_singular( 'post' ) ) :
                ?>
                <nav class="post-navigation flex justify-between items-center w-full mt-12 px-10 max-w-7xl mx-auto pb-5">
                    <div class="w-full flex justify-between items-center">
                        <div class="text-left">
                            <?php
                            $prev_post = get_previous_post();
                            if ( $prev_post ) :
                            ?>
                                <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="text-sm text-gray-600 hover:text-blue-600">
                                    <span class="block text-xs"><?php echo __('Previous Post', '_tw'); ?></span>
                                    <h3 class="font-semibold"><?php echo esc_html( $prev_post->post_title ); ?></h3>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="text-right">
                            <?php
                            $next_post = get_next_post();
                            if ( $next_post ) :
                            ?>
                                <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="text-sm text-gray-600 hover:text-blue-600">
                                    <span class="block text-xs"><?php echo __('Next Post', '_tw'); ?></span>
                                    <h3 class="font-semibold"><?php echo esc_html( $next_post->post_title ); ?></h3>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>
                <?php
            endif;

            // Load comments template if comments are open or there is at least one comment
            if ( comments_open() || get_comments_number() ) :
                echo '<div class="w-full mt-12 p-6 rounded-lg shadow-md">';
                comments_template();
                echo '</div>';
            endif;

        endwhile; // End the loop.
        ?>

    </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
