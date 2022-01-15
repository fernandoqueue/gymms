<x-tenant.app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            {{ session('admin_impersonation') }}
            <h1>Hello from tenant dashboard</h1>
        </div>
    </div>
</x-tenant.app-layout>