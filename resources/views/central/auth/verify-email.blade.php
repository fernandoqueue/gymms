<x-central.guest-layout>
    <x-central.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-central.application-logo width="82" />
            </a>
        </x-slot>

        <div class="card-body">
            <div class="mb-4 small text-muted">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'central.verification-link-sent')
                <div class="alert alert-success" role="alert">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 d-flex justify-content-between">
                <form method="POST" action="{{ route('central.verification.send') }}">
                    @csrf

                    <div>
                        <x-button>
                            {{ __('Resend Verification Email') }}
                        </x-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('central.logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-link">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-central.auth-card>
</x-central.guest-layout>
