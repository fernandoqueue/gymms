<x-tenant.guest-layout>
    <x-tenant.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-tenant.application-logo width="82" />
            </a>
        </x-slot>

        <div class="card-body">
            <!-- Session Status -->
            <x-tenant.auth-session-status class="mb-3" :status="session('status')" />

            <!-- Validation Errors -->
            <x-tenant.auth-validation-errors class="mb-3" :errors="$errors" />

            <form method="POST" action="{{ route('tenant.login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <x-tenant.label for="email" :value="__('Email')" />

                    <x-tenant.input id="email" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-tenant.label for="password" :value="__('Password')" />

                    <x-tenant.input id="password" type="password"
                             name="password"
                             required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="mb-3">
                    <div class="form-check">
                        <x-tenant.checkbox id="remember_me" name="remember" />

                        <label class="form-check-label" for="remember_me">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        @if (Route::has('tenant.password.request'))
                            <a class="text-muted me-3" href="{{ route('tenant.password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-tenant.button>
                            {{ __('Log in') }}
                        </x-tenant.button>
                    </div>
                </div>
            </form>
        </div>
    </x-tenant.auth-card>
</x-tenant.guest-layout>
