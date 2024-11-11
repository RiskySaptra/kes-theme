<?php
/**
 * Template for displaying comments
 *
 * @package _tw
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="max-w-7xl mx-auto">

    <?php if ( have_comments() ) : ?>
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">
            <?php
            $_tw_comment_count = get_comments_number();
            if ( '1' === $_tw_comment_count ) {
                printf(
                    esc_html__( 'One comment on “%1$s”', '_tw' ),
                    esc_html( get_the_title() )
                );
            } else {
                printf(
                    esc_html( _nx( '%1$s comment on “%2$s”', '%1$s comments on “%2$s”', $_tw_comment_count, 'comments title', '_tw' ) ),
                    esc_html( number_format_i18n( $_tw_comment_count ) ),
                    esc_html( get_the_title() )
                );
            }
            ?>
        </h2>

        <?php the_comments_navigation(); ?>

        <ol class="space-y-4">
            <?php
            wp_list_comments([
                'style'      => 'ol',
                'callback'   => '_tw_html5_comment',
                'short_ping' => true,
                'avatar_size'=> 48,
                'walker'     => new Walker_Comment, // Optional custom Walker for additional styling
            ]);
            ?>
        </ol>

        <?php the_comments_navigation(); ?>

        <?php if ( ! comments_open() ) : ?>
            <p class="text-gray-600 italic mt-4"><?php esc_html_e( 'Comments are closed.', '_tw' ); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    // Customize comment form with Tailwind classes
    comment_form([
        'title_reply'          => '<span class="text-xl font-semibold text-gray-800">Leave a Reply</span>',
        'title_reply_before'   => '<h3 class="text-xl font-semibold text-gray-800 mb-2">',
        'title_reply_after'    => '</h3>',
        'class_form'           => 'bg-white p-6 rounded-lg shadow-md',
        'comment_field'        => '<p class="mb-4"><textarea id="comment" name="comment" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Write your comment..."></textarea></p>',
        'fields'               => [
            'author' => '<p class="mb-4"><input id="author" name="author" type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Name" /></p>',
            'email'  => '<p class="mb-4"><input id="email" name="email" type="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Email" /></p>',
            'url'    => '<p class="mb-4"><input id="url" name="url" type="url" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Website" /></p>',
        ],
        'submit_button'        => '<button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300">Post Comment</button>',
    ]);
    ?>
</div>
