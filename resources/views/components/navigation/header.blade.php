<!-- ========== HEADER ========== -->
<header
    class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48]  bg-white text-sm py-2.5 dark:bg-[#080F25] rounded-t-[30px]">
    <nav class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto">
        <div class="flex me-5 lg:me-0 lg:hidden">

            <!-- Logo -->
            <a wire:navigate.hover
                class=" rounded-xl text-xl font-semibold focus:outline-none focus:opacity-80 text-white"
                href="{{ route('dashboard') }}" aria-label="Preline">
                {{ config('app.name', 'Laravel') }}
            </a>
            <!-- End Logo -->


        </div>
        <div class="w-full flex items-center justify-between ms-auto  gap-x-1 md:gap-x-3">
            <!-- Logo -->
            <a wire:navigate.hover
                class=" rounded-xl text-xl font-semibold focus:outline-none focus:opacity-80 text-white"
                href="{{ route('dashboard') }}" aria-label="Preline">
                {{ config('app.name', 'Laravel') }}
            </a>
            <!-- End Logo -->
            <!-- Dropdown -->
            <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                <button id="hs-dropdown-account" type="button"
                    class="size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent focus:outline-none disabled:opacity-50 disabled:pointer-events-none text-white"
                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    @if (Auth::user()->profile_photo_url)
                    <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                    @endif
                </button>
                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-gradient-to-br from-gray-900/95 to-gray-800/95 backdrop-blur-md rounded-2xl border border-white/10 shadow-[0_0_30px_rgba(79,70,229,0.15)] mt-2  dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full text-gray-50 overflow-hidden"
                    role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-account">
                    <div
                        class="py-3 px-5 bg-gradient-to-br from-gray-900/95 to-gray-800/95 backdrop-blur-md rounded-2xl border border-white/10 shadow-[0_0_30px_rgba(79,70,229,0.15)]">
                        <p class="text-sm ">Sesión iniciada</p>

                        <p class="text-sm font-medium text-neutral-50">{{ Auth::user()->name }}
                        </p>
                    </div>
                    <div class="p-1.5 space-y-0.5">
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a href="{{ route('logout') }} "
                                class=" flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm hover:text-neutral-300 focus:bg-neutral-700 focus:text-neutral-300"
                                @click.prevent="$root.submit();">

                                Cerrar sesión
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Dropdown -->
        </div>
    </nav>
</header>
<!-- ========== END HEADER ========== -->