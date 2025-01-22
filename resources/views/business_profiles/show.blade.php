<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $businessProfile->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Business Info -->
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <div class="flex items-center space-x-4">
                    <!-- Logo -->
                    @if ($businessProfile->logo)
                        <img src="{{ asset('storage/' . $businessProfile->logo) }}" alt="{{ $businessProfile->name }}"
                             class="w-20 h-20 rounded-full">
                    @endif
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">
                            {{ $businessProfile->name }}
                        </h1>
                        <p class="text-sm text-gray-600 dark:text-gray-200 mt-2">
                            {{ $businessProfile->description }}
                        </p>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="text-sm text-gray-600 dark:text-gray-200">
                        <strong>Contact Email:</strong> {{ $businessProfile->contact_email ?? 'Not provided' }}
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-200">
                        <strong>Contact Phone:</strong> {{ $businessProfile->contact_phone ?? 'Not provided' }}
                    </p>
                </div>
            </div>

            <!-- Listings -->
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Listings</h2>
                @if ($businessProfile->user && $businessProfile->user->listings->isNotEmpty())
                    <ul class="space-y-4">
                        @foreach ($businessProfile->listings as $listing)
                            <li class="p-4 bg-gray-100 dark:bg-gray-900 rounded-lg shadow">
                                <!-- Thumbnail -->
                                <img src="{{ $listing->photos[0] ?? asset('default-image.jpg') }}" alt="{{ $listing->title }}"
                                    class="w-full h-32 object-cover rounded-lg mb-2">

                                <!-- Clickable Title -->
                                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100">
                                    <a href="{{ route('listings.show', $listing->id) }}" class="text-blue-600 hover:underline">
                                        {{ $listing->title }}
                                    </a>
                                </h3>

                                <!-- Description -->
                                <p class="text-sm text-gray-600 dark:text-gray-200">
                                    {{ $listing->description }}
                                </p>

                                <!-- View Details Link -->
                                <a href="{{ route('listings.show', $listing->id) }}"
                                class="text-indigo-600 dark:text-indigo-400 hover:underline">
                                    View Details
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-gray-600 dark:text-gray-200">No listings available.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
