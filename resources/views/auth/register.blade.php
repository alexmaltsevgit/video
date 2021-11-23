<x-guest-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
            <div>
                <x-label for="name" :value="__('Имя')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Телефон')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Зарегистрироваться') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
