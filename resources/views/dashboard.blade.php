<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Message -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">
                    Welcome, {{ auth()->user()->name }}!
                </h1>
                <p class="mt-2 text-gray-600 dark:text-gray-200">
                    This is your dashboard. From here you can manage your profile, view and create listings, and more.
                </p>
            </div>

            <!-- Quick Links / Listings Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Manage Listings Section -->
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 flex flex-col">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Manage Listings</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-200 mt-2">
                            You have {{ \App\Models\Listing::where('user_id', auth()->id())->count() }} active listings.
                        </p>
                    </div>
                    <div class="mt-4 flex space-x-4">
                        <!-- View Listings -->
                        <a href="{{ route('listings.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                            {{ __('View Listings') }}
                        </a>

                        <!-- Add New Listing -->
                        <a href="{{ route('listings.create') }}" class="text-green-600 dark:text-green-400 hover:underline">
                            {{ __('Add New Listing') }}
                        </a>

                        <!-- Public Listings -->
                        <a href="{{ route('listings.public') }}" class="text-purple-600 dark:text-purple-400 hover:underline">
                            {{ __('Public Listings') }}
                        </a>
                    </div>
                </div>

                <!-- Analytics & Reports Section -->
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Analytics & Reports</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-200 mt-2">
                            Coming soon: View performance analytics for your profile and listings.
                        </p>
                    </div>
                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Learn More</a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
