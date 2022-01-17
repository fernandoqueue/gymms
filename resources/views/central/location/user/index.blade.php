<x-central.app-layout>
    <x-slot name="header">
        <h2 class="h3 font-weight-bold">
            Location: {{ $location->id }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-12">
          <h4 style="display:inline-block">Manage Location Users</h4>
          <a style="background-color: #5f9ea0; color:white" type="button" class="btn float-end">Add New User</a>
        </div>
    </div>
    @livewire('central.user-table', ['location' => $location])
</x-central.app-layout>
