<header id="masthead">
    <nav id="navbar" class="transparent fixed w-full z-50 top-0 left-0 transition-all">
        <div class="max-w-screen-xl flex items-center justify-between mx-auto px-6">
            <!-- Logo Section -->
            <?php 
                        if (has_custom_logo()) {
                            the_custom_logo(); // This will display the custom logo
                        } else {
                            // Fallback logo if no custom logo is set
                            echo '<img src="' . get_template_directory_uri() . '/assets/images/default-logo.png" alt="Logo" class="w-24 h-auto">';
                        }
                    ?>

            <!-- Mobile Menu Toggle -->
            <button id="menu-toggle" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>

            <!-- Desktop Menu Links -->
            <div class="hidden md:flex md:items-center md:w-auto md:space-x-8" id="navbar-sticky">
                <ul id="navbar-links" class="flex flex-row p-4 py-8 space-x-6 font-medium text-white items-center transition-all">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1',
                        'container' => false,
                        'items_wrap' => '%3$s', // Only show <li> elements
                        'add_li_class' => 'transition duration-200 p-2 hover:text-blue-500',
                        'link_class' => 'text-white', // Default text color for links 
                    ));
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header><!-- #masthead -->


<!-- Mobile menu -->
<div id="mobile-menu" class="fixed inset-0 z-40 bg-gray-900 bg-opacity-50 hidden">
    <div class="flex justify-center items-center h-full">
        <ul class="space-y-6 text-white text-xl">
            <?php
            // WordPress dynamic menu for mobile
            wp_nav_menu(array(
                'theme_location' => 'menu-1',
                'container' => false,
                'items_wrap' => '%3$s',
                'add_li_class' => 'block py-3 px-5 rounded hover:bg-gray-700 transition duration-300', // Style for mobile menu items
                'link_active_class' => '!text-blue-500' // Active item gets blue color
            ));
            ?>
        </ul>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select elements once for efficiency
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMenuButton = document.getElementById('close-menu');
        const navbar = document.getElementById('navbar');
        const logo = document.getElementById('navbar-logo');
        const navbarLinks = document.getElementById('navbar-links');
        const navbarItems = navbarLinks.getElementsByTagName('li');

        // Mobile menu toggle functionality
        menuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Close the mobile menu when the close button is clicked
        closeMenuButton?.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
        });

        // Close the mobile menu if clicking outside of it
        window.addEventListener('click', function(e) {
            if (!mobileMenu.contains(e.target) && !menuToggle.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });

        const baseurl = window.location.origin; 
        // Highlight active link
        const currentUrl = window.location.href;
        Array.from(navbarItems).forEach(item => {
            const link = item.querySelector('a'); 

            // Check if the link href includes the current URL but is not the base URL
            if (link && (link.href === currentUrl || (currentUrl.includes(link.href) && link.href !== baseurl + '/'))) {
                item.classList.add('text-white', 'bg-[#BD161C]', 'px-3', 'py-1', 'rounded-lg');
                item.dataset.isActive = true;  
            }
        });

        // Scroll state flag
        let isScrolled = false;

        // Scroll event to change navbar styles
        window.addEventListener('scroll', function() {
            const scrolled = window.scrollY > 50;
            if (scrolled !== isScrolled) {
                isScrolled = scrolled;

                // Update navbar styles based on scroll position
                if (isScrolled) {
                    navbar.classList.add('bg-white', 'shadow-lg');
                    navbar.classList.remove('transparent');
                    navbarLinks.classList.add('text-gray-800', 'py-4');
                    navbarLinks.classList.remove('text-white', 'py-8');
                    logo.classList.add('text-gray-800');
                    logo.classList.remove('text-white');

                    // Update navbar items style, preserving active link styling
                    Array.from(navbarItems).forEach(item => {
                        if (!item.dataset.isActive) {
                            item.classList.add('text-gray-800');
                            item.classList.remove('text-white');
                        }
                    });
                } else {
                    navbar.classList.remove('bg-white', 'shadow-lg');
                    navbar.classList.add('transparent');
                    navbarLinks.classList.add('text-white', 'py-8');
                    navbarLinks.classList.remove('text-gray-800', 'py-4');
                    logo.classList.add('text-white');
                    logo.classList.remove('text-gray-800');

                    // Reset navbar items style, preserving active link styling
                    Array.from(navbarItems).forEach(item => {
                        if (!item.dataset.isActive) {
                            item.classList.add('text-white');
                            item.classList.remove('text-gray-800');
                        }
                    });
                }
            }
        });
    });
</script>


