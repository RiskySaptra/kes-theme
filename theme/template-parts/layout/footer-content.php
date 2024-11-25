<footer id="colophon" class=" text-white relative">
  <div class="bg-[#01009B] min-w-full min-h-full absolute -z-20"></div>
  <img
    src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-background.png"
    alt="footer-background"
    class="absolute h-1/2 w-full md:w-1/2 md:h-full right-0 bottom-0 -z-10"
  />
  <div class="mx-auto max-w-[1280px] px-5 md:px-0 py-10">
    <div class="grid grid-cols-1 md:!grid-cols-4">
    <div>
        <img
          src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png"
          alt="footer-logo"
          class="max-w-[150px] h-auto"
        />
        <h3 class="text-xl mt-4 font-semibold">PT KMI Electric Solution</h3>
        <p class="text-sm mt-2 leading-relaxed text-gray-300">
          Jl. Raya Bekasi Km 23.1 – Cakung, Jakarta 13910
        </p>
        <p class="text-sm mt-2">
          <a href="mailto:sales@kmielectricsolution.co.id" class="text-white hover:text-[#2E82FF]">sales@kmielectricsolution.co.id</a>
        </p>
        <p class="text-sm mt-2">
          <a href="https://kabelretail.co.id/" class="text-white hover:text-[#2E82FF]">https://kabelretail.co.id/</a>
        </p>
        <p class="text-sm mt-2">
          +6221 4614952
        </p>
        <div class="flex space-x-4 mt-4">
          <a href="#" aria-label="LinkedIn" class="text-white hover:text-[#2E82FF] transition duration-300">
            <i class="fab fa-linkedin fa-lg"></i>
          </a>
          <a href="#" aria-label="Facebook" class="text-white hover:text-[#2E82FF] transition duration-300">
            <i class="fab fa-facebook fa-lg"></i>
          </a>
          <a href="#" aria-label="Instagram" class="text-white hover:text-[#2E82FF] transition duration-300">
            <i class="fab fa-instagram fa-lg"></i>
          </a>
          <a href="#" aria-label="TikTok" class="text-white hover:text-[#2E82FF] transition duration-300">
            <i class="fab fa-tiktok fa-lg"></i>
          </a>
        </div>
        </div>

      <div class="col-span-2 flex flex-col md:!flex-row gap-5  mt-8 md:mt-0 pt-0 md:!pt-8 md:justify-between px-0 md:px-10">

      <div class="">
        <h3 class="font-semibold text-sm mb-2">Navigation</h3>
        <ul class="space-y-1 text-xs"> 
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-1',
                'container' => false,
                'items_wrap' => '%3$s',
                'add_li_class' => 'transition duration-200 p-2 hover:text-blue-500',
                'link_class' => 'text-white',
            ));
            ?>
        </ul>
      </div>

      <!-- Products Links -->
      <div class="">
        <h3 class="font-semibold text-sm mb-2">Products</h3>
        <ul class="space-y-1 text-xs">
            <li><a href="#" class="hover:underline hover:text-[#2E82FF] transition duration-300">Low Voltage Cables</a></li>
            <li><a href="#" class="hover:underline hover:text-[#2E82FF] transition duration-300">Flexible Cables</a></li>
            <li><a href="#" class="hover:underline hover:text-[#2E82FF] transition duration-300">Fire Resistant Cables</a></li>
            <li><a href="#" class="hover:underline hover:text-[#2E82FF] transition duration-300">Medium Voltage Cables</a></li>
            <li><a href="#" class="hover:underline hover:text-[#2E82FF] transition duration-300">Jointing</a></li>
            <li><a href="#" class="hover:underline hover:text-[#2E82FF] transition duration-300">Fitting & Accessories</a></li>
        </ul>
      </div>

      <!-- Company Contact Section -->
      <div class="">
        <h3 class="font-semibold text-sm mb-2">Company</h3>
        <ul class="space-y-1 text-xs">
          <li class="flex items-center">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-2" viewBox="0 0 16 16">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm1 0v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1z"/>
            </svg> -->
            <a href="mailto:sales@kmielectricsolution.co.id" class="hover:text-[#2E82FF] transition duration-300">sales@kmielectricsolution.co.id</a>
          </li>
          <li class="flex items-center">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-2" viewBox="0 0 16 16">
              <path d="M12.654 4.646a.5.5 0 0 1 0 .708L8.707 8.707a.5.5 0 0 1-.707-.707L11.293 5H7.5a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.146.354z"/>
            </svg> -->
            +6281 2193 43520 (Louis)
          </li>
          <li class="flex items-center">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-2" viewBox="0 0 16 16">
              <path d="M12.654 4.646a.5.5 0 0 1 0 .708L8.707 8.707a.5.5 0 0 1-.707-.707L11.293 5H7.5a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.146.354z"/>
            </svg> -->
            +6281 2124 88890 (Alfian)
          </li>
          <li class="flex items-center">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-2" viewBox="0 0 16 16">
              <path d="M12.654 4.646a.5.5 0 0 1 0 .708L8.707 8.707a.5.5 0 0 1-.707-.707L11.293 5H7.5a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.146.354z"/>
            </svg> -->
            +6281 3345 67695 (Ghifar)
          </li>
        </ul>
      </div>
      </div>
      <div> 

      <div class="bg-[#979797]/10 p-8 mt-10 md:mt-0 rounded-md shadow-lg">
        <h3 class="font-bold text-white mb-2">Subscribe</h3>
        <div class="flex items-center bg-white rounded-md overflow-hidden">
          <input
            type="email"
            placeholder="Email address"
            class="p-2 w-full text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#2d99ff]"
          />
        </div>
        <p class="text-xs mt-2 leading-relaxed text-gray-300">
          Stay updated with our latest news and offers. Join us today to
          revolutionize how you connect with your team and clients.
        </p>
      </div>
    </div>
    </div>

  </div>
</footer>

