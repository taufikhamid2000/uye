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

            <!-- Projects Section -->
            @foreach ($projects as $type => $name)
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">{{ $name }}</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-200 mt-2">
                        Manage your listings for the {{ $name }} project.
                    </p>
                    <div class="mt-4 flex space-x-4">
                        <!-- View Public Listings -->
                        <a href="{{ route('listings.public', ['type' => $type]) }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                            {{ __('View Public Listings') }}
                        </a>

                        <!-- Add New Listing -->
                        <a href="{{ route('listings.create', ['type' => $type]) }}" class="text-green-600 dark:text-green-400 hover:underline">
                            {{ __('Add New Listing') }}
                        </a>

                        <!-- Manage Listings -->
                        <a href="{{ route('listings.index', ['type' => $type]) }}" class="text-purple-600 dark:text-purple-400 hover:underline">
                            {{ __('Manage Listings') }}
                        </a>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
