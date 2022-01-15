<x-central.guest-layout>
    <x-central.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-central.application-logo width="82" />
            </a>
        </x-slot>

        <div class="card-body">
            <!-- Validation Errors -->
            <x-central.auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('central.register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <x-central.label for="name" :value="__('Name')" />

                    <x-central.input id="name" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <x-central.label for="email" :value="__('Email')" />

                    <x-central.input id="email" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-central.label for="password" :value="__('Password')" />

                    <x-central.input id="password" type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <x-central.label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-central.input id="password_confirmation" type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <a class="text-muted me-3 text-decoration-none" href="{{ route('central.login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-central.button>
                            {{ __('Register') }}
                        </x-central.button>
                    </div>
                </div>
            </form>
        </div>
    </x-central.auth-card>
</x-central.guest-layout>
