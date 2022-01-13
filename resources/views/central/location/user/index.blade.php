<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Location: {{ $location->id }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-12">
          <h4 style="display:inline-block">Manage Location Users</h4>
            <button style="background-color: cadetblue; color:white" type="button" class="btn btn-primary float-end">Add New User</button>
        </div>
    </div>
    @livewire('index', ['location' => $location])
</x-app-layout>
