<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Business Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Form Section -->
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                    {{ __('Business Profile') }}
                </h1>
                <p class="mt-2 text-gray-600 dark:text-gray-200">
                    Create a profile for your business to showcase your services to the university community.
                </p>

                <!-- Form -->
                <form method="POST" action="{{ route('business-profiles.store') }}" enctype="multipart/form-data" class="mt-6 grid grid-cols-1 gap-6">
                    @csrf

                    <!-- Business Name -->
                    <div class="flex flex-col">
                        <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('Business Name') }}
                        </label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 dark:bg-gray-900 dark:text-gray-300 sm:text-sm">
                    </div>

                    <!-- Description -->
                    <div class="flex flex-col">
                        <label for="description" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('Description') }}
                        </label>
                        <textarea name="description" id="description" rows="4"
                            class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 dark:bg-gray-900 dark:text-gray-300 sm:text-sm"></textarea>
                    </div>

                    <!-- Contact Email -->
                    <div class="flex flex-col">
                        <label for="contact_email" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('Contact Email') }}
                        </label>
                        <input type="email" name="contact_email" id="contact_email"
                            class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 dark:bg-gray-900 dark:text-gray-300 sm:text-sm">
                    </div>

                    <!-- Contact Phone -->
                    <div class="flex flex-col">
                        <label for="contact_phone" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('Contact Phone') }}
                        </label>
                        <input type="text" name="contact_phone" id="contact_phone"
                            class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 dark:bg-gray-900 dark:text-gray-300 sm:text-sm">
                    </div>

                    <!-- Logo -->
                    <div class="flex flex-col">
                        <label for="logo" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('Logo') }}
                        </label>
                        <input type="file" name="logo" id="logo"
                            class="mt-1 w-full text-sm text-gray-900 dark:text-gray-300 dark:bg-gray-900">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center sm:justify-start">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white dark:bg-indigo-500 hover:bg-indigo-700 dark:hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            {{ __('Create Profile') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
