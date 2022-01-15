<x-central.guest-layout>
    <x-central.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-central.application-logo width="82" />
            </a>
        </x-slot>

        <div class="card-body">
            <div class="mb-4">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <div class="card-body">
                <!-- Session Status -->
                <x-central.auth-session-status class="mb-3" :status="session('status')" />

                <!-- Validation Errors -->
                <x-central.auth-validation-errors class="mb-3" :errors="$errors" />

                <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                    <div class="mb-3">
                        <x-central.label for="email" :value="__('Email')" />

                        <x-central.input id="email" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <x-central.button>
                            {{ __('Email Password Reset Link') }}
                        </x-central.button>
                    </div>
                </form>
            </div>
        </div>
    </x-central.auth-card>
</x-central.guest-layout>
