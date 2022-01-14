<x-app-layout>
    <x-slot name="header">
        <h2 class="h3 font-weight-bold">
            Dashboard
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <h3>
                        Quick Menu
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 pb-2">
                    <div style="border: 1px solid #00000024;" class="card text-center">
                        <div style="background-color: cadetblue;color: white;" class="card-header">
                          Gym Locations
                        </div>
                        <div class="card-body">
                          <h5 class="card-title"><i style="font-size:8em; color:cadetblue" class="fas fa-dumbbell"></i></h5>
                          <p style="font-weight: 600;font-size: 1rem;" class="card-text">{{ \App\Models\Location::all()->count() }} Gyms</p>
                          <a href="{{ route('central.dashboard.location.index') }}" style="background-color: cadetblue; color:white" class="btn">Manage</a>
                        </div>
                      </div>
                </div>
                <div class="col-12 col-md-4 pb-2">
                    <div style="border: 1px solid #00000024;" class="card text-center">
                        <div style="background-color: cadetblue;color: white;" class="card-header">
                          Admin
                        </div>
                        <div class="card-body">
                          <h5 class="card-title"><i style="font-size:8em; color:cadetblue" class="fas fa-users"></i></h5>
                          <p style="font-weight: 600;font-size: 1rem;" class="card-text">{{ \App\Models\User::all()->count() }} Users</p>
                          <a href="#" style="background-color: cadetblue; color:white" class="btn">Manage</a>
                        </div>
                      </div>
                </div>
                <div class="col-12 col-md-4">
                    <div style="border: 1px solid #00000024;" class="card text-center">
                        <div style="background-color: cadetblue;color: white;" class="card-header">
                          Subscriptions
                        </div>
                        <div class="card-body">
                          <h5 class="card-title"><i style="font-size:8em; color:cadetblue" class="fas fa-users"></i></h5>
                          <p style="font-weight: 600;font-size: 1rem;" class="card-text">{{ \App\Models\User::all()->count() }} Users</p>
                          <a href="#" style="background-color: cadetblue; color:white" class="btn">Manage</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row mt-2">
        <div class="col-12">
            <button type="button" class="btn btn-primary float-end">Add New Gym</button>
        </div>
    </div>
    <div class="card my-2">
        <div class="card-body table-responsive">
            <table class="table caption-top">
                <caption>List of Gyms</caption>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Domain</th>
                    <th scope="col">ID</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $index => $location)
                    <tr>
                      <th scope="row">{{ $index+1 }}</th>
                      <td>
                        @foreach ($location['domains'] as $domain)
                            <span class="badge bg-primary">{{ $domain->domain }}</span>
                        @endforeach  
                      </td>
                      <td>{{ $location['id'] }}</td>
                      <td><a href="{{ route('central.dashboard',[$location['id']]) }}">Manage Location</a></td>
                    </tr>  
                  @endforeach
                </tbody>
              </table>
        </div>
    </div> --}}
</x-app-layout>
