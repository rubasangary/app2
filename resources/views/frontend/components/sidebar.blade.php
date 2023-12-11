<aside
class="hidden w-64 overflow-y-auto bg-black lg:block flex-shrink-0">
<div class="text-gray-500 dark:text-gray-400">

  <a href="/">
        <img src="{{ asset('/images/valarha.png') }}" class="w-48" alt="">
  </a>

  <ul class="mt-2">
    <li class="relative px-6 py-1">
      <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700 active:bg-blue-700
      {{ Request::is('/*') ? 'bg-blue-700' : '' }}"
        href="/">
        <i class="fa-solid fa-house ml-2" style="color: #477af0;"></i>
        <span class="ml-2">Home</span>
      </a>
    </li>

    <li class="relative px-6 py-1">
        <a href="{{ route('forum') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
        {{ Request::is('ஊர்-புதினம்*') ? 'bg-blue-700' : '' }}">
        <i class="fa-solid fa-drum fa-lg ml-2" style="color: #0a5ae6;"></i>
        <span class="ml-2">ஊர் புதினம்</span>
      </a>
    </li>
  </ul>

  <br>

  <ul>

    <li class="relative px-6 py-1">
        <a href="{{ route('farmers-market') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
        {{ Request::is('farmers-market*') ? 'bg-blue-700' : '' }}">
        <i class="fa-solid fa-tractor ml-2" style="color: #2f9504;"></i>
        <span class="ml-2">உழவர் சந்தை</span>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="{{ url('vehicles') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
      {{ Request::is('vehicles*') ? 'bg-blue-700' : '' }}">
        <i class="fa-solid fa-car ml-2" style="color: #fff700;"></i>
        <span class="ml-2">வாகனம்</span>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="{{ url('property') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
      {{ Request::is('property*') ? 'bg-blue-700' : '' }}">
        <i class="fa-solid fa-building ml-2" style="color: #aa5a5a;"></i>
        <span class="ml-2">சொத்து (Property)</span>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="{{ url('fashion') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
       {{ Request::is('fashion*') ? 'bg-blue-700':'' }}">
        <i class="fa-solid fa-shirt ml-2" style="color: #d24196;"></i>
        <span class="ml-2">துணிமணி</span>
        <i class="fa-solid fa-bag-shopping ml-2" style="color: #d24196;"></i>
        <i class="fa-solid fa-shoe-prints ml-2" style="color: #d24196;"></i>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="{{ url('sportswear-and-equipments') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
       {{ Request::is('sports-wear-and-equipments*') ? 'bg-blue-700':'' }}">
        <i class="fa-solid fa-baseball-bat-ball ml-2" style="color: #08f804;"></i>
        <span class="ml-2">விளையாட்டு</span>
        <i class="fa-solid fa-trophy ml-2"style="color: #08f804;"></i>
        <i class="fa-solid fa-child-reaching ml-2" style="color: #08f804;"></i>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="{{ url('phones-tablets-and-appliances') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
      {{ Request::is('phones-tablets-and-appliances*') ? 'bg-blue-700':'' }}">
        <i class="fa-solid fa-plug ml-2" style="color: #5a92f2;"></i>
        <span class="ml-2">மின்சாதனம்</span>
        <i class="fa-solid fa-mobile-screen ml-2" style="color: #5a92f2;"></i>
        <i class="fa-solid fa-desktop ml-2" style="color: #5a92f2;"></i>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="{{ url('homeware') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
      {{ Request::is('homeware*') ? 'bg-blue-700':'' }}">
        <i class="fa-sharp fa-solid fa-chair ml-2" style="color: #ee6820;"></i>
        <span class="ml-2">தட்டுமுட்டு</span>
        <i class="fa-solid fa-kitchen-set ml-2" style="color: #ee6820;"></i>
        <i class="fa-solid fa-mortar-pestle ml-2" style="color: #ee6820;"></i>
      </a>
    </li>

    <br>

    <li class="relative px-6 py-1">
      <a href="{{ url('jobs-search-in-sri-lanka') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700 {{ Request::is('ads/profile*') ? 'bg-blue-700':'' }}">
        <i class="fa-solid fa-person-digging ml-2" style="color: #66f5e4;"></i>
        <span class="ml-2">வேலை வாய்ப்பு</span>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700 {{ Request::is('ads/profile*') ? 'bg-blue-700':'' }}">
        <i class="fa-solid fa-hammer ml-2" style="color: #b971f4;"></i>
        <span class="ml-2">வணிக பட்டியல்</span>
        <i class="fa-solid fa-taxi ml-2" style="color: #b971f4;"></i>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700 {{ Request::is('ads/profile*') ? 'bg-blue-700':'' }}">
        <i class="fa-solid fa-utensils ml-2" style="color: #10f000;"></i>
        <span class="ml-2">சாப்பாடு</span>
        <i class="fa-solid fa-pizza-slice ml-2" style="color: #f0e000;"></i>
      </a>
    </li>

    <br>

    <li class="relative px-6 py-1">
      <a href="{{ url('contact') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700 {{ Request::is('contact*') ? 'bg-blue-700':'' }}">
        <i class="fa-solid fa-file-signature ml-2" style="color: #7c7b7b;"></i>
        <span class="ml-2">Contact Us</span>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="{{ url('privacy-policy') }}" target="_blank" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700">
        <i class="fa-solid fa-file-shield ml-2" style="color: #d1922d;"></i>
        <span class="ml-2">Privacy Policy</span>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="{{ url('terms-of-service') }}" target="_blank" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700">
        <i class="fa-solid fa-file-lines ml-2" style="color: #235ab8;"></i>
        <span class="ml-2">Terms of Service</span>
      </a>
    </li>

  </ul>
</div>
</aside>
<!-- Mobile sidebar -->


<!-- Backdrop -->
<div
x-show="isSideMenuOpen"
x-transition:enter="transition ease-in-out duration-500"
x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in-out duration-500"
x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0"
class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
></div>

<aside
class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-gray-100 dark:bg-gray-800 lg:hidden"
x-show="isSideMenuOpen"
x-transition:enter="transition ease-in-out duration-300"
x-transition:enter-start="opacity-0 transform -translate-x-20"
x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in-out duration-300"
x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0 transform -translate-x-20"
@click.away="closeSideMenu"
@keydown.escape="closeSideMenu"
>

<div class="text-gray-800 dark:text-gray-300">
    <a href="">
        <img src="{{ asset('/images/valarha.png') }}" class="w-36" alt="Logo">
  </a>
  <ul class="">
    <li class="relative px-6 py-1">
      <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700 active:bg-blue-700
      {{ Request::is('/*') ? 'bg-blue-700' : '' }}"
        href="/">
        <i class="fa-solid fa-house ml-2" style="color: #477af0;"></i>
        <span class="ml-2 text-gray-800 dark:text-gray-300">Home</span>
      </a>
    </li>

    <li class="relative px-6 py-1">
        <a href="{{ route('forum') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
        {{ Request::is('ஊர்-புதினம்*') ? 'bg-blue-700' : '' }}">
        <i class="fa-solid fa-drum ml-2" style="color: #0a5ae6;"></i>
        <span class="ml-2 text-gray-800 dark:text-gray-300">ஊர் புதினம்</span>
      </a>
    </li>
  </ul>

  <ul>

    <li class="relative px-6 py-1">
        <a href="{{ route('farmers-market') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
        {{ Request::is('farmers-market*') ? 'bg-blue-700' : '' }}">
        <i class="fa-solid fa-tractor ml-2" style="color: #2f9504;"></i>
        <span class="ml-2 text-gray-800 dark:text-gray-300">உழவர் சந்தை</span>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="{{ url('vehicles') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
      {{ Request::is('vehicles*') ? 'bg-blue-700' : '' }}">
        <i class="fa-solid fa-car ml-2" style="color: #dad303;"></i>
        <span class="ml-2 text-gray-800 dark:text-gray-300">வாகனம்</span>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="{{ url('property') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
      {{ Request::is('property*') ? 'bg-blue-700' : '' }}">
        <i class="fa-solid fa-building ml-2" style="color: #aa5a5a;"></i>
        <span class="ml-2 text-gray-800 dark:text-gray-300">சொத்து (Property)</span>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="{{ url('fashion') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
       {{ Request::is('fashion*') ? 'bg-blue-700':'' }}">
        <i class="fa-solid fa-shirt ml-2" style="color: #c52984;"></i>
        <span class="ml-2 text-gray-800 dark:text-gray-300">துணிமணி</span>
        <i class="fa-solid fa-bag-shopping ml-2" style="color: #c52984;"></i>
        <i class="fa-solid fa-shoe-prints ml-2" style="color: #c52984;"></i>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="{{ url('sportswear-and-equipments') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
       {{ Request::is('sports-wear-and-equipments*') ? 'bg-blue-700':'' }}">
        <i class="fa-solid fa-baseball-bat-ball ml-2" style="color: #39bc37;"></i>
        <span class="ml-2 text-gray-800 dark:text-gray-300">விளையாட்டு</span>
        <i class="fa-solid fa-trophy ml-2" style="color: #39bc37;"></i>
        <i class="fa-solid fa-child-reaching ml-2" style="color: #39bc37;"></i>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="{{ url('phones-tablets-and-appliances') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
      {{ Request::is('phones-tablets-and-appliances*') ? 'bg-blue-700':'' }}">
        <i class="fa-solid fa-plug ml-2" style="color: #2a67d2;"></i>
        <span class="ml-2 text-gray-800 dark:text-gray-300">மின்சாதனம்</span>
        <i class="fa-solid fa-mobile-screen ml-2" style="color: #2a67d2;"></i>
        <i class="fa-solid fa-desktop ml-2" style="color: #2a67d2;"></i>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="{{ url('homeware') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
      {{ Request::is('homeware*') ? 'bg-blue-700':'' }}">
        <i class="fa-sharp fa-solid fa-chair ml-2" style="color: #b24e19;"></i>
        <span class="ml-2 text-gray-800 dark:text-gray-300">தட்டுமுட்டு</span>
        <i class="fa-solid fa-kitchen-set ml-2" style="color: #b24e19;"></i>
        <i class="fa-solid fa-mortar-pestle ml-2" style="color: #b24e19;"></i>
      </a>
    </li>

    <br>

    <li class="relative px-6 py-1">
      <a href="{{ url('jobs-search-in-sri-lanka') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700 {{ Request::is('ads/profile*') ? 'bg-blue-700':'' }}">
        <i class="fa-solid fa-person-digging ml-2" style="color: #059bb2;"></i>
        <span class="ml-2 text-gray-800 dark:text-gray-300">வேலை வாய்ப்பு</span>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700 {{ Request::is('ads/profile*') ? 'bg-blue-700':'' }}">
        <i class="fa-solid fa-hammer ml-2" style="color: #b971f4;"></i>
        <span class="ml-2 text-gray-800 dark:text-gray-300">வணிக பட்டியல்</span>
        <i class="fa-solid fa-taxi ml-2" style="color: #b971f4;"></i>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700 {{ Request::is('ads/profile*') ? 'bg-blue-700':'' }}">
        <i class="fa-solid fa-utensils ml-2" style="color: #14890c;"></i>
        <span class="ml-2 text-gray-800 dark:text-gray-300">சாப்பாடு</span>
        <i class="fa-solid fa-pizza-slice ml-2" style="color: #f0e000;"></i>
      </a>
    </li>

    <br>

    <li class="relative px-6 py-1">
      <a href="{{ url('contact') }}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700 {{ Request::is('contact*') ? 'bg-blue-700':'' }}">
        <i class="fa-solid fa-file-signature ml-2" style="color: #7c7b7b;"></i>
        <span class="ml-2 text-gray-800 dark:text-gray-300">Contact Us</span>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="{{ url('privacy-policy') }}" target="_blank" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700">
        <i class="fa-solid fa-file-shield ml-2" style="color: #d1922d;"></i>
        <span class="ml-2 text-gray-800 dark:text-gray-300">Privacy Policy</span>
      </a>
    </li>

    <li class="relative px-6 py-1">
      <a href="{{ url('terms-of-service') }}" target="_blank" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700">
        <i class="fa-solid fa-file-lines ml-2" style="color: #2d69d1;"></i>
        <span class="ml-2 text-gray-800 dark:text-gray-300">Terms of Service</span>
      </a>
    </li>

  </ul>
  <div class="px-6 my-6">

  </div>
</div>
</aside>
