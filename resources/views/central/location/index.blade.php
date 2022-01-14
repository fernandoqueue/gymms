<x-app-layout>
    <x-slot name="header">
        <h2 class="h3 font-weight-bold">
            Location
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-12">
            <h4 style="display:inline-block">Manage Locations</h4>
            <a href="{{ route('central.dashboard.location.create') }}" style="background-color: cadetblue; color:white" type="button" class="btn float-end">Add New Gym</a>
        </div>
    </div>
    <div class="card my-2">
        <div class="card-body table-responsive">
            <table class="table caption-top">
                <caption>List of Gyms</caption>
                <thead style="background-color: cadetblue;color:white">
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
                      <td>{{ $location['id'] }}</td>
                      <td><a href="{{ route('central.dashboard.location.show',[$location['id']]) }}">Manage Location</a></td>
                    </tr>  
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</x-app-layout>
