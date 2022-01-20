<x-central.app-layout>
    <x-slot name="header">
        <h2 class="h3 font-weight-bold">
            Dashboard
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-12">
          <h4 style="display:inline-block">Manage Central Admin</h4>
          <a style="background-color: #5f9ea0; color:white" class="btn float-end">Add New Admin</a>
        </div>
    </div>
     @livewire('central.admin-table')
</x-central.app-layout>
