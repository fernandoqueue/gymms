<x-central.guest-layout>
    <x-central.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-central.application-logo width="82" />
            </a>
        </x-slot>

        <div class="card-body">
            <div class="mb-4 text-sm text-muted">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <!-- Validation Errors -->
            <x-central.auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('central.password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="mb-3">
                <x-central.label for="password" :value="__('Password')" />

                <x-central.input id="password" type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="d-flex justify-content-end mt-4">
                <x-central.button class="ms-4">
                    {{ __('Confirm') }}
                </x-central.button>
            </div>
        </form>
        </div>
    </x-central.auth-card>
</x-central.guest-layout>
