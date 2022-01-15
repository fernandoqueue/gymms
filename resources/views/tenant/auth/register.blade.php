<x-tenant.guest-layout>
    <x-tenant.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-tenant.application-logo width="82" />
            </a>
        </x-slot>

        <div class="card-body">
            <!-- Validation Errors -->
            <x-tenant.auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('tenant.register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <x-tenant.label for="name" :value="__('Name')" />

                    <x-tenant.input id="name" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <x-tenant.label for="email" :value="__('Email')" />

                    <x-tenant.input id="email" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-tenant.label for="password" :value="__('Password')" />

                    <x-tenant.input id="password" type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <x-tenant.label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-tenant.input id="password_confirmation" type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <a class="text-muted me-3 text-decoration-none" href="{{ route('tenant.login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-tenant.button>
                            {{ __('Register') }}
                        </x-tenant.button>
                    </div>
                </div>
            </form>
        </div>
    </x-tenant.auth-card>
</x-tenant.guest-layout>
