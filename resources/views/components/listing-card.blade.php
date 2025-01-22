<div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
    <!-- Listing Image -->
    <img src="{{ $photos && count($photos) > 0 ? $photos[0] : asset('default-image.jpg') }}"
         alt="{{ $listing->title }}"
         class="w-full h-48 object-cover">

    <!-- Listing Details -->
    <div class="p-6">
        <!-- Clickable Title -->
        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">
            <a href="{{ route('listings.show', ['id' => $listing->id]) }}" class="text-blue-600 hover:underline">
                {{ $listing->title }}
            </a>
        </h3>

        <!-- Description -->
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ Str::limit($listing->description, 100) }}
        </p>

        <!-- Category -->
        <p class="text-sm text-gray-800 dark:text-gray-200 font-semibold mt-2">
            {{ __('Category:') }} {{ $listing->category->name }}
        </p>

        <!-- Price -->
        <p class="text-sm text-gray-800 dark:text-gray-200 font-semibold mt-1">
            {{ __('Price:') }} RM{{ number_format($listing->price, 2) }}
        </p>

        <!-- Availability -->
        <p class="text-sm mt-2">
            <span class="{{ $listing->availability ? 'text-green-500' : 'text-red-500' }}">
                {{ $listing->availability ? __('Available') : __('Not Available') }}
            </span>
        </p>

        <!-- Creation Date -->
        <p class="text-xs text-gray-500 dark:text-gray-400 mt-3">
            {{ __('Created on:') }} {{ $listing->created_at->format('d M Y') }}
        </p>
    </div>
</div>
