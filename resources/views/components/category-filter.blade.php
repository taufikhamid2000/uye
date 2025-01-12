<fieldset class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 mb-6">
    <legend class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">
        {{ __('Filter by Categories') }}
    </legend>

    <!-- Select All / Unselect All -->
    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ __('Select categories to filter listings.') }}
        </p>
        <button type="button" id="selectAllToggle" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
            {{ __('Select All') }}
        </button>
    </div>

    <!-- Checkboxes -->
    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
        @foreach ($categories as $category)
            <label class="flex items-center space-x-2 text-sm text-gray-800 dark:text-gray-200">
                <input
                    type="checkbox"
                    name="categories[]"
                    value="{{ $category->id }}"
                    {{ in_array($category->id, $selectedCategories) ? 'checked' : '' }}
                    class="rounded border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                <span>{{ $category->name }}</span>
            </label>
        @endforeach
    </div>
</fieldset>

<!-- JavaScript for Select All/Unselect All -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const selectAllToggle = document.getElementById('selectAllToggle');
        const checkboxes = document.querySelectorAll('input[name="categories[]"]');

        selectAllToggle.addEventListener('click', () => {
            const allSelected = [...checkboxes].every(checkbox => checkbox.checked);
            checkboxes.forEach(checkbox => checkbox.checked = !allSelected);
            selectAllToggle.textContent = allSelected ? '{{ __('Select All') }}' : '{{ __('Unselect All') }}';
        });
    });
</script>
