<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
            <x-central.application-logo width="36" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <x-central.nav-link href="{{ route('central.dashboard.index') }}" :active="request()->routeIs('central.dashboard.index')">
                    {{ __('Dashboard') }}
                </x-central.nav-link>
                <x-central.nav-link href="{{ route('central.dashboard.location.index') }}" :active="request()->routeIs('central.dashboard.location.index')">
                    Gym
                </x-central.nav-link>
                <x-central.nav-link href="{{ route('central.dashboard.admin.index') }}" :active="request()->routeIs('central.dashboard.admin.index')">
                    Admin
                </x-central.nav-link>
                <x-central.nav-link href="" :active="request()->routeIs('central.dashboard')">
                    Subscription
                </x-central.nav-link>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">

                <!-- Settings Dropdown -->
                    <x-central.dropdown id="settingsDropdown">
                        <x-slot name="trigger">
                            {{ Auth::user()->name }}
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('central.logout') }}">
                                @csrf

                                <x-central.dropdown-link :href="route('central.logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-central.dropdown-link>
                            </form>
                        </x-slot>
                    </x-central.dropdown>
            </ul>
        </div>
    </div>
</nav>