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
    {{-- <div class="card my-2">
        <div class="card-body table-responsive">
            <table class="table caption-top">
                <caption>List of Users</caption>
                <thead style="background-color: cadetblue;color:white">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <th scope="row">{{ $user['id'] }}</th>
                      <td>{{ $user['name'] }} </td>
                      <td>{{ $user['email'] }}</td>
                      <td><a href="{{ route('central.dashboard.location.user.delete',[$location,$user['id']]) }}">Delete</a></td>
                    </tr>  
                  @endforeach
                </tbody>
              </table>
        </div>
    </div> --}}
</x-app-layout>
