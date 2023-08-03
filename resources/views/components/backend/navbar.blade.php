<nav class="w-full h-18 bg-white border-b  border-slate-100  shadow-sm z-50 sticky top-0 ">
    <x-app-partials.container class="flex  items-center h-full justify-between ">
        <a href="{{ url('/') }}">
            <x-app-partials.application-logo/>
        </a>
        <div class="flex items-center w-full justify-between">
            <div class="flex justify-start w-full">
                <div class="ml-10">
                    <x-app-partials.nav-link
                        href="{{ route('admin.dashboard') }}">
                        {{ __('navbar.dashboard') }}
                    </x-app-partials.nav-link>
                </div>
                <div class="ml-4">
                    <x-app-partials.nav-link
                        href="{{ route('company.dashboard') }}">
                        {{ __('navbar.customers') }}
                    </x-app-partials.nav-link>
                </div>
            </div>
            <div class="inline-flex items-center">
                <x-app-partials.nav-link href="{{ route('customer.create') }}" title="Add New Property" class="text-success
                rounded-full border-2 border-success p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-2.5 w-2.5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                    </svg>
                </x-app-partials.nav-link>
                <div
                    x-data="usePopper({placement:'bottom-start',offset:4})"
                    @click.outside="if(isShowPopper) isShowPopper = false"
                    class="inline-flex ml-2">
                    <button
                        x-ref="popperRef"
                        @click="isShowPopper = !isShowPopper"
                        class="avatar h-8 w-8  hover:z-10">
                        <img class="rounded-full ring ring-white dark:ring-navy-700"
                             src="http://127.0.0.1:8000/images/100x100.png" alt="avatar">
                    </button>
                    {{--                <button--}}
                    {{--                    x-ref="popperRef"--}}
                    {{--                    @click="isShowPopper = !isShowPopper"--}}
                    {{--                    class="btn h-8 w-8 rounded-full p-0 bg-slate-300/20 hover:bg-slate-300/40 focus:bg-slate-300/40 active:bg-slate-300/30 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">--}}
                    {{--                    <i class="uil uil-estate icons"></i>--}}
                    {{--                </button>--}}
                    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                        <div
                            class="w-72 popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                            <div class="p-2 flex items-center justify-start space-x-2">
                                <div>
                                    {{ Auth::user()->name }}
                                </div>
                            </div>
                            <ul>
                                <li>

                                </li>
                            </ul>
                            <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                            <ul>
                                <li>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('front.logout') }}">
                                        @csrf
                                        <x-app-partials.dropdown-link :href="route('front.logout')"
                                                                      onclick="event.preventDefault();
                                                                                   this.closest('form').submit();">
                                            {{ __('auth.logout') }}
                                        </x-app-partials.dropdown-link>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </x-app-partials.container>
</nav>




