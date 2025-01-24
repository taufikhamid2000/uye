<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit ' . ucfirst($type) . ' Listing') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-12">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="p-6">
                <form action="{{ route('listings.update', ['type' => $type, 'id' => $listing->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Title -->
                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title', $listing->title) }}" required />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea id="description" class="block mt-1 w-full" name="description" required>{{ old('description', $listing->description) }}</x-textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Price -->
                    <div class="mb-4">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" value="{{ old('price', $listing->price) }}" required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <x-input-label for="category_id" :value="__('Category')" />
                        <select id="category_id" name="category_id" class="block mt-1 w-full border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                            <option value="">{{ __('Select a category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $listing->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                    <!-- Availability -->
                    <div class="mb-4">
                        <x-input-label for="availability" :value="__('Availability')" />
                        <select id="availability" name="availability" class="block mt-1 w-full border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                            <option value="1" {{ old('availability', $listing->availability) == '1' ? 'selected' : '' }}>{{ __('Available') }}</option>
                            <option value="0" {{ old('availability', $listing->availability) == '0' ? 'selected' : '' }}>{{ __('Not Available') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('availability')" class="mt-2" />
                    </div>

                    <!-- Photos -->
                    <div class="mb-4">
                        <x-input-label for="photos" :value="__('Photos')" />
                        <input id="photos" class="block mt-1 w-full" type="file" name="photos[]" multiple />
                        <x-input-error :messages="$errors->get('photos.*')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end">
                        <x-primary-button>
                            {{ __('Save Changes') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
