<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <x-navigation.logo />

                <!-- Navigation Links -->
                <x-navigation.links />
            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">
                <!-- Theme Toggle -->
                <x-navigation.theme-toggle />

                <!-- User Dropdown -->
                <x-navigation.user-dropdown />
            </div>

            <!-- Hamburger Menu -->
            <x-navigation.hamburger />
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <x-navigation.responsive-menu />
</nav>
