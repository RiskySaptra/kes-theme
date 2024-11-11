<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

?>

<!-- Loading Overlay (Initially visible) -->
<div id="loading-overlay" class="fixed inset-0 bg-white flex items-center justify-center z-50 transition-all opacity-100">
<div class="flex flex-col items-center justify-center space-y-4">
    <!-- Dynamic Logo -->
    <div class="w-[300px] h-auto mb-4 animate-pulse">
      <?php 
        // Get the custom logo
        if (has_custom_logo()) {
            the_custom_logo(); // This will display the logo added via the WordPress Customizer
        } else {
            // Fallback logo if custom logo is not set
            echo '<img src="' . get_template_directory_uri() . '/assets/images/default-logo.png" alt="Logo" class="w-24 h-auto">';
        }
      ?>
    </div> 
</div>

</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <!-- .entry-header -->

  <?php _tw_post_thumbnail(); ?>

  <div <?php _tw_content_class( 'entry-content' ); ?>>
    <?php
    the_content();

    wp_link_pages(
      array(
        'before' => '<div>' . __( 'Pages:', '_tw' ),
        'after'  => '</div>',
      )
    );
    ?>
  </div><!-- .entry-content -->

  <?php if ( get_edit_post_link() ) : ?>
    <footer class="entry-footer">
      <?php
      edit_post_link(
        sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers. */
            __( 'Edit <span class="sr-only">%s</span>', '_tw' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          get_the_title()
        )
      );
      ?>
    </footer><!-- .entry-footer -->
  <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->

<!-- Main content section -->
<div id="content" class="hidden">
  <!-- The content of the page goes here -->
</div>

<!-- Add the following JavaScript to hide the loader after the page loads -->
<script>
  window.addEventListener('load', function () {
    // Hide the loader after the page loads
    document.getElementById('loading-overlay').style.display = 'none';
    
    // Show the main content
    document.getElementById('content').classList.remove('hidden');
    
    // Re-enable scrolling after the page has loaded
    document.body.style.overflow = 'auto';
  });

  // Prevent scrolling while the page is loading
  document.body.style.overflow = 'hidden';
</script>
