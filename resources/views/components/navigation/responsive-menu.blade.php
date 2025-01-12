<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <!-- Responsive Navigation Links -->
    <div class="pt-2 pb-3 space-y-1">
        <!-- Dashboard Link -->
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>

        <!-- Responsive Listings Dropdown -->
        <div x-data="{ openListings: false }" class="pt-2">
            <button @click="openListings = ! openListings" class="w-full text-left text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-900 px-4 py-2 rounded-md">
                {{ __('Listings') }}
                <svg class="inline h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown Content -->
            <div x-show="openListings" class="mt-2 space-y-1 bg-gray-50 dark:bg-gray-800 rounded-md shadow-md">
                <x-responsive-nav-link href="{{ route('listings.public') }}" :active="request()->routeIs('listings.public')">
                    {{ __('Public Listings') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('listings.create') }}" :active="request()->routeIs('listings.create')">
                    {{ __('Create Listing') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('listings.index') }}" :active="request()->routeIs('listings.index')">
                    {{ __('View Listings') }}
                </x-responsive-nav-link>
            </div>
        </div>
    </div>

    <!-- Responsive Theme Toggle -->
    <div class="pt-2 pb-3 space-y-1">
        <button id="responsive-theme-toggle" class="w-full text-left text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-900 px-4 py-2 rounded-md">
            {{ __('Toggle Theme') }}
            <i id="responsive-theme-icon" class="fas fa-moon ml-2"></i> <!-- Icon toggles between fa-moon and fa-sun -->
        </button>
    </div>

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
        <div class="px-4">
            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
        </div>
        <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</div>
