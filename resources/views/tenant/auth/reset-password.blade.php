<x-tenant.guest-layout>
    <x-tenant.auth-card>
        <x-tenant.slot name="logo">
            <a href="/">
                <x-tenant.application-logo width="82" />
            </a>
        </x-tenant.slot>

        <div class="card-body">
            <!-- Validation Errors -->
            <x-tenant.auth-validation-errors class="mb-3" :errors="$errors" />

            <form method="POST" action="{{ route('tenant.password.update') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('tenant.token') }}">

                <!-- Email Address -->
                <div class="mb-3">
                    <x-tenant.label for="email" :value="__('Email')" />

                    <x-tenant.input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-tenant.label for="password" :value="__('Password')" />

                    <x-tenant.input id="password" type="password" name="password" required />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <x-tenant.label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-tenant.input id="password_confirmation" type="password"
                                        name="password_confirmation" required />
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end">
                        <x-tenant.button>
                            {{ __('Reset Password') }}
                        </x-tenant.button>
                    </div>
                </div>
            </form>
        </div>
    </x-tenant.auth-card>
</x-tenant.guest-layout>
