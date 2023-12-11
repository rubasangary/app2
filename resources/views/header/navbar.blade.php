<header class="z-40 py-4 bg-gray-100 dark:bg-gray-900">
    <div
      class="container flex items-center justify-between h-full px-2 mx-auto text-blue-600"
    >
      <!-- Mobile hamburger -->
      <button
        class="p-1 mr-5 lg:hidden focus:outline-none"
        @click="toggleSideMenu"
        aria-label="Menu"
      >
      <i class="fa-solid fa-bars fa-lg"></i>
      </button>

      <!-- social icons -->
      <div class="flex item-start ml-2 gap-8 flex-1 lg:mr-32">

        <a href="https://www.facebook.com/foodfor4all"><i class="fa-brands fa-facebook fa-xl"></i></a>
        {{-- <a href="https://www.youtube.com/@valarha/featured"><i class="fa-brands fa-youtube fa-xl lg:ml-5" style="color: #df4949;"></i></a> --}}

      </div>
      <!-- social icons end -->
      <ul class="flex items-center flex-shrink-0 space-x-8 mr-5">

        <!-- Theme toggler -->
        <li class="flex">
          <button
            class="text-xl w-8 h-8 rounded-full bg-gray-300 focus:outline-none dark:bg-gray-700 hover:bg-sky-400 "
            @click="toggleTheme"
            aria-label="Toggle color mode"
          >
            <template x-if="!dark">
              <i class="fa-solid fa-moon"></i>
            </template>

            <template x-if="dark">
              <i class="fa-regular fa-lightbulb"></i>
            </template>

          </button>
        </li>

        <!-- Profile menu -->
        <li class="relative">
          @if (auth()->check())

                            <div >
                                    <div
                                        x-data="{ open: false,
                                            toggle() {
                                                if (this.open) {
                                                    return this.close()
                                                }

                                                this.$refs.button.focus()

                                                this.open = true
                                            },
                                            close(focusAfter) {
                                                if (! this.open) return

                                                this.open = false

                                                focusAfter && focusAfter.focus()
                                            }
                                        }"

                                        x-on:keydown.escape.prevent.stop="close($refs.button)"
                                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                        x-id="['dropdown-button']"
                                        class="relative"
                                    >
                                    <!-- Button -->
                                    <button
                                        x-ref="button"
                                        x-on:click="toggle()"
                                        :aria-expanded="open"
                                        :aria-controls="$id('dropdown-button')"
                                        type="button"
                                        class="flex items-center focus:outline-none"
                                    >

                                            <img
                                                class="object-cover w-8 h-8 rounded-full"
                                                src="{{ auth()->user()->profile_photo_url }}"
                                                alt="Avatar"
                                                aria-hidden="true"
                                            />


                                    </button>

                                    <!-- Panel -->
                                    <div
                                        x-ref="panel"
                                        x-show="open"
                                        x-transition.origin.top.left
                                        x-on:click.outside="close($refs.button)"
                                        :id="$id('dropdown-button')"
                                        style="display: none;"
                                        class="absolute right-0 mt-2 w-60 rounded-md bg-gray-50 font-semibold shadow-xl dark:bg-gray-800 divide-y divide-gray-700"
                                    >
                                        <a href="/user/dashboard" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left hover:bg-blue-400 dark:hover:bg-gray-900">
                                            <span><i class="fa-solid fa-gauge"></i></span>
                                            Dashbord
                                        </a>

                                        <a href="/user/account" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left hover:bg-blue-400 dark:hover:bg-gray-900">
                                            <i class="fa-solid fa-address-card"></i>
                                            Account
                                        </a>

                                        <a href="/message" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left hover:bg-blue-400 dark:hover:bg-gray-900">
                                            <span><i class="fa-regular fa-message"></i></span>
                                            Messages
                                        </a>

                                        <div>
                                            <a class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left hover:bg-blue-400 dark:hover:bg-gray-900"
                                                        href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                <span><i class="fa-solid fa-right-from-bracket"></i></span>
                                                            Log out
                                            </a>

                                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                @csrf
                                        </form>
                                        </div>

                                    </div>


                                </div>
                            </div>

                            <!-- unsigned user section -->
                            @else
                                <div>
                                        <div
                                            x-data="{ open: false,
                                                toggle() {
                                                    if (this.open) {
                                                        return this.close()
                                                    }

                                                    this.$refs.button.focus()

                                                    this.open = true
                                                },
                                                close(focusAfter) {
                                                    if (! this.open) return

                                                    this.open = false

                                                    focusAfter && focusAfter.focus()
                                                }
                                            }"

                                        x-on:keydown.escape.prevent.stop="close($refs.button)"
                                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                        x-id="['dropdown-button2']"
                                        class="relative"
                                        >
                                        <!-- Button -->
                                        <button
                                            x-ref="button"
                                            x-on:click="toggle()"
                                            :aria-expanded="open"
                                            :aria-controls="$id('dropdown-button2')"
                                            type="button"
                                            class="flex items-center focus:outline-none"
                                        >
                                        <i class="fa-solid fa-user-xmark"></i>
                                        </button>

                                        <!-- Panel -->
                                <div
                                        x-ref="panel"
                                        x-show="open"
                                        x-transition.origin.top.left
                                        x-on:click.outside="close($refs.button)"
                                        :id="$id('dropdown-button')"
                                        style="display: none;"
                                        class="absolute right-0 mt-8 w-60 rounded-md bg-gray-50 font-semibold shadow-xl dark:bg-gray-800 divide-y divide-gray-700"
                                    >
                                        <a href="{{ route('login') }}" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left hover:bg-blue-400 dark:hover:bg-gray-900">
                                            <span><i class="fa-solid fa-arrow-right-to-bracket"></i></span>
                                            Log In
                                        </a>

                                        <a href="{{ route('register') }}" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left hover:bg-blue-400 dark:hover:bg-gray-900">
                                            <span><i class="fa-regular fa-address-card"></i></span>
                                            Register
                                        </a>

                                </div>
                            </div>
                        </div>

                        @endif

        </li>
      </ul>
    </div>
  </header>
