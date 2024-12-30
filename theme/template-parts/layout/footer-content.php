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
        <p class="text-sm mt-2 leading-relaxed text-gray-300 text-justify font-normal">
        PT KMI Electric Solution (KES) adalah anak perusahaan PT KMI Wire and Cable Tbk dan distributor resmi produk Kabelmetal Indonesia yang menyediakan solusi terbaik dalam distribusi kabel berkualitas tinggi di Indonesia.
        </p> 
        <p class="text-sm mt-2 leading-relaxed text-gray-300">
          <i class="fa fa-map-marker-alt mr-2"></i>
          Jl. Raya Bekasi Km 23.1 – Cakung, Jakarta 13910
        </p>
        <p class="text-sm mt-2">  
          <i class="fa fa-envelope mr-2"></i>
          <a href="mailto:sales@kmielectricsolution.co.id" class="text-white hover:text-[#2E82FF]">sales@kmielectricsolution.co.id</a>
        </p>
        <p class="text-sm mt-2">
          <i class="fa fa-globe mr-2"></i>
          <a href="https://kabelretail.co.id/" class="text-white hover:text-[#2E82FF]">www.kabelretail.co.id</a>
        </p>
        
        <p class="text-sm mt-2">
          <i class="fa fa-phone mr-2"></i>
          +6221 4614952
        </p>
        <div class="flex space-x-4 mt-4"> 
          <a href="https://www.facebook.com/profile.php?id=61565981105742&mibextid=ZbWKwL" target="_blank" aria-label="Facebook" class="text-white hover:text-[#2E82FF] transition duration-300">
            <i class="fab fa-facebook fa-lg"></i>
          </a>
          <a href="https://www.instagram.com/kes_kabelretail?igsh=MWU3OWN1cWxpYzA2Yg==" target="_blank" aria-label="Instagram" class="text-white hover:text-[#2E82FF] transition duration-300">
            <i class="fab fa-instagram fa-lg"></i>
          </a>
          <a href="https://www.tiktok.com/@kes_kabelretail?_t=8sQ2qkaklTs&_r=1" target="_blank" aria-label="TikTok" class="text-white hover:text-[#2E82FF] transition duration-300">
            <i class="fab fa-tiktok fa-lg"></i>
          </a>
          <a href="linkedin" target="_blank" aria-label="TikTok" class="text-white hover:text-[#2E82FF] transition duration-300">
            <i class="fab fa-linkedin fa-lg"></i>
          </a>
        </div>
        </div>

      <div class="col-span-2 flex flex-col md:!flex-row gap-5  mt-8 md:mt-0 pt-0 md:!pt-8 md:justify-between px-0 md:px-10">

      <div class="">
        <h3 class="font-semibold text-sm mb-2">Navigation</h3>
        <ul class="space-y-1 text-sm"> 
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
        <ul class="space-y-1 text-sm">
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
        <ul class="space-y-1 text-sm">
          <li class="flex items-center"> 
            <i class="fa fa-envelope mr-2"></i>
            <a href="mailto:sales@kmielectricsolution.co.id" class="hover:text-[#2E82FF] transition duration-300">sales@kmielectricsolution.co.id</a>
          </li>
          <li class="flex items-center"> 
            <i class="fa fa-phone mr-2"></i>
            +6281 2193 43520 (Luis)
          </li>
          <li class="flex items-center"> 
          <i class="fa fa-phone mr-2"></i>
            +6281 2124 88890 (Alfian)
          </li>
          <li class="flex items-center"> 
          <i class="fa fa-phone mr-2"></i>
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
        Dapatkan berita dan informasi terbaru dengan subscribe newsletter kami.
        </p>
      </div>
    </div>
    </div>

  </div>
</footer>

