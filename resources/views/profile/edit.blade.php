@if (session('status') === 'profile-updated')
    <p x-data="{ show: true }"
       x-show="show"
       x-transition
       x-init="setTimeout(() => show = false, 3000)"
       class="text-sm text-green-600 dark:text-green-400">
        {{ __('Profile updated successfully.') }}
    </p>
@endif

@if (session('status') === 'profile-failed')
    <p x-data="{ show: true }"
       x-show="show"
       x-transition
       x-init="setTimeout(() => show = false, 3000)"
       class="text-sm text-red-600 dark:text-red-400">
        {{ __('Failed to update profile. Please try again.') }}
    </p>
@endif

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Profile Information Update Section -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Section -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
