<div style="margin-top: 1rem">

    <div class="row" style="">
        <div class="col-6">
            <div class="input-group mb-2">
                <input type="text" wire:model.debounce.300ms="search" class="form-control form-control-sm" placeholder="Search" style="margin-left:5px;border-radius: 7px" />
            </div>
        </div>
        <div class="col-6">
            <div style="float: right;">
                <label style="display: inline-flex; line-height: 28px;" for="">
                Show 
                <select wire:model="perPage" class="form-control form-control-sm form-select form-select-sm" style="margin-left: 5px; margin-right: 5px;">
                    @foreach($paginationOptions as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select>
                Entries
                </label>
            </div>
        </div>
    </div>

    

    <div class="row">
        <div class="col-12">
            <div class="table-responsive" style="border-top-left-radius: 5px; border-top-right-radius: 5px; min-height:182px">
                <table class="table mb-0" style="border: 1px solid #5f9ea099">
                    <thead style="background-color:cadetblue; color:white">
                        <tr >
                            <th >
                            </th>
                            <th>
                                ID
                                @include('livewire.components.table.sort', ['field' => 'id'])
                            </th>
                            <th>
                                Name
                                @include('livewire.components.table.sort', ['field' => 'name'])
                            </th>
                            <th>
                                Email
                                @include('livewire.components.table.sort', ['field' => 'email'])
                            </th>         
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody wire:loading.delay style="border-top: unset;">
                        <tr >
                            <td style="background-color:white; text-align: center;" colspan="10">Loading...</td>
                        </tr>
                    </tbody>
                    <tbody wire:loading.remove style="border-top: unset;" >
                        @forelse($users as $user)
                            <tr style="background-color:white">
                                <td>
                                    <input type="checkbox" value="{{ $user->id }}" wire:model.debounce.0ms="selected">
                                </td>
                                <td scope="row">
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    <a class="link-light-blue" href="mailto:{{ $user->email }}">
                                        <i class="far fa-envelope fa-fw">
                                        </i>
                                        {{ $user->email }}
                                    </a>
                                </td>
                                <td>
                                    <div style="float:right" class="dropstart btn-group">
                                        <a href="#" class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Actions <i class="mdi mdi-chevron-down"></i>
                                        </a>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="">View</a>
                                            <a class="dropdown-item" href="{{ route('central.dashboard.location.user.impersonate',['location_id' => $location->id, 'user_id' => $user->id]) }}">Impersonate</a>
                                            <a class="dropdown-item" wire:click="confirm('delete', {{ $user->id }})" wire:loading.attr="disabled" href="#">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td style="background-color:white; text-align: center;" colspan="10">No entries found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: .4rem">
        <div class="col-6">
            @if($this->selectedCount)
                <button class="btn btn-sm btn-success text-white" type="button" wire:click="resetSelected" >
                    Deselect All
                </button>
                <button class="btn btn-sm btn-danger text-white" type="button" wire:click="confirm('deleteSelected')" >
                    Delete {{ $this->selectedCount }} Selected
                </button>
            @endif
        </div>
        <div class="col-6">
            <div style="float: right;">
                {{ $users->links('vendor.pagination.simple-default') }}
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("Are you sure?")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush
