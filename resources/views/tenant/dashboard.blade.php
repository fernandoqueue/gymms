<x-tenant.app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">
            @can('dashboard_view')
            <h1>Auth Gates</h1>
            @endcan
        </div>
    </div>
</x-tenant.app-layout>