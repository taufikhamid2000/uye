<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage ' . ucfirst($type) . ' Listings') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-12">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="p-6">
                <!-- Add New Listing Button -->
                <div class="flex justify-end mb-4">
                    <a href="{{ route('listings.create', ['type' => $type]) }}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-500 dark:hover:bg-blue-600">
                        {{ __('Add New Listing') }}
                    </a>
                </div>

                <!-- Listings Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Title') }}</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Category') }}</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Price') }}</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Availability') }}</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($listings as $listing)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200">{{ $listing->title }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200">{{ $listing->category->name ?? __('N/A') }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200">{{ number_format($listing->price, 2) }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200">
                                        <span class="px-2 py-1 text-xs font-medium {{ $listing->availability ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} rounded-lg">
                                            {{ $listing->availability ? __('Available') : __('Not Available') }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200">
                                        <div class="flex space-x-2">
                                            <!-- Edit Button -->
                                            <a href="{{ route('listings.edit', ['type' => $type, 'id' => $listing->id]) }}" class="text-blue-600 hover:underline">{{ __('Edit') }}</a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('listings.destroy', ['type' => $type, 'id' => $listing->id]) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this listing?') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline">{{ __('Delete') }}</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-2 text-center text-sm text-gray-800 dark:text-gray-200">
                                        {{ __('No listings found.') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
