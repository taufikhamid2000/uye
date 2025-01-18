<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listing Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Listing Details -->
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                    {{ $listing->title }}
                </h1>
                <p class="mt-2 text-gray-600 dark:text-gray-200">
                    {{ $listing->description }}
                </p>
                <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">
                    Posted by: {{ $listing->user->name }} on {{ $listing->created_at->format('M d, Y') }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
