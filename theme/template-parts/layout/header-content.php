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
            <button id="menu-toggle" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden" aria-controls="navbar-sticky" aria-expanded="false">
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
                                        $label_lower = strtolower($label);

                                        echo "<a 
                                                href='{$url}' 
                                                class='flex items-center gap-2 block px-4 py-2 text-sm text-gray-700 transition hover:text-white' 
                                                style='--hover-bg-color: {$color};' 
                                                target='_blank'
                                                role='menuitem'>
                                                <img 
                                                    src='" . get_template_directory_uri() . "/assets/icons/{$label_lower}.png' 
                                                    alt='{$label}-icon' 
                                                    class='w-16 h-auto bg-white p-1 rounded-sm'
                                                />
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
<div id="mobile-menu" class="fixed inset-0 z-40 bg-white hidden">
    <ul class="flex flex-col items-center justify-center h-full space-y-6 text-gray-800 text-xl">
        <?php
        wp_nav_menu([
            'theme_location' => 'menu-1',
            'container' => false,
            'items_wrap' => '%3$s',
            'add_li_class' => 'block py-3 px-5 rounded hover:bg-gray-700 transition',
        ]);
        ?>
        <li class="relative">
            <!-- Dropdown Button -->
            <button 
                id="dropdownButtonMobile" 
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

            <div 
                id="dropdownMenuMobile" 
                class="absolute left-0 mt-2 hidden w-56 origin-top-right bg-white border border-gray-200 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-10"
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
                                    class='block px-4 py-2 text-sm text-gray-700 transition hover:text-white' 
                                    style='--hover-bg-color: {$color};' 
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

<script> 
    document.addEventListener('DOMContentLoaded', function () { 
        const body = document.body; 
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownButtonMobile = document.getElementById('dropdownButtonMobile');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const dropdownMenuMobile = document.getElementById('dropdownMenuMobile');
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const navbar = document.getElementById('navbar');
        const navbarLinks = document.getElementById('navbar-links');
        const navbarItems = navbarLinks.getElementsByTagName('li');


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

        // Toggle dropdown menu
        dropdownButtonMobile?.addEventListener('click', function (event) {
            event.stopPropagation();
            dropdownMenuMobile.classList.toggle('hidden');
        });

        // Close dropdown menu on clicking outside
        window.addEventListener('click', function (event) {
            if (!dropdownButtonMobile?.contains(event.target) && !dropdownMenuMobile?.contains(event.target)) {
                dropdownMenuMobile?.classList.add('hidden');
            }
        });

        // Toggle dropdown menu
        dropdownButton?.addEventListener('click', function (event) {
            event.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown menu on clicking outside
        window.addEventListener('click', function (event) {
            if (!dropdownButton?.contains(event.target) && !dropdownMenu?.contains(event.target)) {
                dropdownMenu?.classList.add('hidden');
            }
        });

        // Toggle mobile menu
        menuToggle?.addEventListener('click', function () {
            const isActive = !mobileMenu.classList.contains('hidden'); // Check current menu state
            const isScrolled = window.scrollY > 50; // Check if the page is scrolled

            // Toggle the visibility of the mobile menu
            mobileMenu.classList.toggle('hidden', isActive);

            // Lock or unlock scroll
            body.style.overflow = isActive ? '' : 'hidden'; // Disable scrolling when menu is open

            // Update the menuToggle color based on state
            if (!isActive) {
                // Menu is being opened
                menuToggle.classList.add('text-[#0003fb]'); // Blue color when menu is active
                menuToggle.classList.remove('text-white'); // Remove white
            } else {
                // Menu is being closed
                menuToggle.classList.toggle('text-[#0003fb]', isScrolled); // Blue if scrolled
                menuToggle.classList.toggle('text-white', !isScrolled); // White if not scrolled
            }
        });

        // Close mobile menu if clicking outside
        window.addEventListener('click', function (event) {
            if (!menuToggle?.contains(event.target) && !mobileMenu?.contains(event.target)) {
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    menuToggle.classList.toggle('text-white', window.scrollY <= 50); // Reset to white if not scrolled
                    menuToggle.classList.toggle('text-[#0003fb]', window.scrollY > 50); // Reset to blue if scrolled
                    body.style.overflow = ''; // Unlock scrolling
                }
            }
        });

        // Apply hover styles dynamically for dropdown menu links
        document.querySelectorAll('#dropdownMenu a').forEach(link => {
            link.addEventListener('mouseenter', () => {
                link.style.backgroundColor = link.style.getPropertyValue('--hover-bg-color');
            });
            link.addEventListener('mouseleave', () => {
                link.style.backgroundColor = '';
            });
        });        
        
        window.addEventListener('scroll', function () { 
            const scrolled = window.scrollY > 50;
            const isActive = !mobileMenu.classList.contains('hidden');
            menuToggle.classList.toggle('text-[#0003fb]', isScrolled); // Blue when scrolled
            menuToggle.classList.toggle('text-white', !isScrolled && !isActive); // White if not scrolled and menu inactive 
        });

        // Update navbar styles on scroll
        // Scroll state flag
        let isScrolled = false;

        // Scroll event to change navbar styles
        window.addEventListener('scroll', function() {
            const scrolled = window.scrollY > 50;
            const isActive = !mobileMenu.classList.contains('hidden');

            if (scrolled !== isScrolled) {
                isScrolled = scrolled;

                // Update navbar styles based on scroll position
                if (isScrolled) {
                    menuToggle.classList.toggle('text-[#0003fb]');
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
                    menuToggle.classList.toggle('text-white', !isActive);
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