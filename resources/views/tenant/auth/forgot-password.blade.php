<x-tenant.guest-layout>
    <x-tenant.auth-card>
        <x-tenant.slot name="logo">
            <a href="/">
                <x-tenant.application-logo width="82" />
            </a>
        </x-tenant.slot>

        <div class="card-body">
            <div class="mb-4">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <div class="card-body">
                <!-- Session Status -->
                <x-tenant.auth-session-status class="mb-3" :status="session('status')" />

                <!-- Validation Errors -->
                <x-tenant.auth-validation-errors class="mb-3" :errors="$errors" />

                <form method="POST" action="{{ route('tenant.password.email') }}">
                @csrf

                <!-- Email Address -->
                    <div class="mb-3">
                        <x-tenant.label for="email" :value="__('Email')" />

                        <x-tenant.input id="email" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <x-tenant.button>
                            {{ __('Email Password Reset Link') }}
                        </x-tenant.button>
                    </div>
                </form>
            </div>
        </div>
    </x-tenant.auth-card>
</x-tenant.guest-layout>
