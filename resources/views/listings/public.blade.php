<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Public Listings') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Filters and Sorting -->
        <form action="{{ route('listings.public') }}" method="GET" class="mb-8 space-y-6">
            <!-- Include CategoryFilter Component -->
            <x-category-filter :categories="$categories" :selectedCategories="$selectedCategories" />

            <!-- Name, User, and Sorting -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        {{ __('Filter by Name') }}
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ request('name') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-gray-200">
                </div>
                <div>
                    <label for="user" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        {{ __('Filter by User') }}
                    </label>
                    <input
                        type="text"
                        name="user"
                        id="user"
                        value="{{ request('user') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-gray-200">
                </div>
                <div>
                    <label for="sort" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        {{ __('Sort By') }}
                    </label>
                    <select
                        name="sort"
                        id="sort"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-gray-200">
                        <option value="">{{ __('Default: Latest') }}</option>
                        <option value="title:asc" {{ request('sort') == 'title:asc' ? 'selected' : '' }}>
                            {{ __('Name: A-Z') }}
                        </option>
                        <option value="title:desc" {{ request('sort') == 'title:desc' ? 'selected' : '' }}>
                            {{ __('Name: Z-A') }}
                        </option>
                        <option value="created_at:asc" {{ request('sort') == 'created_at:asc' ? 'selected' : '' }}>
                            {{ __('Date: Oldest First') }}
                        </option>
                        <option value="created_at:desc" {{ request('sort') == 'created_at:desc' ? 'selected' : '' }}>
                            {{ __('Date: Newest First') }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2 dark:bg-blue-500 dark:hover:bg-blue-600">
                    {{ __('Apply Filters') }}
                </button>
            </div>
        </form>

        <!-- Listings Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($listings as $listing)
                @php
                    $photos = is_string($listing->photos) ? json_decode($listing->photos, true) : $listing->photos;
                @endphp
                <x-listing-card :listing="$listing" :photos="$photos" />
            @empty
                <div class="text-center col-span-full py-8">
                    <p class="text-gray-800 dark:text-gray-200 text-lg font-semibold">
                        {{ __('No listings found.') }}
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mt-2">
                        {{ __('Try adjusting your filters or search terms.') }}
                    </p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            {{ $listings->links() }}
        </div>
    </div>
</x-app-layout>
