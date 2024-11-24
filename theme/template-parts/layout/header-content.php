<header id="masthead">
    <nav id="navbar" class="transparent fixed w-full z-50 top-0 left-0 transition-all">
        <div class="max-w-screen-xl flex items-center justify-between mx-auto px-6">
            <!-- Logo Section -->
            <?php 
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
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
                        'items_wrap' => '%3$s',
                        'add_li_class' => 'transition duration-200 p-2 hover:text-blue-500',
                        'link_class' => 'text-white',
                    ));
                    ?>

                    <!-- Dropdown Button -->
                    <li class="relative">
    <!-- Dropdown Button -->
    <button 
        id="dropdownButton" 
        type="button" 
        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[#0001fe] rounded-md hover:bg-[#0001fe]/80 transition"
        aria-expanded="false" 
        aria-haspopup="true"
    >
        <?php echo esc_html(get_theme_mod('dropdown_button_text', 'Belanja Sekarang')); ?>
        <svg 
            class="ml-2 h-5 w-5" 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 20 20" 
            fill="currentColor" 
            aria-hidden="true"
        >
            <path 
                fill-rule="evenodd" 
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" 
                clip-rule="evenodd" 
            />
        </svg>
    </button>

    <!-- Dropdown Menu -->
    <div 
        id="dropdownMenu" 
        class="absolute right-0 mt-2 hidden w-56 origin-top-right bg-white border border-gray-200 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-10"
        role="menu" 
        aria-orientation="vertical" 
        aria-labelledby="dropdownButton"
    >
        <div class="py-1" role="none">
            <?php 
            // Retrieve dropdown links dynamically
            $dropdown_links = json_decode(get_theme_mod('dropdown_links', '[]'), true);
            if (!empty($dropdown_links)) {
                foreach ($dropdown_links as $link) {
                    $label = esc_html($link['label'] ?? '');
                    $url = esc_url($link['url'] ?? '#');
                    $color = esc_attr($link['color'] ?? '#4b5563'); // Default hover color (gray-600)

                    echo "<a 
                            href='{$url}' 
                            class='block px-4 py-2 text-sm text-gray-700 transition hover:text-white hover:bg-[{$color}]' 
                            target='_blank'
                            role='menuitem'>
                            {$label}
                          </a>";
                }
            }
            ?>
        </div>
    </div>
</li>

                </ul>
            </div>
        </div>
    </nav>
</header>


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

        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent event from bubbling up
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown if clicking outside
        window.addEventListener('click', function() {
            dropdownMenu.classList.add('hidden');
        });

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


