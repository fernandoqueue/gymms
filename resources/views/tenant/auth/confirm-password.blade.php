<x-tenant.guest-layout>
    <x-tenant.auth-card>
        <x-tenant.slot name="logo">
            <a href="/">
                <x-tenant.application-logo width="82" />
            </a>
        </x-tenant.slot>

        <div class="card-body">
            <div class="mb-4 text-sm text-muted">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <!-- Validation Errors -->
            <x-tenant.auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('tenant.password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="mb-3">
                <x-tenant.label for="password" :value="__('Password')" />

                <x-tenant.input id="password" type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="d-flex justify-content-end mt-4">
                <x-tenant.button class="ms-4">
                    {{ __('Confirm') }}
                </x-tenant.button>
            </div>
        </form>
        </div>
    </x-tenant.auth-card>
</x-tenant.guest-layout>
