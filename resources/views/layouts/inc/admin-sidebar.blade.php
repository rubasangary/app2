<aside class="hidden w-64 overflow-y-auto bg-black lg:block flex-shrink-0">
    <div class="">

        <div class="p-6">
            <a href="index.html" class="text-gray-300 text-2xl font-semibold uppercase">Valarha.com</a>
        </div>

        <nav class="text-white text-base font-semibold pt-3">

            <ul>
                <div class="sb-sidenav-menu-heading text-gray-400 relative px-6 py-2">BLOGS</div>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/forum*') ? 'bg-blue-700':'' }}
                    ">

                    <i class="fa-solid fa-rectangle-list fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>ஊர் புதினம்</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/forum') }}">
                            Manage Forum
                        </a>
                    </div>
                </li>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/add-category*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/category*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-folder-closed fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>Post Category</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/add-category') }}">
                            Add category
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/category') }}">
                            View category
                        </a>
                    </div>
                </li>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/all-posts*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/pending-posts*') ? 'bg-blue-700':'' }}">
                    <i class="fa-regular fa-address-card fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>All Posts</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ Route('all-posts') }}">
                            published Posts
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ Route('pending-posts') }}">
                            Unpublished Posts
                        </a>
                    </div>
                </li>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/add-post*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/posts*') ? 'bg-blue-700':'' }}">
                    <i class="fa-regular fa-address-card fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>Posts</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/add-post') }}">
                            Add Post
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/posts') }}">
                            View Post
                        </a>
                    </div>
                </li>

                <div class="sb-sidenav-menu-heading text-gray-400 relative px-6 py-2">ADVERTISEMENT</div>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/add-adscategory*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/adscategory*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-rectangle-ad fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>Ads Category</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/add-adscategory') }}">
                            Add Category
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/adscategory') }}">
                            View Category
                        </a>
                    </div>
                </li>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/add-subcategory*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/subcategory*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-rectangle-ad fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>Subcategory</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/add-subcategory') }}">
                            Add Subcategory
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/subcategory') }}">
                            View Subcategory
                        </a>
                    </div>
                </li>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/add-childcategory*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/childcategory*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-rectangle-ad fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>Childcategory</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/add-childcategory') }}">
                            Add Childcategory
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/childcategory') }}">
                            View Childcategory
                        </a>
                    </div>
                </li>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/published-ads*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/unpublished-ads*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/reported-ads*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-rectangle-ad fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>All Adverts</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('all.published.ads') }}">
                            All Published Ads
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('all.unpublished.ads') }}">
                            Unpublished Ads
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('all.reported.ads') }}">
                            Reported Ads
                        </a>
                    </div>
                </li>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">
                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/show-jobs*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/pending-jobs*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-rectangle-ad fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>All Jobs</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('admin.showJobs') }}">
                            Published Jobs
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('admin.pendingJobs') }}">
                            Pending Jobs
                        </a>
                    </div>
                </li>


                <div class="sb-sidenav-menu-heading text-gray-400 relative px-6 py-2">USERS</div>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/users*') ? 'bg-blue-700':'' }}
                    ">

                    <i class="fa-solid fa-rectangle-ad fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>Users</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/users') }}">
                            All Users
                        </a>
                    </div>
                </li>

            </ul>
        </nav>
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
class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
</div>

<aside
class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-black lg:hidden"
x-show="isSideMenuOpen"
x-transition:enter="transition ease-in-out duration-300"
x-transition:enter-start="opacity-0 transform -translate-x-20"
x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in-out duration-300"
x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0 transform -translate-x-20"
@click.away="closeSideMenu"
@keydown.escape="closeSideMenu">

    <div class="text-gray-800 dark:text-gray-300">
        <div class="p-6">
            <a href="index.html" class="text-gray-300 text-2xl font-semibold uppercase">Valarha.com</a>
        </div>

        <nav class="text-white text-base font-semibold pt-3">

            <ul>
                <div class="sb-sidenav-menu-heading text-gray-400 relative px-6 py-2">BLOGS</div>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/forum*') ? 'bg-blue-700':'' }}
                    ">

                    <i class="fa-solid fa-rectangle-ad fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>ஊர் புதினம்</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/forum') }}">
                            Manage Forum
                        </a>
                    </div>
                </li>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/add-category*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/category*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-folder-closed fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>Post Category</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/add-category') }}">
                            Add category
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/category') }}">
                            View category
                        </a>
                    </div>
                </li>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/all-posts*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/pending-posts*') ? 'bg-blue-700':'' }}">
                    <i class="fa-regular fa-address-card fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>All Posts</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ Route('all-posts') }}">
                            published Posts
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ Route('pending-posts') }}">
                            Unpublished Posts
                        </a>
                    </div>
                </li>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/add-post*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/posts*') ? 'bg-blue-700':'' }}">
                    <i class="fa-regular fa-address-card fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>Posts</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/add-post') }}">
                            Add Post
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/posts') }}">
                            View Post
                        </a>
                    </div>
                </li>

                <div class="sb-sidenav-menu-heading text-gray-400 relative px-6 py-2">ADVERTISEMENT</div>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/add-adscategory*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/adscategory*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-rectangle-ad fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>Ads Category</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/add-adscategory') }}">
                            Add Category
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/adscategory') }}">
                            View Category
                        </a>
                    </div>
                </li>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/add-subcategory*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/subcategory*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-rectangle-ad fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>Subcategory</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/add-subcategory') }}">
                            Add Subcategory
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/subcategory') }}">
                            View Subcategory
                        </a>
                    </div>
                </li>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/add-childcategory*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/childcategory*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-rectangle-ad fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>Childcategory</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/add-childcategory') }}">
                            Add Childcategory
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/childcategory') }}">
                            View Childcategory
                        </a>
                    </div>
                </li>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/published-ads*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/unpublished-ads*') ? 'bg-blue-700':'' }}
                    {{ Request::is('admin23/reported-ads*') ? 'bg-blue-700':'' }}">
                    <i class="fa-solid fa-rectangle-ad fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>All Adverts</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('all.published.ads') }}">
                            All Published Ads
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('all.unpublished.ads') }}">
                            All Unpublished Ads
                        </a>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ route('all.reported.ads') }}">
                            All Reported Ads
                        </a>
                    </div>
                </li>

                <div class="sb-sidenav-menu-heading text-gray-400 relative px-6 py-2">USERS</div>

                <li x-data="{open:false}" @click.away="open = false" class="relative px-6 py-2">

                    <a @click="open=!open" x-cloak class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 py-2 rounded-md text-gray-200 hover:bg-blue-700
                    {{ Request::is('admin23/users*') ? 'bg-blue-700':'' }}
                    ">

                    <i class="fa-solid fa-rectangle-ad fa-lg mx-2" style="color: #36af0e;"></i>
                    <span>Users</span>
                    </a>

                    <div x-show="open" x-cloak>
                        <a  class="pl-6 text-sm font-semibold inline-flex items-center w-full transition-colors duration-150 mt-2 py-1 text-white bg-green-700 hover:bg-green-500 transition-500" href="{{ url('admin23/users') }}">
                            Manage Users
                        </a>
                    </div>
                </li>

            </ul>
        </nav>
    </div>
</aside>
