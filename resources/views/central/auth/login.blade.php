<x-central.guest-layout>
    <x-central.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-central.application-logo width="82" />
            </a>
        </x-slot>

        <div class="card-body">
            <!-- Session Status -->
            <x-central.auth-session-status class="mb-3" :status="session('status')" />

            <!-- Validation Errors -->
            <x-central.auth-validation-errors class="mb-3" :errors="$errors" />

            <form method="POST" action="{{ route('central.login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <x-central.label for="email" :value="__('Email')" />

                    <x-central.input id="email" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-central.label for="password" :value="__('Password')" />

                    <x-central.input id="password" type="password"
                             name="password"
                             required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="mb-3">
                    <div class="form-check">
                        <x-central.checkbox id="remember_me" name="remember" />

                        <label class="form-check-label" for="remember_me">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        @if (Route::has('central.password.request'))
                            <a class="text-muted me-3" href="{{ route('central.password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-central.button>
                            {{ __('Log in') }}
                        </x-central.button>
                    </div>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
