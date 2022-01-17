<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
            <x-tenant.application-logo width="36" />
        </a>
        @if(currentlyImpersonating())
        <a href="{{ route('tenant.impersonate.auth.destroy') }}" class="btn btn-sm btn-danger text-white">Impersonation Logout</a>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <x-tenant.nav-link href="{{ route('tenant.dashboard.index') }}" :active="request()->routeIs('tenant.dashboard')">
                    {{ __('Dashboard') }}
                </x-tenant.nav-link>
                
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">

                <!-- Settings Dropdown -->
                @auth
                    <x-tenant.dropdown id="settingsDropdown">
                        <x-slot name="trigger">
                            {{ Auth::user()->name }}
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('tenant.logout') }}">
                                @csrf

                                <x-tenant.dropdown-link :href="route('tenant.logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-tenant.dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </ul>
        </div>
    </div>
</nav>