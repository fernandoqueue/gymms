<x-tenant.guest-layout>
    <x-tenant.auth-card>
        <x-tenant.slot name="logo">
            <a href="/">
                <x-tenant.application-logo width="82" />
            </a>
        </x-tenant.slot>

        <div class="card-body">
            <div class="mb-4 small text-muted">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 d-flex justify-content-between">
                <form method="POST" action="{{ route('tenant.verification.send') }}">
                    @csrf

                    <div>
                        <x-tenant.button>
                            {{ __('Resend Verification Email') }}
                        </x-tenant.button>
                    </div>
                </form>

                <form method="POST" action="{{ route('tenant.logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-link">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-tenant.auth-card>
</x-tenant.guest-layout>