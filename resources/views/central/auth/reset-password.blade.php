<x-central.guest-layout>
    <x-central.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-central.application-logo width="82" />
            </a>
        </x-slot>

        <div class="card-body">
            <!-- Validation Errors -->
            <x-central.auth-validation-errors class="mb-3" :errors="$errors" />

            <form method="POST" action="{{ route('central.password.update') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('central.token') }}">

                <!-- Email Address -->
                <div class="mb-3">
                    <x-central.label for="email" :value="__('Email')" />

                    <x-central.input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-central.label for="password" :value="__('Password')" />

                    <x-central.input id="password" type="password" name="password" required />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <x-central.label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-central.input id="password_confirmation" type="password"
                                        name="password_confirmation" required />
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end">
                        <x-central.button>
                            {{ __('Reset Password') }}
                        </x-central.button>
                    </div>
                </div>
            </form>
        </div>
    </x-central.auth-card>
</x-central.guest-layout>
