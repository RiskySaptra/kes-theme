<?php
/**
 * The template for displaying category pages.
 *
 * @package _tw
 */

get_header();
?>

<section class="py-16 bg-gradient-to-r from-indigo-600 to-blue-400 text-white">
    <div class="container mx-auto px-6 md:px-12">
        <!-- Category Title -->
        <header class="text-center mb-10">
            <h1 class="text-5xl font-extrabold tracking-tight">
                <?php single_cat_title(); ?>
            </h1>
            <p class="text-lg font-light mt-4 max-w-2xl mx-auto">
                <?php
                // Optional: Show category description
                if ( category_description() ) {
                    echo category_description();
                }
                ?>
            </p>
        </header>

        <!-- Posts Loop -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
            <?php
            if ( have_posts() ) :
                // Start the Loop
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article class="bg-white shadow-xl rounded-lg overflow-hidden hover:scale-105 transition-transform duration-300 ease-in-out">
                        <a href="<?php the_permalink(); ?>" class="block">
                            <div class="relative">
                                <!-- Post Thumbnail -->
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="<?php the_title(); ?>" class="w-full h-72 object-cover rounded-t-lg">
                                <?php else: ?>
                                    <div class="w-full h-72 bg-gray-300 flex items-center justify-center text-white text-xl">No Image</div>
                                <?php endif; ?>
                                <div class="absolute inset-0 bg-black opacity-25 rounded-t-lg"></div>
                            </div>

                            <div class="p-6">
                                <h2 class="text-2xl font-semibold text-gray-900 mb-2 hover:text-indigo-600"><?php the_title(); ?></h2>
                                <p class="text-gray-600 mb-4"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                                <span class="text-indigo-600 font-semibold">Read More</span>
                            </div>
                        </a>
                    </article>
                    <?php
                endwhile;
            else :
                ?>
                <p class="col-span-full text-center text-gray-600">No posts found in this category.</p>
            <?php
            endif;
            ?>
        </div>

        <!-- Pagination -->
        <div class="mt-12 text-center">
            <?php
            // Display pagination if needed
            the_posts_navigation();
            ?>
        </div>
    </div>
</section>

<?php
get_footer();
