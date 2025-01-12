<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Update your account\'s profile information and email address.') }}
        </p>
    </header>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('PATCH')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Bio -->
        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            {{-- <x-textarea id="bio" name="bio" rows="5" placeholder="Write something here...">{{ old('bio', $user->bio) }}</x-textarea> --}}
            <x-textarea id="bio" name="bio">{{ old('bio', $user->bio) }}</x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Phone -->
        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <input
                id="phone"
                name="phone"
                type="tel"
                class="mt-1 block w-full rounded-md shadow-sm"
                value="{{ old('phone', $user->phone) }}"
                maxlength="15"
                oninput="this.value = this.value.replace(/[^0-9+]/g, '').slice(0, 15)"
            >
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <!-- Profile Photo -->
        <div>
            <x-input-label for="profile_photo" :value="__('Profile Photo')" />
            @if ($user->profile_photo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" class="rounded-full w-20 h-20 object-cover">
                </div>
            @endif
            <input id="profile_photo" name="profile_photo" type="file" class="mt-1 block w-full">
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
