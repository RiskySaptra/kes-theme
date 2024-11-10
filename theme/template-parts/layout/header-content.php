<header id="masthead">
    <nav id="navbar" class="transparent fixed w-full z-50 top-0 left-0 transition-all">
        <div class="max-w-screen-xl flex items-center justify-between mx-auto px-6">
            <!-- Logo Section -->
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span id="navbar-logo" class="text-2xl font-semibold text-white md:text-[#kk0100B1] transition-all">KES</span>
            </a>

            <!-- Mobile Menu Toggle (hidden by default on desktop) -->
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
    // Mobile menu toggle functionality
    document.getElementById('menu-toggle').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden'); // Toggle visibility of the mobile menu
    });

    // Close the mobile menu when the close button is clicked
    document.getElementById('close-menu')?.addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.add('hidden'); // Hide the mobile menu
    });

    // Optionally close the mobile menu if clicking outside of it
    window.addEventListener('click', function(e) {
        const mobileMenu = document.getElementById('mobile-menu');
        const menuToggle = document.getElementById('menu-toggle');
        
        if (!mobileMenu.contains(e.target) && !menuToggle.contains(e.target)) {
            mobileMenu.classList.add('hidden'); // Hide the mobile menu when clicking outside
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
    const navbarItems = document.querySelectorAll('#navbar-links li');
    navbarItems.forEach(item => {
        const link = item.querySelector('a');
        if (link && link.href === window.location.href) {
            item.classList.add('text-[#ffffff]');
            item.classList.add('bg-[#BD161C]');
            item.classList.add('px-3');
            item.classList.add('py-1');
            item.classList.add('rounded-lg');



        }
    });
});

    // Scroll event to change navbar background and logo color
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        const logo = document.getElementById('navbar-logo');
        const navbarLinks = document.getElementById('navbar-links');
        const navbarItems = navbarLinks.getElementsByTagName('li');

        if (window.scrollY > 50) {
            // Add white background on scroll
            navbar.classList.add('bg-white');
            navbar.classList.add('shadow-lg');
            navbar.classList.remove('transparent');
            navbarLinks.classList.remove('text-white');
            navbarLinks.classList.add('text-gray-800'); // Change text color to dark when the background is white

            navbarLinks.classList.remove('py-8');
            navbarLinks.classList.add('py-4');
            
            logo.classList.remove('text-white');
            logo.classList.add('text-gray-800'); // Change logo text color when background is white

            // Update the <li> elements
            Array.from(navbarItems).forEach(item => {
                item.classList.remove('text-white');
                item.classList.add('text-gray-800'); // Change text color of menu items on scroll
            });
        } else {
            // Reset to transparent background when at the top
            navbar.classList.remove('shadow-lg');
            navbar.classList.remove('bg-white');
            navbar.classList.add('transparent');
            navbarLinks.classList.remove('text-gray-800');
            navbarLinks.classList.remove('py-4');

            navbarLinks.classList.add('py-8');

            navbarLinks.classList.add('text-white'); // Reset text color to white
            logo.classList.remove('text-gray-800');
            logo.classList.add('text-white'); // Reset logo color to white

            // Reset the <li> elements
            Array.from(navbarItems).forEach(item => {
                item.classList.remove('text-gray-800');
                item.classList.add('text-white'); // Reset text color of menu items when at the top
            });
        }
    });
</script>
