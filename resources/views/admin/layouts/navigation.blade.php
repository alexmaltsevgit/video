<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Админ-панель') }}
                    </x-nav-link>
                </div>
            </div>


            <form method="POST" action="{{ route('admin.logout') }}" class="flex items-center">
                @csrf

                <x-dropdown-link :href="route('admin.logout')"
                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Выйти') }}
                </x-dropdown-link>
            </form>
        </div>
    </div>
</nav>
