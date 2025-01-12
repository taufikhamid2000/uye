<textarea {{ $attributes->merge([
    'class' => 'mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'
]) }}>
    {{ $slot }}
</textarea>
