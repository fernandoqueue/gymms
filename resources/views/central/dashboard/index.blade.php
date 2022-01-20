<x-central.app-layout>
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
                          <p style="font-weight: 600;font-size: 1rem;" class="card-text">{{ $locationCount }} Gyms</p>
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
                          <p style="font-weight: 600;font-size: 1rem;" class="card-text">{{ \App\Models\Central\Admin::all()->count() }} Admin(s)</p>
                          <a href="{{ route('central.dashboard.admin.index') }}" style="background-color: cadetblue; color:white" class="btn">Manage</a>
                        </div>
                      </div>
                </div>
                <div class="col-12 col-md-4">
                    <div style="border: 1px solid #00000024;" class="card text-center">
                        <div style="background-color: cadetblue;color: white;" class="card-header">
                          Settings
                        </div>
                        <div class="card-body">
                          <h5 class="card-title"><i style="font-size:8em; color:cadetblue" class="fas fa-cog"></i></h5>
                          <p style="font-weight: 600;font-size: 1rem;" class="card-text">Site Settings</p>
                          <a href="#" style="background-color: cadetblue; color:white" class="btn">Manage</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    
</x-central.app-layout>
