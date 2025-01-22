<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <!-- Dashboard Link -->
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>

    <!-- UYE Dropdown -->
    <div class="relative">
        <x-dropdown>
            <x-slot name="trigger">
                <button
                    class="inline-flex items-center text-sm font-medium text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-400 focus:outline-none transition"
                    style="padding-top: 22px; padding-bottom: 6px;"
                >
                    <span>{{ __('UYE') }}</span>
                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </x-slot>

            <x-slot name="content">
                <div
                    class="absolute mt-2 w-48 bg-white dark:bg-gray-800 shadow-lg rounded-md py-1 z-50"
                    style="top: 10px; left: 10px;"
                >
                    <!-- Business Profile -->
                    @if(auth()->user()->businessProfile)
                        <x-dropdown-link
                            href="{{ route('business-profiles.show', ['id' => auth()->user()->businessProfile->id]) }}"
                            :active="request()->routeIs('business-profiles.show')">
                            {{ __('Show Business Profile') }}
                        </x-dropdown-link>
                    @endif
                    <x-dropdown-link href="{{ route('business-profiles.create') }}" :active="request()->routeIs('business-profiles.create')">
                        {{ __('Create Business Profile') }}
                    </x-dropdown-link>

                    <!-- Listings -->
                    <x-dropdown-link href="{{ route('listings.index') }}" :active="request()->routeIs('listings.index')">
                        {{ __('View My Listings') }}
                    </x-dropdown-link>
                    <x-dropdown-link href="{{ route('listings.create') }}" :active="request()->routeIs('listings.create')">
                        {{ __('Create New Listing') }}
                    </x-dropdown-link>
                    <x-dropdown-link href="{{ route('listings.public') }}" :active="request()->routeIs('listings.public')">
                        {{ __('Public Listings') }}
                    </x-dropdown-link>
                </div>
            </x-slot>
        </x-dropdown>
    </div>

    <!-- Projects Dropdown -->
    <div class="relative">
        <x-dropdown>
            <x-slot name="trigger">
                <button
                    class="inline-flex items-center text-sm font-medium text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-400 focus:outline-none transition"
                    style="padding-top: 22px; padding-bottom: 6px;"
                >
                    <span>{{ __('Projects') }}</span>
                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </x-slot>

            <x-slot name="content">
                <div
                    class="absolute mt-2 w-48 bg-white dark:bg-gray-800 shadow-lg rounded-md py-1 z-50"
                    style="top: 10px; left: 10px;"
                >
                    <!-- TekaTeki -->
                    <x-dropdown-link href="{{ route('teka-teki.index') }}" :active="request()->routeIs('teka-teki.index')">
                        {{ __('TekaTeki - Quizzes') }}
                    </x-dropdown-link>

                    <!-- Veyoyee -->
                    <x-dropdown-link href="{{ route('veyoyee.index') }}" :active="request()->routeIs('veyoyee.index')">
                        {{ __('Veyoyee - Surveys') }}
                    </x-dropdown-link>

                    <!-- JobMatch -->
                    <x-dropdown-link href="{{ route('jobmatch.index') }}" :active="request()->routeIs('jobmatch.index')">
                        {{ __('JobMatch - Jobs') }}
                    </x-dropdown-link>

                    <!-- SlideMarket -->
                    <x-dropdown-link href="{{ route('slide-market.index') }}" :active="request()->routeIs('slide-market.index')">
                        {{ __('SlideMarket - Slides') }}
                    </x-dropdown-link>
                </div>
            </x-slot>
        </x-dropdown>
    </div>
</div>
